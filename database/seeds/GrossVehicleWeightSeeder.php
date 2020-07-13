<?php

use Illuminate\Database\Seeder;

class GrossVehicleWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('gross_vehicle_weights')->insert([
            ['name'=>'<7 Tons'],
            ['name'=>'7 Tons - 16.5 Tons'],
            ['name'=>'>16.5 Tons']
        ]);
    }
}
