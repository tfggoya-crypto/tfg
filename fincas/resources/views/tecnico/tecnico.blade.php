@extends('layouts.app')

@section('title','Panel de Tecnico')

@section('content')


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
        <div class="col-md-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Consultas</h5>

                    @if($consultas->count() > 0)

                        <ul class="list-group list-group-flush mb-0">
                            @foreach($consultas as $consulta)
                                <li class="list-group-item px-0">
                                    {{ $consulta->asunto }}
                                </li>
                            @endforeach
                        </ul>

                        <button class="btn btn-primary mt-3"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCONSULTAS">
                            Ver consultas
                        </button>

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