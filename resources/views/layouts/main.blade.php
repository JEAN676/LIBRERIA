<!DOCTYPE html>
<html lang="es">
<head>
  <title>@yield('title')</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
          <form method="GET" action="{{ route('libros.index') }}" style="display: flex; align-items: center;">
            <i class="bx bx-search"></i>
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
            <span class="tooltip">Search</span>
        </form>
          {{-- <i class="bx bx-search"></i>
          <input type="text" placeholder="Search..."> --}}
          {{-- <span class="tooltip">Search</span> --}}
        </li>
        <li>
          <a href="{{ route('libros.create') }}">
            <i class="bx bx-user"></i>
            <span class="link_name">Crear</span>
          </a>
          <span class="tooltip">Crear</span>
        </li>
        <li>
          <a href="{{ route('libros.index') }}">
            <i class="bx bx-grid-alt"></i>
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
            <span class="link_name">Catalogo</span>
          </a>
          <span class="tooltip">Catalogo</span>
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
    {{-- <div class="text">Biblioteca</div> --}}
    @yield('content')
  </section>
  
  <!-- Scripts -->
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        
        @if(session('msn_success'))
            console.log('msn_success:', '{{ session('msn_success') }}');
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('msn_success') }}',
            });
        @endif
        
        @if(session('msn_error'))
            console.log('msn_error:', '{{ session('msn_error') }}');
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '{{ session('msn_error') }}',
            });
        @endif
    });

    function confirmaEliminarEquipo(event) {
        event.preventDefault();
        let form = event.target;
        Swal.fire({
            text: "¿Estás seguro de que deseas eliminar este equipo?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
  </script>
</body>
</html>
