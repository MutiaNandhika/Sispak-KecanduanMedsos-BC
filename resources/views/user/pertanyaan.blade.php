@extends('layouts.app')

@section('title', 'pertanyaan Media Sosial')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/user/pertanyaan.css') }}">
@endpush

@section('content')
<div class="pertanyaan-container">
    <div class="pertanyaan-header">
        <h3>Tingkat Tidak Kecanduan</h3>
    </div>

    <form action="{{ url('/output-tingkatan') }}" method="POST">
        @csrf

        <div class="pertanyaan-question">
            <p>Menggunakan media sosial hanya saat waktu senggang?</p>
            <label><input type="radio" name="q1" value="ya"> Ya</label>
            <label><input type="radio" name="q1" value="tidak"> Tidak</label>
        </div>

        <div class="pertanyaan-question">
            <p>Tidak merasa gelisah saat tidak membuka media sosial?</p>
            <label><input type="radio" name="q2" value="ya"> Ya</label>
            <label><input type="radio" name="q2" value="tidak"> Tidak</label>
        </div>

        <div class="pertanyaan-question">
            <p>Tidak merasa harus tahu semua aktivitas orang lain di media sosial?</p>
            <label><input type="radio" name="q3" value="ya"> Ya</label>
            <label><input type="radio" name="q3" value="tidak"> Tidak</label>
        </div>

        <div class="pertanyaan-question">
            <p>Bisa berhenti menggunakan media sosial kapan pun?</p>
            <label><input type="radio" name="q4" value="ya"> Ya</label>
            <label><input type="radio" name="q4" value="tidak"> Tidak</label>
        </div>

        <div class="pertanyaan-submit">
            <button type="submit">Cek Hasil</button>
        </div>
    </form>
</div>
@endsection
