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