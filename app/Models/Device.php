<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	protected $fillable = [
        'device_name','version','serial_no', 'uu_id','firmware_id','description','assignable_type',    
        'assignable_id',
    ];

     public function savedTemplates()
    {
        return $this->hasMany(SavedTemplates::class);
    }
	
	public function deviceGroups()
    {
		return $this->belongsToMany(DeviceGroup::class, 'devicegroup_device', 'device_id', 'device_group_id');
	}

	public function contents()
    {
		return $this->belongsToMany(Content::class, 'device_content', 'device_id', 'content_id')->withPivot('status');
	}

	

	public function assignable(){

		return $this->morphTo();
	}

	public function deviceSetting() {

		return $this->hasOne(DeviceSetting::class)->withDefault();
	}

}


	
