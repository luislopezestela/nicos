<?php 
if ($f == "forum-messages-search") {
    $keyword = (isset($_GET['keyword'])) ? lui_Secure($_GET['keyword']) : false;
    $tid     = (isset($_GET['tid'])) ? lui_Secure($_GET['tid']) : false;
    if ($tid) {
        $messages = lui_SearchThreadReplies(array(
            "thread_id" => $tid,
            "reply" => $keyword
        ));
        $html     = "";
        $data     = array(
            'status' => 404,
            'html' => $wo['lang']['no_threads_found']
        );
        if ($messages && count($messages) > 0) {
            foreach ($messages as $wo['threadreply']) {
                $html .= trim(lui_LoadPage('forum/includes/threadreply-list'));
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
