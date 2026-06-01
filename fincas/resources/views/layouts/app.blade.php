<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- 🔐 CSRF TOKEN (IMPORTANTE) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/assets/logo_fynkoo.png" sizes="364x364">
    <link rel="icon" type="image/png" href="/assets/logo_fynkoo.png" sizes="728x728">
    <link rel="apple-touch-icon" href="/assets/logo_fynkoo.png" sizes="1456x1456">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { background-color: #f5f6fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden; 
        }
        
        .card { box-shadow: 0 0 10px rgba(0,0,0,.05); }

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
    <div class="container">
        <div class="d-flex align-items-center justify-content-center h-100">
            <a href="/" style="text-decoration: none; display: flex; align-items: center;">
                <img src="/assets/logo_fynkoo.png" class="rounded-4" style="height: 50px; cursor: pointer;" alt="imglogin">
                <span class="navbar-brand fs-4 ms-1">Fynkoo</span>
            </a>
        </div>
        

        <!-- ✅ USAR AUTH, NO SESSION -->
        @auth
        <div class="dropdown">
            <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Perfil">
                <i class="bi bi-person-fill"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><span class="dropdown-item-text fw-bold">{{ Auth::user()->nombre}}</span></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>

<div class="container">
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
