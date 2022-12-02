<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DepartmentRepository
{

    protected $department, $room, $doctor, $user, $appointment, $payment, $patient, $roles;

    public function __construct(Department $department, Room $room, Doctor $doctor, User $user, Appointment $appointment, Payment $payment, Patient $patient, Role $roles)

    {
        $this->department = $department;
        $this->room = $room;
        $this->doctor = $doctor;
        $this->user = $user;
        $this->appointment = $appointment;
        $this->payment = $payment;
        $this->patient = $patient;
        $this->role = $roles;
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

    public function getdoctorListByRoom($id)
    {
        return $this->doctor->where('room_id', $id)->with('user', 'room')->first();
    }

    public function getMyAppointmentList($id)
    {
        return $this->appointment->where('patient_id', $id)->with('patient', 'doctor')->get();
    }
    public function appointFee($id)
    {
        return $this->appointment->where('patient_id', $id)->with('payment', 'patient', 'doctor')->get();
    }
    public function getDoctorAppointmentList($id)
    {
        return $this->appointment->where('doctor_id', $id)->with('patient', 'doctor')->get();
    }

    public function patientQoue()
    {
        return $this->patient->with('user')->get();
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

    public function createAppointment($data)
    {
        return $this->appointment->create($data);
    }

    public function appointmentApproved($data)
    {
        if ($data['payment_fee'] == null) {

            $this->appointment->updateOrCreate(
                ['id' => $data['id']],
                [
                    'status' => 'rejected',
                ]
            );

            $this->payment->create([
                'appointment_id' => $data['id'],
                'payment_fee' => 0,
            ]);
            return;
        } else {


            $this->appointment->updateOrCreate(
                ['id' => $data['id']],
                [
                    'status' => 'approved',
                ]
            );
            $this->payment->create([
                'appointment_id' => $data['id'],
                'payment_fee' => $data['payment_fee'],
            ]);
            return;
        }
    }


    public function patientPayappointmentFee($data)
    {

        $this->payment->updateOrCreate(
            ['id' => $data['id']],
            [
                'payment_method' => $data['payment_method'],
                'account_number' => $data['account_number'],
                'payment_status' => 'paid'
            ]
        );
        return;
    }

    public function getTransactionList()
    {
        return $this->payment->with('appointment')->get();
    }

    public function updatePatient($data)
    {
        $this->patient->updateOrCreate(
            ['user_id' => $data['user_id']],
            [
                'phone' => $data['phone'],
                'cnic' => $data['cnic'],
                'gender' => $data['gender'],

            ]
        );

        $this->user->updateOrCreate(
            [
                'id' => $data['user_id'],
            ],
            [
                'name' => $data['name'],
                'email' => $data['email']
            ]
        );
        return;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        dd($roles);
    }
}
