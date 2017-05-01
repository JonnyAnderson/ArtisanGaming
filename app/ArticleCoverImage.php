<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCoverImage extends Model
{
    //

	protected $table = 'article_cover_images';

	protected $fillable = [
		'path'
	];

    public function article()
    {

    	$this->belongsTo('App\Article');

    }
}
