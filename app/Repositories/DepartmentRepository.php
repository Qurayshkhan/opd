<?php

namespace App\Repositories;
use App\Models\Department;
class DepartmentRepository {

    protected $department;

    public function __construct(Department $department)

    {
        $this->department = $department;
    }
    public function getListDepartments()
    {
        return $this->department->get();

    }

    public function updateCreate($data)
    {
         return $this->department->updateOrCreate(
            ['id' => $data['id']],
            $data
        );

    }

}
