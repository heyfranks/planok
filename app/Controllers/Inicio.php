<?php

namespace App\Controllers;

class Inicio extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Ejercicios PlanOk',
            'parent_activo' => 'Inicio',
            'js' => [],
            'css' => []
        ];
        return view('inicio', $data);
    }
    public function blanco()
    {
        
        $data = [
            'titulo' => 'Blanco',
            'parent_activo' => 'Inicio',
            'js' => [],
            'css' => []
        ];
        return view('blanco', $data);
    }
}
