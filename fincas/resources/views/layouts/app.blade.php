<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- 🔐 CSRF TOKEN (IMPORTANTE) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/assets/logo_fincapp.png" sizes="64x64">
    <link rel="icon" type="image/png" href="/assets/logo_fincapp.png" sizes="128x128">
    <link rel="apple-touch-icon" href="/assets/logo_fincapp.png" sizes="360x360">

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
        <span class="navbar-brand">Administración de Fincas</span>

        <!-- ✅ USAR AUTH, NO SESSION -->
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
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
