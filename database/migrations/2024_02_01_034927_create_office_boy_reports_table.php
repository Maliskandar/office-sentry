<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('office_boy_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monitoring_id'); // Referensi ke tabel office_boy_monitorings
            $table->string('proof_photo_path'); // Path untuk foto bukti
            $table->timestamps();

            $table->foreign('monitoring_id')->references('id')->on('office_boy_monitorings')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_boy_reports');
    }
};