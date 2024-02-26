<?php 
if ($f == 'follow_user' && $wo['loggedin'] === true) {
    if (isset($_GET['following_id']) && lui_CheckMainSession($hash_id) === true) {
        $user_followers = lui_CountFollowing($wo['user']['id'], true);
        $friends_limit  = $wo['config']['connectivitySystemLimit'];
        if (lui_IsFollowing($_GET['following_id'], $wo['user']['user_id']) === true || lui_IsFollowRequested($_GET['following_id'], $wo['user']['user_id']) === true) {
            if (lui_DeleteFollow($_GET['following_id'], $wo['user']['user_id'])) {
                $data = array(
                    'status' => 200,
                    'can_send' => 0,
                    'html' => ''
                );
            }
        } else if ($wo['config']['connectivitySystem'] == 1 && $user_followers >= $friends_limit) {
            $data = array(
                'status' => 400,
                'can_send' => 0
            );
        } else {
            if (lui_RegisterFollow($_GET['following_id'], $wo['user']['user_id'])) {
                $data = array(
                    'status' => 200,
                    'can_send' => 0,
                    'html' => ''
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
