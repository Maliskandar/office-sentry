<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            $table->string('catatan_tugas')->nullable()->after('catatan');
            $table->string('catatan_ob')->nullable()->after('catatan_tugas');
        });
    }

    public function down()
    {
        Schema::table('office_boy_monitorings', function (Blueprint $table) {
            $table->dropColumn('catatan_tugas');
            $table->dropColumn('catatan_ob');
        });
    }
};
