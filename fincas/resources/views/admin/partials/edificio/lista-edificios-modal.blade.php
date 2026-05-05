<div class="modal fade"
     id="edificiosModal"
     tabindex="-1"
     aria-labelledby="edificiosModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">

                <h5 class="modal-title fw-bold"
                    id="edificiosModalLabel">

                    Todos los edificios

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                @if(auth()->user()->edificiosAdmin->isEmpty())

                    <div class="alert alert-info">
                        No tienes edificios asignados.
                    </div>

                @else

                    <div class="list-group">

                        @foreach(auth()->user()->edificiosAdmin as $edificio)

                            <div class="list-group-item">

                                <div class="d-flex justify-content-between align-items-center">

                                    <!-- INFO -->
                                    <div>

                                        <h6 class="mb-1 fw-bold">
                                            {{ $edificio->nombre }}
                                        </h6>

                                        <small class="text-muted">
                                            {{ $edificio->direccion }}
                                            ·
                                            {{ $edificio->ciudad }}
                                        </small>

                                    </div>

                                    <!-- BOTONES -->
                                    <div class="d-flex gap-2">

                                        <!-- VER -->
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#edificioModal{{ $edificio->id }}"
                                            data-bs-dismiss="modal">

                                            Ver

                                        </button>

                                        <!-- EDITAR -->
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editarEdificioModal{{ $edificio->id }}"
                                            data-bs-dismiss="modal">

                                            Editar

                                        </button>

                                        <button type="button"
                                            class="btn btn-sm btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#eliminarEdificioModal{{ $edificio->id }}"
                                            data-bs-dismiss="modal">

                                        Eliminar
                                        
                                    </button>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>