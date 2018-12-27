<?php
namespace App\Http\Controllers\App\MediaPartner\credit;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\ContentOwnerWallet;
use App\Models\ContentOwnerCreditLogs;
use App\Models\ClientProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use auth;
use DB;

class ContentOwnerCreditController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:operator');
    }

  public function index(){

		  //$admin = Admin::where('id',Auth::user()->id)->first();
      $tenant = Tenant::where('domain',Auth::user()->tenant_domain)->first();

		  $contentOwners = DB::table('client_profiles')->join('users','client_profiles.id','=','users.client_id')->select('client_profiles.id','client_profiles.name','users.email','users.tenant_domain','users.tenant_id')->where('users.tenant_domain',$tenant->domain)->distinct()->get();

      
	   return view('app.tenant.credit.content-owner-index',compact('contentOwners'));
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

    return redirect('mediapartner/contentowner/credit/index')->with('flash_message', 'N'.$request->input('amount').' added to '.$clientProfile->name);  

     }
   }