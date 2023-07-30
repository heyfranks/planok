<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>1.- Listado de clientes que han comprado estacionamientos en Santiago.</h5>
            </div>
            <div class="card-body">
                <pre>
                    <code class="language-sql">
SELECT cliente.*
FROM cliente
INNER JOIN cotizacion
    ON (cliente.id=cotizacion.idCliente)
INNER JOIN cotizacion_producto
    ON (cotizacion.idCotizacion=cotizacion_producto.idCotizacion)
INNER JOIN producto
    ON (cotizacion_producto.idProducto=producto.idProducto)
INNER JOIN tipo_producto
    ON (producto.idTipoProducto=tipo_producto.idTipoProducto)
WHERE
    tipo_producto.descripcion='Estacionamiento' AND
    producto.estado='Vendido' AND
    producto.sector='Santiago';
                    </code>
                </pre>
            </div>
        </div>
    </div>

    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>2.- Total de departamentos Vendidos por el usuario PILAR PINO en Las Condes</h5>
            </div>
            <div class="card-body">
                <pre>
                    <code class="language-sql">
SELECT COUNT(id) AS totalDepartamentos
FROM usuario
INNER JOIN cotizacion
    ON (usuario.id=cotizacion.idUsuario)
INNER JOIN cotizacion_producto
    ON (cotizacion.idCotizacion=cotizacion_producto.idCotizacion)
INNER JOIN producto
    ON (cotizacion_producto.idProducto=producto.idProducto)
INNER JOIN tipo_producto
    ON (producto.idTipoProducto=tipo_producto.idTipoProducto)
WHERE
    usuario.nombre='PILAR' AND
    usuario.apellido='PINO' AND
    producto.estado='VENDIDO' AND
    producto.sector='Las Condes';
                    </code>
                </pre>
            </div>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>3.- Listar Productos creados entre el 2018-01-03 y 2018-01-20</h5>
            </div>
            <div class="card-body">
                <pre>
                    <code class="language-sql">
SELECT * FROM producto
INNER JOIN tipo_producto
    ON (producto.idTipoProducto=tipo_producto.idTipoProducto)
WHERE
    fechaCreacion BETWEEN '2018-01-03' AND '2018-01-20';
                    </code>
                </pre>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>4.- Sumar el total de ventas realizadas en Santiago</h5>
            </div>
            <div class="card-body">
                <pre>
                    <code class="language-sql">
SELECT SUM(producto.valorLista-(producto.valorLista*cotizacion.descuento/100)) as total FROM producto
INNER JOIN cotizacion_producto
    ON (producto.idProducto=cotizacion_producto.idProducto)
INNER JOIN cotizacion
    ON (cotizacion_producto.idCotizacion=cotizacion.idCotizacion)
WHERE
    producto.sector='Santiago' AND
    producto.estado='VENDIDO';
                    </code>
                </pre>
            </div>
        </div>
    </div>
    <div class="alert alert-danger" role="alert">
	    Para los puntos 1 y 4 se ignora el estado de la cotización
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<?= $this->endSection() ?>