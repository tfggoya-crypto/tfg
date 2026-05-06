@foreach(auth()->user()->edificiosAdmin as $edificio)

    @foreach($edificio->incidencias as $incidencia)

        <div class="modal fade"
             id="eliminarIncidenciaModal{{ $incidencia->id }}"
             tabindex="-1"
             aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header bg-danger text-white">

                        <h5 class="modal-title">
                            Eliminar incidencia
                        </h5>

                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <!-- BODY -->
                    <div class="modal-body">

                        <p>
                            ¿Estás seguro de que quieres eliminar la incidencia:
                            <strong>{{ $incidencia->titulo }}</strong>?
                        </p>

                        <p class="text-danger small">
                            Esta acción no se puede deshacer.
                        </p>

                        <hr>

                        <p class="mb-1">
                            <strong>Estado:</strong> {{ $incidencia->estado }}
                        </p>

                        <p class="mb-0">
                            <strong>Prioridad:</strong> {{ $incidencia->prioridad }}
                        </p>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">

                        <button class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <form action="{{ route('incidencias.destroy', $incidencia->id) }}"
                              method="POST">

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