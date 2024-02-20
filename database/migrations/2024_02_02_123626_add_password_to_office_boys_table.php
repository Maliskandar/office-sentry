<?php

// database/migrations/yyyy_mm_dd_add_password_to_office_boys_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordToOfficeBoysTable extends Migration
{
    public function up()
    {
        Schema::table('office_boys', function (Blueprint $table) {
            $table->string('password')->nullable();
        });
    }

    public function down()
    {
        Schema::table('office_boys', function (Blueprint $table) {
            $table->dropColumn('password');
        });
    }
}