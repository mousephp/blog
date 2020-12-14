<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slides extends Model
{
	use SoftDeletes;
	protected $table      = 'slides';
	protected $primaryKey = 'id';	
 	protected $dates      = ['deleted_at'];
 	
	public function category(){
		return $this->belongsTo('App\Models\Category','cate_id','id');
	}

	public function author(){
		return $this->belongsTo('App\Models\Author','author_id','id');
	}


}
