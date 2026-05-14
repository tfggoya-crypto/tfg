<div class="modal fade"
     id="crearUsuarioModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">

                <h5 class="modal-title fw-bold">
                    Crear usuario
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('users.store') }}">

                @csrf

                <div class="modal-body">

                    <!-- NOMBRE -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Nombre
                        </label>

                        <input type="text"
                               name="nombre"
                               class="form-control"
                               required>

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                   <!-- PERFIL (ROLE + SUBROLE) -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Tipo de usuario
                        </label>

                        <select class="form-select"
                                id="perfilUsuario"
                                data-mode="create"
                                onchange="setUserRole(this)"
                                required>

                            <option value="">Selecciona un perfil</option>

                            <option value="propietario|vecino">Vecino</option>
                            <option value="propietario|presidente">Presidente</option>

                            <option value="empleado|conserje">Conserje</option>
                            <option value="empleado|jardinero">Jardinero</option>
                            <option value="empleado|limpieza">Limpieza</option>
                            <option value="empleado|otros">Otros</option>

                        </select>

                    </div>

                    <!-- CAMPOS OCULTOS -->
                    <input type="hidden" name="role" id="roleInput">
                    <input type="hidden" name="subrole" id="subroleInput">

                    <!-- EDIFICIO -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Edificio
                        </label>

                        <select name="edificio_id"
                                class="form-select"
                                required>

                            <option value="">
                                Selecciona un edificio
                            </option>

                            @foreach(auth()->user()->edificiosAdmin as $edificio)

                                <option value="{{ $edificio->id }}">
                                    {{ $edificio->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <button type="submit"
                            class="btn btn-success">

                        Crear usuario

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>