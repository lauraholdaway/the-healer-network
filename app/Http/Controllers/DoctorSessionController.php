<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorPackage;
use App\Models\doctorCerticate;
use App\Models\DoctorAvailability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DoctorSessionController extends Controller
{
    public function savePackages(Request $request)
    {
        // dd($request->all());
        foreach ($request->packages as $pkg) {
            DoctorPackage::create([
                'doctor_id' => $request->doctor_id,
                'title' => $pkg['title'],
                'price' => $pkg['price'],
                'type' => $pkg['type'],
                'time' => $pkg['time'],
            ]);
        }
        return response()->json(['message' => 'Packages saved successfully']);
    }



public function saveAvailability(Request $request)
{
    $saved = [];
    $skipped = [];

    foreach ($request->availability as $slot) {

        $startDate = Carbon::parse($slot['date']);
        $sessionType = $slot['session_type'];
        $times = $slot['times'];

        // Decide date range
        if ($sessionType === 'In a Day') {
            $period = CarbonPeriod::create($startDate, $startDate);
        }
        elseif ($sessionType === 'In a Week') {
            $period = CarbonPeriod::create($startDate, $startDate->copy()->addDays(6));
        }
        elseif ($sessionType === 'In a Month') {
            // Full month
            $period = CarbonPeriod::create(
                $startDate->copy()->startOfMonth(),
                $startDate->copy()->endOfMonth()
            );
        } 
        else {
            continue;
        }

        // Loop through all dates
        foreach ($period as $date) {

            $exists = DoctorAvailability::where('doctor_id', $request->doctor_id)
                ->whereDate('date', $date->format('Y-m-d'))
                ->exists();

            if ($exists) {
                $skipped[] = $date->format('Y-m-d');
                continue;
            }

            DoctorAvailability::create([
                'doctor_id' => $request->doctor_id,
                'date' => $date->format('Y-m-d'),
                'times' => $times,
                'session_type' => $sessionType,
            ]);

            $saved[] = $date->format('Y-m-d');
        }
    }

    return response()->json([
        'message' => 'Availability processed',
        'saved' => array_unique($saved),
        'skipped' => array_unique($skipped),
    ]);
}


    public function Doctoravailable(Request $request, $doctor_id)
    {

        $query = DoctorAvailability::where('doctor_id', $doctor_id);

        // If both from and to dates are provided
        if ($request->has(['from', 'to']) && $request->from && $request->to) {
            $query->whereBetween('date', [$request->from, $request->to]);
        }

        $data = $query->orderBy('date', 'asc')->get();

        return response()->json($data);
    }
    public function GetDateForDoctor($doctor_id)
    {

        $today = Carbon::today();
        return DoctorAvailability::where('doctor_id', $doctor_id)->whereDate('date', '>=', $today)
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
