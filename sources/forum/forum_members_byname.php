<?php
if ($wo['config']['forum_visibility'] == 1) {
	if ($wo['loggedin'] == false) {
	  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
	  exit();
	}
}


if ($wo['config']['forum'] == 0) {
	header("Location: " . $wo['config']['site_url']);
    exit();
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'forum';
$wo['active']      = null;
$wo['char']        = lui_Secure($_GET['char']);
$wo['members']     = lui_GetForumUsers(array("key" => lui_Secure($_GET['char'])));
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('forum/members');