<?php 

$message_count = lui_CountMessages(array('new' => true,'user_id' => $wo['chatList']['user_id'])); 
  
?>
<div class="recipient-chat-user" id ="online_<?php echo $wo['chatList']['user_id'];?>" >
 
 <div class="user-info">
 
  <div  class=" <?php echo lui_RightToLeft('pull-right');?>  " style="margin-right:15px; margin-top:5px;">

      <span class="MS-Update-Alert <?php echo ($message_count == 0) ? 'hidden' : ''; ?>">

        <?php echo $message_count; ?>

      </span>

    </div>


  <a href="#" onclick="Wo_OpenChatTab(event,<?php echo $wo['chatList']['user_id'];?>);">

    <div class="avatar">

      <img src="<?php echo $wo['chatList']['avatar'];?>" alt="<?php echo $wo['chatList']['avatar'];?> Foto de perfil" />

    </div>

   <?php echo $wo['chatList']['name']; ?>

  </a>


   <?php if($wo['config']['ulastseen'] == 1 && $wo['chatList']['showlastseen'] != 0) { ?>


  <div class="user-lastseen" title="Last Seen">

    <?php echo lui_UserStatus($wo['chatList']['user_id'],$wo['chatList']['lastseen']); ?>

  </div>

  <?php } ?>
  
</div>
 

  
</div>

<div class="clear"></div>