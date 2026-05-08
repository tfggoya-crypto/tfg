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

                                <label class="form-label fw-bold">
                                    Nombre
                                </label>

                                <div class="d-flex gap-2">

                                    <input type="text"
                                           id="nombre-{{ $usuario->id }}"
                                           name="nombre"
                                           value="{{ $usuario->nombre }}"
                                           class="form-control"
                                           disabled>

                                    <button type="button"
                                            class="btn btn-outline-primary"
                                            onclick="toggleField('nombre-{{ $usuario->id }}')">

                                        Modificar

                                    </button>

                                </div>

                            </div>

                            <!-- EMAIL -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Email
                                </label>

                                <div class="d-flex gap-2">

                                    <input type="email"
                                           id="email-{{ $usuario->id }}"
                                           name="email"
                                           value="{{ $usuario->email }}"
                                           class="form-control"
                                           disabled>

                                    <button type="button"
                                            class="btn btn-outline-primary"
                                            onclick="toggleField('email-{{ $usuario->id }}')">

                                        Modificar

                                    </button>

                                </div>

                            </div>

                            <hr>

                            <!-- PERFIL (ROLE + SUBROLE) -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Tipo de usuario
                                </label>

                                <select name="perfil"
                                        class="form-select"
                                        onchange="setUserRole(this, {{ $usuario->id }})">

                                    <option value="">
                                        Selecciona perfil
                                    </option>

                                    <option value="propietario|vecino"
                                        @if($usuario->role=='propietario' && $usuario->subrole=='vecino') selected @endif>
                                        Vecino
                                    </option>

                                    <option value="propietario|presidente"
                                        @if($usuario->role=='propietario' && $usuario->subrole=='presidente') selected @endif>
                                        Presidente
                                    </option>

                                    <option value="empleado|conserje"
                                        @if($usuario->role=='empleado' && $usuario->subrole=='conserje') selected @endif>
                                        Conserje
                                    </option>

                                    <option value="empleado|jardinero"
                                        @if($usuario->role=='empleado' && $usuario->subrole=='jardinero') selected @endif>
                                        Jardinero
                                    </option>

                                    <option value="empleado|limpieza"
                                        @if($usuario->role=='empleado' && $usuario->subrole=='limpieza') selected @endif>
                                        Limpieza
                                    </option>

                                </select>

                            </div>

                            <!-- CAMPOS OCULTOS -->
                            <input type="hidden" name="role" id="role-{{ $usuario->id }}">
                            <input type="hidden" name="subrole" id="subrole-{{ $usuario->id }}">

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