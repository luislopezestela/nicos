<?php 
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=home'));
  exit();

}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'ventas';
$wo['title']       = 'Ventas';
$wo['content']     = lui_LoadPage('ventas/content');
 ?>