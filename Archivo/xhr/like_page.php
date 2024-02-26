<?php 
if ($f == 'like_page') {
    if (!empty($_GET['page_id']) && lui_CheckMainSession($hash_id) === true) {
        if (lui_IsPageLiked($_GET['page_id'], $wo['user']['user_id']) === true) {
            if (lui_DeletePageLike($_GET['page_id'], $wo['user']['user_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => lui_GetLikeButton($_GET['page_id'])
                );
            }
        } else {
            if (lui_RegisterPageLike($_GET['page_id'], $wo['user']['user_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => lui_GetLikeButton($_GET['page_id'])
                );
                if (lui_CanSenEmails()) {
                    $data['can_send'] = 1;
                }
            }
        }
    }
    if ($wo['loggedin'] == true) {
        lui_CleanCache();
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
