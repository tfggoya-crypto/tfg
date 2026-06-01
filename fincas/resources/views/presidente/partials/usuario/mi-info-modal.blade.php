<div class="modal fade" id="modalMiInfo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Mis datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                @php $user = auth()->user(); @endphp

                <p><strong>Nombre:</strong><br>{{ $user->nombre }}</p>
                <p><strong>Username:</strong><br>{{ $user->username }}</p>
                <p><strong>Email:</strong><br>{{ $user->email }}</p>

                <hr>

                <p>
                    <strong>Rol:</strong>&nbsp;
                    <span class="badge bg-success">Presidente</span>
                </p>

                @if($user->propietarioPerfil)
                    <hr>
                    <p><strong>DNI:</strong><br>{{ $user->propietarioPerfil->dni }}</p>
                    <p><strong>Teléfono:</strong><br>{{ $user->propietarioPerfil->telefono }}</p>
                    <p><strong>Nº vivienda:</strong><br>{{ $user->propietarioPerfil->numero_vivienda }}</p>
                @endif

                @if($edificio)
                    <hr>
                    <p><strong>Edificio:</strong><br>{{ $edificio->nombre }}</p>
                    <p class="text-muted small mb-0">
                        {{ $edificio->direccion }}, {{ $edificio->ciudad }}
                        (CP {{ $edificio->codigo_postal }})
                    </p>
                @endif

                <hr>

                <button class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalCambiarPasswordPresidente">
                    Cambiar contraseña
                </button>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>