<?php
if($f == 'product_compra_list_add') {
	require_once './luisincludes/librerias/PhpSpreadsheet-master/vendor/mpdf/mpdf/vendor/autoload.php';
	$generator = new Mpdf\Barcode();
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
	if (isset($_POST['value'])) {

		$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);

		$uniqueIdentifier = $comprapendiente->id . '_' . $_POST['value'];
		$item_producrto = $db->where('atributo', $uniqueIdentifier)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getOne('imventario');
		if(!empty($item_producrto)){
			$actualizar_precio = $item_producrto->precio;
		}else{
			$actualizar_precio = '0.00';
		}
		
		$lastGroupNumberRow = $db->orderBy('orden', 'desc')->where('id_comprobante',$comprapendiente->id)->getOne('imventario', 'orden');
		if($lastGroupNumberRow){
		    $lastGroupNumber = $lastGroupNumberRow->orden;
		} else{
		    $lastGroupNumber = null;
		}
		if(!$lastGroupNumber) {
		    $nextGroupNumber = 1;
		} else{
		    $sameIdentifierProducts = $db->where('atributo', $uniqueIdentifier)->where('id_comprobante',$comprapendiente->id)->get('imventario');
		    if($sameIdentifierProducts) {
		        $nextGroupNumber = $sameIdentifierProducts[0]->orden;
		    }else{
		        $nextGroupNumber = $lastGroupNumber + 1;
		    }
		}


		if ($comprapendiente) {
			if($_POST['color']==""){
				$dataarray = array(
					'producto' => $_POST['value'],
					'id_comprobante' => $comprapendiente->id,
					'cantidad' => 1,
					'tipo'     => 'compra',
					'modo'     => "ingreso",
					'estado'   => 0,
					'precio'   => $actualizar_precio,
					'id_sucursal' => $wo['user']['sucursal'],
					'atributo'    => $uniqueIdentifier,
					'orden'       => $nextGroupNumber
				);
			}else{
				$dataarray = array(
					'producto' => $_POST['value'],
					'color'   => $_POST['color'],
					'id_comprobante' => $comprapendiente->id,
					'cantidad' => 1,
					'tipo'     => 'compra',
					'modo'     => "ingreso",
					'estado'   => 0,
					'precio'   => $actualizar_precio,
					'id_sucursal' => $wo['user']['sucursal'],
					'atributo'    => $uniqueIdentifier,
					'orden'       => $nextGroupNumber
				);
			}
			
			$db->insert('imventario', $dataarray);

			$productID = $db->getInsertId();
			$barcode = $generator->getBarcodeArray($productID, 'EAN13');
			$arrayupdate = array(
				'barcode' => $barcode['code']
			);
			$db->where('id',$productID)->update('imventario', $arrayupdate);
			$productos_vistos = [];
			$producto = lui_GetProduct($_POST['value']);
			$producto_id = $producto['id'];

			// Obtener todas las variantes de atributos para este producto
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

			
			$wo['product']['id'] = $producto['id'];
			$wo['product']['units'] = $producto['units'];
			$wo['product']['images'] = $producto['images'];
			$wo['product']['name'] = $producto['name'];
			$wo['product']['modelo'] = $producto['modelo'];
			$wo['product']['sku'] = $producto['sku'];
			$wo['product']['inventario'] = $productID;
    		$wo['product']['id_imventarios'] = $productID;
    		$wo['product']['id_productos'] =  $identificador_unico;
    		$wo['product']['comprap'] = $comprapendiente->id;
			$wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $wo['config']['classified_currency_s'];

			$cantidad_productos = 0;
			if (!empty($variantes_atributos)) {
			    $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante = {$comprapendiente->id}";
			    foreach ($variantes_atributos as $atributo_atr => $opciones) {
			        foreach ($opciones as $opcion) {
			            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo_atr} AND id_atributo_opciones = {$opcion})";
			        }
			    }
			    $cantidad_productos = $db->rawQueryOne($sql)->cantidad;
			} else {
			    // Si no hay variantes de atributos, solo contar por color
			    $cantidad_productos = $db->where('id_comprobante', $comprapendiente->id)->where('producto', $wo['product']['id'])->getValue('imventario', 'COUNT(*)');
			}

			$wo['product']['cantidad'] = $cantidad_productos;
			
			


			$el_producto_inventario = $db->where('id',$productID)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getOne('imventario');
			if (isset($el_producto_inventario)) {
				$wo['product']['precio'] = $el_producto_inventario->precio;
			}else{
				$wo['product']['precio'] = '0.00';
			}
			
			$html = lui_LoadPage('compras/lista_compra');
			$productos_vistos[] = $identificador_unico;
			$total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario','COUNT(*)');
            if($total_productos_lista>0) {
                $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario','SUM(precio)');
            }
            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');

			$data = array(
				'producto' => $productos_vistos,
                'status' => 200,
                'html' => $html,
                'total_items' => $total_productos_grupo,
                'total_lista' => $total_productos_lista,
                'total_precio' => $total_productos_price
            );
		}

	}else{
		$data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
	}
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}