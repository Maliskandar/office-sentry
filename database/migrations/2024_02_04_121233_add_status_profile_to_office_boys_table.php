<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusProfileToOfficeBoysTable extends Migration
{
    public function up()
    {
        Schema::table('office_boys', function (Blueprint $table) {
            $table->string('status_profile')->default('Belum Melengkapi');
        });
    }

    public function down()
    {
        Schema::table('office_boys', function (Blueprint $table) {
            $table->dropColumn('status_profile');
        });
    }
}
