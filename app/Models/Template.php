<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{

	protected $fillable = ['name','admin_id','content_category_id','content_id','public_content_allwed','last_updated_by','deleted_by','created_by'];

    public function contents()
    {
		return $this->belongsToMany(Content::class, 'template_content', 'template_id', 'content_id')->withPivot('status');
	}

	public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
