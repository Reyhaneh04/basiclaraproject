<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
       protected $table = 'cinemas';

       protected $fillable = [
           'name',
           'address',
           'city_id', 
           'rate',
           'image',
       ];
   
       public function city()
       {
        return $this->belongsTo(City::class, 'cities_id');       }
   
        public function showtimes()
        {
            return $this->hasMany(Showtime::class, 'cinema_id');
        }
   
}
