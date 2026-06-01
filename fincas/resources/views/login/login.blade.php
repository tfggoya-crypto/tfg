@extends('layouts.app')

@section('title','Login')

@section('content')
<style>
    .reveal-from-top {
        animation: revealFromTop .7s cubic-bezier(.2, .8, .2, 1) both;
    }

    .reveal-delay-1 {
        animation-delay: .08s;
    }

    .reveal-delay-2 {
        animation-delay: .2s;
    }

    .reveal-delay-3 {
        animation-delay: .28s;
    }

    @keyframes revealFromTop {
        from {
            opacity: 0;
            transform: translateY(-28px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .reveal-from-top {
            animation: none;
        }
    }

    .btn-acceder {
        background-color: #212529;
        color: #fff;
        transition: background-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
    }

    .btn-acceder:hover {
        background-color: #3a4046;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(33, 37, 41, 0.25);
    }

    @media (max-width: 767px){

        .img-login{
            height: 250px;
        }

        h1.display-4{
            font-size: 2rem;
            text-align: center;
        }

        p.lead{
            text-align: center;
            margin-bottom: 2rem !important;
        }

        .card{
            margin-top: 1rem;
        }
    }
</style>
<div class="row justify-content-center gx-lg-5 gy-4">
    <div class="col-12 col-lg-8">
        <div class="d-flex flex-column align-items-center justify-content-center h-100">


            <h1 class="display-4 fw-bold text-secondary mb-3 reveal-from-top reveal-delay-1">Bienvenido a Fincapp</h1>

            <p class="lead text-muted mb-5 reveal-from-top reveal-delay-2">Tu plataforma de gestión de fincas eficiente y fácil de usar</p>

            <img src="/assets/imagen_fynkoo.png" class="d-block w-100 rounded-4 reveal-from-top reveal-delay-3" style="height: 500px; object-fit: cover;" alt="imglogin">

        </div>

    </div>


    <div class="col-12 col-lg-4 ">
            



        <div class="card border-0 shadow-lg rounded-5 p-4 reveal-from-top reveal-delay-3" style="width: 100%; max-width: 520px; height: 100%; margin: 0 auto;" >

            <div class="card-body">
                <h1 class="text-center fw-bold display-5 mb-5" style="color:#212529;">Iniciar sesión</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color:#212529;">Usuario</label>

                        <div class="input-group">

                            <input type="text" class="form-control" name="username" value="{{ old('username', request()->cookie('remember_username')) }}" required>

                            <span class="input-group-text bg-white">
                                <i class="bi bi-person-fill"></i>
                            </span>

                        </div>
                        @error('username')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color:#212529;">Contraseña</label>

                        <div class="input-group">

                        <input type="password" class="form-control border-end-0" placeholder="********" name="password" id="password" required>

                        <button type="button" class="input-group-text bg-white border-start-0" id="togglePassword" style="cursor:pointer;">
                            <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                        </button>

                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember_user" id="remember_user" {{ request()->cookie('remember_username') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember_user">
                            Recordar usuario
                        </label>

                    </div>

                    <div class="d-grid mb-5">
                        <button class="btn btn-acceder rounded-pill py-3 fs-5 fw-semibold">Acceder</button>
                    </div>
                </form>

                <div class="text-center">

                    <h5 class="fw-bold text-secondary">Síguenos en nuestras redes</h5>

                    <p class="text-muted small">No te pierdas las últimas novedades y actualizaciones</p>

                    <div class="d-flex justify-content-center gap-3 mt-3">

                        <a href="#" class="btn btn-primary rounded-circle">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="#" class="btn btn-danger rounded-circle">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="#" class="btn btn-primary rounded-circle">
                            <i class="bi bi-linkedin"></i>
                        </a>

                        <a href="#" class="btn btn-secondary rounded-circle">
                            <i class="bi bi-globe"></i>
                        </a>

                        <a href="#" class="btn btn-danger rounded-circle">
                            <i class="bi bi-youtube"></i>
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('togglePasswordIcon');

        if (passwordInput && toggleButton && toggleIcon) {
            toggleButton.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                toggleIcon.classList.toggle('bi-eye');
                toggleIcon.classList.toggle('bi-eye-slash');
            });
        }
    });
</script>
@endsection
