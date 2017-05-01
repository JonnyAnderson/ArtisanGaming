<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


// Jonny commented this section...
// Route::group(['middleware' => ['web']], function () {
//     //
// });

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index')->name('home');


    // Maps...
    Route::post('maps',                     'MapsController@store')->name('maps.store');            // Create a map
    Route::get('maps',                      'MapsController@indexAll')->name('maps.index');         // View all maps
    Route::get('maps/create',               'MapsController@create')->name('maps.create');          // View form to create map
    Route::patch('maps/{map}',              'MapsController@update')->name('maps.update');          // Update a map
    Route::get('maps/{game}',               'MapsController@index')->name('maps.game.index');       // View maps for a particular game
    // Route::get('maps/{game}/create',        'MapsController@create')->name('maps.game.create');     // View form to create map for a specific game
    Route::get('maps/{map}/edit',           'MapsController@edit')->name('maps.edit');              // View form to edit map
    Route::post('maps/{map}/images',        'MapsController@addImage')->name('maps.addImage');      // Add image to map
    Route::get('maps/{game}/{map}/{slug}',  'MapsController@show')->name('maps.show');              // View a map
    
    /*Route::resource('maps/{game}', 'MapsController', [
        'except'        => ['show'], 
        'parameters'    => ['{game}' => 'map'],
        'names'         => [
                            'index' => 'maps.game.index',
                            'create' => 'maps.game.create',
                            'store' => 'maps.game.store',
                            'edit' => 'maps.game.edit',
                            'update' => 'maps.game.update',
                            'destroy' => 'maps.game.destroy'
                            ]
    ]);*/






    // Articles...
    Route::resource('articles', 'ArticlesController', [
        'except' => ['show'], 
        'parameters' => ['articles' => 'article']
    ]);
    Route::post('articles/{article}/images', 'ArticlesController@addImage')->name('articles.addImage'); // Add image/cover to article
    Route::get('articles/{article}/{slug}', 'ArticlesController@show')->name('articles.show'); // View an article






    // Lobbies...
    // Route::resource('lobbies/{game}', 'LobbiesController', [
    //     'parameters' => ['{game}' => 'lobby']
    // ]);
    // Route::get('lobbies', 'LobbiesController@index')->name('lobbies.index');

    Route::post('lobbies',                      'LobbiesController@store')->name('lobbies.store');              // Create a lobby
    Route::get('lobbies',                       'LobbiesController@index')->name('lobbies.index');              // View all lobbies
    Route::get('lobbies/create',                'LobbiesController@create')->name('lobbies.create');            // View form to create lobby
    Route::patch('lobbies/{lobby}',             'LobbiesController@update')->name('lobbies.update');            // Update a lobby
    Route::get('lobbies/{game}',                'LobbiesController@index')->name('lobbies.game.index');         // View lobbies for a particular game
    // Route::get('lobbies/{game}/create',         'LobbiesController@create')->name('lobbies.game.create');       // View form to create lobby for a specific game
    Route::get('lobbies/{lobby}/edit',          'LobbiesController@edit')->name('lobbies.edit');                // View form to edit lobby
    Route::get('lobbies/{game}/{lobby}',        'LobbiesController@show')->name('lobbies.show');                // View a lobby
    Route::get('lobbies/{game}/{lobby}/join',   'LobbiesController@join')->name('lobbies.join');                // Join a lobby
    Route::get('lobbies/{game}/{lobby}/leave',  'LobbiesController@leave')->name('lobbies.leave');              // Leave a lobby
    Route::get('lobbies/{game}/{lobby}/end',    'LobbiesController@end')->name('lobbies.end');                  // End/Finish a lobby







    // Tv...
    Route::get('tv',                            'TvController@index')->name('tv.index');                        // View TV homepage
    Route::get('tv/{team}',                     'TvController@show')->name('tv.team.index');                    // View TV for a specific team








    // Users...

    Route::get('users/{user}',                       'UsersController@show')->name('users.show');                   // View a user's profile






    // Tournaments...
    // Route::resource('tournaments/{game}', 'TournamentsController', [
    //     'parameters' => ['{game}' => 'tournament']
    // ]);
    // Route::get('tournaments', 'TournamentsController@index')->name('tournaments.index');

    Route::post('tournaments',                      'TournamentsController@store')->name('tournaments.store');            // Create a tournament
    Route::get('tournaments',                       'TournamentsController@index')->name('tournaments.index');            // View all tournaments
    Route::get('tournaments/create',                'TournamentsController@create')->name('tournaments.create');          // View form to create tournament
    Route::patch('tournaments/{tournament}',             'TournamentsController@update')->name('tournaments.update');          // Update a tournament
    Route::get('tournaments/{game}',                'TournamentsController@index')->name('tournaments.game.index');       // View tournaments for a particular game
    // Route::get('tournaments/{game}/create',         'TournamentsController@create')->name('tournaments.game.create');     // View form to create tournament for a specific game
    Route::get('tournaments/{tournament}/edit',          'TournamentsController@edit')->name('tournaments.edit');              // View form to edit tournament
    Route::get('tournaments/{game}/{tournament}',        'TournamentsController@show')->name('tournaments.show');              // View a tournament










    // Static Pages...
    //Route::get('/about', 'StaticPagesController@about');


});
