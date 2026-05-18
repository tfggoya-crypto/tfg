<div class="col-12 col-md-6 col-lg-4">

    <div class="row">

        <div class="col">

            <div class="card shadow-sm h-100 carta"
                 style="border-top: #34a853 4px solid;">

                <div class="card-body">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between mb-3">

                        <h5 class="fw-bold mb-3">
                            Edificios
                        </h5>

                        <div class="iconos"
                             style="background-color: #84da9b;">

                            <i class="bi bi-building-fill icono-edifico fs-5"></i>

                        </div>

                    </div>

                    <!-- DESCRIPCIÓN -->
                    <p class="text-muted">
                        Gestiona los edificios que tienes asignados.
                    </p>

                    <!-- LISTA -->
                    <ul class="list-group list-group-flush mb-3">

                        @foreach(auth()->user()->edificiosAdmin->take(3) as $edificio)

                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <span>
                                    {{ $edificio->nombre }}
                                </span>

                                <button
                                    class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edificioModal{{ $edificio->id }}">

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
                            data-bs-target="#edificiosModal">

                            Ver todos los edificios

                            <i class="bi bi-chevron-right"></i>

                        </button>

                        <button
                            type="button"
                            class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#crearEdificioModal">

                            Crear edificio

                            <i class="bi bi-plus-circle"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.partials.edificio.lista-edificios-modal')

@include('admin.partials.edificio.detalle-edificio-modal')

@include('admin.partials.edificio.crear-edificio-modal')

@include('admin.partials.edificio.modificar-edificio-modal')

@include('admin.partials.edificio.eliminar-edificio-modal')

<script src="{{ asset('js/admin/modificar.js') }}"></script>