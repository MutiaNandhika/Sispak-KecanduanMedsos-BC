@extends('layouts.auth')

@section('title', 'Register')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')

<div class="auth-logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo SOSMEDCARE">
</div>

<div class="register-container">
    <h2>Registrasi</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group">
            <span class="icon">👤</span>
            <input type="text" name="name" placeholder="Nama Pengguna" value="{{ old('name') }}" required>
        </div>

        <div class="input-group">
            <span class="icon">📧</span>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="input-group">
            <span class="icon">🔑</span>
            <input type="password" name="password" placeholder="Kata sandi" required>
        </div>

        <button type="submit">Register</button>
    </form>

    <p class="login-text">
        Sudah mempunyai akun? Silahkan <a href="{{ route('login') }}">masuk ke akun Anda</a>
    </p>
</div>
@endsection
