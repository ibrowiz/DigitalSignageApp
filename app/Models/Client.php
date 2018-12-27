<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*use app\Models\ClientProfile;

use app\Models\Client;

use app\Models\Tenant;*/

class Client extends Model
{

    protected $fillable = [
        'id', 'tenant_id', 'name','email',
    ];

    public function accountRoles(){

        return $this->morphMany('App\Models\AccountRoles', 'assignable');
    }

    public function clientProfile() {

		return $this->hasOne(ClientProfile::class);
	}


     public function tenant() {

        return $this->belongsTo(Tenant::class);
    }

	 public function users()
    {
        return $this->hasMany(User::class);
    }

    public function devices(){

        return $this->morphMany('App\Models\Device', 'assignable');
    }


    public function billingTransaction(){

        return $this->morphMany('App\Models\BillingTransaction', 'assignable');
    }


    public function bonusTransaction(){

        return $this->morphMany('App\Models\BonusTransaction', 'assignable');
    }


     public function deviceGroups(){

        return $this->morphMany('App\Models\DeviceGroup', 'assignable');
    }

     public function resources()
    {
        return $this->morphMany('App\Models\Resource', 'assignable');
    }

    public function layouts()
    {
        return $this->morphMany('App\Models\Layout', 'assignable');
    }

    public function topUpTransactions(){

        return $this->morphMany('App\Models\TopUpTransaction', 'assignable');
    }

}
