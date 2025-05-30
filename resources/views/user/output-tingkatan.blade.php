@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user/output.css') }}">
@endpush

@section('content')
<div class="output-wrapper">

    <div class="back-button">
        <a href="{{ url('/diagnosa') }}">⬅ <span>Back</span></a>
    </div>

    <div class="output-container">
        <h2 class="judul-hasil">HASIL DIAGNOSA</h2>
        <p class="subteks">Ini dia hasil diagnosamu! Cek solusi awal untuk mengatasi tingkat kecanduan ini</p>

        @forelse($diagnosas as $hasil)
            <div class="tingkatan-box">
                <h3 class="tingkatan-judul">{{ $hasil['diagnosa']->nama_diagnosa }}</h3>
            </div>

            @php
                $solusiDiterima = $hasil['diagnosa']->solusis->where('status_verifikasi', 'diterima');
            @endphp

            @forelse ($solusiDiterima as $solusi)
                <div class="saran-box">{{ $solusi->solusi_diagnosa }}</div>
            @empty
                <div class="saran-box">Belum ada solusi yang diverifikasi pakar untuk diagnosa ini.</div>
            @endforelse
        @empty
            <div class="tingkatan-box">
                <h3 class="tingkatan-judul">Tidak ditemukan diagnosa</h3>
            </div>
            <div class="saran-box">Kamu tidak menunjukkan gejala yang cukup untuk didiagnosis.</div>
        @endforelse
    </div>

</div>
@endsection
