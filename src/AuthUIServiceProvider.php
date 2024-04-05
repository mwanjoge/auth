<?php

namespace Nisimpo\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthUIServiceProvider extends ServiceProvider
{
    /**
     * Register the package services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthCommand::class,
                ControllersCommand::class,
                UiCommand::class,
            ]);
        }

       // $this->registerRoutes();
    }

    protected function registerRoutes(){
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Route::mixin(new AuthRouteMethods);
        $this->loadViewsFrom(__DIR__.'/../resources/views','nisimpo');
        $this->registerRoutes();

//        $this->publishes([
//            __DIR__.'/../resources/views' => resource_path('views'),
//        ],'resource');

        $this->publishes([__DIR__.'/../public' => base_path('public')],
            'public');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

//        $this->publishes([
//            __DIR__.'/../database/migrations/' => database_path('migrations')
//        ], 'migrations');

        $this->seeding();
    }

    public function seeding()
    {
        $this->publishes([
            __DIR__.'/../database/seeders/' => database_path('seeders')
        ], 'seeders');
    }
}
