<?php
if (isset($_GET['p'])) {
    if (lui_PageExists($_GET['p']) === true && lui_PageActive($_GET['p'])) {
        $page_id            = lui_PageIdFromPagename($_GET['p']);
        $wo['page_profile'] = lui_PageData($page_id);
    } else {
        header("Location: " . lui_SeoLink('index.php?link1=404'));
        exit();
    }
} else {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (isset($_GET['boosted']) && $wo['config']['pro'] == 1 && $wo['loggedin'] == true && $wo['page_profile']['boosted'] == 0) {
    if ($wo['page_profile']['is_page_onwer'] == true) {
        if ($wo['user']['is_pro'] == 1) {
            if ($wo['user']['pro_type'] > 1) {
                $array  = array(
                    'boosted' => 1
                );
                $update = lui_UpdatePageData($page_id, $array);
            }
        }
    }
}
if ($wo['config']['pages'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['page_profile']['page_description'];
$wo['keywords']    = '';
$wo['page']        = 'page';
$wo['title']       = $wo['page_profile']['name'];
$wo['content']     = lui_LoadPage('page/content');
