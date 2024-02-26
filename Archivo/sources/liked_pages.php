<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if ($wo['config']['pages'] == 0) {
	  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'liked_pages';
$wo['title']       = $wo['lang']['liked_pages'];
$wo['content']     = lui_LoadPage('page/liked-pages');
