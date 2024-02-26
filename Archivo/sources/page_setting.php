<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if ($wo['config']['pages'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (empty($_GET['page'])) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['setting']['admin'] = false;
if (isset($_GET['page']) && !empty($_GET['page'])) {
    if (lui_PageExists($_GET['page']) === false) {
        header("Location: " . lui_SeoLink('index.php?link1=404'));
        exit();
    }
    $page_id                = lui_PageIdFromPagename($_GET['page']);
    $wo['setting']['admin'] = true;
    if (empty($page_id)) {
        header("Location: " . lui_SeoLink('index.php?link1=welcome'));
        exit();
    }
    $wo['setting'] = lui_PageData($page_id);
}
if (lui_IsPageOnwer($page_id) === false) {
    if (lui_IsAdmin() === false && lui_IsModerator() === false) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
}
$array  = array(
    'general-setting' => 'general',
    'profile-setting' => 'info',
    'social-links' => 'social',
    'delete-page' => 'delete_page',
    'avatar-setting' => 'avatar',
    'design-setting' => 'design',
    'admins' => 'admins',
    'analytics' => 'analytics'
);
$s_page = 'general';
if (!empty($_GET['link3']) && in_array($_GET['link3'], array_keys($array))) {
    $s_page = $array[$_GET['link3']];
}
if ($wo['setting']['user_id'] != $wo['user']['id'] && !lui_IsCanPageUpdate($wo['setting']['page_id'], $s_page)) {
    $allowed = lui_GetAllowedPages($page_id);
    if (!empty($allowed) && !empty($allowed[0])) {
        $_GET['link3'] = $allowed[0];
    } else {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'page_setting';
$wo['title']       = $wo['lang']['setting'];
$wo['content']     = lui_LoadPage('page-setting/content');
