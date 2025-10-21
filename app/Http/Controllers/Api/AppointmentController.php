<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Services\ZoomService;
use Illuminate\Support\Facades\Mail;


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
                'zip'   => $request->zip,
                'timezone'   => $request->timezone,
                'payment_method'   => $request->payment_method,
                'type'   => $request->type,
            ]);

            Mail::raw(
                "Dear {$appointment->name},\n\n" .
                    "Your appointment has been successfully confirmed!\n\n" .
                    "📅 Date: {$appointment->date}\n" .
                    "⏰ Time: {$appointment->time}\n\n" .
                    "Doctor ID: {$appointment->doctor_id}\n\n" .
                    "Thank you for booking with us. We look forward to seeing you!\n\n" .
                    "Best regards,\n" .
                    "The Healar Network Team",
                function ($message) use ($appointment) {
                    $message->to($appointment->email)
                        ->subject('Your Appointment is Confirmed');
                }
            );


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
        $user = Auth::id();
        $appointments = Appointment::with(['doctor', 'doctorpackage']) // eager load relations
            ->where('user_id', $user)
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
    public function oneappointment($id)
    {

        // dd($user);
        $appointments = Appointment::with(['user', 'doctorpackage']) // eager load relations
            ->where('id', $id)
            ->latest()
            ->first();
        // dd($appointments);
        return response()->json($appointments);
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->Zomemeting = $request->peer_id;
        $appointment->save();
        return response()->json(['message' => 'Status updated', 'data' => $appointment]);
    }
    public function createZoomMeeting(Request $request, $id)
    {
        $appointment = Appointment::with('doctor', 'user')->findOrFail($id);

        $zoom = new ZoomService();

        // dd($appointment->time);

        $meeting = $zoom->createMeeting(
            "Appointment with Dr. " . $appointment->doctor->name,
            $appointment->date . 'T' . $appointment->time . ':00Z'
        );


        // Save meeting info
        $appointment->Zomemeting = $meeting['id'];
        $appointment->zoom_join_url = $meeting['join_url'];
        $appointment->zoom_start_url = $meeting['start_url'];
        $appointment->status = 'meeting_scheduled';
        $appointment->save();

        // Send email to user
        Mail::raw("Join your meeting: " . $meeting['join_url'], function ($message) use ($appointment) {

            if ($appointment->email) {
                $message->to($appointment->email)
                    ->subject('Your Zoom Meeting Link');
            } else {
                $message->to($appointment->user->email)
                    ->subject('Your Zoom Meeting Link');
            }
        });

        return back()->with('success', 'Meeting created and link sent!');
    }
}
