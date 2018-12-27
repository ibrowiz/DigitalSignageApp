<?php
namespace App\Http\Controllers\App\Client\payment;
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

class PaymentPendingActvnController extends Controller
{ 
 public function __construct()
    {
        $this->middleware('auth:operator');
    }


    public function index()
    {

    	return view('app.tenant.payment.index');
    }

}