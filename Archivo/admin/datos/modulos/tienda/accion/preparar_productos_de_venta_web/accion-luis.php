<?php
$barcode = $_POST['valor'];
$el_item = $_POST['items'];




/////**** Verificamos la existencia del codigo de barras en el stock ******////
$stock_lista = DatosAdmin::ver_el_stock_del_item_por_barcode($barcode);


if($barcode!==""){
	if($stock_lista){
		$el_item_view = DatosAdmin::visualizamos_detalles_del_item_por_id($el_item);
		$proveedores=DatosAdmin::poridproveedor($stock_lista->proveedor);
		$provee = html_entity_decode($proveedores->nombre);
		$process = new DatosAdmin();
		$process->id = $el_item;
		$process->barcode = $barcode;
		if($el_item_view->barcode==null){
			// restablece
		}else{
			$process->codigo_barras = $el_item_view->barcode;
			$process->restablecer_stock_item();
		}

		

		$verificar_producto_en_stock = DatosAdmin::comprovar_disponibilidad_de_stock($el_item_view->id_item,$barcode);
		if($verificar_producto_en_stock){
			$process->codigo_item_compra = $el_item_view->codigo_item;
		    $process->estado = 7;
			$process->procesar_stock_item();
			$process->procesar_item_lista_compra();
			$faltan_procesar = DatosAdmin::contar_productos_que_faltan_preparar($el_item_view->codigo_item)->c;
			echo json_encode(array('estado' => 1, 'mensaje' => "Se agrego el codigo de barras al item con exito.", 'proveedor' => $provee,"cantidad" => $faltan_procesar));
		}else{
			echo json_encode(array('estado' => 0, 'mensaje' => "El codigo pertenece o otro producto.", 'proveedor' => "-"));
		}
		
	}else{
		echo json_encode(array('estado' => 0, 'mensaje' => "No esxiste el codigo de barras o ya fue procesado", 'proveedor' => "-"));
	}
}else{
	echo json_encode(array('estado' => 0, 'mensaje' => "Escribe el codigo de barras", 'proveedor' => "-"));
}
