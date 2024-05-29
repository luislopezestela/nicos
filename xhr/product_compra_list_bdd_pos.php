<?php
if($f == 'product_compra_list_bdd_pos') {
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
    $timesd = time();
    
	
	if (isset($_POST['value'])) {
		$producto = lui_GetProduct($_POST['value']);
		$comprapendiente = $db->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado','2')->where('estado_venta', 3)->getOne(T_VENTAS);
		$comprapendiente_ids = $comprapendiente->id;

		$uniqueIdentifier = $comprapendiente_ids . '_' . $_POST['value'];
		$item_producrto = $db->where('atributo', $uniqueIdentifier)->where('estado','2')->where('id_comprobante_v',$comprapendiente_ids)->getOne('imventario');
		if(!empty($item_producrto)){
			$actualizar_precio = $item_producrto->precio;
		}else{
			$actualizar_precio = $producto['price'];
		}
		
		$lastGroupNumberRow = $db->orderBy('orden', 'desc')->where('id_comprobante_v',$comprapendiente_ids)->getOne('imventario', 'orden');
		if($lastGroupNumberRow){
		    $lastGroupNumber = $lastGroupNumberRow->orden;
		} else{
		    $lastGroupNumber = null;
		}
		if(!$lastGroupNumber) {
		    $nextGroupNumber = 1;
		} else{
		    $sameIdentifierProducts = $db->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente_ids)->get('imventario');
		    if($sameIdentifierProducts) {
		        $nextGroupNumber = $sameIdentifierProducts[0]->orden;
		    }else{
		        $nextGroupNumber = $lastGroupNumber + 1;
		    }
		}

		if ($comprapendiente) {

			$sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";			   
			$productos_stock_disponibles = $db->rawQueryOne($sql)->cantidad;

			$productos_stock_disponible = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
				
			if ($productos_stock_disponible > 0) {
				if($_POST['color']==""){
					$dataarray = array(
						'producto' => $producto['id'],
						'id_comprobante_v' => $comprapendiente_ids,
						'cantidad' => 1,
						'tipo'     => 'venta',
						'modo'     => "salida",
						'estado'   => 2,
						'currency' => (!empty($wo['currencies'][$producto['currency']]['text'])) ? $wo['currencies'][$producto['currency']]['text'] : $producto['currency'],
						'precio'   => $actualizar_precio,
						'atributo'    => $uniqueIdentifier,
						'orden'       => $nextGroupNumber,
						'id_sucursal' => $comprapendiente->sucursal_entrega
					);
					$db->insert('imventario', $dataarray);
				}else{
					$dataarray = array(
						'producto' => $_POST['value'],
						'color'   => $_POST['color'],
						'id_comprobante_v' => $comprapendiente_ids,
						'cantidad' => 1,
						'tipo'     => 'venta',
						'modo'     => "salida",
						'estado'   => 2,
						'currency' => (!empty($wo['currencies'][$producto['currency']]['text'])) ? $wo['currencies'][$producto['currency']]['text'] : $producto['currency'],
						'precio'   => $actualizar_precio,
						'atributo'    => $uniqueIdentifier,
						'orden'       => $nextGroupNumber,
						'id_sucursal' => $comprapendiente->sucursal_entrega
					);
					$db->insert('imventario', $dataarray);
				}
				
				$productID = $db->getInsertId();
				$productos_vistos = [];
				$producto_id = $producto['id'];
				//Obtener todas las variantes de atributos para este producto
			    $variantes_atributos = [];
			    $atributos = $db->objectbuilder()->where('id_imventario', $productID)->get('imventario_atributos');
			    foreach ($atributos as $atributo_atr) {
			        $variantes_atributos[$atributo_atr->id_atributo][] = $atributo_atr->id_atributo_opciones;
			    }
			    
			    // Construir un identificador único para este producto basado en sus variaciones
			    $identificador_unico = $comprapendiente_ids . '_' . $producto_id;
			    foreach ($variantes_atributos as $atributo_atr => $opciones) {
			        $identificador_unico .= '_' . implode('_', $opciones);
			    }


				//$html = lui_LoadPage('compras/lista_compra');
				$productos_vistos[] = $identificador_unico;
				$total_productos_grupo = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(DISTINCT orden)');
	            $total_productos_lista = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
	            $total_productos_listas_stoks = $db->where('estado','2')->where('id_comprobante_v',$comprapendiente_ids)->where('atributo', $uniqueIdentifier)->getValue('imventario','COUNT(*)');

				$sql2 = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";

                $sql3 = "SELECT COUNT(*) AS cantidad 
		        FROM imventario 
		        WHERE id_comprobante_v = ? 
		        AND producto = ?
		        AND barcode != '0'";
				$params = array($comprapendiente->id, $producto['id']);
				$result = $db->rawQueryOne($sql3, $params);
				$cantidad_productos_pos_listos = $result->cantidad;
				
						   
				$prod_stock_disponibles = $db->rawQueryOne($sql2)->cantidad;

				$prod_stock_disponible = ($prod_stock_disponibles !== null) ? $prod_stock_disponibles : 0;
	            if ($prod_stock_disponible > 0) {
	            	$limite_de_stock = 0;
	            }else{
	            	$limite_de_stock = 1;
	            }
	            $buscarmoneda = $db->where('atributo', $uniqueIdentifier)->where('estado', '2')->where('id_comprobante_v', $comprapendiente->id)->getOne('imventario');
	            if ($buscarmoneda) {
	            	$moneda_limit = strtolower($buscarmoneda->currency);
	            }else{
	            	$moneda_limit = 0;
	            }
	            $wo['subtotal_dos'] = 0;
	            $wo['igv_dos'] = 0;
	            $wo['total_dos'] = 0;
	            $indexdefault_currency = array_search($buscarmoneda->currency, array_column($wo['currencies'], 'text'));
				$total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$buscarmoneda->currency)->where('estado','2')->getValue('imventario','COUNT(*)');
				if ($total_productos_lista_uno>0) {
					$total_productos_price_f = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$buscarmoneda->currency)->where('estado','2')->getValue('imventario','SUM(precio)');
					
					$wo['subtotal_dos'] = number_format($total_productos_price_f / (1.18), '2','.','');
					$wo['igv_dos']          = number_format($wo['subtotal_dos'] * 0.18, '2','.','');
					$wo['total_dos']    = number_format($total_productos_price_f, '2','.',''); 
				}

				$total_productos_price_sub = $wo['subtotal_dos'];
				$total_productos_price_igv = $wo['igv_dos'];
				$total_productos_price = $wo['total_dos'];
				$items_compra = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante_v',$comprapendiente->id)->where('estado','2')->where('tipo','venta')->getOne('imventario');
				$wo['product']['id'] = $producto['id'];
			    $wo['product']['id_productos'] =  $identificador_unico;
			    $wo['product']['id_imventarios'] =  $productID;
			    $wo['product']['units'] = $producto['units'];
			    $wo['product']['images'] = $producto['images'];
			    $wo['product']['name'] = $producto['name'];
			    $wo['product']['modelo'] = $producto['modelo'];
			    $wo['product']['sku'] = $producto['sku'];
			    $wo['product']['comprap'] = $comprapendiente->id;
			    $wo['product']['inventario'] = $productID;
			    $wo['product']['color'] = $items_compra->color;
			    $wo['product']['precio'] = $items_compra->precio;
			    $wo['product']['garantia'] = $items_compra->garantia;

				$wo['product']['subtotal_p'] = number_format($actualizar_precio*$prod_stock_disponible, 2, ',', '.');
			   	$wo['product']['cantidad'] = $total_productos_listas_stoks;
			   	$wo['product']['cantidad_listos_pos'] = $cantidad_productos_pos_listos;
			   	$wo['product']['stock_disponible'] = $prod_stock_disponible;
			   	if (!empty($wo['currencies']) && !empty($wo['currencies'][$producto['currency']]) && $wo['currencies'][$producto['currency']]['text'] != $wo['config']['currency'] && !empty($wo['config']['exchange']) && !empty($wo['config']['exchange'][$wo['currencies'][$producto['currency']]['text']])) {
				    $wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $producto['currency'];
             	    // $wo['total'] += (($wo['product']['price'] / $wo['config']['exchange'][$wo['currencies'][$wo['product']['currency']]['text']]) * $wo['item']->units);
		        } else {
		            $wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $producto['currency'];
		            //$wo['total'] += ($wo['product']['price'] * $wo['item']->units);
		        }
		        if ($total_productos_listas_stoks == 1) {
		            $html .= lui_LoadPage('pos/items_pos');
		        }

				$data = array(
					'producto' => $productos_vistos,
	                'status' => 200,
	                'sin_stock' => $limite_de_stock,
	                'total_stock' => $prod_stock_disponible,
	                'total_items' => $total_productos_grupo,
	                'total_lista' => $total_productos_lista,
	                'total_cantidad_prod' => $total_productos_listas_stoks,
	                'total_precio_sub' => $total_productos_price_sub,
		            'total_precio_igv' => $total_productos_price_igv,
		            'total_precio' => $total_productos_price,
		            'total_listos_pos' => $cantidad_productos_pos_listos,
		            'currency' => $moneda_limit,
           			'html' => $html
	            );
            }else{
            	$data = array(
	                'status' => 400,
	                'sin_stock' => 1,
	                'message'  => 'No hay stok disponible'
	            );
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