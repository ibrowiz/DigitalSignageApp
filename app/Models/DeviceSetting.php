<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSetting extends Model
{

	protected $fillable = 
	[
	 'device_id','content_category_id', 'content_id','public_content_allowed','country_id', 'location_id','city',
	];

 
    public function device()
     {

		return $this->belongsTo(Device::class);
	 }
}
