<?php
$wo['emailNotification']['type_text'] = '';
if ($wo['emailNotification']['type'] == "reaction") {
    if( $wo['emailNotification']['text'] == "post" ){
        $wo['emailNotification']['type_text'] .= $wo['lang']['reacted_to_your_post'];
    }else if( $wo['emailNotification']['text'] == "comment" ){
        $wo['emailNotification']['type_text'] .= $wo['lang']['reacted_to_your_comment'];
    }else if( $wo['emailNotification']['text'] == "replay" ){
        $wo['emailNotification']['type_text'] .= $wo['lang']['reacted_to_your_replay'];
    }
}
    
if ($wo['emailNotification']['type'] == "following") {
    $wo['emailNotification']['type_text'] .= 'is following you';
}
if ($wo['emailNotification']['type'] == "visited_profile") {
    $wo['emailNotification']['type_text'] .= 'visited your profile';
}
if ($wo['emailNotification']['type'] == 'comment_mention') {
    $wo['emailNotification']['type_text'] .= 'mentioned you on a comment';
}
if ($wo['emailNotification']['type'] == 'post_mention') {
    $wo['emailNotification']['type_text'] .= 'mentioned you on a post';
}
if ($wo['emailNotification']['type'] == 'liked_post') {
    $wo['emailNotification']['type_text'] .= 'liked your post';
}
if ($wo['emailNotification']['type'] == 'wondered_post') {
    $lang_type = ($wo['config']['second_post_button'] == 'wonder') ? 'wondered your post' : 'disliked your post';
    $wo['emailNotification']['type_text'] .= $lang_type;
}
if ($wo['emailNotification']['type'] == 'share_post' || $wo['emailNotification']['type'] == 'shared_your_post') {
    $wo['emailNotification']['type_text'] .= 'shared your post';
}
if ($wo['emailNotification']['type'] == 'shared_a_post_in_timeline') {
    $wo['emailNotification']['type_text'] .= 'shared a post in your timeline';
}
if ($wo['emailNotification']['type'] == 'comment') {
    $wo['emailNotification']['type_text'] .= 'commented on your post';
}
if ($wo['emailNotification']['type'] == 'liked_comment') {
    $wo['emailNotification']['type_text'] .= 'liked your comment "' . $wo['emailNotification']['text'] . '"';
}
if ($wo['emailNotification']['type'] == 'wondered_comment') {
    $lang_type = ($wo['config']['second_post_button'] == 'wonder') ? 'wondered your comment' : 'disliked your comment';
    $wo['emailNotification']['type_text'] .= $lang_type . ' "' . $wo['emailNotification']['text'] . '"';
}
if ($wo['emailNotification']['type'] == 'profile_wall_post') {
    $wo['emailNotification']['type_text'] .= 'posted on your timeline';
}
if ($wo['emailNotification']['type'] == 'accepted_request') {
    $request_type = ($wo['config']['connectivitySystem'] == 1) ? 'friend' : 'follow';
    $wo['emailNotification']['type_text'] .= "accepted your {$request_type} request.";
}
if ($wo['emailNotification']['type'] == 'liked_page') {
    $page = Wo_PageData($wo['emailNotification']['page_id']);
    $wo['emailNotification']['type_text'] = 'liked your page (' . $page['name'] . ')';
}
if ($wo['emailNotification']['type'] == 'joined_group') {
    $group = Wo_GroupData($wo['emailNotification']['group_id']);
    $wo['emailNotification']['type_text'] = 'joined your group (' . $group['name'] . ')';
}

if ($wo['emailNotification']['type'] == 'sent_message') {
  $wo['emailNotification']['type_text'] = 'Sent you a new message';
}
$text = '';
if (!empty($wo['emailNotification']['post_data']['text'])) {
  $text = $wo['emailNotification']['post_data'][ 'text'];
}

else if(!empty($wo['emailNotification']['msg_text'])){
  $text = "\"" . $wo['emailNotification']['msg_text'] . "\"";
}

$data = $db->where('name','notification')->getOne(T_HTML_EMAILS);
$html = $data->value;
$replaces = array('SITE_NAME' => $wo['config']['siteName'],
                  'NOTIFY_URL' => $wo['emailNotification']['notifier']['url'],
                  'NOTIFY_AVATAR' => $wo['emailNotification']['notifier']['avatar'],
                  'NOTIFY_NAME' => $wo['emailNotification']['notifier']['name'],
                  'TEXT_TYPE' => $wo['emailNotification']['type_text'],
                  'TEXT' => $text,
                  'URL' => $wo['emailNotification']['url']);
$html = lui_ReplaceText($html,$replaces);
echo $html;
?>