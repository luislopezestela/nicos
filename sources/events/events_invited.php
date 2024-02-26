<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['events'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'events';
$wo['active']      = 3;
$wo['events']      = lui_GetInvitedEvents();
$wo['title']       = $wo['lang']['event_invited'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('events/events-invited');
