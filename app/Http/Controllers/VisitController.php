<?php

namespace App\Http\Controllers;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{

   public function index(Request $request)
{

    $tanggal =
        $request->tanggal ?? now()->format('Y-m-d');


    $visits = Visit::with([
        'patient',
        'doctor.poli',
        'schedule'
    ])
    ->whereDate(
        'tanggal',
        $tanggal
    )
    ->orderByRaw("
    FIELD(
        status,
        'waiting',
        'ongoing',
        'booked',
        'completed',
        'cancelled'
    )
")
    ->orderBy(
        'doctor_schedule_id'
    )
    ->get()
    ->groupBy(
        'doctor.poli.nama'
    );


    return view(
        'admin.visits.index',
        compact(
            'visits',
            'tanggal'
        )
    );

}

public function updateStatus(Request $request, $id)
{

    $visit = Visit::findOrFail($id);

    $visit->update([

        'status' => $request->status

    ]);

    return back();

}

}