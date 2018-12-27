<?php
/*namespace App\Http\Controllers\App\Client\payment;
use App\Models\Tenant;
use App\Models\ContentOwnerWallet;
use App\Models\ContentOwnerCreditLogs;
use App\Models\ClientProfile;
use App\Models\PaymentPendingActivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bank;
use App\Models\ClientWallet;
use App\Models\ClientWalletLog;
use App\Models\TopUpTransaction;
use App\Services\Payment\Interswitch\Interswitch;
use File;
use auth;
use DB;
use Session;*/

/*class PaymentController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {


    	return view('app.client.payment.index');
    }

} -->*/
namespace App\Http\Controllers\App\Client\payment;
use App\Models\Tenant;
use App\Models\ContentOwnerWallet;
use App\Models\ContentOwnerCreditLogs;
use App\Models\ClientProfile;
use App\Models\PaymentPendingActivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bank;
use App\Models\ClientWallet;
use App\Models\ClientWalletLog;
use App\Models\TopUpTransaction;
use App\Services\Payment\Interswitch\Interswitch;
use File;
use auth;
use DB;
use Session;

class PaymentController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {

      $banks = Bank::all();

       // $contentOwners = User::where('tenant_domain',Auth::user()->tenant_domain)->get();
       // $clients = Auth::user()->tenant->clients;

        $tref = mt_rand(100000,999999);

        Session::put('tref',$tref);

