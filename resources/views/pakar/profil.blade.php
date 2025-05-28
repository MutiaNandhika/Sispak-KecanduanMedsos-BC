@extends('layouts.pakar')

@section('title', 'Profil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/profil.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="profil-container">
    

    <div class="profil-card">
        <h2>Profil Pengguna</h2>

        <div class="profil-photo">
            <img src="{{ asset('images/user.png') }}" alt="Foto Pengguna">
        </div>

        <div class="profil-info">
            <h3>Nama Contoh</h3>
            <p>contoh@email.com</p>
            <p>Perempuan</p>
            <p>22</p>
        </div>
    </div>
</div>
@endsection
