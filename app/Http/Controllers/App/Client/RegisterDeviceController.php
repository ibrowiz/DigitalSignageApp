<?php

namespace App\Http\Controllers\App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use Auth;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class RegisterDeviceController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
    
         return view('app.client.device.register');
    }


    public function updateDevice(Request $request){

        $this->validate($request, [
            'registrationId' => 'required',
        ]);

        $tenant = TenantManager::get();

        $data = array(
            'status' =>1,
            'assignable_type' => 'App\Models\User',
            'assignable_id' => Auth::user()->id,
         );

        $device = Device::where('uu_id', $request->registrationId)->first();

        if(empty($device))
        {

            return redirect('client/'.$tenant->domain.'/registerdevice')->with('danger_message', "device does not exist ");

        }


        elseif($device->status == null)
        {
            //dd(Auth::user()->client->id);

            $device->status = 1;
            $device->assignable_id = Auth::user()->client->id;
            $device->assignable_type = 'App\Models\Client';
            //$device->media_partner = Auth::user()->tenant_id;
            
            $device->update();



            return redirect('client/'.$tenant->domain.'/registerdevice')->with('flash_message', "device registration successful");
        }
        elseif($device->status == 1)

        {
            //dd(Auth::user()->client->id);

            return redirect('client/'.$tenant->domain.'/registerdevice')->with('danger_message', "device already registered ");
        }

        else{}
            
           

    }

  /*    public function create()
    {
         return view('app.device.add');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function register(Request $request)
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
        
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'serial_no' => 'required|string|max:255'
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
                //return redirect('devicegroup.index');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
