<?php
$total=0;
$datos_process = new DatosAdmin();
$items=DatosAdmin::items_stock_in_order_items($_SESSION["admin_id"]);
$venta_pendiente = DatosAdmin::visualizar_venta_realtime($_SESSION['admin_id']);

$data_uno = DatosAdmin::mostrar_datos_para_eliminar_compra($_SESSION['admin_id']);

$datos_process->id = $venta_pendiente->id;
$datos_process->id_usuario = $_SESSION['admin_id'];

if($venta_pendiente->entregar==1) {
	$datos_process->estado_venta = 3;
}else{
	$metodo_pago_view = DatosAdmin::metodo_de_pago_por_id($venta_pendiente->metodo_pago);
	if($metodo_pago_view->reserva==1){
		$datos_process->estado_venta = 4;
	}else{
		$datos_process->estado_venta = 3;
	}
}


foreach ($items as $it){
	$cantidad_items=DatosAdmin::contar_items_stock_por_items($_SESSION['admin_id'],$it->id)->c;
	$total += $cantidad_items*$it->precio;
}

if($_POST['pagos']==""){
	$datos_process->numero_operacion = false;
	$vuelto=false;
	$datos_process->vuelto = $vuelto;
	$datos_process->pago_con = false;
}elseif($venta_pendiente->metodo_pago==2){
	$datos_process->numero_operacion = false;
	$vuelto=false;
	$datos_process->vuelto = $vuelto;
	$datos_process->pago_con = false;
	$datos_process->numero_operacion = $_POST['pagos'];
}elseif($venta_pendiente->metodo_pago==3){
	$datos_process->numero_operacion = false;
	$vuelto=false;
	$datos_process->vuelto = $vuelto;
	$datos_process->pago_con = false;
	$datos_process->numero_operacion = $_POST['pagos'];
}else{
	$datos_process->numero_operacion = false;
	$vuelto=$_POST['pagos']-$total;
	$datos_process->vuelto = $vuelto;
	$datos_process->pago_con = $_POST['pagos'];
}


$datos_process->fecha = date('Y-m-d');
$datos_process->procesar_venta_en_lista();




if($venta_pendiente->entregar==1){
	$productos_stock_reserva = DatosAdmin::stock_en_venta_reservado_ver($_SESSION['admin_id'],$venta_pendiente->cliente);
	foreach ($productos_stock_reserva as $str){
		$datos_process->numero_venta_reserva_venta = $str->numero_venta;
		$datos_process->procesar_numero_de_venta_reserva();
		$datos_process->barcode = $str->barcode;
		$datos_process->cliente = $venta_pendiente->cliente;
		$datos_process->numero_venta = $venta_pendiente->numero_venta;
		$datos_process->procesar_productos_de_stock();
	}
}else{
	$productos_stock = DatosAdmin::stock_en_venta_ver($_SESSION['admin_id']);
	foreach ($productos_stock as $st){
		$datos_process->barcode = $st->barcode;
		$datos_process->cliente = $venta_pendiente->cliente;
		$datos_process->numero_venta = $venta_pendiente->numero_venta;
		$datos_process->procesar_productos_de_stock();
	}
}



foreach($data_uno as $uno){
	$datos_process->id_item = $uno->id;
	$datos_process->eliminar_carrito_items_de_venta();
}

?>