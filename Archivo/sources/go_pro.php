<?php
if ($wo['loggedin'] == false || $wo['config']['pro'] == 0) {
		lui_RedirectSmooth(lui_SeoLink('index.php?link1=welcome'));
}
if ($wo['config']['pro'] == 0) {
		header("Location: " . $wo['config']['site_url']);
    exit();
}
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'go_pro';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('go-pro/content');
