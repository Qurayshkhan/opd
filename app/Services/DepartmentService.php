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
    public function doctors()
    {
        return $this->deparmentRepository->getListDoctors();

    }
    public function findRoomByDepartment($departmentId)
    {

        return $this->deparmentRepository->getListRoomByDepartment($departmentId);

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
    public function doctorStore($data){

        $data = [
            "id" => $data['id'],
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => $data['password'],
            "room_id" => $data['room_id'],
        ];
        if ($data['id']) {
            $this->deparmentRepository->updateCreateDoctor($data);
            return "Doctor update successfully";
        }else{
            $this->deparmentRepository->updateCreateDoctor($data);
            return "Doctor store successfully";
        }

    }

    }
