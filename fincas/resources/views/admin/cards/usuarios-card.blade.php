<div class="col-12 col-md-6 col-lg-4">

    <div class="row">

        <div class="col">

            <div class="card shadow-sm h-100 carta"
                 style="border-top: #4287f5 4px solid;">

                <div class="card-body">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between mb-3">

                        <h5 class="fw-bold mb-3">
                            Usuarios
                        </h5>

                        <div class="iconos"
                             style="background-color: #8cb5f7;">

                            <i class="bi bi-person-circle fs-5 icono-user"></i>

                        </div>

                    </div>

                    <!-- DESCRIPCIÓN -->
                    <p class="text-muted">
                        Gestión de usuarios de tus edificios.
                    </p>

                    <!-- ESTADÍSTICAS -->
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

                    <hr>

                    <!-- BOTONES -->
                    <div class="d-flex flex-column gap-2">

                        <button
                            class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#usuariosModal">

                            Lista de usuarios

                            <i class="bi bi-chevron-right"></i>

                        </button>

                        <button
                            class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#crearUsuarioModal">

                            Crear usuario

                            <i class="bi bi-plus-circle"></i>

                        </button>

                    </div>

                </div>

            </div>

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