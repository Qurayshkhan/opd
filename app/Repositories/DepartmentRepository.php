<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DepartmentRepository
{

    protected $department, $room, $doctor, $user;

    public function __construct(Department $department, Room $room, Doctor $doctor, User $user)

    {
        $this->department = $department;
        $this->room = $room;
        $this->doctor = $doctor;
        $this->user = $user;
    }
    public function getListDepartments()
    {
        return $this->department->get();
    }
    public function getListRooms()
    {
        return $this->room->with('department')->get();
    }
    public function getListDoctors()
    {
        return $this->doctor->with(['room', 'user'])->get();
    }
    public function getListRoomByDepartment($departmentId)
    {
        return $this->room->where('department_id', $departmentId)->get();
    }

    public function updateCreate($data)
    {
        return $this->department->updateOrCreate(
            ['id' => $data['id']],
            $data
        );
    }
    public function updateCreateRoom($data)
    {

        return $this->room->updateOrCreate(
            ['id' => $data['id']],
            $data
        );
    }

    public function updateCreateDoctor($data)
    {
        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];
        $userId =  $this->user->updateOrCreate(
            ['id' => $data['id']],
            $user
        );

        $doctorData = [
            'room_id' => $data['room_id'],
             'user_id' => $userId->id,
        ];

         $this->doctor->updateOrCreate(
            ['user_id' => $data['id']],
            $doctorData
        );
        return;
    }
}
