<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
    <div class="row">
            <!-- [ Invoice ] start -->
            <div class="container">
                <!--pre><?php print_r($cotizacion)?></pre-->
                <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-contact">
                                <div class="invoice-box">
                                    <table class="table table-responsive invoice-table table-borderless p-l-20">
                                        <tbody>
                                            <tr>
                                                <td><a href="index.html" class="b-brand">
                                                        <img class="img-fluid w-25" src="<?=base_url('assets/images/avatar.png')?>" alt="PlanOk">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>PlanOk </td>
                                            </tr>
                                            <tr>
                                                <td>Esteban Dell´orto, 7007, Las Condes, Chile</td>
                                            </tr>
                                            <tr>
                                                <td><a class="text-secondary" href="mailto:contacto@planok.com" target="_top">contacto@planok.com</a></td>
                                            </tr>
                                            <tr>
                                                <td>+562 2439 6900</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row invoive-info">
                                <div class="col-md-4 col-xs-12 invoice-client-info">
                                    <h6>Cliente :</h6>

                                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Identificación </th>
                                                <td> : </td>
                                                <td><?=formato_texto($cotizacion->detalle->nombre)?>, <?=formato_rut($cotizacion->detalle->rut)?></td>
                                            </tr>
                                            <tr>
                                                <th>Región </th>
                                                <td> : </td>
                                                <td>
                                                    <span class="label label-warning"><?=formato_texto($cotizacion->detalle->region)?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Teléfono</th>
                                                <td> : </td>
                                                <td>
                                                    <?=$cotizacion->detalle->telefono?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td> : </td>
                                                <td>
                                                <a class="text-secondary" href="<?=strtolower($cotizacion->detalle->email)?>" target="_top"><?=strtolower($cotizacion->detalle->email)?></a>
                                                <?=alerta_email($cotizacion->detalle->email)?>    
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <h6>Información cotización :</h6>
                                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Fecha creación</th>
                                                <td> : </td>
                                                <td><?=fecha_hora($cotizacion->detalle->fechaCreacion)?></td>
                                            </tr>
                                            <tr>
                                                <th>Última modificación</th>
                                                <td> : </td>
                                                <td><?=fecha_hora($cotizacion->detalle->fechaModificacion)?></td>
                                            </tr>
                                            <tr>
                                                <th>Estado</th>
                                                <td> : </td>
                                                <td>
                                                    <span class="label label-warning"><?=formato_texto($cotizacion->detalle->estado)?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Ejecutivo</th>
                                                <td> : </td>
                                                <td>
                                                    <?=formato_texto($cotizacion->detalle->ejecutivo)?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <h6 class="m-b-20">Cotización <span>#<?=$cotizacion->detalle->idCotizacion?></span></h6>
                                    <h6 class="text-uppercase text-primary">Crédito :
                                        <span><?=$cotizacion->detalle->credito?></span>
                                    </h6>
                                    <h6 class="text-uppercase text-primary">Monto crédito :
                                        <span><?=$cotizacion->detalle->montoCredito?></span>
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table invoice-detail-table">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th>Descripción</th>
                                                    <th>Sector</th>
                                                    <th>Estado</th>
                                                    <th>Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($cotizacion->productos as $producto):
                                                ?>
                                                <tr>
                                                    <td>
                                                        <h6><?=$producto->descripcionTipoProducto?></h6>
                                                        <p class="m-0"> cod: <?=$producto->descripcion?>, piso <?=$producto->piso?>, <?=$producto->superficie?> mts<sup>2</sup></p>
                                                    </td>
                                                    <td><?=formato_texto($producto->sector)?></td>
                                                    <td><?=formato_texto($producto->estado)?></td>
                                                    <td><?=moneda($producto->valorLista)?></td>
                                                </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive invoice-table invoice-total">
                                        <tbody>
                                            <tr>
                                                <th>Sub Total :</th>
                                                <td><?=moneda($cotizacion->detalle->subtotal)?></td>
                                            </tr>
                                            <tr>
                                                <th>Descuento (<?=$cotizacion->detalle->descuento?>%) :</th>
                                                <td><?=moneda($cotizacion->detalle->subtotal*$cotizacion->detalle->descuento/100)?></td>
                                            </tr>
                                            <tr class="text-info">
                                                <td>
                                                    <hr>
                                                    <h5 class="text-primary m-r-10">Total :</h5>
                                                </td>
                                                <td>
                                                    <hr>
                                                    <h5 class="text-primary"><?=moneda($cotizacion->detalle->total)?></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>