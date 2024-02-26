<?php 
if ($f == "load-more-events") {
    $html = "";
    $data = array(
        'status' => 404,
        "html" => $wo['lang']['no_result']
    );
    if (isset($_GET['offset']) && is_numeric($_GET['offset'])) {
        if ($s == "upcomming") {
            $events = lui_GetEvents(array(
                "offset" => lui_Secure($_GET['offset'])
            ));
            if (count($events) > 0) {
                foreach ($events as $wo['event']) {
                    $html .= lui_LoadPage('events/includes/events-list');
                }
                $data = array(
                    'status' => 200,
                    "html" => $html
                );
            }
        } else if ($s == "going") {
            $events = lui_GetGoingEvents(lui_Secure($_GET['offset']));
            if (count($events) > 0) {
                foreach ($events as $wo['event']) {
                    $html .= lui_LoadPage('events/includes/events-going-list');
                }
                $data = array(
                    'status' => 200,
                    "html" => $html
                );
            }
        } else if ($s == "invited") {
            $events = lui_GetInvitedEvents(lui_Secure($_GET['offset']));
            if (count($events) > 0) {
                foreach ($events as $wo['event']) {
                    $html .= lui_LoadPage('events/includes/events-invited-list');
                }
                $data = array(
                    'status' => 200,
                    "html" => $html
                );
            }
        } else if ($s == "interested") {
            $events = lui_GetInterestedEvents(lui_Secure($_GET['offset']));
            if (count($events) > 0) {
                foreach ($events as $wo['event']) {
                    $html .= lui_LoadPage('events/includes/events-interested-list');
                }
                $data = array(
                    'status' => 200,
                    "html" => $html
                );
            }
        } else if ($s == "past") {
            $events = lui_GetPastEvents($_GET['offset']);
            if (count($events) > 0) {
                foreach ($events as $wo['event']) {
                    $html .= lui_LoadPage('events/includes/events-past-list');
                }
                $data = array(
                    'status' => 200,
                    "html" => $html
                );
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
