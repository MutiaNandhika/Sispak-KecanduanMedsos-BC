<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    
    @stack('styles')
</head>
<body>
<div class="admin-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="SOSMEDCARE">
        </div>
        <ul class="nav-links">
    <li class="{{ request()->is('admin') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
            <span>🏠</span> Beranda
        </a>
    </li>
    <li class="{{ request()->is('admin/diagnosa*') ? 'active' : '' }}">
        <a href="{{ route('admin.diagnosa.index') }}">
            <span>📅</span> Diagnosa
        </a>
    </li>
    <li class="{{ request()->is('admin/gejala*') ? 'active' : '' }}">
        <a href="{{ route('admin.gejala.index') }}">
            <span>📝</span> Gejala
        </a>
    </li>
    <li class="{{ request()->is('admin/solusi*') ? 'active' : '' }}">
        <a href="{{ route('admin.solusi.index') }}">
            <span>📢</span> Solusi
        </a>
    </li>
    <li class="{{ request()->is('admin/pertanyaan*') ? 'active' : '' }}">
        <a href="{{ route('admin.pertanyaan.index') }}">
            <span>❓</span> Pertanyaan
        </a>
    </li>
    <li class="{{ request()->is('admin/pengguna*') ? 'active' : '' }}">
        <a href="{{ route('admin.pengguna.index') }}">
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
                <strong>Naruto Uzumaki</strong><br>
                <small>Admin</small>
            </div>
        </header>

        <!-- Konten Utama -->
        <main class="dashboard-content">
            @yield('content')
        </main>

                <!-- Footer Khusus Admin -->
        @include('partials.footer-admin')
    </div>
</div>

<!-- Script SweetAlert & lainnya -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>

