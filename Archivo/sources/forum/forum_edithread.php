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
	$thread	=  lui_GetForumThreads(array('id' => $_GET['tid'],'user' => $wo['user']['id']));
	if (!empty($thread)) {	
		$wo['description'] = $wo['config']['siteDesc'];
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'forum';
		$wo['bbcodeditor'] = true;
		$wo['active']      = null;
		$wo['thread']      = $thread[0];
		$wo['title']       = $wo['config']['siteTitle'];
		$wo['content']     = lui_LoadPage('forum/edithread');
	}
}
