<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

	public function getCreatedAtAttribute($created_at)
	{
		return date( 'jS F Y', strtotime($created_at) );
	}

	public function comments()
	{
		return $this->hasMany('App\Model\Comments','post_id');	
	}

}
