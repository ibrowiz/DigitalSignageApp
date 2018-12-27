<?php
namespace App\Http\Controllers\App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\ClientWallet;
use App\Models\User;
use App\Models\Point;
use App\Models\Bonus;
use App\Models\WalletLog;
use App\Models\ClientWalletLog;
use App\Models\TopUpTransaction;
use App\Models\BonusTransaction;
use DB;
use Session;

class WalletController extends Controller
{
		 public function __construct(){
            
    $this->middleware('auth');
    }
   
    public function index()
    {
        
         $wallet = Auth::user()->client->clientProfile->clientWallet;



         $trans = Auth::user()->client->topUpTransactions->sortByDesc('id')->take(10);

         //dd($trans); 

        //$user = User::where('email',Auth::user()->email)->first();

        /* $user = DB::table('client_profiles')->join('users', 'client_profiles.name', '=', 'users.name')
            ->select('client_profiles.id', 'client_profiles.name', 'client_profiles.address','users.email','users.tenant_id','users.tenant_domain')->distinct()->where('users.email',Auth::user()->email)->first();
       

        $wallet = Wallet::where('assignable_type','App\Models\ContentOwner')->where('assignable_id',$user->id)->first();    
        $point  = Point::where('user_id',$user->id)->where('user_type','ContentOwner')->first();
        $bonus = ContentOwnerBonus::where('user_id',$user->id)->first();
        $creditLogs = CreditLogs::where('assignable_type','App\Models\ContentOwner')->where('assignable_id',$user->id)->orderBy('id','DESC')->take(10)->get();
         $pointLogs = PointLog::where('pointable_type','App\Models\ContentOwner')->where('pointable_id',$user->id)->orderBy('id','DESC')->take(10)->get();*/
        //return view('app.contentowner.wallet', compact('wallet','point','creditLogs','user','bonus','pointLogs'));
         return view('app.client.wallet', compact('wallet','trans'));
    }


    public function assignPoint(Request $request,$domain,$id){
  

    $wallet = Auth::user()->client->clientProfile->clientWallet;
           
    $wallet->cash -= $request->input('amount');
    $wallet->point += $request->input('amount');
    $wallet->update();

    $transaction =  new TopUpTransaction;
    $transaction->type = 'point purchase';
    $transaction->amount = $request->input('amount');
    $transaction->balance = $wallet->cash;
    $transaction->currency_id = 1;
    $transaction->assignable_type = 'App\Models\Client';
    $transaction->assignable_id = Auth::user()->client->id;
    $transaction->save();


    $log = new ClientWalletLog;
    $log->client_wallet_id = $wallet->id;
    $log->action = 'bought '.$request->input('amount').' points';
    $log->transaction_id = $transaction->id;
    $log->type = 'point';
    $log->amount = $request->input('amount');
    $log->status = 'success';
    $log->wallet_worth = $wallet->cash;
    $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
    $log->last_wallet_log = $last->id;
    $ops =array('type'=>'point','amount'=>$request->input('amount'));
    $log->operation = json_encode($ops);
    $log->save();
    //return redirect('contentowner/wallet/index')->with('flash_message', ' '.$request->input('points').' points aquired');  

    return redirect('client/'.Auth::user()->client->tenant->domain.'/wallet/index')->with('flash_message',' '.$request->input('amount').' points aquired');

     }


    public function convertBonusToPoint(Request $request,$domain,$id)

    {
      if($request->input('convertbonus') == "point")
          {
            $wallet = Auth::user()->client->clientProfile->clientWallet;
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
                $bonusTransaction->assignable_type = 'App\Models\Client';
                $bonusTransaction->assignable_id = Auth::user()->client->id;
                $bonusTransaction->save();
                $walletLog = new WalletLog;
                $walletLog->wallet_id = Auth::user()->client->clientProfile->clientWallet->id;
                $walletLog->action = 'added '.Session::get('bonus').'points';
                $walletLog->transaction_id = $bonusTransaction->id;
                $walletLog->type = 'bonus';
                $walletLog->amount = Session::get('bonus');
                $walletLog->status = 'successful';
                $walletLog->wallet_worth = $wallet->cash;
                $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
                $walletLog->last_wallet_log = $last->id;
                $ops =array('type'=>'bonus','amount'=>Session::get('bonus'));
                $walletLog->operation = json_encode($ops);
                $walletLog->save();

                    return back()->with('flash_message', Session::get('bonus').' points aquired');
                }
                else
                {
                    return back()->with('danger_message','Zero balance');
                }
        }
        else
                {

                    $wallet = Auth::user()->client->clientProfile->clientWallet;
                    //Session::put('bonus',$wallet->bonus);
                    if(($wallet->bonus)>0)
                    {

                        $wallet->cash += $wallet->bonus;
                        $wallet->update();
                        $topUpTransaction = new TopUpTransaction;
                        $topUpTransaction->amount = $wallet->bonus;
                        $topUpTransaction->currency_id = 1;
                        $topUpTransaction->balance = $wallet->cash;
                        $topUpTransaction->assignable_type = 'App\Models\Client';
                        $topUpTransaction->assignable_id = Auth::user()->client->id;
                        $topUpTransaction->save();
                        $walletLog = new ClientWalletLog();
                        $walletLog->client_wallet_id = Auth::user()->client->clientProfile->clientWallet->id;
                        $walletLog->action = 'bonus '.$wallet->bonus;
                        $walletLog->transaction_id = $topUpTransaction->id;
                        $walletLog->type = 'bonus';
                        $walletLog->amount = $wallet->bonus;
                        $walletLog->status = 'successful';
                        $walletLog->wallet_worth = $wallet->cash;
                        $last = Auth::user()->client->clientProfile->clientWallet->clientWalletLogs->last();
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
         //$wallet = Wallet::where('assignable_type','App\Models\ContentOwner')->where('assignable_id',$id)->first(); 
        $wallet = Auth::user()->client->clientProfile->clientWallet;

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

                 return redirect('client/'.Auth::user()->client->tenant->domain.'/wallet/index')->with('flash_message',  'settings saved');


     }

}