<?php
if ($wo['loggedin'] == true) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if ($wo['config']['user_registration'] == 0 && (!isset($_GET['invite']) || (!lui_IsAdminInvitationExists($_GET['invite']) && !lui_IsUserInvitationExists($_GET['invite'])))) {
    header("Location: " . $wo['config']['site_url']);
    exit();
} else {
    $page = 'register';
    $wo['description'] = $wo['config']['siteDesc'];
    $wo['keywords']    = $wo['config']['siteKeywords'];
    $wo['page']        = 'register';
    $wo['title']       = $wo['config']['siteTitle'];
    $wo['content']     = lui_LoadPage('welcome/' . $page);
}
