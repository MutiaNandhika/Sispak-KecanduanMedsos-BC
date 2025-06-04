@php use Illuminate\Support\Facades\Auth; @endphp

<link rel="stylesheet" href="{{ asset('css/user/navbar.css') }}">

<nav class="navbar">
  <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" />
  </div>
  <ul class="nav-links">
    <li><a href="/">🏠 Beranda</a></li>
    <li><a href="/diagnosa">📋 Diagnosa</a></li>

    @if (Auth::check())
    <li class="user-dropdown" id="userDropdown" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-controls="dropdownMenu">
      <span>👤 Profil</span>
      <div class="dropdown-menu" id="dropdownMenu" aria-labelledby="userDropdown">
        <a href="/profil">Profil Saya</a>
        <a href="javascript:void(0);" class="text-danger" onclick="confirmLogout()">Logout</a>
      </div>
    </li>
    @else
    <li><a href="{{ route('login') }}">🔐 Login</a></li>
    @endif
  </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
  const userDropdown = document.getElementById('userDropdown');
  const dropdownMenu = document.getElementById('dropdownMenu');

  if (userDropdown) {
    userDropdown.addEventListener('click', () => {
      const expanded = userDropdown.getAttribute('aria-expanded') === 'true' || false;
      userDropdown.setAttribute('aria-expanded', !expanded);
      dropdownMenu.style.display = expanded ? 'none' : 'flex';
    });

    document.addEventListener('click', function (event) {
      if (!userDropdown.contains(event.target)) {
        userDropdown.setAttribute('aria-expanded', false);
        dropdownMenu.style.display = 'none';
      }
    });
  }
</script>

@push('scripts')
<script>
  function confirmLogout() {
    Swal.fire({
      title: 'Yakin ingin logout?',
      text: "Anda akan keluar dari sesi login.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, logout',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
      }
    });
  }
</script>
@endpush
