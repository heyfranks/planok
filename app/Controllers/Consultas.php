<?php

namespace App\Controllers;

class Consultas extends BaseController
{
    public function index()
    {

        $data = [
            'titulo' => 'Consultas PlanOk',
            'parent_activo' => 'Consultas',
            'js' => [],
            'css' => ['consultas.css']
        ];
        return view('consultas', $data);
    }
}