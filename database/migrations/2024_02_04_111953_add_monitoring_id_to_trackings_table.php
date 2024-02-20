<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonitoringIdToTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('monitoring_id')->after('id'); // Menambahkan kolom monitoring_id
            $table->foreign('monitoring_id')->references('id')->on('office_boy_monitorings'); // Mengatur kolom sebagai foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->dropForeign(['monitoring_id']); // Menghapus foreign key
            $table->dropColumn('monitoring_id'); // Menghapus kolom monitoring_id
        });
    }
}
