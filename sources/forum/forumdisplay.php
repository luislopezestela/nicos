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
if (isset($_GET['fid']) && is_numeric($_GET['fid'])) {
	$forum = lui_GetForumInfo($_GET['fid']);
	if (count($forum) > 0) {
		$wo['description'] = strip_tags($forum['forum']['description']);
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'forum';
		$wo['active']      = null;
		$wo['forum_data']  = $forum;
		$wo['count_thrd']  = lui_GetTotalThreads(array("forum" => $_GET['fid']));
		$wo['title']       =  $forum['forum']['name_lang'];
		$wo['content']     =  lui_LoadPage('forum/forumdisplay');
	}
}
