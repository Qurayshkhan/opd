<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService {

    protected $deparmentRepository;

    public function __construct(DepartmentRepository $deparmentRepository)
    {
        $this->deparmentRepository = $deparmentRepository;
    }

    public function departments()
    {
        return $this->deparmentRepository->getListDepartments();

    }
    public function rooms()
    {
        return $this->deparmentRepository->getListRooms();

    }

    public function departmentStore($data){

        $data = [
            'id' => $data['id'],
            'name' => $data['name'],
        ];
        if ($data['id']) {
            $this->deparmentRepository->updateCreate($data);
            return "Department update successfully";
        }else{
            $this->deparmentRepository->updateCreate($data);
            return "Department store successfully";
        }

    }
    public function roomStore($data){

        $data = [
            'id' => $data['id'],
            'name' => $data['name'],
            'department_id' => $data['department_id'],
        ];
        if ($data['id']) {
            $this->deparmentRepository->updateCreateRoom($data);
            return "Room update successfully";
        }else{
            $this->deparmentRepository->updateCreateRoom($data);
            return "Room store successfully";
        }

    }

    }
