<?php

 namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
    $id = Auth::id();

        return response()->json(Service::where('doctor_id' , $id)->get());
    }
    public function getDoctorServices($id)
    {

        return response()->json(Service::where('doctor_id' , $id)->get());
    }

public function store(Request $request)
{
    $id = Auth::id();

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'rate_per_session' => 'required|numeric|min:0',
        'currency' => 'required|string|max:10',
        'ideal_for' => 'nullable|string|max:255',
        'session_type' => 'required|string|max:50',
    ]);

    // Add doctor_id manually
    $validated['doctor_id'] = $id;

    $service = Service::create($validated);

    return response()->json($service, 201);
}


    public function show(Service $service)
    {
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rate_per_session' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'ideal_for' => 'nullable|string|max:255',
            'session_type' => 'required|string|max:50',
        ]);

        $service->update($validated);
        return response()->json($service);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully']);
    }
}
