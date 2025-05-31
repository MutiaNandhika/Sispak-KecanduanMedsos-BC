@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@push('styles')
<!-- Tambahan CSS jika diperlukan -->
@endpush

@section('content')
<h1>Welcome Back, Naruto!</h1>
<img src="{{ asset('images/logo.png') }}" alt="SOSMEDCARE" class="welcome-logo">
<p>
    SosmedCare adalah website berbasis sistem pakar yang membantu pengguna mengetahui tingkat kecanduan mereka terhadap media sosial. Sistem ini bekerja dengan memberikan serangkaian pertanyaan kepada pengguna, di mana setiap pertanyaan mewakili gejala tertentu dari kecanduan media sosial.
</p>
@endsection
