<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if ($wo['config']['classified'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (!$wo['config']['can_use_market']) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
$product = $wo['product'] = lui_GetProduct($_GET['id']);
if (empty($product)) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
$post_id = lui_GetPostIDFromProdcutID($_GET['id']);
if (empty($post_id)) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (lui_IsPostOnwer($post_id, $wo['user']['user_id']) === false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'edit_product';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('products/edit');
