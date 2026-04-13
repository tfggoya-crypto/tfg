@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card p-4">
            <h4 class="mb-3 text-center">Iniciar sesión</h4>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
