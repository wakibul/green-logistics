<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckingCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucking_companies', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('vehicle_type_id')->unsigned();
            $table->BigInteger('user_id')->unsigned();
            $table->string('year_of_manufacture',10);
            $table->string('truck_id')->nullable();
            $table->integer('no_of_wheels');
            $table->BigInteger('fuel_type_id')->unsigned();
            $table->string('cost_of_fuel_consumption_per_year')->nullable();
            $table->string('no_of_running_per_km_year')->nullable();
            $table->string('avarage_distance_per_km_trip')->nullable();
            $table->BigInteger('gross_vehicle_weight_id')->unsigned();
            $table->string('avarage_speed_per_km_hr')->nullable();
            $table->string('avarage_payload_per_trip')->nullable();
            $table->string('avarage_truck_capacity_utilization')->nullable();
            $table->string('operation_days')->nullable();
            $table->string('avarage_empty_trip_per_year')->nullable();
            $table->string('avarage_vehicle_backhauling_distance')->nullable();
            $table->string('avarage_idling_time_per_day')->nullable()->comment('in mintuts');
            $table->string('vehicle_breakdown_per_year')->nullable()->comment('time');
            $table->string('target_of_accident_per_year')->nullable()->comment('time');
            $table->string('damaged_of_failed_vehicles_per_year')->nullable()->comment('time');
            $table->string('maintanance_programme_per_year')->nullable()->comment('time');
            $table->string('tyre_management_per_year')->nullable()->comment('time');
            $table->string('eco_driving_to_driver_per_year')->nullable()->comment('time');
            $table->string('total_cost_electricity_per_year')->nullable()->comment('country currancy');
            $table->string('total_no_of_suppliers')->nullable()->comment('No in a year');
            $table->string('total_cost_of_procurement')->nullable()->comment('Country Currency / Year');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->foreign('gross_vehicle_weight_id')->references('id')->on('gross_vehicle_weights')->onDelete('cascade');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        DB::update("ALTER TABLE trucking_companies AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucking_companies');
    }
}
