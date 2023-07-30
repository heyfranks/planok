<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class HeaderTemplate extends Cell
{
    private $nombre;
    public function getNombreProperty()
    {
        return 'Administrador';
    }
}
