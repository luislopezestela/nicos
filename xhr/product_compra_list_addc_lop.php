<?php 
if($f == 'product_compra_list_addc_lop') {
	require_once './luisincludes/librerias/PhpSpreadsheet-master/vendor/mpdf/mpdf/vendor/autoload.php';
	$generator = new Mpdf\Barcode();
	$html = '';
	$total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
	if (isset($_POST['producto'])) {

		$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
		
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
		$uniqueIdentifier = $comprapendiente->id . '_' . $_POST['producto'] . '_' . $attributeString;
		
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

		$item_producrto = $db->where('atributo',$uniqueIdentifier)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getOne('imventario');
		if(!empty($item_producrto)){
			$actualizar_precio = $item_producrto->precio;
		}else{
			$actualizar_precio = '0.00';
		}
		
		if ($comprapendiente) {
			$dataarray = array(
				'producto' => $_POST['producto'],
				'id_comprobante' => $comprapendiente->id,
				'cantidad' => 1,
				'tipo'     => 'compra',
				'modo'     => "ingreso",
				'estado'   => 0,
				'id_sucursal' => $wo['user']['sucursal'],
				'atributo'    => $uniqueIdentifier,
				'orden'       => $nextGroupNumber,
				'precio'   => $actualizar_precio,
			);
			
			
			$db->insert('imventario', $dataarray);

			$productID = $db->getInsertId();
			$barcode = $generator->getBarcodeArray($productID, 'EAN13');
			$arrayupdate = array(
				'barcode' => $barcode['code']
			);
			$db->where('id',$productID)->update('imventario', $arrayupdate);


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
			$items_compra = $db->objectbuilder()->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->get('imventario');
			$productos_vistos = []; // Para rastrear qué productos ya han sido vistos
		
				$producto = lui_GetProduct($_POST['producto']);
				$producto_id = $producto['id'];
			    // Obtener todas las variantes de color para este producto
			    $variantes_color = [];
			    foreach ($items_compra as $item) {
			        if ($item->producto == $producto_id) {
			            $variantes_color[] = $item;
			        }
			    }
			    
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
			    
			    // Mostrar el primer producto encontrado con todas sus variantes de color y atributos
			    $wo['product']['id'] = $producto['id'];
			    $wo['product']['id_productos'] =  $identificador_unico;
			    $wo['product']['id_imventarios'] =  $productID;
			    $wo['product']['units'] = $producto['units'];
			    $wo['product']['images'] = $producto['images'];
			    $wo['product']['name'] = $producto['name'];
			    $wo['product']['modelo'] = $producto['modelo'];
			    $wo['product']['sku'] = $producto['sku'];
			    $wo['product']['comprap'] = $comprapendiente->id;
			    $wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $wo['config']['classified_currency_s'];

			    $wo['product']['inventario'] = $variantes_color[0]->id;
			    $wo['product']['color'] = $variantes_color[0]->color;
			    $wo['product']['precio'] = $variantes_color[0]->precio; // Usar el precio del primer color
			    // Contar el número de productos para esta variante de color y atributos

			     // Mostrar el primer producto encontrado con todas sus variantes de color y atributos
   

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
				    $cantidad_productos = $db->where('producto', $wo['product']['id'])->where('color', $wo['product']['color'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario', 'COUNT(*)');
				}


			    $wo['product']['cantidad'] = $cantidad_productos;
			    // Construir HTML para este producto
			    $html .= lui_LoadPage('compras/lista_compra');
			    
			    // Agregar el identificador único a la lista de productos vistos
			    $productos_vistos[] = $identificador_unico;
			

			///////////////end
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