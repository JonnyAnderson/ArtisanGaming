<?php

namespace App\Http\Controllers;

use App\Map;
use App\Article;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
    }

    // UNCOMMENT TO REQUIRE LOGIN...
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $haloMaps           = Map::where('game_slug', 'halo-5')->where('status', 'published')->latest()->get(); // retrieving all halo maps
        $featuredHaloMaps   = $haloMaps->where('featured', '1')->take(3); // retrieving the newest 3 *featured* halo maps
        $newHaloMaps        = $haloMaps->take(4); // retrieving the newest 4 halo maps


        $articles           = Article::where('status', 'published')->latest()->get(); // retrieve all articles
        $newArticles        = $articles->take(3); // retrieve the newest 3 halo maps


        return view('home', compact('haloMaps', 'featuredHaloMaps', 'newHaloMaps', 'newArticles'));
    }



}
