<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PractitionerController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\DoctorSessionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class,'me']);
    Route::post('/user/update', [AuthController::class, 'update']);
    Route::get('/docterdata', [DoctorController::class,'docterdata']);
    Route::post('/logout', [AuthController::class,'logout']);
    // other protected api routes
});
Route::middleware('auth:sanctum')->post('/profile/update-image', [AuthController::class, 'updateImage']);

Route::post('/practitioners/register', [PractitionerController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/doctor/profile', [DoctorController::class, 'profile']);
    Route::post('/doctor/update', [DoctorController::class, 'update']);
    Route::post('/doctor/update-image', [DoctorController::class, 'updateImage']);
    Route::post('/doctor/packages', [DoctorSessionController::class, 'savePackages']);
    Route::post('/doctor/availability', [DoctorSessionController::class, 'saveAvailability']);
    Route::get('/appointments', [AppointmentController::class, 'userBooking']);
    Route::get('/doctor/userappointments', [AppointmentController::class, 'doctorBooking']);
    Route::apiResource('services', ServiceController::class);
});
Route::get('/GetAllDoctor', [DoctorController::class, 'GetAllDoctor']);
Route::get('/doctor/{id}', [DoctorController::class, 'GetOneDoctor']);
Route::post('/userpayment', [AppointmentController::class, 'store']);
Route::get("/availability/{doctor_id}", [DoctorSessionController::class, "GetDateForDoctor"]);
Route::delete("availability/delete/{id}", [DoctorSessionController::class, "deleteavailability"]);
Route::get("/package/{doctor_id}", [DoctorSessionController::class, "Getpackage"]);
Route::delete("packages/delete/{id}", [DoctorSessionController::class, "deletePackage"]);
Route::post('/contact', [DashboardController::class, 'contactsave']);
Route::get('/doctorservice/{id}', [ServiceController::class, 'getDoctorServices']);
