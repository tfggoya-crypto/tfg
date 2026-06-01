<div class="col-12 col-md-6 col-lg-4">
    <div class="card shadow-sm h-100 carta" style="border-top: #eb4536 4px solid;">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h5 class="fw-bold mb-3">Mis Incidencias</h5>
                <div class="iconos" style="background-color: #eb8278;">
                    <i class="bi bi-exclamation-circle-fill fs-5 icono-incidencia"></i>
                </div>
            </div>

            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Total de incidencias:</span>
                    <span class="badge bg-danger rounded-pill">
                        {{ $incidencias->count() }}
                    </span>
                </li>
            </ul>

            <hr>

            <div class="d-flex justify-content-center align-items-center">
                <div class="mb-3">
                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalIncidencias">
                        Ver mis incidencias
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="mb-3">
                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalNuevaIncidencia">
                        Crear incidencia
                        <i class="bi bi-plus-circle"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>