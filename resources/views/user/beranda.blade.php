@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user/beranda.css') }}">
@endpush

@section('content')
<div class="beranda-container">
    <div class="left-side">
        <h2><b>Selamat datang di</b></h2>
        <h1>Sistem Pakar Deteksi Kecanduan Media Sosial</h1>
        <p>Kecanduan media sosial merupakan kondisi psikologis yang ditandai dengan dorongan yang sulit dikendalikan untuk menggunakan platform media sosial secara berlebihan. Kecanduan ini dapat menyebabkan dampak negatif seperti menurunnya produktivitas, gangguan tidur, penurunan kualitas hubungan sosial, hingga gangguan mental seperti kecemasan dan depresi. Yuk, cari tahu tingkat kecanduan media sosial Anda sekarang dan jadikan media sosial lebih sehat untuk Anda!</p>
        <a href="{{ url('/diagnosa') }}" class="btn">Cari Tahu Sekarang!</a>
    </div>

    <div class="right-side">
        <h2><b>Kenali 5 tingkat kecanduan media sosial</b></h2>
        <div class="levels-vertical">
            <button class="level-btn">Tidak Kecanduan</button>
            <button class="level-btn">Mulai Beresiko</button>
            <button class="level-btn">Kecanduan Ringan</button>
            <button class="level-btn">Kecanduan Sedang</button>
            <button class="level-btn">Kecanduan Berat</button>
        </div>
    </div>
</div>
@endsection
