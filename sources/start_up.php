<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (lui_IsUserComplete($wo['user']['user_id']) === false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if ($wo['user']['startup_image'] == 0) {
    $page = 'avatar_startup';
} else if ($wo['user']['start_up_info'] == 0) {
    $page = 'info_startup';
} else if ($wo['user']['startup_follow'] == 0) {
    $wo['users'] = lui_GetFemusUsers();
    if ($wo['config']['connectivitySystem'] == 1 || empty($wo['users'])) {
        lui_UpdateUserData($wo['user']['user_id'], array(
            'start_up' => 1,
            'startup_follow' => 1
        ));
        header("Location: " . lui_SeoLink('index.php?link1=welcome'));
        exit();
    }
    $page = 'follow_startup';
} else {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'start_up';
$wo['title']       = $wo['lang']['lets_go'];
$wo['content']     = lui_LoadPage('start_up/' . $page);
