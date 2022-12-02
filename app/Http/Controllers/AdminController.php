<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\UserRequest;
use App\Models\Patient;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected $deparmentService;
    public function __construct(DepartmentService $deparmentService)
    {
        $this->deparmentService = $deparmentService;
    }

    public function index()
    {
        return view('admin.index');
    }
    public function departmentView()
    {
        $departments = $this->deparmentService->departments();
        $rooms = $this->deparmentService->rooms();
        return view('admin.departments.department', compact('departments', 'rooms'));
    }
    public function roomView()
    {
        $rooms = $this->deparmentService->rooms();
        $departments = $this->deparmentService->departments();
        return view('admin.rooms.rooms', compact('rooms', 'departments'));
    }


    public function doctorView()
    {
        $rooms = $this->deparmentService->rooms();
        $departments = $this->deparmentService->departments();
        $doctors = $this->deparmentService->doctors();
        return view('admin.Doctors.doctors', compact('rooms', 'departments', 'doctors'));
    }

    public function findRoomByDepartment($departmentId)
    {
        return $this->deparmentService->findRoomByDepartment($departmentId);
    }

    public function doctorStore(UserRequest $request)
    {

        $data = $request->all();
        return $this->deparmentService->doctorStore($data);
    }

    public function store(DepartmentRequest $request)
    {
        $data = $request->all();
        return $this->deparmentService->departmentStore($data);
    }
    public function roomstore(RoomRequest $request)
    {
        $data = $request->all();
        return $this->deparmentService->roomStore($data);
    }

    public function transactions()
    {
        $transactions =  $this->deparmentService->userTransactions();
        return view('admin.transactions.transaction', compact('transactions'));
    }

    public function patients()
    {
        $patients = $this->deparmentService->patientQoue();
        return view('admin.transactions.patients', compact('patients'));
    }

    public function patientUpdate(PatientRequest $request)
    {
        $data = $request->all();
        $this->deparmentService->patientQoueUpdate($data);
        return "Update Patient Successfully";
    }

    public function getRoles()
    {

        $roles = Role::all();
        return view('admin.User_managment.roles', compact('roles'));
    }

    public function getPermissions()
    {
        $permissions = Permission::all();
        return view('admin.User_managment.permissions', compact('permissions'));
    }

    public function storeRoles(RoleRequest $request)
    {

        $data = $request->all();
        if ($data['id'] != null) {
            Role::updateOrCreate(
                [
                    'id' => $data['id'],
                ],
                $data
            );
            return "Update Role Successfully";
        } else {
            Role::updateOrCreate(
                [
                    'id' => $data['id'],
                ],
                $data
            );
            return "Add Role Successfully";
        }
    }
    public function storePermission(Request $request)
    {
        $data = $request->all();
        if ($data['id'] != null) {
            Permission::updateOrCreate(
                [
                    'id' => $data['id'],
                ],
                $data
            );
            return "Update Permission Successfully";
        } else {
            Permission::updateOrCreate(
                [
                    'id' => $data['id'],
                ],
                $data
            );
            return "Add Permission Successfully";
        }

    }
}
