<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphOne;

class Tenant extends Model
{

	protected $fillable = [
        'name', 'email', 'domain','status',
    ];

    public function devices(){

        return $this->morphMany('App\Models\Device', 'assignable');
    }

    public function topUpTransactions(){

        return $this->morphMany('App\Models\TopUpTransaction', 'assignable');
    }

    public function deviceGroups(){

        return $this->morphMany('App\Models\DeviceGroup', 'assignable');
    }

     public function billingTransaction(){

        return $this->morphMany('App\Models\BillingTransaction', 'assignable');
    }


     public function bonusTransaction(){

        return $this->morphMany('App\Models\BonusTransaction', 'assignable');
    }

      public function TellerTransaction(){

        return $this->morphMany('App\Models\BonusTransaction', 'assignable');
    }

	 public function tenantProfile() {

		return $this->hasOne(TenantProfile::class);
	}

    
    public function operators()
    {
        return $this->hasMany(Operator::class);
    }

     public function clients()
    {
        return $this->hasMany(Client::class);
    }


    public function resources()
    {
        return $this->morphMany('App\Models\Resource', 'assignable');
    }

    public function layouts()
    {
        return $this->morphMany('App\Models\Layout', 'assignable');
    }

    /*public function wallet(){

        return $this->morphOne('App\Models\Wallet', 'assignable');
    }*/

      
}
