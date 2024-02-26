<div class="wo_settings_page wow_content">
	<div class="avatar-holder social">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['social_links']; ?></p>
		</div>
	</div>
	<hr>

	<form method="post" class="form-horizontal setting-profile-form" enctype="multipart/form-data">
		<div class="setting-profile-alert setting-update-alert"></div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="facebook"><?php echo $wo['lang']['facebook']; ?></label>  
					<input id="facebook" name="facebook" type="text" class="form-control input-md" value="<?php echo $wo['setting']['facebook'];?>" placeholder="<?php echo $wo['lang']['username'];?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="twitter"><?php echo $wo['lang']['twitter']; ?></label>  
					<input id="twitter" name="twitter" type="text" class="form-control input-md" value="<?php echo $wo['setting']['twitter'];?>" placeholder="<?php echo $wo['lang']['username'];?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="vk"><?php echo $wo['lang']['vkontakte']; ?></label>  
					<input id="vk" name="vk" type="text" class="form-control input-md" value="<?php echo $wo['setting']['vk'];?>" placeholder="<?php echo $wo['lang']['username'];?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="linkedin"><?php echo $wo['lang']['linkedin']; ?></label>  
					<input id="linkedin" name="linkedin" type="text" class="form-control input-md" value="<?php echo $wo['setting']['linkedin'];?>" placeholder="<?php echo $wo['lang']['username'];?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="instagram"><?php echo $wo['lang']['instagram']; ?></label>  
					<input id="instagram" name="instagram" type="text" class="form-control input-md" value="<?php echo $wo['setting']['instagram'];?>" placeholder="<?php echo $wo['lang']['username'];?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="youtube"><?php echo $wo['lang']['youtube']; ?></label>  
					<input id="youtube" name="youtube" type="text" class="form-control input-md" value="<?php echo $wo['setting']['youtube'];?>" placeholder="<?php echo $wo['lang']['username'];?>">
				</div>
			</div>
		</div>
		
		<?php
			$fields = lui_GetProfileFields('social');
			if (count($fields) > 0) {
				foreach ($fields as $key => $wo['field']) {
				echo lui_LoadPage('setting/profile-fields');
			}
				echo '<input name="custom_fields" type="hidden" value="1">';
			}
		?>
		
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['save']; ?></button>
		</div>

		<input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['setting']['user_id'];?>">
		<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>
</div>
<script type="text/javascript">
$(function() {
  $('form.setting-profile-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_socialinks_setting',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
        scrollToTop();
        $('.setting-profile-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast', function() {
          $(this).delay(2500).slideUp(500, function() {
            $(this).remove();
          });
        });
      } else if (data.errors) {
        var errors = data.errors.join("<br>");
        scrollToTop();
        $('.setting-profile-alert').html('<div class="alert alert-danger">' + errors + '</div>');
        $('.alert-danger').fadeIn(300);
      }
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
</script>