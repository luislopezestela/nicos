<?php 
if ($f == "add-new-forum" && lui_IsAdmin() == true && lui_CheckSession($hash_id) === true) {
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['section'])) {
        $error = $error_icon . $wo['lang']['please_check_details'];
    } else {
        if (strlen($_POST['name']) < 5) {
            $error = $error_icon . $wo['lang']['title_more_than10'];
        }
        if (strlen($_POST['name']) > 100) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        }
        if (strlen($_POST['description']) < 5) {
            $error = $error_icon . $wo['lang']['desc_more_than32'];
        }
        if (strlen($_POST['description']) > 190) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        }
    }
    if (empty($error)) {
        $registration_data = array(
            'name' => lui_Secure($_POST['name']),
            'description' => lui_Secure($_POST['description']),
            'sections' => lui_Secure($_POST['section'])
        );
        if (lui_AddForum($registration_data)) {
            $data = array(
                'message' => $success_icon . $wo['lang']['forum_post_added'],
                'status' => 200
            );
        } else {
            $data = array(
                'status' => 500,
                'message' => $wo['lang']['please_check_details']
            );
        }
    } else {
        $data = array(
            'status' => 500,
            'message' => $error
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
