<?php
if ($wo['loggedin'] == false) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}

if (!$wo['config']['can_use_affiliate']) {
    $wo['config']['affiliate_system'] = 0;
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'setting';
$wo['title']       = $wo['lang']['setting'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('setting/content');