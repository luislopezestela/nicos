<?php 
if($f == 'product_compra_list_bddc_del_pos') {
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
    $timesd = time();
    $usuario_b = $wo['user']['user_id'];

	if (isset($_POST['producto'])) {
		$producto = lui_GetProduct($_POST['producto']);
		$comprapendiente = $db->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado','2')->where('estado_venta', 3)->getOne(T_VENTAS);
		
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
		$uniqueIdentifier = $comprapendiente['id'] . '_' . $_POST['producto'] . '_' . $attributeString;

		$item_producrto = $db->where('atributo',$uniqueIdentifier)->where('estado','2')->where('id_comprobante_v',$comprapendiente['id'])->getOne('imventario');
		$item_producto = $db->where('atributo', $uniqueIdentifier)->where('estado', '2')->where('id_comprobante_v', $comprapendiente['id'])->getOne('imventario');

		if ($item_producto) {
		    if ($db->where('id', $item_producto['id'])->delete('imventario')) {
		        $data['message'] = "El elemento se eliminó correctamente.";
		    } else {
		        $data['message'] = "Error al eliminar el elemento.";
		    }
		} else {
		    $data['message'] = "No se encontró el elemento a eliminar.";
		}


		if(!empty($item_producrto)){
			$lastGroupNumberRow = $db->orderBy('orden', 'desc')->where('id_comprobante_v',$comprapendiente['id'])->getOne('imventario', 'orden');
			if($lastGroupNumberRow){
			    $lastGroupNumber = $lastGroupNumberRow['orden'];
			} else{
			    $lastGroupNumber = null;
			}
			if(!$lastGroupNumber) {
			    $nextGroupNumber = 1;
			} else{
				$sameIdentifierProducts = $db->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente['id'])->get('imventario');
			    if($sameIdentifierProducts) {
			        $nextGroupNumber = $sameIdentifierProducts[0]['orden'];
			    }else{
			        $nextGroupNumber = $lastGroupNumber + 1;
			    }
			}
			if ($comprapendiente) {
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

				if (!empty($atributosaddcc)) {
				    $sql2 = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND atributo = '{$uniqueIdentifier}' AND barcode != 0 AND id_comprobante_v = {$comprapendiente['id']}";
					$cantidad_productos_pos_listos = $db->rawQueryOne($sql2)['cantidad'];
				} else{
                    $sql = "SELECT COUNT(*) AS cantidad 
			        FROM imventario 
			        WHERE id_comprobante_v = ? 
			        AND producto = ?
			        AND barcode != '0'";
					$params = array($comprapendiente['id'], $producto['id']);
					$result = $db->rawQueryOne($sql, $params);

					$cantidad_productos_pos_listos = $result['cantidad'];
				}

				$productos_stock_disponible = $cantidad_productos;

				if ($productos_stock_disponible > 0) {
					$productID = $item_producrto['id'];

					$productos_vistos = []; // Para rastrear qué productos ya han sido vistos
					$producto_id = $producto['id'];
				    // Obtener todas las variantes de atributos para este producto
				    $variantes_atributos = [];
				    $atributos = $db->objectbuilder()->where('id_imventario', $productID)->get('imventario_atributos');
				    foreach ($atributos as $atributo_atr) {
				        $variantes_atributos[$atributo_atr->id_atributo][] = $atributo_atr->id_atributo_opciones;
				   	}
					// Construir un identificador único para este producto basado en sus variaciones
				    $identificador_unico = $comprapendiente['id'] . '_' . $producto_id;
				    foreach ($variantes_atributos as $atributo_atr => $opciones) {
				        $identificador_unico .= '_' . implode('_', $opciones);
				    }
					$productos_vistos[] = $identificador_unico;
					///////////////end
					$total_productos_grupo = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(DISTINCT orden)');
		            $total_productos_lista = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(*)');
		         
		            $total_productos_listas_stoks = $db->where('estado','2')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(*)');
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
					$total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente['id'])->where('currency',$wo['currencies'][$producto['currency']]['text'])->where('estado','2')->getValue('imventario','COUNT(*)');
					if ($total_productos_lista_uno>0) {
						$total_productos_price_f = $db->where('id_comprobante_v',$comprapendiente['id'])->where('currency',$wo['currencies'][$producto['currency']]['text'])->where('estado','2')->getValue('imventario','SUM(precio)');
						
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
	            }else{
	            	$data = array(
		                'status' => 400,
		                'sin_stock' => 1
		            );
	            }
			}
		}
	}else{
		$data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
	}
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}