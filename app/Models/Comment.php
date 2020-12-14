<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;
	protected $table 	  = 'comments';
	protected $primaryKey = 'id';
	protected $fillable   = [
		'new_id', 'com_email', 'com_name','com_content',
	];
 	protected $dates 	  = ['deleted_at'];
 	
	public function news(){
		return $this->belongsTo('App\Models\News','new_id','id');
	}
}
