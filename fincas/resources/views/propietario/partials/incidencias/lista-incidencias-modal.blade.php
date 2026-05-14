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