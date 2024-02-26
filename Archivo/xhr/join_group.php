<?php 
if ($f == 'join_group') {
    if (isset($_GET['group_id']) && lui_CheckMainSession($hash_id) === true) {
        if (lui_IsGroupJoined($_GET['group_id']) === true || lui_IsJoinRequested($_GET['group_id'], $wo['user']['user_id']) === true) {
            if (lui_LeaveGroup($_GET['group_id'], $wo['user']['user_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => ''
                );
            }
        } else {
            if (lui_RegisterGroupJoin($_GET['group_id'], $wo['user']['user_id'])) {
                $data = array(
                    'status' => 200,
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
