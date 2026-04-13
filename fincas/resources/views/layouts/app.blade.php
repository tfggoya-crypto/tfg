<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f5f6fa; }
        .card { box-shadow: 0 0 10px rgba(0,0,0,.05); }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand">Administración de Fincas</span>

        @if(session('usuario'))
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
        @endif
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
