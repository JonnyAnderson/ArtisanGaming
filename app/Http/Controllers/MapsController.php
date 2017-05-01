<?php

namespace App\Http\Controllers;

use App\Map;
use App\Game;

use Illuminate\Http\Request;

use App\Http\Requests\MapRequest;


class MapsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {


        $this->middleware('auth', ['only' => ['create', 'edit']]); // Require a logged in user
        $this->middleware('manager', ['only' => ['create', 'edit']]); // Require a manager


        parent::__construct();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Game $game)
    {
        $maps = Map::where('game_slug', $game->slug)->where('status', 'published')->latest()->get();
        return view('maps.index', compact('maps', 'game'));

    }
    public function indexAll()
    {

        $maps = Map::where('status', 'published')->latest()->get();
        return view('maps.index', compact('maps'));

    }





    public function show(Game $game, Map $map, $slug)
    {
        return view('maps.show', compact('map'));
    }




    public function create()
    {
    	$games = Game::all();
    	$options = array();

    	foreach($games as $game){
    		$options[$game->slug] = $game->title;
    	}

    	return view('maps.create', compact('games', 'options'));
    }



    public function edit(Map $map)
    {
    	$games = Game::all();
    	$options = array();

    	foreach($games as $game){
    		$options[$game->slug] = $game->title;
    	}

    	return view('maps.edit', compact('map', 'games', 'options'));
    }




    public function store(MapRequest $request)
    {
    	$map = Map::create($request->all());
    	
        return redirect(route('maps.edit', ['map' => $map->id]));
    }




    public function update(Map $map, MapRequest $request)
    {
    	$map->update($request->all());
    	
        return redirect(route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]));
    }



    public function addImage(Map $map, Request $request)
    {

        $this->validate($request, [

                'image' => 'required|mimes:jpg,jpeg,png'

            ]);


        $image = $request->file('image');

        $name = $map->id . '-' . $map->slug . '-' . time() . '-' . random_int(10000000,99999999) . '.' . $image->getClientOriginalExtension();

        $image->move('files/images/maps', $name);

        $map->images()->create(['path' => '/files/images/maps/' . $name]);

        return 'Done';

    }





}
