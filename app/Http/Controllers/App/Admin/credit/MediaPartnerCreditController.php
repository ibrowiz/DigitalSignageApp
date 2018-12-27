<?php
namespace App\Http\Controllers\App\Admin\credit;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\MediaPartnerWallet;
use App\Models\MediaPartnerCreditLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use auth;
use DB;


class MediaPartnerCreditController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index(){

		  $admin = Admin::where('id',Auth::user()->id)->first();
		  $tenants = Tenant::all();
	   return view('admin.credit.media-partner-index',compact('tenants','admin'));
}

 public function assign(Request $request, $id){

    $wallet = MediaPartnerWallet::where('media_partner_id',$id)->first();

    //$wallet = DB::table('content_owner_wallets')->where('content_owner_id',$id)->lockForUpdate()->first();
    
    $tenant = Tenant::find($id);
    
  	$wallet->media_partner_id = $tenant->id;

	  $wallet->amount += 	$request->input('amount');

    $wallet->last_transaction = $request->input('amount');

    $wallet->last_transaction_type = 'credit-top-up';

    $wallet->update();

    $log = new MediaPartnerCreditLogs;

    $log->media_partner_id = $wallet->media_partner_id;

    $log->media_partner_email = $tenant->email;

    $log->senders_id = Auth::user()->id;

    $log->senders_email = Auth::user()->email;

    $log->amount = $wallet->last_transaction;

    $log->balance = $wallet->amount;

    $log->last_transaction_type = 'credit-top-up';

    $log->save();

    return redirect('/admin/media-partner/credit/index')->with('flash_message', 'N'.$request->input('amount').' added to '.$tenant->name);  

     }
   }