<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class ClientProfile extends Model
{

	 protected $fillable = 
	 [
       'id','client_id','phone','contact_person', 'contact_email', 'address', 'location_id', 'country_id','logo','updated_by'];


      public function client() {

		return $this->belongsTo(Client::class);
	}

	 public function clientWallet() {

		return $this->hasOne(ClientWallet::class);
	}

   

}
