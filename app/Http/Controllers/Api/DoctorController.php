<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Practitioner;
use App\Models\Modalitypivot;
use App\Models\doctorCerticate;
use App\Models\User;
use App\Models\Rating;
use App\Models\Appointment;
use App\Models\Modality;


class DoctorController extends Controller
{
    // ✅ Get profile
    public function profile()
    {
        $user = Auth::guard('web')->user();
        $Practitioner = Practitioner::with('modalities')->where('user_id', Auth::id())->first();
        return response()->json($Practitioner);
    }
    public function quiz(Request $request)
    {
        // ✅ Get selected modality IDs from request
        $modal = $request->checkoptions;

        // ✅ Fetch practitioners that have any of those modalities
        $practitioners = Practitioner::with(['user', 'modalities'])
            ->whereHas('modalities', function ($query) use ($modal) {
                $query->whereIn('modalities.id', $modal);
            })
            ->get();

        // dd($practitioners);
        return response()->json($practitioners);
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
            'gender' => 'nullable',
            'social_media_handle' => 'nullable|string|max:255',
            // 'modalities' => 'nullable|string', // or 'array' if you send JSON
            'practicing_since' => 'nullable|string|max:50',
            'clients_per_month' => 'nullable|integer',
            'free_trial_sessions' => 'nullable|integer',
            'happy_to_provide_free_session' => 'nullable|boolean',
            'referred_by' => 'nullable|string|max:255',
        ]);

        // ✅ Update User
        $user->name = $validated['name'];
        $user->last_name = $validated['last_name'];
        $user->gender = $request->gender;
        $user->number = $validated['number'] ?? $user->number;
        $user->save();

        // ✅ Update Practitioner
        $practitioner = Practitioner::where('user_id', $user->id)->first();

        if ($practitioner) {
            $practitioner->practice_location = $validated['practice_location'] ?? $practitioner->practice_location;
            $practitioner->about = $validated['about'] ?? $practitioner->about;
            $practitioner->website =  $request->website;
            $practitioner->price =  $request->price;
            $practitioner->appointmentType =  $request->appointmentType;
            $practitioner->languages = $request->input('languages') ?? '-';
            $practitioner->currency =  $request->currency;
            $practitioner->primary_contact_number = $validated['primary_contact_number'] ?? $practitioner->primary_contact_number;
            $practitioner->mobile_number = $validated['mobile_number'] ?? $practitioner->mobile_number;
            $practitioner->address = $validated['address'] ?? $practitioner->address;
            $practitioner->social_media_handle = $validated['social_media_handle'] ?? $practitioner->social_media_handle;
            $practitioner->practicing_since = $validated['practicing_since'] ?? $practitioner->practicing_since;
            $practitioner->clients_per_month = $validated['clients_per_month'] ?? $practitioner->clients_per_month;
            $practitioner->free_trial_sessions = $validated['free_trial_sessions'] ?? $practitioner->free_trial_sessions;
            $practitioner->happy_to_provide_free_session = $validated['happy_to_provide_free_session'] ?? $practitioner->happy_to_provide_free_session;
            $practitioner->referred_by = $validated['referred_by'] ?? $practitioner->referred_by;

            $practitioner->save();
        }

        if (!empty($request->modalities)) {
            $Modalitypivot = Modalitypivot::where('practitioner_id', $practitioner->id)->delete();
            foreach ($request->modalities as $key => $mode) {
                $user = Modalitypivot::create([
                    'practitioner_id' => $practitioner->id,
                    'modality_id' => $mode,
                ]);
            }
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
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

    public function updatePassword(Request $request)
    {
        // ✅ 1. Validate input fields
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed', // checks new_password_confirmation automatically
        ]);

        // ✅ 2. Get logged-in user

        $user = User::find(Auth::id());

        // ✅ 3. Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => 'Current password is incorrect.'], 422);
        }

        // ✅ 4. Update new password (hashed)
        $user->password = Hash::make($request->new_password);
        $user->save();

        // ✅ 5. Return success response
        return response()->json(['success' => 'Password updated successfully.']);
    }

    // here local
    public function index()
    {
        $doctors = Practitioner::with('user')->get();
        return view('admin.doctors.index', compact('doctors'));
    }


    public function GetAllDoctor()
    {
        $Practitioner = Practitioner::with(['user', 'modalities'])
            ->whereHas('user', function ($query) {
                $query->where('status', '1');
            })

            ->get();
        // dd($Practitioner);
        return response()->json($Practitioner);
    }
    public function GetOneDoctor($id)
    {
        $Practitioner = Practitioner::with(['user', 'modalities'])->where('user_id', $id)->first();
        return response()->json($Practitioner);
    }

    public function doctorCertificate($id)
    {
        $getcertificate = doctorCerticate::where('doctor_id', $id)->get('title');
        return response()->json($getcertificate);
    }

    public function addCertificate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'certificate' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $doctor_id = Auth::id();

        // store file
        $path = $request->file('certificate')->store('certificates', 'public');

        $certificate = doctorCerticate::create([
            'doctor_id' => $doctor_id,
            'title' => $request->title,
            'certificate' => $path,
        ]);

        return response()->json(['message' => 'Certificate saved successfully', 'data' => $certificate]);
    }

    public function getCertificates()
    {
        $doctor_id = Auth::id();
        $certificates = doctorCerticate::where('doctor_id', $doctor_id)->get();
        return response()->json($certificates);
    }

    public function deleteCertificate($id)
    {
        $certificate = doctorCerticate::findOrFail($id);
        Storage::disk('public')->delete($certificate->certificate);
        $certificate->delete();

        return response()->json(['message' => 'Certificate deleted successfully']);
    }
    public function modalities(Request $request)
    {

        $data = Modality::where('status', '1')->get();

        return response()->json($data);
    }

    public function GetDoctorByModality($id)
    {
        if (!empty($id)) {
            $practitioners = Practitioner::with(['user', 'modalities'])
                ->whereHas('modalities', function ($query) use ($id) {
                    $query->where('modalities.id', $id);
                })
                ->get();
        } else {
            $practitioners = Practitioner::with(['user', 'modalities'])->get();
        }


        return response()->json($practitioners);
    }


    public function searchdoctor(Request $request)
    {

        // dd($request->all());
        $modality = $request->query('modality');
        $location = $request->query('location');
        $modalityType = $request->query('modalityType');
        $availability = $request->query('availability');
        $price = $request->query('price');
        $gender = $request->query('gender');
        $language = $request->query('language');
        $accessibility = $request->query('accessibility');
        $certification = $request->query('certification');
        $rating = $request->query('rating');

        // 🔹 Get all modality IDs that match the search
        $modalityIds = Modality::where('title', 'like', "%{$modality}%")->pluck('id');

        // 🔹 Get practitioners with filters
        $practitioners = Practitioner::with(['user', 'modalities', 'ratings'])
            ->when($modality, function ($query) use ($modalityIds) {
                $query->whereHas('modalities', function ($q) use ($modalityIds) {
                    $q->whereIn('modality_id', $modalityIds);
                });
            })
            ->when($location, function ($query) use ($location) {
                $query->where('practice_location', 'like', "%{$location}%");
            })
            ->when($availability, function ($query) use ($availability) {
                $query->where('appointmentType', 'like', "%{$availability}%");
            })

            ->when($price, function ($query) use ($price) {
                $query->where('price', 'like', "%{$price}%");
            })
            ->when($language, function ($query) use ($language) {
                $query->where('languages', 'like', "%{$language}%");
            })
            ->when($gender, function ($query) use ($gender) {
                $query->whereHas('user', function ($q) use ($gender) {
                    $q->where('gender', $gender);
                });
            })
            ->when($rating, function ($query) use ($rating) {
                $query->whereHas('ratings', function ($q) use ($rating) {
                $q->where('rating', '>', $rating);
                });
            })


            ->whereHas('user', function ($q) {
                $q->where('status', 1);
            })

            ->get();
        // dd($rating);

        // 🔹 Attach modality titles safely
        $practitioners->each(function ($practitioner) {
            // If modalities relation is empty or null, make it a collection
            $modalities = collect(explode(',', $practitioner->modalities));

            $practitioner->modality_titles = $modalities->map(function ($id) {
                $modality = Modality::find(trim($id));
                return $modality ? $modality->title : null;
            })->filter()->values();
        });

        // dd($practitioners);

        return response()->json($practitioners);
    }
    public function saverating(Request $request)
    {
        $rating = $request->validate([
            'doctor_id' => 'required',
            'user_id' => 'required',
            'appt_id' => 'required',
            'msg' => 'required',
            'rating' => 'required',
        ]);
        $data = Appointment::find($request->appt_id);
        if ($data) {
            $data->rating = 1; // ✅ update rating value
            $data->save();
            Rating::create($rating);
            return response()->json(['message' => 'Rating save successfully']);
        } else {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
    }

    public function getRating($id)
    {
        $data['data'] = Rating::where('doctor_id', $id)->with('user')->get();
        $data['avg'] = Rating::where('doctor_id', $id)->avg('rating');
        $data['count'] = Rating::where('doctor_id', $id)->count();

        // dd($data);
        return response()->json($data);
    }
}
