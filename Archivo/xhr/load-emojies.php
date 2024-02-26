<?php 
if ($f == 'load-emojies') {
    $data = array(
        'status' => 200,
        'html' => lui_LoadPage('emojies/content')
    );
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
