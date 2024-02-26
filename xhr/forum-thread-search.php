<?php 
if ($f == "forum-thread-search") {
    $keyword = (isset($_GET['keyword'])) ? lui_Secure($_GET['keyword']) : false;
    $fid     = (isset($_GET['fid'])) ? lui_Secure($_GET['fid']) : false;
    if ($fid && is_numeric($fid)) {
        $threads = lui_GetForumThreads(array(
            "forum" => $fid,
            "subject" => $keyword,
            "search" => true,
            "order_by" => "DESC"
        ));
        $html    = "";
        $data    = array(
            'status' => 404,
            'html' => $wo['lang']['no_threads_found']
        );
        if ($threads && count($threads) > 0) {
            foreach ($threads as $wo['thread']) {
                $html .= trim(lui_LoadPage('forum/includes/post-list'));
            }
            $data['html']   = $html;
            $data['status'] = 200;
        }
    } else {
        $data['html']   = $wo['lang']['no_threads_found'];
        $data['status'] = 404;
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
