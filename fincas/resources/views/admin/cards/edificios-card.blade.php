
        <div class="col-md-4">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Edificios</h5>

                    <p class="text-muted">
                        Gestiona los edificios que tienes asignados.
                    </p>

                    <!-- LISTA CORTA -->
                    <ul class="list-group list-group-flush mb-3">

                        @foreach(auth()->user()->edificiosAdmin->take(3) as $edificio)

                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <span>{{ $edificio->nombre }}</span>

                                <button
                                    class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edificioModal{{ $edificio->id }}">

                                    Ver

                                </button>

                            </li>

                        @endforeach

                    </ul>

                    <!-- BOTÓN MODAL -->
                    <button
                        type="button"
                        class="btn btn-primary w-100"
                        data-bs-toggle="modal"
                        data-bs-target="#edificiosModal">

                        Ver todos los edificios

                    </button>

                    <button
                        type="button"
                        class="btn btn-success w-100 mt-2"
                        data-bs-toggle="modal"
                        data-bs-target="#crearEdificioModal">

                        Crear edificio

                    </button>

                </div>

            </div>

        </div>

@include('admin.partials.edificio.lista-edificios-modal')

@include('admin.partials.edificio.detalle-edificio-modal')

@include('admin.partials.edificio.crear-edificio-modal')

@include('admin.partials.edificio.modificar-edificio-modal')

@include('admin.partials.edificio.eliminar-edificio-modal')

<script src="{{ asset('js/admin/modificar.js') }}"></script>