<?php 
if ($f == 'send_mails') {
    if ($wo['config']['emailNotification'] == 0) {
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    $send = lui_SendMessageFromDB();
    if ($send) {
        $data = array(
            'status' => 200
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
