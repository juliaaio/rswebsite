<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visit;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::where(
            'nik',
            auth()->user()->nik
        )->first();

        $visits = collect();

        if ($patient) {

            $visits = Visit::with('doctor.poli')
                ->where('patient_id', $patient->id)
                ->latest()
                ->get();
        }

        return view('dashboard', compact('patient', 'visits'));
    }
}