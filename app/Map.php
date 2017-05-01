<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Helpers;

class Map extends Model
{
    //

	protected $fillable = [
		'title',
		'slug',
		'brief',
		'description',
		'download_url',
		'featured',
		'game_slug',
		'status'
	];


/*
|	Sets the slug for the map based on the title attribute...
*/
	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = $title;
		$this->attributes['slug'] = str_slug($title);
	}

	public function images()
	{
		return $this->hasMany('App\MapPreviewImage');
	}

    public function game()
    {

    	return $this->belongsTo('App\Game', 'game_slug', 'slug');

    }

}
