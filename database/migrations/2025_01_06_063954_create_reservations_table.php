<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('showtime_id')->constrained()->onDelete('cascade'); 
            $table->json('seat_numbers'); 
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
