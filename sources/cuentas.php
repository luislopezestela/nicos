<?php 
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=home'));
  exit();

}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'cuentas';
$wo['title']       = 'Cuentas';
$wo['content']     = lui_LoadPage('cuentas/content');
 ?>