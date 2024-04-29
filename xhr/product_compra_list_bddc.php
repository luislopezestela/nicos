<?php 
if($f == 'product_compra_list_bddc') {
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
    $timesd = time();
    $usuario_b = $wo['user']['user_id'];
    $precio_de_atributos = 0;

	if (isset($_POST['producto'])) {
		$producto = lui_GetProduct($_POST['producto']);
		$comprapendientea = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_VENTAS);
		if(empty($comprapendientea)) {
            $dataarrayventas = array(
				'user_id' => $usuario_b,
				'time' => $timesd,
				'web' => 1,
			);
			$db->insert(T_VENTAS, $dataarrayventas);
			$ID_ventas = $db->getInsertId();
            $comprapendiente_ids = $ID_ventas;
            $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_VENTAS);
		}else{
			$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_VENTAS);
			$comprapendiente_ids = $comprapendiente->id;
		}
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

		$item_producrto = $db->where('atributo',$uniqueIdentifier)->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getOne('imventario');
		if(!empty($item_producrto)){
			$actualizar_precio = $item_producrto->precio;
		}else{

			if ($_POST['color']!="") {
				$sku_colors_product = $db->where('id_producto',$producto['id'])->where('id_color',$_POST['color'])->getOne('lui_opcion_de_colores_productos');
				if (!empty($sku_colors_product->precio_adicional)) {
					$precio_subtotal_producto = $sku_colors_product->precio_adicional+$producto['price'];
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
							$precio_de_atributos += $opcionesdatos->precio_adicional;
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
							$precio_de_atributos += $opcionesdatos->precio_adicional;
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
			
			$actualizar_precio = $precio_tota_del_producto;
		}
		if ($comprapendiente) {
			$total_productos_listas_stok = $db->where('estado','0')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');

			if (!empty($atributosaddcc)) {
			    $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND estado = 1";
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
			    $cantidad_prod = $db->rawQueryOne($sql)->cantidad;
			    $cantidad_productos = ($cantidad_prod !== null) ? $cantidad_prod : 0;
			} else{
				if ($_POST['color']!="") {
					$cantidad_productos = $db->where('estado', 1)
					->where('color', $_POST['color'])
					->where('producto', $producto['id'])
					->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
					$cantidad_productos = ($cantidad_productos !== null) ? $cantidad_productos : 0;
				}else{
					$cantidad_productos = $db->where('estado', 1)
					->where('producto', $producto['id'])
					->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
					$cantidad_productos = ($cantidad_productos !== null) ? $cantidad_productos : 0;
				}
			}

			$productos_stock_disponible = $cantidad_productos;

			if ($total_productos_listas_stok < $productos_stock_disponible) {
				if($_POST['color']==""){
					$dataarray = array(
						'producto' => $_POST['producto'],
						'id_comprobante_v' => $comprapendiente_ids,
						'cantidad' => 1,
						'tipo'     => 'venta',
						'modo'     => "salida",
						'estado'   => 0,
						'currency' => (!empty($wo['currencies'][$producto['currency']]['text'])) ? $wo['currencies'][$producto['currency']]['text'] : $producto['currency'],
						'atributo'    => $uniqueIdentifier,
						'orden'       => $nextGroupNumber,
						'precio'   => $actualizar_precio,
					);
				}else{
					$dataarray = array(
						'producto' => $_POST['producto'],
						'color'   => $_POST['color'],
						'id_comprobante_v' => $comprapendiente_ids,
						'cantidad' => 1,
						'tipo'     => 'venta',
						'modo'     => "salida",
						'estado'   => 0,
						'currency' => (!empty($wo['currencies'][$producto['currency']]['text'])) ? $wo['currencies'][$producto['currency']]['text'] : $producto['currency'],
						'atributo'    => $uniqueIdentifier,
						'orden'       => $nextGroupNumber,
						'precio'   => $actualizar_precio,
					);
				}
				
				$db->insert('imventario', $dataarray);

				$productID = $db->getInsertId();
		
				$atributosadd = $db->objectbuilder()->where('id_producto',$_POST['producto'])->get('atributos');

				// Procesar los atributosadd y opciones seleccionadas
				foreach ($atributosadd as $atributo) {
				    $nombreCampo = 'atributo_' . $atributo->id;
				    if (isset($_POST[$nombreCampo]) && is_array($_POST[$nombreCampo])){
				        $opcionesSeleccionadas = $_POST[$nombreCampo];
				        foreach ($opcionesSeleccionadas as $opcion) {
				        	$add_atributos_inventario = array(
								'id_imventario' => $productID,
								'id_atributo' => $atributo->id,
								'id_atributo_opciones' => $opcion
							);
							$db->insert('imventario_atributos', $add_atributos_inventario);
				        }
				    }
				}
				///////////////star
				$productos_vistos = []; // Para rastrear qué productos ya han sido vistos
				$producto_id = $producto['id'];
			    // Obtener todas las variantes de atributos para este producto
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
				$productos_vistos[] = $identificador_unico;
				///////////////end
				$total_productos_grupo = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(DISTINCT orden)');
	            $total_productos_lista = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
	            if($total_productos_lista>0) {
	                $total_productos_price_f = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','SUM(precio)');
	            }
	            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
	            $total_productos_listas_stoks = $db->where('estado','0')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
	            if ($total_productos_listas_stoks == $productos_stock_disponible) {
	            	$limite_de_stock = 1;
	            }else{
	            	$limite_de_stock = 0;
	            }
				$data = array(
					'producto' => $productos_vistos,
	                'status' => 200,
	                'sin_stock' => $limite_de_stock,
	                'total_stock' => $productos_stock_disponible - $total_productos_listas_stoks,
	                'total_items' => $total_productos_grupo,
	                'total_lista' => $total_productos_lista,
	                'total_precio' => $total_productos_price
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
        $data['message'] = 'Por favor comprueba tus detalles hola';
	}
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}