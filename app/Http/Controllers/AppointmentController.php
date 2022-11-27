<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentService->departments();
        $appointments = $this->departmentService->appointments();
        return view('patients.appintment', compact('departments', 'appointments'));
    }

    public function getDoctor($id)
    {

        $doctor = $this->departmentService->findDoctorByRoom($id);
        return $result = [
            $doctor,
        ];
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
    public function appointmentFee()
    {
        $appointmentFees = $this->departmentService->userAppointmentFee();

        return view('patients.appointment-fee', compact('appointmentFees'));
    }

    public function  payAppointmentFee(Request $request)
    {
        $data = $request->all();
        return $this->departmentService->patientPayment($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->departmentService->appointmentStore($data);
        return redirect()->back()->with('success', 'Your appointment submit successfully');
    }

    public function doctorApprovedAppointment(AppointmentRequest $request)
    {
        $data = $request->all();
        return $this->departmentService->appointmentApproved($data);
    }
    public function doctorRejectAppointment(Request $request)
    {
        $data = $request->all();
        return $this->departmentService->appointmentApproved($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
