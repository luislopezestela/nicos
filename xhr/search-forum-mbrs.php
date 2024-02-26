<?php 
if ($f == "search-forum-mbrs") {
    $keyword = (isset($_GET['keyword'])) ? lui_Secure($_GET['keyword']) : false;
    $result  = lui_GetForumUsers(array(
        "name" => $keyword
    ));
    $html    = "";
    $data    = array(
        'status' => 404,
        'html' => $wo['lang']['no_members_found']
    );
    if ($result && count($result) > 0) {
        foreach ($result as $wo['member']) {
            $html .= trim(lui_LoadPage('forum/includes/mbr-list'));
        }
        $data['html']   = $html;
        $data['status'] = 200;
    } else {
        $data['html']   = $wo['lang']['no_members_found'];
        $data['status'] = 404;
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
