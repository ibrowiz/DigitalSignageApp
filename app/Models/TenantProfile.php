<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantProfile extends Model
{

protected $fillable = [
        'id','tenant_id','phone','contact_person', 'contact_email', 'address', 'location_id', 'country_id','logo','update_by',
    ];

     public function tenant() {

		return $this->belongsTo(Tenant::class);
	}

	 public function wallet() {

		return $this->hasOne(Wallet::class);
	}
}
