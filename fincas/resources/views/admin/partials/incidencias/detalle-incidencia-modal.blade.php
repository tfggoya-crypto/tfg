@foreach(auth()->user()->edificiosAdmin as $edificio)

    @foreach($edificio->incidencias as $incidencia)

        <div class="modal fade"
             id="incidenciaModal{{ $incidencia->id }}"
             tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header">

                        <h5 class="modal-title">
                            Detalle de incidencia
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <!-- BODY -->
                    <div class="modal-body">

                        <p>
                            <strong>Título:</strong><br>
                            {{ $incidencia->titulo }}
                        </p>

                        <p>
                            <strong>Descripción:</strong><br>
                            {{ $incidencia->descripcion }}
                        </p>

                        <hr>

                        <!-- ESTADO EDITABLE -->
                        <div class="mb-3">

                            <label class="fw-bold">
                                Estado
                            </label>

                            <form method="POST"
                                  action="{{ route('incidencias.estado', $incidencia) }}"
                                  id="formEstado-{{ $incidencia->id }}">

                                @csrf
                                @method('PATCH')

                                <select class="form-select mt-1"
                                        name="estado"
                                        onchange="this.form.submit()">

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

                            </form>

                        </div>

                        <!-- PRIORIDAD EDITABLE -->
                        <div class="mb-3">

                            <label class="fw-bold">
                                Prioridad
                            </label>

                            <form method="POST"
                                  action="{{ route('incidencias.prioridad', $incidencia) }}"
                                  id="formPrioridad-{{ $incidencia->id }}">

                                @csrf
                                @method('PATCH')

                                <select class="form-select mt-1"
                                        name="prioridad"
                                        onchange="this.form.submit()">

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

                            </form>

                        </div>

                        <hr>

                        <p>
                            <strong>Edificio:</strong><br>
                            {{ $edificio->nombre }}
                        </p>

                        <p class="text-muted mb-0">
                            {{ $edificio->direccion }} · {{ $edificio->ciudad }}
                        </p>

                        <hr>

                        <!-- COMENTARIOS -->
                        <h6 class="fw-bold">
                            Comentarios
                        </h6>

                        @if($incidencia->comentarios->count() > 0)

                            <div class="mb-3"
                                 style="max-height: 250px; overflow-y:auto;">

                                @foreach($incidencia->comentarios as $comentario)

                                    <div class="p-2 mb-2 rounded"
                                         style="background:#F3F4F6;">

                                        <small class="text-muted">

                                            {{ $comentario->user->nombre }}
                                            —
                                            {{ $comentario->created_at->format('d/m/Y H:i') }}

                                        </small>

                                        <p class="mb-0">
                                            {{ $comentario->texto }}
                                        </p>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <p class="text-muted">
                                No hay comentarios todavía.
                            </p>

                        @endif

                        <hr>

                        <!-- AÑADIR COMENTARIO -->
                        <h6 class="fw-bold">
                            Añadir comentario
                        </h6>

                        <form method="POST"
                              action="{{ route('comentarios.store', $incidencia) }}">

                            @csrf

                            <div class="mb-3">

                                <textarea
                                    class="form-control"
                                    name="texto"
                                    rows="3"
                                    placeholder="Escribe tu comentario..."
                                    required></textarea>

                            </div>

                            <button type="submit"
                                    class="btn btn-primary">

                                Enviar comentario

                            </button>

                        </form>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">

                        <button class="btn btn-secondary"
                                data-bs-dismiss="modal">

                            Cerrar

                        </button>

                        <button
                            type="button"
                            class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editarIncidenciaModal{{ $incidencia->id }}"
                            data-bs-dismiss="modal">

                            Editar

                        </button>

                        <button
                            type="button"
                            class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#eliminarIncidenciaModal{{ $incidencia->id }}"
                            data-bs-dismiss="modal">

                            Eliminar

                        </button>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

@endforeach