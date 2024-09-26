<?php 
if($f == 'product_compra_list_bddc_pos_search') {
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
    $timesd = time();
    $usuario_b = $wo['user']['user_id'];
    $precio_de_atributos = 0;

	if (isset($_POST['producto'])) {
		$producto = lui_GetProduct($_POST['producto']);
		$comprapendiente = $db->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado','2')->where('estado_venta', 3)->getOne(T_VENTAS);
		$comprapendiente_ids = $comprapendiente['id'];
		// Procesar los atributosaddcc y opciones seleccionadas
		$atributosaddcc = $db->objectbuilder()->where('id_producto',$_POST['producto'])->get('atributos');
		$attributeOptions = [];
		foreach ($atributosaddcc as $atributos) {
		    $nombreCampo = 'atributo_' . $atributos->id;
		    if (isset($_POST[$nombreCampo]) && is_array($_POST[$nombreCampo])){
		        $opcionesSeleccionadas = $_POST[$nombreCampo];
		        foreach ($opcionesSeleccionadas as $opcion) {
		            $attributeOptions[] = $opcion;
		        }
		    }
		}
		$attributeString = implode('_', $attributeOptions);
		$uniqueIdentifier = $comprapendiente_ids . '_' . $_POST['producto'] . '_' . $attributeString;
		if ($_POST['color']!="") {
			$sku_colors_product = $db->where('id_producto',$producto['id'])->where('id_color',$_POST['color'])->getOne('lui_opcion_de_colores_productos');
			if (!empty($sku_colors_product['precio_adicional'])) {
				$precio_subtotal_producto = $sku_colors_product['precio_adicional']+$producto['price'];
			}else{
				$precio_subtotal_producto = $producto['price'];
			}

			$atributosadd_a = $db->objectbuilder()->where('id_producto',$_POST['producto'])->get('atributos');
			foreach ($atributosadd_a as $atributo) {
				if ($atributo->nombre == 'Color') {
			        continue;
			    }
			    $nombreCampo = 'atributo_' . $atributo->id;
			    if (isset($_POST[$nombreCampo]) && is_array($_POST[$nombreCampo])){
			        $opcionesSeleccionadas = $_POST[$nombreCampo];
			        foreach ($opcionesSeleccionadas as $opcion) {
			        	$opcionesdatos = $db->where('id',$opcion)->getOne('atributos_opciones');
						$precio_de_atributos += $opcionesdatos['precio_adicional'];
			        }
			    }
			}

			if ($precio_de_atributos > 0) {
				$suma_precios_atributs = $precio_de_atributos;
				$precio_tota_del_producto = $suma_precios_atributs+$precio_subtotal_producto;
			}else{
				$precio_tota_del_producto = $precio_subtotal_producto;
			}
		}else{
			$atributosadd_a = $db->objectbuilder()->where('id_producto',$_POST['producto'])->get('atributos');
			foreach ($atributosadd_a as $atributo) {
				if ($atributo->nombre == 'Color') {
			        continue;
			    }
			    $nombreCampo = 'atributo_' . $atributo->id;
			    if (isset($_POST[$nombreCampo]) && is_array($_POST[$nombreCampo])){
			        $opcionesSeleccionadas = $_POST[$nombreCampo];
			        foreach ($opcionesSeleccionadas as $opcion) {
			        	$opcionesdatos = $db->where('id',$opcion)->getOne('atributos_opciones');
						$precio_de_atributos += $opcionesdatos['precio_adicional'];
			        }
			    }
			}
			if ($precio_de_atributos > 0) {
				$suma_precios_atributs = $precio_de_atributos;
				$precio_tota_del_producto = $suma_precios_atributs+$producto['price'];
			}else{
				$precio_tota_del_producto = $producto['price'];
			}
		}
		$currency = $wo['currencies'][$producto['currency']]['symbol'];
		$actualizar_precio = $currency.$wo['total_dos']    = number_format($precio_tota_del_producto, '2','.','');
	
		if (!empty($atributosaddcc)) {
		    $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";
		    $subqueries = [];

		    foreach ($atributosaddcc as $atributos) {
			    $nombreCampo = 'atributo_' . $atributos->id;
			    if (isset($_POST[$nombreCampo]) && is_array($_POST[$nombreCampo])){
			        $opcionesSeleccionadas = $_POST[$nombreCampo];
			        foreach ($opcionesSeleccionadas as $opcion) {
			            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributos->id} AND id_atributo_opciones = {$opcion})";
			        }
			    }
			}
		    $cantidad_prod = $db->rawQueryOne($sql)['cantidad'];
		    $cantidad_productos = ($cantidad_prod !== null) ? $cantidad_prod : 0;
		} else{
			if ($_POST['color']!="") {
				$sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE color = {$_POST['color']} AND producto = {$producto['id']} AND (estado = 1 OR estado = 2)";			   
				$productos_stock_disponibles = $db->rawQueryOne($sql)['cantidad'];
				$cantidad_productos = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
			}else{
				$sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";			   
				$productos_stock_disponibles = $db->rawQueryOne($sql)['cantidad'];
				$cantidad_productos = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
			}
		}

		$productos_stock_disponible = $cantidad_productos;

        
	
		$data = array(
            'status' => 200,
            'total_stock' => $productos_stock_disponible,
            'precio_tols' => $actualizar_precio,
            'update' => $uniqueIdentifier
        );
         

	}else{
		$data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles hola +++';
	}
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}