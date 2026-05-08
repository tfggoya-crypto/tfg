@foreach(auth()->user()->edificiosAdmin as $edificio)

    @foreach($edificio->users as $usuario)

        <div class="modal fade"
             id="userModal{{ $usuario->id }}"
             tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header">

                        <h5 class="modal-title fw-bold">
                            Detalle de usuario
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <!-- BODY -->
                    <div class="modal-body">

                        <p>
                            <strong>ID:</strong><br>
                            {{ $usuario->id }}
                        </p>

                        <p>
                            <strong>Nombre:</strong><br>
                            {{ $usuario->nombre }}
                        </p>

                        <p>
                            <strong>Username:</strong><br>
                            {{ $usuario->username }}
                        </p>

                        <p>
                            <strong>Email:</strong><br>
                            {{ $usuario->email }}
                        </p>

                        <hr>

                        <p>
                            <strong>Rol:</strong><br>
                            <span class="badge bg-primary">
                                {{ $usuario->role }}
                            </span>
                        </p>

                        <p>
                            <strong>Subrol:</strong><br>
                            <span class="badge bg-secondary">
                                {{ $usuario->subrole ?? 'Sin subrol' }}
                            </span>
                        </p>

                        <hr>

                        <p>
                            <strong>Edificio:</strong><br>
                            {{ $edificio->nombre }}
                        </p>

                        <p class="text-muted mb-0">
                            {{ $edificio->direccion }} · {{ $edificio->ciudad }}
                        </p>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">

                        <!-- CERRAR -->
                        <button class="btn btn-secondary"
                                data-bs-dismiss="modal">

                            Cerrar

                        </button>

                        <!-- EDITAR -->
                        <button type="button"
                                class="btn btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editarUsuarioModal{{ $usuario->id }}"
                                data-bs-dismiss="modal">

                            Editar

                        </button>

                        <!-- ELIMINAR -->
                        <button type="button"
                                class="btn btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#eliminarUsuarioModal{{ $usuario->id }}"
                                data-bs-dismiss="modal">

                            Eliminar

                        </button>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

@endforeach