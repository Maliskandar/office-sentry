<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOfficeBoyMonitoringsForeignKey extends Migration
{
    public function up()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            // Hapus foreign key lama jika ada
            $table->dropForeign(['office_boy_id']); // Sesuaikan dengan kondisi sebenarnya

            // Tambahkan foreign key baru
            $table->foreign('office_boy_id')->references('id')->on('office_boys')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            // Untuk rollback, hapus foreign key baru dan tambahkan kembali yang lama jika diperlukan
            $table->dropForeign(['office_boy_id']);
            // $table->foreign('office_boy_id')->references('id_lama')->on('tabel_lama')->onDelete('cascade'); // Sesuaikan jika perlu
        });
    }
}