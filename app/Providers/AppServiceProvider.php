<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Movie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        view()->share('cities', City::all());
        view()->share('movies', Movie::all());
    }
}
