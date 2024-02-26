<?php 
if ($f == "addtopic" && lui_CheckMainSession($hash_id) === true && $wo['config']['can_use_forum']) {
    if (empty($_POST['headline']) || empty($_POST['topicpost'])) {
        $error = $error_icon . $wo['lang']['please_check_details'];
    } elseif (!isset($_GET['fid']) || !is_numeric($_GET['fid'])) {
        $error = $error_icon . $wo['lang']['please_check_details'];
    } else {
        if (strlen($_POST['headline']) < 10) {
            $error = $error_icon . $wo['lang']['title_more_than10'];
        }
        if (strlen($_POST['topicpost']) < 32) {
            $error = $error_icon . $wo['lang']['desc_more_than32'];
        }
    }
    if (empty($error)) {
        $registration_data = array(
            'user' => $wo['user']['id'],
            'views' => 0,
            'headline' => lui_Secure($_POST['headline']),
            'post' => lui_Secure($_POST['topicpost']),
            'posted' => time(),
            'forum' => lui_Secure($_GET['fid'])
        );
        if (lui_AddTopic($registration_data)) {
            $data = array(
                'message' => $success_icon . $wo['lang']['forum_post_added'],
                'status' => 200,
                'url' => lui_SeoLink('index.php?link1=forums&fid=' . $_GET['fid'])
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
