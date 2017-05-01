<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapPreviewImage extends Model
{
    //

	protected $table = 'map_preview_images';

	protected $fillable = [
		'path'
	];

    public function map()
    {

    	$this->belongsTo('App\Map');

    }

}
