<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\Poli;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function getDoctors($poliId)
    {
        $doctors = Doctor::where(
            'poli_id',
            $poliId
        )->get();

        return response()->json($doctors);
    }

    public function getSchedules($doctorId)
    {
        $schedules = DoctorSchedule::where(
            'doctor_id',
            $doctorId
        )->get();

        return response()->json($schedules);
    }

    public function create()
    {
        $patient = Patient::where(
            'nik',
            auth()->user()->nik
        )->first();

        $polis = Poli::all();

        return view(
            'patient.booking',
            compact('patient', 'polis')
        );
    }

    public function store(Request $request)
    {

        $request->validate([
            'tanggal' => 'required',
            'doctor' => 'required',
        ]);

        // FORMAT TANGGAL BOOKING
        $tanggalBooking = Carbon::createFromFormat(
            'd-m-Y',
            $request->tanggal
        )->format('Y-m-d');

        // CEK PASIEN
        $patient = Patient::where(
            'nik',
            auth()->user()->nik
        )->first();

        // JIKA BELUM ADA
        if (!$patient) {

            $patient = Patient::create([

                'nik' => $request->nik,

                'nama' => $request->nama,

                'tanggal_lahir' => Carbon::createFromFormat(
                    'd-m-Y',
                    $request->tanggal_lahir
                )->format('Y-m-d'),

                'gender' => $request->gender,

                'no_hp' => $request->no_hp,

                'alamat' => $request->alamat,

                'no_rm' => str_pad(
                    Patient::max('id') + 1,
                    6,
                    '0',
                    STR_PAD_LEFT
                ),

            ]);

        }

        // HITUNG ANTREAN
        $queue = Visit::whereDate(
            'tanggal',
            $tanggalBooking
        )
        ->where(
            'doctor_id',
            $request->doctor
        )
        ->count() + 1;

        // SIMPAN VISIT
        Visit::create([

            'patient_id' => $patient->id,

            'tanggal' => $tanggalBooking,

            'doctor_id' => $request->doctor,

            'queue_number' => $queue,

            'status' => 'booked',

        ]);

        return redirect('/dashboard')
            ->with(
                'success',
                'Booking berhasil! Nomor antrean Anda: ' . $queue
            );

    }

}