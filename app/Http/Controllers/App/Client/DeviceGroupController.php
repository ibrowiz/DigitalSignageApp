<?php

namespace App\Http\Controllers\App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeviceGroup;
use Auth;

class DeviceGroupController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        //$deviceGroups = DeviceGroup::all();

        $deviceGroups = Auth::user()->deviceGroups;
        return view('app.client.devicegroup.index', compact('deviceGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $devices = Auth::user()->client->devices;
        return view('app.devicegroup.add',compact('devices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'label' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);

        //$data = $request->all();
        //
        $deviceGroup = new DeviceGroup;
        $deviceGroup->assignable_type = 'App\Models\User';
        $deviceGroup->assignable_id = Auth::user()->id;
        $deviceGroup->name = $request->input('name');
        $deviceGroup->label = $request->input('label');
        $deviceGroup->description = $request->input('description');
        $deviceGroup->save();

       /* $deviceGroup = DeviceGroup::create([
            'assignable_type' => 'App\Models\User',
            'assignable_id' => Auth::user()->id,
            'name' => $data['name'],
            'label' => $data['label'],
            'description' => $data['description'],
        ]);*/

         if($request->has('device')){

            // foreach($request->permission as $perm){
            //  $perm = Permission::find($perm);
            //  $role->give($perm);

            // }

            $deviceGroup->devices()->sync($request->device);

        }


        return redirect('/user/devicegroup/index')->with('flash_message', "saved");
        
    }

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
       $devices = Auth::user()->devices;

        $deviceGroup = DeviceGroup::with('devices')->find($id);

        return view('app.devicegroup.edit', compact('devices','deviceGroup'));
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
        $this->validate($request,[
            'name' => 'required',
            'label' =>'required',
            'description' => 'required',
                ]);
                
            $details = $request->all();

        $deviceGroup = DeviceGroup::find($id);

        $deviceGroup->name = $details['name'];
        $deviceGroup->label = $details['label'];
        $deviceGroup->description = $details['description'];
        $deviceGroup->update();
        if($request->has('device')){


            $deviceGroup->devices()->sync($request->device);

        } 
        else{
            $deviceGroup->devices()->detach();
        }

        return redirect('/user/devicegroup/index')->with('flash_message', 'device Updated');
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
