<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopUpTransaction extends Model
{
   public function assignable(){

		return $this->morphTo();
	}
}
