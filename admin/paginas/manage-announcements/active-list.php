<div class="alert alert-success announcement-<?php echo $wo['activeAnnouncement']['id'];?>">
   <span class="close announcements-option" data-toggle="tooltip" onclick="Wo_DeleteAnnouncement(<?php echo $wo['activeAnnouncement']['id'];?>);" title="<?php echo $wo['lang']['delete']; ?>">
   <i class="fa fa-trash"></i>
   </span>
   <span class="close announcements-option" style="margin-right: 20px;" data-toggle="tooltip" onclick="Wo_DisableAnnouncement(<?php echo $wo['activeAnnouncement']['id'];?>);" title="<?php echo $wo['lang']['disable']; ?>">
   <i class="fa fa-remove"></i>
   </span>
   <?php echo $wo['activeAnnouncement']['text'];?>
   <span class="time ajax-time" title="<?php echo date('c',$wo['activeAnnouncement']['time']); ?>">
   <?php echo lui_Time_Elapsed_String($wo['activeAnnouncement']['time']);?>
   </span>
   <span class="time">
   <?php echo $wo['lang']['views'] . ' ' . lui_GetAnnouncementViews($wo['activeAnnouncement']['id']);?>
   </span>
</div>