<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PractitionerController;
use App\Http\Controllers\Api\DoctorController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class,'me']);
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
});
