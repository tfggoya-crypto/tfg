@foreach(auth()->user()->edificiosAdmin as $edificio)

<div class="modal fade"
     id="editarEdificioModal{{ $edificio->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    Editar edificio
                </h5>

                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form action="{{ route('edificios.update', $edificio->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <!-- NOMBRE -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">Nombre</label>

                        <div class="input-group">

                            <input type="text"
                                   name="nombre"
                                   value="{{ $edificio->nombre }}"
                                   class="form-control"
                                   id="nombre{{ $edificio->id }}"
                                   disabled>

                            <button type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="toggleField('nombre{{ $edificio->id }}')">
                                Modificar
                            </button>

                        </div>

                    </div>

                    <!-- DIRECCION -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">Dirección</label>

                        <div class="input-group">

                            <input type="text"
                                   name="direccion"
                                   value="{{ $edificio->direccion }}"
                                   class="form-control"
                                   id="direccion{{ $edificio->id }}"
                                   disabled>

                            <button type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="toggleField('direccion{{ $edificio->id }}')">
                                Modificar
                            </button>

                        </div>

                    </div>

                    <!-- CIUDAD -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">Ciudad</label>

                        <div class="input-group">

                            <input type="text"
                                   name="ciudad"
                                   value="{{ $edificio->ciudad }}"
                                   class="form-control"
                                   id="ciudad{{ $edificio->id }}"
                                   disabled>

                            <button type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="toggleField('ciudad{{ $edificio->id }}')">
                                Modificar
                            </button>

                        </div>

                    </div>

                    <!-- CP -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">Código Postal</label>

                        <div class="input-group">

                            <input type="text"
                                   name="codigo_postal"
                                   value="{{ $edificio->codigo_postal }}"
                                   class="form-control"
                                   id="cp{{ $edificio->id }}"
                                   disabled>

                            <button type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="toggleField('cp{{ $edificio->id }}')">
                                Modificar
                            </button>

                        </div>

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
                        Guardar cambios
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach