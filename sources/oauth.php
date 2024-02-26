<?php
if (empty($_GET['app_id'])) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome') . '?last_url=' . urlencode($actual_link));
    exit();
}
$wo['app'] = array();
$app       = lui_IsValidApp($_GET['app_id']);
if ($app === true) {
    $app_id    = lui_GetIdFromAppID($_GET['app_id']);
    $wo['app'] = lui_GetApp($app_id);
    if (lui_AppHasPermission($wo['user']['user_id'], lui_GetIdFromAppID($_GET['app_id'])) === true) {
        $url = $wo['app']['app_website_url'];
        if (isset($_GET['redirect_uri']) && !empty($_GET['redirect_uri'])) {
            $url = $_GET['redirect_uri'];
        } else if (!empty($wo['app']['app_callback_url'])) {
            $url = $wo['app']['app_callback_url'];
        }
        $import = lui_GenrateCode($wo['user']['user_id'], lui_GetIdFromAppID($_GET['app_id']));
        header("Location: {$url}?code=$import");
        exit();
    }
} else {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'graph';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('graph/data-request');
