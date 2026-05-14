
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>

    <link rel="icon" type="image/png" href="/assets/logo_fincapp.png" sizes="364x364">
    <link rel="icon" type="image/png" href="/assets/logo_fincapp.png" sizes="728x728">
    <link rel="apple-touch-icon" href="/assets/logo_fincapp.png" sizes="1456x1456">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            background-color: #f5f6fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .page-content {
            flex: 1 0 auto;
        }

        .card { box-shadow: 0 0 10px rgba(0,0,0,.05); }
        .carousel-rounded {
            border-radius: 12px;
            overflow: hidden;
        }

        .carousel-rounded .carousel-item img {
            border-radius: 12px;
        }

        .app-footer {
            background-color: #212529;
            color: #adb5bd;
            padding: 1rem 0;
            margin-top: auto;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container d-flex align-items-center justify-content-between">

    <!-- IZQUIERDA -->
    <span class="navbar-brand mb-0">
      <div class="d-flex align-items-center justify-content-center h-100">
            <a href="/" style="text-decoration: none; display: flex; align-items: center;">
                <img src="/assets/logo_fincapp.png" class="rounded-4" style="height: 50px; cursor: pointer;" alt="imglogin">
                <span class="navbar-brand fs-4 ms-1">Fincapp</span>
            </a>
        </div>
    </span>

    <!-- CENTRO -->
    <div class="d-flex gap-3 position-absolute start-50 translate-middle-x">
      <a href="/" class="nav-link text-light fs-5">Inicio</a>
      <a href="/contacto" class="nav-link text-light fs-5">Contacto</a>
      <a href="/acercade" class="nav-link text-light fs-5">Acerca de</a>
    </div>

    <!-- DERECHA -->
    <a href="/login" class="btn btn-outline-light btn-lg">
      Iniciar sesión
    </a>

  </div>
</nav>

<div class="container page-content py-4">
    @yield('content')
</div>


<footer class="app-footer">
    <div class="container text-center small">
        <span>© {{ date('Y') }} Administración de Fincas · Gestión de comunidades de forma sencilla y segura.</span>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
