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
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            //
            $table->foreignId('shift_id')->after('room_id')->constrained('shifts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('shift_id');
        });
    }
};
