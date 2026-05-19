<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', [PatientController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/booking', [BookingController::class, 'create'])
        ->name('patient.booking');

    Route::post('/booking', [BookingController::class, 'store'])
        ->name('patient.booking.store');

});

Route::get(
    '/get-doctors/{poli}',
    [BookingController::class, 'getDoctors']
);

Route::get(
    '/get-schedules/{doctor}',
    [BookingController::class, 'getSchedules']
);

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    Route::get(
        '/admin/dashboard',
        [AdminController::class, 'dashboard']
    );

    Route::get(
        '/admin/visits',
        [VisitController::class, 'index']
    );

    Route::put(
        '/admin/visits/{id}/status',
        [VisitController::class, 'updateStatus']
    );

    Route::get(
        '/admin/patients',
        [PatientController::class, 'patients']
    )->name('admin.patients');

    Route::get(
        '/admin/patients/{id}/edit',
        [PatientController::class, 'editPatient']
    )->name('admin.patients.edit');

    Route::put(
        '/admin/patients/{id}',
        [PatientController::class, 'updatePatient']
    )->name('admin.patients.update');

});


Route::middleware('auth')->group(function () {

    Route::get(
        '/patient/queue',
        [BookingController::class, 'queue']
    )->name('patient.queue');

});


Route::put(
    '/patient/visits/{id}/cancel',
    [BookingController::class, 'cancelVisit']
)->name('patient.visit.cancel');

require __DIR__.'/auth.php';

Route::get(
    '/riwayat-kunjungan',
    [PatientController::class, 'riwayat']
)->name('riwayat.kunjungan');