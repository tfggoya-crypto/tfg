<div class="col-md-4">
    <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">

            <h5 class="fw-bold mb-3">Usuarios del edificio</h5>

            <p class="text-muted small">
                Consulta los vecinos y empleados de tu comunidad.
            </p>

            <div class="mb-3 p-3 border rounded bg-light">
                <div class="d-flex justify-content-between mb-2">
                    <span class="small">Vecinos</span>
                    <span class="badge bg-primary">{{ $vecinos }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="small">Empleados</span>
                    <span class="badge bg-warning">{{ $empleados }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="small">Presidentes</span>
                    <span class="badge bg-success">{{ $presidentes }}</span>
                </div>
            </div>

            <button class="btn btn-primary w-100 mt-auto"
                    data-bs-toggle="modal"
                    data-bs-target="#modalUsuarios">
                Ver usuarios del edificio
                @if($usuarios->count() > 0)
                    <span class="badge bg-light text-dark ms-1">{{ $usuarios->count() }}</span>
                @endif
            </button>

        </div>
    </div>
</div>