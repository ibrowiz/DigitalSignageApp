<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name','account_number','sort_code','last_updated_by','deleted_by','created_by'];
}
