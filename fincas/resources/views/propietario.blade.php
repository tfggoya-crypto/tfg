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

        <!-- TARJETA INCIDENCIAS -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Mis Incidencias</h5>

                    <div class="mb-3">
                        <button class="btn btn-primary w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#modalIncidencias">
                            Ver mis incidencias
                        </button>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#modalNuevaIncidencia">
                            Crear incidencia
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- TARJETA USUARIO -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        Mi información: {{ auth()->user()->username }}
                    </h5>
                    <button class="btn btn-primary w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuario">
                        Ver información
                    </button>
                </div>
            </div>
        </div>

    </div>


    <!-- MODAL LISTAR INCIDENCIAS -->
    <div class="modal fade" id="modalIncidencias" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Mis Incidencias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @if($incidencias->count() > 0)
                        <table class="table">
                            <thead style="background:#F3F4F6;">
                                <tr>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Prioridad</th>
                                    <th>Fecha</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incidencias as $incidencia)
                                <tr>
                                    <td>{{ $incidencia->descripcion }}</td>
                                    <td>
                                        @if($incidencia->estado === 'pendiente')
                                            <span class="badge" style="background:#F59E0B;">Abierta</span>
                                        @elseif($incidencia->estado === 'en_proceso')
                                            <span class="badge" style="background:#3B82F6;">En proceso</span>
                                        @else
                                            <span class="badge" style="background:#10B981;">Resuelta</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($incidencia->prioridad === 'alta')
                                            <span class="badge" style="background:#EF4444;">Alta</span>
                                        @elseif($incidencia->prioridad === 'media')
                                            <span class="badge" style="background:#F59E0B;">Media</span>
                                        @else
                                            <span class="badge" style="background:#6B7280;">Baja</span>
                                        @endif
                                    </td>
                                    <td>{{ $incidencia->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"
                                                onclick="verDetalle({{ $incidencia->id }})"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDetalleIncidencia">
                                            Ver
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No tienes incidencias registradas todavía.</p>
                    @endif
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL DETALLE INCIDENCIA -->
    <div class="modal fade" id="modalDetalleIncidencia" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detalle de Incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div id="detalleContenido">
                        @foreach($incidencias as $incidencia)
                        <div class="detalle-incidencia d-none" data-id="{{ $incidencia->id }}">

                            <p><strong>Título:</strong> {{ $incidencia->titulo }}</p>
                            <p><strong>Descripción:</strong> {{ $incidencia->descripcion }}</p>
                            <p><strong>Estado:</strong>
                                @if($incidencia->estado === 'pendiente')
                                    <span class="badge" style="background:#F59E0B;">Abierta</span>
                                @elseif($incidencia->estado === 'en_proceso')
                                    <span class="badge" style="background:#3B82F6;">En proceso</span>
                                @else
                                    <span class="badge" style="background:#10B981;">Resuelta</span>
                                @endif
                            </p>
                            <p><strong>Prioridad:</strong>
                                @if($incidencia->prioridad === 'alta')
                                    <span class="badge" style="background:#EF4444;">Alta</span>
                                @elseif($incidencia->prioridad === 'media')
                                    <span class="badge" style="background:#F59E0B;">Media</span>
                                @else
                                    <span class="badge" style="background:#6B7280;">Baja</span>
                                @endif
                            </p>
                            <p><strong>Fecha:</strong> {{ $incidencia->created_at->format('d/m/Y') }}</p>

                            <hr>

                            <h6 class="fw-bold">Comentarios</h6>

                            @if($incidencia->comentarios->count() > 0)
                                @foreach($incidencia->comentarios as $comentario)
                                <div class="p-2 mb-2 rounded" style="background:#F3F4F6;">
                                    <small class="text-muted">{{ $comentario->user->nombre }} — {{ $comentario->created_at->format('d/m/Y H:i') }}</small>
                                    <p class="mb-0">{{ $comentario->texto }}</p>
                                </div>
                                @endforeach
                            @else
                                <p class="text-muted">No hay comentarios todavía.</p>
                            @endif

                            <hr>

                            <h6 class="fw-bold">Añadir comentario</h6>
                            <form method="POST" action="{{ route('propietario.comentarios.store', $incidencia) }}">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="texto" rows="3" placeholder="Escribe tu comentario..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar comentario</button>
                            </form>

                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL NUEVA INCIDENCIA -->
    <div class="modal fade" id="modalNuevaIncidencia" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Crear Incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('propietario.incidencias.store') }}">
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
                            <select class="form-select" name="prioridad" required>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Crear Incidencia
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
                    @if(auth()->user()->propietarioPerfil)
                        <p><strong>DNI:</strong> {{ auth()->user()->propietarioPerfil->dni }}</p>
                        <p><strong>Teléfono:</strong> {{ auth()->user()->propietarioPerfil->telefono }}</p>
                        <p><strong>Vivienda:</strong> {{ auth()->user()->propietarioPerfil->numero_vivienda }}</p>
                    @endif

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
                    <form method="POST" action="{{ route('propietario.password.update') }}">
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