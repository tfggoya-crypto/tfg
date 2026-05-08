<div class="col-md-4">

    <div class="card shadow-sm h-100">

        <div class="card-body">

            <h5 class="fw-bold mb-3">Usuarios</h5>

            <p class="text-muted">
                Gestión de usuarios de tus edificios.
            </p>


            <div class="mb-3 p-3 border rounded bg-light">

                <div class="d-flex justify-content-between mb-2">

                    <span>Empleados</span>

                    <span class="badge bg-warning">
                        {{ $empleados ?? 0 }}
                    </span>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <span>Vecinos</span>

                    <span class="badge bg-primary">
                        {{ $vecinos ?? 0 }}
                    </span>

                </div>

                <div class="d-flex justify-content-between">

                    <span>Presidentes</span>

                    <span class="badge bg-success">
                        {{ $presidentes ?? 0 }}
                    </span>

                </div>

            </div>

            <!-- BOTONES -->
            <button class="btn btn-primary w-100 mb-3"
                    data-bs-toggle="modal"
                    data-bs-target="#usuariosModal">

                Lista de Usuarios

            </button>

            <button class="btn btn-success w-100"
                    data-bs-toggle="modal"
                    data-bs-target="#crearUsuarioModal">

                Crear usuario

            </button>

        </div>

    </div>

</div>

@include('admin.partials.usuarios.lista-usuario-modal')

@include('admin.partials.usuarios.detalle-usuario-modal')

@include('admin.partials.usuarios.eliminar-usuario-modal')

@include('admin.partials.usuarios.modificar-usuario-modal')

@include('admin.partials.usuarios.crear-usuario-modal')

<script src="{{ asset('js/admin/filtros-usuarios.js') }}"></script>

<script src="{{ asset('js/admin/modificar-user.js') }}"></script>