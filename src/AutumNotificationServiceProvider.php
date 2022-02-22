<?php

namespace Autum\Notifications;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AutumNotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        Route::prefix('api')
                ->middleware('api')
                ->as('api.')
                ->namespace('\Autum\Notifications\Http\Controllers\API')
                ->group(function() {
                    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
                });
                
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'autum-notification-migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
    
}