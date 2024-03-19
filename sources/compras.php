<?php 
if ($wo['config']['store_system'] != 'on') {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (lui_IsAdmin() || lui_IsModerator()){
$wo['compras'] = $db->where('product_owner_id', $wo['user']['user_id'])->orderBy('id', 'DESC')->groupBy('hash_id')->get(T_USER_ORDERS, 10);
$wo['html']   = '<div class="orders_empty_state">' . $wo['lang']['no_orders_found'] . '</div>';
if (!empty($wo['compras'])) {
    $wo['html'] = '';
    foreach ($wo['compras'] as $key => $wo['order']) {
        $wo['product'] = $db->where('id', $wo['order']->product_id)->getOne(T_PRODUCTS, array('name'));
        $wo['count']       = $db->where('hash_id', $wo['order']->hash_id)->getValue(T_USER_ORDERS, 'count(*)');
        $wo['items_count'] = $db->where('hash_id', $wo['order']->hash_id)->getValue(T_USER_ORDERS, 'sum(units)');
        $wo['price']       = $db->where('hash_id', $wo['order']->hash_id)->getValue(T_USER_ORDERS, 'sum(price)');
        $wo['price']       = number_format($wo['price'], 2);
        $wo['html'] .= lui_LoadPage('compras/list');
    }
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'compras';
$wo['title']       = $wo['lang']['compras'];
$wo['content']     = lui_LoadPage('compras/content');
}else{
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}