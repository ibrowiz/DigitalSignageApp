<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'client_id','first_name','last_name', 'email','confirmed', 'password', 'super_admin','token','remember_token'];

     protected $hidden = [
        'password', 'remember_token',
    ];


    

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    

    public function bonusTransaction(){

        return $this->morphMany('App\Models\BonusTransaction', 'assignable');
    }
    
   

}
