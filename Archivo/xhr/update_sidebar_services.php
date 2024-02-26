<?php 
if ($f == 'update_sidebar_services') {
    $html = '';
    foreach (lui_UserSugServices(4) as $wo['UsersList']) {
        $wo['UsersList']['user_name'] = $wo['UsersList']['name'];
        if (!empty($wo['UsersList']['last_name'])) {
            $wo['UsersList']['user_name'] = $wo['UsersList']['first_name'];
        }
        $html .= lui_LoadPage('sidebar/sidebar-user-service');
    }
    $data = array(
        'status' => 200,
        'html' => $html
    );
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}