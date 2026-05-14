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
                                <small class="text-muted">
                                    {{ $comentario->user->nombre }} — {{ $comentario->created_at->format('d/m/Y H:i') }}
                                </small>
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
                                <textarea class="form-control" name="texto" rows="3"
                                          placeholder="Escribe tu comentario..." required></textarea>
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