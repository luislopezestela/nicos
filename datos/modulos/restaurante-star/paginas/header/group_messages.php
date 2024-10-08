<?php
$messages = lui_GetGroupMessagesAPP(array('group_id' => $wo['group']['group_id'],'limit' => 1));
$message = array();
if (!empty($messages) && !empty($messages[0])) {
   $message = $messages[0];
   
   if (strlen($message['orginal_text']) > 100) {
      $message['orginal_text'] = mb_substr( $message['orginal_text'], 0, 97, "utf-8") . '...';
   }
}
$unread_class = '';
if (!empty($message) && isset($message['time']) && isset($message['from_id']) && $message['from_id'] != $wo['user']['id']) {
   if ($message['time'] > $message['chat_data']['last_seen']) {
       $unread_class = ' unread';
   }
}

$message_event = "Wo_OpenChatTab(0,".$wo['group']['group_id'].");";
$message['orginal_text'] = lui_Emo($message['orginal_text']);
?>
<li>
   <div class="notification-list messages-list <?php echo $unread_class;?>" onclick="<?php echo $message_event ?>">
         <div class="notification-user-avatar <?php echo lui_RightToLeft('pull-left');?>">
            <img src="<?php echo $wo['group']['avatar'];?>" alt="<?php echo $wo['group']['group_name']; ?> Profile picture">
         </div>
         <div class="notification-text">
			<div class="notification-time active <?php echo lui_RightToLeft('pull-right');?>">
               <div class="ajax-time" title="<?php echo (!empty($message['time'])) ? date('c',$message['time']) : '';?>">
                <?php echo (!empty($message['time'])) ? lui_Time_Elapsed_String($message['time']) : '';?>
               </div>
            </div>
            <span class="main-color">
            <?php echo $wo['group']['group_name']; ?>
            </span>
            <?php if (!empty($message['from_id'])): ?>
            <div class="header-message">
                  <?php echo ($wo['user']['id'] == $message['from_id']) ? $wo['lang']['me'] . ': ' : '';?>
                  <?php echo (!empty($message['media'])) ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> ' . $wo['lang']['file_n_label'] : $message['orginal_text']; ?>
            </div>
            <?php endif ?>
         </div>
         <div class="clear"></div>
   </div>
</li>
<li class="divider"></li>