@extends('layouts.app')

@section('title', 'Mis edificios')

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">Edificios que administras</h2>

    @if($edificios->isEmpty())
        <div class="alert alert-info">
            No tienes edificios asignados todavía.
        </div>
    @else

        <div class="row">

            @foreach($edificios as $edificio)

                <div class="col-md-4 mb-3">

                    <a href="{{ route('edificios.show', $edificio->id) }}"
                       class="text-decoration-none">

                        <div class="card h-100 shadow-sm border-0 hover-card">

                            <div class="card-body">

                                <h5 class="card-title fw-bold">
                                    {{ $edificio->nombre }}
                                </h5>

                                <p class="mb-1 text-muted">
                                    📍 {{ $edificio->ciudad }}
                                </p>

                                <p class="mb-1">
                                    {{ $edificio->direccion }}
                                </p>

                                <small class="text-muted">
                                    CP: {{ $edificio->codigo_postal }}
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection