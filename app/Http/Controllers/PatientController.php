<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $patient = Patient::where('nik', $user->nik)->first();

        return view('dashboard', compact('patient'));
    }
}