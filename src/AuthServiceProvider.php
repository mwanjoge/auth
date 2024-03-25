<?php

namespace Nisimpo\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Route::mixin(new AuthRouteMethods);
        //$this->loadMigrationsFrom(__DIR__.'../database/migrations');
    }
}
