<?php 
$message_count = lui_CountMessages(array('new' => true,'user_id' => $wo['chatList']['user_id']));  
?>
<div class="recipient-chat-user" id="online_<?php echo $wo['chatList']['user_id'];?>">
	<div class="user-info" onclick="Wo_OpenChatTab(<?php echo $wo['chatList']['user_id'];?>);" title="<?php echo $wo['lang']['online']; ?>">
		<div class="contenido_usua">
			<div class="avatar_usuario">
				<svg aria-hidden="true" class="x3ajldb" data-visualcompletion="ignore-dynamic" role="none" style="height:36px;width:36px">
				  <mask id="mask1">
				    <circle cx="18" cy="18" fill="white" r="18"></circle>
				    <!-- El segundo círculo que causa el recorte ha sido eliminado -->
				  </mask>
				  <g mask="url(#mask1)">
				    <image style="height:36px;width:36px" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="<?php echo $wo['chatList']['avatar'];?>"></image>
				    <circle class="xbh8q5q x1pwv2dq xvlca1e" cx="18" cy="18" r="18"></circle>
				  </g>
				</svg>
			</div>
			<span class="chat-user-text" id="chat-tab-id"><?php echo $wo['chatList']['name']; ?>
			<?php if (!empty($wo['chatList']['is_open_to_work']) && $wo['config']['website_mode'] == 'linkedin') { ?>
				<span class="wo_open_job_badge" title="<?php echo($wo['lang']['open_to_work']); ?>" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg></span>
			<?php } ?>
			</span>
			<div class="wow_chat_list-right">
				<span class="new-message-alert <?php echo ($message_count == 0) ? 'hidden' : ''; ?>"><?php echo $message_count; ?></span>
				<svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24"><path fill="#60d465" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
				<span class="chat-loading-icon"></span>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>