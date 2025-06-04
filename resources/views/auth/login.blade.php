@extends('layouts.auth')

@section('title', 'Login')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')

<div class="auth-logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo SOSMEDCARE">
</div>

<div class="login-container">
    <h2>Selamat Datang!</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group">
            <span class="icon">📧</span>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="input-group">
            <span class="icon">🔑</span>
            <input type="password" name="password" placeholder="Kata Sandi" required>
        </div>

        <button type="submit">Masuk</button>
    </form>

    <p class="register-text">
        Belum mempunyai akun? Silahkan <a href="{{ route('register') }}">daftar disini</a>
    </p>
</div>

<!-- SweetAlert2 for Flash Message -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registrasi Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

@endsection
