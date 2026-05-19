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

    public function patients(Request $request)
{

    $search = $request->search;

    $patients = Patient::query()

        ->when($search, function ($query) use ($search) {

            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nik', 'like', "%{$search}%")
                ->orWhere('no_rm', 'like', "%{$search}%");

        })

        ->latest()
        ->get();

    return view(
        'admin.patients.index',
        compact(
            'patients',
            'search'
        )
    );

}

public function editPatient($id)
{

    $patient = Patient::findOrFail($id);

    return view(
        'admin.patients.edit',
        compact('patient')
    );

}

public function updatePatient(Request $request, $id)
{

    $patient = Patient::findOrFail($id);

    $patient->update([

        'nama' => $request->nama,
        'tanggal_lahir' => $request->tanggal_lahir,
        'gender' => $request->gender,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,

    ]);

    return redirect()
        ->route('admin.patients')
        ->with(
            'success',
            'Data pasien berhasil diperbarui.'
        );

}

public function riwayat()
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

    return view(
        'patient.riwayat',
        compact('visits')
    );
}

}


