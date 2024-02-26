<?php 
if ($f == 'accept_follow_request') {
    if (isset($_GET['following_id'])) {
        if (lui_AcceptFollowRequest($_GET['following_id'], $wo['user']['user_id'])) {
            $data = array(
                'status' => 200,
                'html' => lui_GetFollowButton($_GET['following_id'])
            );
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
