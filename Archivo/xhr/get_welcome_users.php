<?php 
if ($f == 'get_welcome_users') {
    $html = '';
    foreach (lui_WelcomeUsers() as $wo['user']) {
        $html .= lui_LoadPage('welcome/user-list');
    }
    $data = array(
        'status' => 200,
        'html' => $html
    );
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
