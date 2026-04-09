<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // If authenticated, redirect to dashboard, else redirect to login
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Students CRUD (excluding show for simplicity as per requirements)
    Route::resource('students', StudentController::class)->except('show');

    // Attendance
    Route::get('attendance/mark', [AttendanceController::class, 'markForm'])->name('attendance.mark');
    Route::post('attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('attendance/report', [AttendanceController::class, 'report'])->name('attendance.report');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
