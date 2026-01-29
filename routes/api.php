<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PractitionerController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\DoctorSessionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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

        return redirect(url('/Verifyemailcomplete'));
    }

    // Verify hash (security)
    if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
        return response()->json(['message' => 'Invalid verification link.'], 400);
    }

    // Mark verified
    $user->markEmailAsVerified();
    event(new Verified($user));

    // Redirect to Vue app

    return redirect(url('/Verifyemailcomplete'));
})->middleware(['signed'])->name('verification.verify');

Route::post('/findLogin', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return response()->json(['message' => 'Email not found'], 404);
    }
    // Generate 6-digit OTP
    $otp = rand(100000, 999999);
    // Store OTP in cache for 10 minutes
    Cache::put('password_reset_' . $request->email, $otp, now()->addMinutes(10));
    // Send OTP via email
    Mail::raw("Your password reset OTP is: $otp", function ($message) use ($user) {
        $message->to($user->email)
            ->subject('Password Reset OTP');
    });
    return response()->json(['message' => 'OTP sent to your email']);
});

Route::post('/verify-otp', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
        'password' => 'required|min:6',
    ]);

    $cachedOtp = Cache::get('password_reset_' . $request->email);

    if (!$cachedOtp || $cachedOtp != $request->otp) {
        return response()->json(['message' => 'Invalid or expired OTP'], 400);
    }

    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    // Remove OTP from cache
    Cache::forget('password_reset_' . $request->email);

    return response()->json(['message' => 'Password updated successfully']);
});

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


    Route::post('/doctor/saveInsuranceCertificate', [DoctorController::class, 'saveInsuranceCertificate']);
    Route::get('/doctor/GetInsuranceCertificates', [DoctorController::class, 'GetInsuranceCertificates']);
    Route::delete('/doctor/DeleteinsuranceCertificate/{id}', [DoctorController::class, 'DeleteinsuranceCertificate']);

    



    Route::post('/doctor/update-image', [DoctorController::class, 'updateImage']);
    Route::post('/update-password', [DoctorController::class, 'updatepassword']);

    Route::post('/doctor/packages', [DoctorSessionController::class, 'savePackages']);

    Route::post('/doctor/availability', [DoctorSessionController::class, 'saveAvailability']);

    Route::get('/appointments', [AppointmentController::class, 'userBooking']);

    Route::get('/doctor/userappointments', [AppointmentController::class, 'doctorBooking']);
    Route::get('/doctor/oneappointment/{id}', [AppointmentController::class, 'oneappointment']);
    Route::post('/updateAppStatus', [AppointmentController::class, 'updateAppStatus']);
    Route::post('/createNote', [AppointmentController::class, 'createNote']);
    Route::get('/GetNote/{id}', [AppointmentController::class, 'GetNote']);

    Route::put('/doctor/update-appointment-status/{id}', [AppointmentController::class, 'updateStatus']);
    Route::post('/doctor/createZoomMeeting/{id}', [AppointmentController::class, 'createZoomMeeting'])->name('doctor.createZoomMeeting');

    Route::apiResource('services', ServiceController::class);
    Route::post('/stripe/create-account-link', [DoctorController::class, 'createStripeAccountLink']);
    Route::get('/stripe/status', [DoctorController::class, 'stripeStatus']);

        Route::get('/stripe/success', function() {
            $user =  Auth::user();
            $user->stripe_account_connected = true;
            $user->save();
            return redirect('/')->with('success', 'Stripe account connected!');
        })->name('stripe.success');
});

Route::get('/GetAllDoctor', [DoctorController::class, 'GetAllDoctor']);
Route::get('/doctor/{id}', [DoctorController::class, 'GetOneDoctor']);
Route::get('/doctorCertificate/{id}', [DoctorController::class, 'doctorCertificate']);
Route::get('/GetDoctorByModality/{id}', [DoctorController::class, 'GetDoctorByModality']);
Route::post('/userpayment', [AppointmentController::class, 'store']);

Route::get("/Doctoravailable/{doctor_id}", [DoctorSessionController::class, "Doctoravailable"]);
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
Route::get('/blogs', [BlogsController::class, 'blogs']);
Route::get('/blog/{id?}', [BlogsController::class, 'blogone']);

Route::post('/saverating', [DoctorController::class, 'saverating']);
Route::get('/getRating/{id}', [DoctorController::class, 'getRating']);
Route::post('/saveEmail', [SubscriptionController::class, 'store']);

Route::get('/stripe/refresh', function() {
    return redirect('/')->with('success', 'Stripe account connected!');
})->name('stripe.refresh');

 
