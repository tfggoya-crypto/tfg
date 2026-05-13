@extends('layouts.app')

@section('title','Panel de Empleado')

@section('content')
<link rel="stylesheet" href="{{ asset('css/empleado/dashboard.css') }}">

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
        @include('empleado.cards.edificio-card')
        @include('empleado.cards.incidencia-card')
        @include('empleado.cards.factura-card')
        @include('empleado.cards.user-card')
    </div>

    @include('empleado.partials.edificio.ver-edificio-modal')
    @include('empleado.partials.incidencia.ver-incidencias-modal')
    @include('empleado.partials.incidencia.cambiar-estado-incidencia-modal')
    @include('empleado.partials.incidencia.eliminar-incidencia-modal')
    @include('empleado.partials.incidencia.crear-incidencia-modal')
    @include('empleado.partials.usuario.ver-usuario-modal')
    @include('empleado.partials.usuario.cambiar-password-usuario-modal')
</div>

<script src="{{ asset('js/empleado/alerts.js') }}"></script>
<script src="{{ asset('js/empleado/incidencias.js') }}"></script>

@endsection