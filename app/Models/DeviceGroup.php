<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceGroup extends Model
{
	protected $fillable = [
        'name', 'label','description',
    ];


    public function devices()
    {
       return $this->belongsToMany(Device::class, 'devicegroup_device', 'device_group_id', 'device_id');
    }

    

    public function assignable(){

		return $this->morphTo();
	}
}
