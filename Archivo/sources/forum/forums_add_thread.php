<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['forum'] == 0) {
	header("Location: " . $wo['config']['site_url']);
    exit();
}
if (!$wo['config']['can_use_forum']) {
	  header("Location: " . $wo['config']['site_url']);
    exit();
}
if (isset($_GET['fid']) && is_numeric($_GET['fid'])) {
	$forum	=  lui_GetForum($_GET['fid']);
	if (!empty($forum)) {	
		$wo['description'] = $wo['config']['siteDesc'];
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'forum';
		$wo['bbcodeditor'] = true;
		$wo['active']      = null;
		$wo['forum_data']  = $forum;
		$wo['title']       = $wo['config']['siteTitle'];
		$wo['content']     = lui_LoadPage('forum/forumsadd');
	}
}
