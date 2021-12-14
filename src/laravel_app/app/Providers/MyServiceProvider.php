<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->singleton('myservice', 'App\MyClasses\PowerMyService');
        app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
    }

    public function boot()
    {
    }
}
