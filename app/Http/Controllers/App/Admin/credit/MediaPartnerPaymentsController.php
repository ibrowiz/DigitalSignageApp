<?php
namespace App\Http\Controllers\App\Admin\Credit;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\PaymentPendingActivation;
use App\Models\ContentOwnerCreditLogs;
use App\Models\ClientProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Point;
use auth;
use App\Models\CreditLogs;
use App\Models\PointLog;
use DB;

class MediaPartnerPaymentsController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

    	$admin = Admin::where('id',Auth::user()->id)->first();

    	$payPendActvns = PaymentPendingActivation::where('approval_status','0')->where('decline_status','0')->orderBy('id','DESC')->get();

    	return view('admin.credit.non-activated-payments-index',compact('payPendActvns','admin'));
    }

    public function approve($id){
    	$payPendActvn = PaymentPendingActivation::find($id);
        $user = User::where('email',$payPendActvn->user_name)->first();
        $point  = Point::where('user_id',$user->client_id)->where('user_type','ContentOwner')->first();
    	if(($payPendActvn->user_type != null) && ($payPendActvn->user_type == 'App\Models\contentOwner')){
    	if($payPendActvn->approval_revert_status == 0){
    		$payPendActvn->approval_status = '1';
    		$wallet = Wallet::where('assignable_type','App\Models\ContentOwner')->where('assignable_id',$user->client_id)->first();
        
            if($payPendActvn->point_flag == 0){

                		$wallet->amount += $payPendActvn->amount;
                		$wallet->last_transaction = $payPendActvn->amount;
                		$wallet->last_transaction_type = 'Credit Purchase';
                        $wallet->update();

                		$log = new CreditLogs;
                		$log->assignable_id = $wallet->assignable_id;
                		$log->assignable_type = $wallet->assignable_type;
                		$log->amount = $wallet->last_transaction;
                		$log->balance = $wallet->amount;
                		$log->transaction_type = 'Credit Purchase';
                		$log->approvedBy = Auth::user()->email;		
                		$log->save();
                    }else{
                            $point->last_added_point += $payPendActvn->amount;
                            $point->total_point += $payPendActvn->amount;
                            $point->update();

                            $pointLog = new PointLog;

                            $pointLog->pointable_id = $user->id;

                            $pointLog->pointable_type = 'App\Models\ContentOwner';

                            $pointLog->total_point = $point->total_point;

                            $pointLog->last_added_point = $payPendActvn->amount;;

                            $pointLog->type_of_transaction = 'Express purchase of points point';

                            $pointLog->save();
                                    
                        }
                    $payPendActvn->update();
                }
                else
                {

                  $payPendActvn->approval_revert_status = 0;
                  $payPendActvn->approval_status = '1';
                  $payPendActvn->update();
                }
    		
    		}
    		else{
                    if($payPendActvn->approval_revert_status == 0){
                            $payPendActvn->approval_status = '1';

                            $tenant = Tenant::where('email',$payPendActvn->user_name)->first();
                            $point  = Point::where('user_id',$tenant->id)->where('user_type','MediaPartner')->first();
                            $wallet = Wallet::where('assignable_type','App\Models\MediaPartner')->where('assignable_id',$tenant->id)->first();
                             //return dd($payPendActvn->amount.'/'. $wallet->amount);
                        if($payPendActvn->point_flag == 0){
                            //return dd($payPendActvn->amount.'/'. $wallet->amount);
                            $wallet->amount += $payPendActvn->amount;

                            $wallet->last_transaction = $payPendActvn->amount;

                            $wallet->last_transaction_type = 'Credit Purchase';

                            $wallet->update();
                            
                            $log = new CreditLogs;

                            $log->assignable_id = $wallet->assignable_id;

                            $log->assignable_type = $wallet->assignable_type;

                            $log->amount = $wallet->last_transaction;

                            $log->balance = $wallet->amount;

                            $log->transaction_type = 'Credit Purchase';

                            $log->approvedBy = Auth::user()->email;  

                            $log->save();
                        }else{

                            $point->last_added_point += $payPendActvn->amount;
                            $point->total_point += $payPendActvn->amount;
                            $point->update();

                            $pointLog = new PointLog;

                            $pointLog->pointable_id = $tenant->id;

                            $pointLog->pointable_type = 'App\Models\MediaPartner';

                            $pointLog->total_point = $point->total_point;

                            $pointLog->last_added_point = $payPendActvn->amount;;

                            $pointLog->type_of_transaction = 'Express purchase of points point';

                            $pointLog->save();
                             }

                            

                            $payPendActvn->update();
                        }else
                             { 

                                $payPendActvn->approval_revert_status = 0;
                                $payPendActvn->approval_status = '1';
                                $payPendActvn->update();
                             }
    

            }
    	


    	return back()->with('flash_message', 'Approved');

    }

    public function decline($id){
    	$payPendActvn = PaymentPendingActivation::find($id);
    	$payPendActvn->decline_status = '1';
    	$payPendActvn->update();
    	return back()->with('flash_message', 'Declined');
    }

     public function revert($id)
       {
    	$payPendActvn = PaymentPendingActivation::find($id);
        if($payPendActvn->approval_status == 1)
          {
            
            	$payPendActvn->decline_status = '0';
            	$payPendActvn->approval_status = '0';
                $payPendActvn->approval_revert_status = 1;
            }
            else
            {
                
                $payPendActvn->decline_status = '0';
                $payPendActvn->approval_status = '0';
            }

    	$payPendActvn->update();
    	return redirect('/admin/payments-pending-approval')->with('flash_message', 'Reverted');
    }



    public function approved(){

    	$admin = Admin::where('id',Auth::user()->id)->first();

    	$payPendActvns = PaymentPendingActivation::where('approval_status','1')->orderBy('id','DESC')->get();

    	return view('admin.credit.approved',compact('payPendActvns','admin'));


    } 

    public function declined(){

    	$admin = Admin::where('id',Auth::user()->id)->first();

    	$payPendActvns = PaymentPendingActivation::where('decline_status','1')->orderBy('id','DESC')->get();

    	return view('admin.credit.declined',compact('payPendActvns','admin'));


    } 


}