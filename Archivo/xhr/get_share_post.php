<?php 
if ($f == 'get_share_post') {
    $data['status'] = 400;
    if (!empty($_GET['post_id'])) {
        $wo['current_post'] = $wo['story'] = lui_PostData(lui_Secure($_GET['post_id']));
        if (!empty($wo['story'])) {
            $data['html'] = lui_LoadPage('lightbox/share_post');
            $data['status'] = 200;
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}


