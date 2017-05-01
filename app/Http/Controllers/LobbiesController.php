<?php

namespace App\Http\Controllers;


use App\Http\Requests\LobbyRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Lobby;
use App\Game;


class LobbiesController extends Controller
{


    public function __construct()
    {


        $this->middleware('auth', ['only' => ['create', 'edit']]); // Require a logged in user on specified routes
        //$this->middleware('manager', ['only' => ['create', 'edit']]); // Require a manager on specified routes

        parent::__construct();

    }


    public function index($game = null)
    {
    	if(isSet($game))
    	{
    		$lobbies = Lobby::where('game_id', $game)->orderBy('scheduled_time')->get();
        	return view('lobbies.index', compact('lobbies', 'game'));
    	}else{
    		$lobbies = Lobby::orderBy('scheduled_time')->get();
        	return view('lobbies.index', compact('lobbies'));
    	}

    	// return $lobbies;

    }





    public function show(Game $game, Lobby $lobby)
    {
    	// $lobby = Lobby::findOrFail($id);
    	return view('lobbies.show', compact('lobby'));
    }




    public function create()
    {
        $games = Game::all();
        $options = array();

        foreach($games as $game){
            $options[$game->slug] = $game->title;
        }

        return view('lobbies.create', compact('games', 'options'));
    }



    public function edit(Lobby $lobby)
    {
        $games = Game::all();
        $options = array();

        foreach($games as $game){
            $options[$game->slug] = $game->title;
        }

        return view('lobbies.edit', compact('lobby', 'games', 'options'));
    }




    public function store(LobbyRequest $request)
    {

        $lobby = new Lobby($request->all());

        \Auth::user()->lobbiesHosted()->save($lobby);
        
        return redirect(route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]));
    }




    public function update(Lobby $lobby, LobbyRequest $request)
    {
        $lobby->update($request->all());
        
        return redirect(route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]));
    }




    public function join(Game $game, Lobby $lobby)///////////////////////////////////////////////////NEEDS WORK!!!!!!!!!!!!!!!!
    {
        if(!($lobby->isOwnedBy(\Auth::user()) || $lobby->players->contains(\Auth::user()) ))
        { 

            $lobby->addPlayer(\Auth::user());
            return redirect(route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]));

        }else{

            return "User is a host/member of the lobby already...";

        }

    }




    public function leave(Game $game, Lobby $lobby)///////////////////////////////////////////////NEEDS WORK!!!!!!!!!!!!!!!!!!!!!!!!
    {
        $lobby->removePlayer(\Auth::user());
        return redirect(route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]));
    }




    public function end(Game $game, Lobby $lobby)///////////////////////////////////////////////NEEDS WORK!!!!!!!!!!!!!!!!!!!!!!!!
    {
        if(Carbon::parse($lobby->end_time)->isFuture())
        {
            $lobby->update(['end_time' => Carbon::now()]);
            return redirect(route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]));
        }else{
            return "Sorry, the lobby has already ended.";
        }

    }
}
