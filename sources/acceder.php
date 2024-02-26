<?php
if ($wo['loggedin'] == true) {
  header("Location: " . $wo['config']['site_url']);
  exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'acceder';
$wo['title']       = $wo['config']['siteTitle']." | Iniciar session";
$wo['content']     = lui_LoadPage('welcome/content');
