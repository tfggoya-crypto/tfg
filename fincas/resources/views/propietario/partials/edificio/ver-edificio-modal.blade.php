<div class="modal fade" id="modalEdificio" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detalles del edificio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                @if(auth()->user()->edificio)
                    <p><strong>Nombre:</strong> {{ auth()->user()->edificio->nombre }}</p>
                    <p><strong>Dirección:</strong> {{ auth()->user()->edificio->direccion }}</p>
                    <p><strong>Código Postal:</strong> {{ auth()->user()->edificio->codigo_postal }}</p>
                    <p><strong>Ciudad:</strong> {{ auth()->user()->edificio->ciudad }}</p>
                @endif
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>