@extends('layouts.app')

@section('title','Panel administrador')

@section('content')
<h3>Incidencias por edificio</h3>

@foreach($edificios as $edificio)
<div class="card p-3 mb-4">
    <h5>{{ $edificio->direccion }}</h5>

    <table class="table">
        @foreach($edificio->incidencias as $i)
        <tr>
            <td>{{ $i->descripcion }}</td>
            <td>{{ $i->usuario->nombre }} ({{ $i->usuario->piso }})</td>

            <td>
                <form method="POST" action="/admin/incidencia/{{ $i->id }}/prioridad">
                    @csrf
                    <select name="prioridad" onchange="this.form.submit()">
                        <option {{ $i->prioridad=='baja'?'selected':'' }}>baja</option>
                        <option {{ $i->prioridad=='media'?'selected':'' }}>media</option>
                        <option {{ $i->prioridad=='alta'?'selected':'' }}>alta</option>
                    </select>
                </form>
            </td>

            <td>
                <form method="POST" action="/admin/incidencia/{{ $i->id }}/estado">
                    @csrf
                    <select name="estado" onchange="this.form.submit()">
                        <option {{ $i->estado=='abierta'?'selected':'' }}>abierta</option>
                        <option {{ $i->estado=='en_progreso'?'selected':'' }}>en_progreso</option>
                        <option {{ $i->estado=='cerrada'?'selected':'' }}>cerrada</option>
                    </select>
                </form>
            </td>

            <td>
                <a href="/admin/incidencia/{{ $i->id }}" class="btn btn-sm btn-primary">Ver</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endforeach
@endsection
