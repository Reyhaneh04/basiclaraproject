<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
   public function getShowtimesForCinema($cinemaId, Request $request)
   {
    $date = $request->query('date', \Carbon\Carbon::today()->toDateString());

       $cinema = Cinema::find($cinemaId);

       $movieId = $request->query('movie-id');

       $showtimes = Showtime::where('cinema_id', $cinemaId)
       ->whereDate('date', $date)
       ->where('movie_id', $movieId) 
       ->get();

       return response()->json($showtimes);
       
   }



   public function getShowtimes($cinemaId, Request $request)
{
    $date = $request->query('date');
    $movieId = $request->query('movie_id'); 

    if (!$date) {
        return response()->json(['error' => 'پارامتر تاریخ الزامی است.'], 400);
    }

    $query = Showtime::where('cinema_id', $cinemaId)
        ->whereDate('date', $date); 

    if ($movieId) {
        $query->where('movie_id', $movieId); 
    }

    $showtimes = $query->get();

    if ($showtimes->isEmpty()) {
        return response()->json(['message' => 'هیچ سانسی برای این تاریخ موجود نیست.'], 404);
    }

    return response()->json($showtimes);
}


}
