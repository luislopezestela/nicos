<div class="wo_settings_page wow_content">
	<div class="avatar-holder notifications">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['notification_settings']; ?></p>
		</div>
	</div>
	<hr>
	
	<?php if ($wo['config']['emailNotification'] == 1) {?>
	<ul class="sett_tab_noti">
		<li class="active" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=notifications-settings');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=notifications-settings">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21M19.75,3.19L18.33,4.61C20.04,6.3 21,8.6 21,11H23C23,8.07 21.84,5.25 19.75,3.19M1,11H3C3,8.6 3.96,6.3 5.67,4.61L4.25,3.19C2.16,5.25 1,8.07 1,11Z" /></svg> <?php echo $wo['lang']['notification_settings'];?>
			</a>
		</li>
		<li dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=email-setting');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=email-setting">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg> <?php echo $wo['lang']['email_notification'];?>
			</a>
		</li>
	</ul>
	<?php } ?>
	
	<?php
	if (!empty($wo['setting']['notification_settings'])) {
		$wo['setting']['notification_settings'] = (Array) json_decode(html_entity_decode($wo['setting']['notification_settings']));
	}
	?>
	<form class="setting-general-form form-horizontal" method="post">
		<div class="setting-general-alert setting-update-alert"></div>
		
		<div class="setting-panel row">
			<!-- Multiple Radios (inline) -->
         	<div class="columna-12"><h5><?php echo $wo['lang']['notify_me_when']; ?></h5></div>
         	<div class="columna-12 wo_sett_noti">

				<!-- Multiple Radios (inline) -->
				<?php if ($wo['config']['pages'] == 1) { ?>
				<div class="form-group">
					<?php 
						$selected_e_liked_page = ($wo['setting']['notification_settings']['e_liked_page'] == 1)   ? ' checked' : '';
					?>
					<div class="columna-12 round-check">
						<input type="checkbox" name="e_liked_page" id="e_liked_page" value="1" <?php echo $selected_e_liked_page; ?>>  
						<label for="e_liked_page"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg>&nbsp;&nbsp;<?php echo $wo['lang']['e_liked_page']; ?></label>
					</div>
				</div>
				<?php } ?>
				<!-- Multiple Radios (inline) -->
				<?php if ($wo['config']['profileVisit'] == 1) { ?>
				<div class="form-group">
					<?php 
						$selected_e_visited = ($wo['setting']['notification_settings']['e_visited'] == 1)   ? ' checked' : '';
					?>
					<div class="columna-12 round-check">
						<input type="checkbox" name="e_visited" id="e_visited" value="1" <?php echo $selected_e_visited; ?>>  
						<label for="e_visited"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" /></svg>&nbsp;&nbsp;<?php echo $wo['lang']['e_visited_my_profile']; ?></label>
					</div>
				</div>
				<?php } ?>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_mentioned = ($wo['setting']['notification_settings']['e_mentioned'] == 1)   ? ' checked' : '';
					?>
					<div class="columna-12 round-check">
						<input type="checkbox" name="e_mentioned" id="e_mentioned" value="1" <?php echo $selected_e_mentioned; ?>>  
						<label for="e_mentioned"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z" /></svg>&nbsp;&nbsp;<?php echo $wo['lang']['e_mentioned_me']; ?></label>
					</div>
				</div>
				<?php if ($wo['config']['memories_system'] != 0) { ?>
				<div class="form-group">
					<?php 
						$selected_e_memory = ($wo['setting']['notification_settings']['e_memory'] == 1)   ? ' checked' : '';
					?>
					<div class="columna-12 round-check">
						<input type="checkbox" name="e_memory" id="e_memory" value="1" <?php echo $selected_e_memory; ?>> 
						<label for="e_memory"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" /></svg>&nbsp;&nbsp;<?php echo $wo['lang']['memory_this_day']; ?></label>
					</div>
				</div>
			    <?php } ?>
			</div>
         </div>
		
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['save']; ?></button>
		</div>
         <input type="hidden" name="user_id" value="<?php echo $wo['setting']['user_id'];?>">
         <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>
</div>
<script type="text/javascript">
$(function() {
  $('form.setting-general-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_notifications_settings',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      scrollToTop();
      if (data.status == 200) {
        $('.setting-general-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast', function() {
           $(this).delay(2500).slideUp(500, function() {
              $(this).remove();
            });
        });
      } 
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
</script>