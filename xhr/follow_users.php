<?php 
if ($f == 'follow_users') {
    if (!empty($_POST['user'])) {
        $continue = false;
        $ids      = @explode(',', $_POST['user']);
        foreach ($ids as $id) {
            if (lui_RegisterFollow($id, $wo['user']['user_id']) === true) {
                $continue = true;
            }
        }
        lui_UpdateUserData($wo['user']['user_id'], array(
            'startup_follow' => '1',
            'start_up' => '1'
        ));
        $user_data = lui_UpdateUserDetails($wo['user']['user_id'], false, false, true);
        $data = array(
            'status' => 200
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
