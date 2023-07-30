<?php

namespace App\Controllers;

class Usuarios extends BaseController
{

    public function index()
    {
        $modelo_usuarios = model('UsuariosModel');
        $usuarios = $modelo_usuarios
            ->join('perfil', 'usuario.idPerfil=perfil.idPerfil', 'inner')
            ->findAll();
        $data = [
            'titulo' => 'Usuarios PlanOk',
            'parent_activo' => 'Usuarios',
            'js' => ['plugins/jquery.dataTables.min.js', 'usuarios.js?t=' . time()],
            'css' => ['plugins/dataTables.bootstrap4.min.css'],
            'usuarios' => $usuarios
        ];
        return view('usuarios', $data);
    }
}