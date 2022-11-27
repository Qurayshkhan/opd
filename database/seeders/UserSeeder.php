<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            [
                'name' => 'admin',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@opd.com',
                'password' => Hash::make('admin123')
            ]
        );
        if ($user->name == 'admin') {
            $user->assignRole('admin');
        }

        $user = User::firstOrCreate(
            [
                'name' => 'doctor',
            ],
            [
                'name' => 'doctor',
                'email' => 'doctor@opd.com',
                'password' => Hash::make('doctor123')
            ]
        );
        if ($user->name == "doctor") {
            $user->assignRole('doctor');
        }

        $user = User::firstOrCreate(
            [
                'name' => 'patient',
            ],
            [
                'name' => 'patient',
                'email' => 'patient@opd.com',
                'password' => Hash::make('patient123')
            ]

        );
        if ($user->name == 'patient') {
            $user->assignRole('patient');
        }
    }
}
