@extends('layouts.auth')

@section('title', 'Login')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="login-container">
    <h2>Selamat Datang!</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group">
            <span class="icon">📧</span>
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="input-group">
            <span class="icon">🔑</span>
            <input type="password" name="password" placeholder="kata sandi" required>
        </div>

        <button type="submit">Masuk</button>
    </form>

    <p class="register-text">
        Belum mempunyai akun? <a href="{{ route('register') }}">daftar disini</a>
    </p>
</div>
@endsection
