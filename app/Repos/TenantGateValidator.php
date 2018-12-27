<?php

namespace App\Repos;

class TenantGateValidator
{
	public $user;
	public $tenant;



	public function set($tenant, $user){

		$this->tenant = $tenant;
		$this->user = $user;

	}

	public function manager(){

		if($this->tenant){

			if( ($this->tenant->id == $this->user->tenant_id) && $this->user->manager == 1){

				return true;
			}else{
				return false;
			}

		}
		else{

			return \Exception('Tenant Not Set');
		}

	}
}