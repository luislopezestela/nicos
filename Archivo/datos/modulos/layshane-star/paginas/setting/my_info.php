<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
<div class="wo_settings_page wow_content">
	<div class="avatar-holder addresses">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php  echo $wo['lang']['my_info']; ?></p>
		</div>
	</div>
	<hr>

	<?php
	if (!empty($wo['setting']['notification_settings'])) {
		//$wo['setting']['notification_settings'] = unserialize(html_entity_decode($wo['setting']['notification_settings']));
	}
	?>
	<form class="setting-general-form form-horizontal" method="post">
		<div class="setting-general-alert setting-update-alert"></div>

		<div class="select_radio_btn small_rbtn setting_down_info_btns" id="download_steps_comp">
				<h4><?php echo $wo['lang']['to_download']?></h4>
				<div class="select_radio_btn_innr">
					<label>
						<input type="checkbox" name="my_information" id="my_information" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4d91ea" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['my_information'];?></span>
						</div>
					</label>
					<label>
						<input type="checkbox" name="posts" id="posts" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f25e4e" d="M17.8,20C17.4,21.2 16.3,22 15,22H5C3.3,22 2,20.7 2,19V18H5L14.2,18C14.6,19.2 15.7,20 17,20H17.8M19,2C20.7,2 22,3.3 22,5V6H20V5C20,4.4 19.6,4 19,4C18.4,4 18,4.4 18,5V18H17C16.4,18 16,17.6 16,17V16H5V5C5,3.3 6.3,2 8,2H19M8,6V8H15V6H8M8,10V12H14V10H8Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['posts'];?></span>
						</div>
					</label>
					<?php if ($wo['config']['pages'] == 1) { ?>
					<label>
						<input type="checkbox" name="pages" id="pages" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f79f58" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['pages'];?></span>
						</div>
					</label>
					<?php } ?>
					<?php if ($wo['config']['groups'] == 1) { ?>
					<label>
						<input type="checkbox" name="groups" id="groups" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M12,6A3,3 0 0,0 9,9A3,3 0 0,0 12,12A3,3 0 0,0 15,9A3,3 0 0,0 12,6M6,8.17A2.5,2.5 0 0,0 3.5,10.67A2.5,2.5 0 0,0 6,13.17C6.88,13.17 7.65,12.71 8.09,12.03C7.42,11.18 7,10.15 7,9C7,8.8 7,8.6 7.04,8.4C6.72,8.25 6.37,8.17 6,8.17M18,8.17C17.63,8.17 17.28,8.25 16.96,8.4C17,8.6 17,8.8 17,9C17,10.15 16.58,11.18 15.91,12.03C16.35,12.71 17.12,13.17 18,13.17A2.5,2.5 0 0,0 20.5,10.67A2.5,2.5 0 0,0 18,8.17M12,14C10,14 6,15 6,17V19H18V17C18,15 14,14 12,14M4.67,14.97C3,15.26 1,16.04 1,17.33V19H4V17C4,16.22 4.29,15.53 4.67,14.97M19.33,14.97C19.71,15.53 20,16.22 20,17V19H23V17.33C23,16.04 21,15.26 19.33,14.97Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['groups'];?></span>
						</div>
					</label>
					<?php } ?>
					<?php if ($wo['config']['connectivitySystem'] == 0) { ?>
					<label>
						<input type="checkbox" name="following" id="following" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['following'];?></span>
						</div>
					</label>
					<label>
						<input type="checkbox" name="followers" id="followers" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8d73cc" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['followers'];?></span>
						</div>
					</label>
				<?php }else{ ?>
					<label>
						<input type="checkbox" name="friends" id="friends" value="1">
						<div class="sr_btn_lab_innr">
							<div class="sr_btn_img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8d73cc" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg>
							</div>
							<span><?php echo $wo['lang']['friends_btn'];?></span>
						</div>
					</label>
				<?php } ?>
				</div>
			</div>
         <div class="ready_to_down_info">
			<svg height="130px" viewBox="-8 0 480 480.00012" width="130px" xmlns="http://www.w3.org/2000/svg"><g fill="#9bc9ff"><path d="m56.011719 176v232l176 64v-232zm0 0"/><path d="m408.011719 176v232l-176 64v-232zm0 0"/><path d="m8.011719 216 176 64 48-40-176-64zm0 0"/><path d="m280.011719 280 176-64-48-40-176 64zm0 0"/><path d="m280.011719 72-48 40 176 64 48-40zm0 0"/><path d="m184.011719 72-176 64 48 40 176-64zm0 0"/></g><path d="m420.507812 176 40.621094-33.847656c2.199219-1.835938 3.25-4.707032 2.753906-7.527344-.492187-2.820312-2.460937-5.160156-5.152343-6.136719l-176-64c-2.675781-.976562-5.664063-.460937-7.855469 1.359375l-34.863281 29.074219v-22.921875h-16v22.921875l-34.882813-29.074219c-2.1875-1.820312-5.179687-2.335937-7.855468-1.359375l-176 64c-2.691407.976563-4.65625 3.316407-5.152344 6.136719s.554687 5.691406 2.753906 7.527344l40.640625 33.847656-40.625 33.847656c-2.199219 1.835938-3.25 4.707032-2.753906 7.527344.496093 2.820312 2.460937 5.160156 5.152343 6.136719l42.722657 15.542969v168.945312c0 3.359375 2.105469 6.363281 5.261719 7.511719l176 64c1.765624.652343 3.707031.652343 5.472656 0l176-64c3.160156-1.148438 5.261718-4.152344 5.265625-7.511719v-168.945312l42.734375-15.542969c2.695312-.976563 4.660156-3.316407 5.15625-6.136719.492187-2.820312-.554688-5.691406-2.753906-7.527344zm-138.898437-94.902344 158.59375 57.671875-33.792969 28.132813-158.582031-57.671875zm-57.597656 99.589844-20.289063-20.28125-11.3125 11.3125 39.601563 39.59375 39.597656-39.59375-11.3125-11.3125-20.285156 20.28125v-57.273438l144.597656 52.585938-152.597656 55.488281-152.601563-55.488281 144.601563-52.585938zm-41.601563-99.589844 33.777344 28.132813-158.578125 57.671875-33.78125-28.132813zm-124.800781 104 158.59375 57.671875-33.792969 28.132813-158.582031-57.671875zm6.402344 59.773438 117.261719 42.640625c.878906.324219 1.804687.488281 2.738281.488281 1.871093 0 3.679687-.652344 5.117187-1.847656l34.882813-29.074219v203.496094l-160-58.175781zm336 157.527344-160 58.175781v-203.496094l34.878906 29.074219c1.4375 1.195312 3.25 1.847656 5.121094 1.847656.933593 0 1.859375-.164062 2.734375-.488281l117.265625-42.640625zm-118.402344-131.496094-33.773437-28.132813 158.574218-57.671875 33.777344 28.132813zm0 0" fill="#1e81ce"/><path d="m248.011719 432c0 4.417969 3.582031 8 8 8 7.886719 0 75.574219-26.398438 130.976562-48.566406 4.101563-1.644532 6.097657-6.304688 4.453125-10.410156-1.640625-4.105469-6.300781-6.097657-10.40625-4.457032-55.136718 22.066406-117.601562 46.089844-125.488281 47.449219-4.230469.246094-7.535156 3.746094-7.535156 7.984375zm0 0" fill="#1e81ce"/><path d="m224.011719 0h16v16h-16zm0 0" fill="#1e81ce"/><path d="m224.011719 24h16v16h-16zm0 0" fill="#1e81ce"/><path d="m224.011719 48h16v16h-16zm0 0" fill="#1e81ce"/></svg>
			<p></p>
			<a href="<?php echo($wo['config']['site_url'].'/requests.php?f=download_user_info'); ?>" class="btn btn-main" id="download_file"  target="_blank" onclick="DeleteUserFile()"><?php echo  $wo['lang']['download_file']; ?></a>
		 </div>

		<div class="text-center hiddddddddd">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['generate_file']; ?></button>
		</div>

         <input type="hidden" name="user_id" value="<?php echo $wo['setting']['user_id'];?>">
         <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>

</div>
<script type="text/javascript">
	function DeleteUserFile(self) {
		file = $(self).attr('data_link');
		$('#download_steps_comp').fadeIn(500);
		$('.ready_to_down_info').fadeOut(200);
		$('.wo_settings_page .hiddddddddd').fadeIn(200);
	}
$(function() {
  $('form.setting-general-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=download_info',
    beforeSend: function() {
      $('.setting-panel-mdbtn').attr('disabled', 'true');
      $('.setting-panel-mdbtn').text("<?php echo $wo['lang']['please_wait']; ?>");
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      scrollToTop();
      $('.setting-panel-mdbtn').removeAttr('disabled');
      $('.setting-panel-mdbtn').text("<?php echo $wo['lang']['generate_file']; ?>");
      if (data.status == 200) {
      	$('#download_steps_comp').slideUp(500);
		$('.ready_to_down_info').fadeIn(200);
		$('.ready_to_down_info p').html(data.message);
		$('.wo_settings_page .hiddddddddd').fadeOut(200);
      }
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
</script>
<?php } ?>
