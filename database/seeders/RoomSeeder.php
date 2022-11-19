<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Room::firstOrCreate(
            [
                'name' => 'Consultation',
            ],
            [
                'name' => 'Consultation',
                'department_id' => 1,
            ]

        );
         Room::firstOrCreate(
            [
                'name' => 'Investigation',
            ],
            [
                'name' => 'Investigation',
                'department_id' => 2,
            ]

        );
         Room::firstOrCreate(
            [
                'name' => 'Procedures',
            ],
            [
                'name' => 'Procedures',
                'department_id' => 3,
            ]

        );
         Room::firstOrCreate(
            [
                'name' => 'Health education',
            ],
            [
                'name' => 'Health education',
                'department_id' => 4,
            ]

        );
         Room::firstOrCreate(
            [
                'name' => 'Rehabilitation services',
            ],
            [
                'name' => 'Rehabilitation services',
                'department_id' => 5,
            ]

        );
    }
}
