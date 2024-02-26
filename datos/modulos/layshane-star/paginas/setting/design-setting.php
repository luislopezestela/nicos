<div class="wo_settings_page wow_content">
	<div class="avatar-holder design">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['design']; ?></p>
		</div>
	</div>
	<hr>

	<form  method="post" class="setting-profile-form" enctype="multipart/form-data">
		<div class="setting-profile-alert setting-update-alert"></div>
		 
		 <div class="setting-panel row">
			<!-- Text input-->
			<?php if ($wo['config']['profile_back'] == 1) { ?>
			<div class="form-group col-lg-6">
				<label class="col-md-12" for="background_image"><?php echo $wo['lang']['background']; ?></label>  
				<div class="col-md-12">
					<span class="btn wo_design_button btn-file w-100">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></span>
						<input type="file" id="background_image" accept="image/*" name="background_image">
					</span>
				</div>
				<div class="avatar-read" id="photo-form">
					<label class="col-md-12"></label>  
					<div class="col-md-12">
						<input type="text" class="form-control input-md" readonly>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if ($wo['config']['css_upload'] == 1) { ?>
			<div class="form-group col-lg-6">
				<label class="col-md-12" for="css_file"><?php echo $wo['lang']['css_file'];?></label>  
				<div class="col-md-12">
					<span class="btn btn-file wo_design_button w-100">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></span>
						<input type="file" id="css_file" accept="text/css" name="css_file">
					</span>
					<span class="help-block"><?php echo $wo['lang']['css_file_info'];?></span>
				</div>
				<div class="css_file-read" id="photo-form">
					<label class="col-md-12"></label>  
					<div class="col-md-12">
						<input type="text" class="form-control input-md" readonly>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
			
		<div class="setting-panel row">
			<?php if (!empty($wo['setting']['background_image'])) { ?>
			<div class="form-group col-lg-6">
				<?php 
					$selected_my_background   = ($wo['setting']['background_image_status'] == '1')   ? ' checked' : '';
					$selected_defualt_background = ($wo['setting']['background_image_status'] == '0')   ? ' checked' : '';
				?>
				<label class="col-md-12" for="background_image_status"><?php echo $wo['lang']['theme']; ?></label>
				<div class="col-md-12 round-check">
					<input type="radio" name="background_image_status" id="background_image_status-0" value="defualt" <?php echo $selected_defualt_background; ?>>
					<label for="background_image_status-0"><?php echo $wo['lang']['deafult']; ?></label>
				</div>
				<div class="col-md-12 round-check">
					<input type="radio" name="background_image_status" id="background_image_status-1" value="my_background" <?php echo $selected_my_background; ?>>
					<label for="background_image_status-1"><?php echo $wo['lang']['my_background']; ?></label>
				</div>
			</div>
			<?php }?>
			<?php if ($wo['config']['css_upload'] == 1) { ?>
			<?php if (!empty($wo['setting']['css_file']) && file_exists($wo['setting']['css_file'])) { ?>
			<div class="form-group col-lg-6">
				<?php 
					$selected_my_css   = (!empty($wo['setting']['css_file']) && file_exists($wo['setting']['css_file'])) ? ' checked' : '';
					$selected_defualt_css = (!empty($wo['setting']['css_file']) && file_exists($wo['setting']['css_file']))   ? ' checked' : '';
				?>
				<label class="col-md-12" for="css_status"><?php echo $wo['lang']['design'];?></label>
				<div class="col-md-12 round-check">
					<input type="radio" name="css_status" id="css_status-0" value="1" <?php echo $selected_defualt_css; ?>>
					<label for="css_status-0"><?php echo $wo['lang']['css_status_default']; ?></label>
				</div>
				<div class="col-md-12 round-check">
					<input type="radio" name="css_status" id="css_status-1" value="2" <?php echo $selected_my_css; ?>>
					<label for="css_status-1"><?php echo $wo['lang']['css_status_my']; ?></label>
				</div>
			</div>
			<?php } ?>
			<?php } ?>
         </div>
		
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['save']; ?></button>
		</div>
		
         <input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['setting']['user_id'];?>">
         <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>
</div>
<script type="text/javascript">
$(function() {
  $("#background_image").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $(".avatar-read input").val(filename);
         $(".avatar-read").slideDown(200);
    });
  $("#css_file").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $(".css_file-read input").val(filename);
         $(".css_file-read").slideDown(200);
    });
  $('form.setting-profile-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_design_setting',
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
      } 
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
  $("#background_image").on('change', function() {
         $("#background_image_status-1").attr("checked", true);
  });
});
</script>