<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Movie;

class ShareGlobalData
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $cities = City::all();
        $movies = Movie::all();

        // اشتراک داده‌ها با تمام ویوها
        view()->share('cities', $cities);
        view()->share('movies', $movies);

        return $next($request);
    }
}
