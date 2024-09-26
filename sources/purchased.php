<?php
if ($wo['config']['store_system'] != 'on') {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['purchased'] = $db->where('user_id', $wo['user']['user_id'])->where('estado', 1)->orderBy('id', 'DESC')->get(T_VENTAS, 20);
$wo['html']      = '<div class="purchased_empty_state"> ' . $wo['lang']['no_purchased_found'] . '</div>';
if (!empty($wo['purchased'])) {
    $wo['html'] = '';
    foreach ($wo['purchased'] as $key => $wo['purchase']) {
        $wo['purchase']['type'] = $wo['lang']['order'];
        $wo['purchase']['date'] = lui_Time_Elapsed_String($wo['purchase']['time']);
        $wo['purchase']['url']  = lui_SeoLink('index.php?link1=customer_order&id=' . $wo['purchase']['hash_id']);
        $wo['estadodeventa'] = estadodeventaCliente_tienda($wo['purchase']['estado_venta']);
        $wo['sucursal_entrega']     = $db->where('id', $wo['purchase']['sucursal_entrega'])->getOne('lui_sucursales');
        $wo['html'] .= lui_LoadPage('purchased/lista');
    }
}

$wo['have_products'] = $db->where('product_owner_id',$wo['user']['user_id'])->getValue(T_USER_ORDERS,'COUNT(*)');
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'purchased';
$wo['title']       = $wo['lang']['purchased'];
$wo['content']     = lui_LoadPage('purchased/content');
