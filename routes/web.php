<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('employees', EmployeeController::class);
route::resource('department', DepartmentController::class);
route::resource('position', PositionController::class);
route::resource('attendance', AttendanceController::class);