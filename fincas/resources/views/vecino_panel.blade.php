@extends('layouts.app')

@section('title','Mis incidencias')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Mis incidencias</h3>
    <a href="/vecino/incidencia/nueva" class="btn btn-success">+ Nueva incidencia</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($incidencias as $i)
        <tr>
            <td>{{ $i->descripcion }}</td>
            <td>{{ ucfirst($i->prioridad) }}</td>
            <td>{{ ucfirst($i->estado) }}</td>
            <td>{{ $i->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="/vecino/incidencia/{{ $i->id }}" class="btn btn-sm btn-primary">
                    Ver
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
