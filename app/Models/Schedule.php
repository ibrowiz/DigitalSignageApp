<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable =['assignable_type','assignable_id', 'name', 'repeat_cycle_id', 'start_time', 'expiration_date', 'occurence_count', 'duration', 'sound_output'];

    protected $hidden = array('deleted_at', 'pivot');

    public function layouts()
    {
        // ('App\Models\Layout', 'layout_scheduler', 'scheduler_id', 'layout_id' );
        return $this->belongsToMany('App\Models\Layout')->withPivot('duration', 'transition_id');
    }


    public function devices()
    {
        return $this->belongsToMany('App\Models\Device', 'device_schedule_managers  ')->withPivot('status', 'initial_playing_time', 'bill', 'transaction_id', 'times_played');
    }

    public function repeatCycle()
    {
        return $this->belongsTo('App\Models\repeatCycle');
    }

    // polymorphic since assignable ids can be either Tenant or Client
    public function assignable(){

        return $this->morphTo();
    }


    // public function layoutresources(){

    //     return $this->hasManyThrough(
    //         'App\Models\Layoutresource',
    //         'App\Models\Layout',
    //         'schedule_id', 
    //         'layout_id', 
    //         'id', 
    //         'id' 
    //     );
    // }
}
