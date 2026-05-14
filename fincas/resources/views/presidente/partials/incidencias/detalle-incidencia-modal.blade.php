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