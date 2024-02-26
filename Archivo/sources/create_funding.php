<?php
if ($wo['loggedin'] == false || $wo['config']['funding_system'] != 1) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!$wo['config']['can_use_funding']) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'create_funding';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('create_funding/content');
