<?php 
if ($f == 'open_lightbox') {
    $html = '';
    if (!empty($_GET['post_id'])) {
        $wo['story'] = lui_PostData($_GET['post_id']);
        if (!empty($wo['story'])) {
            $html = lui_LoadPage('lightbox/content');
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
