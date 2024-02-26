<?php 
$messages = lui_GetGroupMessagesAPP(array('group_id' => $wo['group']['group_id'],'limit' => 1));
$message = array();
if (!empty($messages) && !empty($messages[0])) {
	$message = $messages[0];
	if (strlen($message['text']) > 100) {
		$message['text'] = mb_substr( $message['text'], 0, 97, "utf-8") . '...';
	}
}
	
 ?>
<div class="messages-recipients-list mobileopenlist" id="messages-group-<?php echo $wo['group']['group_id']; ?>" onclick="Wo_GetGroupMessages(<?php echo $wo['group']['group_id']; ?>,'<?php echo str_replace(array("&#039;"), "`", $wo['group']['group_name']); ?>');">
	<div class="avatar <?php echo lui_RightToLeft('pull-left');?>">
		<img alt="<?php echo $wo['group']['group_name']; ?> Group Picture" src="<?php echo $wo['group']['avatar'];?>">
	</div>
	<div class="msg_rght_prt">
		<div class="messages-last-sent <?php echo lui_RightToLeft('pull-right');?>"><?php echo !empty($message['time']) ? lui_Time_Elapsed_String($message['time']) : ''; ?></div>
		<span class="msg_ava_name">
			<span class="messages-user-name"><?php echo $wo['group']['group_name']; ?></span>
		</span>
		<p><?php echo !empty($message['text']) ? $message['text'] : ''; ?></p>
	</div>
	<div class="clear"></div>
</div>