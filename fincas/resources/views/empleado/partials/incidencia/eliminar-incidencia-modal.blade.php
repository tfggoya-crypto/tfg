<div class="modal fade" id="modalEliminarIncidencia" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Eliminar incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p id="textoEliminarIncidencia" class="mb-0">¿Estás seguro de eliminar esta incidencia?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <form method="POST" id="formEliminarIncidencia" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>