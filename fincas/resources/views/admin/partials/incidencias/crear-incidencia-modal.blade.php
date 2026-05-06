<div class="modal fade"
     id="crearIncidenciaModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title">
                    Crear incidencia
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('admin.incidencias.store') }}">

                @csrf

                <!-- BODY -->
                <div class="modal-body">

                    <!-- TÍTULO -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Título *
                        </label>

                        <input type="text"
                               name="titulo"
                               class="form-control"
                               required>
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Descripción *
                        </label>

                        <textarea name="descripcion"
                                  class="form-control"
                                  rows="3"
                                  required></textarea>
                    </div>

                    <!-- PRIORIDAD -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Prioridad
                        </label>

                        <select name="prioridad"
                                class="form-select">

                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="alta">Alta</option>

                        </select>
                    </div>

                    <!-- EDIFICIO (CLAVE) -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Edificio *
                        </label>

                        <select name="edificio_id"
                                class="form-select"
                                required>

                            @forelse(auth()->user()->edificiosAdmin as $edificio)

                                <option value="{{ $edificio->id }}">
                                    {{ $edificio->nombre }} ({{ $edificio->ciudad }})
                                </option>

                            @empty

                                <option disabled selected>
                                    No tienes edificios asignados
                                </option>

                            @endforelse

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
                        Crear incidencia
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>