<div class="col-md-4">

    <div class="card shadow-sm h-100">

        <div class="card-body">

            <h5 class="fw-bold mb-3">Incidencias</h5>

            <p class="text-muted">
                Gestión de incidencias de los edificios.
            </p>

            <!-- LISTA CORTA -->
            <ul class="list-group list-group-flush mb-3">

                @foreach(auth()->user()->incidencias->take(3) as $incidencia)

                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        <div class="d-flex flex-column">

                            <span class="fw-semibold">
                                {{ $incidencia->titulo ?? 'Incidencia #' . $incidencia->id }}
                            </span>

                            <small class="text-muted">
                                {{ $incidencia->estado ?? 'Sin estado' }}
                            </small>

                        </div>

                        <button
                            class="btn btn-sm btn-outline-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#incidenciaModal{{ $incidencia->id }}">

                            Ver

                        </button>

                    </li>

                @endforeach

            </ul>

            <!-- BOTÓN VER TODAS -->
            <button
                type="button"
                class="btn btn-primary w-100"
                data-bs-toggle="modal"
                data-bs-target="#modalIncidencias">

                Ver todas las incidencias

            </button>

            <!-- BOTÓN CREAR -->
            <button
                type="button"
                class="btn btn-success w-100 mt-2"
                data-bs-toggle="modal"
                data-bs-target="#crearIncidenciaModal">

                Crear incidencia

            </button>

        </div>

    </div>

</div>

@include('admin.partials.incidencias.lista-incidencia-modal')



