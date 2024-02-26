<?php
if (Wo_IsUserPro() === false || $wo['loggedin'] == false || $wo['config']['pro'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'upgraded';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('upgraded/content');