<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('empleado.empleado');
    }

    public function storeFactura(Request $request)
    {
        $empleado = $request->user();
        $edificio = $empleado?->edificio;

        if (! $edificio) {
            return back()->withErrors([
                'edificio' => 'Tu usuario no tiene un edificio asignado para emitir la factura.',
            ]);
        }

        $validated = $request->validate([
            'empresa_nombre' => ['required', 'string', 'max:255'],
            'empresa_cif' => ['required', 'string', 'max:30'],
            'empresa_direccion' => ['required', 'string', 'max:255'],
            'empresa_codigo_postal' => ['required', 'string', 'max:10'],
            'cliente_nombre' => ['required', 'string', 'max:255'],
            'cliente_nif' => ['required', 'string', 'max:30'],
            'cliente_direccion' => ['required', 'string', 'max:255'],
            'cliente_codigo_postal' => ['required', 'string', 'max:10'],
            'concepto' => ['required', 'string', 'max:255'],
            'base_imponible' => ['required', 'numeric', 'min:0'],
            'iva_porcentaje' => ['required', 'numeric', 'min:0', 'max:100'],
            'observaciones' => ['nullable', 'string', 'max:1000'],
        ]);

        $numeroFactura = 'FAC-' . now()->format('YmdHis');
        $fechaFactura = now();
        $baseImponible = (float) $validated['base_imponible'];
        $ivaPorcentaje = (float) $validated['iva_porcentaje'];
        $ivaImporte = round($baseImponible * ($ivaPorcentaje / 100), 2);
        $total = round($baseImponible + $ivaImporte, 2);

        $data = [
            'numero_factura' => $numeroFactura,
            'fecha_factura' => $fechaFactura,
            'empresa_nombre' => $validated['empresa_nombre'],
            'empresa_cif' => $validated['empresa_cif'],
            'empresa_direccion' => $validated['empresa_direccion'],
            'empresa_codigo_postal' => $validated['empresa_codigo_postal'],
            'cliente_nombre' => $validated['cliente_nombre'],
            'cliente_nif' => $validated['cliente_nif'],
            'cliente_direccion' => $validated['cliente_direccion'],
            'cliente_codigo_postal' => $validated['cliente_codigo_postal'],
            'edificio' => $edificio,
            'concepto' => $validated['concepto'],
            'base_imponible' => $baseImponible,
            'iva_porcentaje' => $ivaPorcentaje,
            'iva_importe' => $ivaImporte,
            'total' => $total,
            'observaciones' => $validated['observaciones'] ?? null,
            'empleado' => $empleado->nombre ?? $empleado->username,
        ];

        $pdf = Pdf::loadView('pdf.factura', $data)->setPaper('a4');

        return $pdf->download("factura-{$numeroFactura}.pdf");
    }
}
