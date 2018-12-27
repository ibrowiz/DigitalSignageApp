<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname','email', 'password','confirmed', 'super_admin','token','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  /*  public function roles() {
        return $this->belongsToMany(Role::class, 'admin_role_user', 'user_id', 'role_id');
    }
*/
     public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

     public function template() {

        return $this->hasMany(Template::class);
    }

    public function accountRoles(){

        return $this->morphMany('App\Models\AccountRoles', 'assignable');
    }


}
