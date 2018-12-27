<?php

namespace App\Http\Controllers\App\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Device;
use App\Models\Admin;

class DeviceController extends Controller
{

    public function __construct(){
    $this->middleware('auth:admin');
    }
    
    public function index()
    {
       // $id = Auth::guard('admin')->user()->id;
        $admin = Admin::where('id',Auth::user()->id)->first();
         //$devices = Device::where('assignable_id',$id)->where('status', 1)->get();
         $devices = Device::all();
         return view('app.device.index', compact('devices','admin'));
    }

      public function create()
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
         return view('app.device.add',compact('admin'));
    }

  
    public function register(Request $request)
    {
        //$id = Auth::guard('operator')->user()->id;

       $this->validate($request, [
            'registrationId' => 'required',
            ]);

      // return dd(Auth::user());

        $data = array(
            'status' =>1,
            'assignable_type' => 'App\Models\Operator',
            'assignable_id' => Auth::user()->id,
         );
           $device = Device::where('registration_id',$request->registrationId)->first();

         // $device = Device::where('registration_id',$request->registrationId)->where('status',1)->where('assignable_id',$id)->first();

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
            'name' => 'required|string|max:15|unique:devices,device_name',
            'serial_no' => 'required|string|size:10',
            'uuID' => 'required|string|size:4|unique:devices,uu_id',
            'firmwareId' => 'required|string|size:7|unique:devices,firmware_id',
            'version' => 'required|string',
        ]);

        $data = $request->all();

        Device::create([
            'device_name' => $data['name'],
            'serial_no' => $data['serial_no'],
            'uu_id' => $data['uuID'],
            'firmware_id' => $data['firmwareId'],
            'version' => $data['version'],
            'description' => $data['description'],
        ]);
                return redirect('admin/device/index');
    }

}
