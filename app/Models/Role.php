<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	protected $fillable = [
		'id', 'name', 'label', 'description','permissions'
	];

    public function permissions() {

		return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
	}
}
