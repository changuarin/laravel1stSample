<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //protected $table = 'the name of the table';

	protected $fillable = [
		'user_id', 'content', 'live', 'post_on'
	];

	protected $dates = ['post_on'];
	//Mutator
	public function setLiveAttribute($value)
	{
		$this->attributes['live'] = (boolean)($value);
	}
	//Accessor
	public function getShortContentAttribute()
	{
		return substr($this->content, 0, random_int(60, 150)) . '...';
	}

	public function setPostOnAttribute($value)
	{
		$this->attributes['post_on'] = Carbon::parse($value);
	}
}
