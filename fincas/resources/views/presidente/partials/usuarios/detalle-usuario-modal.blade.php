@foreach($usuarios as $usr)
    <div class="modal fade" id="usuarioDetalle{{ $usr->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Detalle de usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <p><strong>Nombre:</strong><br>{{ $usr->nombre }}</p>
                    <p><strong>Username:</strong><br>{{ $usr->username }}</p>
                    <p><strong>Email:</strong><br>{{ $usr->email }}</p>

                    <hr>

                    <p>
                        <strong>Rol:</strong>&nbsp;
                        @if($usr->subrole === 'presidente')
                            <span class="badge bg-success">Presidente</span>
                        @elseif($usr->role === 'empleado')
                            <span class="badge bg-warning text-dark">Empleado</span>
                        @else
                            <span class="badge bg-primary">Vecino</span>
                        @endif
                    </p>

                    @if($usr->subrole && $usr->subrole !== 'presidente')
                        <p>
                            <strong>Subrole:</strong>&nbsp;
                            <span class="badge bg-secondary">{{ $usr->subrole }}</span>
                        </p>
                    @endif

                    @if($usr->propietarioPerfil)
                        <hr>
                        <p><strong>DNI:</strong><br>{{ $usr->propietarioPerfil->dni }}</p>
                        <p><strong>Teléfono:</strong><br>{{ $usr->propietarioPerfil->telefono }}</p>
                        <p><strong>Nº vivienda:</strong><br>{{ $usr->propietarioPerfil->numero_vivienda }}</p>
                    @endif

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button"
                            class="btn btn-outline-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuarios"
                            data-bs-dismiss="modal">
                        ← Volver a la lista
                    </button>
                </div>

            </div>
        </div>
    </div>
@endforeach