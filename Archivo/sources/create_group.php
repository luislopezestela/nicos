<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if ($wo['config']['groups'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!$wo['config']['can_use_groups']) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'create_group';
$wo['title']       = $wo['lang']['create_new_group'];
$wo['content']     = lui_LoadPage('group/create-group');
