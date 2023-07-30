<?php

function moneda($monto, $decimales = 0) {
    return '$' . number_format($monto, $decimales, ',', '.');
}
function formato_texto($texto) {
    return ucwords(strtolower($texto));
}
function fecha_hora($fecha) {
    return date("d-m-Y H:i:s", strtotime($fecha));
}
function formato_rut($rut) {
        return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
function alerta_email($email) {
    $retorno = '';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $retorno = '<span class="badge rounded-pill bg-danger">Email inválido</span>';
    }
    return $retorno;
}
?>