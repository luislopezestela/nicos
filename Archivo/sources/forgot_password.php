<?php
if ($wo['loggedin'] == true) {
  header("Location: " . $wo['config']['site_url']);
  exit();
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'welcome';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('welcome/forgot-password');

