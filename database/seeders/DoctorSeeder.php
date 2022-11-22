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
                'user_id' => 2,
            ],
            [
                'user_id' => 2,
                'room_id' => 1,
            ]

        );

    }
}
