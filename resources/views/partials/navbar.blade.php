<link rel="stylesheet" href="{{ asset('css/user/navbar.css') }}">

<nav class="navbar">
  <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" />
  </div>
  <ul class="nav-links">
    <li><a href="/user">🏠 Beranda</a></li>
    <li><a href="/diagnosa">📋 Diagnosa</a></li>
    <li class="user-dropdown" id="userDropdown" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-controls="dropdownMenu">
      <span>👤 Profil</span>
      <div class="dropdown-menu" id="dropdownMenu" aria-labelledby="userDropdown">
        <a href="/profil">Profil Saya</a>
        <a href="/logout" class="text-danger" onclick="return confirm('Yakin ingin logout?')">Logout</a>
      </div>
    </li>
  </ul>
</nav>

<script>
  const userDropdown = document.getElementById('userDropdown');
  const dropdownMenu = document.getElementById('dropdownMenu');

  userDropdown.addEventListener('click', () => {
    const expanded = userDropdown.getAttribute('aria-expanded') === 'true' || false;
    userDropdown.setAttribute('aria-expanded', !expanded);
    dropdownMenu.style.display = expanded ? 'none' : 'flex';
  });

  // Tutup dropdown jika klik di luar
  document.addEventListener('click', function(event) {
    if (!userDropdown.contains(event.target)) {
      userDropdown.setAttribute('aria-expanded', false);
      dropdownMenu.style.display = 'none';
    }
  });
</script>
