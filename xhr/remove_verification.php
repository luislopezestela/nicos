<?php 
if ($f == 'remove_verification') {
    if (!empty($_GET['id']) && !empty($_GET['type'])) {
        if (lui_RemoveVerificationRequest($_GET['id'], $_GET['type']) === true) {
            $data = array(
                'status' => 200,
                'html' => lui_GetVerificationButton($_GET['id'], $_GET['type'])
            );
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
