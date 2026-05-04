@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">Panel de administración</h2>

    <div class="row g-4">

        <!-- TARJETA 1: EDIFICIOS -->
        <div class="col-md-4">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Edificios</h5>

                    <p class="text-muted">
                        Gestiona los edificios que tienes asignados.
                    </p>

                    <!-- LISTA CORTA -->
                    <ul class="list-group list-group-flush mb-3">

                        @foreach(auth()->user()->edificiosAdmin->take(3) as $edificio)

                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <span>{{ $edificio->nombre }}</span>

                                <a href="{{ route('edificios.show', $edificio->id) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Ver
                                </a>

                            </li>

                        @endforeach

                    </ul>

                    <!-- BOTÓN VER TODOS -->
                    <a href="{{ route('edificios.index') }}"
                       class="btn btn-primary w-100">

                        Ver todos los edificios

                    </a>

                </div>

            </div>

        </div>


        <!-- TARJETA 2: INCIDENCIAS (placeholder) -->
        <div class="col-md-4">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Incidencias</h5>

                    <p class="text-muted">
                        Gestión de incidencias de los edificios.
                    </p>

                    <button class="btn btn-secondary w-100" disabled>
                        Próximamente
                    </button>

                </div>

            </div>

        </div>


        <!-- TARJETA 3: USUARIOS (placeholder) -->
        <div class="col-md-4">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Usuarios</h5>

                    <p class="text-muted">
                        Administración de usuarios del sistema.
                    </p>

                    <button class="btn btn-secondary w-100" disabled>
                        Próximamente
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection