<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    //





    public function show(User $user)
    {
    	$profile = $user; // Prevents "$user" being used twice in views. The "$user" variable is reserved for the logged in user.
    	return view('users.show', compact('profile'));
    }
}
