<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $fillable = ['movie_id', 'cinema_id', 'date', 'time', 'hall','price'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function seats()
{
    return $this->hasMany(Seat::class);
}

public function reservations()
{
    return $this->hasMany(Reservation::class);
}
  
}
