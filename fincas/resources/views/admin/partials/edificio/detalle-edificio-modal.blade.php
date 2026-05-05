@foreach(auth()->user()->edificiosAdmin as $edificio)

<div class="modal fade"
     id="edificioModal{{ $edificio->id }}"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">

                <h5 class="modal-title">
                    Detalles del edificio
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <p>
                    <strong>ID:</strong>
                    {{ $edificio->id }}
                </p>

                <p>
                    <strong>Nombre:</strong>
                    {{ $edificio->nombre }}
                </p>

                <p>
                    <strong>Dirección:</strong>
                    {{ $edificio->direccion }}
                </p>

                <p>
                    <strong>Código Postal:</strong>
                    {{ $edificio->codigo_postal }}
                </p>

                <p>
                    <strong>Ciudad:</strong>
                    {{ $edificio->ciudad }}
                </p>

                <hr>

                <h6 class="fw-bold mb-3">
                    Administradores asignados
                </h6>

                @foreach($edificio->admins as $admin)

                    <div class="mb-3">

                        <p class="mb-1">
                            <strong>Nombre:</strong>
                            {{ $admin->nombre }}
                        </p>

                        <p class="mb-0">
                            <strong>Email:</strong>
                            {{ $admin->email }}
                        </p>

                    </div>

                @endforeach

            </div>

            <!-- FOOTER -->
           <div class="modal-footer d-flex gap-2">

                <button class="btn btn-secondary w-30"
                        data-bs-dismiss="modal">
                    Cerrar
                </button>

                <button type="button"
                        class="btn btn-warning w-30"
                        data-bs-toggle="modal"
                        data-bs-target="#editarEdificioModal{{ $edificio->id }}"
                        data-bs-dismiss="modal">
                    Editar
                </button>

                <button type="button"
                        class="btn btn-danger w-30"
                        data-bs-toggle="modal"
                        data-bs-target="#eliminarEdificioModal{{ $edificio->id }}"
                        data-bs-dismiss="modal">
                    Eliminar
                </button>

            </div>

        </div>

    </div>

</div>

@endforeach