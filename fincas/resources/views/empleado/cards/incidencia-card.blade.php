<!-- TARJETA 2: INCIDENCIAS -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta" style="border-top: #eb4536 4px solid;">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-3">Incidencias</h5>
                                <div class="iconos" style="background-color: #eb8278;">
                                    <i class="bi bi-exclamation-circle-fill fs-5 icono-incidencia"></i>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Total de incidencias:</span>
                                        <span class="badge bg-danger rounded-pill">
                                            {{ auth()->user()->edificio ? auth()->user()->edificio->incidencias->count() : 0 }}
                                        </span>
                                    </li>
                            </ul>

                            <hr>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mb-3">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalIncidencias">

                                        Mostrar Incidencias
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>   
                            </div>
                            

                            <div class="d-flex justify-content-center align-items-center">
                               <div class="mb-3">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modaladdIncidencias">

                                        Agregar Incidencia

                                        <i class="bi bi-plus-circle"></i>
                                    </button>
                                </div> 
                            </div>
            

                        </div>

                    </div>
                </div>
            </div>

            

        </div>