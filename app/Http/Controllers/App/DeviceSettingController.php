<?php

namespace App\Http\App\Controllers;

use App\DeviceSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DeviceSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function settingsIndex($id)
    {

        $businessTypes = BusinessType::get();
        $device = Device::find($id);
        $contentCategories = ContentCategory::get();
        

        return view('app.device.settings-index', compact('businessTypes','device','contentCategories'));
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeviceSetting  $deviceSetting
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceSetting $deviceSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeviceSetting  $deviceSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceSetting $deviceSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeviceSetting  $deviceSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeviceSetting $deviceSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeviceSetting  $deviceSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceSetting $deviceSetting)
    {
        //
    }
}
