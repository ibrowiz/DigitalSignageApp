<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

protected $fillable = [
        'tenant_profile_id', 'currency_id','cash','point', 'bonus', 'bonus_flag', 'point_flag'
    ];

     public function tenantProfile() 
     {
		return $this->belongsTo(TenantProfile::class);
	 }


	 public function walletLogs()
    {
        return $this->hasMany(WalletLog::class);
    }

   
}
