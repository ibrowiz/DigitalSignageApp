<?php

namespace App\Http\Controllers\App\MediaPartner;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use Auth;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class RegisterDeviceController extends Controller
{
   

    public function __construct() {
        $this->middleware('auth:operator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
    
         return view('app.mediapartner.device.register');
    }


    public function updateDevice(Request $request){

        $this->validate($request, [
            'registrationId' => 'required',
        ]);

        $tenant = TenantManager::get();

        $data = array(
            'status' =>1,
            'assignable_type' => 'App\Models\Tenant',
            'assignable_id' => $tenant->id,
         );

        $device = Device::where('uu_id', $request->registrationId)->first();

        if(empty($device))
        {
                
            return redirect('/mediapartner/'.$tenant->domain.'/registerdevice')->with('danger_message', "device does not exist ");

        }


        elseif($device->status == null)
        {
        
            $device->status = 1;
            $device->assignable_id = $tenant->id;
            $device->assignable_type = 'App\Models\Tenant';
            //$device->media_partner = Auth::user()->tenant_id;
            
            $device->save();
            

            return redirect('/mediapartner/'.$tenant->domain.'/registerdevice')->with('flash_message', "device registration successful");
        }
        elseif($device->status == 1)

        {
            

            return redirect('/mediapartner/'.$tenant->domain.'/registerdevice')->with('danger_message', "device already registered ");
        }

        else{}
            
           

    }


}
