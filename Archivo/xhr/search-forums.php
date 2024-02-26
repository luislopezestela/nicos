<?php 
if ($f == "search-forums") {
    $keyword = (isset($_GET['keyword'])) ? lui_Secure($_GET['keyword']) : false;
    $result  = lui_GetForumSec(array(
        "keyword" => $keyword,
        "search" => true,
        "forums" => true
    ));
    $html    = "";
    $data    = array(
        'status' => 404,
        'html' => $wo['lang']['no_forums_found']
    );
    if ($result && count($result) > 0) {
        foreach ($result as $wo['section']) {
            $html .= trim(lui_LoadPage('forum/includes/section-list'));
        }
        $data['html']   = $html;
        $data['status'] = 200;
    }
    if (!$html) {
        $data['html']   = $wo['lang']['no_forums_found'];
        $data['status'] = 404;
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
