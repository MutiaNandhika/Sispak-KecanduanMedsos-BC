@extends('layouts.app')

@section('title', 'Diagnosa Media Sosial')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/user/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <div class="diagnosa-header">
        <h3>Tingkat Tidak Kecanduan</h3>
    </div>

    <form action="{{ url('/output-tingkatan') }}" method="POST">
        @csrf

        <div class="diagnosa-question">
            <p>Menggunakan media sosial hanya saat waktu senggang?</p>
            <label><input type="radio" name="q1" value="ya"> Ya</label>
            <label><input type="radio" name="q1" value="tidak"> Tidak</label>
        </div>

        <div class="diagnosa-question">
            <p>Tidak merasa gelisah saat tidak membuka media sosial?</p>
            <label><input type="radio" name="q2" value="ya"> Ya</label>
            <label><input type="radio" name="q2" value="tidak"> Tidak</label>
        </div>

        <div class="diagnosa-question">
            <p>Tidak merasa harus tahu semua aktivitas orang lain di media sosial?</p>
            <label><input type="radio" name="q3" value="ya"> Ya</label>
            <label><input type="radio" name="q3" value="tidak"> Tidak</label>
        </div>

        <div class="diagnosa-question">
            <p>Bisa berhenti menggunakan media sosial kapan pun?</p>
            <label><input type="radio" name="q4" value="ya"> Ya</label>
            <label><input type="radio" name="q4" value="tidak"> Tidak</label>
        </div>

        <div class="diagnosa-submit">
            <button type="submit">Cek Hasil</button>
        </div>
    </form>
</div>
@endsection
