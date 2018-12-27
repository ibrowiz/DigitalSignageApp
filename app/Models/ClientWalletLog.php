<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientWalletLog extends Model
{
    public function clientWallet() 
     {
		return $this->belongsTo(ClientWallet::class);
	 }
}
