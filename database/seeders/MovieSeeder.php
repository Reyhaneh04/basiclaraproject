<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        Movie::create([
            'title' => 'زود پز
             ',
            'description' => 
            '
            رامبد جوان، بازیگر سینما و تلویزیون و مجری برنامه خندوانه، که ساخت آثاری چون قانون مورفی، پسر آدم دختر حوا، ورود آقایان ممنوع و ... را در کارنامه هنری خود دارد، به زودی با فیلم سینمایی زودپز به سینماها می‌آید. برای تماشای این فیلم، می‌توانید خرید بلیط زودپز را از طریق وب‌سایت‌های معتبر انجام دهید.
          ',
            'genre' => 'کمدی',
            'release_date' => '1403',
            'duration' => '108 دقیقه',
            'rate' => '3.9',
            'poster' => 'zood.webp',
        ]);
        

    
        
        
        

      
        

        
        
        
        
        
        
       
        
        
        
        
        
        
        
    }
}
