@extends('layouts.app')

@section('title', 'Output Failed')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user/output-failed.css') }}">
@endpush

@section('content')
<div class="output-container">
    
    
    <div class="profil-photo">
    <img src="{{ asset('images/notification-bell.png') }}" alt="Notifikasi">
    </div>

    <h2>Hasil Diagnosa Anda Tidak Dapat Didefinisikan </h2>
    <a href="{{ url('/pertanyaan') }}" class="btn">Ulangi Tes</a>

    
</div>
@endsection
