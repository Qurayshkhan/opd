<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {

    return view('patients.home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    //Admin uri
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-departments', [AdminController::class, 'departmentView'])->name('admin.depatments');
    Route::post('/admin-department-store', [AdminController::class, 'store'])->name('admin.department.store');

    //Rooms uri
    Route::get('/admin-side-room-list', [AdminController::class, 'roomView'])->name('admin.side.room.list');
    Route::post('/admin-room-store', [AdminController::class, 'roomStore'])->name('admin.room.store');

    //Doctors uri
    Route::get('/admin-side-doctor-list', [AdminController::class, 'doctorView'])->name('admin.side.doctor.list');
    Route::post('/admin-doctor-store', [AdminController::class, 'doctorStore'])->name('admin.doctor.store');

    Route::get('/admin-get-room-by-department/{departmentId}', [AdminController::class, 'findRoomByDepartment'])->name('admin.get.room.by.department');
    Route::get('/get-transaction', [AdminController::class, 'transactions'])->name('admin.transaction');

});

Route::group(['prefix' => 'patient', 'middleware' => ['auth']], function () {

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('patient.appointment');
    Route::get('/patient-get-doctor/{id}', [AppointmentController::class, 'getDoctor'])->name('patient.get.doctor');
    Route::post('/store-appointment', [AppointmentController::class, 'store'])->name('patient.appointment.store');
    Route::get('/appointment-fee', [AppointmentController::class, 'appointmentFee'])->name('appointment.fee');
    Route::post('/pay-appointment-fee', [AppointmentController::class, 'payAppointmentFee'])->name('patient.pay.appointment.fee');
});
Route::group(['prefix' => 'doctor', 'middleware' => ['auth']], function () {

    Route::get('/get-appointment-list', [DoctorController::class, 'index'])->name('doctor.appointment.list');
    Route::post('/appointment-approved/{id}', [AppointmentController::class, 'doctorApprovedAppointment'])->name('doctor.approve.appointment');
    Route::post('/appointment-rejected/{id}', [AppointmentController::class, 'doctorRejectAppointment'])->name('doctor.rejected.appointment');
});

