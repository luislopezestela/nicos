<?php
if ($wo['loggedin'] == false || $wo['config']['games'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!$wo['config']['can_use_games']) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'game';
$wo['title']       =  $wo['lang']['my_games'];
$wo['content']     = lui_LoadPage('games/my-games');