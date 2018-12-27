<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientWallet extends Model
{
    protected $fillable = [
        'client_profile_id', 'currency_id','cash','point', 'bonus', 'bonus_flag', 'point_flag'
    ];

     public function clientProfile() {

		return $this->belongsTo(ClientProfile::class);
	}

     public function clientWalletLogs()
    {
        return $this->hasMany(ClientWalletLog::class);
    }
}
