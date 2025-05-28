<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/icon-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/pakar/pakar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pakar/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    
    @stack('styles')
</head>
<body>
<div class="pakar-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="SOSMEDCARE">
        </div>
        <ul class="nav-links">
    <li class="{{ request()->is('pakar') ? 'active' : '' }}">
        <a href="{{ route('pakar.dashboard') }}">
            <span>🏠</span> Beranda
        </a>
    </li>
    <li class="{{ request()->is('pakar/diagnosa*') ? 'active' : '' }}">
        <a href="{{ route('diagnosa.index') }}">
            <span>📅</span> Diagnosa
        </a>
    </li>
    <li class="{{ request()->is('pakar/gejala*') ? 'active' : '' }}">
        <a href="{{ route('gejala.index') }}">
            <span>📝</span> Gejala
        </a>
    </li>
    <li class="{{ request()->is('pakar/solusi*') ? 'active' : '' }}">
        <a href="{{ route('solusi.index') }}">
            <span>📢</span> Solusi
        </a>
    </li>
    <li class="{{ request()->is('pakar/pertanyaan*') ? 'active' : '' }}">
        <a href="{{ route('pertanyaan.index') }}">
            <span>❓</span> Pertanyaan
        </a>
    </li>
    <li class="{{ request()->is('pakar/pengguna*') ? 'active' : '' }}">
        <a href="{{ route('pengguna.index') }}">
            <span>👤</span> Pengguna
        </a>
    </li>
    <li class="logout">
        <a href="/login">
    <span>⬅️</span> Keluar
</a>

    </li>
</ul>

    </aside>

    <!-- Wrapper Konten -->
    <div class="main-wrapper">
        <!-- Header -->
        <header class="topbar">
            <div class="user-info">
                <a href="{{ route('profil.index') }}" style="text-decoration: none; color: inherit;">
                    <strong>Naruto Uzumaki</strong><br>
                    <small>Pakar</small>
                </a>
            </div>
        </header>


        <!-- Konten Utama -->
        <main class="dashboard-content">
            @yield('content')
        </main>

                <!-- Footer Khusus Admin -->
        @include('partials.footer-pakar')
    </div>
</div>

<!-- Script SweetAlert & lainnya -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>

