<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            $table->string('sumber_informasi')->nullable(); // Membuat kolom sumber_informasi yang boleh null
            $table->string('catatan')->nullable();         // Membuat kolom catatan yang boleh null
        });
    }

    public function down()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            // Menghapus kolom jika rollback migration
            $table->dropColumn(['sumber_informasi', 'catatan', 'lokasi']);
        });
    }
};
