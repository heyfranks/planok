<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class CotizacionesModel extends Model
{
    protected $table = 'cotizacion';
    protected $primaryKey = 'idCotizacion';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    
    protected $allowedFields = ['idCotizacion', 'descuento', 'subtotal', 'total', 'fechaCreacion', 'fechaModificacion', 'estado', 'credito', 'montoCredito', 'idCliente', 'idUsuario'];

    private $idCotizacion;
    public function existe($idCotizacion) {
        $datos = (array)$this->find($idCotizacion);
        return count($datos);
    }
    public function detalle($idCotizacion) {
        $retorno = new stdClass();
        $retorno->detalle = $this->detalle_general($idCotizacion);
        $retorno->productos = $this->productos($idCotizacion);
        return $retorno;
    }

    private function detalle_general($idCotizacion) {
        return $this
        ->select('cotizacion.*, cliente.*,  CONCAT(usuario.nombre, " ", usuario.apellido) as ejecutivo')
        ->join('cliente', 'cotizacion.idCliente=cliente.id', 'inner')
        ->join('usuario', 'cotizacion.idUsuario=usuario.id', 'inner')
        ->find($idCotizacion);
    }
    private function productos($idCotizacion) {

        return $this
        ->select('producto.*, tipo_producto.descripcion as descripcionTipoProducto')
        ->join('cotizacion_producto', 'cotizacion.idCotizacion=cotizacion_producto.idCotizacion', 'inner')
        ->join('usuario', 'cotizacion.idUsuario=usuario.id', 'inner')
        ->join('producto', 'cotizacion_producto.idProducto=producto.idProducto', 'inner')
        ->join('tipo_producto', 'producto.idTipoProducto=tipo_producto.idTipoProducto', 'inner')
        ->Where('cotizacion_producto.idCotizacion', $idCotizacion)
        ->findAll();
    }
}