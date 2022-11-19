<?php

namespace App\Repositories;
use App\Models\Department;
use App\Models\Room;
class DepartmentRepository {

    protected $department, $room;

    public function __construct(Department $department, Room $room)

    {
        $this->department = $department;
        $this->room = $room;
    }
    public function getListDepartments()
    {
        return $this->department->get();

    }
    public function getListRooms()
    {
       return $this->room->with('department')->get();


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

}
