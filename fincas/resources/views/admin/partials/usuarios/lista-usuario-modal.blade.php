<div class="modal fade" id="usuariosModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Usuarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">

                <!-- FILTROS -->
                <div class="row mb-3">

                    <!-- FILTRO EDIFICIO -->
                    <div class="col-md-6">
                        <select class="form-select" id="filtroEdificio">
                            <option value="">Todos los edificios</option>
                            @foreach(auth()->user()->edificiosAdmin as $edificio)
                                <option value="{{ $edificio->id }}">
                                    {{ $edificio->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- FILTRO ROL -->
                    <div class="col-md-6">
                        <select class="form-select" id="filtroRol">
                            <option value="">Todos los roles</option>
                            <option value="empleado">Empleado</option>
                            <option value="propietario">Vecino</option>
                            <option value="presidente">Presidente</option>
                        </select>
                    </div>

                </div>

                <hr>

                <!-- LISTA AGRUPADA POR EDIFICIO -->
                <div id="listaUsuarios">

                    @foreach(auth()->user()->edificiosAdmin as $edificio)

                        <div class="mb-4 edificio-block"
                             data-edificio="{{ $edificio->id }}">

                            <!-- TITULO EDIFICIO -->
                            <h6 class="fw-bold border-bottom pb-1">
                                {{ $edificio->nombre }}
                            </h6>

                            @php
                                $usuariosEdificio = $usuarios->where('edificio_id', $edificio->id);
                            @endphp

                            @forelse($usuariosEdificio as $usuario)

                                <div class="border rounded p-2 mb-2 usuario-item"
                                     data-edificio="{{ $usuario->edificio_id }}"
                                     data-rol="{{ $usuario->role }}">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <!-- INFO -->
                                        <div>
                                            <strong>{{ $usuario->nombre }}</strong><br>
                                            <small class="text-muted">{{ $usuario->email }}</small>
                                        </div>

                                        <!-- ACCIONES -->
                                        <div class="d-flex align-items-center gap-2">

                                            <!-- BADGE -->
                                            <span class="badge
                                                @if($usuario->role == 'empleado') bg-warning
                                                @elseif($usuario->role == 'propietario') bg-primary
                                                @elseif($usuario->role == 'presidente') bg-success
                                                @else bg-secondary
                                                @endif">

                                                {{ $usuario->role == 'propietario' ? 'vecino' : $usuario->role }}

                                            </span>

                                            <!-- VER -->
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#userModal{{ $usuario->id }}">

                                                Ver

                                            </button>

                                            <!-- MODIFICAR -->
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-warning"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editarUsuarioModal{{ $usuario->id }}">

                                                Editar

                                            </button>

                                            <!-- ELIMINAR -->
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#eliminarUsuarioModal{{ $usuario->id }}">

                                                Eliminar

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <p class="text-muted small">
                                    No hay usuarios en este edificio
                                </p>

                            @endforelse

                        </div>

                    @endforeach

                </div>

            </div>

        </div>
    </div>
</div>