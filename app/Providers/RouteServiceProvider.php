<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        // Jonny added these routers...
        // Route::bind('article', 'App\Article');
        // Route::bind('lobby', 'App\Lobby');
        // Route::bind('game', function($value){
        //     return \App\Game::where('slug', $value)->firstOrFail();
        // });
        $router->model('article', 'App\Article');
        $router->bind('game', function($value){
            return \App\Game::where('slug', $value)->firstOrFail();
        });
        $router->model('lobby', 'App\Lobby');
        $router->model('map', 'App\Map');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
