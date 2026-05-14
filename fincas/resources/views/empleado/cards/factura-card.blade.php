<div class="col-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm h-100 carta" style="border-top: #fabd05 4px solid;">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-3">Facturar</h5>
                                <div class="iconos" style="background-color: #e9d189;">
                                    <i class="bi bi-receipt fs-5 icono-factura"></i>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Facturas del edificio
                                    </li>
                                </ul>

                            <hr>

                            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                <div class="mb-3">
                                    <button class="btn btn-light border-0 fw-semibold text-secondary d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalFacturas">
                                        Emitir Factura
                                        <i class="bi bi-plus-circle"></i>
                                    </button>
                                </div>
                            </div>

                        
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalFacturas" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw; width: 80vw;">
                    <div class="modal-content border-0 shadow-lg rounded-4" style="max-height:80vh; overflow:hidden;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">Emitir factura</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <form method="POST" action="{{ route('empleado.facturas.store') }}">
                            @csrf
                            <div class="modal-body" style="overflow:auto; max-height:calc(80vh - 180px);">
                                @if(!auth()->user()->edificio)
                                    <div class="alert alert-warning">
                                        Este empleado no tiene un edificio asignado.
                                    </div>
                                @endif

                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Edificio destinatario</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->edificio?->nombre }} - {{ auth()->user()->edificio?->direccion }}" readonly>
                                    </div>

                                    <div class="col-12">
                                        <div class="border rounded-4 p-3 bg-light">
                                            <h6 class="fw-bold mb-3">Datos de la empresa</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="empresa_nombre" class="form-label fw-semibold">Nombre</label>
                                                    <input type="text" class="form-control" id="empresa_nombre" name="empresa_nombre" value="{{ old('empresa_nombre', 'Fincapp - Administración de Fincas') }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="empresa_cif" class="form-label fw-semibold">CIF</label>
                                                    <input type="text" class="form-control" id="empresa_cif" name="empresa_cif" value="{{ old('empresa_cif') }}" placeholder="B12345678" required>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="empresa_direccion" class="form-label fw-semibold">Dirección</label>
                                                    <input type="text" class="form-control" id="empresa_direccion" name="empresa_direccion" value="{{ old('empresa_direccion') }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="empresa_codigo_postal" class="form-label fw-semibold">Código postal</label>
                                                    <input type="text" class="form-control" id="empresa_codigo_postal" name="empresa_codigo_postal" value="{{ old('empresa_codigo_postal') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="border rounded-4 p-3 bg-light">
                                            <h6 class="fw-bold mb-3">Datos del cliente</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="cliente_nombre" class="form-label fw-semibold">Nombre</label>
                                                    <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" value="{{ old('cliente_nombre') }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="cliente_nif" class="form-label fw-semibold">NIF</label>
                                                    <input type="text" class="form-control" id="cliente_nif" name="cliente_nif" value="{{ old('cliente_nif') }}" placeholder="12345678A" required>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="cliente_direccion" class="form-label fw-semibold">Dirección</label>
                                                    <input type="text" class="form-control" id="cliente_direccion" name="cliente_direccion" value="{{ old('cliente_direccion') }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="cliente_codigo_postal" class="form-label fw-semibold">Código postal</label>
                                                    <input type="text" class="form-control" id="cliente_codigo_postal" name="cliente_codigo_postal" value="{{ old('cliente_codigo_postal') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="concepto" class="form-label fw-semibold">Concepto</label>
                                        <input type="text" class="form-control" id="concepto" name="concepto" value="{{ old('concepto') }}" placeholder="Mantenimiento, limpieza, ascensor..." required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="base_imponible" class="form-label fw-semibold">Base imponible (€)</label>
                                        <input type="number" step="0.01" min="0" class="form-control" id="base_imponible" name="base_imponible" value="{{ old('base_imponible') }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="iva_porcentaje" class="form-label fw-semibold">IVA (%)</label>
                                        <input type="number" step="0.01" min="0" max="100" class="form-control" id="iva_porcentaje" name="iva_porcentaje" value="{{ old('iva_porcentaje', 21) }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Empleado</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->nombre ?? auth()->user()->username }}" readonly>
                                    </div>

                                    <div class="col-12">
                                        <label for="observaciones" class="form-label fw-semibold">Observaciones</label>
                                        <textarea class="form-control" id="observaciones" name="observaciones" rows="4" placeholder="Notas opcionales...">{{ old('observaciones') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-file-earmark-pdf me-2"></i>Generar PDF
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const modal = document.getElementById('modalFacturas');
                        if (modal && window.bootstrap) {
                            new bootstrap.Modal(modal).show();
                        }
                    });
                </script>
            @endif

        </div>