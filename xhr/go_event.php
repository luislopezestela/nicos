<?php 
if ($f == 'go_event') {
    if (!empty($_GET['event_id']) && lui_CheckMainSession($hash_id) === true) {
        if (lui_EventGoingExists($_GET['event_id']) === true) {
            if (lui_UnsetEventGoingUsers($_GET['event_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => lui_GetGoingButton($_GET['event_id'])
                );
            }
        } else {
            if (lui_AddEventGoingUsers($_GET['event_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => lui_GetGoingButton($_GET['event_id'])
                );
                if (lui_CanSenEmails()) {
                    $data['can_send'] = 1;
                }
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
