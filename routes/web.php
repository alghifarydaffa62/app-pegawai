<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    });

    route::resource('employees', EmployeeController::class);
    route::resource('department', DepartmentController::class);
    route::resource('position', PositionController::class);
    route::resource('attendance', AttendanceController::class);
    route::resource('salaries', SalariesController::class);
    route::resource('admin', AdminController::class);
});