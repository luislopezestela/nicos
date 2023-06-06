<?php
if ($wo['loggedin'] == false) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!isset($_GET['hash']) || empty($_GET['hash'])) {
	lui_RedirectSmooth($wo['config']['site_url']);
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = '';
$wo['page']        = 'hashtag';
$wo['title']       = '#' . $_GET['hash'] . ' | ' . $wo['config']['siteTitle'];
$wo['content'] = lui_LoadPage('hashtags/content');