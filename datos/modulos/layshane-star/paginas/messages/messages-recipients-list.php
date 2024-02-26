<?php
$message_count = lui_CountMessages(array(
    'new' => true,
    'user_id' => $wo['recipient']['user_id']
));
$message = lui_GetMessagesHeader(array('user_id' => $wo['recipient']['user_id']), 1);
if (!empty($message['from_id'])) {
   if ($message['seen'] == 0 && $wo['recipient']['user_id'] == $message['from_id']) {
    $unread_class = ' unread';
   }
   if (strlen($message['text']?? '') > 100) {
   	//$message['text'] = mb_substr( $message['text'], 0, 97, "utf-8") . '...';
   }
   $message['text'] = lui_Emo($message['text']);
   
}
?>
<div class="messages-recipients-list mobileopenlist <?php echo (!empty($wo['session_active_background']) && $wo['session_active_background'] == $wo['recipient']['user_id']) ? 'active' : ''; ?>" id="messages-recipient-<?php echo $wo['recipient']['user_id']; ?>" onclick="Wo_GetUserMessages(<?php echo $wo['recipient']['user_id']; ?>,'<?php echo $wo['recipient']['name']; ?>');">
	<div class="avatar <?php echo lui_RightToLeft('pull-left');?>">
		<img alt="<?php echo $wo['recipient']['name']; ?> Profile Picture" src="<?php echo $wo['recipient']['avatar'];?>">
		<?php if ($wo['recipient']['lastseen'] > (time() - 60)) { ?>
			<div class="online_dot"><div class="dot"></div></div>
		<?php } else { ?>
			<div class="online_dot off_usr"><div class="dot"></div></div>
		<?php } ?>
		<span class="new-message-alert <?php echo ($message_count == 0) ? 'hidden' : ''; ?>"></span>
		<?php if (!empty($wo['recipient']['is_open_to_work']) && $wo['config']['website_mode'] == 'linkedin') { ?>
         <span title="<?php echo($wo['lang']['open_to_work']); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:#4caf50;"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg></span>
      <?php } ?>
	</div>
	<div class="msg_rght_prt">
		<div class="messages-last-sent <?php echo ($message_count == 0) ? '' : 'new_msg_lst_lsent'; ?> <?php echo lui_RightToLeft('pull-right');?> time ajax-time" title="<?php echo date('c',$message['time']); ?>"><?php echo (!empty($message['time'])) ? lui_Time_Elapsed_String($message['time']) : '';?></div>
		<span class="msg_ava_name">
			<span class="messages-user-name"><?php echo $wo['recipient']['name']; ?></span>
		</span>
		<p class="<?php echo ($message_count == 0) ? '' : 'new_msg_active_list'; ?>"> <?php echo !empty($message['text']) ? $message['text'] : ''; ?></p>
	</div>
	<div class="clear"></div>
</div>