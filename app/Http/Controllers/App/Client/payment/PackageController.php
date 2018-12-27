<?php
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
use App\Models\Plan;
use App\Services\Payment\Interswitch\Interswitch;
use File;
use auth;
use DB;
use Session;


class PackageController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
      $plans = Plan::all();
      $basic = $plans[0];
      $standard = $plans[1];
      $premium = $plans[2];
    	return view('app.client.plans',compact('basic','standard','premium'));
    }

    public function quantity($domain,$id)
    {

      $plan = Plan::find($id);
      return view('app.client.packages.device-quantity',compact('plan'));

    }

    public function store(Request $request)
    {

      $this->validate($request, 
      [
            'quantiy' => 'required|integer',
            
            ]);

      $accountPackage = new AccountPlan;

      $accountPackage->client_id = Auth::user()->client->id;

      $accountPackage->plan_id = $request->planId;

      $accountPackage->device_quantity = $request->quantity;

      $accountPackage->total_amount = $request->total;

      $accountPackage->save();

    }
}