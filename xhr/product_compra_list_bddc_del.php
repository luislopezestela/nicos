<?php 
if($f == 'product_compra_list_bddc_del') {
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
    $timesd = time();
    $usuario_b = $wo['user']['user_id'];

	if (isset($_POST['producto'])) {
		$producto = lui_GetProduct($_POST['producto']);
		$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_VENTAS);
		
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

		$item_producrto = $db->where('atributo',$uniqueIdentifier)->where('estado','0')->where('id_comprobante_v',$comprapendiente['id'])->getOne('imventario');
		$item_producto = $db->where('atributo', $uniqueIdentifier)
                    ->where('estado', '0')
                    ->where('id_comprobante_v', $comprapendiente['id'])
                    ->getOne('imventario');

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
				$total_productos_listas_stok = $db->where('estado','0')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(*)');

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
						$cantidad_productos = $db->where('estado', [1, 2], 'IN')
						->where('color', $_POST['color'])
						->where('producto', $producto['id'])
						->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
						$cantidad_productos = ($cantidad_productos !== null) ? $cantidad_productos : 0;
					}else{
						$cantidad_productos = $db->where('estado', [1, 2], 'IN')
						->where('producto', $producto['id'])
						->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
						$cantidad_productos = ($cantidad_productos !== null) ? $cantidad_productos : 0;
					}
				}

				$productos_stock_disponible = $cantidad_productos;

				if ($total_productos_listas_stok < $productos_stock_disponible) {
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
					$total_productos_grupo = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(DISTINCT orden)');
		            $total_productos_lista = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(*)');
		            if($total_productos_lista>0) {
		                $total_productos_price_f = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','SUM(precio)');
		            }
		            if ($total_productos_lista === 0) {
                       $db->where('id', $comprapendiente['id'])->delete(T_VENTAS);
                    }
		            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
		            $total_productos_listas_stoks = $db->where('estado','0')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente['id'])->getValue('imventario','COUNT(*)');
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