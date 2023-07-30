<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Listado de usuarios</h5>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="usuarios_table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Estado</th>
                                    <th>Perfil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($usuarios as $usuario):
                                ?>
                                <tr>
                                    <td><?=$usuario->rut?></td>
                                    <td><?=formato_texto($usuario->nombre)?></td>
                                    <td><?=formato_texto($usuario->apellido)?></td>
                                    <td><?=strtolower($usuario->correo)?></td>
                                    <td><?=$usuario->edad?></td>
                                    <td><?=formato_texto($usuario->sexo)?></td>
                                    <td><?=formato_texto($usuario->estado)?></td>
                                    <td><?=formato_texto($usuario->descripcion)?></td>
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