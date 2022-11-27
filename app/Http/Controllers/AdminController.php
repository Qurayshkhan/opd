<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\UserRequest;
use App\Services\DepartmentService;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    protected $deparmentService;
    public function __construct(DepartmentService $deparmentService)
    {
        $this->deparmentService = $deparmentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.Doctors.doctors', compact('rooms', 'departments','doctors'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->all();
        return $this->deparmentService->departmentStore($data);

        // return response()->json();
    }
    public function roomstore(RoomRequest $request)
    {
        $data = $request->all();
        return $this->deparmentService->roomStore($data);

        // return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //74/*
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
