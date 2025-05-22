@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="form-box">
    <h2>Registrasi</h2>
    <form action="#">
        <input type="text" placeholder="nama pengguna" required>
        <input type="email" placeholder="email" required>
        <input type="password" placeholder="kata sandi" required>
        <button>Register</button>
    </form>
    <p>Sudah mempunyai akun? <a href="/login">masuk ke akun Anda</a></p>
</div>
@endsection
