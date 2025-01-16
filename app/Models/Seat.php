<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['showtime_id', 'seat_number', 'status'];

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public static function markAsReserved($seatNumbers)
    {
        self::whereIn('seat_number', $seatNumbers)
            ->update(['status' => 'reserved']);
    }

    public function reservation()
{
    return $this->belongsTo(Reservation::class);
}

   
}
