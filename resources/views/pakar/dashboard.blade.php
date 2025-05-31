@extends('layouts.pakar')
@section('title', 'Dashboard Pakar')

@section('content')
<h1>Welcome Back, {{ Auth::user()->nama }}!</h1>
<img src="{{ asset('images/logo.png') }}" alt="SOSMEDCARE" class="welcome-logo">
<p>
    SosmedCare adalah website berbasis sistem pakar yang membantu pengguna mengetahui tingkat kecanduan mereka terhadap media sosial. Sistem ini bekerja dengan memberikan serangkaian pertanyaan kepada pengguna, di mana setiap pertanyaan mewakili gejala tertentu dari kecanduan media sosial.
</p>
@endsection
