<?php

namespace App\Controllers;

class Cotizaciones extends BaseController
{
    public function index()
    {
        $modelo_cotizaciones = model('CotizacionesModel');
        
        $cotizaciones = $modelo_cotizaciones
            ->select('cotizacion.idCotizacion, rut, subtotal, descuento, total')
            ->join('cliente', 'cotizacion.idCliente=cliente.id', 'inner')
            ->findAll();

        $data = [
            'titulo' => 'Cotizaciones PlanOk',
            'parent_activo' => 'Cotizaciones',
            'js' => ['plugins/jquery.dataTables.min.js', 'cotizaciones.js?t=' . time()],
            'css' => ['plugins/dataTables.bootstrap4.min.css'],
            'cotizaciones' => $cotizaciones
        ];
        return view('cotizaciones', $data);
    }
    public function detalle($idCotizacion) {
        $modelo_cotizaciones = model('CotizacionesModel');
        if(!$modelo_cotizaciones->existe($idCotizacion)) {
            return redirect()->back();
        }
        $data = [
            'titulo' => 'Cotizaciones PlanOk',
            'parent_activo' => 'Cotizaciones',
            'js' => [],
            'css' => [],
            'cotizacion' => $modelo_cotizaciones->detalle($idCotizacion)
        ];
        return view('detalle', $data);
    }
}