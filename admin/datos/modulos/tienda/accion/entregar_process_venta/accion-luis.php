<?php

$itemstotal = DatosAdmin::contar_productos_que_faltan_preparar_total($_POST['compra']);



if($itemstotal->c==0){
	$compra = new DatosAdmin();
	$compra->id = $_POST['compra'];
	$compra->estado_de_venta = 3;
	$compra->fecha_venta=date('Y-m-d H:i:s');
	$compra->finalizar_la_compra_web();
	$respuesta = array('estado' => "exito", 'type' => 1, 'mensaje' => "Genial!.");
}else{
	$respuesta = array('estado' => "error", 'type' => 0, 'mensaje' => "Completa los datos!.");
}

echo(json_encode($respuesta));