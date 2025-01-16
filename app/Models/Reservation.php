<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'showtime_id', 'seat_numbers', 'status'];

    protected $casts = [
        'seat_numbers' => 'array', 
    ];

    public static function createReservation($userId, $showtimeId, $seatNumbers)
    {
        return self::create([
            'user_id' => $userId,
            'showtime_id' => $showtimeId,
            'seat_numbers' => $seatNumbers,
            'status' => 'confirmed',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

public function seats()
{
    return $this->hasMany(Seat::class); 
}

}
