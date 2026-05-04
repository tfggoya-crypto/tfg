@extends('layouts.app')

@section('title', 'Detalle del edificio')

@section('content')

<div class="container py-4">

    <h2 class="fw-bold mb-4" style="color:#111827;">
        Panel del edificio
    </h2>

    <div class="card custom-card p-4">

        <!-- INFO EDIFICIO -->
        <h4 class="mb-3">{{ $edificio->nombre }}</h4>

        <div class="row">

            <div class="col-md-6 mb-3">
                <strong>Dirección:</strong><br>
                {{ $edificio->direccion }}
            </div>

            <div class="col-md-6 mb-3">
                <strong>Ciudad:</strong><br>
                {{ $edificio->ciudad }}
            </div>

            <div class="col-md-6 mb-3">
                <strong>Código postal:</strong><br>
                {{ $edificio->codigo_postal }}
            </div>

        </div>

        <hr>

        <!-- ADMIN -->
        <h5 class="fw-bold mb-3">Administrador de fincas</h5>

        @forelse($edificio->admins as $admin)
            <div class="p-2 mb-2 rounded" style="background:#F3F4F6;">
                <strong>{{ $admin->nombre }}</strong>
                <span class="text-muted">({{ $admin->email }})</span>
            </div>
        @empty
            <p class="text-muted">No hay administrador asignado</p>
        @endforelse

    </div>
</div>

@endsection