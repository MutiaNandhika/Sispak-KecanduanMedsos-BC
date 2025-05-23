@extends('layouts.app')

@section('title', 'Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <h2><b>Tes Tingkat Kecanduan Media Sosial</b></h2>
    <p>Seberapa terikat Anda pada media sosial? Yuk, ikuti tes ini untuk mengetahui tingkat kecanduan Anda dan ambil langkah pertama untuk mengendalikannya!</p>
    <a href="{{ url('/pertanyaan') }}" class="btn">Mulai Tes</a>
</div>
@endsection
