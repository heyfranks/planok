<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    
    protected $allowedFields = ['id ', 'rut', 'idPerfil', 'nombre', 'apellido', 'apellido', 'correo', 'edad', 'sexo', 'estado'];
}