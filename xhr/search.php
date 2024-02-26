<?php 
if ($f == "search") {
    $data = array(
        'status' => 200,
        'html' => ''
    );
    if ($s == 'recipients' AND $wo['loggedin'] == true && isset($_GET['query'])) {
        foreach (lui_GetMessagesUsers($wo['user']['user_id'], $_GET['query']) as $wo['recipient']) {
            $data['html'] .= lui_LoadPage('messages/messages-recipients-list');
        }
    }
    if ($s == 'normal' && isset($_GET['query'])) {
        foreach (lui_GetSearch($_GET['query']) as $wo['result']) {
            $data['html'] .= lui_LoadPage('header/search');
        }
    }
    if ($s == 'hash' && isset($_GET['query'])) {
        foreach (lui_GetSerachHash($_GET['query']) as $wo['result']) {
            $data['html'] .= lui_LoadPage('header/hashtags-result');
        }
    }
    if ($s == 'recent' && $wo['loggedin'] == true) {
        foreach (lui_GetRecentSerachs() as $wo['result']) {
            if (!empty($wo['result'])) {
                $data['html'] .= lui_LoadPage('header/search');
            }
            
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
