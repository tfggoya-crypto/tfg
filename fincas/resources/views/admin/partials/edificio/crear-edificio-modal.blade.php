<!-- MODAL CREAR EDIFICIO -->
<div class="modal fade"
     id="crearEdificioModal"
     tabindex="-1"
     aria-labelledby="crearEdificioModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">

                <h5 class="modal-title fw-bold"
                    id="crearEdificioModalLabel">

                    Crear edificio

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- FORM -->
            <form action="{{ route('edificios.store') }}"
                  method="POST">

                @csrf

                <div class="modal-body">

                    <!-- NOMBRE -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nombre
                        </label>

                        <input type="text"
                               name="nombre"
                               class="form-control"
                               required>

                    </div>

                    <!-- DIRECCIÓN -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Dirección
                        </label>

                        <input type="text"
                               name="direccion"
                               class="form-control"
                               required>

                    </div>

                    <!-- CIUDAD -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Ciudad
                        </label>

                        <input type="text"
                               name="ciudad"
                               class="form-control"
                               required>

                    </div>

                    <!-- CÓDIGO POSTAL -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Código Postal
                        </label>

                        <input type="text"
                               name="codigo_postal"
                               class="form-control"
                               required>

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

                        Crear edificio

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>