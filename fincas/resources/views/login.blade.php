@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card p-4">
            <h4 class="mb-3 text-center">Iniciar sesión</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
