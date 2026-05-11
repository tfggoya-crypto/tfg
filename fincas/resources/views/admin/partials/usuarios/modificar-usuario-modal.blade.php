@foreach(auth()->user()->edificiosAdmin as $edificio)

    @foreach($edificio->users as $usuario)

        <div class="modal fade"
             id="editarUsuarioModal{{ $usuario->id }}"
             tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header">

                        <h5 class="modal-title">
                            Editar usuario
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <!-- FORM -->
                    <form method="POST"
                          action="{{ route('users.update', $usuario->id) }}">

                        @csrf
                        @method('PUT')

                        <div class="modal-body">

                            <!-- NOMBRE -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">Nombre</label>

                                <input type="text"
                                       name="nombre"
                                       value="{{ $usuario->nombre }}"
                                       class="form-control">

                            </div>

                            <!-- EMAIL -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">Email</label>

                                <input type="email"
                                       name="email"
                                       value="{{ $usuario->email }}"
                                       class="form-control">

                            </div>

                            <hr>

                            <!-- PERFIL -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Tipo de usuario
                                </label>

                                <select class="form-select"
                                        data-user-id="{{ $usuario->id }}"
                                        onchange="setUserRole(this)">

                                    <option value="">Selecciona perfil</option>

                                    <option value="propietario|vecino"
                                        @selected($usuario->role=='propietario' && $usuario->subrole=='vecino')>
                                        Vecino
                                    </option>

                                    <option value="propietario|presidente"
                                        @selected($usuario->role=='propietario' && $usuario->subrole=='presidente')>
                                        Presidente
                                    </option>

                                    <option value="empleado|conserje"
                                        @selected($usuario->role=='empleado' && $usuario->subrole=='conserje')>
                                        Conserje
                                    </option>

                                    <option value="empleado|jardinero"
                                        @selected($usuario->role=='empleado' && $usuario->subrole=='jardinero')>
                                        Jardinero
                                    </option>

                                    <option value="empleado|limpieza"
                                        @selected($usuario->role=='empleado' && $usuario->subrole=='limpieza')>
                                        Limpieza
                                    </option>

                                </select>

                            </div>

                            <!-- HIDDEN INPUTS -->
                            <input type="hidden"
                                   name="role"
                                   id="role-{{ $usuario->id }}"
                                   value="{{ $usuario->role }}">

                            <input type="hidden"
                                   name="subrole"
                                   id="subrole-{{ $usuario->id }}"
                                   value="{{ $usuario->subrole }}">

                        </div>

                        <!-- FOOTER -->
                        <div class="modal-footer">

                            <button class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button class="btn btn-success">
                                Guardar cambios
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

@endforeach