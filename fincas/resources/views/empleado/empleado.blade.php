@extends('layouts.app')

@section('title','Panel de Empleado')

@section('content')
<style>
    .carta {
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        min-height: 300px;
        height: 100%;
        box-shadow: 0 0 10px rgba(0,0,0,.05);
    }

    .carta:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .carta .card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .carta .acciones-card {
        margin-top: auto;
        display: flex;
        flex-direction: column;
        gap: .75rem;
    }

    .iconos{
        
        border-radius: 8px;
        padding: 8px;
    }

    .icono-edifico{
        color: #34a853;
    }

    .icono-incidencia{
        color: #eb4536;
    }

</style>


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

        <!-- TARJETA 1: EDIFICIO -->
        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta" style="border-top: #34a853 4px solid;">

                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-3">Edificio</h5>
                                <div class="iconos" style="background-color: #84da9b;">  
                                    <i class="bi bi-building-fill icono-edifico fs-5"></i>
                                </div>
                            </div>

                            

                            @if(auth()->user()->edificio)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ auth()->user()->edificio->nombre }} -
                                        {{ auth()->user()->edificio->direccion }}
                                    </li>
                                </ul>

                                <hr>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdificio">

                                    Ver Detalles
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                                </div>
                                
                                

                            @else
                                <p>No tienes edificio asignado</p>
                            @endif
                        </div>
                    </div>
                </div>
            
            </div>

            

        </div>


        <!-- TARJETA 2: INCIDENCIAS -->
        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta" style="border-top: #eb4536 4px solid;">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-3">Incidencias</h5>
                                <div class="iconos" style="background-color: #eb8278;">
                                    <i class="bi bi-exclamation-circle-fill fs-5 icono-incidencia"></i>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Total de incidencias:</span>
                                        <span class="badge bg-danger rounded-pill">
                                            {{ auth()->user()->edificio ? auth()->user()->edificio->incidencias->count() : 0 }}
                                        </span>
                                    </li>
                            </ul>

                            <hr>
                            <div class="text-center">
                                <div class="mb-3">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalIncidencias">

                                        Mostrar Incidencias
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>   
                            </div>
                            

                            <div class="text-center">
                               <div class="mb-3">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modaladdIncidencias">

                                        Agregar Incidencia

                                        <i class="bi bi-plus-circle"></i>
                                    </button>
                                </div> 
                            </div>
            

                        </div>

                    </div>
                </div>
            </div>

            

        </div>

        <!-- TARJETA 3: FACTURA -->
        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta">

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
            </div>

            

        </div>

        <!-- TARJETA 4: USUARIO -->
        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta">

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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Incidencias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @if(auth()->user()->edificio && auth()->user()->edificio->incidencias->count() > 0)
                        <ul class="list-group">
                            @foreach(auth()->user()->edificio->incidencias as $incidencia)
                                <li class="list-group-item">
                                    <strong>{{ $incidencia->titulo }}</strong><br>
                                    {{ $incidencia->descripcion }}

                                    <div class="d-flex gap-2 mt-3 flex-wrap">
                                        <form method="POST" action="{{ route('incidencias.estado', $incidencia) }}" id="formEstado-{{ $incidencia->id }}">
                                            @csrf
                                            @method('PATCH')
                                            <select class="form-select" name="estado" data-incidencia-id="{{ $incidencia->id }}" onchange="setEstadoIncidencia(this)">
                                                <option value="pendiente" @selected($incidencia->estado === 'pendiente')>Pendiente</option>
                                                <option value="en_proceso" @selected($incidencia->estado === 'en_proceso')>En proceso</option>
                                                <option value="resuelta" @selected($incidencia->estado === 'resuelta')>Resuelta</option>
                                            </select>
                                        </form>

                                        <button type="button"
                                                class="btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEliminarIncidencia"
                                                data-action="{{ route('incidencias.destroy', $incidencia) }}"
                                                data-titulo="{{ $incidencia->titulo }}"
                                                onclick="setDeleteIncidenciaAction(this)">
                                            Eliminar incidencia
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">No hay incidencias en este edificio.</p>
                    @endif
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL CAMBIAR ESTADO -->
    <div class="modal fade" id="modalCambiarEstadoIncidencia" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Cambiar estado de incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p id="textoCambiarEstadoIncidencia" class="mb-0">¿Estás seguro de cambiar el estado de esta incidencia?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning" onclick="confirmarCambioEstado()">Cambiar estado</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL ELIMINAR INCIDENCIA -->
    <div class="modal fade" id="modalEliminarIncidencia" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Eliminar incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p id="textoEliminarIncidencia" class="mb-0">¿Estás seguro de eliminar esta incidencia?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <form method="POST" id="formEliminarIncidencia" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL AGREGAR INCIDENCIA -->
    <div class="modal fade" id="modaladdIncidencias" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Agregar Incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('incidencias.store') }}">
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

                        <button type="submit" class="btn btn-primary w-100">Agregar Incidencia</button>
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

                    <form method="POST" action="{{ route('empleado.password.update') }}">
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
                setTimeout(function () {
                    alert.remove();
                }, 300);
            }
        }, 3000);
    </script>
