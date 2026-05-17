<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Visit;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function dashboard()
    {

        $totalPatients = Patient::count();

    $totalDoctors = Doctor::count();

    $totalVisits = Visit::count();

    $recentVisits = Visit::with([
        'patient',
        'doctor'
    ])->latest()->take(5)->get();

    $waitingCount = Visit::where(
        'status',
        'waiting'
    )->count();

    $ongoingCount = Visit::where(
        'status',
        'ongoing'
    )->count();

    $completedCount = Visit::where(
        'status',
        'completed'
    )->count();

    return view(
        'admin.dashboard',
        compact(
            'totalPatients',
            'totalDoctors',
            'totalVisits',
            'recentVisits',
            'waitingCount',
            'ongoingCount',
            'completedCount'
        )
    );

    }
}
