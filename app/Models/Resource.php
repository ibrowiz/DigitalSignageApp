<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    
    protected $guarded = ['id'];

    protected $table = 'resources';



    public function assignable(){

    	return $this->morphTo();
    }

}
