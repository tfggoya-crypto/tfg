@extends('layouts.app')

@section('title','Panel de Empleado')

@section('content')

    <div class="container py-4">
        <h2 class="mb-4 fw-bold">Bienvenido, {{ auth()->user()->nombre }}</h2>

        <div class="card shadow-sm">

            <div class="card-body">
                <h5 class="fw-bold mb-3">Edificio asignado</h5>

                @if(auth()->user()->edificio)
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ auth()->user()->edificio->nombre }} -
                            {{ auth()->user()->edificio->direccion }}
                        </li>
                    </ul>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdificio">Ver Detalles</button>
                @else
                    <p>No tienes edificio asignado</p>
                @endif
            </div>

        </div>

        <!-- Mostrar info sobre edificio asignado (si tiene) y botón para ver detalles en modal -->
        <div class="modal fade" id="modalEdificio" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detalles del edificio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @if(auth()->user()->edificio)
                        <p><strong>ID:</strong> {{ auth()->user()->edificio->id }}</p>
                        <p><strong>Nombre:</strong> {{ auth()->user()->edificio->nombre }}</p>
                        <p><strong>Dirección:</strong> {{ auth()->user()->edificio->direccion }}</p>
                        <p><strong>Codigo Postal:</strong> {{ auth()->user()->edificio->codigo_postal }}</p>
                        <p><strong>Ciudad:</strong> {{ auth()->user()->edificio->ciudad }}</p>

                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

                </div>
            </div>
        </div>

        <!-- Incidencias -->
        <div class="card shadow-sm mt-3">

            <div class="card-body">
                <h5 class="fw-bold mb-3">Incidencias</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalIncidencias">Mostrar Incidencias</button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladdIncidencias">Agregar Incidencia</button>
            </div>
            
        </div>

        <!-- Ventana modal para mostrar incidencias del edificio asignado (si tiene) y botón para cambiar estado de cada incidencia -->
        <div class="modal fade" id="modalIncidencias" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Incidencias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @if(auth()->user()->edificio->incidencias->count() > 0)
                        <ul class="list-group">
                            @foreach(auth()->user()->edificio->incidencias as $incidencia)
                                <li class="list-group-item">
                                    <strong>{{ $incidencia->titulo }}</strong><br>
                                    {{ $incidencia->descripcion }}<br>
                                    <small class="text-muted">
                                        Estado: {{ $incidencia->estado }}
                                    </small>
                                    <br>
                                    <button class="btn btn-primary mt-3">Cambiar Estado</button>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p>No hay incidencias en este edificio.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

                </div>
            </div>
        </div>

        <!-- Ventana modal para agregar incidencias -->
        <div class="modal fade" id="modaladdIncidencias" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="estado" class="form-label">Prioridad</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="alta">Alta</option>
                                </select>
                            </div>
                            <input type="hidden" name="edificio_id" value="{{ auth()->user()->edificio->id }}">
                            <button type="submit" class="btn btn-primary">Agregar Incidencia</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection