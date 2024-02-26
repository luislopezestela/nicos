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
if (isset($_GET['eid']) && is_numeric($_GET['eid'])){
		$event              = lui_EventData($_GET['eid']);
	if ($event && !empty($event)) {
		$wo['description']  = strip_tags($event['description']);
		$wo['keywords']     = $wo['config']['siteKeywords'];
		$wo['page']         = 'events';
		$wo['event']        = $event;
		$wo['event']['going']      = lui_TotalGoingUsers($event['id']);
		$wo['event']['interested'] = lui_TotalInterestedUsers($event['id']);
		$wo['event']['invited']    = lui_TotalInvitedUsers($event['id']);
		$wo['events']       =  lui_GetSuggestedEvents(array("limit" => 5));
		$wo['title']        = $event['name'];
		$wo['content']      = lui_LoadPage('events/content');
	}
}
