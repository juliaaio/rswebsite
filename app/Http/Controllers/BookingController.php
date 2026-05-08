<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visit;

class BookingController extends Controller
{
    public function create()
    {
        $patient = Patient::where(
            'nik',
            auth()->user()->nik
        )->first();

        return view('patient.booking', compact('patient'));
    }

    public function store(Request $request)
    {
        $patient = Patient::where(
            'nik',
            auth()->user()->nik
        )->first();

        // PASIEN BARU
        if (!$patient) {

            $patient = Patient::create([
                'nik' => auth()->user()->nik,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'no_rm' => 'RM' . rand(1000,9999),
            ]);
        }

        // NOMOR ANTRIAN
        $queue = Visit::whereDate('tanggal', $request->tanggal)
            ->where('poli', $request->poli)
            ->count() + 1;

        // SIMPAN VISIT
        Visit::create([
            'patient_id' => $patient->id,
            'tanggal' => $request->tanggal,
            'poli' => $request->poli,
            'dokter' => $request->dokter,
            'queue_number' => $queue,
            'status' => 'booked',
        ]);

        return redirect('/dashboard');
    }
}