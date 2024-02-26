<?php 
if ($f == 'update_lastseen') {
    if (lui_CheckMainSession($hash_id) === true) {
        if($wo["loggedin"]==true){
            if (lui_LastSeen($wo['user']['user_id']) === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
