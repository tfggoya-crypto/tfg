<div class="modal fade" id="modalUsuario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Datos del Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <p><strong>Nombre:</strong> {{ auth()->user()->nombre }}</p>
                    <p><strong>Correo electrónico:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Rol:</strong> {{ auth()->user()->role }}</p>
                    <p><strong>Cargo:</strong> {{ auth()->user()->subrole }}</p>

                    <button class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCambiarPassword">

                        Cambiar contraseña

                    </button>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>