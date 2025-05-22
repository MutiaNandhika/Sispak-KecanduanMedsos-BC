@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user/output.css') }}">
@endpush

@section('content')
<div class="output-wrapper">

    <div class="back-button">
        <a href="{{ url('/pertanyaan') }}">⬅ <span>Back</span></a>
    </div>

    <div class="output-container">
        <h2 class="judul-hasil">HASIL DIAGNOSA</h2>
        <p class="subteks">Ini dia hasil diagnosamu! Cek solusi awal untuk mengatasi tingkat kecanduan ini</p>

        <div class="tingkatan-box">
            <h3 class="tingkatan-judul">Tidak Kecanduan</h3>
        </div>

        <div class="saran-box">Pertahankan pola penggunaan saat ini</div>
        <div class="saran-box">Tetap sadari waktu online agar tidak bergeser ke penggunaan berlebihan</div>
        <div class="saran-box">Gunakan media sosial untuk hal produktif atau edukatif</div>
        <div class="saran-box">Pertahankan pola penggunaan saat ini</div>
    </div>

</div>
@endsection
