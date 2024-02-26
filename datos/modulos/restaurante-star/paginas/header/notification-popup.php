<div class="notifications-popup-list" onclick="RemoveNotification(this)" data-id="<?php echo $wo['notification']['id']?>">
   <div class="notification-list <?php if ($wo['notification']['type'] == 'viewed_story') { $wo['notification']['url'] = 'javascript:void(0)' ?> see_all_stories<?php } ?>" <?php if ($wo['notification']['type'] == 'viewed_story') { ?> data_story_user_id="<?php echo $wo['notification']['recipient_id']?>" data_story_type="user" <?php } ?>>
      <a href="<?php echo $wo['notification']['url']; ?>" title="<?php echo $wo['notification']['notifier']['name']; ?>" <?php if (!isset($wo['notification']['wo_url']) && $wo['notification']['type'] != 'viewed_story'): ?> data-ajax="<?php echo $wo['notification']['ajax_url'];?>" <?php endif; ?>>
         <div class="notification-user-avatar <?php echo lui_RightToLeft('pull-left');?>">
            <img src="<?php echo $wo['notification']['notifier']['avatar']; ?>" alt="<?php echo $wo['notification']['notifier']['name']; ?> Profile picture">
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
               <span class="ajax-time" title="<?php echo date('c',$wo['notification']['time']); ?>">
               <?php echo lui_Time_Elapsed_String($wo['notification']['time'])?>
               </span>
            </div>
         </div>
         <div class="clear"></div>
      </a>
   </div>
</div>