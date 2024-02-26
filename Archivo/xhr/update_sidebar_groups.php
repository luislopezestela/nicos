<?php 
if ($f == 'update_sidebar_groups') {
    $html = '';
    foreach (lui_GroupSug(5) as $wo['GroupList']) {
        $html .= lui_LoadPage('sidebar/sidebar-group-list');
    }
    $data = array(
        'status' => 200,
        'html' => $html
    );
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
