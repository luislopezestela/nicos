<?php 
if ($f == 'clearChat') {
    $clear = lui_ClearRecent();
    if ($clear === true) {
        $data = array(
            'status' => 200
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
