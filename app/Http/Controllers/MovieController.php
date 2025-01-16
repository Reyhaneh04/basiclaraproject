<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
    
        return view('listing.card', compact('movie'));
    }

    public function index()
    {
       
        return view('listing.card');
    }

    public function moviesByGenre($genre)
{
    $movies = Movie::where('genre', $genre)->paginate(20);

    return view('listing.index', compact('movies', 'genre'));
}
}
