<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('Dingo\Api\Auth\Auth')->extend('basic', function ($app) {
            return new \Dingo\Api\Auth\Provider\Basic($app['auth'], 'email');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}