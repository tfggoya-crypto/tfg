@extends('layouts.app')

@section('title','Panel de Tecnico')

@section('content')

<link rel="stylesheet" href="{{ asset('css/empleado/dashboard.css') }}">

<div class="container py-4">
    <h2 class="mb-4 fw-bold">Bienvenido, {{ auth()->user()->nombre }}</h2>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row g-4">

        <!-- TARJETA 1: CONSULTAS -->
        <div class="col-12 col-md-6 col-lg-3">

            <div class="card shadow-sm h-100 carta" style="border-top: #4287f5 4px solid;">

                <div class="card-body d-flex flex-column">

                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-bold mb-0">Consultas</h5>
                        <div class="iconos" style="background-color: #8cb5f7;">
                            <i class="bi bi-question-circle fs-5 icono-user"></i>
                        </div>
                    </div>

                    @if($consultas->count() > 0)

                        <ul class="list-group list-group-flush mb-3">
                            @foreach($consultas as $consulta)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $consulta->asunto }}
                                    <small class="text-muted">{{ $consulta->created_at?->format('d/m/Y') }}</small>
                                </li>
                            @endforeach
                        </ul>

                        <hr>

                        <div class="acciones-card mt-auto">
                            <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalCONSULTAS">
                                Ver consultas
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>

                    @else
                        <p class="mb-0">No hay consultas registradas.</p>
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


<!-- MODAL CONSULTAS -->
<div class="modal fade" id="modalCONSULTAS" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Consultas recibidas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                @if($consultas->count() > 0)

                    <ul class="list-group">
                        @foreach($consultas as $consulta)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                                    <strong>{{ $consulta->asunto }}</strong>
                                    <small class="text-muted">{{ $consulta->created_at?->format('d/m/Y H:i') }}</small>
                                </div>

                                <p class="mb-2">
                                    <strong>Nombre:</strong> {{ $consulta->nombre }} {{ $consulta->apellidos }}<br>
                                    <strong>Email:</strong> {{ $consulta->email }}<br>
                                    <strong>Teléfono:</strong> {{ $consulta->telefono ?? 'No indicado' }}<br>
                                    <strong>Tipo:</strong> {{ str_replace('_', ' ', $consulta->tipo_consulta) }}
                                </p>

                                <p class="mb-0">{{ $consulta->mensaje }}</p>
                            </li>
                        @endforeach
                    </ul>

                @else
                    <p class="mb-0">No hay consultas registradas.</p>
                @endif
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>



@endsection