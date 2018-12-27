<?php
namespace App\Http\Controllers\App\Client\payment;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\PaymentPendingActivation;
use App\Models\ContentOwnerCreditLogs;
use App\Models\ClientProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use auth;
use App\Models\CreditLogs;
use DB;

class ContentOwnerPaymentsController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

    	$admin = Admin::where('id',Auth::user()->id)->first();

    	$payPendActvns = PaymentPendingActivation::where('payable_type','App\Models\Operator')->where('approval_status','0')->where('decline_status','0')->orderBy('id','DESC')->get();

    	return view('admin.credit.non-activated-payments-index',compact('payPendActvns','admin'));
    }

    public function approve($id){
    	$payPendActvn = PaymentPendingActivation::find($id);
    	
    	if(($payPendActvn->user_type != null) && ($payPendActvn->user_type == 'App\Models\contentOwner')){
    	if($payPendActvn->approval_revert_status == 0){
    		$payPendActvn->approval_status = '1';

    		$user = User::where('email',$payPendActvn->user_name)->first();
    		$wallet = Wallet::where('assignable_type','App\Models\ContentOwner')->where('assignable_id',$user->client_id)->first();
    		$wallet->amount += $payPendActvn->amount;
    		$wallet->last_transaction = $payPendActvn->amount;
    		$wallet->last_transaction_type = 'Credit Purchase';
    		
    		$log = new CreditLogs;
    		$log->assignable_id = $wallet->assignable_id;
    		$log->assignable_type = $wallet->assignable_type;
    		$log->amount = $wallet->last_transaction;
    		$log->balance = $wallet->amount;
    		$log->transaction_type = 'Credit Purchase';
    		$log->approvedBy = Auth::user()->email;
    		$log->save();
    		$wallet->update();
    		$payPendActvn->update();
    		  }
                else
                {
                  $payPendActvn->approval_revert_status = 0;
                  $payPendActvn->approval_status = '1';
                  $payPendActvn->update();
                }
    		}
    		/*else{
                    if($payPendActvn->approval_revert_status == 0){
                     $payPendActvn->approval_status = '1';

                    $user = User::where('email',$payPendActvn->user_name)->first();
           
                    $wallet = Wallet::where('assignable_type','App\Models\ContentOwner')->where('assignable_id',$user->client_id)->first();

                    $wallet->amount += $payPendActvn->amount;

                    $wallet->last_transaction = $payPendActvn->amount;

                    $wallet->last_transaction_type = 'Credit Purchase';
                    
                    $log = new CreditLogs;

                    $log->assignable_id = $wallet->assignable_id;

                    $log->assignable_type = $wallet->assignable_type;

                    $log->amount = $wallet->last_transaction;

                    $log->balance = $wallet->amount;

                    $log->transaction_type = 'Credit Purchase';

                    $log->approvedBy = Auth::user()->email;  

                    $log->save();

                    $wallet->update();

                    $payPendActvn->update();
                 }else
                             {
                                return dd('in here');
                                $payPendActvn->approval_revert_status = 0;
                                $payPendActvn->approval_status = '1';
                                $payPendActvn->update();
                             }
    

            }*/
    	


    	return back()->with('flash_message', 'Approved');

    }

    public function decline($id){
    	$payPendActvn = PaymentPendingActivation::find($id);
    	$payPendActvn->decline_status = '1';
    	$payPendActvn->update();
    	return back()->with('flash_message', 'Declined');
    }

     public function revert($id){
    	$payPendActvn = PaymentPendingActivation::find($id);
        if($payPendActvn->approval_status = '1')
          {
                $payPendActvn->decline_status = '0';
                $payPendActvn->approval_status = '0';

                $payPendActvn->approval_revert_status = '1';
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

    	$payPendActvns = PaymentPendingActivation::where('payable_type','App\Models\Operator')->where('decline_status','1')->get();

    	return view('admin.credit.declined',compact('payPendActvns','admin'));


    } 


}