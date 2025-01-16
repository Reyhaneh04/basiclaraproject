<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $showtimeId =10;
      
      
        

        for ($i = 1; $i <= 11; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'A' . $i,   
                'status' => 'available',      
            ]);
        }
        for ($i = 1; $i <= 14; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'B' . $i,   
                'status' => 'available',      
            ]);
        }
        for ($i = 1; $i <= 14; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'C' . $i,   
                'status' => 'available',      
            ]);
        }
        for ($i = 1; $i <= 14; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'D' . $i,   
                'status' => 'available',      
            ]);
        }
        for ($i = 1; $i <= 14; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'E' . $i,   
                'status' => 'available',      
            ]);
        }
        for ($i = 1; $i <= 14; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'F' . $i,   
                'status' => 'available',      
            ]);
        }
        for ($i = 1; $i <= 16; $i++) {
            Seat::create([
                'showtime_id' => $showtimeId,  
                'seat_number' => 'G' . $i,   
                'status' => 'available',      
            ]);
        }

       
    }

}
