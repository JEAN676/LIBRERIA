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
          <a href="{{ route('libros.create') }}">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Crear</span>
          </a>
          <span class="tooltip">Crear</span>
        </li>
        <li>
          <a href="{{ route('libros.index') }}">
            <i class="bx bx-user"></i>
            <span class="link_name">Inventario</span>
          </a>
          <span class="tooltip">Inventario</span>
        </li>
        <li>
          <a href="{{ route('historiales.index') }}">
            <i class="bx bx-chat"></i>
            <span class="link_name">Historial</span>
          </a>
          <span class="tooltip">Historial</span>
        </li>
        <li>
          <a href="{{ route('main') }}">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Analytics</span>
          </a>
          <span class="tooltip">Analytics</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-folder"></i>
            <span class="link_name">Archivos</span>
          </a>
          <span class="tooltip">Archivos</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cart-alt"></i>
            <span class="link_name">Order</span>
          </a>
          <span class="tooltip">Order</span>
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