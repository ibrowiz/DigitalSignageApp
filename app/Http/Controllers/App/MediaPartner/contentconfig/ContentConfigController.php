<?php

namespace App\Http\Controllers\App\MediaPartner\contentconfig;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Wallet;
use App\Models\Point;
use App\Models\PointLog;
use App\Models\BusinessCategory;
use App\Models\ContentCategory;
use App\Models\Location;
use App\Models\Country;
use App\Models\Content;
use App\Models\Device;
use DB;

class ContentConfigController extends Controller
{


     public function __construct(){

        $this->middleware('auth:operator');
    }
   

    public function configureindex()
    {
         
        $contentCategories = ContentCategory::all();
        $contents = Content::all();
        $countries = Country::all();
          return view('app.mediapartner.content.create', compact('contentCategories','countries','contents'));
    }

    

    public function submitconfig(Request $request)
    {
         /*$this->validate($request,[
            'contCategory' => 'required',
            'content' =>'required',
            'country' => 'required',
            ]);*/

        /*$devices = DB::table('devices')
        ->join('device_settings', 'devices.id', '=', 'device_settings.device_id')
        ->join('device_content', 'devices.id', '=', 'device_content.device_id')
        ->select('devices.device_name', 'devices.status', 'device_content.content_id','device_content.status','device_settings.public_content_allowed','device_settings.country_id','device_settings.city')
        ->where('devices.status',1)
        ->where('device_content.status',1)
        ->where('device_settings.country_id', $request->input('country'))->get();*/

        //$content =  $request->input('content');

        $devices = Device::with('content')->get();

        return $devices;



    }

   
}
