<?php
if ($f == "insert-event") {
    if (lui_CheckSession($hash_id) === true) {
        if (empty($_POST['event-name']) || empty($_POST['event-locat']) || empty($_POST['event-description'])) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        } else {
            if (strlen($_POST['event-name']) < 10) {
                $error = $error_icon . $wo['lang']['title_more_than10'];
            }
            if (strlen($_POST['event-description']) < 10) {
                $error = $error_icon . $wo['lang']['desc_more_than32'];
            }
            if (empty($_POST['event-start-date'])) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (empty($_POST['event-end-date'])) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (empty($_POST['event-start-time'])) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (empty($_POST['event-end-time'])) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (empty($error)) {
                $date_start = explode('-', $_POST['event-start-date']);
                $date_end   = explode('-', $_POST['event-end-date']);
                if ($date_start[0] < $date_end[0]) {
                } else {
                    if ($date_start[0] > $date_end[0]) {
                        $error = $error_icon . $wo['lang']['please_check_details'];
                    } else {
                        if ($date_start[1] < $date_end[1]) {
                        } else {
                            if ($date_start[1] > $date_end[1]) {
                                $error = $error_icon . $wo['lang']['please_check_details'];
                            } else {
                                if ($date_start[2] < $date_end[2]) {
                                } else {
                                    if ($date_start[2] > $date_end[2]) {
                                        $error = $error_icon . $wo['lang']['please_check_details'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if (empty($error)) {
            $registration_data = array(
                'name' => lui_Secure($_POST['event-name'],1),
                'location' => lui_Secure($_POST['event-locat']),
                'description' => lui_Secure($_POST['event-description'],1),
                'start_date' => lui_Secure($_POST['event-start-date']),
                'start_time' => lui_Secure($_POST['event-start-time']),
                'end_date' => lui_Secure($_POST['event-end-date']),
                'end_time' => lui_Secure($_POST['event-end-time']),
                'poster_id' => $wo['user']['id']
            );
            $last_id           = lui_InsertEvent($registration_data);
            if ($last_id && is_numeric($last_id)) {
                if (!empty($_FILES["event-cover"]["tmp_name"])) {
                    $temp_name = $_FILES["event-cover"]["tmp_name"];
                    $file_name = $_FILES["event-cover"]["name"];
                    $file_type = $_FILES['event-cover']['type'];
                    $file_size = $_FILES["event-cover"]["size"];
                    lui_UploadImage($temp_name, $file_name, 'cover', $file_type, $last_id, 'event');
                }
                $data = array(
                    'message' => $success_icon . $wo['lang']['event_added'],
                    'status' => 200,
                    'url' => lui_SeoLink("index.php?link1=show-event&eid=" . $last_id)
                );
            }
        } else {
            $data = array(
                'status' => 500,
                'message' => $error
            );
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
