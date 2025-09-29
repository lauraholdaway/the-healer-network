<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PractitionerController extends Controller
{
    public function store(Request $request)
    {

     $validated = $request->validate([
        // User fields
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|string|email|max:100|unique:users,email',
        'password' => 'required|string|min:6',

        // Practitioner fields
        'primary_contact_number' => 'required|string|max:20',
        'mobile_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'social_media_handle' => 'nullable|string|max:255',
        'modalities' => 'nullable|array',
        'practice_location' => 'nullable|string',
        'about' => 'nullable|string',
        'practicing_since' => 'nullable|string',
        'clients_per_month' => 'nullable|integer',
        'free_trial_sessions' => 'nullable|integer',
        'happy_to_provide_free_session' => 'boolean',
        'referred_by' => 'nullable|string|max:100',
    ]);

    // ✅ Create User first
    $user = User::create([
        'name' => $validated['first_name'] ,
        'last_name' => $validated['last_name'] ,
        'email' => $validated['email'],
        'number' => $validated['primary_contact_number'],
        'password' => Hash::make($validated['password']),
        'role' => '3',
    ]);

    // ✅ Create Practitioner linked to user
    $practitioner = Practitioner::create([
        'user_id' => $user->id,
        'primary_contact_number' => $validated['primary_contact_number'],
        'mobile_number' => $request->mobile_number,
        'address' => $request->address,
        'social_media_handle' => $request->social_media_handle,
        'modalities' => $request->modalities ? json_encode($request->modalities) : null,
        'practice_location' => $request->practice_location,
        'about' => $request->about,
        'practicing_since' => $request->practicing_since,
        'clients_per_month' => $request->clients_per_month,
        'free_trial_sessions' => $request->free_trial_sessions,
        'happy_to_provide_free_session' => $request->happy_to_provide_free_session,
        'referred_by' => $request->referred_by,
    ]);

    return response()->json([
        'message' => 'Registration successful!',
        'user' => $user,
        'practitioner' => $practitioner
    ], 201);
    }
}
