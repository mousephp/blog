<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	protected $table 	  = 'categories';
	protected $primaryKey = 'id';
	protected $fillable   = [
		'cate_name', 'cate_slug'
	];
 	protected $dates      = ['deleted_at'];
 	
	public function news(){
		return $this->hasMany('App\Models\News');
	}
}
