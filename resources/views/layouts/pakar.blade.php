<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS Pakar -->
    <link rel="stylesheet" href="{{ asset('css/pakar/pakar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    @stack('styles')

    
</head>
<body>
<div class="pakar-container">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="SOSMEDCARE">
        </div>
        <div class="sidebar-divider"></div>
        <ul class="nav-links">
            <li class="{{ request()->is('pakar') ? 'active' : '' }}">
                <a href="{{ route('pakar.dashboard') }}">
                    <span>🏠</span> 
                    <p>Beranda</p>
                </a>
            </li>
            <li class="{{ request()->is('pakar/diagnosa*') ? 'active' : '' }}">
                <a href="{{ route('pakar.diagnosa.index') }}">
                    <span>📅</span> 
                    <p>Diagnosa</p>
                </a>
            </li>
            <li class="{{ request()->is('pakar/gejala*') ? 'active' : '' }}">
                <a href="{{ route('pakar.gejala.index') }}">
                    <span>📝</span> 
                    <p>Gejala</p>
                </a>
            </li>
            <li class="{{ request()->is('pakar/solusi*') ? 'active' : '' }}">
                <a href="{{ route('pakar.solusi.index') }}">
                    <span>📢</span> 
                    <p>Solusi</p>
                </a>
            </li>
            <li class="{{ request()->is('pakar/pertanyaan*') ? 'active' : '' }}">
                <a href="{{ route('pakar.pertanyaan.index') }}">
                    <span>❓</span> 
                    <p>Pertanyaan</p>
                </a>
            {{-- </li>
            <li class="{{ request()->is('pakar/pengguna*') ? 'active' : '' }}">
                <a href="{{ route('pakar.pengguna.index') }}">
                    <span>👤</span> 
                    <p>Pengguna</p>
                </a>
            </li> --}}
            <li class="logout">
                <a href="/login">
                    <span>⬅️</span> 
                    <p>Keluar</p>

                </a>
            </li>
        </ul>
    </aside>

    <!-- Wrapper Konten -->
    <div class="main-wrapper" id="main-wrapper">
        <!-- Header -->
        <header class="topbar" id="topbar">
            <div class="menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></div>

            <div class="user-info">
                <a href="{{ route('pakar.profil.index') }}" style="text-decoration: none; color: inherit;">
                    <strong>{{ Auth::user()->nama }}</strong><br>
                    <small>{{ Auth::user()->role }}</small>
                </a>
            </div>
        </header>

        <!-- Konten Utama -->
        <main class="dashboard-content">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>

        <!-- Footer Khusus pakar -->
        @include('partials.footer-pakar')
    </div>
</div>

@stack('scripts')

<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainWrapper = document.getElementById('main-wrapper');
    const topbar = document.getElementById('topbar');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainWrapper.classList.toggle('collapsed');
        topbar.classList.toggle('collapsed');
    });
</script>

@push('scripts')

@endpush

</body>
</html>
