<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Models\Point;
use App\Models\Wallet;
use App\Models\PointLog;

use App\Models\ContentOwnerBonus;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        /*$user = DB::table('client_profiles')->join('users', 'client_profiles.name', '=', 'users.name')
            ->select('client_profiles.id', 'client_profiles.name', 'client_profiles.address','users.email','users.tenant_id','users.tenant_domain')->distinct()->where('users.email',Auth::user()->email)->first();*/
         //return dd($tenant);
        /* $point  = Point::where('user_id',$user->id)->where('user_type','ContentOwner')->first();
         $bonus = ContentOwnerBonus::where('user_id',$user->id)->first();
        $wallet = Wallet::where('assignable_id',$user->id)->where('assignable_type','App\Models\ContentOwner')->first();*/
      /*  if($wallet->bonus_flag == 1)
        {

            $point->total_point += $bonus->total_point;

            $point->last_added_point = $bonus->total_point; 

            $point->update();

             $pointLog = new PointLog;

             $pointLog->pointable_id = $user->id;

             $pointLog->pointable_type = 'App\Models\ContentOwner';

             $pointLog->total_point = $point->total_point;

             $pointLog->last_added_point = $bonus->total_point;

             $pointLog->type_of_transaction = 'bonus';

             $pointLog->save();

            
        }*/

        return view('home');
    }

    
}
