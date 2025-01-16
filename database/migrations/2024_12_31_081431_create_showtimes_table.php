<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('showtimes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('movie_id')->constrained()->onDelete('cascade'); 
                $table->foreignId('cinema_id')->constrained()->onDelete('cascade'); 
                $table->date('date'); 
                $table->time('time'); 
                $table->string('hall'); 
                $table->integer('price');
                $table->timestamps();
            
  
                $table->unique(['movie_id', 'cinema_id', 'date', 'time', 'hall']);
            });
        }
    
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('showtimes');
        }
    };

