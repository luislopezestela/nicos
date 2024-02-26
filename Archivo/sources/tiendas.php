<?php
if ($wo['loggedin'] == false) {
    header("Location: " . $wo['config']['site_url']);
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

$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'tiendas';
$wo['title']       = 'Tiendas';
$wo['content']     = lui_LoadPage('tiendas/content');
