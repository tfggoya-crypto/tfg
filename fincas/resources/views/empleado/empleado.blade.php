@extends('layouts.app')

@section('title','Panel de Empleado')

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">Bienvenido, {{ auth()->user()->nombre }}</h2>

    <div class="row g-4">

        <!-- TARJETA 1: EDIFICIO -->
        <div class="col-md-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Edificio asignado</h5>

                    @if(auth()->user()->edificio)
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ auth()->user()->edificio->nombre }} -
                                {{ auth()->user()->edificio->direccion }}
                            </li>
                        </ul>

                        <button class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEdificio">

                            Ver Detalles

                        </button>

                    @else
                        <p>No tienes edificio asignado</p>
                    @endif

                </div>

            </div>

        </div>


        <!-- TARJETA 2: INCIDENCIAS -->
        <div class="col-md-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Incidencias</h5>

                    <div class="mb-3">
                        <button class="btn btn-primary w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#modalIncidencias">

                            Mostrar Incidencias

                        </button>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#modaladdIncidencias">

                            Agregar Incidencia

                        </button>
                    </div>

                </div>

            </div>

        </div>

        <!-- TARJETA 3: FACTURA -->
        <div class="col-md-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="card-title">
                        Facturas del edificio
                    </h5>

                    <button class="btn btn-secondary w-100" disabled>
                        Próximamente
                    </button>

                </div>

            </div>

        </div>

        <!-- TARJETA 4: USUARIO -->
        <div class="col-md-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="card-title">
                        Información del usuario: {{ auth()->user()->username }}
                    </h5>

                    <button class="btn btn-primary w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuario">

                        Mostrar Información

                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- MODALS -->

    <!-- MODAL EDIFICIO -->
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


    <!-- MODAL INCIDENCIAS -->
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
                                    <button class="btn btn-primary mt-3">
                                        Cambiar Estado
                                    </button>
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


    <!-- MODAL AGREGAR INCIDENCIA -->
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
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control" name="titulo" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prioridad</label>
                            <select class="form-select" name="estado" required>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>

                        <input type="hidden" name="edificio_id" value="{{ auth()->user()->edificio->id }}">

                        <button type="submit" class="btn btn-primary">
                            Agregar Incidencia
                        </button>

                    </form>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL USUARIO -->
    <div class="modal fade" id="modalUsuario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Datos del Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <p><strong>Nombre:</strong> {{ auth()->user()->nombre }}</p>
                    <p><strong>Correo electrónico:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Rol:</strong> {{ auth()->user()->role }}</p>
                    <p><strong>Cargo:</strong> {{ auth()->user()->subrole }}</p>

                    <button class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCambiarPassword">

                        Cambiar contraseña

                    </button>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL CAMBIAR PASSWORD -->
    <div class="modal fade" id="modalCambiarPassword" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Cambiar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form method="POST" action="">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Contraseña actual</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nueva contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Guardar cambios
                        </button>

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