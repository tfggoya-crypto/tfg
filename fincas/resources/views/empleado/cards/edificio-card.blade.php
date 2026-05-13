<!-- TARJETA 1: EDIFICIO -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta" style="border-top: #34a853 4px solid;">

                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-3">Edificio</h5>
                                <div class="iconos" style="background-color: #84da9b;">  
                                    <i class="bi bi-building-fill icono-edifico fs-5"></i>
                                </div>
                            </div>

                            

                            @if(auth()->user()->edificio)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ auth()->user()->edificio->nombre }} -
                                        {{ auth()->user()->edificio->direccion }}
                                    </li>
                                </ul>

                                <hr>
                                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdificio">

                                    Ver Detalles
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                                </div>
                                
                                

                            @else
                                <p>No tienes edificio asignado</p>
                            @endif
                        </div>
                    </div>
                </div>
            
            </div>

            

        </div>