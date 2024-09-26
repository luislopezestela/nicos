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

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'caja';
$wo['title']       = 'Caja registradora';
$wo['content']     = lui_LoadPage('caja/content');
}else{
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}