<?php

namespace App\Http\Controllers\App\MediaPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeviceGroup;
use App\Models\Template;
use Auth;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class DeviceGroupController extends Controller
{

    public function __construct() {
        $this->middleware('auth:operator');
    }
    
    
    public function index()
    { 
        return view('app.mediapartner.devicegroup.index');
    }

    
    public function create()
    {
        $templates = Template::all();
        //dd($templates);
        return view('app.mediapartner.devicegroup.create',compact('templates'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'label' => 'required|string|max:30',
            'description' => 'required|string|max:255',
        ]);

        $tenant = TenantManager::get();
        
        $deviceGroup = new DeviceGroup;
        $deviceGroup->assignable_type = 'App\Models\Tenant';
        $deviceGroup->assignable_id = $tenant->id;
        $deviceGroup->name = $request->input('name');
        $deviceGroup->label = $request->input('label');
        $deviceGroup->description = $request->input('description');
        $deviceGroup->save();


         if($request->has('device'))
            {

                $deviceGroup->devices()->sync($request->device);

            }

            $tenant = TenantManager::get();

        return redirect('mediapartner/'.$tenant->domain.'/devicegroups')->with('flash_message', "saved");
        
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
    public function edit($domain,$id)
    {
       
        $deviceGroup = DeviceGroup::find($id);
        $templates = Template::all();

        return view('app.mediapartner.devicegroup.edit', compact('deviceGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $domain, $id)
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

        $tenant = TenantManager::get();
        return redirect('mediapartner/'.$tenant->domain.'/devicegroups')->with('flash_message', 'device Updated');
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
