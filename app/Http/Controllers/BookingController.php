<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;



class BookingController extends Controller
{
    public function show(Request $request)
    {
        $showtimeId = $request->query('showtime_id');

        $showtime = Showtime::with('seats')->findOrFail($showtimeId);

        return view('listing.booking', [
            'seats' => $showtime->seats, 
            'showtime' => $showtime,    
        ]);
    }

    public function reserveSeats(Request $request)
    {
        $validated = $request->validate([
            'seats' => 'required|array',
            'seats.*' => 'string',
            'showtime_id' => 'required|integer',
        ]);
    
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'لطفاً وارد حساب کاربری خود شوید.',
            ], 400);
        }
    
        try {
            $reservation = Reservation::createReservation(
                auth()->id(), 
                $validated['showtime_id'], 
                $validated['seats']
            );
    
            foreach ($validated['seats'] as $seatNumber) {
                Seat::where('showtime_id', $validated['showtime_id'])
                    ->where('seat_number', $seatNumber)
                    ->update(['status' => 'reserved']);
            }
    
            return response()->json([
                'success' => true,
                'reservation_id' => $reservation->id, 
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در ذخیره‌سازی رزرو.',
            ], 500);
        }
        return response()->json([
            'success' => true,
            'reservation_id' => $reservation->id, 
        ]);
        
    }
    
    
    

    public function getSeatsStatus($showtimeId)
    {
        $seats = Seat::where('showtime_id', $showtimeId)->get();

        return response()->json([
            'seats' => $seats->map(function ($seat) {
                return [
                    'seat_number' => $seat->seat_number,
                    'status' => $seat->status, 
                ];
            }),
        ]);
    }

    public function showReceipt($id)
    {
      
        $reservation = Reservation::with('showtime.movie', 'showtime.cinema')
        ->where('id', $id)
        ->first();

        if (!$reservation) {
            return redirect()->route('home')->withErrors('رزرو مورد نظر یافت نشد.');
        }
    
      $seatNumbers = $reservation->seat_numbers;

      if (is_string($seatNumbers)) {
      $seatNumbers = json_decode($seatNumbers, true);
    }
    $showtimeDate = Jalalian::fromDateTime($reservation->showtime->date)->format('Y-m-d');


    return view('listing.receipt', [
    'reservation' => $reservation,
    'seatNumbers' => $seatNumbers,
    'showtimeDate' => $showtimeDate,
   ]);

    }

  
    }
