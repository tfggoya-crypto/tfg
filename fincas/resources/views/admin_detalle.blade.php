@extends('layouts.app')

@section('title','Detalle incidencia')

@section('content')
<div class="card p-4 mb-3">
    <h4>{{ $incidencia->descripcion }}</h4>
    <p><strong>Vecino:</strong> {{ $incidencia->usuario->nombre }}</p>
</div>

<h5>Comentarios</h5>

@foreach($incidencia->comentarios as $c)
<div class="card p-2 mb-2">
    <strong>{{ $c->usuario->nombre }}</strong>
    <p>{{ $c->texto }}</p>
</div>
@endforeach

<form method="POST" action="/admin/incidencia/{{ $incidencia->id }}/comentario">
    @csrf
    <textarea name="texto" class="form-control mb-2" required></textarea>
    <button class="btn btn-primary">Añadir comentario</button>
</form>
@endsection
