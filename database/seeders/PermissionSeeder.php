<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'can_view_department',
            'can_edit_department',
            'can_add_department',
            'can_view_doctor',
            'can_edit_doctor',
            'can_add_doctor',
            'can_view_room',
            'can_edit_room',
            'can_add_room',
            'can_view_patient',
            'can_edit_patient',
            'can_add_patient',
            'can_view_transaction',
            'can_edit_transaction',
            'can_add_transaction',
            'can_view_appointment',
            'can_edit_appointment',
            'can_add_appointment',
            'can_view_admistration',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('can_view_department');
        $adminRole->givePermissionTo('can_add_department');
        $adminRole->givePermissionTo('can_edit_department');
        $adminRole->givePermissionTo('can_view_doctor');
        $adminRole->givePermissionTo('can_add_doctor');
        $adminRole->givePermissionTo('can_edit_doctor');
        $adminRole->givePermissionTo('can_view_room');
        $adminRole->givePermissionTo('can_add_room');
        $adminRole->givePermissionTo('can_edit_room');
        $adminRole->givePermissionTo('can_add_patient');
        $adminRole->givePermissionTo('can_view_patient');
        $adminRole->givePermissionTo('can_edit_patient');
        $adminRole->givePermissionTo('can_add_transaction');
        $adminRole->givePermissionTo('can_edit_transaction');
        $adminRole->givePermissionTo('can_view_transaction');
        $adminRole->givePermissionTo('can_view_admistration');


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
            $user->assignRole($adminRole);
        }
        $doctorRole = Role::create(['name' => 'doctor']);
        $doctorRole->givePermissionTo('can_add_transaction');
        $doctorRole->givePermissionTo('can_view_appointment');
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
            $user->assignRole($doctorRole);
        }
        $patientRole = Role::create(['name' => 'patient']);
        $patientRole->givePermissionTo('can_view_appointment');
        $patientRole->givePermissionTo('can_add_transaction');
        $patientRole->givePermissionTo('can_view_transaction');
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
            $user->assignRole($patientRole);
        }
    }
}
