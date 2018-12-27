<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountRole extends Model
{
    public function assignable(){

		return $this->morphTo();
	}
}
