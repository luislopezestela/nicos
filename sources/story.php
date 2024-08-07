<?php
$wo['content']     = '';
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'story';
$wo['title']       = '';
$wo['title'] .= ' | ' . $wo['config']['siteName'];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $placement = '';
    if ($wo['loggedin'] == true) {
        if (lui_IsAdmin()) {
            $placement = 'admin';
        }
    }
    $id = lui_GetPostIdFromUrl($_GET['id']);
    if (empty($id) || !is_numeric($id)) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
    if (!empty($_GET['ref']) && is_numeric($_GET['ref']) && $_GET['ref'] > 0) {
        $wo['story'] = lui_PostData($id, $placement, 'not_limited', lui_Secure($_GET['ref']));
    } else {
        $wo['story'] = lui_PostData($id, $placement, 50);
    }
    if (empty($wo['story'])) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    } else if (empty($wo['story']['post_id'])) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    } else if (lui_PostExists($wo['story']['post_id']) === false) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
    $wo['story']['page'] = 1;
    $wo['content']       = lui_LoadPage('story-content/content');
    $wo['description']   = lui_Secure(mb_substr($wo['story']['Orginaltext'], 0, 156, "utf-8"));
    $wo['description']   = str_replace('<br>', "", $wo['description']);
    $wo['description']   = str_replace('</ br>', "", $wo['description']);
    $wo['description']   = str_replace('<br />', "", $wo['description']);
    $wo['keywords']      = '';
} else {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (!empty($wo['description'])) {
    $wo['title'] =  FilterStripTags(lui_Secure(lui_GetShortTitle($wo['story']['Orginaltext'], false, 50)));
} else {
    $wo['title'] = $wo['config']['siteTitle'];
}
if (empty($wo['description'])) {
    $wo['description'] = $wo['config']['siteDesc'];
}
if (!empty($wo['story']['album_name'])) {
    $wo['title'] = FilterStripTags(lui_Secure($wo['story']['album_name']));
}
if (!empty($wo['story']['product_id'])) {
    $wo['title']       = FilterStripTags(lui_Secure($wo['story']['product']['name'])). ' - ' . $wo['config']['siteName'];
    $wo['keywords']      = FilterStripTags(lui_Secure($wo['story']['product']['name']));
    $wo['description'] = FilterStripTags(strip_tags(lui_Secure($wo['story']['product']['description'])));
}
?>
