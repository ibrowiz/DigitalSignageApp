<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	protected $fillable = [
		'id', 'name', 'label', 'description'
	];

    public function roles() {

		return $this->belongsToMany(Role::class, 'role_permission', 'role_id', 'permission_id');
	}
}
