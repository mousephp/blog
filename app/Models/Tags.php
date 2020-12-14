<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
	use SoftDeletes;
	protected $table      = 'tags';
	protected $primaryKey = 'id';	
	protected $fillable   = ['tag_title'];
	protected $dates      = ['deleted_at'];
}
