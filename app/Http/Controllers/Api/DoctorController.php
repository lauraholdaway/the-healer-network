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

        $Practitioner = Practitioner::where('user_id' , Auth::id())->first();

        return response()->json($Practitioner);
    }

    // ✅ Update doctor profile (except email)
public function update(Request $request)
{
    $user = User::find(Auth::id());

    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'phone' => 'nullable|string|max:20',
        'practice_location' => 'nullable|string|max:255',
        'about' => 'nullable|string',
    ]);

    // ✅ Update User
    $user->name = $validated['name'] . ' ' . $validated['last_name'];
    $user->number = $validated['number'] ?? $user->phone;
    $user->save();

    // ✅ Update Practitioner
    $practitioner = Practitioner::where('user_id', $user->id)->first();

    if ($practitioner) {
        $practitioner->practice_location = $validated['practice_location'] ?? $practitioner->practice_location;
        $practitioner->about = $validated['about'] ?? $user->about;

        $practitioner->save();
    }

    return response()->json([
        'message' => 'Profile updated successfully',
        'user' => $user,
        'practitioner' => $practitioner,
    ]);
}


    // ✅ Update doctor profile image
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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
}
