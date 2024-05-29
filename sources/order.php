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
$wo['ventas']  = $db->where('hash_id', $wo['hash_id'])->getOne(T_VENTAS);
$wo['documento']  = $db->where('hash_id', $wo['hash_id'])->getOne(T_VENTAS);  
$wo['orders'] = $db->where('id_comprobante_v',$wo['ventas']->id)->groupBy('atributo')->orderBy('id', 'DESC')->get('imventario');
$wo['html']    = '';
$wo['htmlprices'] = '';
if (empty($wo['ventas']) || empty($wo['ventas']) || ($wo['ventas']->sucursal != $wo['user']['sucursal'] && !lui_IsAdmin() && !lui_IsModerator())) {
    header("Location: $site_url/404");
    exit;
}
$wo['total']              = 0;
$wo['total_commission']   = 0;
$wo['total_final_price']  = 0;
$wo['address_id']         = 0;
$wo['cantidad_productos'] = 0;
$wo['imagen_producto']    = 0;
foreach ($wo['orders'] as $key => $wo['order']) {
    $wo['comprass'] = $wo['ventas'];
    $wo['order']->product = lui_GetProduct($wo['order']->producto);
    $wo['total'] += $wo['order']->precio;
    $wo['cantidad_productos'] = $db->where('id_comprobante_v',$wo['ventas']->id)->where('atributo',$wo['order']->atributo)->getValue('imventario','COUNT(*)');
    if ($wo['order']->color==0) {
        $rutadeimage = $wo['order']->product['images'][0]['image_mini'];
        $ch = curl_init($rutadeimage);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $statuss = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($statuss == 200) {
            $wo['imagen_producto'] = $wo['order']->product['images'][0]['image_mini'];
        }else{
            $wo['imagen_producto'] = $wo['order']->product['images'][0]['image_org'];
        }
    }else{
        $wo['producto_images'] = lui_GetProductImages_color($wo['order']->product['id'],$wo['order']->color);

        $ch = curl_init($wo['producto_images'][0]['image_mini']);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $statuss = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($statuss == 200) {
            $wo['imagen_producto'] = $wo['producto_images'][0]['image_mini'];
        }else{
            $wo['imagen_producto'] = $wo['producto_images'][0]['image_org'];
        }
    }
    //$wo['total_commission'] += $wo['order']->commission;
    //$wo['total_final_price'] += $wo['order']->final_price;
    //$wo['address_id'] = $wo['order']->address_id;
    //$wo['html'] .= lui_LoadPage('order/list');
}
$items_compra = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante_v',$wo['documento']->id)->get('imventario');
$htmldocumento = "";
$productos_vistos = [];
foreach ($items_compra as $value) {
    $producto = lui_GetProduct($value->producto);
    $producto_id = $producto['id'];
    if (in_array($producto_id, $productos_vistos)) {
        continue;
    }
    $variantes_color = [];
    foreach ($items_compra as $item) {
        if ($item->producto == $producto_id) {
            $variantes_color[] = $item;
        }
    }
    $variantes_atributos = [];
    $atributos = $db->objectbuilder()->where('id_imventario', $value->id)->get('imventario_atributos');
    foreach ($atributos as $atributo) {
        $variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
    }
    $identificador_unico = $wo['documento']->id . '_' . $producto_id;
    foreach ($variantes_atributos as $atributo => $opciones) {
        $identificador_unico .= '_' . implode('_', $opciones);
    }
    if (in_array($identificador_unico, $productos_vistos)) {
        continue;
    }
    $indexdefault_currency = array_search($variantes_color[0]->currency, array_column($wo['currencies'], 'text'));
    $wo['product']['id'] = $producto['id'];
    $wo['product']['id_productos'] =  $identificador_unico;
    $wo['product']['id_imventarios'] =  $value->id;
    $wo['product']['units'] = $producto['units'];
    $wo['product']['images'] = $producto['images'];
    $wo['product']['name'] = $producto['name'];
    $wo['product']['modelo'] = $producto['modelo'];
    $wo['product']['sku'] = $producto['sku'];
    $wo['product']['comprap'] = $wo['documento']->id;
    $wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';
    $wo['product']['inventario'] = $variantes_color[0]->id;
    $wo['product']['color'] = $variantes_color[0]->color;
    $wo['product']['precio'] = $variantes_color[0]->precio;
    $cantidad_productos = 0;
    if (!empty($variantes_atributos)) {
        $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante_v = {$wo['documento']->id}";
        foreach ($variantes_atributos as $atributo => $opciones) {
            foreach ($opciones as $opcion) {
                $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
            }
        }
        $cantidad_productos = $db->rawQueryOne($sql)->cantidad;
    } else{
        $cantidad_productos = $db->where('id_comprobante_v', $wo['documento']->id)->where('producto', $wo['product']['id'])->where('color', $wo['product']['color'])->getValue('imventario', 'COUNT(*)');
    }
    $wo['product']['cantidad'] = $cantidad_productos;
    $wo['html'] .= lui_LoadPage('order/lista');
    $productos_vistos[] = $identificador_unico;
}
$wo['productos_vistos_moneda'] = [];
foreach ($items_compra as $moneda) {
    $la_monedas_de_products = $moneda->currency;
    if (!in_array($la_monedas_de_products, $wo['productos_vistos_moneda'])) {
       $wo['productos_vistos_moneda'][] = $la_monedas_de_products; 
    }
}
$wo['subtotal_dos'] = 0;
$wo['igv_dos'] = 0;
$wo['total_dos'] = 0;
$wo['total_productos_lista'] = 0;
if ($wo['documento']->documento=='BS') {
    $wo['numero_documento_a'] = $wo['documento']->num_doc;
}elseif($wo['documento']->documento=='B'){
    $wo['numero_documento_a'] = $wo['documento']->numero_documento;
}elseif($wo['documento']->documento=='F'){
    $wo['numero_documento_a'] = $wo['documento']->numero_documento;
}

foreach ($wo['productos_vistos_moneda'] as $wo['moneds']) {
    $wo['indexdefault_currencys'] = array_search($wo['moneds'], array_column($wo['currencies'], 'text'));
    $total_productos_lista_uno = $db->where('id_comprobante_v',$wo['documento']->id)->where('currency',$wo['moneds'])->getValue('imventario','COUNT(*)');
    if ($total_productos_lista_uno>0) {
        $total_productos_price_dos = $db->where('id_comprobante_v',$wo['documento']->id)->where('currency',$wo['moneds'])->getValue('imventario','SUM(precio)');
        
        $wo['subtotal_dos'] = number_format($total_productos_price_dos / (1.18), '2','.','');
        $wo['igv_dos']          = number_format($wo['subtotal_dos'] * 0.18, '2','.','');
        $wo['total_dos']    = number_format($total_productos_price_dos, '2','.',''); 
    }
                       
    $wo['total_productos_lista'] = $total_productos_lista_uno;
    $wo['htmlprices'] .= lui_LoadPage('order/listaprecio');
}

$wo['total']             = number_format($wo['total'], 2);
$wo['total_commission']  = number_format($wo['total_commission'], 2);
$wo['total_final_price'] = number_format($wo['total_final_price'], 2);
$wo['address']           = $db->where('id', $wo['address_id'])->getOne(T_USER_ADDRESS);
$wo['description']       = $wo['config']['siteDesc'];
$wo['keywords']          = $wo['config']['siteKeywords'];
$wo['page']              = 'order';
$wo['title']             = $wo['lang']['order_details'];
$wo['content']           = lui_LoadPage('order/content');

