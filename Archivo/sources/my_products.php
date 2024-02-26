<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['classified'] == 0) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if (!$wo['config']['can_use_market']) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}

$wo['have_products'] = $db->where('product_owner_id',$wo['user']['user_id'])->getValue(T_USER_ORDERS,'COUNT(*)');
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'my_products';
$wo['title']       = $wo['lang']['my_products'];
$wo['content']     = lui_LoadPage('products/my-products');