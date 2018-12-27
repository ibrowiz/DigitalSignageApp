<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

     public function flaggedContents()
    {
        return $this->hasMany('App\Models\FlaggedContent');
    }

}
 