<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'genre','release_date','duration','rate','poster'];

    public function showtimes()
{
    return $this->hasMany(Showtime::class, 'movie_id');
}
}
