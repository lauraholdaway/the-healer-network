<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;


class DashboardController extends Controller
{

    public function index()
    {

        if (Auth::check() && Auth::user()->role !== '1') {
            return redirect()->route('logout');
        }


        $users = User::where('role', '2')->get();


        $doctorCount = User::where('role', '3')->count();
        $userCount = User::where('role', '2')->count();
        $appointmentCount = Appointment::count();

        // For chart (appointments per month)
        $appointmentMonths = Appointment::selectRaw('MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('month');

        $appointmentCounts = Appointment::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count');

        $appointments = Appointment::with('user', 'doctor')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'doctorCount',
            'userCount',
            'appointmentCount',
            'appointmentMonths',
            'appointmentCounts',
            'appointments'
        ));
    }
    public function users()
    {
        if (Auth::check() && Auth::user()->role !== '1') {
            return redirect()->route('logout');
        }
        $users = User::where('role', '2')->get();
        return view('admin.user.index', compact('users'));
    }

    public function Appointmentslist(Request $request)
    {

        // dd($user);
        $appointments = Appointment::with(['user', 'doctor', 'doctorpackage']) // eager load relations
            ->latest()
            ->get();
        // dd($appointments);
        return view('admin.booking.index', compact('appointments'));
    }

    public function toggleStatus($id)
    {
        $appointment = User::findOrFail($id);

        // toggle status
        $appointment->status = $appointment->status == 1 ? 0 : 1;
        $appointment->save();

        return response()->json([
            'success' => true,
            'status' => $appointment->status
        ]);
    }
}
