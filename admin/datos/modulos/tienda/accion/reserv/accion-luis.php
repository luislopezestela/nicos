<?php
$cond = new DatosAdmin();
if($_POST['conf']=="reservar"){
	$items = DatosAdmin::ver_el_item($_POST['dat']);
	$cond->id = $_POST['dat'];
	$cond->usuario = $_SESSION['admin_id'];
	if($items->reserva==0){
		$cond->vendedor = $_SESSION['admin_id'];
		$cond->reservar_item_stock_vendedor();
		echo json_encode(array('estado'=> true));
	}else{
		$cond->vendedor = "null";
		$cond->quitar_reservar_item_stock_vendedor();
		echo json_encode(array('estado'=> false));
	}
}