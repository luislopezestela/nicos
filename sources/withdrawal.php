<?php 
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=products'));
    exit();
}
if ($wo['config']['affiliate_system'] != 1 && $wo['config']['point_allow_withdrawal'] != 1 && $wo['config']['funding_system'] != 1 && $wo['config']['store_system'] != 'on') {
	header("Location: " . $wo['config']['site_url']);
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'withdrawal';
$wo['title']       = $wo['lang']['withdrawal'];
$wo['content']     = lui_LoadPage('withdrawal/content');