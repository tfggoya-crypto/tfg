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