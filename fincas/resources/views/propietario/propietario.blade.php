@extends('layouts.app')

@section('title', 'Panel Propietario')

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">Bienvenido, {{ auth()->user()->nombre }}</h2>

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

    <div class="row g-4">
        @include('propietario.cards.incidencias-card')
        @include('propietario.cards.usuario-card')
    </div>

    @include('propietario.partials.incidencias.lista-incidencias-modal')
    @include('propietario.partials.incidencias.detalle-incidencia-modal')
    @include('propietario.partials.incidencias.crear-incidencia-modal')
    @include('propietario.partials.usuario.ver-usuario-modal')
    @include('propietario.partials.usuario.cambiar-password-modal')

</div>

@if(session('success'))
<script>
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.add('fade');
            alert.classList.remove('show');
            setTimeout(function () { alert.remove(); }, 300);
        }
    }, 3000);
</script>
@endif

<script>
    function verDetalle(id) {
        document.querySelectorAll('.detalle-incidencia').forEach(el => {
            el.classList.add('d-none');
        });
        const detalle = document.querySelector(`.detalle-incidencia[data-id="${id}"]`);
        if (detalle) {
            detalle.classList.remove('d-none');
        }
    }
</script>

@endsection