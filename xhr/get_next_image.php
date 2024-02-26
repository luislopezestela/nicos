<?php 
if ($f == 'get_next_image') {
    $html      = '';
    $postsData = array(
        'limit' => 1,
        'filter_by' => 'photos',
        'after_post_id' => lui_Secure($_GET['post_id'])
    );
    if (!empty($_GET['type']) && !empty($_GET['id'])) {
        if ($_GET['type'] == 'profile') {
            $postsData['publisher_id'] = $_GET['id'];
        } else if ($_GET['type'] == 'page') {
            $postsData['page_id'] = $_GET['id'];
        } else if ($_GET['type'] == 'group') {
            $postsData['group_id'] = $_GET['id'];
        }
    }
    foreach (lui_GetPosts($postsData) as $wo['story']) {
        if (empty($wo['story']['album_name']) && $wo['story']['multi_image'] != 1) {
            $html .= lui_LoadPage('lightbox/content');
        }
    }
    $data = array(
        'status' => 200,
        'html' => $html
    );
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
