<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\DoctorController;


Route::get('/superadmin', function () {
    return view('admin.auth.login');
});



Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/practitioner', [DoctorController::class, 'index'])->name('doctors.index');

    Route::get('/users', [DashboardController::class, 'users'])->name('users.index');
});

// routes/web.php
Route::get('/{any?}', function () {
    return view('spa');
})->where('any', '.*')->name('spa');