@endif

<script>
    let estadoIncidenciaActivo = null;
    let reabrirModalIncidencias = false;

    function setEstadoIncidencia(select) {
        const incidenciaId = select.getAttribute('data-incidencia-id');
        estadoIncidenciaActivo = incidenciaId;
        reabrirModalIncidencias = true;

        const texto = document.getElementById('textoCambiarEstadoIncidencia');
        const opcion = select.options[select.selectedIndex];

        if (texto) {
            texto.textContent = opcion && opcion.textContent
                ? `¿Estás seguro de cambiar el estado a "${opcion.textContent.trim()}"?`
                : '¿Estás seguro de cambiar el estado de esta incidencia?';
        }

        const modalIncidenciasEl = document.getElementById('modalIncidencias');
        const modalCambiarEl = document.getElementById('modalCambiarEstadoIncidencia');
        const modalIncidencias = bootstrap.Modal.getInstance(modalIncidenciasEl);

        if (modalIncidencias) {
            modalIncidenciasEl.addEventListener('hidden.bs.modal', function () {
                const modalCambiar = new bootstrap.Modal(modalCambiarEl);
                modalCambiar.show();
            }, { once: true });

            modalIncidencias.hide();
        } else {
            const modalCambiar = new bootstrap.Modal(modalCambiarEl);
            modalCambiar.show();
        }
    }

    function confirmarCambioEstado() {
        if (!estadoIncidenciaActivo) {
            return;
        }

        const form = document.getElementById(`formEstado-${estadoIncidenciaActivo}`);
        if (form) {
            form.submit();
        }

        const modalEl = document.getElementById('modalCambiarEstadoIncidencia');
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) {
            modal.hide();
        }

        reabrirModalIncidencias = false;
        estadoIncidenciaActivo = null;
    }

    document.getElementById('modalCambiarEstadoIncidencia').addEventListener('hidden.bs.modal', function () {
        if (reabrirModalIncidencias) {
            const modalIncidenciasEl = document.getElementById('modalIncidencias');
            const modalIncidencias = new bootstrap.Modal(modalIncidenciasEl);
            modalIncidencias.show();
        }

        reabrirModalIncidencias = false;
        estadoIncidenciaActivo = null;
    });

    function setDeleteIncidenciaAction(button) {
        const form = document.getElementById('formEliminarIncidencia');
        const texto = document.getElementById('textoEliminarIncidencia');

        if (form) {
            form.action = button.getAttribute('data-action');
        }

        if (texto) {
            const titulo = button.getAttribute('data-titulo');
            texto.textContent = titulo
                ? `¿Estás seguro de eliminar la incidencia "${titulo}"?`
                : '¿Estás seguro de eliminar esta incidencia?';
        }
    }
</script>



@endsection