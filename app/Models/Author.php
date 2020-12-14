<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
	use SoftDeletes;
	protected $table 	  = 'authors';
	protected $primaryKey = 'id';
	protected $guarded 	  = [];
 	protected $dates 	  = ['deleted_at'];

	public function news(){
		return $this->hasMany('App\Models\News','author_id','id');
	}
}
