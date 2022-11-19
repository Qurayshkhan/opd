<?php

namespace App\Helpers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\User;

class OpdHelperService
{


    public static function counts($data)
    {
        if ($data == 'users') {
            return User::count();
        } elseif ($data == 'rooms') {
            return Room::count();
        }elseif ($data == 'departments') {
            return Department::count();
        }
         else {
            return Doctor::count();
        }
    }
}
