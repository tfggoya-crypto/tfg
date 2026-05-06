@foreach(auth()->user()->edificiosAdmin as $edificio)

<div class="modal fade"
     id="eliminarEdificioModal{{ $edificio->id }}"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">
                    Eliminar edificio
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p>
                    ¿Estás seguro de que quieres eliminar
                    <strong>{{ $edificio->nombre }}</strong>?
                </p>

                <p class="text-danger small">
                    Esta acción no se puede deshacer.
                </p>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancelar
                </button>

                <form action="{{ route('edificios.destroy', $edificio->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">
                        Eliminar
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endforeach