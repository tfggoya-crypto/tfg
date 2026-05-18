<div class="col-12 col-md-6 col-lg-4">

    <div class="row">

        <div class="col">

            <div class="card shadow-sm h-100 carta"
                 style="border-top: #eb4536 4px solid;">

                <div class="card-body">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between mb-3">

                        <h5 class="fw-bold mb-3">
                            Incidencias
                        </h5>

                        <div class="iconos"
                             style="background-color: #eb8278;">

                            <i class="bi bi-exclamation-circle-fill fs-5 icono-incidencia"></i>

                        </div>

                    </div>

                    <!-- DESCRIPCIÓN -->
                    <p class="text-muted">
                        Gestión de incidencias de los edificios.
                    </p>

                    <!-- LISTA -->
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

                    <hr>

                    <!-- BOTONES -->
                    <div class="d-flex flex-column gap-2">

                        <button
                            type="button"
                            class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalIncidencias">

                            Ver todas las incidencias

                            <i class="bi bi-chevron-right"></i>

                        </button>

                        <button
                            type="button"
                            class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#crearIncidenciaModal">

                            Crear incidencia

                            <i class="bi bi-plus-circle"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.partials.incidencias.lista-incidencia-modal')

@include('admin.partials.incidencias.detalle-incidencia-modal')

@include('admin.partials.incidencias.modificar-incidencia-modal')

@include('admin.partials.incidencias.crear-incidencia-modal')

@include('admin.partials.incidencias.eliminar-incidencia-modal')

<script src="{{ asset('js/admin/modificar.js') }}"></script>