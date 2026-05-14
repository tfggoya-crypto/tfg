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

                @if(auth()->user()->propietarioPerfil)
                    <hr>
                    <p><strong>DNI:</strong> {{ auth()->user()->propietarioPerfil->dni }}</p>
                    <p><strong>Teléfono:</strong> {{ auth()->user()->propietarioPerfil->telefono }}</p>
                    <p><strong>Vivienda:</strong> {{ auth()->user()->propietarioPerfil->numero_vivienda }}</p>
                @endif

                <hr>

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