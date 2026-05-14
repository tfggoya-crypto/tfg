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