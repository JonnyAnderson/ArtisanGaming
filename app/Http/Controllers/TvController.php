<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TvController extends Controller
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
    public function index()
    {
        return view('tv.index');

    }
}
