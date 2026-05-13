<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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

require __DIR__.'/auth.php';