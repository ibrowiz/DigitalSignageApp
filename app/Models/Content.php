<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
     public function contentCategory()
    {
        return $this->belongsTo('App\Models\ContentCategory');

    }

    public function devices()
    {
	
		return $this->belongsToMany(Device::class, 'device_content', 'device_id', 'content_id');
	}

	 public function template()
    {
	
		return $this->belongsToMany(Template::class, 'template_content', 'template_id', 'content_id');
	}

	public function standardDeviceSettings() {

		return $this->belongsToMany(StandardDeviceSetting::class, 'standard_device_settings_content', 'setting_id', 'content_id');
	}
}
