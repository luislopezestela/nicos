<?php
if ($wo['config']['store_system'] != 'on') {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (empty($_GET['id'])) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
$wo['hash_id'] = lui_Secure($_GET['id']);
$wo['purchase'] = $db->where('hash_id', $wo['hash_id'])->getOne(T_VENTAS);

$orders = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante_v',$wo['purchase']['id'])->get(T_INVENTARIO);

if (empty($orders)) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit;
}
$wo['total']             = 0;
$wo['total_commission']  = 0;
$wo['total_final_price'] = 0;
$wo['address_id']        = 0;
$wo['sucursal_id']        = 0;


$wo['sucursal_id'] = $wo['purchase']['sucursal_entrega'];
$wo['estadodeventa'] = estadodeventaCliente_tienda($wo['purchase']['estado_venta']);
$productos_vistos = [];
$wo['html']    = '';
$wo['main_product'] = '';
foreach ($orders as $order) {

    $producto = lui_GetProduct($order->producto);
    $producto_id = $producto['id'];
    $wo['main_product'] = $producto;

    if (in_array($producto_id, $productos_vistos)) {
        continue;
    }
    $variantes_color = [];
    foreach ($orders as $item) {
        if ($item->producto == $producto_id) {
            $variantes_color[] = $item;
        }
    }
    $variantes_atributos = [];
    $atributos = $db->objectbuilder()->where('id_imventario', $order->id)->get('imventario_atributos');
    foreach ($atributos as $atributo) {
        $variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
    }
    $identificador_unico = $wo['purchase']['id'] . '_' . $producto_id;
    foreach ($variantes_atributos as $atributo => $opciones) {
        $identificador_unico .= '_' . implode('_', $opciones);
    }
    if (in_array($identificador_unico, $productos_vistos)) {
        continue;
    }
    $indexdefault_currency = array_search($variantes_color[0]->currency, array_column($wo['currencies'], 'text'));

    $wo['producto']['id'] = $producto['id'];
    $wo['producto']['id_productos'] =  $identificador_unico;
    $wo['producto']['id_imventarios'] =  $order->id;
    $wo['producto']['units'] = $producto['units'];
    $wo['producto']['images'] = $producto['images'];
    $wo['producto']['name'] = $producto['name'];
    $wo['producto']['modelo'] = $producto['modelo'];
    $wo['producto']['sku'] = $producto['sku'];
    $wo['producto']['comprap'] = $wo['purchase']['id'];
    $wo['producto']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';
    $wo['producto']['inventario'] = $variantes_color[0]->id;
    $wo['producto']['color'] = $variantes_color[0]->color;
    $wo['producto']['precio'] = $variantes_color[0]->precio;
    $wo['can_review']  = 0;
    $wo['is_reviewed'] = 0;
    if ($wo['loggedin']) {
        $wo['can_review']  = $db->where('user_id', $wo['user']['user_id'])->where('id', $order->id)->where('estado', 'delivered')->getValue(T_VENTAS, 'COUNT(*)');
        $wo['is_reviewed'] = $db->where('user_id', $wo['user']['user_id'])->where('product_id', $producto['id'])->getValue(T_PRODUCT_REVIEW, 'COUNT(*)');
    }
    $cantidad_productos = 0;
    if (!empty($variantes_atributos)) {
        $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante_v = {$wo['purchase']['id']}";
        foreach ($variantes_atributos as $atributo => $opciones) {
            foreach ($opciones as $opcion) {
                $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
            }
        }
        $cantidad_productos = $db->rawQueryOne($sql)['cantidad'];
    } else{
        $cantidad_productos = $db->where('id_comprobante_v', $wo['purchase']['id'])->where('producto', $wo['producto']['id'])->where('color', $wo['producto']['color'])->getValue('imventario', 'COUNT(*)');
    }


    if (empty($wo['main_product'])) {
        $wo['main_product']['in_title'] = url_slug($wo['main_product']['name'], array(
            'delimiter' => '-',
            'limit' => 100,
            'lowercase' => true,
            'replacements' => array(
                '/\b(an)\b/i' => 'a',
                '/\b(example)\b/i' => 'Test'
            )
        ));
    }
    $wo['total'] = $cantidad_productos;
    $user_id = $wo['purchase']['user_id'];
    $subtotaldeitem = $variantes_color[0]->precio*$cantidad_productos;
    $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['producto']['inventario'])->get('imventario_atributos'); 
    if (!empty($variantes_atributos)){
        $atributos_producto_principal = [];
        foreach ($variantes_atributos as $atributo => $opciones){
            $nombre_atributo = $db->where('id', $atributo)->getOne('atributos')['nombre'];
            $valores_opciones_atributo = [];
            foreach ($opciones as $opcion){
                if($nombre_atributo=='Color'){
                    $buscar_nombre_de_color = $db->where('id', $opcion)->getOne('lui_products_colores')['lang_key'];
                    $nombre_opcion_atributo = $wo['lang'][$buscar_nombre_de_color];
                }else{
                    $nombre_opcion_atributo = $db->where('id', $opcion)->getOne('atributos_opciones')['nombre'];
                }
                $valores_opciones_atributo[] = $nombre_opcion_atributo;
            }
            $atributos_producto_principal[$nombre_atributo] = $valores_opciones_atributo;
        }
    }

    $wo['html'] .= '<div class="order-item">
    <div class="item-image">
        <svg viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: auto;">
            <!-- Rectángulo de fondo con bordes redondeados -->
            <rect x="0" y="0" width="150" height="150" rx="20" ry="20" fill="lightgray" />
            <!-- Imagen dentro del rectángulo redondeado -->
            <clipPath id="rectView">
                <rect x="0" y="0" width="150" height="150" rx="20" ry="20" />
            </clipPath>

            <image 
            x="0" 
            y="0" 
            width="150" 
            height="150" 
            xlink:href="'.$producto['images'][0]['image_org'].'" 
            clip-path="url(#rectView)" 
            preserveAspectRatio="xMidYMid slice" 
            />
        </svg>
    </div>
    <div class="item-details">
    <ul>';
    $added = false;
    $wo['html'] .= $wo['main_product']['name'];
    if (isset($atributos_inv)) {
        if (!empty($variantes_atributos)) {
            $wo['html'] .= ', ';
            $added = true;

            foreach ($atributos_producto_principal as $atributo => $valores) {
                $wo['html'] .= '<li>' . $atributo . ': ' . implode(', ', $valores) . '</li>';
            }
        } else {
            $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['producto']['id']);
            if ($opciones_del_producto) {
                if (!$added) {
                    $wo['html'] .= ', ';
                }
                $color_producto_sin_atributos = $db->where('id', $wo['producto']['color'])->getOne('lui_products_colores')['lang_key'];
                $wo['html'] .= '<li>Color: ' . $wo['lang'][$color_producto_sin_atributos] . '</li>';
            }
        }
    }

    $wo['html'] .= '</ul>
    </div>
        <div class="price-box">
            <div class="quantity">Cantidad: ' . $cantidad_productos . '</div>
            <div class="price-card">
                <h4>Precio unitario</h4>
                <p>' . $wo['producto']['symbol'] . ' ' . number_format(($variantes_color[0]->precio), 2) . '</p>
            </div>
            <div class="price-card">
                <h4>Precio total</h4>
                <p><span class="font-weight-semibold">' . $wo['config']['currency_symbol_array'][$order->currency] . ' ' . number_format(($subtotaldeitem), 2) . '</span></p>
            </div>
        </div>
    </div>';


    $productos_vistos[] = $identificador_unico;
}
$wo['registros_caja'] = $db->where('id_venta', $wo['purchase']['id'])->where('estado', 1)->get(T_CASH_REGISTRO);

$wo['vendedor'] = lui_UserData($wo['purchase']['id_del_vendedor']);
$wo['address']     = $db->where('id', $wo['address_id'])->getOne(T_USER_ADDRESS);
$wo['sucursal_entrega']     = $db->where('id', $wo['sucursal_id'])->getOne('lui_sucursales');
$wo['refund']      = $db->where('order_hash_id', $wo['hash_id'])->getOne(T_REFUND);
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'customer_order';
$wo['title']       = $wo['lang']['order_details'];
$wo['content']     = lui_LoadPage('customer_order/content');
