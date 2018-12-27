<?php
namespace App\Http\Controllers\App\Admin\credit;
use App\Models\Admin;
use App\Models\ClientProfile;
use App\Models\ContentOwnerWallet;
use App\Models\ContentOwnerCreditLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use auth;
use DB;


class CreditController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index(){

		  $admin = Admin::where('id',Auth::user()->id)->first();


		  $contentOwners = DB::table('client_profiles')->join('users','client_profiles.id','=','users.client_id')->select('client_profiles.id','client_profiles.name','users.email','users.tenant_domain','users.tenant_id')->get();
	   return view('admin.credit.index',compact('admin','contentOwners'));
}

 public function assign(Request $request, $id){

    $wallet = ContentOwnerWallet::where('content_owner_id',$id)->first();

    //$wallet = DB::table('content_owner_wallets')->where('content_owner_id',$id)->lockForUpdate()->first();
    
    $clientProfile = ClientProfile::find($id);
    
  	$wallet->content_owner_id = $clientProfile->id;

	  $wallet->amount += 	$request->input('amount');

    $wallet->last_transaction = $request->input('amount');

    $wallet->update();

    $log = new ContentOwnerCreditLogs;

    $log->content_owner_id = $wallet->content_owner_id;

    $contentOwner = User::where('client_id', $clientProfile->id)->first();

    //return dd($contentOwner);



    $log->content_owner_email = $contentOwner->email;

    $log->senders_id = Auth::user()->id;

    $log->senders_email = Auth::user()->email;

    $log->amount = $wallet->last_transaction;

    $log->balance = $wallet->amount;

    $log->save();

    return redirect('/admin/credit/index')->with('flash_message', 'N'.$request->input('amount').' added to '.$clientProfile->name);  

     }
   }