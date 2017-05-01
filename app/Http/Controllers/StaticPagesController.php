<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StaticPagesController extends Controller
{
    //


    public function __construct()
    {
        parent::__construct();
    }


	public function about(){

		return view ('pages.about');

	}

}
