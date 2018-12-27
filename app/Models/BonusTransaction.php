<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusTransaction extends Model
{
     public function assignable()
    {

		return $this->morphTo();
		
	}
}
