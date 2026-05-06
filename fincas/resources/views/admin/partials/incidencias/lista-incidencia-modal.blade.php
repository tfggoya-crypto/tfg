<div class="modal fade"
     id="modalIncidencias"
     tabindex="-1"
     aria-labelledby="incidenciasModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">

                <h5 class="modal-title fw-bold"
                    id="incidenciasModalLabel">

                    Todas las incidencias

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                @php
                    $edificios = auth()->user()->edificiosAdmin->load('incidencias');
                    $hayIncidencias = false;
                @endphp

                @if($edificios->isEmpty())

                    <div class="alert alert-info">
                        No tienes edificios asignados.
                    </div>

                @else

                    <div class="list-group">

                        @foreach($edificios as $edificio)

                            @if($edificio->incidencias->count() > 0)

                                @php $hayIncidencias = true; @endphp

                                <!-- SEPARADOR POR EDIFICIO -->
                                <div class="mb-2 mt-3">
                                    <h6 class="fw-bold text-primary">
                                        {{ $edificio->nombre }}
                                    </h6>
                                    <small class="text-muted">
                                        {{ $edificio->ciudad }} · {{ $edificio->direccion }}
                                    </small>
                                </div>

                                @foreach($edificio->incidencias as $incidencia)

                                    <div class="list-group-item">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <!-- INFO INCIDENCIA -->
                                            <div>

                                                <h6 class="mb-1 fw-bold">
                                                    {{ $incidencia->titulo }}
                                                </h6>

                                                <small class="text-muted">
                                                    Estado: {{ $incidencia->estado }}
                                                </small>

                                            </div>

                                            <!-- BOTONES -->
                                            <div class="d-flex gap-2">

                                                <!-- VER -->
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    ata-bs-target="#incidenciaModal{{ $incidencia->id }}"
                                                    data-bs-dismiss="modal">

                                                    Ver

                                                </button>

                                                <!-- EDITAR -->
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editarIncidenciaModal{{ $incidencia->id }}"
                                                    data-bs-dismiss="modal">

                                                    Editar

                                                </button>

                                                <!-- ELIMINAR -->
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#eliminarIncidenciaModal{{ $incidencia->id }}"
                                                    data-bs-dismiss="modal">

                                                    Eliminar

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            @endif

                        @endforeach

                    </div>

                    @if(!$hayIncidencias)

                        <div class="alert alert-warning mt-3">
                            No hay incidencias en ninguno de tus edificios.
                        </div>

                    @endif

                @endif

            </div>

            <!-- FOOTER -->
            <div class="modal-footer">

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Cerrar

                </button>

            </div>

        </div>

    </div>

</div>