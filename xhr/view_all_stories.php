<?php
if ($f == 'view_all_stories') {
    $data['status'] = 400;
    if (!empty($_POST['user_id']) && is_numeric($_POST['user_id']) && $_POST['user_id'] > 0) {
        $stories = $db->where("(user_id = ".lui_Secure($_POST['user_id'])." AND id NOT IN (SELECT story_id FROM ".T_STORY_SEEN." WHERE user_id = ".$wo['user']['id']."))")->get(T_USER_STORY,null,array('id'));
        if (!empty($stories)) {
            $show_ids = array();
            foreach ($stories as $key => $value) {
                $show_ids[] = $value->id;
            }
            $story       = $db->where('user_id', lui_Secure($_POST['user_id']))->where('id',$show_ids,'IN')->orderBy('id', "ASC")->getOne(T_USER_STORY);
            if (empty($story)) {
                $story       = $db->where('user_id', lui_Secure($_POST['user_id']))->orderBy('id', "ASC")->getOne(T_USER_STORY);
            }
        }
        else{
            $story       = $db->where('user_id', lui_Secure($_POST['user_id']))->orderBy('id', "ASC")->getOne(T_USER_STORY);
        }
        $story_id    = $story->id;
        $wo['story'] = ToArray($story);
        if (!empty($story)) {
            $story_media = lui_GetStoryMedia($story_id, 'image');
            if (empty($story_media)) {
                $story_media = lui_GetStoryMedia($story_id, 'video');
            }
            $wo['story']['story_media'] = $story_media;
            $wo['story']['view_count']  = $db->where('story_id', $story_id)->where('user_id', $story->user_id, '!=')->getValue(T_STORY_SEEN, 'COUNT(*)');
            $story_views                = $db->where('story_id', $story_id)->where('user_id', $story->user_id, '!=')->orderBy('id', "Desc")->get(T_STORY_SEEN, 10);
            if (!empty($story_views)) {
                foreach ($story_views as $key => $value) {
                    $user_                        = lui_UserData($value->user_id);
                    $user_['id']                  = $value->id;
                    $user_['seenOn']              = lui_Time_Elapsed_String($value->time);
                    $wo['story']['story_views'][] = $user_;
                }
            }
            $wo['story']['is_owner']  = false;
            $wo['story']['user_data'] = $user_data = lui_UserData($story->user_id);
            if ($user_data['user_id'] == $wo['user']['user_id']) {
                $wo['story']['is_owner'] = true;
            }
            $is_viewed = $db->where('story_id', $story_id)->where('user_id', $wo['user']['user_id'])->getValue(T_STORY_SEEN, 'COUNT(*)');
            if ($is_viewed == 0) {
                $db->insert(T_STORY_SEEN, array(
                    'story_id' => $story_id,
                    'user_id' => $wo['user']['user_id'],
                    'time' => time()
                ));
                if (!empty($user_data) && $user_data['user_id'] != $wo['user']['user_id']) {
                    $notification_data_array = array(
                        'recipient_id' => $user_data['user_id'],
                        'type' => 'viewed_story',
                        'story_id' => $story_id,
                        'text' => '',
                        'url' => 'index.php?link1=timeline&u=' . $wo['user']['username'] . '&story=true&story_id=' . $story_id
                    );
                    lui_RegisterNotification($notification_data_array);
                }
            }
            $data['story_id'] = $story_id;
            $wo['story_type'] = $_POST['type'];
            $data['html']     = lui_LoadPage('lightbox/story');
            $data['status']   = 200;
        }
    }
    lui_CleanCache();
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
