@extends('layouts.medilab-auth')

@section('title', 'Register - Medilab')

@section('content')
<div class="text-center mb-5">
    <div class="logo mb-3">MediLab</div>
    <h2 class="fw-bold text-dark mb-1">Buat Akun Baru</h2>
    <p class="text-muted">Daftar untuk memulai</p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <label class="form-label fw-semibold mb-2">Nama Lengkap</label>
            <input type="text" 
                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label fw-semibold mb-2">NIK</label>
            <input type="text" 
                   class="form-control form-control-lg @error('nik') is-invalid @enderror" 
                   name="nik" 
                   value="{{ old('nik') }}" 
                   required>
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label fw-semibold mb-2">Email</label>
            <input type="email" 
                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="mb-4">
        <label class="form-label fw-semibold mb-2">Password</label>
        <input type="password" 
               class="form-control form-control-lg @error('password') is-invalid @enderror" 
               name="password" 
               required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-4">
        <label class="form-label fw-semibold mb-2">Konfirmasi Password</label>
        <input type="password" 
               class="form-control form-control-lg" 
               name="password_confirmation" 
               required>
    </div>
    
    <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
        <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
    </button>
</form>

<div class="text-center">
    <p class="mb-0 text-muted">Sudah punya akun? 
        <a href="{{ route('login') }}" class="fw-semibold text-dark text-decoration-none">
            Masuk sekarang
        </a>
    </p>
</div>
@endsection