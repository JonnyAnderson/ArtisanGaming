<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

	protected $fillable = [
		'title',
		'slug'
	];

	public function maps()
	{
		return $this->hasMany('App\Map');
	}

	public function lobbies()
	{
		return $this->hasMany('App\Lobby');
	}
}
