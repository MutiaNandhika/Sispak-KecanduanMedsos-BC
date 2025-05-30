@extends('layouts.app')

@section('title', 'Pertanyaan Media Sosial')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/user/pertanyaan.css') }}">
@endpush

@section('content')
<div class="pertanyaan-container">
    <div class="pertanyaan-header">
        @php
            $judulDiagnosa = $diagnosas->pluck('nama_diagnosa')->implode(', ');
        @endphp
        <h3>Kuesioner {{ $judulDiagnosa }}</h3>
    </div>

    <form action="{{ url('/output-tingkatan') }}" method="POST">
        @csrf

        @forelse ($pertanyaans as $index => $pertanyaan)
            <div class="pertanyaan-question">
                <p>{{ $index + 1 }}. {{ $pertanyaan->pertanyaan_gejala }}</p>
                <label>
                    <input type="radio" name="q{{ $pertanyaan->id_pertanyaan }}" value="ya" required> Ya
                </label>
                <label>
                    <input type="radio" name="q{{ $pertanyaan->id_pertanyaan }}" value="tidak" required> Tidak
                </label>
            </div>
        @empty
            <p>Tidak ada pertanyaan tersedia saat ini.</p>
        @endforelse

        <div class="pertanyaan-submit">
            <button type="submit">Cek Hasil</button>
        </div>
    </form>
</div>
@endsection
