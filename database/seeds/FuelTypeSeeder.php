<?php

use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fuel_types')->insert([
            ['name'=>'Diesel',
            'price' => '0.9',
            'unit' => 'USD/Liter',
            ],
            ['name'=>'Gasoline',
            'price' => '0.74',
            'unit' => 'USD/Liter',
            ],
            ['name'=>'CNG / NGV',
            'price' => '0.51',
            'unit' => 'USD/Kg',
            ],
            ['name'=>'LPG',
            'price' => '0.43',
            'unit' => 'USD/Liter',
            ],
            ['name'=>'Diesel+CNG/NGV',
            'price' => '0.00',
            'unit' => 'USD/Liter',
            ],
            ['name'=>'Alternative Energy',
            'price' => '0.00',
            'unit' => 'USD/',
            ]

        ]);
    }
}
