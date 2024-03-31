<?php
$unread_class = '';
if ($wo['notification']['seen'] == 0) {
    $unread_class = ' unread';
}
$wo['notification']['type_text'] = '';
$wo['notification']['icon']      = '';
$notificationText                = $wo['notification']['text'];
if (isset($notificationText) && !empty($notificationText)) {
    $notificationText = '"' . $wo['notification']['text'] . '"';
}
$notificationType2 = $wo['notification']['type2'];
if (isset($notificationType2) && !empty($notificationType2)) {
    if ($notificationType2 == 'post_image') {
        $type2 = $wo['lang']['photo_n_label'];
    } elseif ($notificationType2 == 'post_youtube' || $notificationType2 == 'post_video') {
        $type2 = $wo['lang']['video_n_label'];
    } elseif ($notificationType2 == 'post_file') {
        $type2 = $wo['lang']['file_n_label'];
    } elseif ($notificationType2 == 'post_vine') {
        $type2 = $wo['lang']['vine_n_label'];
    } elseif ($notificationType2 == 'post_soundFile') {
        $type2 = $wo['lang']['sound_n_label'];
    } elseif ($notificationType2 == 'post_avatar') {
        $type2 = $wo['lang']['avatar_n_label'];
    } elseif ($notificationType2 == 'post_cover') {
        $type2 = $wo['lang']['cover_n_label'];
    } else {
        $type2 = '';
    }
} else {
    $type2 = $wo['lang']['post_n_label'];
    
}
$orginal_txt  = array(
    "{postType}",
    "{post}"
);
$replaced_txt = array(
    $type2,
    $notificationText
);
if (!empty($wo['notification']['type'])) {
    if ($wo['notification']['type'] == "reaction") {
        
        if( $wo['notification']['text'] == "post" ){
            $wo['notification']['type_text'] .= $wo['lang']['reacted_to_your_post'];
        }else if( $wo['notification']['text'] == "comment" ){
            $wo['notification']['type_text'] .= $wo['lang']['reacted_to_your_comment'];
        }else if( $wo['notification']['text'] == "replay" ){
            $wo['notification']['type_text'] .= $wo['lang']['reacted_to_your_replay'];
        }
        elseif ($wo['notification']['text'] == "story") {
            $wo['notification']['type_text'] .= $wo['lang']['reacted_to_your_story'];
            $wo['notification']['type'] = "story_reaction";
            $wo['notification']['url']       = $wo['notification']['url']; 
        }
        elseif ($wo['notification']['text'] == "message") {
            $wo['notification']['type_text'] .= $wo['lang']['reacted_to_your_message'];
            $wo['notification']['type'] = "message_reaction";
            $wo['notification']['url']       = $wo['notification']['url']; 
        }
        if (!empty($wo['reactions_types'][$notificationType2])) {
            
            if ($wo['reactions_types'][$notificationType2]['is_html'] == 1) {

                switch (strtolower($notificationType2)) {
                   case 1:
                       $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><div class='emoji emoji--like'><div class='emoji__hand'><div class='emoji__thumb'></div></div></div></div></span>";
                       break;
                   case 2:
                       $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><div class='emoji emoji--love'><div class='emoji__heart'></div></div></div></span>";
                       break;
                   case 3:
                      $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><div class='emoji emoji--haha'><div class='emoji__face'><div class='emoji__eyes'></div><div class='emoji__mouth'><div class='emoji__tongue'></div></div></div></div></div></span>";
                       break;
                   case 4:
                       $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><div class='emoji emoji--wow'><div class='emoji__face'><div class='emoji__eyebrows'></div><div class='emoji__eyes'></div><div class='emoji__mouth'></div></div></div></div></span>";
                       break;
                   case 5:
                       $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><div class='emoji emoji--sad'><div class='emoji__face'><div class='emoji__eyebrows'></div><div class='emoji__eyes'></div><div class='emoji__mouth'></div></div></div></div></span>";
                       break;
                   case 6:
                       $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><div class='emoji emoji--angry'><div class='emoji__face'><div class='emoji__eyebrows'></div><div class='emoji__eyes'></div><div class='emoji__mouth'></div></div></div></div></span>";
                       break;
               }
            }
            else{
                if (!empty($wo['reactions_types'][$notificationType2]['wowonder_small_icon'])) {
                    $wo['notification']['icon'] .= "<div class='inline_post_emoji inline_act_emoji no_anim'><img style='width: 100%;' src='{$wo['reactions_types'][$notificationType2]['wowonder_small_icon']}' alt=\"" . $wo['reactions_types'][$notificationType2]['name'] . "\"></div></span>";
                }
            }
        }

   //      switch (strtolower($notificationType2)) {

			// case 'like':
			// 	$wo['notification']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>';
			// 	break;
			// case 'love':
			// 	$wo['notification']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>';
			// 	break;
			// case 'haha':
			// 	$wo['notification']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>';
			// 	break;
			// case 'wow':
			// 	$wo['notification']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
			// 	break;
			// case 'sad':
			// 	$wo['notification']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
			// 	break;
			// case 'angry':
			// 	$wo['notification']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
			// 	break;
			// }
    }
    if ($wo['notification']['type'] == "gift") {
        $wo['notification']['type_text'] .= $wo['lang']['send_gift_to_you'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>';
    }
    if ($wo['notification']['type'] == "poke") {
        $wo['notification']['type_text'] .= $wo['lang']['poked_you'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-slash" width="24" height="24" viewBox="0 0 24 24">   <path fill="currentColor" d="M21,9A1,1 0 0,1 22,10A1,1 0 0,1 21,11H16.53L16.4,12.21L14.2,17.15C14,17.65 13.47,18 12.86,18H8.5C7.7,18 7,17.27 7,16.5V10C7,9.61 7.16,9.26 7.43,9L11.63,4.1L12.4,4.84C12.6,5.03 12.72,5.29 12.72,5.58L12.69,5.8L11,9H21M2,18V10H5V18H2Z" /></svg>';
    }
    if ($wo['notification']['type'] == "following") {
        $wo['notification']['type_text'] .= $wo['lang']['followed_you'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == "live_video") {
        $wo['notification']['type_text'] .= $wo['lang']['started_live_video'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'comment_mention') {
        $wo['notification']['type_text'] .= TextForMode('comment_mention');
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign active"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>';
    }
    if ($wo['notification']['type'] == 'post_mention') {
        $wo['notification']['type_text'] .= TextForMode('post_mention');
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign active"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>';
    }
    if ($wo['notification']['type'] == 'liked_post') {
        $wo['notification']['type_text'] = str_replace($orginal_txt, $replaced_txt, TextForMode('liked_post'));
        if ($wo['config']['website_mode'] == 'askfm') {
            $wo['notification']['icon'] .= '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg>';
        }
        else{
            $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up active"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
        }
    }
    if ($wo['notification']['type'] == 'wondered_post') {
        $lang_type = ($wo['config']['second_post_button'] == 'wonder') ? $wo['lang']['wondered_post'] : $wo['lang']['disliked_post'];
        $wo['notification']['type_text'] = str_replace($orginal_txt, $replaced_txt, $lang_type);
        $wo['notification']['icon'] .= $wo['second_post_button_icon'];
    }
    if ($wo['notification']['type'] == 'share_post') {
        $wo['notification']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['share_post']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 active"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>';
    }
    if ($wo['notification']['type'] == 'comment') {
        $wo['notification']['type_text'] = str_replace($orginal_txt, $replaced_txt, TextForMode('commented_on_post'));
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle active"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
    }
    if ($wo['notification']['type'] == 'comment_reply') {
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], TextForMode('replied_to_comment'));
        if (empty($wo['notification']['text'])) {
            $wo['notification']['type_text'] = str_replace('"', '', $wo['notification']['type_text']);
        }
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle active"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
    }
    if ($wo['notification']['type'] == 'comment_reply_mention') {
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], $wo['lang']['comment_reply_mention']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle active"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
    }
    if ($wo['notification']['type'] == 'also_replied') {
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], $wo['lang']['also_replied']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle active"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
    }
    if ($wo['notification']['type'] == 'liked_comment') {
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], $wo['lang']['liked_comment']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up active"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
    }
    if ($wo['notification']['type'] == 'wondered_comment') {
        $lang_type = ($wo['config']['second_post_button'] == 'wonder') ? $wo['lang']['wondered_comment'] : $wo['lang']['disliked_comment'];
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], $lang_type);
        $wo['notification']['icon'] .= $wo['second_post_button_icon'];
    }
    if ($wo['notification']['type'] == 'liked_reply_comment') {
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], $wo['lang']['liked_reply_comment']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up active"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
    }
    if ($wo['notification']['type'] == 'wondered_reply_comment') {
        $lang_type = ($wo['config']['second_post_button'] == 'wonder') ? $wo['lang']['wondered_reply_comment'] : $wo['lang']['disliked_reply_comment'];
        $wo['notification']['type_text'] = str_replace('{comment}', $wo['notification']['text'], $lang_type);
        $wo['notification']['icon'] .= $wo['second_post_button_icon'];
    }
    if ($wo['notification']['type'] == 'profile_wall_post') {
        $wo['notification']['type_text'] = TextForMode('posted_on_timeline');
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'visited_profile') {
        $wo['notification']['type_text'] = $wo['lang']['profile_visted'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye active"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'liked_page') {
        $page = lui_PageData($wo['notification']['page_id']);
        $wo['notification']['type_text'] = str_replace('{page_name}', $page['name'], $wo['lang']['liked_page']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up active"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
    }
    if ($wo['notification']['type'] == 'joined_group') {
        $group = lui_GroupData($wo['notification']['group_id']);
        $wo['notification']['type_text'] = str_replace('{group_name}', $group['name'], $wo['lang']['joined_group']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users active"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
    }
    
    if ($wo['notification']['type'] == 'declined_group_chat_request') {
        $wo['notification']['type_text'] = $wo['lang']['declined_group_chat_request'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users active"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
    }
    if ($wo['notification']['type'] == 'accept_group_chat_request') {
        $wo['notification']['type_text'] = $wo['lang']['accept_group_chat_request'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users active"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
    }
    if ($wo['notification']['type'] == 'accepted_invite') {
        $date_p  = explode('/', $wo['notification']['url']);
        $page_id = @end($date_p);
        $page = lui_PageData(lui_PageIdFromPagename($page_id));
        $wo['notification']['type_text'] = str_replace('{page_name}', $page['name'], $wo['lang']['accepted_invited_page']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    
    if ($wo['notification']['type'] == 'invited_page') {
        $date_p  = explode('/', $wo['notification']['url']);
        $page_id = @end($date_p);
        $page = lui_PageData(lui_PageIdFromPagename($page_id));
        $wo['notification']['type_text'] = str_replace('{page_name}', $page['name'], $wo['lang']['invited_page']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'accepted_join_request') {
        $group_g  = explode('/', $wo['notification']['url']);
        $group_id = @end($group_g);
        $group = lui_GroupData(lui_GroupIdFromGroupname($group_id));
        $wo['notification']['type_text'] = str_replace('{group_name}', $group['name'], $wo['lang']['accepted_join_request']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'added_you_to_group') {
        $group_g  = explode('/', $wo['notification']['url']);
        $group_id = @end($group_g);
        $group = lui_GroupData(lui_GroupIdFromGroupname($group_id));
        $wo['notification']['type_text'] = str_replace('{group_name}', $group['name'], $wo['lang']['added_you_to_group']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
     if ($wo['notification']['type'] == 'requested_to_join_group') {
        $wo['notification']['type_text'] = $wo['lang']['requested_to_join_group'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }

    if ($wo['notification']['type'] == 'interested_event') {
        $event_data = lui_EventData($wo['notification']['event_id']);
        $wo['notification']['type_text'] = str_replace('{event_name}', $event_data['name'], $wo['lang']['is_interested']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye active"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'going_event') {
        $event_data = lui_EventData($wo['notification']['event_id']);
        $wo['notification']['type_text'] = str_replace('{event_name}', $event_data['name'], $wo['lang']['is_going']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar active"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>';
    }
    if ($wo['notification']['type'] == 'invited_event') {
        $event_data = lui_EventData($wo['notification']['event_id']);
        $wo['notification']['type_text'] = str_replace('{event_name}', $event_data['name'], $wo['lang']['invited_you_event']);
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar active"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>';
    }
    if ($wo['notification']['type'] == 'forum_reply') {
        $wo['notification']['type_text'] = $wo['lang']['replied_to_topic'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat active"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>';
    }
    if ($wo['notification']['type'] == 'apply_job') {
        $wo['notification']['type_text'] = $wo['lang']['apply_your_job'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'fund_donate') {
        $wo['notification']['type_text'] = $wo['lang']['donated_to'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'accepted_request') {
        if ($wo['config']['connectivitySystem'] == 1) {
            $wo['notification']['type_text'] = $wo['lang']['accepted_friend_request'];
        } else {
            $wo['notification']['type_text'] = $wo['lang']['accepted_follow_request'];
        }
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'new_orders') {
        $wo['notification']['type_text'] = $wo['lang']['new_orders_has_been_placed'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>';
    }
    if ($wo['notification']['type'] == 'added_tracking') {
        $wo['notification']['type_text'] = $wo['lang']['added_tracking_info'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'status_changed') {
        $wo['notification']['type_text'] = $wo['lang']['admin_status_changed'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'new_review') {
        $wo['notification']['type_text'] = $wo['lang']['added_review_to_your_product'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
    }

    if ($wo['notification']['type'] == 'admin_notification') {
        $theme                                    = $wo['config']['theme'];
        $wo['notification']['type_text']          = $wo['notification']['text'];
        if ($wo['notification']['type2'] != 'no_name'  && $wo['notification']['type2'] != 'approve_post'   && $wo['notification']['type2'] != 'approve_blog'  && $wo['notification']['type2'] != 'ffmpeg'  && $wo['notification']['type2'] != 'admin_status_changed' && $wo['notification']['type2'] != 'approve_product') {
            $wo['notification']['url']                = $wo['notification']['full_link']; 
            $wo['notification']['ajax_url']           = $wo['notification']['full_link']; 
            $wo['notification']['wo_url']             = false; 
        }
        
        $wo['notification']['notifier']['name']   = $wo['config']['siteName']; 
        $wo['notification']['notifier']['avatar'] = $wo['config']['theme_url'] . "/img/icon.png"; 
        $wo['notification']['icon']              .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye active"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';

        if ($wo['notification']['type2'] == 'admin_status_changed') {
            $wo['notification']['type_text'] = $wo['lang']['admin_status_changed'];
        }
        if ($wo['notification']['type2'] == 'approve_post') {
            $wo['notification']['type_text'] = $wo['lang']['approve_post'];
            $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
        }
        if ($wo['notification']['type2'] == 'approve_blog') {
            $wo['notification']['type_text'] = $wo['lang']['approve_blog'];
            $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
        }
        if ($wo['notification']['type2'] == 'refund_decline') {
            $wo['notification']['type_text'] = $wo['lang']['refund_decline'];
        }
        if ($wo['notification']['type2'] == 'withdraw_approve') {
            $wo['notification']['type_text'] = $wo['lang']['withdraw_approve'];
            $wo['notification']['url']       = lui_SeoLink('index.php?link1=setting&page=payments');
        }
        if ($wo['notification']['type2'] == 'withdraw_declined') {
            $wo['notification']['type_text'] = $wo['lang']['withdraw_declined'];
            $wo['notification']['url']       = lui_SeoLink('index.php?link1=setting&page=payments');
        }
        if ($wo['notification']['type2'] == 'coinpayments_canceled') {
            $wo['notification']['type_text'] = $wo['lang']['coinpayments_canceled'];
            $wo['notification']['url']       = lui_SeoLink('index.php?link1=wallet');
        }
        if ($wo['notification']['type2'] == 'coinpayments_approved') {
            $wo['notification']['type_text'] = $wo['lang']['coinpayments_approved'];
            $wo['notification']['url']       = lui_SeoLink('index.php?link1=wallet');
        }

    }
    if ($wo['notification']['type'] == 'page_admin') {
        $wo['notification']['type_text'] = $wo['lang']['added_page_admin'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'group_admin') {
        $wo['notification']['type_text'] = $wo['lang']['added_group_admin'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'added_u_as') {
        $wo['notification']['type_text'] = $wo['notification']['text'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'accept_u_as') {
        $wo['notification']['type_text'] = $wo['notification']['text'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['notification']['type'] == 'rejected_u_as') {
        $wo['notification']['type_text'] = $wo['notification']['text'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x active"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
    }
    if ($wo['notification']['type'] == 'sent_u_money') {
        $wo['notification']['type_text'] = $wo['notification']['text'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z" /><path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /></svg>';
    }
    if ($wo['notification']['type'] == 'viewed_story') {
        $wo['notification']['type_text'] = $wo['lang']['viewed_your_story'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon']     .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>';
    }
    if ($wo['notification']['type'] == 'blog_commented') {
        $wo['notification']['type_text'] = $wo['lang']['commented_on_blog'];
        $wo['notification']['url']       = $wo['notification']['url']; 
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle active"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';;
    }
    if ($wo['notification']['type'] == 'new_post') {
        $wo['notification']['type_text'] = $wo['lang']['created_new_post'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
    }
    // Share post
    if ($wo['notification']['type'] == 'shared_your_post') {
        $wo['notification']['type_text'] = $wo['lang']['shared_your_post'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'shared_a_post_in_timeline') {
        $wo['notification']['type_text'] = $wo['lang']['shared_a_post_in_timeline'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
    }
    // Share post
    if ($wo['notification']['type'] == 'bank_pro' || $wo['notification']['type'] == 'bank_wallet') {
        $wo['notification']['type_text'] = $wo['lang']['bank_pro'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
    } 
    if ($wo['notification']['type'] == 'bank_decline') {
        $wo['notification']['type_text'] = $wo['lang']['bank_decline'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
    }
    if ($wo['notification']['type'] == 'memory') {
        $wo['notification']['type_text'] = $wo['lang']['memory_this_day'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>';
        $wo['notification']['notifier']['name']   = $wo['config']['siteName']; 
        $wo['notification']['notifier']['avatar'] = $wo['config']['theme_url'] . "/img/icon.png"; 
    }
    if ($wo['notification']['type'] == 'thread_reply') {
        $wo['notification']['type_text'] = $wo['lang']['thread_reply'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle active"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
    }
    if ($wo['notification']['type'] == 'remaining') {
        $wo['notification']['type_text'] = $wo['notification']['text'];
        $wo['notification']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user active"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>';
        $wo['notification']['notifier']['name']   = $wo['config']['siteName']; 
        $wo['notification']['notifier']['avatar'] = $wo['config']['theme_url'] . "/img/icon.png"; 
    }
}
if ($wo['notification']['type2'] == 'anonymous') {
    $wo['notification']['notifier']['name']   = $wo['lang']['anonymous']; 
    $wo['notification']['notifier']['avatar'] = lui_GetMedia('upload/photos/incognito.png');
}
if ($wo['notification']['type2'] == 'ffmpeg') {
    $post_p  = explode('/', $wo['notification']['url']);
    $post_id = @end($post_p);
    if (!empty($post_id)) {
        $post = lui_PostData($post_id);
        if (!empty($post) && !empty($post['postFileThumb'])) {
            $wo['notification']['notifier']['avatar'] = lui_GetMedia($post['postFileThumb']);
        }
    }
}
?>

<li>
   <div class="notification-list <?php echo $unread_class;?> <?php if ($wo['notification']['type'] == 'viewed_story' || $wo['notification']['type'] == 'story_reaction') { $wo['notification']['url'] = 'javascript:void(0)' ?> see_all_stories<?php } ?>" <?php if ($wo['notification']['type'] == 'viewed_story' || $wo['notification']['type'] == 'story_reaction') { ?> data_story_user_id="<?php echo $wo['notification']['recipient_id']?>" data_story_type="user" <?php } ?>>
      <a href="<?php echo $wo['notification']['url']; ?>" title="<?php echo $wo['notification']['notifier']['name']; ?>" <?php if (!isset($wo['notification']['wo_url']) && $wo['notification']['type'] != 'viewed_story' && $wo['notification']['type'] != 'story_reaction' && $wo['notification']['type'] != 'message_reaction'): ?> data-ajax="<?php echo $wo['notification']['ajax_url'];?>" <?php endif; ?>>
         <div class="notification-user-avatar <?php echo lui_RightToLeft('pull-left');?>">
            <img src="<?php echo $wo['notification']['notifier']['avatar']; ?>" alt="<?php echo $wo['notification']['notifier']['name']; ?> Profile picture">
            <?php if (!empty($wo['notification']['notifier']['is_open_to_work']) && $wo['config']['website_mode'] == 'linkedin') { ?>
         <span title="<?php echo($wo['lang']['open_to_work']); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:#4caf50;"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg></span>
      <?php } ?>
         </div>
         <div class="notification-text">
            <span class="main-color">
            <?php if ($wo['notification']['type2'] != 'no_name') {
                echo $wo['notification']['notifier']['name'];
            }
             ?>
            </span>
            <?php echo $wo['notification']['type_text']; ?>
            <div class="notification-time active">
               <?php echo $wo['notification']['icon'];?>
               <span class="ajax-time notification-time" title="<?php echo date('c',$wo['notification']['time']); ?>">
               <?php echo lui_Time_Elapsed_String_word($wo['notification']['time'])?>
               </span>
            </div>
         </div>
         <div class="clear"></div>
      </a>
   </div>
</li>
<li class="divider"></li>