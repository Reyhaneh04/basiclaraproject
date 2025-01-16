<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::all();

        $movies = Movie::all();

        return view('listing.index');
    }
}
