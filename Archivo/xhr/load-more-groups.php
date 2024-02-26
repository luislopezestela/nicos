<?php 
if ($f == 'load-more-groups') {
    $offset = (isset($_GET['offset']) && is_numeric($_GET['offset'])) ? $_GET['offset'] : false;
    $query  = $_GET['query'];
    $html   = "";
    $data   = array(
        "status" => 404,
        "html" => $html
    );
    if ($offset) {
        $groups = lui_GetSearchAdv($query, 'groups', $offset);
        if (count($groups) > 0) {
            foreach ($groups as $wo['result']) {
                // if ($wo['config']['theme'] == 'sunshine') {
                //     $html .= lui_LoadPage('search/group-result');
                // }
                // else{
                //     $html .= lui_LoadPage('search/result');
                // }
                $html .= lui_LoadPage('search/group-result');
            }
            $data['status'] = 200;
            $data['html']   = $html;
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
