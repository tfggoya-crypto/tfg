<div class="col-md-4">
    <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column">

            <h5 class="fw-bold mb-3">Incidencias del edificio</h5>

            <p class="text-muted small">
                Consulta todas las incidencias reportadas en tu comunidad.
            </p>

            @if($incidencias->count() > 0)
                <ul class="list-group list-group-flush mb-3">
                    @foreach($incidencias->take(3) as $inc)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div>
                                <span class="fw-semibold small">{{ $inc->titulo }}</span><br>
                                <small class="text-muted">{{ $inc->user->nombre ?? '—' }}</small>
                            </div>
                            @if($inc->estado === 'pendiente')
                                <span class="badge" style="background:#F59E0B;">Pendiente</span>
                            @elseif($inc->estado === 'en_proceso')
                                <span class="badge" style="background:#3B82F6;">En proceso</span>
                            @else
                                <span class="badge" style="background:#10B981;">Resuelta</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted small">No hay incidencias registradas.</p>
            @endif

            <button class="btn btn-primary w-100 mt-auto"
                    data-bs-toggle="modal"
                    data-bs-target="#modalIncidencias">
                Ver todas las incidencias
                @if($incidencias->count() > 0)
                    <span class="badge bg-light text-dark ms-1">{{ $incidencias->count() }}</span>
                @endif
            </button>

        </div>
    </div>
</div>