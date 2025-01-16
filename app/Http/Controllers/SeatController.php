<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::orderBy('row', 'asc')->orderBy('seat_number', 'asc')->get();

        return view('listing.booking', compact('seats'));
    }
}
