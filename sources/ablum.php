<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'my_pages';
$wo['title']       = $wo['lang']['albums'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('page/my-pages');