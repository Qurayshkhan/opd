<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function(){

        return view('patients.index');

});

Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function(){

    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-departments', [AdminController::class, 'departmentView'])->name('admin.depatments');
    Route::post('/admin-department-store', [AdminController::class, 'store'])->name('admin.department.store');
    Route::post('/admin-room-store', [AdminController::class, 'roomStore'])->name('admin.room.store');
    Route::get('/admin-side-room-list', [AdminController::class, 'roomView'])->name('admin.side.room.list');

});
