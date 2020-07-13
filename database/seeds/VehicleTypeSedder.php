<?php

use Illuminate\Database\Seeder;

class VehicleTypeSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vehicle_types')->insert([
            ['name'=>'Passenger Car petrol without catalyst',
             'km_litre'=>'11.8'
            ],
            ['name'=>'Passenger Car petrol with 3-way catalyst',
             'km_litre'=>'11.8'
            ],
            ['name'=>'Passenger Car diesel - old',
             'km_litre'=>'13.3'
            ],
            ['name'=>'Passenger Car diesel with PM filter{New}',
             'km_litre'=>'16.7'
            ],
            ['name'=>'Light duty trucks pre Euro',
             'km_litre'=>'8.33'
            ],
            ['name'=>'Light duty trucks Euro I+II',
             'km_litre'=>'9.1'
            ],
            ['name'=>'Light duty trucks Euro III+IV',
             'km_litre'=>'9.1'
            ],
            ['name'=>'Light duty trucks HEV',
             'km_litre'=>'11.1'
            ],
            ['name'=>'Medium duty trucks pre Euro',
             'km_litre'=>'3.9'
            ],
            ['name'=>'Medium duty trucks Euro I+II',
             'km_litre'=>'3.9'
            ],
            ['name'=>'Medium duty trucks Euro III+IV',
             'km_litre'=>'3.9'
            ],
            ['name'=>'Medium duty trucks Euro V',
             'km_litre'=>'3.9'
            ],
            ['name'=>'Heavy duty trucks pre Euro',
             'km_litre'=>'3.85'
            ],
            ['name'=>'Heavy duty trucks Euro I+II',
             'km_litre'=>'3.85'
            ],
            ['name'=>'Heavy duty trucks Euro III+IV',
             'km_litre'=>'3.85'
            ],
            ['name'=>'Heavy duty trucks Euro V',
             'km_litre'=>'3.85'
            ],
            ['name'=>'Motorcycles with 4-stroke engines',
            'km_litre'=>'33.3'
           ],
           ['name'=>'Motorcycles with 2-stroke engines',
            'km_litre'=>'25.6'
           ],
           ['name'=>'Bus pre-Euro',
           'km_litre'=>'2.71'
          ],
          ['name'=>'Bus Euro I + III',
           'km_litre'=>'2.75'
          ],
          ['name'=>'Bus Euro III + IV',
           'km_litre'=>'2.75'
          ],
          ['name'=>'Bus Euro V',
           'km_litre'=>'2.75'
          ],

        ]);
    }
}
