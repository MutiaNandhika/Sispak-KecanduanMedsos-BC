<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon-logo.png') }}">

    <!-- CSS Pakar -->
    <link rel="stylesheet" href="{{ asset('css/pakar/pakar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pakar/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    @stack('styles')


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!-- DataTables Buttons extension -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    
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
    <div class="main-wrapper">
        <!-- Header -->
        <header class="topbar">
            <div class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </div>

            <div class="user-info">
                <a href="{{ route('pakar.profil.index') }}" style="text-decoration: none; color: inherit;">
                    <strong>{{ Auth::user()->nama }}</strong><br>
                    <small>{{ Auth::user()->role }}</small>
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

@stack('scripts')

@push('scripts')
<!-- Script SweetAlert & lainnya -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(function() {
  $("#example1").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    ordering: true,
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    columnDefs: [
      { orderable: false, targets: -1 }
    ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

 document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const wrapper = document.querySelector('.main-wrapper');

        if (toggle && sidebar && wrapper) {
            toggle.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                wrapper.classList.toggle('collapsed');
            });
        }
    });
</script>

@endpush

</body>
</html>
