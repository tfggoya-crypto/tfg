@extends('layouts.welcomeLayout')

@section('title','Acerca de')

@section('content')

<style>
    .reveal-from-top {
        animation: revealFromTop .7s cubic-bezier(.2, .8, .2, 1) both;
    }

    .reveal-delay-1 {
        animation-delay: .08s;
    }

    .reveal-delay-2 {
        animation-delay: .18s;
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

    .review-card {
        border: 0;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .08);
    }

    .review-avatar {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        overflow: hidden;
        background: #e5e7eb;
        flex: 0 0 auto;
    }

    .review-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .review-stars {
        color: #f5b301;
        letter-spacing: 1px;
        font-size: 1.05rem;
    }
</style>

<div class="row bg-light py-5 text-center reveal-from-top reveal-delay-1">
    <div class="col container d-flex flex-column justify-content-center text-center">
        <h1 class="display-5 fw-bold">Sobre nosotros</h1>
        <p class="lead mt-3 ">Somos los cofundadores de esta plataforma de gestión de comunidades.
        Nuestra historia comenzó cuando, desde distintos ámbitos profesionales,
        detectamos los mismos problemas en la administración de comunidades de vecinos:
        falta de comunicación, procesos poco eficientes y escasa transparencia.</p>
    </div>
    <div class="col container">
        <img src="/assets/img_acercade1.png" class="img-fluid rounded mx-auto d-block" alt="Imagen1">
    </div>
</div>

<div class="row bg-light py-5 text-center mt-3 reveal-from-top reveal-delay-2">   
    <div class="col container">
        <img src="/assets/img_acercade2.png" class="img-fluid rounded mx-auto d-block" alt="Imagen2">
    </div>

    <div class="col container d-flex flex-column justify-content-center text-center">
        <p class="lead mt-3 ">Tras unir nuestra experiencia, decidimos crear una solución digital que
        simplificara la gestión diaria y mejorara la convivencia entre vecinos.
        Así nació nuestra plataforma..</p>
    </div>
</div>

<div class="row bg-light py-5 mt-3 reveal-from-top reveal-delay-3">
    <div class="col-12 text-center mb-4">
        <h2 class="fw-bold">Valoraciones de usuarios</h2>
        <p class="text-secondary mb-0">Opiniones anónimas sobre la experiencia con la plataforma</p>
    </div>

    <div class="col-md-4 mb-4 mb-md-0">
        <div class="card review-card h-100 p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="review-avatar">
                    <img src="/assets/avatar_usuarios.png" alt="Avatar de usuario">
                </div>
                <div>
                    <h3 class="h6 mb-1 fw-bold">Usuario anónimo</h3>
                    <div class="review-stars" aria-label="5 estrellas">★★★★★</div>
                </div>
            </div>
            <p class="mb-0 text-secondary">La comunicación con la administración ahora es mucho más rápida y clara. Muy satisfecho con la plataforma.</p>
        </div>
    </div>

    <div class="col-md-4 mb-4 mb-md-0">
        <div class="card review-card h-100 p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="review-avatar">
                    <img src="/assets/avatar_usuarios.png" alt="Avatar de usuario">
                </div>
                <div>
                    <h3 class="h6 mb-1 fw-bold">Usuario anónimo</h3>
                    <div class="review-stars" aria-label="5 estrellas">★★★★★</div>
                </div>
            </div>
            <p class="mb-0 text-secondary">Me gusta mucho poder consultar incidencias y avisos desde un mismo sitio. Ahorra tiempo y problemas.</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card review-card h-100 p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="review-avatar">
                    <img src="/assets/avatar_usuarios.png" alt="Avatar de usuario">
                </div>
                <div>
                    <h3 class="h6 mb-1 fw-bold">Usuario anónimo</h3>
                    <div class="review-stars" aria-label="5 estrellas">★★★★★</div>
                </div>
            </div>
            <p class="mb-0 text-secondary">Interfaz sencilla, moderna y muy intuitiva. La gestión de la comunidad se siente más profesional.</p>
        </div>
    </div>
</div>

@endsection
