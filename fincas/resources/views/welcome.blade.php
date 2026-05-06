@extends('layouts.welcomeLayout')

@section('title','Inicio')

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
</style>

<div class="row bg-light py-5 text-center reveal-from-top reveal-delay-1">
    <div class="col container">
        <h1 class="display-5 fw-bold">Software de Administración para comunidades de vecinos</h1>
        <p class="lead mt-3">Nos dedicamos a proporcionar soluciones eficientes para la gestión de comunidades de vecinos.</p>
    </div>
</div>

<div class="row reveal-from-top reveal-delay-2">
    <div class="col">
                <div id="carouselExample" class="carousel slide w-75 mx-auto carousel-rounded" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/img_carrusel1.png" class="d-block w-100" style="height: 500px;" alt="img1">
                </div>
                <div class="carousel-item">
                    <img src="/assets/img_carrusel2.png" class="d-block w-100" style="height: 500px;" alt="img2">
                </div>
                <div class="carousel-item">
                    <img src="/assets/img_carrusel3.png" class="d-block w-100" style="height: 500px;" alt="img3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

@endsection
