<?php 
if ($f == "comprar_producto_a") {
    if ($s == 'precio_compra_inputs') {
        $total_productos_grupo = 0;
        $total_productos_lista = 0;
        $total_productos_price_f = 0.00;
        if(!empty($_POST['docnum'])) {
            $dataarray = array(
                'precio' => $_POST['price_dat']
            );

            $db->where('producto',$_POST['docnum'])->where('estado', '0')->where('id_sucursal',$wo['user']['sucursal'])->update('imventario', $dataarray);
            $total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
            if($total_productos_lista>0) {
                $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
            }

            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');

            $data = array(
                'status' => 200,
                'total_items' => $total_productos_grupo,
                'total_lista' => $total_productos_lista,
                'total_precio' => $total_productos_price
            );
        }else{
            $data['status'] = 400;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'precio_compra_inputs_atri') {
        $total_productos_grupo = 0;
        $total_productos_lista = 0;
        $total_productos_price_f = 0.00;
        if (!empty($_POST['docnum']) && isset($_POST['attributes'])) {
            // Obtener los datos enviados por AJAX
            $productId = $_POST['docnum'];
            $newPrice = $_POST['price_dat'];
            $attributes = $_POST['attributes'];
            $uniqueIdentifier = $_POST['docnum'];

            // Construir la consulta SQL para actualizar el precio del producto específico con los atributos seleccionados
            $sql = "UPDATE imventario SET precio = ? WHERE producto = ? AND estado = '0' AND id_sucursal = ?";

            // Agregar condiciones para los atributos seleccionados
            $conditions = [];
            $params = [
                $newPrice,
                $productId,
                $wo['user']['sucursal']
            ];

            $attributesArray = json_decode($attributes, true);
            foreach ($attributesArray as $attributeId => $attributeOptions) {
                $conditions[] = "(id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = ? AND id_atributo_opciones IN (?)))";
                $params[] = $attributeId;
                $params[] = implode(',', $attributeOptions); // Convertir el array de opciones en una cadena separada por comas
            }

            if (!empty($conditions)) {
                $sql .= ' AND (' . implode(' AND ', $conditions) . ')';
            }

            // Preparar y ejecutar la consulta
            $affectedRows = $db->rawQuery($sql, $params);

            $parts = explode('_', $uniqueIdentifier);
            $productIds = array_shift($parts); // Extraer el ID del producto
            $jsonAttributes = array_pop($parts); // Extraer el objeto JSON de atributos
            $decodedAttributes = json_decode($jsonAttributes, true);
            $numericValues = array_map('current', $decodedAttributes);
            $formattedIdentifier = $productIds . '_' . implode('_', $numericValues);

            // Verificar si se actualizaron registros
            if ($affectedRows > 0) {
                $total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
                $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
                if($total_productos_lista>0) {
                    $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
                }
                $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
                $data = array(
                    'status' => 200,
                    'message' => 'Precio actualizado correctamente',
                    'identifier' => $formattedIdentifier,
                    'total_items' => $total_productos_grupo,
                    'total_lista' => $total_productos_lista,
                    'total_precio' => $total_productos_price
                );
            } else {
                $data['status'] = 400;
                $data['message'] = 'No se pudo actualizar el precio';
            }
        } else {
            $data['status'] = 400;
            $data['message'] = 'Por favor, comprueba tus detalles';
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    if($s == 'delete_product_inv_all'){
        $total_productos_grupo = 0;
        $total_productos_lista = 0;
        $total_productos_price_f = 0.00;
        if (!empty($_POST['post_id'])) {
            $pendiente_prod = $db->where('producto',$_POST['post_id'])->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getOne('imventario');

            if(!empty($pendiente_prod)) {
                $db->where('producto', $pendiente_prod->producto)->where('id_sucursal',$wo['user']['sucursal'])->delete('imventario');
            }
            $total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
            if($total_productos_lista>0) {
                $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
            }
            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
            
            $data = array(
                'status' => 200,
                'total_items' => $total_productos_grupo,
                'total_lista' => $total_productos_lista,
                'total_precio' => $total_productos_price
            );
        }else{
            $data['status'] = 400;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if($s == 'delete_product_inv_all_atr'){
        $total_productos_grupo = 0;
        $total_productos_lista = 0;
        $total_productos_price_f = 0.00;
        if (!empty($_POST['post_id'])) {
            $atributoids=$_POST['post_id']; /// el post_id es 1_23_4
            $pendiente_prod = $db->where('atributo', $atributoids)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getOne('imventario');
            if(!empty($pendiente_prod)) {
                $db->where('atributo', $pendiente_prod->atributo)->where('id_sucursal',$wo['user']['sucursal'])->delete('imventario');
            }
            $total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
            if($total_productos_lista>0) {
                $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
            }
            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
            
            $data = array(
                'status' => 200,
                'total_items' => $total_productos_grupo,
                'total_lista' => $total_productos_lista,
                'total_precio' => $total_productos_price
            );
        }else{
            $data['status'] = 400;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if($s == 'delete_product_inv'){
        $total_productos_grupo = 0;
        $total_productos_lista = 0;
        $total_productos_price_f = 0.00;
        $todalstok = 0;
        $producto_atr = false;
        if (!empty($_POST['post_id'])) {
            $pendiente_prod = $db->where('id',$_POST['post_id'])->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getOne('imventario');
            $atributos_inv = $db->objectbuilder()->where('id_imventario', $_POST['post_id'])->get('imventario_atributos');
            if(!empty($pendiente_prod)) {
                $db->where('id', $pendiente_prod->id)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->delete('imventario');
                if(!empty($atributos_inv)){
                    $todalstok = $db->where('atributo',$pendiente_prod->atributo)->getValue('imventario','COUNT(*)');
                    $producto_atr = $pendiente_prod->atributo;
                }else{
                    $todalstok = $db->where('producto',$pendiente_prod->producto)->getValue('imventario','COUNT(*)');
                    $producto_atr = $pendiente_prod->producto;
                }
            }
            $total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
            if($total_productos_lista>0) {
                $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
            }
            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
            
            $data = array(
                'status' => 200,
                'cantidad' => $todalstok,
                'producto' => $producto_atr,
                'total_items' => $total_productos_grupo,
                'total_lista' => $total_productos_lista,
                'total_precio' => $total_productos_price
            );
        }else{
            $data['status'] = 400;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

	if ($s == 'new_compras'){
        $timesd = time();
        $usuario_b = $wo['user']['user_id'];
        $sucursal_actual = $wo['user']['sucursal'];
		$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
		if(empty($comprapendiente)) {
            $query  = mysqli_query($sqlConnect, " INSERT INTO " .T_COMPRAS. " (`user_id`,`sucursal`,`time`) VALUES ({$usuario_b},'{$sucursal_actual}' ,'{$timesd}') ");
                if ($query) {
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'Por favor comprueba tus detalles';
                }

		}else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
		}

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

    if ($s == 'trash_compra'){
        $total_productos_grupo = 0;
        $total_productos_lista = 0;
        $total_productos_price_f = 0.00;
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
        if(!empty($comprapendiente)) {
            $db->where('id', $comprapendiente->id)->where('sucursal',$wo['user']['sucursal'])->delete(T_COMPRAS);
            $total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
            $total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
            
            if($total_productos_lista>0) {
                $total_productos_price_f = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
            }
            $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');

            $data = array(
                'status' => 200,
                'total_items' => $total_productos_grupo,
                'total_lista' => $total_productos_lista,
                'total_precio' => $total_productos_price
            );
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'select_proveedor'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            $dataarray = array('proveedor' => $_POST['prov'],'numero_documento' => null,'proveedor_sucursal' => null);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->where('sucursal',$wo['user']['sucursal'])->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'select_proveedor_direccion'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            $dataarray = array('proveedor_sucursal' => $_POST['prov']);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->where('sucursal',$wo['user']['sucursal'])->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_number_document'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            $dataarray = array('numero_documento' => $_POST['docnum']);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->where('sucursal',$wo['user']['sucursal'])->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'agregar_guia'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            $dataarray = array('guia' => $_POST['guia'],'numero_guia' => null);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->where('sucursal',$wo['user']['sucursal'])->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_number_guia_remicion'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            $dataarray = array('numero_guia' => $_POST['docnum']);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->where('sucursal',$wo['user']['sucursal'])->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }



	if ($s == 'document') {
		if (!empty($_POST['comprobante'])){
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				if ($_POST['comprobante']=='boleta_simple') {
                    $cant_ventas = $db->where('documento', 'BS')->where('completado', '1')->where('sucursal',$wo['user']['sucursal'])->getValue(T_COMPRAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }
					$dataarray = array('documento' => 'BS', 'num_doc' => $numeroventa);
				}elseif($_POST['comprobante']=='boleta'){
					$cant_ventas = $db->where('documento', 'B')->where('completado', '1')->where('sucursal',$wo['user']['sucursal'])->getValue(T_COMPRAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }
                    $dataarray = array('documento' => 'B', 'num_doc' => $numeroventa);
				}elseif($_POST['comprobante']=='factura'){
                    $cant_ventas = $db->where('documento', 'F')->where('completado', '1')->where('sucursal',$wo['user']['sucursal'])->getValue(T_COMPRAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }
                    $dataarray = array('documento' => 'F', 'num_doc' => $numeroventa);
                }

				$db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->where('sucursal',$wo['user']['sucursal'])->update('compras', $dataarray);


				$data['status'] = 200;
				$data['message'] = '';
                $data['num_doc'] = $numeroventa;
			}else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
        header("Content-type: application/json");
        echo json_encode($data);
	}

    if($s == 'garantia_compra'){
        if(!empty($_POST['garantia'])) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            if(!empty($comprobante_user)) {
                // Define la cantidad de meses que deseas agregar
                $cantidad_meses = $_POST['garantia']; // Cambia el número según sea necesario

                // Obtiene la fecha del $_POST y la convierte en un objeto DateTime
                $fecha = new DateTime($_POST['fecha']);

                // Agrega la cantidad de meses especificada
                $fecha->modify("+$cantidad_meses months");

                // Obtiene la nueva fecha formateada para su uso en la consulta
                $nueva_fecha = $fecha->format('Y-m-d'); // Mantén el formato completo con horas, minutos y segundos

                
                                                

                // Construye el array de datos para actualizar
                $dataArray = array(
                    'garantia' => $nueva_fecha,
                    'garantia_m' => $cantidad_meses
                );

                // Construye la consulta usando MysqliDb
                $db->where('user_id', $comprobante_user->user_id)
                   ->where('completado', '0')
                   ->where('sucursal', $wo['user']['sucursal'])
                   ->update(T_COMPRAS, $dataArray);

                $orden_pendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
                if($orden_pendiente->garantia_m == 0) {
                    $end_date_de_garantia = false;
                }else{
                    $end_date_de_garantia = 'La garantia finalizara en: '.fecha_restante($orden_pendiente->garantia);
                }

                $data = array(
                    'status' => 200,
                    'garantia'   => $end_date_de_garantia
                );
            }else{
                $data['status']  = 400;
                $data['message'] = 'Por favor comprueba tus detallesdd';
            }
        }elseif($_POST['garantia']==0){
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne(T_COMPRAS);
            $dataArrayv = array(
                'garantia' => null,
                'garantia_m' => 0
            );
            $db->where('user_id', $comprobante_user->user_id)
               ->where('completado', '0')
               ->where('sucursal', $wo['user']['sucursal'])
               ->update(T_COMPRAS, $dataArrayv);

            $data = array(
                'status' => 200,
                'garantia'   => ''
            );
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'finalizar_compra') {
        // Validar datos de entrada
        if(!empty($_POST['fecha']) || !empty($_POST['price_dat'])) {
            // Obtener la fecha actual
            $timesd = time();
            $fecha = new DateTime($_POST['fecha']);
            $nueva_fecha = $fecha->format('Y-m-d');

            // Obtener la compra pendiente del usuario
            $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                                   ->where('completado','0')
                                   ->where('sucursal',$wo['user']['sucursal'])
                                   ->getOne(T_COMPRAS);

            // Verificar si hay una compra pendiente
            if (!empty($comprapendiente)) {
                // Actualizar la compra
                $dataarrayd = array(
                    'precio'     => $_POST['price_dat'],
                    'completado' => '1',
                    'fecha'      => $nueva_fecha
                );
                $db->where('id',$comprapendiente->id)
                   ->update(T_COMPRAS, $dataarrayd);

                // Actualizar inventarios
                $inventarios = array(
                    'estado' => 1,
                    'fecha'  => $nueva_fecha
                );
                $db->where('id_comprobante',$comprapendiente->id)
                   ->where('estado', '0')
                   ->where('id_sucursal',$wo['user']['sucursal'])
                   ->update('imventario', $inventarios);

                $data['status'] = 200;
            } else {
                $data['status'] = 400;
                $data['message'] = 'Por favor comprueba tus detalles';
            }
        }else{
            $data['status'] = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }


}
 ?>
 
 