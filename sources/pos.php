<?php 
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=home'));
  exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'pos';
$wo['title']       = 'Punto de ventas';
$wo['content']     = lui_LoadPage('pos/content');
 ?>