<div class="wo_settings_page wow_content">
	<div class="avatar-holder notifications">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['email_notification']; ?></p>
		</div>
	</div>
	<hr>
	
	<?php if ($wo['config']['emailNotification'] == 1) {?>
	<ul class="sett_tab_noti">
		<li dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=notifications-settings');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=notifications-settings">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21M19.75,3.19L18.33,4.61C20.04,6.3 21,8.6 21,11H23C23,8.07 21.84,5.25 19.75,3.19M1,11H3C3,8.6 3.96,6.3 5.67,4.61L4.25,3.19C2.16,5.25 1,8.07 1,11Z" /></svg> <?php echo $wo['lang']['notification_settings'];?>
			</a>
		</li>
		<li class="active" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=email-setting');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=email-setting">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg> <?php echo $wo['lang']['email_notification'];?>
			</a>
		</li>
	</ul>
	<?php } ?>

	<form class="setting-general-form form-horizontal" method="post">
		<div class="setting-general-alert setting-update-alert"></div>
		
		<div class="setting-panel row">
			<!-- Multiple Radios (inline) -->
         	<div class="col-md-3"><h5><?php echo $wo['lang']['email_me_when']; ?></h5></div>
         	<div class="col-lg-9">
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_liked   = ($wo['setting']['e_liked'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_liked" id="e_liked" value="1" <?php echo $selected_e_liked; ?>>
						<label for="e_liked"><?php echo $wo['lang']['e_likes_my_posts']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<?php if ($wo['config']['second_post_button'] != 'disabled') { ?>
				<div class="form-group">
					<?php 
						$selected_e_wondered   = ($wo['setting']['e_wondered'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_wondered" id="e_wondered" value="1" <?php echo $selected_e_wondered; ?>>
						<label for="e_wondered"><?php echo ($wo['config']['second_post_button'] == 'wonder') ? $wo['lang']['e_wondered_my_posts'] : $wo['lang']['e_disliked_my_posts']; ?></label>
					</div>
				</div>
				<?php } ?>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_commented   = ($wo['setting']['e_commented'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_commented" id="e_commented" value="1" <?php echo $selected_e_commented; ?>> 
						<label for="e_commented"><?php echo $wo['lang']['e_commented_my_posts']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_shared = ($wo['setting']['e_shared'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_shared" id="e_shared" value="1" <?php echo $selected_e_shared; ?>> 
						<label for="e_shared"><?php echo $wo['lang']['e_shared_my_posts']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_followed = ($wo['setting']['e_followed'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_followed" id="e_followed" value="1" <?php echo $selected_e_followed; ?>>  
						<label for="e_followed"><?php echo $wo['lang']['e_followed_me']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<?php if ($wo['config']['pages'] == 1) { ?>
				<div class="form-group">
					<?php 
						$selected_e_liked_page = ($wo['setting']['e_liked_page'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_liked_page" id="e_liked_page" value="1" <?php echo $selected_e_liked_page; ?>>  
						<label for="e_liked_page"><?php echo $wo['lang']['e_liked_page']; ?></label>
					</div>
				</div>
				<?php } ?>
				<!-- Multiple Radios (inline) -->
				<?php if ($wo['config']['profileVisit'] == 1) { ?>
				<div class="form-group">
					<?php 
						$selected_e_visited = ($wo['setting']['e_visited'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_visited" id="e_visited" value="1" <?php echo $selected_e_visited; ?>>  
						<label for="e_visited"><?php echo $wo['lang']['e_visited_my_profile']; ?></label>
					</div>
				</div>
				<?php } ?>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_mentioned = ($wo['setting']['e_mentioned'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_mentioned" id="e_mentioned" value="1" <?php echo $selected_e_mentioned; ?>>  
						<label for="e_mentioned"><?php echo $wo['lang']['e_mentioned_me']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<?php if ($wo['config']['groups'] == 1) { ?>
				<div class="form-group">
					<?php 
						$selected_e_joined_group = ($wo['setting']['e_joined_group'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_joined_group" id="e_joined_group" value="1" <?php echo $selected_e_joined_group; ?>>  
						<label for="e_joined_group"><?php echo $wo['lang']['e_joined_group']; ?></label>
					</div>
				</div>
				<?php } ?>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_accepted = ($wo['setting']['e_accepted'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_accepted" id="e_accepted" value="1" <?php echo $selected_e_accepted; ?>> 
						<label for="e_accepted"><?php echo $wo['lang']['e_accepted']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_profile_wall_post = ($wo['setting']['e_profile_wall_post'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_profile_wall_post" id="e_profile_wall_post" value="1" <?php echo $selected_e_profile_wall_post; ?>> 
						<label for="e_profile_wall_post"><?php echo $wo['lang']['e_profile_wall_post']; ?></label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
					<?php 
						$selected_e_sentme_msg = ($wo['setting']['e_sentme_msg'] == 1)   ? ' checked' : '';
					?>
					<div class="col-md-12 round-check">
						<input type="checkbox" name="e_sentme_msg" id="e_sentme_msg" value="1" <?php echo $selected_e_sentme_msg; ?>>
						<label for="e_sentme_msg"><?php echo $wo['lang']['e_sent_msg']; ?></label>
					</div>
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
  $('form.setting-general-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_email_settings',
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