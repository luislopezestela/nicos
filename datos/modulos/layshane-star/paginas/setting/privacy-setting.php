<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
	<br>
<div class="wo_settings_page wow_content">
	<div class="avatar-holder privacy">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['privacy_setting']; ?></p>
		</div>
	</div>
	<hr>

	<form class="form-horizontal setting-privacy-form" method="post">
         <div class="setting-privacy-alert setting-update-alert"></div>
		 
		 <div class="setting-panel wow_sett_privt_labls">
			<!-- Select Basic -->
			<?php if ($wo['config']['connectivitySystem'] == 0) { ?>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="follow_privacy"> <?php echo $wo['lang']['follow_privacy_label']; ?></label>
				<div class="col-md-6">
					<select id="follow_privacy" name="follow_privacy" class="form-control">
						<?php 
							$selected_followp_everyone   = ($wo['setting']['follow_privacy'] == 0)   ? ' selected' : '';
							$selected_followp_following  = ($wo['setting']['follow_privacy'] == 1)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_followp_everyone; ?>><?php echo $wo['lang']['everyone']; ?></option>
						<option value="1" <?php echo $selected_followp_following; ?>>
							<?php  echo $wo['lang']['people_i_follow']; ?>
						</option>
					</select>
				</div>
			</div>
			<?php } ?>
			<!-- Select Basic -->
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="message_privacy"><?php echo $wo['lang']['message_privacy_label']; ?></label>
				<div class="col-md-6">
					<select id="message_privacy" name="message_privacy" class="form-control">
						<?php 
							$selected_meesageP_everyone   = ($wo['setting']['message_privacy'] == 0)   ? ' selected' : '';
							$selected_meesageP_following  = ($wo['setting']['message_privacy'] == 1)   ? ' selected' : '';
							$selected_meesageP_nobody  = ($wo['setting']['message_privacy'] == 2)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_meesageP_everyone; ?> ><?php echo $wo['lang']['everyone']; ?></option>
						<option value="1" <?php echo $selected_meesageP_following; ?> >
							<?php 
							if ($wo['config']['connectivitySystem'] == 1) {
								echo $wo['lang']['my_friends'];
							} else {
								echo $wo['lang']['people_i_follow'];
							}
							?>
						</option>
						<option value="2" <?php echo $selected_meesageP_nobody; ?> ><?php echo $wo['lang']['no_body']; ?></option>
					</select>
				</div>
			</div>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="friend_privacy"><?php  echo $wo['lang']['friend_privacy']; ?></label>
				<div class="col-md-6">
					<select id="friend_privacy" name="friend_privacy" class="form-control">
						<?php 
							$selected_friendP_everyone    = ($wo['setting']['friend_privacy'] == 0)   ? ' selected' : '';
							$selected_friendP_following   = ($wo['setting']['friend_privacy'] == 1)   ? ' selected' : '';
							$selected_friendP_followingme = ($wo['setting']['friend_privacy'] == 2)   ? ' selected' : '';
							$selected_friendP_no_one      = ($wo['setting']['friend_privacy'] == 3)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_friendP_everyone; ?> >
							<?php echo $wo['lang']['everyone']; ?>  
						</option>
						<option value="1" <?php echo $selected_friendP_following; ?> >
							<?php echo $wo['lang']['people_i_follow'];?>
						</option>
						<option value="2" <?php echo $selected_friendP_followingme; ?> >
							<?php echo $wo['lang']['people_follow_me'];?>
						</option>
						<option value="3" <?php echo $selected_friendP_no_one; ?> >
							<?php echo $wo['lang']['no_body'];?>
						</option>
					</select>
				</div>
			</div>
			<!-- Select Basic -->
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="post_privacy"><?php echo $wo['lang']['timeline_post_privacy_label']; ?></label>
				<div class="col-md-6">
					<select id="post_privacy" name="post_privacy" class="form-control">
						<?php 
							$selected_postp_everyone   = ($wo['setting']['post_privacy'] == "everyone")   ? ' selected' : '';
							$selected_postp_following  = ($wo['setting']['post_privacy'] == "ifollow")     ? ' selected' : '';
							$selected_postp_none       = ($wo['setting']['post_privacy'] == "nobody")      ? ' selected'  : '';
						?>
						<option value="everyone" <?php echo $selected_postp_everyone; ?>><?php echo $wo['lang']['everyone']; ?></option>
						<option value="ifollow" <?php echo $selected_postp_following; ?>>
							<?php 
							if ($wo['config']['connectivitySystem'] == 1) {
								echo $wo['lang']['my_friends'];
							} else {
								echo $wo['lang']['people_i_follow'];
							}
							?>
						</option>
						<option value="nobody" <?php echo $selected_postp_none; ?>><?php echo $wo['lang']['no_body']; ?></option>
					</select>
				</div>
			</div>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="birth_privacy"><?php echo $wo['lang']['timeline_birthday_label']; ?></label>
				<div class="col-md-6">
					<select id="birth_privacy" name="birth_privacy" class="form-control">
						<?php 
							$selected_birth_privacy_everyone   = ($wo['setting']['birth_privacy'] == 0)   ? ' selected' : '';
							$selected_birth_privacy_following  = ($wo['setting']['birth_privacy'] == 1)     ? ' selected' : '';
							$selected_birth_privacy_none       = ($wo['setting']['birth_privacy'] == 2)      ? ' selected'  : '';
						?>
						<option value="0" <?php echo $selected_birth_privacy_everyone; ?>><?php echo $wo['lang']['everyone']; ?></option>
						<option value="1" <?php echo $selected_birth_privacy_following; ?>>
							<?php 
							if ($wo['config']['connectivitySystem'] == 1) {
								echo $wo['lang']['my_friends'];
							} else {
								echo $wo['lang']['people_i_follow'];
							}
							?>
						</option>
						<option value="2" <?php echo $selected_birth_privacy_none; ?>><?php echo $wo['lang']['no_body']; ?></option>
					</select>
				</div>
			</div>
			<?php if($wo['config']['connectivitySystem'] == 0) { ?>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="confirm_followers"> <?php echo $wo['lang']['confirm_request_privacy_label']; ?> </label>
				<div class="col-md-6">
					<select id="confirm_followers" name="confirm_followers" class="form-control">
						<?php 
							$selected_confirm_followers_no   = ($wo['setting']['confirm_followers'] == 0)   ? ' selected' : '';
							$selected_confirm_followers_yes  = ($wo['setting']['confirm_followers'] == 1)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_confirm_followers_no; ?>>
							<?php echo $wo['lang']['no']; ?>
						</option>
						<option value="1" <?php echo $selected_confirm_followers_yes; ?>>
							<?php echo $wo['lang']['yes']; ?>
						</option>
					</select>
				</div>
			</div>
			<?php } ?>
			<?php
				$profileVisits = 0;
				if ($wo['config']['pro'] == 1) {
					if ($wo['setting']['is_pro'] == 1 && in_array($wo['setting']['pro_type'], array_keys($wo['pro_packages'])) && $wo['pro_packages'][$wo['user']['pro_type']]['profile_visitors'] == 1) {
					$profileVisits = 1;
					}
				} else {
					$profileVisits = 1;
				}
			?>
			<?php if ($profileVisits == 1) { ?>
			<?php if($wo['config']['profileVisit'] == 1) { ?>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="visit_privacy"> <?php echo $wo['lang']['profile_visit_notification_p']; ?></label>
				<div class="col-md-6">
					<select id="visit_privacy" name="visit_privacy" class="form-control">
						<?php 
							$selected_visit_privacy_yes   = ($wo['setting']['visit_privacy'] == 0)   ? ' selected' : '';
							$selected_visit_privacy_no    = ($wo['setting']['visit_privacy'] == 1)   ? ' selected' : '';
						?>
						<option value="1" <?php echo $selected_visit_privacy_no; ?>>
							<?php echo $wo['lang']['no']; ?>
						</option>
						<option value="0" <?php echo $selected_visit_privacy_yes; ?>>
							<?php echo $wo['lang']['yes']; ?>
						</option>
					</select>
					<span class="help-block"><?php echo $wo['lang']['profile_visit_notification_help']; ?></span>
				</div>
			</div>
			<?php } ?>
			<?php if($wo['config']['user_lastseen'] == 1 && in_array($wo['setting']['pro_type'], array_keys($wo['pro_packages'])) && $wo['pro_packages'][$wo['user']['pro_type']]['last_seen'] == 1) { ?>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="showlastseen"> <?php echo $wo['lang']['lastseen_privacy_label']; ?></label>
				<div class="col-md-6">
					<select id="showlastseen" name="showlastseen" class="form-control">
						<?php 
							$selected_lastseen_yes   = ($wo['setting']['showlastseen'] == 1)   ? ' selected' : '';
							$selected_lastseen_no    = ($wo['setting']['showlastseen'] == 0)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_lastseen_no; ?>>
							<?php echo $wo['lang']['no']; ?>
						</option>
						<option value="1" <?php echo $selected_lastseen_yes; ?>>
							<?php echo $wo['lang']['yes']; ?>
						</option>
					</select>
					<span class="help-block"><?php echo $wo['lang']['showlastseen_help']; ?></span>
				</div>
			</div>
			<?php } ?>
			<?php } ?>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="show_activities_privacy"> <?php echo $wo['lang']['activities_privacy_label']; ?></label>
				<div class="col-md-6">
					<select id="show_activities_privacy" name="show_activities_privacy" class="form-control">
						<?php 
							$selected_activities_yes   = ($wo['setting']['show_activities_privacy'] == 1)   ? ' selected' : '';
							$selected_activities_no    = ($wo['setting']['show_activities_privacy'] == 0)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_activities_no; ?>>
							<?php echo $wo['lang']['no']; ?>
						</option>
						<option value="1" <?php echo $selected_activities_yes; ?>>
							<?php echo $wo['lang']['yes']; ?>
						</option>
					</select>
				</div>
			</div>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="chat_status"> <?php echo $wo['lang']['status']; ?></label>
				<div class="col-md-6">
					<select id="chat_status" name="status" class="form-control">
						<?php 
							$selected_chat_status_yes   = ($wo['setting']['status'] == 1)   ? ' selected' : '';
							$selected_chat_status_no    = ($wo['setting']['status'] == 0)   ? ' selected' : '';
						?>
						<option value="0" <?php echo $selected_chat_status_no; ?>>
							<?php echo $wo['lang']['online']; ?>
						</option>
						<option value="1" <?php echo $selected_chat_status_yes; ?>>
							<?php echo $wo['lang']['offline']; ?>
						</option>
					</select>
				</div>
			</div>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="share_my_location"> <?php echo $wo['lang']['share_my_location']; ?></label>
				<div class="col-md-6">
					<select id="share_my_location" name="share_my_location" class="form-control">
						<?php 
							$selected_share_my_location_yes   = ($wo['setting']['share_my_location'] == 1)   ? ' selected' : '';
							$selected_share_my_location_no    = ($wo['setting']['share_my_location'] == 0)   ? ' selected' : '';
						?>
						<option value="1" <?php echo $selected_share_my_location_yes; ?>>
							<?php echo $wo['lang']['yes']; ?>
						</option>
						<option value="0" <?php echo $selected_share_my_location_no; ?>>
							<?php echo $wo['lang']['no']; ?>
						</option>
					</select>
				</div>
			</div>
			<div class="form-group wow_form_fields">
				<label class="col-md-6" for="share_my_data"> <?php echo $wo['lang']['index_my_page_privacy']; ?></label>
				<div class="col-md-6">
					<select id="share_my_data" name="share_my_data" class="form-control">
						<?php 
							$selected_share_my_data_yes   = ($wo['setting']['share_my_data'] == 1)   ? ' selected' : '';
							$selected_share_my_data_no    = ($wo['setting']['share_my_data'] == 0)   ? ' selected' : '';
						?>
						<option value="1" <?php echo $selected_share_my_data_yes; ?>>
							<?php echo $wo['lang']['yes']; ?>
						</option>
						<option value="0" <?php echo $selected_share_my_data_no; ?>>
							<?php echo $wo['lang']['no']; ?>
						</option>
					</select>
				</div>
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
  $('form.setting-privacy-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_privacy_settings',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      scrollToTop();
      if (data.status == 200) {
        $('.setting-privacy-alert').html('<div class="alert alert-success">' + data.message + '</div>');
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
<?php } ?>