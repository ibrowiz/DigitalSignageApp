<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\OperatorResetPasswordNotification;
use App\Scopes\BelongsToTenant;

class Operator extends Authenticatable
{
    use Notifiable;
    //use BelongsToTenant;

    protected $guard = 'tenant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','tenant_id','first_name','last_name','email','confirmed', 'password', 'super_admin','token','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tenant()
    {
        return $this->belongsTo('App\Models\Tenant');
    }



     public function sendPasswordResetNotification($token)
    {
        $this->notify(new OperatorResetPasswordNotification($token));
    }

    public function accountRoles(){

        return $this->morphMany('App\Models\AccountRoles', 'assignable');
    }
}
