<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Practitioner;
use App\Models\User;

class DoctorController extends Controller
{
    // ✅ Get profile
    public function profile()
    {
        $user = Auth::guard('web')->user();
        $Practitioner = Practitioner::where('user_id', Auth::id())->first();
        return response()->json($Practitioner);
    }


    // ✅ Update doctor profile (except email)
    public function update(Request $request)
    {
        // dd($request->all());
        $user = User::find(Auth::id());

        $validated = $request->validate([
            // User fields
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'number' => 'nullable|string|max:20',

            // Practitioner fields
            'practice_location' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'primary_contact_number' => 'nullable|string|max:20',
            'mobile_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'social_media_handle' => 'nullable|string|max:255',
            // 'modalities' => 'nullable|string', // or 'array' if you send JSON
            'practicing_since' => 'nullable|string|max:50',
            'clients_per_month' => 'nullable|integer',
            'free_trial_sessions' => 'nullable|boolean',
            'happy_to_provide_free_session' => 'nullable|boolean',
            'referred_by' => 'nullable|string|max:255',
        ]);

        // ✅ Update User
        $user->name = $validated['name'] . ' ' . $validated['last_name'];
        $user->number = $validated['phone'] ?? $user->phone;
        $user->save();

        // ✅ Update Practitioner
        $practitioner = Practitioner::where('user_id', $user->id)->first();

        if ($practitioner) {
            $practitioner->practice_location = $validated['practice_location'] ?? $practitioner->practice_location;
            $practitioner->about = $validated['about'] ?? $practitioner->about;
            $practitioner->primary_contact_number = $validated['primary_contact_number'] ?? $practitioner->primary_contact_number;
            $practitioner->mobile_number = $validated['mobile_number'] ?? $practitioner->mobile_number;
            $practitioner->address = $validated['address'] ?? $practitioner->address;
            $practitioner->social_media_handle = $validated['social_media_handle'] ?? $practitioner->social_media_handle;
            // $practitioner->modalities = json_encode($validated['modalities'] ?? $practitioner->modalities);
            $practitioner->practicing_since = $validated['practicing_since'] ?? $practitioner->practicing_since;
            $practitioner->clients_per_month = $validated['clients_per_month'] ?? $practitioner->clients_per_month;
            $practitioner->free_trial_sessions = $validated['free_trial_sessions'] ?? $practitioner->free_trial_sessions;
            $practitioner->happy_to_provide_free_session = $validated['happy_to_provide_free_session'] ?? $practitioner->happy_to_provide_free_session;
            $practitioner->referred_by = $validated['referred_by'] ?? $practitioner->referred_by;

            $practitioner->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $user,
            'practitioner' => $practitioner,
        ]);
    }

    // ✅ Update doctor profile image
    public function updateImage(Request $request)
    {

        $request->validate([
            'profile_image' => 'required',
        ]);

        $user = User::find(Auth::id());

        $path = $request->file('profile_image')->store('profiles', 'public');

        // Ensure $user is an Eloquent model before calling save()
        if (method_exists($user, 'save')) {
            $user->image = $path;
            $user->save();
        } else {
            return response()->json(['error' => 'User model does not support save operation.'], 500);
        }

        return response()->json(['image' => $path]);
    }

    // here local
    public function index()
    {
        $doctors = Practitioner::with('user')->get();
        return view('admin.doctors.index', compact('doctors'));
    }


    public function GetAllDoctor()
    {
        $Practitioner = Practitioner::with('user')
            ->whereHas('user', function ($query) {
                $query->where('status', '1');
            })

            ->get();
        return response()->json($Practitioner);
    }
    public function GetOneDoctor($id)
    {
        $Practitioner = Practitioner::with('user')->where('user_id', $id)->first();
        return response()->json($Practitioner);
    }
}
