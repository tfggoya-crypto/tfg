@extends('layouts.app')

@section('title', 'Panel Presidente')

@section('content')
<link rel="stylesheet" href="{{ asset('css/empleado/dashboard.css') }}">

<div class="container py-4">

    <h2 class="mb-1 fw-bold">Bienvenido, {{ auth()->user()->nombre }}</h2>
    <p class="text-muted mb-4">
        Presidente de comunidad
        @if($edificio)
            · <strong>{{ $edificio->nombre }}</strong>
            — {{ $edificio->direccion }}, {{ $edificio->ciudad }}
        @endif
    </p>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!$edificio)
        <div class="alert alert-warning">
            No tienes ningún edificio asignado. Contacta con el administrador.
        </div>
    @else

    <div class="row g-4">
        @include('presidente.cards.incidencias-card')
        @include('presidente.cards.usuario-card')
        @include('presidente.cards.usuarios-card')
    </div>

    @include('presidente.partials.incidencias.lista-incidencias-modal')
    @include('presidente.partials.incidencias.detalle-incidencia-modal')
    @include('presidente.partials.incidencias.crear-incidencia-modal')
    @include('presidente.partials.usuario.mi-info-modal')
    @include('presidente.partials.usuario.cambiar-password-modal')
    @include('presidente.partials.usuarios.lista-usuarios-modal')
    @include('presidente.partials.usuarios.detalle-usuario-modal')

    @endif

</div>

@if(session('success'))
<script>
    setTimeout(function () {
        const el = document.getElementById('success-alert');
        if (el) { el.classList.add('fade'); setTimeout(() => el.remove(), 300); }
    }, 3000);
</script>
@endif

<script>
    ['filtroEstadoInc', 'filtroPrioridadInc'].forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('change', filtrarIncidencias);
    });

    function filtrarIncidencias() {
        const estado    = document.getElementById('filtroEstadoInc')?.value ?? '';
        const prioridad = document.getElementById('filtroPrioridadInc')?.value ?? '';
        document.querySelectorAll('.incidencia-item').forEach(item => {
            const ok = (!estado || item.dataset.estado === estado)
                    && (!prioridad || item.dataset.prioridad === prioridad);
            item.style.display = ok ? '' : 'none';
        });
    }
</script>

<script>
    const filtroRolUsuarios = document.getElementById('filtroRolUsuarios');
    if (filtroRolUsuarios) {
        filtroRolUsuarios.addEventListener('change', function () {
            const val = this.value;
            document.querySelectorAll('.usuario-item-pres').forEach(item => {
                item.style.display = !val || item.dataset.rol === val ? '' : 'none';
            });
        });
    }
</script>

@endsection