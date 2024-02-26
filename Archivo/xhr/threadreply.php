<?php 
if ($f == "threadreply" && lui_CheckMainSession($hash_id) === true) {
    if (empty($_POST['subject']) || empty($_POST['content'])) {
        $error = $error_icon . $wo['lang']['please_check_details'];
    } elseif (!isset($_GET['tid']) || !is_numeric($_GET['tid'])) {
        $error = $error_icon . $wo['lang']['please_check_details'];
    } elseif (!isset($_GET['fid']) || !is_numeric($_GET['fid'])) {
        $error = $error_icon . $wo['lang']['please_check_details'];
    } else {
        if (strlen($_POST['subject']) < 10) {
            $error = $error_icon . $wo['lang']['title_more_than10'];
        }
        if (strlen($_POST['content']) < 2) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        }
    }
    if (empty($error)) {
        $registration_data = array(
            'thread_id' => lui_Secure($_GET['tid']),
            'forum_id' => lui_Secure($_GET['fid']),
            'poster_id' => $wo['user']['id'],
            'post_subject' => lui_Secure($_POST['subject']),
            'post_text' => lui_BbcodeSecure($_POST['content']),
            'post_quoted' => lui_Secure($_GET['q']),
            'posted_time' => time()
        );
        if (lui_ThreadReply($registration_data)) {
            $thread = lui_GetForumThreads(array("id" => $_GET['tid'], "preview" => true));
            $thread = $thread[0];
            $notification_data_array = array(
                'recipient_id' => $thread['user'],
                'type' => 'thread_reply',
                'thread_id' => lui_Secure($_GET['tid']),
                'text' => '',
                'url' => 'index.php?link1=showthread&tid=' . lui_Secure($_GET['tid'])
            );
            lui_RegisterNotification($notification_data_array);

            lui_UpdateThreadLastPostTime($_GET['tid']);
            $data = array(
                'message' => $success_icon . $wo['lang']['reply_added'],
                'status' => 200,
                'url' => lui_SeoLink('index.php?link1=showthread&tid=' . $_GET['tid']),
                'user_id' => $thread['user']
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
