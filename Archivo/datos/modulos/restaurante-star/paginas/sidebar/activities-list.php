<?php
$wo['activity']['type_text'] = '';
$wo['activity']['icon']      = '';
$post_publisher = '';
if (!empty($wo['activity']['postData'])) {
    if ($wo['config']['shout_box_system'] == 1 && $wo['activity']['postData']['postPrivacy'] == 4) {
        $post_publisher              = '<a class="second-user-color" href="javascript:void(0)">' . $wo['lang']['anonymous'] . '</a>';
    }
    else{
        $post_publisher              = '<a class="second-user-color" data-ajax="?link1=timeline&u=' . $wo['activity']['postData']['publisher']['username'] . '" href="' . $wo['activity']['postData']['publisher']['url'] . '">' . $wo['activity']['postData']['publisher']['name'] . '</a>';
    }
    $replaced_txt                = array(
    $post_publisher,
    $wo['activity']['postData']['url']
);
}

$orginal_txt                 = array(
    "{user}",
    "{post}"
);
if ($wo['activity']['activity_type'] == 'following' || $wo['activity']['activity_type'] == 'friend') {
   $wo['activity']['following']  = lui_UserData($wo['activity']['follow_id']);
   $post_publisher              = '<a class="second-user-color" data-ajax="?link1=timeline&u=' . $wo['activity']['following']['username'] . '" href="' . $wo['activity']['following']['url'] . '">' . $wo['activity']['following']['name'] . '</a>';
}
if (!empty($wo['activity']['postData'])) {
    $replaced_txt                = array(
        $post_publisher,
        $wo['activity']['postData']['url']
    );
}
else{
    $replaced_txt                = array(
        $post_publisher,
        ''
    );
}
    
