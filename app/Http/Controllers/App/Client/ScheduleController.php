<?php

namespace App\Http\Controllers\App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;
use File;
use App\Models\Resource;
use App\Models\Tenant;
use App\Models\Content;
use App\Models\Layout;
use App\Models\Schedule;
use App\Models\RepeatCycle;
use App\Models\Transition;
use App\Models\Device;
use App\Models\LayoutResource;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class ScheduleController extends Controller
{


    public function __construct(){

        $this->middleware('auth');
    }


    public function createSchedule()
    {
        $repeatCycles = RepeatCycle::get(['id', 'name'])->toArray();
        $transitions = Transition::get(['id', 'name'])->toJson();

        return view('app.client.schedules.create', ['repeatCycles'=>$repeatCycles, 'transitions'=>$transitions ]);
        
        // return view('app.mediapartner.layouts.index', ['layouts'=>$layouts]);
    }


    public function deviceSchedules()
    {
        print_r("device schedules");
        // return view('app.mediapartner.layouts.index', ['layouts'=>$layouts]);
    }

    public function createdSchedules()
    {
        print_r("created schedules");
        // return view('app.mediapartner.layouts.index', ['layouts'=>$layouts]);
    }

    public function save(Request $request)
    {
        $client_id = Auth::user()->client->id;
        //$tenant = Tenant::find($user->id);
        // print_r("schedule saved");
        $input = Input::only('title', 'start_time', 'repeat_cycle', 'expiration_date', 'duration', 'transition', 'device');

         $this->validate($request, [
            'title'=>'required|max:200',
            'start_time'=>'required',
            'repeat_cycle'=>'required',
            'expiration_date'=>'required',
            'layout.*.duration'=>'required|min:1',
            'layout.*.transition'=>'required',
            'device'=>'required',
        ]);

        $duration = 0;
        foreach ($request['layout'] as $item) {
            $duration += $item['duration'];
        }

        $schedule = Schedule::create(array(
                        'assignable_type' => 'App\Models\Client',  
                        'assignable_id' => $client_id, // default too
                        'name' => $request['title'],
                        'repeat_cycle_id' => $request['repeat_cycle'],
                        'start_time' => new \DateTime($request['start_time']),
                        'expiration_date' => new \DateTime($request['expiration_date']),
                        'duration' => $duration,
                    ));

        foreach ($request['device'] as $d) {
            $device = Device::find($d);
            $device->schedules()->save($schedule, ['status'=>'pending']);
        }

        foreach ($request['layout'] as $l) {
            $layout = Layout::find($l['id']);
            $layout->schedules()->save($schedule, ['duration'=>$l['duration'], 'transition_id'=>$l['transition'] ]);
        }
        // var_dump($schedule->devices()->allRelatedIds());die;

        $message = "Schedule succesfully created";
        return redirect('client/'.$tenant->domain.'/schedules/created')->with(['message'=>$message]);

    }


    public function ajaxDeviceSearch(Request $request)
    {

        
        // Layout ids
        $layouts = array_unique($request['layout_list']);

        $contents = LayoutResource::whereIn('layout_id', $layouts)->distinct()->pluck('content_id'); 

        Log::info("Layouts");
        Log::info($layouts);

        Log::info("Layout Contents");
        Log::info($contents);        
        

        $exempt_devices  = array();

        // die;
        $i =0;
        foreach($contents as $content) {
            
            $exempt_device = Content::find($content)->devices()->wherePivot('status', 0)->get(['devices.id'])->toArray();
            if(!empty($exempt_device)){
                $exempt_devices[$i] = $exempt_device[0]['id'];
                $i++;
            }
        }
        Log::info("Exempted Devices");
        Log::info($exempt_devices);

        // die;

        $allowed_devices = Device::with('location:id,state')->whereNotIn('id', $exempt_devices)->get()->toArray();
        Log::info('Allowed Devices:.................. ');
        Log::info($allowed_devices);



        return response()->json(['devices' => $allowed_devices], 200);
    }
}
