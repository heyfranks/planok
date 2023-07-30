<!DOCTYPE html>
<html lang="es">
<?= $this->include('template/head')?>

<body class="">

<?= view_cell('MenuTemplate'); ?>

<?= $this->include('template/loader')?>

<?= view_cell('HeaderTemplate'); ?>

    <div class="pcoded-main-container">
        <div class="pcoded-content">
<?= $this->include('template/breadcrumb')?>
<?= $this->renderSection('content') ?>
        </div>
    </div>

<?= $this->include('template/outdateexplorer') ?>
    
    <script src="<?=base_url('assets/js/vendor-all.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/ripple.js')?>"></script>
    <script src="<?=base_url('assets/js/pcoded.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/sweetalert.ultimo.min.js')?>"></script>

<?php
// ADD JS
if(isset($js) && is_array($js) && count($js)):
    foreach($js as $addjs):
?>
    <script src="<?=base_url('assets/js/'.$addjs)?>"></script>
<?php
    endforeach;
endif;
// ADD CSS
if(isset($css) && is_array($css) && count($css)):
    foreach($css as $addcss):
?>
    <link rel="stylesheet" href="<?=base_url('assets/css/'.$addcss)?>">
<?php
    endforeach;
endif;
?>

    
    <script>
        $(document).ready(function() {
            $("#<?=underscore($parent_activo).md5($parent_activo)?>").addClass('active');
            <?php
            if(isset($extra_jquery)) {
                echo $extra_jquery;
            }
            ?>
        });
    </script>
</body>
</html>
