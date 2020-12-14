<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
	use SoftDeletes;
	protected $table      = 'news';
	protected $primaryKey = 'id';	
 	protected $dates      = ['deleted_at'];
 	
	public function category(){
		return $this->belongSto('App\Models\Category');
	}

	public function tags(){
		return $this->belongSto('App\Models\Tags','tag_id','id');
	}

	public function author(){
		return $this->belongSto('App\Models\Author','author_id','id');
	}

}
