@extends('layouts.medilab-auth')

@section('title', 'Login - Medilab')

@section('content')
<div class="text-center mb-5">
    <div class="logo mb-3">MediLab</div>
    <h2 class="fw-bold text-dark mb-1">Welcome Back</h2>
    <p class="text-muted">Silahkan login ke akun Anda</p>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <div class="mb-4">
        <label class="form-label fw-semibold mb-2">Email Address</label>
        <input type="email" 
               class="form-control form-control-lg @error('email') is-invalid @enderror" 
               name="email" 
               value="{{ old('email') }}" 
               required 
               placeholder="example@gmail.com">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-4">
        <label class="form-label fw-semibold mb-2">Password</label>
        <input type="password" 
               class="form-control form-control-lg @error('password') is-invalid @enderror" 
               name="password" 
               required 
               placeholder="••••••••">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Ingat saya
            </label>
        </div>
        <a href="{{ route('password.request') }}" class="text-decoration-none fw-semibold">Lupa Password?</a>
    </div>
    
    <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
        <i class="fas fa-sign-in-alt me-2"></i> Masuk Sekarang
    </button>
</form>

<div class="text-center">
    <p class="mb-0 text-muted">Belum punya akun? 
        <a href="{{ route('register') }}" class="fw-semibold text-dark text-decoration-none">
            Daftar sekarang
        </a>
    </p>
</div>
@endsection