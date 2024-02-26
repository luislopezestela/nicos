<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'create_product';
$wo['title']       = $wo['lang']['sell_new_product'];
$wo['content']     = lui_LoadPage('products/create');
