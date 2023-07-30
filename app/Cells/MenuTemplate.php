<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class MenuTemplate extends Cell
{
    private $nombre;
    private $itemsMenu;
    public $titulo = 'Menú';

    public function getNombreProperty()
    {
        return 'Administrador';
    }
    public function getItemsMenuProperty()
    {
        
        $itemsMenu = 
        [
            [
                'titulo' => 'Usuarios',
                'icono' => 'users',
                'path' => '/',
            ],
            [
                'titulo' => 'Cotizaciones',
                'icono' => 'list',
                'path' => 'cotizaciones',
            ],
            [
                'titulo' => 'Consultas',
                'icono' => 'code',
                'path' => 'consultas',
            ]
            ];
        return $itemsMenu;
    }
}
