<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PractitionerController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\DoctorSessionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Verification link sent!']);
})->middleware(['auth:sanctum', 'throttle:6,1']);


Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found.'], 404);
    }

    // Check if already verified
    if ($user->hasVerifiedEmail()) {
        return redirect('http://127.0.0.1:8000/Verifyemailcomplete');
    }

    // Verify hash (security)
    if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
        return response()->json(['message' => 'Invalid verification link.'], 400);
    }

    // Mark verified
    $user->markEmailAsVerified();
    event(new Verified($user));

    // Redirect to Vue app
    return redirect('http://127.0.0.1:8000/Verifyemailcomplete');
})->middleware(['signed'])->name('verification.verify');



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
    Route::post('/doctor/savecertificate', [DoctorController::class, 'addCertificate']);
    Route::get('/doctor/getcertificate', [DoctorController::class, 'getCertificates']);
    Route::delete('/doctor/deletecertificate/{id}', [DoctorController::class, 'deleteCertificate']);

    Route::post('/doctor/update-image', [DoctorController::class, 'updateImage']);

    Route::post('/doctor/packages', [DoctorSessionController::class, 'savePackages']);

    Route::post('/doctor/availability', [DoctorSessionController::class, 'saveAvailability']);

    Route::get('/appointments', [AppointmentController::class, 'userBooking']);

    Route::get('/doctor/userappointments', [AppointmentController::class, 'doctorBooking']);
    Route::get('/doctor/oneappointment/{id}', [AppointmentController::class, 'oneappointment']);

    Route::put('/doctor/update-appointment-status/{id}', [AppointmentController::class, 'updateStatus']);
    Route::post('/doctor/createZoomMeeting/{id}', [AppointmentController::class, 'createZoomMeeting'])->name('doctor.createZoomMeeting');

    Route::apiResource('services', ServiceController::class);
});

Route::get('/GetAllDoctor', [DoctorController::class, 'GetAllDoctor']);
Route::get('/doctor/{id}', [DoctorController::class, 'GetOneDoctor']);
Route::get('/doctorCertificate/{id}', [DoctorController::class, 'doctorCertificate']);
Route::get('/GetDoctorByModality/{id}', [DoctorController::class, 'GetDoctorByModality']);
Route::post('/userpayment', [AppointmentController::class, 'store']);

Route::get("/availability/{doctor_id}", [DoctorSessionController::class, "GetDateForDoctor"]);

Route::get("/availability/{doctor_id}/{time}/{year}", [DoctorSessionController::class, "TimeDocotroinMOnth"]);

Route::delete("availability/delete/{id}", [DoctorSessionController::class, "deleteavailability"]);
Route::get("/package/{doctor_id}", [DoctorSessionController::class, "Getpackage"]);
Route::delete("packages/delete/{id}", [DoctorSessionController::class, "deletePackage"]);
Route::post('/contact', [DashboardController::class, 'contactsave']);

Route::get('/doctorservice/{id}', [ServiceController::class, 'getDoctorServices']);
Route::get('/modalities', [DoctorController::class, 'modalities']);
Route::get('/searchdoctor', [DoctorController::class, 'searchdoctor']);

Route::post('/quiz', [DoctorController::class, 'quiz']);
