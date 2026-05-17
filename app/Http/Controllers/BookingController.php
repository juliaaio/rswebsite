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
            'schedule' => 'required',
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
        // AMBIL DOKTER
        $doctor = Doctor::with('poli')->findOrFail(
            $request->doctor
        );


        // AMBIL POLI
        $poli = $doctor->poli;


        // PREFIX POLI
        $prefix = $poli->prefix;


        // CARI ANTREAN TERAKHIR DI POLI YANG SAMA
        $lastVisit = Visit::whereDate(
            'tanggal',
            $tanggalBooking
        )
        ->whereHas('doctor', function ($query) use ($poli) {

            $query->where(
                'poli_id',
                $poli->id
            );

        })
        ->latest('id')
        ->first();


        // DEFAULT NOMOR
        $lastNumber = 0;


        // JIKA ADA ANTREAN SEBELUMNYA
        if ($lastVisit) {

            $lastNumber = (int) filter_var(
                $lastVisit->queue_number,
                FILTER_SANITIZE_NUMBER_INT
            );

        }


        // HASIL ANTREAN
        $queue = $prefix . ($lastNumber + 1);

        // SIMPAN VISIT
        Visit::create([

            'patient_id' => $patient->id,
            'tanggal' => $tanggalBooking,
            'doctor_id' => $request->doctor,
            'doctor_schedule_id' => $request->schedule,
            'queue_number' => $queue,
            'status' => 'booked',

        ]);

        return redirect('/dashboard')
            ->with(
                'success',
                'Booking berhasil! Nomor antrean Anda: ' . $queue
            );

    }

   public function queue()
{

    $patient = Patient::where(
        'nik',
        auth()->user()->nik
    )->first();


    $visits = Visit::with([
        'doctor.poli',
        'schedule'
    ])
    ->where('patient_id', $patient->id)
    ->whereNotIn('status', [
    'completed',
    'cancelled'
    ])
    ->orderBy('tanggal', 'asc')
    ->get();


    foreach ($visits as $visit) {

        $waitingBefore = Visit::whereDate(
            'tanggal',
            $visit->tanggal
        )
        ->where('doctor_id', $visit->doctor_id)
        ->whereIn('status', [
            'waiting',
            'ongoing'
        ])
        ->where('id', '<', $visit->id)
        ->count();


        $visit->waitingBefore =
            $waitingBefore;

        $visit->estimatedMinutes =
            $waitingBefore * 15;

    }


    return view(
        'patient.queue',
        compact('visits')
    );

}

public function cancelVisit($id)
{

    $visit = Visit::findOrFail($id);

    $visit->update([

        'status' => 'cancelled'

    ]);

    return back()
        ->with(
            'success',
            'Booking berhasil dibatalkan.'
        );

}
}