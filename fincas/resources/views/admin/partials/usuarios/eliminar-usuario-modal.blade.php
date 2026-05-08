@foreach(auth()->user()->edificiosAdmin as $edificio)

    @foreach($edificio->users as $usuario)

        <div class="modal fade"
             id="eliminarUsuarioModal{{ $usuario->id }}"
             tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header bg-danger text-white">

                        <h5 class="modal-title">
                            Eliminar usuario
                        </h5>

                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <!-- BODY -->
                    <div class="modal-body">

                        <p>
                            ¿Estás seguro de que quieres eliminar al usuario
                            <strong>{{ $usuario->nombre }}</strong>?
                        </p>

                        <p class="text-danger small">
                            Esta acción no se puede deshacer.
                        </p>

                        <hr>

                        <p class="mb-0">
                            <strong>Email:</strong> {{ $usuario->email }}
                        </p>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">

                        <button class="btn btn-secondary"
                                data-bs-dismiss="modal">

                            Cancelar

                        </button>

                        <form method="POST"
                              action="{{ route('users.destroy', $usuario->id) }}">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger">

                                Eliminar

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

@endforeach