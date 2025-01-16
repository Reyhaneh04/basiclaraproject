<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Cinema::create([
        'name' => 'پردیس سینمایی لوتوس مال',
        'cities_id'=> 9,
        'address' => 'نازی آباد - خیابان شهید رجایی - خیابان اکبر مشهدی - مجتمع لوتوس',
        'rate'=>4.2,
        'image'=>'5.webp',
    ]);
    }
}

