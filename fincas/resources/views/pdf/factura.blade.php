<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura {{ $numero_factura }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #212529;
            margin: 0;
            padding: 24px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #212529;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .muted {
            color: #6c757d;
        }

        .section {
            margin-bottom: 18px;
        }

        .box {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f8f9fa;
        }

        .text-end {
            text-align: right;
        }

        .total {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <div class="brand">Fincapp</div>
            <div class="muted">Administración de Fincas</div>
        </div>
        <div class="text-end">
            <div><strong>Factura:</strong> {{ $numero_factura }}</div>
            <div><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($fecha_factura)->format('d/m/Y H:i') }}</div>
            <div><strong>Empleado:</strong> {{ $empleado }}</div>
        </div>
    </div>

    <div class="section box">
        <strong>Datos de la empresa</strong>
        <p style="margin: 8px 0 0 0;">
            <strong>Nombre:</strong> {{ $empresa_nombre }}<br>
            <strong>CIF:</strong> {{ $empresa_cif }}<br>
            <strong>Dirección:</strong> {{ $empresa_direccion }}<br>
            <strong>Código postal:</strong> {{ $empresa_codigo_postal }}
        </p>
    </div>

    <div class="section box">
        <strong>Datos del cliente</strong>
        <p style="margin: 8px 0 0 0;">
            <strong>Nombre:</strong> {{ $cliente_nombre }}<br>
            <strong>NIF:</strong> {{ $cliente_nif }}<br>
            <strong>Dirección:</strong> {{ $cliente_direccion }}<br>
            <strong>Código postal:</strong> {{ $cliente_codigo_postal }}
        </p>
    </div>

    <div class="section box">
        <strong>Edificio destinatario</strong>
        <p style="margin: 8px 0 0 0;">
            <strong>Edificio:</strong> {{ $edificio->nombre }}<br>
            <strong>Dirección:</strong> {{ $edificio->direccion }}<br>
            <strong>Ciudad:</strong> {{ $edificio->ciudad }}<br>
            <strong>Código postal:</strong> {{ $edificio->codigo_postal }}
        </p>
    </div>

    <div class="section box">
        <strong>Detalle de la factura</strong>
        <table>
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th class="text-end">Importe</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $concepto }}</td>
                    <td class="text-end">{{ number_format($base_imponible, 2, ',', '.') }} €</td>
                </tr>
                <tr>
                    <td>IVA ({{ $iva_porcentaje }}%)</td>
                    <td class="text-end">{{ number_format($iva_importe, 2, ',', '.') }} €</td>
                </tr>
                <tr>
                    <td class="total">Total</td>
                    <td class="text-end total">{{ number_format($total, 2, ',', '.') }} €</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($observaciones)
        <div class="section box">
            <strong>Observaciones</strong>
            <p style="margin: 8px 0 0 0;">{{ $observaciones }}</p>
        </div>
    @endif
</body>
</html>
