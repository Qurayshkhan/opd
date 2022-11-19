<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::firstOrCreate(
            [
                'name' => 'Hassan khan',
            ],
            [
                'name' => 'Hassan khan',
                'room_id' => 1,
            ]

        );
        Doctor::firstOrCreate(
            [
                'name' => 'Saira Ansari',
            ],
            [
                'name' => 'Saria Ansari',
                'room_id' => 2,
            ]

        );
        Doctor::firstOrCreate(
            [
                'name' => 'Wajiha Ansari',
            ],
            [
                'name' => 'Wajiha Ansari',
                'room_id' => 3,
            ]

        );
        Doctor::firstOrCreate(
            [
                'name' => 'MIR Salman Khan',
            ],
            [
                'name' => 'MIR Salman Khan',
                'room_id' => 4,
            ]

        );
        Doctor::firstOrCreate(
            [
                'name' => 'Rashid Gujjar',
            ],
            [
                'name' => 'Rashid Gujjar',
                'room_id' => 5,
            ]

        );
    }
}
