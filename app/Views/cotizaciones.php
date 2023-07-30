<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Listado de cotizaciones</h5>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="cotizaciones_table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rut cliente</th>
                                    <th>Subtotal</th>
                                    <th>Descuento</th>
                                    <th>Total</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($cotizaciones as $cotizacion):
                                ?>
                                <tr>
                                    <td><?=$cotizacion->idCotizacion?></td>
                                    <td><?=formato_rut($cotizacion->rut)?></td>
                                    <td><?=moneda($cotizacion->subtotal)?></td>
                                    <td><?=$cotizacion->descuento?> %</td>
                                    <td><?=moneda($cotizacion->total)?></td>
                                    <td>
                                        <a href="<?=base_url('cotizacion/'.$cotizacion->idCotizacion.'/detalle')?>" class="btn btn-info btn-sm has-ripple">
                                            <i class="feather icon-list"></i>&nbsp; Detalle </a>
                                        </td>
                                </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>