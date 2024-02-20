<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProofPhotoToOfficeBoyMonitoringsTable extends Migration
{
    public function up()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            $table->string('proof_photo')->nullable(); // Tambahkan kolom 'proof_photo'
        });
    }

    public function down()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            $table->dropColumn('proof_photo'); // Hapus kolom 'proof_photo' jika migration dirollback
        });
    }
}

