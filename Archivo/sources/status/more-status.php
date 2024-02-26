<?php 
if ($wo['loggedin'] == false || $wo['config']['user_status'] == 0) {
	  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
	  exit();
}
if ($wo['config']['user_status'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
	  exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'status';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('status/more');