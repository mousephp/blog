<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthorNews extends Model
{
	use SoftDeletes;
	protected $table 	  = 'author_news';
	protected $primaryKey = 'id';
	protected $dates 	  = ['deleted_at'];
}
