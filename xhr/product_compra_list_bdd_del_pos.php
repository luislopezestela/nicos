<?php
if($f == 'product_compra_list_bdd_del_pos') {
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
	
	if (isset($_POST['value'])) {
		$producto = lui_GetProduct($_POST['value']);
		$comprapendiente = $db->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado','2')->where('estado_venta', 3)->getOne(T_VENTAS);
		$uniqueIdentifier = $comprapendiente->id . '_' . $_POST['value'];
		$item_producrto = $db->where('atributo', $uniqueIdentifier)->where('estado','2')->where('id_comprobante_v',$comprapendiente->id)->getOne('imventario');
		//$db->where('id', $item_producrto->id)->delete('imventario');

		$item_producto = $db->where('atributo', $uniqueIdentifier)
                    ->where('estado', '2')
                    ->where('id_comprobante_v', $comprapendiente->id)
                    ->getOne('imventario');
		if ($item_producto) {
		    if ($db->where('id', $item_producto->id)->delete('imventario')) {
		        $data['message'] = "El elemento se eliminó correctamente.";
		    } else {
		        $data['message'] = "Error al eliminar el elemento.";
		    }
		} else {
		    $data['message'] = "No se encontró el elemento a eliminar.";
		}
		if(!empty($item_producrto)){
			if ($comprapendiente) {
				$sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";
				$productos_stock_disponibles = $db->rawQueryOne($sql)->cantidad;

            $sql2 = "SELECT COUNT(*) AS cantidad 
		      FROM imventario 
		      WHERE id_comprobante_v = ? 
		      AND producto = ?
		      AND barcode != '0'";
				$params = array($comprapendiente->id, $producto['id']);
				$result = $db->rawQueryOne($sql2, $params);
				$cantidad_productos_pos_listos = $result->cantidad;
				

				$productos_stock_disponible = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
				$productID = $item_producrto->id;
				$productos_vistos = [];
				$producto_id = $producto['id'];
				//Obtener todas las variantes de atributos para este producto
			    $variantes_atributos = [];
			    $atributos = $db->objectbuilder()->where('id_imventario', $productID)->get('imventario_atributos');
			    foreach ($atributos as $atributo_atr) {
			        $variantes_atributos[$atributo_atr->id_atributo][] = $atributo_atr->id_atributo_opciones;
			    }
			    // Construir un identificador único para este producto basado en sus variaciones
			    $identificador_unico = $comprapendiente->id . '_' . $producto_id;
			    foreach ($variantes_atributos as $atributo_atr => $opciones) {
			        $identificador_unico .= '_' . implode('_', $opciones);
			    }
				
				$productos_vistos[] = $identificador_unico;
				$total_productos_grupo = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente->id)->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente->id)->getValue('imventario','COUNT(*)');
            $total_productos_listas_stoks = $db->where('estado','2')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente->id)->getValue('imventario','COUNT(*)');
            if ($productos_stock_disponible > 0) {
            	$limite_de_stock = 0;
            }else{
            	$limite_de_stock = 1;
            }
            $moneda_limit = strtolower($wo['currencies'][$producto['currency']]['text']);
            $wo['subtotal_dos'] = 0;
            $wo['igv_dos'] = 0;
            $wo['total_dos'] = 0;
            $indexdefault_currency = array_search($wo['currencies'][$producto['currency']]['text'], array_column($wo['currencies'], 'text'));
				$total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$wo['currencies'][$producto['currency']]['text'])->where('estado','2')->getValue('imventario','COUNT(*)');
				if ($total_productos_lista_uno>0) {
					$total_productos_price_f = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$wo['currencies'][$producto['currency']]['text'])->where('estado','2')->getValue('imventario','SUM(precio)');
					
					$wo['subtotal_dos'] = number_format($total_productos_price_f / (1.18), '2','.','');
					$wo['igv_dos']          = number_format($wo['subtotal_dos'] * 0.18, '2','.','');
					$wo['total_dos']    = number_format($total_productos_price_f, '2','.',''); 
				}

				$total_productos_price_sub = $wo['subtotal_dos'];
				$total_productos_price_igv = $wo['igv_dos'];
				$total_productos_price = $wo['total_dos'];

				$data = array(
					'producto' => $productos_vistos,
	            'status' => 200,
	            'sin_stock' => $limite_de_stock,
	            'total_stock' => $productos_stock_disponible,
	            'total_items' => $total_productos_grupo,
               'total_lista' => $total_productos_lista,
             	'total_cantidad_prod' => $total_productos_listas_stoks,
             	'total_precio_sub' => $total_productos_price_sub,
               'total_precio_igv' => $total_productos_price_igv,
               'total_precio' => $total_productos_price,
               'total_listos_pos' => $cantidad_productos_pos_listos,
               'currency' => $moneda_limit
            );
            
			}
		}else{
			$data['status']  = 500;
		}
	}else{
		$data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
	}
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}