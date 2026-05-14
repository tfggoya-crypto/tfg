@extends('layouts.app')

@section('title', 'Panel Presidente')

@section('content')

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

        {{-- ===================== CARD INCIDENCIAS ===================== --}}
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-3">Incidencias del edificio</h5>

                    <p class="text-muted small">
                        Consulta todas las incidencias reportadas en tu comunidad.
                    </p>

                    @if($incidencias->count() > 0)
                        <ul class="list-group list-group-flush mb-3">
                            @foreach($incidencias->take(3) as $inc)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        <span class="fw-semibold small">{{ $inc->titulo }}</span><br>
                                        <small class="text-muted">{{ $inc->user->nombre ?? '—' }}</small>
                                    </div>
                                    @if($inc->estado === 'pendiente')
                                        <span class="badge" style="background:#F59E0B;">Pendiente</span>
                                    @elseif($inc->estado === 'en_proceso')
                                        <span class="badge" style="background:#3B82F6;">En proceso</span>
                                    @else
                                        <span class="badge" style="background:#10B981;">Resuelta</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small">No hay incidencias registradas.</p>
                    @endif

                    <button class="btn btn-primary w-100 mt-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#modalIncidencias">
                        Ver todas las incidencias
                        @if($incidencias->count() > 0)
                            <span class="badge bg-light text-dark ms-1">{{ $incidencias->count() }}</span>
                        @endif
                    </button>

                </div>
            </div>
        </div>

        {{-- ===================== CARD MI INFORMACIÓN ===================== --}}
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-3">Mi información</h5>

                    <p class="text-muted small">
                        Consulta y gestiona tus datos personales.
                    </p>

                    <div class="mb-3 p-3 border rounded bg-light small">
                        <div class="mb-1">
                            <strong>Usuario:</strong> {{ auth()->user()->username }}
                        </div>
                        <div class="mb-1">
                            <strong>Email:</strong> {{ auth()->user()->email }}
                        </div>
                        <div>
                            <strong>Rol:</strong>
                            <span class="badge bg-success">Presidente</span>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mt-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#modalMiInfo">
                        Ver mi información
                    </button>

                </div>
            </div>
        </div>

        {{-- ===================== CARD USUARIOS EDIFICIO ===================== --}}
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-3">Usuarios del edificio</h5>

                    <p class="text-muted small">
                        Consulta los vecinos y empleados de tu comunidad.
                    </p>

                    <div class="mb-3 p-3 border rounded bg-light">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="small">Vecinos</span>
                            <span class="badge bg-primary">{{ $vecinos }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="small">Empleados</span>
                            <span class="badge bg-warning">{{ $empleados }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="small">Presidentes</span>
                            <span class="badge bg-success">{{ $presidentes }}</span>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mt-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuarios">
                        Ver usuarios del edificio
                        @if($usuarios->count() > 0)
                            <span class="badge bg-light text-dark ms-1">{{ $usuarios->count() }}</span>
                        @endif
                    </button>

                </div>
            </div>
        </div>

    </div>


    {{-- ================================================================
         MODAL: TODAS LAS INCIDENCIAS
    ================================================================ --}}
    <div class="modal fade" id="modalIncidencias" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Incidencias — {{ $edificio->nombre }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    @if($incidencias->count() === 0)
                        <div class="alert alert-info mb-0">
                            No hay incidencias en este edificio.
                        </div>
                    @else

                        <div class="row mb-3 g-2">
                            <div class="col-md-6">
                                <select class="form-select form-select-sm" id="filtroEstadoInc">
                                    <option value="">Todos los estados</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en_proceso">En proceso</option>
                                    <option value="resuelta">Resuelta</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select-sm" id="filtroPrioridadInc">
                                    <option value="">Todas las prioridades</option>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                            </div>
                        </div>

                        <div class="list-group" id="listaIncidencias">
                            @foreach($incidencias as $inc)
                                <div class="list-group-item incidencia-item"
                                     data-estado="{{ $inc->estado }}"
                                     data-prioridad="{{ $inc->prioridad }}">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 fw-semibold">{{ $inc->titulo }}</h6>
                                            <small class="text-muted">
                                                Reportada por <strong>{{ $inc->user->nombre ?? '—' }}</strong>
                                                · {{ $inc->created_at->format('d/m/Y') }}
                                            </small>
                                        </div>

                                        <div class="d-flex gap-2 align-items-center">

                                            @if($inc->estado === 'pendiente')
                                                <span class="badge" style="background:#F59E0B;">Pendiente</span>
                                            @elseif($inc->estado === 'en_proceso')
                                                <span class="badge" style="background:#3B82F6;">En proceso</span>
                                            @else
                                                <span class="badge" style="background:#10B981;">Resuelta</span>
                                            @endif

                                            @if($inc->prioridad === 'alta')
                                                <span class="badge" style="background:#EF4444;">Alta</span>
                                            @elseif($inc->prioridad === 'media')
                                                <span class="badge" style="background:#F59E0B;">Media</span>
                                            @else
                                                <span class="badge bg-secondary">Baja</span>
                                            @endif

                                            <button type="button"
                                                    class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#incidenciaDetalle{{ $inc->id }}"
                                                    data-bs-dismiss="modal">
                                                Ver
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    @endif

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODALES DETALLE INCIDENCIA --}}
    @foreach($incidencias as $inc)
        <div class="modal fade" id="incidenciaDetalle{{ $inc->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Detalle de incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <p><strong>Título:</strong><br>{{ $inc->titulo }}</p>
                        <p><strong>Descripción:</strong><br>{{ $inc->descripcion }}</p>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <strong>Estado:</strong><br>
                                    @if($inc->estado === 'pendiente')
                                        <span class="badge" style="background:#F59E0B;">Pendiente</span>
                                    @elseif($inc->estado === 'en_proceso')
                                        <span class="badge" style="background:#3B82F6;">En proceso</span>
                                    @else
                                        <span class="badge" style="background:#10B981;">Resuelta</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <strong>Prioridad:</strong><br>
                                    @if($inc->prioridad === 'alta')
                                        <span class="badge" style="background:#EF4444;">Alta</span>
                                    @elseif($inc->prioridad === 'media')
                                        <span class="badge" style="background:#F59E0B;">Media</span>
                                    @else
                                        <span class="badge bg-secondary">Baja</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <p><strong>Reportada por:</strong><br>{{ $inc->user->nombre ?? '—' }}</p>
                        <p class="text-muted small">Fecha: {{ $inc->created_at->format('d/m/Y H:i') }}</p>

                        <hr>

                        <h6 class="fw-bold">Comentarios</h6>

                        @if($inc->comentarios->count() > 0)
                            <div style="max-height:200px; overflow-y:auto;" class="mb-3">
                                @foreach($inc->comentarios as $com)
                                    <div class="p-2 mb-2 rounded" style="background:#F3F4F6;">
                                        <small class="text-muted">
                                            {{ $com->user->nombre ?? '—' }} — {{ $com->created_at->format('d/m/Y H:i') }}
                                        </small>
                                        <p class="mb-0">{{ $com->texto }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted small">No hay comentarios todavía.</p>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button"
                                class="btn btn-outline-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalIncidencias"
                                data-bs-dismiss="modal">
                            ← Volver a la lista
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    {{-- ================================================================
         MODAL: MI INFORMACIÓN
    ================================================================ --}}
    <div class="modal fade" id="modalMiInfo" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Mis datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    @php $user = auth()->user(); @endphp

                    <p><strong>Nombre:</strong><br>{{ $user->nombre }}</p>
                    <p><strong>Username:</strong><br>{{ $user->username }}</p>
                    <p><strong>Email:</strong><br>{{ $user->email }}</p>

                    <hr>

                    <p>
                        <strong>Rol:</strong>&nbsp;
                        <span class="badge bg-success">Presidente</span>
                    </p>

                    @if($user->propietarioPerfil)
                        <hr>
                        <p><strong>DNI:</strong><br>{{ $user->propietarioPerfil->dni }}</p>
                        <p><strong>Teléfono:</strong><br>{{ $user->propietarioPerfil->telefono }}</p>
                        <p><strong>Nº vivienda:</strong><br>{{ $user->propietarioPerfil->numero_vivienda }}</p>
                    @endif

                    @if($edificio)
                        <hr>
                        <p><strong>Edificio:</strong><br>{{ $edificio->nombre }}</p>
                        <p class="text-muted small mb-0">
                            {{ $edificio->direccion }}, {{ $edificio->ciudad }}
                            (CP {{ $edificio->codigo_postal }})
                        </p>
                    @endif

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    {{-- ================================================================
         MODAL: USUARIOS DEL EDIFICIO
    ================================================================ --}}
    <div class="modal fade" id="modalUsuarios" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Usuarios — {{ $edificio->nombre }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    @if($usuarios->count() === 0)
                        <div class="alert alert-info mb-0">
                            No hay otros usuarios en este edificio.
                        </div>
                    @else

                        <div class="mb-3">
                            <select class="form-select form-select-sm" id="filtroRolUsuarios">
                                <option value="">Todos los roles</option>
                                <option value="vecino">Vecinos</option>
                                <option value="presidente">Presidentes</option>
                                <option value="empleado">Empleados</option>
                            </select>
                        </div>

                        <div class="list-group" id="listaUsuariosPresidente">
                            @foreach($usuarios as $usr)
                                @php $rolDisplay = $usr->role === 'empleado' ? 'empleado' : ($usr->subrole ?? $usr->role); @endphp
                                <div class="list-group-item usuario-item-pres"
                                     data-rol="{{ $rolDisplay }}">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>
                                            <strong>{{ $usr->nombre }}</strong><br>
                                            <small class="text-muted">{{ $usr->email }}</small>
                                        </div>

                                        <div class="d-flex align-items-center gap-2">
                                            @if($usr->subrole === 'presidente')
                                                <span class="badge bg-success">Presidente</span>
                                            @elseif($usr->role === 'empleado')
                                                <span class="badge bg-warning text-dark">
                                                    Empleado{{ $usr->subrole ? ' · ' . $usr->subrole : '' }}
                                                </span>
                                            @else
                                                <span class="badge bg-primary">Vecino</span>
                                            @endif

                                            <button type="button"
                                                    class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#usuarioDetalle{{ $usr->id }}"
                                                    data-bs-dismiss="modal">
                                                Ver
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        </div>

                    @endif

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODALES DETALLE USUARIO --}}
    @foreach($usuarios as $usr)
        <div class="modal fade" id="usuarioDetalle{{ $usr->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Detalle de usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <p><strong>Nombre:</strong><br>{{ $usr->nombre }}</p>
                        <p><strong>Username:</strong><br>{{ $usr->username }}</p>
                        <p><strong>Email:</strong><br>{{ $usr->email }}</p>

                        <hr>

                        <p>
                            <strong>Rol:</strong>&nbsp;
                            @if($usr->subrole === 'presidente')
                                <span class="badge bg-success">Presidente</span>
                            @elseif($usr->role === 'empleado')
                                <span class="badge bg-warning text-dark">Empleado</span>
                            @else
                                <span class="badge bg-primary">Vecino</span>
                            @endif
                        </p>

                        @if($usr->subrole && $usr->subrole !== 'presidente')
                            <p>
                                <strong>Subrole:</strong>&nbsp;
                                <span class="badge bg-secondary">{{ $usr->subrole }}</span>
                            </p>
                        @endif

                        @if($usr->propietarioPerfil)
                            <hr>
                            <p><strong>DNI:</strong><br>{{ $usr->propietarioPerfil->dni }}</p>
                            <p><strong>Teléfono:</strong><br>{{ $usr->propietarioPerfil->telefono }}</p>
                            <p><strong>Nº vivienda:</strong><br>{{ $usr->propietarioPerfil->numero_vivienda }}</p>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button"
                                class="btn btn-outline-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalUsuarios"
                                data-bs-dismiss="modal">
                            ← Volver a la lista
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    @endif {{-- /if $edificio --}}

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