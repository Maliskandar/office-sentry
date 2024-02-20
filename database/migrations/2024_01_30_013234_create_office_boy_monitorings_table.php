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
        Schema::create('office_boy_monitorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_boy_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            //$table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            // $table->enum('shift', ['06.00 - 15.00' , '11.00 - 19.00']);
            $table->date('date'); // Tanggal
            $table->enum('status', ['Belum Dikerjakan' , 'Selesai Dikerjakan']); // Status
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_boy_monitorings');
    }
};
