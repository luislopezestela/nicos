<?php 
if ($f == "delete-reply" && lui_CheckMainSession($hash_id) === true) {
    $data = array(
        'status' => 500
    );
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        if (lui_DeleteThreadReply(lui_Secure($_GET['id']))) {
            $data['status'] = 200;
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
