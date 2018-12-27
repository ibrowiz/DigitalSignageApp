<?php

namespace App\Http\Controllers\App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Device;
use App\Models\SavedTemplates;
use App\Models\Country;
use App\Models\Content;
use App\Models\Template;
use App\Models\DeviceGroup;
use App\Models\BusinessType;
use App\Models\BusinessCategory;
use App\Models\ContentCategory;
use App\Models\DeviceSetting;
use App\Models\StandardDeviceTemplate;
use App\Models\Location;
use App\Models\StandardDeviceSetting;
use DB;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class DeviceController extends Controller
{

    public function __construct(){
    $this->middleware('auth');
    }
   
    public function index()
    {
        //$id = Auth::user()->id;
        //$tenant = Auth::user()->tenant_id;
        $devices = Auth::user()->client->devices;
      
        return view('app.client.device.index', compact('devices'));
    }

      public function create()
    {
        $deviceGroups = DeviceGroup::get();
         return view('app.device.add',compact('deviceGroups'));
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

        return view('app.client.device.settings-home', compact('device','contentCategories','countries','templates','locations','contents'));
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
        //return redirect('/user/device/settings/'.$device->id)->with('flash_message', 'Settings Updated');
        $tenant = TenantManager::get();
        return redirect('/client/'.$tenant->domain.'/devices')->with('flash_message', 'Settings Updated');
        ///return redirect('/user/device/index')->with('flash_message', 'Settings Updated');
    }

       
    public function applySavedTemplate(Request $request)
    {
        $deviceId = $request->input('savedtemplate');

        $templateSetting = DeviceSetting::where('device_id',$deviceId)->first();

        $setDevice = DeviceSetting::where('device_id',$request->input('deviceId'))->first();

        $templateDeviceAllowedContents = DB::table('device_content')->where('device_id',$templateSetting->device_id)->get();

        $targerDeviceAllowedContents = DB::table('device_content')->where('device_id',$request->input('deviceId'))->get();
        
        $templateDeviceFlaggedContents = DB::table('device_flagged_content')->where('device_id',$templateSetting->device_id)->get();

        $targerDeviceFlaggedContents = DB::table('device_flagged_content')->where('device_id',$request->input('deviceId'))->get();
            //return dd($templateSetting->business_type_id);

          $data = array(
            'user_id' => $templateSetting->user_id,
            'device_id' => $setDevice->device_id,
            'business_category_id' => $templateSetting->business_category_id,
            'business_type_id' => $templateSetting->business_type_id,
            'public_content_allowed' => $templateSetting->public_content_allowed,
            'country_id' => $templateSetting->country_id,
            'state_id' => $templateSetting->state_id,
            'city' => $templateSetting->city,
         );

          DeviceSetting::where('device_id',$setDevice->device_id)->first()->update($data);

           
          if($targerDeviceAllowedContents->count() < 1){
            foreach($templateDeviceAllowedContents as $templateDeviceAllowedContent) {
                $arrData = array( 
                'device_id'        => $setDevice->device_id,
                'content_id'        => $templateDeviceAllowedContent->content_id,                         
            );

                DB::table('device_content')->insert($arrData);
            }

          }else{
            DB::table('device_content')->where('device_id',$request->input('deviceId'))->delete();

            foreach($templateDeviceAllowedContents as $templateDeviceAllowedContent) {
                $arrData = array( 
                'device_id'        => $setDevice->device_id,
                'content_id'        => $templateDeviceAllowedContent->content_id,                         
            );
                DB::table('device_content')->insert($arrData);
          }
      }

        if($targerDeviceFlaggedContents->count() < 1){
            foreach($templateDeviceFlaggedContents as $templateDeviceFlaggedContent) {
                $arrData = array( 
                'device_id'        => $setDevice->device_id,
                'flg_content_id'        => $templateDeviceFlaggedContent->flg_content_id,                         
            );

                DB::table('device_flagged_content')->insert($arrData);
            }

          }else{
            DB::table('device_flagged_content')->where('device_id',$request->input('deviceId'))->delete();

            foreach($templateDeviceFlaggedContents as $templateDeviceFlaggedContents) {
                $arrData = array( 
                'device_id'        => $setDevice->device_id,
                'flg_content_id'        => $templateDeviceAllowedContent->flg_content_id,                         
            );
                DB::table('device_flagged_content')->insert($arrData);
          }
      }

             return back()->with('flash_message', 'Template Applied');
        
    }

    public function applyStantardTemplate(Request $request)
    {
            //return dd($request->input('standardDeviceTemplates'));
        $templateId = $request->input('standardDeviceTemplates');

         $standardDeviceSetting = StandardDeviceSetting::where('template_id',$templateId)->first();



         $targetDevice = DeviceSetting::where('device_id',$request->input('deviceId'))->first();

          $standardTemplateAllowedContents = DB::table('standard_device_settings_content')->where('setting_id',$standardDeviceSetting->id)->get();

        $targertDeviceAllowedContents = DB::table('device_content')->where('device_id',$request->input('deviceId'))->get();


        $standardTemplateFlaggedContents = DB::table('standard_device_settings_flaggedcontent')->where('setting_id',$standardDeviceSetting->id)->get();

        $targerDeviceFlaggedContents = DB::table('device_flagged_content')->where('device_id',$request->input('deviceId'))->get();

         $data = array(
            'user_id' => $targetDevice->user_id,
            'device_id' => $targetDevice->device_id,
            'business_category_id' => $standardDeviceSetting->business_category_id,
            'business_type_id' => $standardDeviceSetting->business_type_id,
            'public_content_allowed' => $standardDeviceSetting->public_content_allowed,
            'country_id' => $targetDevice->country_id,
            'state_id' => $targetDevice->state_id,
            'city' => $targetDevice->city,
         );

          DeviceSetting::where('device_id',$targetDevice->device_id)->first()->update($data);

          if($targertDeviceAllowedContents->count() < 1){
            foreach($standardTemplateAllowedContents as $standardTemplateAllowedContent) {
                $arrData = array( 
                'device_id'        => $targetDevice->device_id,
                'content_id'        => $standardTemplateAllowedContent->content_id,                         
            );

                DB::table('device_content')->insert($arrData);
            }

          }else{
            DB::table('device_content')->where('device_id',$request->input('deviceId'))->delete();

            foreach($standardTemplateAllowedContents as $standardTemplateAllowedContent) {
                $arrData = array( 
                'device_id'        => $targetDevice->device_id,
                'content_id'       => $standardTemplateAllowedContent->content_id,                         
            );
                DB::table('device_content')->insert($arrData);
          }
      }


         if($targerDeviceFlaggedContents->count() < 1){
            foreach($standardTemplateFlaggedContents as $standardTemplateFlaggedContent) {
                $arrData = array( 
                'device_id'        => $targetDevice->device_id,
                'flg_content_id'        => $standardTemplateFlaggedContent->flg_content_id,                         
            );

                DB::table('device_flagged_content')->insert($arrData);
            }

          }else{
            DB::table('device_flagged_content')->where('device_id',$request->input('deviceId'))->delete();

            foreach($standardTemplateFlaggedContents as $standardTemplateFlaggedContent) {
                $arrData = array( 
                'device_id'        => $targetDevice->device_id,
                'flg_content_id'        => $standardTemplateFlaggedContent->flg_content_id,                         
            );
                DB::table('device_flagged_content')->insert($arrData);
          }
      }


         return back()->with('flash_message', 'Template Applied');

      }


  }