if (!empty($wo['activity']['activity_type'])) {

    if ( substr( $wo['activity']['activity_type'] , 0, 8) == "reaction") {
        $txt = str_replace( "reaction|", "", $wo['activity']['activity_type'] );
        $arr = explode( "|", $txt );

        if( $arr[0] == "post" ){
            $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_reacted_post']);
            $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        // }else if( $arr[0] == "comment" ){
        //     $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_reacted_comment']);
        // }else if( $arr[0] == "replay" ){
        //     $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_reacted_replay']);
        }
        if( isset( $arr[1] ) ){

          if ($wo['reactions_types'][$arr[1]]['is_html'] == 1) {

              switch (strtolower($arr[1])) {
                 case 1:
                     $wo['activity']['icon'] .= "<div class='inline_post_count_emoji no_anim'><div class='emoji emoji--like'><div class='emoji__hand'><div class='emoji__thumb'></div></div></div></div></span>";
                     break;
                 case 2:
                     $wo['activity']['icon'] .= "<div class='inline_post_count_emoji no_anim'><div class='emoji emoji--love'><div class='emoji__heart'></div></div></div></span>";
                     break;
                 case 3:
                    $wo['activity']['icon'] .= "<div class='inline_post_count_emoji no_anim'><div class='emoji emoji--haha'><div class='emoji__face'><div class='emoji__eyes'></div><div class='emoji__mouth'><div class='emoji__tongue'></div></div></div></div></div></span>";
                     break;
                 case 4:
                     $wo['activity']['icon'] .= "<div class='inline_post_count_emoji no_anim'><div class='emoji emoji--wow'><div class='emoji__face'><div class='emoji__eyebrows'></div><div class='emoji__eyes'></div><div class='emoji__mouth'></div></div></div></div></span>";
                     break;
                 case 5:
                     $wo['activity']['icon'] .= "<div class='inline_post_count_emoji no_anim'><div class='emoji emoji--sad'><div class='emoji__face'><div class='emoji__eyebrows'></div><div class='emoji__eyes'></div><div class='emoji__mouth'></div></div></div></div></span>";
                     break;
                 case 6:
                     $wo['activity']['icon'] .= "<div class='inline_post_count_emoji no_anim'><div class='emoji emoji--angry'><div class='emoji__face'><div class='emoji__eyebrows'></div><div class='emoji__eyes'></div><div class='emoji__mouth'></div></div></div></div></span>";
                     break;
             }
          }
          else{
              if (!empty($wo['reactions_types'][$arr[1]]['wowonder_small_icon'])) {
                  $wo['activity']['icon'] .= "<div class='inline_post_count_emoji reaction'><img src='{$wo['reactions_types'][$arr[1]]['wowonder_small_icon']}' alt=\"" . $wo['reactions_types'][$arr[1]]['name'] . "\"></div></span>";
              }
          }



          // if (!empty($wo['reactions_types'])) {
          //   foreach ($wo['reactions_types'] as $key => $value) {
          //     if ($value['status'] == 1) {
          //       if (preg_match("/<[^<]+>/",$value['wowonder_icon'],$m)) {
          //          $wo['activity']['icon'] .=  $value['wowonder_icon'];
          //        }
          //        else{
          //         $wo['activity']['icon'] .=  '<div class="inline_post_emoji no_anim"><div class="reaction"><img src="'.$value['wowonder_icon'].'"></div></div>';

          //        }
          //      }
          //    }
          //  }

    //         switch (strtolower($arr[1])) {
    //          case 'like':
    //            $wo['activity']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>';
    //            break;
    //          case 'love':
    //            $wo['activity']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>';
    //            break;
    //          case 'haha':
    //            $wo['activity']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>';
    //            break;
			 // case 'wow':
    //            $wo['activity']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
			 //   break;
			 // case 'sad':
    //            $wo['activity']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
			 //   break;
    //          case 'angry':
    //            $wo['activity']['icon'] .= '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
    //            break;
    //        }
        }else{
            $wo['activity']['icon'] .= '';
        }
    }
    if ($wo['activity']['activity_type'] == 'friend') {
        $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_is_friend']);
        $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        $wo['activity']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['activity']['activity_type'] == 'following') {
        $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_is_following']);
        $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        $wo['activity']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus active"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
    }
    if ($wo['activity']['activity_type'] == 'liked_post') {
        $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_liked_post']);
        $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        $wo['activity']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>';
    }
    if ($wo['activity']['activity_type'] == 'wondered_post') {
        $lang_type = ($wo['config']['second_post_button'] == 'wonder') ? $wo['lang']['activity_wondered_post'] : $wo['lang']['activity_disliked_post'];
        $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $lang_type);
        $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        $wo['activity']['icon'] .= $wo['second_post_button_icon'];
    }
    if ($wo['activity']['activity_type'] == 'shared_post') {
        $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_share_post']);
        $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        $wo['activity']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>';
    }
    if ($wo['activity']['activity_type'] == 'commented_post') {
        $wo['activity']['type_text'] = str_replace($orginal_txt, $replaced_txt, $wo['lang']['activity_commented_on_post']);
        $wo['activity']['type_text'] = str_replace('\"', '', $wo['activity']['type_text']);
        $wo['activity']['icon'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
    }
}
?>
<div class="activity wow_side_acts <?php echo (!empty($wo['activity']['unread'])) ? ' unread' : '' ;?>" data-activity-id="<?php echo $wo['activity']['id']; ?>">
	<div class="notification-list">
		<div class="notification-user-avatar <?php echo lui_RightToLeft('pull-left');?>">
			<a href="<?php echo $wo['activity']['activator']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['activity']['activator']['username']; ?>" title="#"><img src="<?php echo $wo['activity']['activator']['avatar']; ?>" alt="<?php echo $wo['user']['avatar']; ?>Profile picture"></a>
			<span><?php echo $wo['activity']['icon'];?></span>
		</div>
		<div class="notification-text wo_sidebar_activity">
			<div>
			<span class="user-popover" data-id="<?php echo $wo['activity']['activator']['id'];?>" data-type="<?php echo $wo['activity']['activator']['type'];?>">
				<a class="main-color" href="<?php echo $wo['activity']['activator']['url'];?> " data-ajax="?link1=timeline&u=<?php echo $wo['activity']['activator']['username']; ?>">
					<?php echo $wo['activity']['activator']['name']; ?>
				</a>
			</span>
			<?php echo $wo['activity']['type_text']; ?>
			<span class="notification-time active">
				<span class="ajax-time" title="<?php echo date('c',$wo['activity']['time']); ?>">
					<?php echo lui_Time_Elapsed_String($wo['activity']['time'])?>
				</span>
			</span>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>