<?php
$data = new DatosAdmin();
$data_uno = DatosAdmin::mostrar_datos_para_eliminar_compra($_SESSION['admin_id']);
$data_dos = DatosAdmin::mostrar_datos_para_eliminar_compra_stock($_SESSION['admin_id']);
$venta_pendiente = DatosAdmin::visualizar_venta_realtime($_SESSION['admin_id']);
$data->id_usuario = $_SESSION['admin_id'];
foreach($data_uno as $uno){
	$data->id = $uno->id;
	$data->eliminar_carrito_item();
}

foreach($data_dos as $dos){
	$data->id = $dos->id;
	$data->eliminar_carrito_stock();
}

$data->venta = $venta_pendiente->id;
$data->eliminar_venta_completa();