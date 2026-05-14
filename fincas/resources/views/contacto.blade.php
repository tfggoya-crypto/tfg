@extends('layouts.welcomeLayout')

@section('title','Contacto')

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

    .contact-shell {
        max-width: 900px;
        margin: 0 auto;
    }

    .contact-card {
        border: 0;
        border-radius: 24px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, .08);
    }

    .stepper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0;
        margin: 1.25rem 0 2rem;
    }

    .stepper::before,
    .stepper::after {
        content: '';
        height: 4px;
        background: #e6e9ef;
        flex: 1;
        max-width: 120px;
        border-radius: 999px;
    }

    .stepper::before {
        margin-right: 14px;
    }

    .stepper::after {
        margin-left: 14px;
    }

    .step-dot {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        background: #e9edf3;
        color: #64748b;
        position: relative;
        z-index: 1;
        box-shadow: inset 0 0 0 4px #fff;
    }

    .step-dot.active {
        background: linear-gradient(135deg, #1f9f7a, #39c7c7);
        color: #fff;
    }

    .step-dot.completed {
        background: #188a57;
        color: #fff;
    }

    .step-panel {
        display: none;
    }

    .step-panel.active {
        display: block;
        animation: fadeIn .18s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: .4; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .consult-option {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 1rem 1.1rem;
        transition: all .2s ease;
        cursor: pointer;
        background: #fff;
    }

    .consult-option:hover {
        border-color: #9fe2e3;
        background: #f7ffff;
    }

    .consult-option .form-check-input {
        width: 1.15rem;
        height: 1.15rem;
        margin-top: .2rem;
        flex: 0 0 auto;
    }

    .consult-option.is-selected {
        background: #e9fbfb;
        border-color: #74e0e0;
        box-shadow: 0 0 0 3px rgba(72, 215, 215, .12);
    }

    .dropzone {
        border: 2px dashed #d6dbe6;
        border-radius: 18px;
        background: #fafbfd;
        padding: 2rem 1.25rem;
        text-align: center;
        transition: all .2s ease;
    }

    .dropzone:hover {
        border-color: #77dddd;
        background: #f5ffff;
    }

    .btn-step {
        min-height: 54px;
        border-radius: 12px;
        font-weight: 700;
    }

    .btn-next {
        background: linear-gradient(135deg, #49cbc8, #3eb1b2);
        border: 0;
        color: #fff;
    }

    .btn-next:hover {
        color: #fff;
        filter: brightness(.97);
    }

    .muted-note {
        color: #6b7280;
        font-size: .95rem;
    }
</style>

@if(session('success'))
    <div class="container pt-4">
        <div class="alert alert-success mb-0" role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif

<div class="row bg-light py-5 text-center reveal-from-top reveal-delay-1">
    <div class="col container">
        <h1 class="display-5 fw-bold">Contacto</h1>
        <p class="lead mt-3">¿Tienes dudas sobre nuestro software? Ponte en contacto con nosotros. <br> Estamos aquí para ayudarte.</p>
    </div>
</div>

<div class="contact-shell py-4 py-lg-5 reveal-from-top reveal-delay-2">
    <div class="card contact-card p-3 p-md-4 p-lg-5">
        <h1 class="h2 fw-bold mb-0">Formulario de Contacto</h1>

        <div id="submitSuccess" class="alert alert-success d-none mt-4 mb-0" role="alert">
            Consulta enviada correctamente.
        </div>

        <div class="stepper" aria-label="Progreso del formulario">
            <span class="step-dot active" data-step-indicator="1">1</span>
            <span class="step-dot" data-step-indicator="2">2</span>
            <span class="step-dot" data-step-indicator="3">3</span>
        </div>

        <form id="contactForm" method="POST" action="{{ route('contacto.store') }}" novalidate>
            @csrf
            <div class="step-panel active" data-step-panel="1">
                <h2 class="h4 fw-bold mb-4">Información Personal</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control form-control-lg" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Ej. tuemail@gmail.com" required>
                    </div>
                    <div class="col-12">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control form-control-lg" id="telefono" name="telefono" placeholder="Ej. 600123456">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-step btn-next px-4" data-next>
                        Siguiente →
                    </button>
                </div>
            </div>

            <div class="step-panel" data-step-panel="2">
                <h2 class="h4 fw-bold mb-4">¿En qué podemos ayudarte?</h2>
                <p class="text-secondary mb-4">Selecciona el motivo de tu consulta para ofrecerte una mejor atención</p>

                <div class="d-grid gap-3">
                    <label class="consult-option d-flex gap-3 align-items-start">
                        <input class="form-check-input mt-1" type="radio" name="tipo_consulta" value="facturacion_pagos" required>
                        <span>
                            <span class="d-block fw-semibold fs-5">Facturación y Pagos</span>
                            <span class="text-secondary">Consultas sobre cuotas, recibos o estado de pagos</span>
                        </span>
                    </label>

                    <label class="consult-option d-flex gap-3 align-items-start">
                        <input class="form-check-input mt-1" type="radio" name="tipo_consulta" value="informacion_general" required>
                        <span>
                            <span class="d-block fw-semibold fs-5">Información General</span>
                            <span class="text-secondary">Dudas sobre el uso de la plataforma o servicios disponibles</span>
                        </span>
                    </label>

                    <label class="consult-option d-flex gap-3 align-items-start">
                        <input class="form-check-input mt-1" type="radio" name="tipo_consulta" value="sugerencias_mejoras" required>
                        <span>
                            <span class="d-block fw-semibold fs-5">Sugerencias y Mejoras</span>
                            <span class="text-secondary">Propuestas para mejorar la gestión de la comunidad</span>
                        </span>
                    </label>

                    <label class="consult-option d-flex gap-3 align-items-start">
                        <input class="form-check-input mt-1" type="radio" name="tipo_consulta" value="otra_consulta" required>
                        <span>
                            <span class="d-block fw-semibold fs-5">Otra consulta</span>
                            <span class="text-secondary">Define en el siguiente paso detalladamente el motivo de tu consulta</span>
                        </span>
                    </label>
                </div>


                <div class="d-flex gap-3 mt-4">
                    <button type="button" class="btn btn-step btn-outline-secondary flex-fill" data-back>
                        ← Anterior
                    </button>
                    <button type="button" class="btn btn-step btn-next flex-fill" data-next>
                        Siguiente →
                    </button>
                </div>
            </div>

            <div class="step-panel" data-step-panel="3">
                <h2 class="h4 fw-bold mb-4">Mensaje</h2>

                <div class="mb-3">
                    <label for="asunto" class="form-label">Asunto</label>
                    <input type="text" class="form-control form-control-lg" id="asunto" name="asunto" placeholder="Ej: Problema con acceso, consulta sobre recibo, incidencia en zonas comunes" required>
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="7" placeholder="Indica los detalles de tu consulta o incidencia (ubicación, fecha, descripción del problema, etc.) para poder ayudarte mejor..." required></textarea>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="1" id="privacidad" name="privacidad" required>
                    <label class="form-check-label" for="privacidad">
                        He leído y acepto la <a href="#" class="link-info">política de privacidad</a> y los <a href="#" class="link-info">términos de uso</a>
                    </label>
                </div>

                <p class="muted-note mb-4">Completa y envía el formulario para guardar la consulta en la base de datos.</p>

                <div class="d-flex gap-3">
                    <button type="button" class="btn btn-step btn-outline-secondary flex-fill" data-back>
                        ← Anterior
                    </button>
                    <button type="submit" class="btn btn-step btn-next flex-fill">
                        Enviar Consulta
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade d-none" id="confirmSendModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Confirmar envío</h5>
                <button type="button" class="btn-close" id="cancelSendBtn" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body pt-2">
                <p class="mb-0">¿Estás seguro de enviar la consulta?</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary" id="cancelSendBtn2">Cancelar</button>
                <button type="button" class="btn btn-step btn-next" id="confirmSendBtn">Sí, enviar</button>
            </div>
        </div>
    </div>
</div>

<script>
    (() => {
        const formulario = document.getElementById('contactForm');
        const paneles = Array.from(document.querySelectorAll('[data-step-panel]'));
        const indicadores = Array.from(document.querySelectorAll('[data-step-indicator]'));
        const alertaExito = document.getElementById('submitSuccess');
        const modalConfirmacion = document.getElementById('confirmSendModal');
        const botonConfirmarEnvio = document.getElementById('confirmSendBtn');
        const botonCancelarEnvio = document.getElementById('cancelSendBtn');
        const botonCancelarEnvioSecundario = document.getElementById('cancelSendBtn2');
        const PASO_MAXIMO = 3;
        let pasoActual = 1;

        const marcarOpcionSeleccionada = () => {
            document.querySelectorAll('.consult-option').forEach((option) => {
                const input = option.querySelector('input[type="radio"]');
                option.classList.toggle('is-selected', input.checked);
            });
        };

        const actualizarProgreso = () => {
            paneles.forEach((panel) => {
                panel.classList.toggle('active', Number(panel.dataset.stepPanel) === pasoActual);
            });

            indicadores.forEach((indicador) => {
                const paso = Number(indicador.dataset.stepIndicator);
                indicador.classList.toggle('active', paso === pasoActual);
                indicador.classList.toggle('completed', paso < pasoActual);
            });

            marcarOpcionSeleccionada();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        const mostrarModalConfirmacion = () => {
            modalConfirmacion.classList.remove('d-none');
            modalConfirmacion.classList.add('show');
            modalConfirmacion.style.display = 'block';
            document.body.classList.add('modal-open');
        };

        const ocultarModalConfirmacion = () => {
            modalConfirmacion.classList.add('d-none');
            modalConfirmacion.classList.remove('show');
            modalConfirmacion.style.display = 'none';
            document.body.classList.remove('modal-open');
        };

        const validarPasoActual = () => {
            const panelActual = paneles.find((panel) => Number(panel.dataset.stepPanel) === pasoActual);
            if (!panelActual) return true;

            const campos = Array.from(panelActual.querySelectorAll('input, textarea, select'));
            for (const campo of campos) {
                if (campo.type === 'radio' || campo.type === 'checkbox') continue;
                if (!campo.checkValidity()) {
                    campo.reportValidity();
                    return false;
                }
            }

            const radios = panelActual.querySelectorAll('input[type="radio"]');
            if (radios.length) {
                const checked = Array.from(radios).some((radio) => radio.checked);
                if (!checked) {
                    radios[0].reportValidity();
                    return false;
                }
            }

            return true;
        };

        document.querySelectorAll('[data-next]').forEach((button) => {
            button.addEventListener('click', () => {
                if (!validarPasoActual()) return;
                pasoActual = Math.min(PASO_MAXIMO, pasoActual + 1);
                actualizarProgreso();
            });
        });

        document.querySelectorAll('[data-back]').forEach((button) => {
            button.addEventListener('click', () => {
                pasoActual = Math.max(1, pasoActual - 1);
                actualizarProgreso();
            });
        });

        document.querySelectorAll('input[type="radio"]').forEach((input) => {
            input.addEventListener('change', marcarOpcionSeleccionada);
        });

        formulario.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!validarPasoActual()) return;

            if (!formulario.checkValidity()) {
                formulario.reportValidity();
                return;
            }

            mostrarModalConfirmacion();
        });

        botonConfirmarEnvio.addEventListener('click', () => {
            ocultarModalConfirmacion();
            formulario.submit();
        });

        botonCancelarEnvio.addEventListener('click', ocultarModalConfirmacion);
        botonCancelarEnvioSecundario.addEventListener('click', ocultarModalConfirmacion);

        modalConfirmacion.addEventListener('click', (event) => {
            if (event.target === modalConfirmacion) {
                ocultarModalConfirmacion();
            }
        });

        actualizarProgreso();
    })();
</script>

@endsection
