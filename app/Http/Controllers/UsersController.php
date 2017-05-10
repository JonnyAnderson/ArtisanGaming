<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    //





    public function show($name)
    {
        $profile = User::where('name', $name)->firstOrFail();
        return view('users.show', compact('profile'));
    }
}
