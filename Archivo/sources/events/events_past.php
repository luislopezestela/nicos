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
$wo['active']      = 5;
$wo['events']      = lui_GetPastEvents();
$wo['title']       = $wo['lang']['events_past'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('events/events-past');