<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $messages = [
            'gamertag.regex' => 'The gamertag you entered was invalid. A valid gamertag contains Aa-Zz, 0-9, and single spaces. It can’t start with a number and can’t start or end with a space.'
        ];

        return Validator::make($data, [
            'name' => 'required|max:16|alpha_num|unique:users',
            // 'gamertag' => 'required|min:2|max:15|unique:users|regex:/^[a-zA-Z]+[A-Za-z 0-9]*[A-Za-z0-9]+$/',
            // 'gamertag' => 'required|min:2|max:15|unique:users|regex:/^(?![0-9 ]|.*  .* $|)[0-9A-Z a-z]+$/',
            'gamertag' => ["required", "min:2", "max:15", "unique:users", "regex:/^(?![0-9 ]|.*  |.* $)[0-9A-Z a-z]+$/"],
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ], $messages);
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'gamertag' => $data['gamertag'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
