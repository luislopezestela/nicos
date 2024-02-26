<?php
/* API / Developers (will be available on future updates) */
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (empty($_GET['app_id'])) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (lui_IsAdmin() || lui_IsModerator()) {
} else {
    if (lui_IsAppOnwer($_GET['app_id']) === false) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
}
$wo['app']         = lui_GetApp($_GET['app_id']);
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'developers';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('graph/app-page');
