<?php
if ($f == 'check_for_audio_answer') {
    if (!empty($_GET['id'])) {
        $selectData = lui_CheckAudioCallAnswer($_GET['id']);
        if ($selectData !== false) {
            $data = array(
                'status' => 200,
                'text_answered' => $wo['lang']['answered'],
                'text_please_wait' => $wo['lang']['please_wait']
            );
            $id   = lui_Secure($_GET['id']);
            if ($wo['config']['agora_chat_video'] == 1) {
                $query = mysqli_query($sqlConnect, "SELECT * FROM " . T_AGORA . " WHERE `id` = '{$id}'");
            } else {
                $query = mysqli_query($sqlConnect, "SELECT * FROM " . T_AUDIO_CALLES . " WHERE `id` = '{$id}'");
            }
            $sql = mysqli_fetch_assoc($query);
            if (!empty($sql) && is_array($sql)) {
                $wo['incall'] = $sql;
                if ($wo['config']['agora_chat_video'] == 1) {
                    $wo['incall']['in_call_user'] = lui_UserData($sql['to_id']);
                } else {
                    $wo['incall']['in_call_user'] = lui_UserData($sql['to_id']);
                    if ($wo['incall']['to_id'] == $wo['user']['user_id']) {
                        $wo['incall']['user']         = 1;
                        $wo['incall']['access_token'] = $wo['incall']['access_token'];
                    } else if ($wo['incall']['from_id'] == $wo['user']['user_id']) {
                        $wo['incall']['user']         = 2;
                        $wo['incall']['access_token'] = $wo['incall']['access_token_2'];
                    }
                    $user_1 = lui_UserData($wo['incall']['from_id']);
                    $user_2 = lui_UserData($wo['incall']['to_id']);
                }
                $wo['incall']['room'] = $wo['incall']['room_name'];
                $data['calls_html']   = lui_LoadPage('modals/talking');
            }
        } else {
            $check_declined = lui_CheckAudioCallAnswerDeclined($_GET['id']);
            if ($check_declined) {
                $data = array(
                    'status' => 400,
                    'text_call_declined' => $wo['lang']['call_declined'],
                    'text_call_declined_desc' => $wo['lang']['call_declined_desc']
                );
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
