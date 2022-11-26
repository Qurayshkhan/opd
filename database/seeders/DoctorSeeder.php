<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
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
                'id' => 1,
            ],
            [
                'user_id' => 2,
                'room_id' => 1,
            ]

        );
        Patient::firstOrCreate(
            [
                'id' => 1,
            ],
            [
                'user_id' => 3,
                'phone' => '122222121',
                'cnic' => '323242342',
                'gender' => 'male',
            ]

        );

        Appointment::firstOrCreate(

                [
                    'id' => 1,
                ],
                [
                    'patient_id' => 3,
                    'doctor_id' => 2,
                    'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium nihil placeat nesciunt aperiam molestiae repellendus, facilis nisi esse minus tenetur quos sint distinctio rem repudiandae atque. Blanditiis quasi laboriosam atque!',

                ]

        );
    }
}
