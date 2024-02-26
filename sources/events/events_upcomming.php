<?php
if ($wo['config']['events_visibility'] == 1) {
	if ($wo['loggedin'] == false) {
	  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
	  exit();
	}
}

if ($wo['config']['events'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'events';
$wo['active']      = 1;
$wo['events']      = lui_GetEvents();
$wo['title']       = $wo['lang']['events_upcoming'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('events/events-upcomming');