<?php 
if ($f == 'interested_event') {
    if (!empty($_GET['event_id']) && lui_CheckMainSession($hash_id) === true) {
        if (lui_EventInterestedExists($_GET['event_id']) === true) {
            if (lui_UnsetEventInterestedUsers($_GET['event_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => lui_GetInterestedButton($_GET['event_id'])
                );
            }
        } else {
            if (lui_AddEventInterestedUsers($_GET['event_id'])) {
                $data = array(
                    'status' => 200,
                    'html' => lui_GetInterestedButton($_GET['event_id'])
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
