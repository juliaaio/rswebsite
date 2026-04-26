<?php

use Illuminate\Support\Facades\Route;

 Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard'); 
});

// Route untuk dashboard pasien
Route::get('/login', function () {
    return view('login');
});

// Route untuk Dashboard Pasien (File: patient.blade.php)
Route::get('/patient/dashboard', function () {
    return view('patient'); 
});


Route::view('/about','pages.about');
