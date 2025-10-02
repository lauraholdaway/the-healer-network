<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Appointment;

class AppointmentController extends Controller
{




    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'doctor_id' => 'required',
            'user_id' => 'required',
            'doctortime' => 'required',
            'date' => 'required',
            'time' => 'required',
            'token' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ]);

        // Set Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));
try {
        // Charge customer
        $amountInCents = intval($request->amount * 100);
           $charge = Charge::create([
                'amount' => $amountInCents,
                'currency' => $request->currency ?? 'usd',
                'description' => 'Appointment Booking',
                'source' => $request->token, // token from Stripe Elements
            ]);

        // Save appointment
       $appointment = Appointment::create([
                'doctor_id'   => $request->doctor_id,
                'user_id'     => $request->user_id,
                'session'     => $request->doctortime,
                'currency'    => $request->currency ?? 'usd',
                'payment'     => $request->amount,
                'date'        => $request->date,
                'time'        => $request->time,
                'payment_id'  => $charge->id,
                'status'      => 'confirmed',
                'name'   => $request->name,
                'email'   => $request->email,
                'country'   => $request->country,
            ]);

        return response()->json([
            'success' => true,
            'appointment' => $appointment,
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

        public function userBooking(Request $request)
    {

        $user = $request->user();
        $appointments = Appointment::with(['doctor', 'doctorpackage']) // eager load relations
            ->where('user_id', $user->id)
            ->latest()
            ->get();

            // dd($appointments);
        return response()->json($appointments);
    }
        public function doctorBooking(Request $request)
    {

        $user = $request->user();
        // dd($user);
        $appointments = Appointment::with(['user', 'doctorpackage']) // eager load relations
            ->where('doctor_id', $user->id)
            ->latest()
            ->get();
            // dd($appointments);
        return response()->json($appointments);
    }

}
