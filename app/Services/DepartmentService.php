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

    }
