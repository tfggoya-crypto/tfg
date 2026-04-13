@extends('layouts.app')

@section('title','Nueva incidencia')

@section('content')
<div class="card p-4">
    <h4>Nueva incidencia</h4>

    <form method="POST" action="/vecino/incidencia">
        @csrf

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Prioridad</label>
            <select name="prioridad" class="form-select">
                <option value="baja">Baja</option>
                <option value="media" selected>Media</option>
                <option value="alta">Alta</option>
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="/vecino" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
