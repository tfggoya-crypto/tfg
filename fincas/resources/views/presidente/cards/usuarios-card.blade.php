<div class="col-md-4">
    <div class="card shadow-sm h-100 carta" style="border-top: #34a853 4px solid;">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h5 class="fw-bold mb-3">Usuarios del edificio</h5>
                <div class="iconos" style="background-color: #84da9b;">
                    <i class="bi bi-people-fill fs-5 icono-edifico"></i>
                </div>
            </div>

            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Vecinos</span>
                    <span class="badge bg-primary rounded-pill">{{ $vecinos }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Empleados</span>
                    <span class="badge bg-warning rounded-pill">{{ $empleados }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Presidentes</span>
                    <span class="badge bg-success rounded-pill">{{ $presidentes }}</span>
                </li>
            </ul>

            <hr>

            <div class="d-flex justify-content-center align-items-center">
                <div class="mb-3">
                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuarios">
                        Ver usuarios del edificio
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>