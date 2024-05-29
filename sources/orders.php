<?php 
if ($wo['config']['store_system'] != 'on') {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
//$wo['orders'] = $db->where('sucursal', $wo['user']['sucursal'])->orderBy('id', 'DESC')->groupBy('hash_id')->get(T_USER_ORDERS, 10);
$wo['orders'] = $db->where('sucursal', $wo['user']['sucursal'])->orderBy('id', 'DESC')->get(T_VENTAS, 10); /// T_USER_ORDERS


$wo['html']   = '<div class="orders_empty_state">' . $wo['lang']['no_orders_found'] . '</div>';
if (!empty($wo['orders'])) {
    $wo['html'] = '';
    foreach ($wo['orders'] as $key => $wo['order']) {
        $wo['comprass'] = $wo['order'];
        $wo['html'] .= lui_LoadPage('orders/lista');
    }
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'orders';
$wo['title']       = $wo['lang']['orders'];
$wo['content']     = lui_LoadPage('orders/content');
