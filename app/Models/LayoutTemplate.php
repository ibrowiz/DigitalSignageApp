<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayoutTemplate extends Model
{
    protected $fillable = ['file_name','layout','category', 'image', 'orientation', 'type'];
    protected $table = 'layout_templates';
}
