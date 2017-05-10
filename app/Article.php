<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Helpers;
use App\User;

class Article extends Model
{
    //

	protected $fillable = [
		'title',
		'slug',
		'brief',
		'body',
		'status'
	];


/*
|	Sets the slug for the article based on the title attribute...
*/
	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = $title;
		$this->attributes['slug'] = str_slug($title);
	}

	public function images()
	{
		return $this->hasMany('App\ArticleCoverImage');
	}

	public function updated_at_human()
	{
		$updatedAtHumanReadable = date('F jS, Y', strtotime($this->updated_at));

		return $updatedAtHumanReadable;
	}

	public function created_at_human()
	{
		$createdAtHumanReadable = date('F jS, Y', strtotime($this->created_at));

		return $createdAtHumanReadable;
	}

	public function author()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

}