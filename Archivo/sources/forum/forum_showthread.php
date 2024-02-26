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
if (isset($_GET['tid']) && is_numeric($_GET['tid'])) {
	$thread = lui_GetForumThreads(array("id" => $_GET['tid'], "preview" => true));
	if (count($thread) > 0) {	
		lui_AddThreadView($_GET['tid']);
		$wo['description']   = $wo['config']['siteDesc'];
		$wo['keywords']      = $wo['config']['siteKeywords'];
		$wo['page']          = 'forum';
		$wo['active']        = null;
		$wo['thread']        = $thread[0];
		$wo['forums']        = lui_GetForums();
		$wo['forumeditor']   = true;
		$wo['title']         = $wo['config']['siteTitle'];
		$wo['content']       = lui_LoadPage('forum/showthread');
	}
}
