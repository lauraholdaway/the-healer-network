<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\ModalityController;
use App\Http\controllers\BlogsController;

use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/superadmin', function () {
    if (Auth::check() && Auth::user()->role == 1) {
        return redirect()->route('dashboard'); // change to your route name
    }
    return view('admin.auth.login');
});



Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/UserContact', [DashboardController::class, 'showAdminside'])->name('contact');

    Route::get('/practitioner', [DoctorController::class, 'index'])->name('doctors.index');

    Route::get('/users', [DashboardController::class, 'users'])->name('users.index');
    Route::get('/Appointments', [DashboardController::class, 'Appointmentslist'])->name('Appointments.index');
    Route::post('/userstatus/{id}/toggle-status', [DashboardController::class, 'toggleStatus']);
    Route::resource('modalities', ModalityController::class);
    Route::resource('/Blogs', BlogsController::class);
});

// routes/web.php
Route::get('/{any?}', function () {
    return view('spa');
})->where('any', '.*')->name('spa');
