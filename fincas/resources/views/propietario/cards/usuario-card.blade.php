<div class="col-md-4">
    <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">

            <h5 class="fw-bold mb-3">Mi información</h5>

            <p class="text-muted small">
                Consulta y gestiona tus datos personales.
            </p>

            <div class="mb-3 p-3 border rounded bg-light small">
                <div class="mb-1">
                    <strong>Usuario:</strong> {{ auth()->user()->username }}
                </div>
                <div class="mb-1">
                    <strong>Email:</strong> {{ auth()->user()->email }}
                </div>
                <div>
                    <strong>Rol:</strong>
                    <span class="badge bg-primary">Vecino</span>
                </div>
            </div>

            <button class="btn btn-primary w-100 mt-auto"
                    data-bs-toggle="modal"
                    data-bs-target="#modalUsuario">
                Ver mi información
            </button>

        </div>
    </div>
</div>