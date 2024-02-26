<?php 
if ($f == 'next_users') {
    if (empty($_POST['user_id']) || !is_numeric($_POST['user_id']) || empty($_POST['next_users'])) {
        $data['message'] = $error_icon . $wo['lang']['please_check_details'];
    }
    if (lui_IsAdmin() || $wo['user']['user_id'] == $_POST['user_id']) {
        if (empty($data['message'])) {
            $data['html'] = '<ul class="refs_nested">';
            $next_users = lui_Secure($_POST['next_users']);
            $user = lui_UserData(lui_Secure($_POST['user_id']));
            $users = explode(",", $next_users);
            $ref_level = json_decode($user['ref_level'],true);
            if (!empty($ref_level) && !empty($users)) {
                foreach ($users as $key => $value) {
                    if (!empty($ref_level[$value])) {
                        $ref_level = $ref_level[$value];
                    }
                }
            }
            foreach ($ref_level as $key2 => $value2) {
                $wo['ref'] = lui_UserData($key2);
                $next_users .= ','.$key2;
                if (!empty($value2)) {
                    $data['html'] .= '<li><span class="refs_caret" users_data="'.$next_users.'" onclick="GetNextUsers(this)">'.lui_LoadPage('setting/refs').'</span></li>';
                }
                else{
                    $data['html'] .= '<li><span>'.lui_LoadPage('setting/refs').'</span></li>';
                }
            }
            $data['html'] .= '</ul>';
            $data['status'] = 200;
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}