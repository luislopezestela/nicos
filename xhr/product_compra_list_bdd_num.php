<?php
if ($f == 'product_compra_list_bdd_num') {
    $html = '';
    $total_productos_grupo = 0;
    $total_productos_lista = 0;
    $total_productos_price_f = 0.00;
    $timesd = time();
    $usuario_b = $wo['user']['user_id'];

    if (isset($_POST['value'])) {
        $producto = lui_GetProduct($_POST['value']);

        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_VENTAS);
        $comprapendiente_ids = $comprapendiente->id;

        $uniqueIdentifier = $comprapendiente_ids . '_' . $_POST['value'];
        $item_producrto = $db->where('atributo', $uniqueIdentifier)->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getOne('imventario');
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
            $total_productos_listas_stok = $db->where('estado','0')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
            $productos_stock_disponibles = $db->where('estado', [1, 2], 'IN')
            ->where('producto', $producto['id'])
            ->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');

            $productos_stock_disponible = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;


            // Obtener la cantidad deseada de productos a agregar
            $cantidad_deseada = $_POST['cantidad'];
            if ($cantidad_deseada <= $productos_stock_disponible) {
                $total_productos_listas_stoks = $db->where('estado','0')->where('atributo', $uniqueIdentifier)->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
                $cantidad_actual = $total_productos_listas_stoks;
    
                // Calcular la diferencia entre la cantidad deseada y la cantidad actual
                $diferencia = $cantidad_deseada - $cantidad_actual;
                $diferenciab = $cantidad_actual - $cantidad_deseada;
                // Verificar si hay suficientes productos disponibles en el inventario
                if ($diferencia > 0) {
                    if($_POST['color']==""){
                        // Agregar la cantidad restante al inventario
                        for ($i = 0; $i < $diferencia; $i++) {
                            // Resto del código para agregar un producto al inventario (simplemente copia el código existente aquí)
                            $dataarray = array(
                                'producto' => $producto['id'],
                                'id_comprobante_v' => $comprapendiente_ids,
                                'cantidad' => 1,
                                'tipo' => 'venta',
                                'modo' => "salida",
                                'estado' => 0,
                                'currency' => (!empty($wo['currencies'][$producto['currency']]['text'])) ? $wo['currencies'][$producto['currency']]['text'] : $producto['currency'],
                                'precio' => $actualizar_precio,
                                'atributo' => $uniqueIdentifier,
                                'orden' => $nextGroupNumber
                            );
                            $db->insert('imventario', $dataarray);
                        }
                    }else{
                        // Agregar la cantidad restante al inventario
                        for ($i = 0; $i < $diferencia; $i++) {
                            // Resto del código para agregar un producto al inventario (simplemente copia el código existente aquí)
                            $dataarray = array(
                                'producto' => $producto['id'],
                                'color'   => $_POST['color'],
                                'id_comprobante_v' => $comprapendiente_ids,
                                'cantidad' => 1,
                                'tipo' => 'venta',
                                'modo' => "salida",
                                'estado' => 0,
                                'currency' => (!empty($wo['currencies'][$producto['currency']]['text'])) ? $wo['currencies'][$producto['currency']]['text'] : $producto['currency'],
                                'precio' => $actualizar_precio,
                                'atributo' => $uniqueIdentifier,
                                'orden' => $nextGroupNumber
                            );
                            $db->insert('imventario', $dataarray);
                        }
                    }
                } elseif ($diferencia < 0) {
                    $productos_a_eliminar = $db->where('estado', 0)
                        ->where('atributo', $uniqueIdentifier)
                        ->where('producto', $producto['id'])
                        ->where('id_comprobante_v', $comprapendiente_ids)
                        ->orderBy('id', 'asc') // Ordenar por ID en orden ascendente
                        ->get('imventario', null, 'id');

                    foreach ($productos_a_eliminar as $producto_eliminar) {
                        if ($diferenciab > 0) {
                            $db->where('id', $producto_eliminar->id)->delete('imventario');
                            $diferenciab--;
                        } else {
                            break;
                        }

                    }


                    
                }
                $id_del_producto_agregado = $db->where('estado', 0)
                    ->where('atributo', $uniqueIdentifier)
                    ->where('producto', $producto['id'])
                    ->where('id_comprobante_v', $comprapendiente_ids)
                    ->orderBy('orden', 'asc')
                    ->getOne('imventario');

                if (!empty($id_del_producto_agregado)) {
                    $productID = $id_del_producto_agregado->id;
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

                    
                    $wo['product']['id'] = $producto['id'];
                    $wo['product']['units'] = $producto['units'];
                    $wo['product']['images'] = $producto['images'];
                    $wo['product']['name'] = $producto['name'];
                    $wo['product']['modelo'] = $producto['modelo'];
                    $wo['product']['sku'] = $producto['sku'];
                    $wo['product']['inventario'] = $productID;
                    $wo['product']['id_imventarios'] = $productID;
                    $wo['product']['id_productos'] =  $identificador_unico;
                    $wo['product']['color'] = false;
                    $wo['product']['comprap'] = $comprapendiente_ids;
                    $wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $wo['config']['classified_currency_s'];

                    $cantidad_productos = 0;
                    if (!empty($variantes_atributos)) {
                        $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante_v = {$comprapendiente_ids}";
                        foreach ($variantes_atributos as $atributo_atr => $opciones) {
                            foreach ($opciones as $opcion) {
                                $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo_atr} AND id_atributo_opciones = {$opcion})";
                            }
                        }
                        $cantidad_productos = $db->rawQueryOne($sql)->cantidad;
                    } else {
                        // Si no hay variantes de atributos, solo contar por color
                        $cantidad_productos = $db->where('id_comprobante_v', $comprapendiente_ids)->where('producto', $wo['product']['id'])->getValue('imventario', 'COUNT(*)');
                    }

                    

                    $wo['product']['cantidad'] = $cantidad_productos;
                    
                    $el_producto_inventario = $db->where('id',$productID)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante_v',$comprapendiente_ids)->getOne('imventario');
                    if (isset($el_producto_inventario)) {
                        $wo['product']['precio'] = $el_producto_inventario->precio;
                    }else{
                        $wo['product']['precio'] = '0.00';
                    }
                    
                    //$html = lui_LoadPage('compras/lista_compra');
                    $productos_vistos[] = $identificador_unico;
                    $total_productos_grupo = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(DISTINCT orden)');
                    $total_productos_lista = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
                    if($total_productos_lista>0) {
                        $total_productos_price_f = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','SUM(precio)');
                    }
                    if ($total_productos_lista === 0) {
                        $db->where('id', $comprapendiente->id)->delete(T_VENTAS);
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
                    $total_productos_listasc = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente_ids)->getValue('imventario','COUNT(*)');
                    if ($total_productos_listasc === 0) {
                       $db->where('id', $comprapendiente->id)->delete(T_VENTAS);
                    }
                    
                    $total_productos_price = number_format($total_productos_price_f, 2, ',', '.');
                    $data = array(
                        'producto' => [],
                        'status' => 200,
                        'sin_stock' => 0,
                        'total_stock' => $productos_stock_disponible,
                        'total_items' => 0,
                        'total_lista' => 0,
                        'total_precio' => $total_productos_price
                    );
                }
            }else{
                $data = array(
                    'status' => 400,
                    'sin_stock' => 1,
                    'message'  => 'No hay stok disponible '
                );
            }
        }
    } else {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles ';
    }

    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
?>
