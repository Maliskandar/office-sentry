<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJumlahOfficeBoyToRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('jumlah_office_boy')->default(4); // Menambahkan kolom dengan default value 4
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('jumlah_office_boy'); // Menghapus kolom jika migration di-rollback
        });
    }
}