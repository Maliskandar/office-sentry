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
            $table->foreignId('building_id')->after('office_boy_id')->constrained('buildings')->onDelete('cascade');
            $table->foreignId('floor_id')->after('building_id')->constrained('floors')->onDelete('cascade');
            $table->foreignId('room_id')->after('floor_id')->constrained('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('floor_id');
            $table->dropConstrainedForeignId('building_id');
            $table->dropConstrainedForeignId('room_id');
        });
    }
};
