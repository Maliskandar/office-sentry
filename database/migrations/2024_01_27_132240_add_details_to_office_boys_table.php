<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToOfficeBoysTable extends Migration
{
    public function up()
    {
        Schema::table('office_boys', function (Blueprint $table) {
            $table->year('tahun_masuk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('status', ['Aktif', 'Mangkir', 'Drop Out', 'Sakit', 'Cuti'])->default('Aktif');
            $table->string('no_telepon')->nullable();
        });
    }

    public function down()
    {
        Schema::table('office_boys', function (Blueprint $table) {
            $table->dropColumn(['tahun_masuk', 'tempat_lahir', 'tanggal_lahir', 'status', 'no_telepon']);
        });
    }
}