<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = ['screen','title', 'orientation','background_color','assignable_id', 'assignable_type', 'aspect_ratio'];


    public function layoutResources()
    {
        return $this->hasMany('App\Models\LayoutResource');
    }


     public function assignable()
     {

        return $this->morphTo();
    }
   

}
