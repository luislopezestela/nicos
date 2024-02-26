<?php 
if ($f == "search-my-followers") {
    $html   = "";
    $data   = array(
        "status" => 404,
        "html" => $wo['lang']['no_result']
    );
    $filter = (isset($_GET['filter'])) ? lui_Secure($_GET["filter"]) : false;
    $event_id = (!empty($_GET['event_id']) && is_numeric($_GET['event_id']) && $_GET['event_id'] > 0) ? lui_Secure($_GET['event_id']) : false;
    if ($filter && $event_id) {
        $users = lui_SearchFollowers($wo['user']['id'], $filter, 10, $_GET['event_id']);
        if (count($users) > 0) {
            foreach ($users as $wo['user']) {
                $html .= lui_LoadPage('events/includes/invitation-users-list');
            }
            $data = array(
                "status" => 200,
                "html" => $html
            );
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
