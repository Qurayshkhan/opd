<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{

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

    public function findDoctorByRoom($roomId)
    {
        return $this->deparmentRepository->getdoctorListByRoom($roomId);
    }

    public function appointments()
    {
        $id = auth()->user()->id;
        return $this->deparmentRepository->getMyAppointmentList($id);
    }
    public function doctorappointments()
    {
        $id = auth()->user()->id;
        return $this->deparmentRepository->getDoctorAppointmentList($id);
    }

    public function departmentStore($data)
    {

        $data = [
            'id' => $data['id'],
            'name' => $data['name'],
        ];
        if ($data['id']) {
            $this->deparmentRepository->updateCreate($data);
            return "Department update successfully";
        } else {
            $this->deparmentRepository->updateCreate($data);
            return "Department store successfully";
        }
    }
    public function roomStore($data)
    {

        $data = [
            'id' => $data['id'],
            'name' => $data['name'],
            'department_id' => $data['department_id'],
        ];
        if ($data['id']) {
            $this->deparmentRepository->updateCreateRoom($data);
            return "Room update successfully";
        } else {
            $this->deparmentRepository->updateCreateRoom($data);
            return "Room store successfully";
        }
    }
    public function doctorStore($data)
    {

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
        } else {
            $this->deparmentRepository->updateCreateDoctor($data);
            return "Doctor store successfully";
        }
    }

    public function appointmentStore($data)
    {
        $userId = auth()->user()->id;

        $data = [
            'patient_id' => $userId,
            'doctor_id' => $data['doctor_id'],
            'message' => $data['message']
        ];

        return $this->deparmentRepository->createAppointment($data);
    }

    public function appointmentApproved($data)
    {
        $data = [
            "id" => $data['id'],
            "status" => $data['status'],
            "payment_fee" => $data['payment_fee'],
        ];
        if ($data['payment_fee'] == null) {
            $this->deparmentRepository->appointmentApproved($data);
            return "Appointment Reject";
        }else {
            $this->deparmentRepository->appointmentApproved($data);
            return "Appointment Approved";
        }
    }
    public function userAppointmentFee()
    {
        $userId = auth()->user()->id;
        return $this->deparmentRepository->appointFee($userId);
    }

    public function patientPayment($data)
    {
        $data = [
            "appointment_id" => $data['id'],
            "id" => $data['payment_id'],
            "account_number" => $data['account_number'],
            "payment_method" => $data['payment'],
        ];
        $this->deparmentRepository->patientPayappointmentFee($data);
        return "Your payment successfully done";
    }

    public function userTransactions()
    {
      return $this->deparmentRepository->getTransactionList();
    }
}
