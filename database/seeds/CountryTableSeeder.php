<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->insert([[
            'name' => 'Cambodia',
            'country_code' => '+855',
        ],
        [
            'name' => 'Lao PDR',
            'country_code' => '+856',
        ],
        [
            'name' => 'Myanmar',
            'country_code' => '+95',
        ],
        [
            'name' => 'Thailand',
            'country_code' => '+66',
        ],
        [
            'name' => 'Vietnam',
            'country_code' => '+84',
        ]

        ]);
    }
}
