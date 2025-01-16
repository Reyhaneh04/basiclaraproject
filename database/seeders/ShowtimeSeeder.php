<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Showtime::create([
            'time' => '11:20:00',
            'date' => '2025-1-12',
            'cinema_id' => 6,
            'movie_id' =>1,
            'price'=>80000,
            'hall' =>'سالن دو',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
