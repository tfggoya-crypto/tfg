@foreach(auth()->user()->edificiosAdmin as $edificio)

    @foreach($edificio->incidencias as $incidencia)

        <div class="modal fade"
             id="editarIncidenciaModal{{ $incidencia->id }}"
             tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header">

                        <h5 class="modal-title">
                            Editar incidencia
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <!-- FORM -->
                    <form method="POST"
                          action="{{ route('incidencias.update', $incidencia->id) }}">

                        @csrf
                        @method('PUT')

                        <!-- BODY -->
                        <div class="modal-body">

                            <!-- TÍTULO -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Título
                                </label>

                                <div class="d-flex gap-2">

                                    <input
                                        type="text"
                                        id="titulo-{{ $incidencia->id }}"
                                        name="titulo"
                                        value="{{ $incidencia->titulo }}"
                                        class="form-control"
                                        disabled>

                                    <button
                                        type="button"
                                        class="btn btn-outline-primary"
                                        onclick="toggleField('titulo-{{ $incidencia->id }}')">

                                        Modificar

                                    </button>

                                </div>

                            </div>

                            <!-- DESCRIPCIÓN -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Descripción
                                </label>

                                <div class="d-flex gap-2">

                                    <textarea
                                        id="descripcion-{{ $incidencia->id }}"
                                        name="descripcion"
                                        class="form-control"
                                        rows="3"
                                        disabled>{{ $incidencia->descripcion }}</textarea>

                                    <button
                                        type="button"
                                        class="btn btn-outline-primary"
                                        onclick="toggleField('descripcion-{{ $incidencia->id }}')">

                                        Modificar

                                    </button>

                                </div>

                            </div>

                            <hr>

                            <!-- ESTADO -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Estado
                                </label>

                                <select name="estado" class="form-select">

                                    <option value="pendiente"
                                        @selected($incidencia->estado == 'pendiente')>
                                        Pendiente
                                    </option>

                                    <option value="en_proceso"
                                        @selected($incidencia->estado == 'en_proceso')>
                                        En proceso
                                    </option>

                                    <option value="resuelta"
                                        @selected($incidencia->estado == 'resuelta')>
                                        Resuelta
                                    </option>

                                </select>

                            </div>

                            <!-- PRIORIDAD -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Prioridad
                                </label>

                                <select name="prioridad" class="form-select">

                                    <option value="baja"
                                        @selected($incidencia->prioridad == 'baja')>
                                        Baja
                                    </option>

                                    <option value="media"
                                        @selected($incidencia->prioridad == 'media')>
                                        Media
                                    </option>

                                    <option value="alta"
                                        @selected($incidencia->prioridad == 'alta')>
                                        Alta
                                    </option>

                                </select>

                            </div>

                        </div>

                        <!-- FOOTER -->
                        <div class="modal-footer">

                            <button class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button class="btn btn-success">
                                Guardar cambios
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

@endforeach