<?php

namespace Backpack\MenuManager;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class MenuManagerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // publish migrations
        $this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'migrations');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Backpack\MenuManager\app\Http\Controllers'], function ($router) {
            require __DIR__.'/app/Http/routes.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('menumanager', function ($app) {
            return new MenuManager($app);
        });

        $this->setupRoutes($this->app->router);
    }
}
