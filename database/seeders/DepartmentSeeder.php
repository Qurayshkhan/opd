<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DepartmentSeedr;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::firstOrCreate(
            [
                'name' => 'Orthopaedics',
            ],
            ['name' => 'Orthopaedics'],
         );
        Department::firstOrCreate(
            [
                'name' => 'Gynaecology',
            ],
            ['name' => 'Gynaecology'],
            );
        Department::firstOrCreate(
            [
                'name' => 'Dental Surgery',
            ],
            ['name' => 'Dental Surgery'],
            );
        Department::firstOrCreate(
            [
                'name' => 'Psychiatry',
            ],
            ['name' => 'Psychiatry'],
            );
        Department::firstOrCreate(
            [
                'name' => 'Cardiology',
            ],
            ['name' => 'Cardiology'],
            );
    }
}
