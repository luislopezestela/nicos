<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['events'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!$wo['config']['can_use_events']) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (isset($_GET['eid']) && is_numeric($_GET['eid'])) {
		$event             = lui_EventData($_GET['eid']);
	if ($event  && !empty($event) && (Is_EventOwner($event['id']) || lui_IsAdmin())) {
		$wo['description'] = $wo['config']['siteDesc'];
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'events';
		$wo['active']      = null;
		$wo['event']       = $event;
		$wo['title']       = $wo['lang']['edit_event'] . ' | ' . $wo['config']['siteTitle'];
		$wo['content']     = lui_LoadPage('events/edit-event');
	}

}
