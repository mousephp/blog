<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagsNews extends Model
{
	use SoftDeletes;
	protected $table='tags_news';
	protected $primaryKey='id';
	protected $dates = ['deleted_at'];
}
