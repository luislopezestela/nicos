<?php
if ($wo['loggedin'] == false) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (empty($_GET['group'])) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if ($wo['config']['groups'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['setting']['admin'] = false;
if (isset($_GET['group']) && !empty($_GET['group'])) {
    if (lui_GroupExists($_GET['group']) === false) {
        header("Location: " . lui_SeoLink('index.php?link1=404'));
        exit();
    }
    $group_id               = lui_GroupIdFromGroupname($_GET['group']);
    $wo['setting']['admin'] = true;
    if (empty($group_id)) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
    $wo['setting'] = lui_GroupData($group_id);
}
if (lui_IsGroupOnwer($group_id) === false) {
    if (lui_IsAdmin() === false && lui_IsModerator() === false) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
}
$array  = array(
    'general-setting' => 'general',
    'privacy-setting' => 'privacy',
    'avatar-setting' => 'avatar',
    'group-members' => 'members',
    'analytics' => 'analytics',
    'delete-group' => 'delete_group'
);
$s_page = 'general';
if (!empty($_GET['link3']) && in_array($_GET['link3'], array_keys($array))) {
    $s_page = $array[$_GET['link3']];
}
if ($wo['setting']['user_id'] != $wo['user']['id'] && !lui_IsCanGroupUpdate($wo['setting']['id'], $s_page)) {
    $allowed = lui_GetAllowedGroupPages($group_id);
    if (!empty($allowed) && !empty($allowed[0])) {
        $_GET['link3'] = $allowed[0];
    } else {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'group_setting';
$wo['title']       = $wo['lang']['setting'];
$wo['content']     = lui_LoadPage('group-setting/content');
