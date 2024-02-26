<?php
$compra = new DatosAdmin();
$compra->id = $_POST['compra'];
$compra->estado_de_venta = 7;
$compra->aceptar_la_compra_web();

echo json_encode(array('estado' => "exito", 'mensaje' => "Se movio a la lista de ventas por entregar."));