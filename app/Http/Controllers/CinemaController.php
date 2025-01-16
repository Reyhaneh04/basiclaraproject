<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    public function getCinemasForCity($cityId)
    {
    if ($cityId == 1) {
        $cinemas = Cinema::all(); 
    } else {
        $cinemas = Cinema::where('cities_id', $cityId)->get();
    }

    if ($cinemas->isEmpty()) {
        return response()->json(['message' => 'هیچ سینمایی یافت نشد.'], 404);
    }

    return response()->json($cinemas);
}


public function checkCinemaSessions($cinemaId)
{
    $cinema = Cinema::find($cinemaId); 
    
    if ($cinema && $cinema->showtimes->isNotEmpty()) {
        return response()->json([
            'status' => 'success',
            'message' => 'این سینما دارای سانس است.',
            'sessions' => $cinema->showtimes
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'این سینما هیچ سانسی ندارد.'
        ]);
    }
    
}

public function getCinemasForCityWithShowtimes($cityId)
{
       $cinemas = Cinema::with('showtimes')->where('city_id', $cityId)->get();
        
       return response()->json($cinemas);
}

public function show($cinemaId)
{
    $cinema = Cinema::find($cinemaId);
    
    $showtimes = $cinema->showtimes;
    
    return view('listing.card', compact('cinema', 'showtimes'));
}
public function searchCinemas(Request $request)
{
    $searchTerm = $request->input('search');
    $cinemas = Cinema::where('name', 'like', '%' . $searchTerm . '%')->get();

    return response()->json($cinemas);
}

}
