<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orderlist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('titles','3 Sister Admin');

    }
}
