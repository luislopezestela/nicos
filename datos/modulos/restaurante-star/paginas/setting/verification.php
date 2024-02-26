<?php if (lui_IsAdmin()) {
   header('Location: ' . $wo['config']['site_url'] . '/admincp/verifications_requests');
   exit();
} ?>

<div class="wo_settings_page wow_content">
	<div class="avatar-holder verification">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['profile_verification']; ?></p>
		</div>
	</div>
	<hr>
	<?php if (!empty($wo['available_verified_features'])) { ?>
		<div>
			<h5><?php echo $wo['lang']['after_verified'] ?></h5>
			<ol>
				<?php foreach ($wo['available_verified_features'] as $key => $value) { ?>
					<li><?php echo $wo['lang'][$value];?></li>
				<?php } ?>
			</ol>
		</div>
	<?php } ?>
		

	<?php if (lui_IsVerificationRequestExists()): ?>
	<div class="verification-status">
		<h4>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> &nbsp;
			<?php echo $wo['lang']['verification_sent']; ?> 
		</h4>
	</div>
	<?php elseif($wo['user']['verified'] == 1): ?>
	<div class="verification-status">                                             
		<h4>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg>
			<?php echo $wo['lang']['verification_complete']; ?> 
		</h4>
	</div>
	<?php else: ?>
	<form action="#" method="post" class="form-horizontal setting-verification-form">
		<div id="verificate-user-alert"></div>
		
		<div class="wow_form_fields">
			<label for="name"><?=$wo['lang']['username']; ?></label>  
			<input id="name" name="name" type="text" value="" class="form-control input-md" autocomplete="off">
		</div>
		<div class="wow_form_fields">
			<label for="text"><?php echo $wo['lang']['message']; ?></label>  
			<textarea name="text" class="form-control" id="text" rows="4"></textarea>
		</div>
		<div class="wow_form_fields mb-0">
			<label for="text"><?php echo $wo['lang']['upload_docs']; ?></label>  
			<span class="help-block"><?php echo $wo['lang']['select_verif_images']; ?></span>
		</div>
		
		<div class="select-user-verification-data">
			<div class="select-user-verification-photos">
				<div class="pull-left text-center" id="verif-id">
					<div class="empty_state">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" fill="currentColor"></path></svg> <?php echo $wo['lang']['passport_id']; ?>
					</div>
				</div>
				<div class="pull-right text-center" id="verif-photo">
					<div class="empty_state">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4,5H7L9,3H15L17,5H20A2,2 0 0,1 22,7V19A2,2 0 0,1 20,21H4A2,2 0 0,1 2,19V7A2,2 0 0,1 4,5M16,17V16C16,14.67 13.33,14 12,14C10.67,14 8,14.67 8,16V17H16M12,9A2,2 0 0,0 10,11A2,2 0 0,0 12,13A2,2 0 0,0 14,11A2,2 0 0,0 12,9Z" fill="currentColor"></path></svg> <?php echo $wo['lang']['personal_pic']; ?>
					</div>
				</div>
			</div>
			<div class="clear"></div> 
		</div>
		
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['send']; ?></button>
		</div>

		<input type="file" name="passport" class="hidden" id="select-passport-photo" >
		<input type="file" name="photo" class="hidden" id="select-user-photo" >
		<input type="reset" class="hidden" id="reset-verification-request">
	</form>
	<?php endif; ?>
</div>
<script>
   jQuery(document).ready(function($) {
      $("#text").autogrow({vertical: true, horizontal: false});

      $("#verif-id").click(function(event) {
         $("#select-passport-photo").trigger('click');
      });

      $("#verif-photo").click(function(event) {
         $("#select-user-photo").trigger('click');
      });

      $("#select-passport-photo").change(function(event) {
         $("#verif-id").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Imagen' class='responsive-img'>")
      });

      $("#select-user-photo").change(function(event) {
         $("#verif-photo").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Imagen' class='responsive-img'>")
      });

      
      $(".setting-verification-form").ajaxForm({
         url: Wo_Ajax_Requests_File() + '?f=verificate-user',
         beforeSend: function() {
           $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
         },
         success: function(data) {
           scrollToTop();
           if (data['status'] == 200) {
             $("#verificate-user-alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
             window.location = data['url'];
           }
           else {
             $("#verificate-user-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
           } 
           $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
      }});
   });
</script>