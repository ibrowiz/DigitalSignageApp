<?php
namespace App\Http\Controllers\App\MediaPartner\payment;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\ContentOwnerWallet;
use App\Models\ContentOwnerCreditLogs;
use App\Models\ClientProfile;
use App\Models\PaymentPendingActivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TopUpTransaction;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletLog;
use App\Models\Bank;
use App\Services\Payment\Interswitch\Interswitch;
use File;
use auth;
use DB;
use Session;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class PaymentController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth:operator');
    }


    public function index()
    {
//return dd(Auth::user()->id);
    	$banks = Bank::all();

       // $contentOwners = User::where('tenant_domain',Auth::user()->tenant_domain)->get();
        $clients = Auth::user()->tenant->clients;

        $tref = mt_rand(100000,999999);

        Session::put('tref',$tref);

        //return dd(Session::get('tref'));

        
                                //$_SESSION['genref'] = $tref;
                            

    	return view('app.mediapartner.payment.index',compact('banks','clients'));
    }

    public function paymentConfirmation(Interswitch $interswitch,Request $request){
        
        $amount_kobo = $request->amount * 100;

        $amount_naira = $request->amount;
        $hashval = $interswitch->dohash($amount_kobo);

         $ref = $interswitch->reference;

         Session::put('ref',$ref);

         Session::put('amtk',$amount_kobo);

        $pdtid = $interswitch->pdtid;
        $payitemid = $interswitch->payitemid;
        $currencycode = $interswitch->currencycode;
        $callbackpage = $interswitch->callbackpage;
        $mackey = $interswitch->mackey;
        $tenant = TenantManager::get();

         Session::put('tenant',$tenant);
        
        return view('app.mediapartner.payment.confirmation',compact('ref','amount_kobo','amount_naira','pdtid','payitemid','currencycode','callbackpage','mackey','hashval'));
    }

    public function getCallback(Interswitch $interswitch,Request $request)
    {

        $subref = Session::get('ref');
        $subamt = Session::get('amtk');

       // $tenant = Session::get('tenant');
         $json = $interswitch->dquery($subamt,$subref);
         $json = json_decode($json);
        //dd($json);
         $amount = ($json->Amount)/100;
         $topUpTransaction = new TopUpTransaction;
         $walletLog = new WalletLog();
         //$last_id = WalletLog::where()->last()

         if ($json != null && $json->ResponseCode == "00") 
         {
            $wallet = Auth::user()->tenant->tenantProfile->wallet;
            if($wallet->bonus_flag == 0)
            {
                $topUpTransaction->amount = $amount;
                $topUpTransaction->currency_id = 1;
                $topUpTransaction->balance = $wallet->cash + $amount;
                $topUpTransaction->points = 0;
                $topUpTransaction->point_balance = $wallet->point;
                $topUpTransaction->assignable_type = 'App\Models\Tenant';
                $topUpTransaction->assignable_id = Auth::user()->tenant->id;
                $topUpTransaction->save();
                $walletLog->wallet_id = Auth::user()->tenant->tenantProfile->wallet->id;
                $walletLog->action = 'paid '.$amount;
                $walletLog->transaction_id = $topUpTransaction->id;
                $walletLog->type = 'cash';
                $walletLog->amount = $amount;
                $walletLog->status = 'success';
                $walletLog->wallet_worth = $wallet->cash + $amount;
                $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
                if($last==null){
                 $walletLog->last_wallet_log = 0;   
                }
                else{
                 $walletLog->last_wallet_log = $last->id;
                }
                
                $ops =array('type'=>'cash','amount'=>$amount);
                //dd(json_encode($ops));
                $walletLog->operation = json_encode($ops);
                $walletLog->save();
                //dd($walletLog);
                $wallet->cash += $amount;
                $wallet->update();

                 return redirect('mediapartner/'.Auth::user()->tenant->domain.'/wallet/index')->with('flash_message', $json->ResponseDescription.' N'.$amount.' added');

            }else
            {
             
                $topUpTransaction->amount = $amount;
                //$topUpTransaction->type = 'cash to points'; 
                $topUpTransaction->currency_id = 1;
                $topUpTransaction->balance = $wallet->cash+$amount;
                $topUpTransaction->points = $wallet->bonus;
                $topUpTransaction->point_balance = $wallet->point + $wallet->bonus;
                $topUpTransaction->assignable_type = 'App\Models\Tenant';
                $topUpTransaction->assignable_id = Auth::user()->tenant->id;
                $topUpTransaction->save();
                $walletLog->wallet_id = Auth::user()->tenant->tenantProfile->wallet->id;
                $walletLog->action = 'earned '.$wallet->bonus.' points/paid '.$amount.' cash';
                $walletLog->type = 'cash';
                $walletLog->transaction_id = $topUpTransaction->id;
                
                $walletLog->amount = $amount;
                $walletLog->status = 'success';
                $walletLog->wallet_worth = $wallet->cash+$amount;
                $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
                //$walletLog->last_wallet_log = $last->id;
                if($last==null){
                 $walletLog->last_wallet_log = 0;   
                }
                else{
                 $walletLog->last_wallet_log = $last->id;
                }
                $ops =array('type'=>'point and cash','amount'=>$amount,'point'=>$wallet->bonus);
                //dd(json_encode($ops));
                $walletLog->operation = json_encode($ops);
                $walletLog->save();
                //dd($walletLog);
                $wallet->point += $wallet->bonus;
                Session::put('bonus',$wallet->bonus);
                $wallet->bonus = 0;
                $wallet->update();

                 return redirect('mediapartner/'.Auth::user()->tenant->domain.'/wallet/index')->with('flash_message', $json->ResponseDescription.' N'.$amount.' added '.Session::get('bonus').' points');

            }

           

         } 
        else 
         {
            $trans = Auth::user()->tenant->topUpTransactions->last();
            $wallet = Auth::user()->tenant->tenantProfile->wallet;
            if($wallet->bonus_flag == 0)
            {
                $amt =  $subamt/100;
                $walletLog->wallet_id = Auth::user()->tenant->tenantProfile->wallet->id;
                $walletLog->action = 'paid '.$amt;
                $walletLog->transaction_id = 0;
                $walletLog->type = 'cash';
                $walletLog->amount = $amt;
                $walletLog->status = 'failed';
                $walletLog->wallet_worth = $wallet->cash;
                $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
                //$walletLog->last_wallet_log = $last->id;
                if($last == null){
                 $walletLog->last_wallet_log = 0;   
                }
                else{
                 $walletLog->last_wallet_log = $last->id;
                }
                $ops =array('type'=>'cash','amount'=>$amt);
                //dd(json_encode($ops));
                $walletLog->operation = json_encode($ops);
                $walletLog->save();
            }else
            {
                $walletLog->wallet_id = Auth::user()->tenant->tenantProfile->wallet->id;
                $walletLog->action = 'earned '.$wallet->bonus.' points';
                $walletLog->transaction_id = 0;
                $walletLog->type = 'point';
                $walletLog->amount = 0;
                $walletLog->status = 'failed';
                $walletLog->wallet_worth = $wallet->cash;
                $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
                if($last==null){
                 $walletLog->last_wallet_log = 0;   
                }
                else{
                 $walletLog->last_wallet_log = $last->id;
                }
                //$walletLog->last_wallet_log = $last->id;
                $ops =array('type'=>'points','amount'=>'0');
                //dd(json_encode($ops));
                $walletLog->operation = json_encode($ops);
                $walletLog->save();
            }
           
            return redirect('mediapartner/'.Auth::user()->tenant->domain.'/wallet/index')->with('danger_message', $json->ResponseDescription);
         }

         //dd($json);

       /* $data = '62071015000000http://abc.com/response/CEF793CBBE838AA0CBB29B74D571113B4EA6586D3BA77E7CFA0B95E278364EFC4526ED7BD255A366CDDE11F1F607F0F844B09D93B16F7CFE87563B2272007AB3';

        $hash_data = hash('SHA512', $data);

        $redirect = 'http://abc.com/response';*/



        //return view('app.mediapartner.payment.pay',compact('json'));
    }


    public function interswitchPaymentResponse(Request $request, Interswitch $interswitch)
    {
        $payment = Session::get('payment');
        $amount = Payment::findOrFail($payment->id)->amount;
        $amount = $amount * 100;

        $transaction_ref = $request->txnref;

        $interswitch->setTransactionRef($transaction_ref);
        $interswitch->setAmount($amount);

        $status = $interswitch->getTransactionStatus();

        $status = json_decode($status);

        if ($status != null && $status->ResponseCode == "00") { // Successful
            //$this->completePayment($payment);
            return dd('paid');
           // return redirect()->route('payments.show', [$payment->id])->with('message', 'Your payment is successful');
        } else {
            return dd('no pay');
            //return redirect()->route('payments.show', [$payment->id])->with('error', $status->ResponseDescription);
        }
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'amount' => 'required',
            'receivingAccount' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5620',
        ]);

        $payPendActvn = new PaymentPendingActivation();


        $tenant = Tenant::where('domain',Auth::user()->tenant_domain)->first();
     
         if($file = $request->hasFile('image')) {
            
            $file = $request->file('image') ;
            //return dd($file->getClientOriginalName().'/'.public_path().'/images/');
           if($request->has('others')){
           // return dd($request->input('userName'));
           	$payPendActvn->user_name = $request->input('userName');
            $payPendActvn->user_type = 'App\Models\contentOwner';
           }else{
            $payPendActvn->user_name = $tenant->email;
        }
            $payPendActvn->amount = $request->input('amount');
            $payPendActvn->receiving_account = $request->input('receivingAccount');
            $payPendActvn->payable_type = 'App\Models\Operator';
            $payPendActvn->payable_id = $tenant->id;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/upload/' ;
            $file->move($destinationPath,$fileName);
            $payPendActvn->image = $fileName;
            if($request->has('toPoint'))
            {
            $payPendActvn->point_flag = $request->input('toPoint');
            }
            else
            {
                $payPendActvn->point_flag = 0; 
            }
        }

         $payPendActvn->save() ;
         return redirect('/mediapartner/processpayment/index')->with('flash_message', 'saved');
    }

    public function processPaymentIndex(){

        //$payPendActvns = Auth::user()->paymentPendingActivations->where('approval_status','0')->where('decline_status','0')->sortByDesc('id');

        //$tenant = Tenant::where('email',Auth::user()->email)->first();

    	$payPendActvns = PaymentPendingActivation::where('approval_status','0')->where('decline_status','0')->orderBy('id','DESC')->get();

    	return view('app.tenant.payment.process-payment-index',compact('payPendActvns'));
    }

     public function delete($id){
     	$PaymentPendingActivation = PaymentPendingActivation::find($id);
        PaymentPendingActivation::where('id',$id)->delete();
        $destinationPath = public_path().'/upload/';
        File::delete($destinationPath = public_path().'/upload/'.$PaymentPendingActivation->image);
        return redirect('/mediapartner/processpayment/index')->with('flash_message', 'Deleted');
    }

}