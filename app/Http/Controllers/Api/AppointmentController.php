<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Appointment;
use App\Models\DoctorPackage;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use App\Services\ZoomService;
use Illuminate\Support\Facades\Mail;
use Exception;
use Carbon\Carbon;


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
        ]);


        $prices = DoctorPackage::where('id', $request->doctortime,)->first();
        if (empty($prices)) {
            return response()->json(['error' => 'Doctor Price not have',]);
        }

        $amount = $prices->price;

        // Set Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            // ✅ Step 1: Convert amount to cents for Stripe
            $amountInCents = intval($amount * 100);

            // ✅ Step 2: Charge the user via Stripe
            $charge = Charge::create([
                'amount'      => $amountInCents,
                'currency'    => $request->currency ?? 'usd',
                'description' => 'Doctor Appointment Booking',
                'source'      => $request->token, // Stripe token
            ]);

            // ✅ Step 3: Save Appointment
            $appointment = Appointment::create([
                'doctor_id'        => $request->doctor_id,
                'user_id'          => $request->user_id,
                'session'          => $request->doctortime,
                'currency'         => $request->currency ?? 'usd',
                'payment'          => $amount,
                'date'             => $request->date,
                'time'             => $request->time,
                'payment_id'       => $charge->id,
                'status'           => 'paid',
                'name'             => $request->name,
                'email'            => $request->email,
                'country'          => $request->country,
                'timezone'         => $request->timezone,
                'payment_method'   => $request->payment_method,
                'type'             => $request->type,
            ]);

            $appointment->load('doctor', 'user', 'doctorDetails');
            // ✅ Step 4: Create Zoom meeting after payment success

            $meetingUrl = '';
            if ($request->type === 'Online') {
                $zoom = new ZoomService();
                $startTime = Carbon::parse($request->date . ' ' . $request->time)->toIso8601String();
                $meeting = $zoom->createMeeting(
                    "Appointment with Dr. " . $appointment->doctor->name,
                    $startTime
                );
                // ✅ Step 5: Save Zoom details
                $appointment->update([
                    'Zomemeting'     => $meeting['id'],
                    'zoom_join_url'  => $meeting['join_url'],
                    'zoom_start_url' => $meeting['start_url'],
                    'status'         => 'meeting_scheduled',
            ]);
                $meetingUrl = $meeting['join_url'] ?? null;
            }


            // ✅ Step 6: Send email to user with meeting info
            // Build the email message dynamically
            $messageBody = "
                Dear {$appointment->name},

                🎉 Your appointment has been successfully confirmed!

                Doctor: Dr. {$appointment->doctor->name}
                📅 Date: {$appointment->date}
                ⏰ Time: {$appointment->time}
                🌐 Timezone: {$appointment->timezone}

";
            // Add meeting link only if available
            if (!empty($meetingUrl)) {
                $messageBody .= "Please join your Zoom meeting using this link:\n{$meetingUrl}\n\n";
            } else {
                $messageBody .= "Doctor Email:{$appointment->doctor->email}\n";
                $messageBody .= "Doctor Phone number:{$appointment->doctorDetails->primary_contact_number}\n";
                $messageBody .= "Doctor address:{$appointment->doctorDetails->practice_location}\n\n";
            }

            $messageBody .= "Thank you for choosing Healar Network!";

            // Send the email
            Mail::raw($messageBody, function ($message) use ($appointment) {
                $message->to($appointment->email)
                    ->subject('Your Zoom Appointment Details');
            });

            // ✅ Step 8: Return success response
            return response()->json([
                'success'     => true,
                'message'     => 'Appointment booked and Zoom meeting created successfully!',
            'appointment' => $appointment,
        ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }




    public function userBooking(Request $request)
    {
        $user = Auth::id();
        $appointments = Appointment::with(['doctor', 'doctorpackage', 'doctorDetails']) // eager load relations
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
        $appointments = Appointment::with(['user', 'doctorpackage', 'rating']) // eager load relations
            ->where('doctor_id', $user->id)
            ->latest()
            ->get();
            // dd($appointments);
        return response()->json($appointments);
    }
    public function oneappointment($id)
    {

        // dd($user);
        $appointments = Appointment::with(['user', 'doctorpackage', 'doctor']) // eager load relations
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

    public function updateAppStatus(Request $request,)
    {
        // dd($request->all());
        $appointment = Appointment::findOrFail($request->id);
        if ($request->filled('status')) {
            $appointment->status = $request->status;
        }

        if ($request->filled('message')) {
            $appointment->replay = $request->message;
        }

        if ($request->filled('selectedTime')) {
            $appointment->time = $request->selectedTime;
        }

        if ($request->filled('selectedDate')) {
            $appointment->date = $request->selectedDate;
        }
        $appointment->save();
        return response()->json(['message' => 'Status updated', 'data' => $appointment]);
    }

    public function createZoomMeeting(Request $request, $id)
    {
        $appointment = Appointment::with('doctor', 'user')->findOrFail($id);
        $zoom = new ZoomService();
        $meeting = $zoom->createMeeting(
            "Appointment with Dr. " . $appointment->doctor->name,
            $appointment->date . 'T' . $appointment->time . ':00Z'
        );
        $appointment->Zomemeting = $meeting['id'];
        $appointment->zoom_join_url = $meeting['join_url'];
        $appointment->zoom_start_url = $meeting['start_url'];
        $appointment->status = 'meeting_scheduled';
        $appointment->save();

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


    public function createNote(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'message' => 'required',
        ]);

        Note::create($data);
        return response()->json(['message' => 'Status updated', 'data' => $data]);
    }

    public function GetNote(Request $request, $id = null)
    {
        // allow id to come from route parameter or request payload/query
        $id = $id ?? request()->route('id') ?? request()->id ?? request()->input('app_id');

        if (empty($id)) {
            return response()->json(['message' => 'Missing appointment id'], 400);
        }

        $data = Note::where('app_id', $id)->get();
        return response()->json(['message' => 'Success Get Notes', 'data' => $data]);
    }
}
