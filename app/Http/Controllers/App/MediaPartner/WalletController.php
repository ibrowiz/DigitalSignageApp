<?php
namespace App\Http\Controllers\App\MediaPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Wallet;
use App\Models\WalletLog;
use App\Models\Tenant;
use App\Models\Point;
use App\Models\Bonus;
use App\Models\MediaPartnerPointLog;
use App\Models\BonusTransaction;
use App\Models\PointLog;
use App\Models\TopUpTransaction;
use Session;

use DB;

class WalletController extends Controller
{

    public $bonus;

		 public function __construct(){
    $this->middleware('auth:operator');
    //$wallet = Auth::user()->tenant->tenantProfile->wallet;
    //$this->bonus = $wallet->bonus;
    }
   
    public function index()
    {
        $wallet = Auth::user()->tenant->tenantProfile->wallet;

        $trans = Auth::user()->tenant->topUpTransactions->sortByDesc('id')->take(10);

        return view('app.mediapartner.wallet', compact('wallet','trans'));
    }


    public function assignPoint(Request $request,$domain,$id)
    {
        
            $wallet = Auth::user()->tenant->tenantProfile->wallet;
           
            $wallet->cash -= $request->input('amount');
            $wallet->point += $request->input('amount');
            $wallet->update();

            $transaction =  new TopUpTransaction;
            $transaction->type = 'point purchase';
            $transaction->amount = $request->input('amount');
            $transaction->balance = $wallet->cash;
            $transaction->points  = $request->input('amount');
            $transaction->point_balance = $wallet->point;
            $transaction->currency_id = 1;
            $transaction->assignable_type = 'App\Models\Tenant';
            $transaction->assignable_id = Auth::user()->tenant->id;
            $transaction->save();


            $log = new WalletLog;
            $log->wallet_id = $wallet->id;
            $log->action = 'bought '.$request->input('amount').' points';
            $log->transaction_id = $transaction->id;
            $log->type = 'point';
            $log->amount = $request->input('amount');
            $log->status = 'success';
            $log->wallet_worth = $wallet->cash;
            $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
            $log->last_wallet_log = $last->id;
            $ops =array('type'=>'point','amount'=>$request->input('amount'));
            $log->operation = json_encode($ops);
            $log->save();


            return redirect('mediapartner/'.Auth::user()->tenant->domain.'/wallet/index')->with('flash_message',' '.$request->input('amount').' points aquired');
 

     }


    public function convertBonusToPoint(Request $request,$domain,$id){
        //$tenant = Tenant::where('id',$id)->first();
        

     if($request->input('convertbonus') == "point" )
         {

            $wallet = Auth::user()->tenant->tenantProfile->wallet;
            Session::put('bonus',$wallet->bonus);
            if(Session::get('bonus')>0)
            {
            $wallet->point += $wallet->bonus;
            $wallet->bonus = 0;
            $wallet->update();
            
            $bonusTransaction =  new BonusTransaction;

            $bonusTransaction->type = 'add bonus to points';
            $bonusTransaction->amount = Session::get('bonus');
            $bonusTransaction->balance = $wallet->bonus;
            $bonusTransaction->assignable_type = 'App\Models\Tenant';
            $bonusTransaction->assignable_id = Auth::user()->tenant->id;
            $bonusTransaction->save();

            $walletLog = new WalletLog;
            $walletLog->wallet_id = Auth::user()->tenant->tenantProfile->wallet->id;
            $walletLog->action = 'added '.Session::get('bonus').'points';
            $walletLog->transaction_id = $bonusTransaction->id;
            $walletLog->type = 'bonus';
            $walletLog->amount = Session::get('bonus');
            $walletLog->status = 'successful';
            $walletLog->wallet_worth = $wallet->cash;
            $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
            $walletLog->last_wallet_log = $last->id;
            $ops =array('type'=>'bonus','amount'=>Session::get('bonus'));
            //dd(json_encode($ops));
            $walletLog->operation = json_encode($ops);
            $walletLog->save();
            //dd($walletLog);
            //$wallet->cash += $amount;
            //$wallet->update();


            return back()->with('flash_message', Session::get('bonus').' points aquired');
            }
                else
                {
                    return back()->with('danger_message','Zero balance');
                }

        }
        else
                {

                    $wallet = Auth::user()->tenant->tenantProfile->wallet;
                    //Session::put('bonus',$wallet->bonus);
                    if(($wallet->bonus)>0)
                    {
                    $wallet->cash += $wallet->bonus;
                    $wallet->update();
                   
                    $topUpTransaction = new TopUpTransaction;
                    $topUpTransaction->amount = $wallet->bonus;
                    $topUpTransaction->currency_id = 1;
                    $topUpTransaction->balance = $wallet->cash;
                    $topUpTransaction->assignable_type = 'App\Models\Tenant';
                    $topUpTransaction->assignable_id = Auth::user()->tenant->id;
                    $topUpTransaction->save();

                    $walletLog = new WalletLog();
                    $walletLog->wallet_id = Auth::user()->tenant->tenantProfile->wallet->id;
                    $walletLog->action = 'bonus '.$wallet->bonus;
                    $walletLog->transaction_id = $topUpTransaction->id;
                    $walletLog->type = 'bonus';
                    $walletLog->amount = $wallet->bonus;
                    $walletLog->status = 'successful';
                    $walletLog->wallet_worth = $wallet->cash;
                    $last = Auth::user()->tenant->tenantProfile->wallet->walletLogs->last();
                    $walletLog->last_wallet_log = $last->id;
                    $ops =array('type'=>'bonus','amount'=>$wallet->bonus);
                    $walletLog->operation = json_encode($ops);
                    $walletLog->save();
                    Session::put('bonus',$wallet->bonus);
                     $wallet->bonus = 0;
                    $wallet->update();
                   
                    return back()->with('flash_message', 'N'.Session::get('bonus').' credit aquired');
                    }
                    else
                    {
                        return back()->with('danger_message','Zero Bonus');
                    }

                }

     }

     public function walletSetting(Request $request,$id)
     {

        $wallet = Auth::user()->tenant->tenantProfile->wallet;

        //$wallet = Wallet::where('assignable_type','App\Models\MediaPartner')->where('assignable_id',$id)->first();

            if($request->has('autobonus'))
                    {
                            $wallet->bonus_flag = $request->input('autobonus');

                             $wallet->update();
                    }
            else
                    {
                        $wallet->bonus_flag = 0;  

                        $wallet->update();

                    }

                 return redirect('mediapartner/'.Auth::user()->tenant->domain.'/wallet/index')->with('flash_message',  'settings saved');


     }

}