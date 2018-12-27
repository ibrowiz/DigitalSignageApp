<?php

namespace App\Http\Controllers\App\MediaPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Device;
use App\Models\Content;
use App\Models\SavedTemplates;
use App\Models\Country;
use App\Models\DeviceGroup;
use App\Models\BusinessType;
use App\Models\BusinessCategory;
use App\Models\ContentCategory;
use App\Models\DeviceSetting;
use App\Models\Template;
use App\Models\Location;
use App\Models\StandardDeviceSetting;
use DB;
use ErrorException;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class DeviceController extends Controller
{

    protected $setting;

    public function __construct(){
    $this->middleware('auth:operator');
    }
   
    public function index()
    {   
         return view('app.mediapartner.device.index');
    }

      public function create()
    {
         return view('app.device.add');
    }


    public function settingsIndex($domain,$id)
    {
        $contents = Content::all();  
        $device = Device::find($id);
        $contentCategories = ContentCategory::all();
        $countries = Country::all();
        $locations = Location::all();

        $templates = Template::all();

        $setting = DeviceSetting::where('device_id',$id)->first(); 
      
        if(is_null($setting))
        {
          
            $deviceSetting  = new DeviceSetting;
            $deviceSetting->device_id = $id;
            $deviceSetting->content_category_id = 0;
            $deviceSetting->content_id = 0;
            $deviceSetting->public_content_allowed= 0;
            $deviceSetting->country_id = 0;
            $deviceSetting->location_id = 0;
            $deviceSetting->city = null;
            $deviceSetting->save();
        } 
       

        return view('app.mediapartner.device.settings-home', compact('device','contentCategories','countries','templates','locations','contents'));
    }


     public function updateSetting(Request $request,$domain,$id)
    {

 
         $device = Device::find($id);
         
         $setting = $device->deviceSetting;
          
         $setting->content_category_id = $request->contentCategory;
         
         $setting->content_id = $request->contents;

         $setting->public_content_allowed = $request->has('publicContent');
         $setting->country_id = $request->country;
         $setting->location_id =  $request->state;
         $setting->city = $request->city;

         $setting->update();
        
        $device->contents()->detach();

        foreach ($request->content as $index => $content) {
            $device->contents()->save(Content::find($content), ['status' => $request->status[$index]]);
        }

       
          $tenant = TenantManager::get();
        return redirect('/mediapartner/'.$tenant->domain.'/devices')->with('flash_message', 'Settings Updated');

      }

   
    public function register(Request $request)
    {
       $this->validate($request, [
            'registrationId' => 'required',
            ]);

        $tenant = TenantManager::get();
        return dd($tenant);
        $data = array(
            'status' =>1,
            'assignable_type' => 'App\Models\Tenant',
            'assignable_id' => $tenant->id,
         );
           $device = Device::where('registration_id',$request->registrationId)->first();

           if($device){
                $device->update($data);
                return redirect()-route('device.index');
           }

           else{
            return "device not found";
           }
        
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'serial_no' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = $request->all();

        DeviceGroup::create([
            'device_name' => $data['name'],
            'serial_no' => $data['serial_no'],
            'uu_id' => $data['uuID'],
            'firmware_id' => $data['firmwareId'],
            'version' => $data['version'],
            'description' => $data['description'],
        ]);

        return 'saved';
              
    }


    public function applyTemplate(Request $request,$domain)
    {

        $id = $request->template_id;

        $template = Template::find($id);

        $device = Device::find($request->deviceId);
        
        $deviceSettings = DeviceSetting::where('device_id',$request->deviceId)->first();

        $deviceSettings->content_category_id = $template->content_category_id;

        $deviceSettings->content_id = $template->content_id;

        $deviceSettings->public_content_allowed = $template->public_content_allowed;

        //dd($deviceSettings);

        $deviceSettings->update();
        
        $device->contents()->detach();



        foreach ($template->contents as $index => $content) {
            $device->contents()->save($content, ['status' => $content->pivot->status]);
        }


        /*$tenant = TenantManager::get();
        return redirect('/mediapartner/'.$tenant->domain.'/device/settings/'.{id})->with('flash_message', 'Settings Updated');*/
        
        

    }



    /* public function getOperatorBusinessTypeList(Request $request)
    {
        $business = BusinessType::where("business_category_id",$request->business_category_id)
                    ->pluck("name","id");
        return response()->json($business);
    }*/
}
