<div class="col-12 col-md-6 col-lg-4">
    <div class="card shadow-sm h-100 carta" style="border-top: #4287f5 4px solid;">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h5 class="fw-bold mb-3">Mi información</h5>
                <div class="iconos" style="background-color: #8cb5f7;">
                    <i class="bi bi-person-circle fs-5 icono-user"></i>
                </div>
            </div>

            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ auth()->user()->nombre }} ({{ auth()->user()->username }})
                </li>
            </ul>

            <hr>

            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                <div class="mb-3">
                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuario">
                        Ver mi información
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>