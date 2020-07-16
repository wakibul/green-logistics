<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeToTruckingCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trucking_companies', function (Blueprint $table) {
            //
            $table->integer('age')->after('year_of_manufacture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trucking_companies', function (Blueprint $table) {
            //
            $table->dropColumn('age');
        });
    }
}
