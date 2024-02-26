<?php
if ($wo['config']['product_visibility'] == 1) {
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'products';
$wo['title']       = $wo["lang"]['tienda'].' | '.$wo['config']['siteName'];
if (!empty($wo['category']['category_id'])) {
    $wo['title']       = FilterStripTags(lui_Secure($wo['story']['product']['name']));
}

$category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
$category_sub_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;

foreach ($wo['products_categories'] as $category) {
    if (!empty($category_id == $category['id'])) {
        if($category['id']==0) {
            $wo['title']       = FilterStripTags(lui_Secure($wo["lang"]['tienda'])).' | '.$wo['config']['siteName'];
            $wo['keywords']    = $wo["lang"]['tienda'].' '.$wo['config']['siteName'].','.$wo['config']['siteKeywords'];
        }else{
            $wo['title']       = FilterStripTags(lui_Secure($wo["lang"][$category["lang_key"]]));
            $wo['keywords']    = FilterStripTags(lui_Secure($wo["lang"][$category["lang_key"]]));
       }
    }
}



$wo['content']     = lui_LoadPage('products/content');
