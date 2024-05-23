<!DOCTYPE html>
<html lang="es">
<head>
  <title>@yield('title')</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="sidebar">
      <div class="logo_details">
        <i class="bx bxl-audible icon"></i>
        <div class="logo_name">Biblioteca</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <i class="bx bx-search"></i>
          <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-user"></i>
            <span class="link_name">User</span>
          </a>
          <span class="tooltip">User</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-chat"></i>
            <span class="link_name">Message</span>
          </a>
          <span class="tooltip">Message</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Analytics</span>
          </a>
          <span class="tooltip">Analytics</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-folder"></i>
            <span class="link_name">File Manger</span>
          </a>
          <span class="tooltip">File Manger</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cart-alt"></i>
            <span class="link_name">Order</span>
          </a>
          <span class="tooltip">Order</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="link_name">Settings</span>
          </a>
          <span class="tooltip">Settings</span>
        </li>
        <li class="profile">
          <div class="profile_details">
            <img src="{{ asset('img/fondo_bosque.jpg') }}" alt="profile image">
            <div class="profile_content">
              <div class="name">Jean</div>
              <div class="designation">Admin</div>
            </div>
          </div>
          <i class="bx bx-log-out" id="log_out"></i>
        </li>
      </ul>
    </div>
  <section class="home-section">
    <div class="text">Dashboard </div>
    @yield('content')

  </section>
  <!-- Scripts -->
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>