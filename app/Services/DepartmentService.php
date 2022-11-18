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

    }
