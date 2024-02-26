<?php
if ($wo['loggedin'] == false || $wo['config']['offer_system'] != 1) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'offers';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('offers/content');
