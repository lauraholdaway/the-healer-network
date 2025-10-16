<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorPackage;
use App\Models\doctorCerticate;
use App\Models\DoctorAvailability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DoctorSessionController extends Controller
{
    public function savePackages(Request $request)
    {
        // dd($request->all());
        foreach ($request->packages as $pkg) {
            DoctorPackage::create([
                'doctor_id' => $request->doctor_id,
                'price' => $pkg['price'],
                'type' => $pkg['type'],
                'time' => $pkg['time'],
            ]);
        }
        return response()->json(['message' => 'Packages saved successfully']);
    }

    public function saveAvailability(Request $request)
    {
        foreach ($request->availability as $slot) {
            DoctorAvailability::create([
                'doctor_id' => $request->doctor_id,
                'date' => $slot['date'],
                'times' => $slot['times'],
            ]);
        }
        return response()->json(['message' => 'Availability saved successfully']);
    }

    public function GetDateForDoctor($doctor_id)
    {

        return DoctorAvailability::where('doctor_id', $doctor_id)
            ->get();
    }
    public function TimeDocotroinMOnth($doctor_id, $month, $year)
    {
        $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth()->toDateString();
        $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth()->toDateString();

        return DoctorAvailability::where('doctor_id', $doctor_id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->get();
    }

    public function deleteavailability($id)
    {
        return DoctorAvailability::where('id', $id)->delete();
    }


    public function Getpackage($doctor_id)
    {
        return DoctorPackage::where('doctor_id', $doctor_id)->get();
    }

    public function deletePackage($id)
    {
        return DoctorPackage::where('id', $id)->delete();
    }


}