      return view('app.client.payment.index');
    }

    public function paymentConfirmation(Interswitch $interswitch,Request $request){
        
        $amount_kobo = $request->amount * 100;

        $amount_naira = $request->amount;
        $hashval = $interswitch->clientdohash($amount_kobo);

         $ref = $interswitch->reference;

         Session::put('ref',$ref);

         Session::put('amtk',$amount_kobo);

        $pdtid = $interswitch->pdtid;
        $payitemid = $interswitch->payitemid;
        $currencycode = $interswitch->currencycode;
        $callbackpage = $interswitch->clientcallbackpage;
        $mackey = $interswitch->mackey;
        //$tenant = TenantManager::get();

         //Session::put('tenant',$tenant);
        
            //dd($interswitch);
       // dd(Auth::user()->client->name);

        return view('app.client.payment.confirmation',compact('ref','amount_kobo','amount_naira','pdtid','payitemid','currencycode','callbackpage','mackey','hashval'));
    }

    public function getCallback(Interswitch $interswitch,Request $request)
    {
        
        $subref = Session::get('ref');
        $subamt = Session::get('amtk');
       // $tenant = Session::get('tenant');

         $json = $interswitch->dquery($subamt,$subref);

         $json = json_decode($json);
         $amount = ($json->Amount)/100;


         $topUpTransaction = new TopUpTransaction;
         $walletLog = new ClientWalletLog();

         if ($json != null && $json->ResponseCode == "00") 
         {
            $wallet = Auth::user()->client->clientProfile->clientWallet;
            //dd($wallet);
           if($wallet->bonus_flag == 0){
              $topUpTransaction->amount = $amount;
              $topUpTransaction->currency_id = 1;
              $topUpTransaction->balance = $wallet->cash+$amount;
              $topUpTransaction->points = 0;
              $topUpTransaction->point_balance = $wallet->point;
              $topUpTransaction->assignable_type = 'App\Models\Client';
              $topUpTransaction->assignable_id = Auth::user()->client->id;
              $topUpTransaction->save();
              //dd($wallet);
              $walletLog->client_wallet_id = Auth::user()->client->clientProfile->clientWallet->id;
              $walletLog->action = 'paid '.$amount;
              $walletLog->transaction_id = $topUpTransaction->id;
              $walletLog->type = 'cash';
              $walletLog->amount = $amount;
              $walletLog->status = 'successful';
              $walletLog->wallet_worth = $wallet->cash + $amount;
              $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
             // $walletLog->last_wallet_log = $last->id;
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
              $wallet->cash = $topUpTransaction->balance;
              $wallet->update();

              return redirect('client/'.Auth::user()->client->tenant->domain.'/wallet/index')->with('flash_message', $json->ResponseDescription.' N'.$amount.' added');
          }
          else
            {
                $topUpTransaction->amount = $amount;
                //$topUpTransaction->type = 'cash to points'; 
                $topUpTransaction->currency_id = 1;
                $topUpTransaction->balance = $wallet->cash+$amount;
                $topUpTransaction->points = $wallet->bonus;
                $topUpTransaction->point_balance = $wallet->point + $wallet->bonus;
                $topUpTransaction->assignable_type = 'App\Models\Client';
                $topUpTransaction->assignable_id = Auth::user()->client->id;
                $topUpTransaction->save();
                $walletLog->client_wallet_id = Auth::user()->client->clientProfile->clientWallet->id;
                $walletLog->action = 'earned '.$wallet->bonus.' points/paid '.$amount.' cash';
                $walletLog->type = 'cash';
                $walletLog->transaction_id = $topUpTransaction->id;
                
                $walletLog->amount = $amount;
                $walletLog->status = 'success';
                $walletLog->wallet_worth = $wallet->cash+$amount;
                $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
                //dd($last);
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
                $wallet->cash = $topUpTransaction->balance;
                $wallet->update();

                 return redirect('client/'.Auth::user()->client->tenant->domain.'/wallet/index')->with('flash_message', $json->ResponseDescription.' N'.$amount.' added '.Session::get('bonus').' points');

            }
         } 
        else 
         {
            $trans = Auth::user()->client->topUpTransactions->last();
            $wallet = Auth::user()->client->clientProfile->clientWallet;
            if($wallet->bonus_flag == 0){
            $amt =  $subamt/100;
            $walletLog->client_wallet_id = Auth::user()->client->clientProfile->clientWallet->id;
            $walletLog->action = 'paid '.$amt;
            $walletLog->transaction_id = 0;
            $walletLog->type = 'cash';
            $walletLog->amount = $amt;
            $walletLog->status = 'failed';
            $walletLog->wallet_worth = $wallet->cash;
            $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
            //$walletLog->last_wallet_log = $last->id;
            if($last==null){
                 $walletLog->last_wallet_log = 0;   
                }
                else{
                 $walletLog->last_wallet_log = $last->id;
                }
            $ops =array('type'=>'cash','amount'=>$amt);
            //dd(json_encode($ops));
            $walletLog->operation = json_encode($ops);
            $walletLog->save();
          }
          else
          {
                $walletLog->client_wallet_id = Auth::user()->client->clientProfile->clientWallet->id;
                $walletLog->action = 'earned '.$wallet->bonus.' points';
                $walletLog->transaction_id = 0;
                $walletLog->type = 'point';
                $walletLog->amount = 0;
                $walletLog->status = 'failed';
                $walletLog->wallet_worth = $wallet->cash;
                $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
                //$walletLog->last_wallet_log = $last->id;
                if($last==null){
                 $walletLog->last_wallet_log = 0;   
                }
                else{
                 $walletLog->last_wallet_log = $last->id;
                }
                $ops =array('type'=>'points','amount'=>'0');
                //dd(json_encode($ops));
                $walletLog->operation = json_encode($ops);
                $walletLog->save();
            }
            /*$walletLog->client_wallet_id = $wallet->id;
            $walletLog->action = 'paid '.$amount;
            $walletLog->transaction_id = $topUpTransaction->id;
            $walletLog->type = 'cash';
            $walletLog->amount = $amount;
            $walletLog->status = 'failed';
            $walletLog->wallet_worth = $wallet->cash + $amount;
            $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
            $walletLog->last_wallet_log = $last->id;
            $ops = array('type'=>'cash','amount'=>$amount);
            $walletLog->operation = json_encode($ops);
            $walletLog->save();*/
           
            return redirect('client/'.Auth::user()->client->tenant->domain.'/wallet/index')->with('danger_message', $json->ResponseDescription);
         }

    }


    public function store(Request $request) {
        
        $this->validate($request, [
            'amount' => 'required',
            'receivingAccount' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5620',
        ]);

        $payPendActvn = new PaymentPendingActivation();
     
         if($file = $request->hasFile('image')) {
            
            $file = $request->file('image') ;
            //return dd($file->getClientOriginalName().'/'.public_path().'/images/');
           if($request->has('others')){
           // return dd($request->input('userName'));
            $payPendActvn->user_name = $request->input('userName');
           }else{
            $payPendActvn->user_name = Auth::user()->email;
        }
            $payPendActvn->user_type = 'App\Models\contentOwner';
            $payPendActvn->amount = $request->input('amount');
            $payPendActvn->receiving_account = $request->input('receivingAccount');
            $payPendActvn->sent_by = Auth::user()->email;
            $payPendActvn->payable_type = 'App\Models\contentOwner';
            $payPendActvn->payable_id = Auth::user()->id;
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
         return redirect('/contentowner/processpayment/index')->with('flash_message', 'saved');
    }

    public function processPaymentIndex(){
        $payPendActvns = PaymentPendingActivation::where('sent_by',Auth::user()->email)->where('approval_status','0')->where('decline_status','0')->get();
        //$payPendActvns = PaymentPendingActivation::where('payable_type','App\Models\Operator')->where('approval_status','0')->where('decline_status','0')->orderBy('id','DESC')->get();

        return view('app.contentowner.payment.process-payment-index',compact('payPendActvns'));
    }

     public function delete($id){
      $PaymentPendingActivation = PaymentPendingActivation::find($id);
        PaymentPendingActivation::where('id',$id)->delete();
        $destinationPath = public_path().'/upload/';
        File::delete($destinationPath = public_path().'/upload/'.$PaymentPendingActivation->image);
        return redirect('/contentowner/processpayment/index')->with('flash_message', 'Deleted');
    }

}