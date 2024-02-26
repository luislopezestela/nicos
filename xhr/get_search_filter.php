<?php 
if ($f == "get_search_filter") {
    $data = array(
        'status' => 200,
        'html' => ''
    );
    if (isset($_POST)) {
        foreach (lui_GetSearchFilter($_POST) as $wo['result']) {
            $data['html'] .= lui_LoadPage('search/result');
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
