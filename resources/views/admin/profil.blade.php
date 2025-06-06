@extends('layouts.admin')

@section('title', 'Profil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/profil.css') }}">
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
            <h3>{{ Auth::user()->nama }}</h3>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->role }}</p>
        </div>
    </div>
</div>
@endsection
