<?php
$IsOwner       = lui_IsOnwer($wo['user_profile']['user_id']);
$IsOwnerUser   = lui_IsOnwerUser($wo['user_profile']['user_id']);

if ($wo['loggedin'] && $IsOwnerUser) {
   $wo['pr_complition'] = lui_ProfileCompletion();
}
?>
<style>.post-youtube iframe {overflow: hidden !important; height: 360px !important;}</style>
<div class="page-margin profile wo_user_profile perfil_de_usuario_details" data-page="timeline" data-id="<?php echo $wo['user_profile']['user_id'];?>">
	<div class="profile-container">
		<div class="card hovercard" style="margin-bottom: 0px;">
			<div class="cardheader user-cover">
				<?php if($IsOwner === true) { ?>
					<form action="#" method="post" class="profile-cover-changer">
                        <div class="input-group when-notedit profile_cover">
                            <span class="input-group-btn">
                                <span class="btn btn-upload-image btn-file">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                                    <input type="file" name="cover" accept="image/*" onchange="Wo_UpdateProfileCover();">
                                </span>
                            </span>
                        </div>
                        <div class="input-group profile_cover">
                            <span class="input-group-btn when-notedit">
                                <span class="btn btn-upload-image btn-file" onclick="Wo_StartRepositioner();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crop"><path d="M6.13 1L6 16a2 2 0 0 0 2 2h15"></path><path d="M1 6.13L16 6a2 2 0 0 1 2 2v15"></path></svg>
                                </span>
                            </span>
                        </div>
                        <div class="input-group when-edit" style="display: none;">
                            <span class="input-group-btn">
                                <span class="btn btn-upload-image btn-file" onclick="Wo_SubmitRepositioner();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                            </span>
                        </div>
                        <div class="input-group when-edit" style="display: none;">
                            <span class="input-group-btn">
                                <span class="btn btn-upload-image btn-file" onclick="Wo_StopRepositioner();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </span>
                            </span>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $wo['user_profile']['user_id'];?>">
                    </form>
                    <form class="cover-position-form hidden" method="post">
                        <input class="cover-position" name="pos" value="0" type="hidden">
                        <input class="image_type" name="image_type" value="0" type="hidden">
                        <input name="cover_image" id="cover-input-image" value="<?php echo $wo['user_profile']['cover_org']?>" type="hidden">
                        <input name="real_image" id="full-input-image" value="<?php echo lui_GetMedia($wo['user_profile']['cover_full']); ?>" type="hidden">
                        <input type="hidden" name="user_id" value="<?php echo $wo['user_profile']['user_id'];?>">
                    </form>
				<?php } ?>
				<div class="user-cover-uploading-container"></div>
				<div class="user-cover-uploading-progress">
					<div class="pace-activity-parent"><div class="pace-activity"></div></div>
				</div>
				<div class="user-cover-reposition-container">
					<div class="user-cover-reposition-w">
						<img id="cover-image" src="<?php echo $wo['user_profile']['cover']?>" alt="<?php echo $wo['user_profile']['name']?>" onclick="Wo_OpenProfileCover('<?php echo $wo['user_profile']['cover_org']?>');" class="pointer"/>
					</div>
					<div class="user-reposition-container">
						<img id="full-image" src="<?php echo lui_GetMedia($wo['user_profile']['cover_full'])?>" alt="<?php echo $wo['user_profile']['name']?>"/>
						<div class="user-reposition-dragable-container" align="center">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
							<?php echo $wo['lang']['drag_to_re']; ?>
						</div>
						<div class="user-cover-uploading-container user-repositioning-icons-container1"></div>
						<div class="user-cover-uploading-progress user-repositioning-icons-container"></div>
					</div>
				</div>
			</div>

			<div class="problackback"></div>

			<div class="pic-info-cont">
                <div class="user-avatar flip <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?><?php echo($wo['story_seen_class']); ?><?php } ?>">
                    <div class="user-avatar-uploading-container">
                        <div class="user-avatar-uploading-progress">
                            <div class="ball-pulse"><div></div><div></div><div></div></div>
                        </div>
                    </div>
                    <img id="updateImage-<?php echo $wo['user_profile']['user_id']?>" class="pointer <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?><?php echo($wo['story_seen_class']); ?> see_all_stories<?php } ?>" alt="<?php echo $wo['user_profile']['name']?>" src="<?php echo $wo['user_profile']['avatar']?>" <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?> data_story_user_id="<?php echo $wo['user_profile']['user_id']?>"  data_story_type="user" <?php } else{ ?> onclick="Wo_OpenProfilePicture('<?php echo $wo['user_profile']['avatar_org']?>');" <?php } ?> />

                    <?php if($IsOwner === true) { ?>
						<form action="#" method="post" class="profile-avatar-changer wo_profile_pic_hover">
							<div class="profile_avatar">
								<span class="btn btn-upload-image btn-file">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
									<input type="file" name="avatar" accept="image/x-png, image/jpeg" onchange="Wo_UpdateProfileAvatar();">
								</span>
								<?php if ($wo['user_profile']['avatar_org'] != $wo['userDefaultAvatar'] && $wo['user_profile']['avatar_org'] != $wo['userDefaultFAvatar']) {?>
									<span class="btn btn-upload-image btn-file" onclick="OpenCropModal()">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M7,17V1H5V5H1V7H5V17A2,2 0 0,0 7,19H17V23H19V19H23V17M17,15H19V7C19,5.89 18.1,5 17,5H9V7H17V15Z" /></svg>
									</span>
								<?php } ?>
							</div>
							<input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['user_profile']['user_id'];?>">
						</form>
                    <?php } ?>
                </div>
                <div class="info">
                    <div class="title">
                        <a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username'];?>">
                        <?php echo $wo['user_profile']['name']; ?>
                        </a>

						<?php if ($wo['user_profile']['banned'] != 1) { ?>
							<?php if($wo['user_profile']['verified'] == 1) {   ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg>
							<?php } ?>

							<?php if (lui_IsUserPro($wo['user_profile']['is_pro']) === true) {
							$user_pro_type = lui_GetUserProType($wo['user_profile']['pro_type']);
							?>
							<span class="badge-pro" style="background-color:<?php echo $user_pro_type['color_name'];?>">
								<a class="badge-link" href="<?php echo lui_SeoLink('index.php?link1=go-pro');?>" title="<?php echo $user_pro_type['type_name'];?>" data-toggle="tooltip">PRO</a>
							</span>
							<?php } ?>
						<?php } else { ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" ><path fill="red" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13M10 14C5.58 14 2 15.79 2 18V20H11.5A6.5 6.5 0 0 1 11 17.5A6.5 6.5 0 0 1 11.95 14.14C11.32 14.06 10.68 14 10 14M17.5 14.5C19.16 14.5 20.5 15.84 20.5 17.5C20.5 18.06 20.35 18.58 20.08 19L16 14.92C16.42 14.65 16.94 14.5 17.5 14.5M14.92 16L19 20.08C18.58 20.35 18.06 20.5 17.5 20.5C15.84 20.5 14.5 19.16 14.5 17.5C14.5 16.94 14.65 16.42 14.92 16Z"></path></svg>
						<?php } ?>
                    </div>
                    <?php if ($wo['user_profile']['banned'] != 1) { ?>
                    <div class="options-buttons">
						<span class="profile-message-btn btn-glossy">
                        <?php echo lui_GetMessageButton($wo['user_profile']['user_id']);?>
                        </span>
						<?php if($IsOwnerUser === true) { ?>
							<span class="btn-glossy">
								<a class="btn btn-default" href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=general-setting') ?>" data-ajax="?link1=setting&user=<?php echo $wo['user_profile']['username'] . '&page=general-setting'; ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg>
									<?php echo $wo['lang']['edit'];?>
								</a>
							</span>
						<?php } else { ?>
						<?php if($wo['loggedin'] == true && $IsOwner) { ?>
						<div class="dropdown btn-glossy">
							<button class="btn btn-default wo_user_folw_empty_btns dropdown-toggle" type="button" id="user-dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
							</button>
							<ul class="dropdown-menu dropdown-menu-right detail" aria-labelledby="user-dropdownMenu">
								<?php if($wo['loggedin'] == true && $IsOwner) { ?>
									<li id="open_add_to_family_modal">
										<a class="menu-item" href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=general-setting') ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" /></svg>
											&nbsp;&nbsp;&nbsp;
											<div>
												<b><?php echo $wo['lang']['edit'];?></b>
												<p><?php echo $wo['lang']['edit_tx'];?></p>
											</div>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<?php } ?>
                    </div>
                    <?php } ?>
                </div>
			</div>
		</div>
	</div>
    <?php if ($wo['user_profile']['banned'] != 1) { ?>
		

	<div class="contenedor_information_users_layshane">
		<?php if($wo['config']['user_lastseen'] == 1 && $wo['user_profile']['showlastseen'] != 0 && $wo['loggedin'] == true) {  ?>
            <div class="status_user_layshane">
            	<div class="online-contenido_perfil">
                	<?php echo lui_UserStatus($wo['user_profile']['user_id'], $wo['user_profile']['lastseen'], 'profile') ?>
                </div>
            </div>
        <?php } ?>
		<br>
        <?php if($wo['loggedin'] == true && $wo['config']['gift_system'] != 0) {  ?>
            <?php if ($IsOwnerUser == false) { ?>
            <span class="btn btn-md main send_gift_btn" onclick="Wo_open_send_gift();">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504.124 504.124" style="enable-background:new 0 0 504.124 504.124;" xml:space="preserve"> <path style="fill:#DB5449;" d="M15.754,133.909l236.308,118.154L488.37,133.909v252.062L252.062,504.123L15.754,385.969V133.909z"/> <path style="fill:#C54B42;" d="M15.754,157.538v73.649l235.52,115.397l237.095-115.791v-73.255L252.062,273.33L15.754,157.538z"/> <path style="fill:#D05045;" d="M252.062,504.123V252.063L31.508,141.786H15.754v244.185L252.062,504.123z"/> <path style="fill:#BB483E;" d="M15.754,157.538v73.649l235.52,115.397l0.788-0.394v-73.255v0.394L15.754,157.538z"/> <path style="fill:#EB6258;" d="M0,125.638L252.062,0.001l252.062,125.637v16.542L252.062,267.815L0,142.573V125.638z"/> <path style="fill:#EFEFEF;" d="M396.603,39.779c-8.271-14.966-25.994-24.025-46.868-24.025c-47.655,0-81.132,44.505-97.674,72.862 c-16.542-28.357-50.412-72.468-97.674-72.468c-30.326,0-51.988,18.511-51.988,43.717c0,44.898,49.231,74.043,148.086,74.043 s151.237-37.415,151.237-73.649C401.723,53.17,400.148,46.081,396.603,39.779z M164.628,88.223 c-11.028-7.483-14.966-15.754-14.966-21.268c0-6.695,6.302-11.815,15.36-11.815c21.268,0,38.203,27.963,47.655,47.262 C187.865,100.432,173.292,93.736,164.628,88.223z M339.495,88.223c-8.665,5.514-23.237,12.209-48.049,14.178 c9.058-19.298,25.994-47.262,47.655-47.262c9.058,0,15.36,5.12,15.36,11.815C354.462,72.469,350.523,80.739,339.495,88.223z"/> <path style="fill:#E2574C;" d="M0,126.032l252.062,123.274l252.062-123.274v81.526l-252.85,123.274L0,207.558V126.032z"/> <path style="fill:#EFEFEF;" d="M346.585,213.859v-9.058l-94.523-51.2l-94.523,51.2v9.058L94.524,186.29v-12.603l154.387-81.526 l3.151,1.575l3.151-1.575L409.6,173.293v12.603L346.585,213.859z"/> <path style="fill:#DCDCDC;" d="M346.585,204.801v251.668l63.015-31.508V173.293L346.585,204.801z"/> <path style="fill:#D1D1D1;" d="M94.523,425.354l63.015,31.508V205.195l-63.015-31.902C94.523,173.292,94.523,425.354,94.523,425.354 z"/> </svg> <?php echo $wo['lang']['send_a_gift']; ?>
            </span>
            <?php } ?>
        <?php } ?>

        <ul class="page-margin wow_content negg_padd list-unstyled event-options-list right_user_info wo_prof_side_info_padd mt-0">
            <div class="wo_page_hdng">
				<div class="wo_page_hdng_innr">
					<?php echo $wo['lang']['info']; ?>
				</div>
			</div>

           

            <li class="list-group-item" style="padding-top:0; padding-bottom:0;">
                <hr>
            </li>
            <li class="list-group-item">
                <?php
                $gender = ucfirst(strtolower($wo['user_profile']['gender']));
                if (in_array($wo['user_profile']['gender'], array_keys($wo['genders']))) {
                	echo $wo['genders'][$wo['user_profile']['gender']];
                }
                else{
                	echo $wo['genders'][array_keys($wo['genders'])[0]];
                }
                //echo ($gender == 'Male') ? $wo['lang']['male'] : $wo['lang']['female'];
                ?>
            </li>
            <?php if ($wo['user_profile']['birthday'] != '0000-00-00' && $wo['user_profile']['birthday'] != '00-00-0000' && lui_CanSeeBirthday($wo['user_profile']['user_id'], $wo['user_profile']['birth_privacy']) === true) {  ?>
            <li class="list-group-item">
                <?php echo date($wo['config']['date_style'],strtotime($wo['user_profile']['birthday']));?>
            </li>
            <?php  }  ?>
             <li class="list-group-item" style="padding-top:0; padding-bottom:0;">
                <hr>
            </li>
            <?php
            $country = $wo['user_profile']['country_id'];
            if ($country > 0) {
            ?>
            <li class="list-group-item">
                <?php echo $wo['lang']['living_in'];?>
                <?php echo $wo['countries_name'][$country];?>
            </li>
            <li class="list-group-item" style="padding-top:0; padding-bottom:0;">
                <hr>
            </li>
            <?php } ?>
            <?php if(!empty($wo['user_profile']['address']) && $wo['user_profile']['share_my_location'] == 1) {  ?>
            <li class="list-group-item">
                <span><?php echo $wo['lang']['located_in'];?> <?php echo $wo['user_profile']['address'];?></span>
                <?php if (!empty($wo['config']['google_map_api']) && $wo['config']['google_map']) { ?>
                <iframe width="100%" class="user-location-frame" frameborder="0" style="border:0;margin-top: 10px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=<?php echo $wo['user_profile']['address'];?>&language=en"></iframe>
                <?php } ?>
                <?php if ($wo['config']['yandex_map'] == 1) { ?>
		            <div id="place_<?php echo($wo['user_profile']['user_id']) ?>" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 100%; height: 300px; padding: 0; margin: 10px 0 0;"' : '') ?>></div>
		            <script type="text/javascript">
		                  <?php if (!empty($wo['user_profile']['address'])) { ?>
		                    setTimeout(function () {
		                      var myMap;
		                      ymaps.geocode("<?php echo($wo['user_profile']['address']); ?>").then(function (res) {
		                          myMap = new ymaps.Map('place_<?php echo($wo['user_profile']['user_id']) ?>', {
		                              center: res.geoObjects.get(0).geometry.getCoordinates(),
		                              zoom : 10
		                          });
		                          myMap.geoObjects.add(new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
		                              balloonContent: ''
		                          }));
		                      });
		                    },1000);
		                  <?php } ?>
		                </script>
		          <?php } ?>
            </li>
            <?php } ?>

			<?php if(!empty($wo['user_profile']['facebook']) || !empty($wo['user_profile']['twitter']) || !empty($wo['user_profile']['linkedin']) || !empty($wo['user_profile']['vk']) || !empty($wo['user_profile']['youtube'])) { ?>
				<li class="list-group-item text-muted" contenteditable="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
					<?php echo $wo['lang']['social_links']; ?>
				</li>
				<li class="list-group-item user-social-links">
                    <?php  if(!empty($wo['user_profile']['youtube'])) {  ?>
                    <a class="social-btn" href="https://www.youtube.com/<?php echo $wo['user_profile']['youtube']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-youtube" fill="#ff0000"><path d="M10,16.5V7.5L16,12M20,4.4C19.4,4.2 15.7,4 12,4C8.3,4 4.6,4.19 4,4.38C2.44,4.9 2,8.4 2,12C2,15.59 2.44,19.1 4,19.61C4.6,19.81 8.3,20 12,20C15.7,20 19.4,19.81 20,19.61C21.56,19.1 22,15.59 22,12C22,8.4 21.56,4.91 20,4.4Z" /></svg>
                    </a>
                    <?php } if(!empty($wo['user_profile']['twitter'])) {  ?>
                    <a class="social-btn" href="https://twitter.com/<?php echo $wo['user_profile']['twitter']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-twitter" fill="#1da1f2"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z"></path></svg>
                    </a>
                    <?php } if(!empty($wo['user_profile']['facebook'])) {  ?>
                    <a class="social-btn" rel="publisher" href="https://www.facebook.com/<?php echo $wo['user_profile']['facebook']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-facebook" fill="#4267b2"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z"></path></svg>
                    </a>
                    <?php }  if(!empty($wo['user_profile']['linkedin'])) {  ?>
                    <a class="social-btn" rel="publisher" href="https://www.linkedin.com/profile/view?id=<?php echo $wo['user_profile']['linkedin']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-linkedin" fill="#0076b6"><path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z"></path></svg>
                    </a>
                    <?php } ?>
                    <?php  if(!empty($wo['user_profile']['vk'])) {  ?>
                    <a class="social-btn" rel="publisher" href="https://vk.com/<?php echo $wo['user_profile']['vk'];?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-vk" fill="#4a76a8"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.24,14.03C16.06,12.94 16.22,13.11 17.64,11.22C18.5,10.07 18.85,9.37 18.74,9.07C18.63,8.79 18,8.86 18,8.86L15.89,8.88C15.89,8.88 15.73,8.85 15.62,8.92C15.5,9 15.43,9.15 15.43,9.15C15.43,9.15 15.09,10.04 14.65,10.8C13.71,12.39 13.33,12.47 13.18,12.38C12.83,12.15 12.91,11.45 12.91,10.95C12.91,9.41 13.15,8.76 12.46,8.6C12.23,8.54 12.06,8.5 11.47,8.5C10.72,8.5 10.08,8.5 9.72,8.68C9.5,8.8 9.29,9.06 9.41,9.07C9.55,9.09 9.86,9.16 10.03,9.39C10.25,9.68 10.24,10.34 10.24,10.34C10.24,10.34 10.36,12.16 9.95,12.39C9.66,12.54 9.27,12.22 8.44,10.78C8,10.04 7.68,9.22 7.68,9.22L7.5,9L7.19,8.85H5.18C5.18,8.85 4.88,8.85 4.77,9C4.67,9.1 4.76,9.32 4.76,9.32C4.76,9.32 6.33,12.96 8.11,14.8C9.74,16.5 11.59,16.31 11.59,16.31H12.43C12.43,16.31 12.68,16.36 12.81,16.23C12.93,16.1 12.93,15.94 12.93,15.94C12.93,15.94 12.91,14.81 13.43,14.65C13.95,14.5 14.61,15.73 15.31,16.22C15.84,16.58 16.24,16.5 16.24,16.5L18.12,16.47C18.12,16.47 19.1,16.41 18.63,15.64C18.6,15.58 18.36,15.07 17.24,14.03Z" /></svg>
                    </a>
                    <?php } ?>
                    <?php  if(!empty($wo['user_profile']['instagram'])) {  ?>
                    <a class="social-btn" rel="publisher" href="https://instagram.com/<?php echo $wo['user_profile']['instagram'];?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-instagram" fill="#3f729b"><path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" /></svg>
                    </a>
                    <?php } ?>
				</li>
			<?php } ?>
        </ul>

        <?php if(!empty($wo['user_profile']['about'])) {  ?>
			<div class="page-margin wow_content">
				<div class="wo_page_hdng pag_neg_padd">
					<div class="wo_page_hdng_innr">
						<?php echo $wo['lang']['about_me']; ?>
					</div>
				</div>
				<p class="page-margin"><?php echo $wo['user_profile']['about']; ?></p>
			</div>
        <?php } ?>

        <?php
            $sidebar_ad = lui_GetAd('sidebar', false);
            if (!empty($sidebar_ad)) {?>
        <ul class="list-group sidebar-ad">
            <?php echo $sidebar_ad; ?>
        </ul>
        <?php } ?>
    </div>
    <?php }else{ ?>
    	<div class="col-sm-12">
			<div class="list-group wo_profile_banned_user">
				<img src="<?php echo $wo['config']['theme_url'];?>/img/banned.png">&nbsp;&nbsp;&nbsp;
				<div>
					<p><?php echo $wo['lang']['user_profile_banned']; ?></p>
					<a href="<?php echo $wo['config']['site_url']; ?>" class="btn btn-main btn-mat"><?php echo $wo['lang']['home']; ?></a>
				</div>
			</div>
		</div>
    <?php } ?>
</div>
<?php echo lui_LoadPage('modals/unfriend');?>
<?php echo lui_LoadPage('modals/profile-picture');?>
<?php echo lui_LoadPage('modals/cover-image');?>
<?php if (!empty($wo['user_profile']['background_image']) && $wo['user_profile']['background_image_status'] == 1) { ?>
<style>
  body {
    background: url(<?php echo lui_GetMedia($wo['user_profile']['background_image']); ?>) fixed !important;
    background-size:100% auto;
  }
</style>
<?php } ?>
<!-- JS Timline functions -->
<?php if ($wo['loggedin']): ?>
<div class="modal fade" id="send_gift" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                    <?php echo $wo['lang']['send_a_gift']; ?>
				</h4>
			</div>
			<div class="modal-body">
                <div id="gifts-list" class="wo_send_gift">
                    <?php foreach (lui_GetAllGifts(500000) as $wo['giftlist']) {?>
                        <div class="text-center gift-data" data-gift-id="<?php echo $wo['giftlist']['id'];?>">
                            <label>
                                <input type="radio" onClick="$('#send-gift-button').attr('data-gift-id',$(this).val());$('#send-gift-button').attr('data-gift-img','<?php echo $wo['giftlist']['media_file'];?>');$('#send-gift-button').attr('disabled',false);" name="gift" value="<?php echo $wo['giftlist']['id'];?>" />
                                <img src="<?php echo lui_GetMedia($wo['giftlist']['media_file']); ?>" alt="<?php echo $wo['giftlist']['name'];?> gift">
                            </label>
                        </div>
                    <?php } ?>
                </div>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn  btn-main" id="send-gift-button" data-gift-id="" data-gift-img="" onclick="Wo_SendGiftToUser(<?php echo $wo['user']['id']; ?>,<?php echo $wo['user_profile']['id']; ?>,this)" disabled><?php echo $wo['lang']['send']; ?></button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="modal fade" id="report_profile" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
					<?php echo $wo['lang']['report_user']; ?>
				</h4>
			</div>
			<div class="modal-body">
				<textarea name="user-resd" class="form-control" placeholder="Type text" dir="auto" rows="4" id="report-user-text-<?php echo $wo['user_profile']['id']; ?>"></textarea>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn  btn-main" id="report-user-button" onclick="Wo_ReportProfile(<?php echo $wo['user_profile']['id']; ?>,true)"><?php echo $wo['lang']['send']; ?></button>
			</div>
		</div>
	</div>
</div>
<?php if ($wo['loggedin']): ?>
	<div class="modal fade" id="add_to_family" role="dialog">
		<div class="modal-dialog wow_mat_mdl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
					<h4 class="modal-title"><?php echo $wo['lang']['family_member']; ?></h4>
				</div>
				<div class="add_to_family_alert"></div>
				<div class="modal-body">
					<div class="family_mbr_detail">
						<div class="family_mbr_avatar">
							<img src="<?php echo $wo['user_profile']['avatar']; ?>" alt="<?php echo $wo['user_profile']['name']; ?>" class="responsive-img">
						</div>&nbsp;&nbsp;
						<h4 class="family_mbr_name"><?php echo $wo['user_profile']['name']; ?></h4>
					</div>
					<div class="add_as_cont">
						<input type="hidden" id="family_list">
						<div class="add_as_cont_list">
							<?php foreach ($wo['family'] as $key => $value): ?>
								<label>
									<input type="radio" name="family_list" id="<?php echo $key; ?>" value="<?php echo $key; ?>" onclick="SelectFamilyList('<?php echo $key; ?>')">
									<div class="btn-default"><?php echo $wo['lang'][$value]; ?></div>
								</label>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="button" class="btn btn-main btn-mat" id="add_to_family_button" onclick="Wo_AddFamilyMember();"><?php echo $wo['lang']['add']; ?></button>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="modal fade" id="delete_family_mbr_modal"  role="dialog" data-slide='true'>
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['important']; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_remove_family_member']; ?></p>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button id="delete_family_member_button"  type="button" class="btn btn-main" onclick="Wo_DeleteFamilyMember($('#delete_family_mbr_modal').attr('data-family-member-id'));"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade in" id="poke_modal" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<p style="text-align: center;padding: 30px 20px;font-family: Hind,Arial;font-size: 16px;">
				<i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
				<?php echo $wo['lang']['you_have_poked'] . " " . ucfirst($wo['user_profile']['username']); ?>
			</p>
		</div>
	</div>
</div>
<div class="modal fade in" id="accept_family_mbr_modal" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<p style="text-align: center;padding: 30px 20px;font-family: Hind,Arial;font-size: 16px;">
				<i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
				<?php echo $wo['lang']['family_member_added']; ?>
			</p>
		</div>
	</div>
</div>
<div class="modal fade" id="cropImage" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['crop_your_avatar'] ?></h4>
			</div>
			<div class="modal-body">
				<div id="image-to-crop" class="wo_crop_img_pic">
					<img src="<?php echo lui_GetMedia($wo['user_profile']['avatar_full'])?>" alt="foto" data-image="<?php echo $wo['user_profile']['avatar_full']; ?>" >
				</div>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn btn-main btn-mat" onclick="CropImage();"><?php echo $wo['lang']['save']; ?></button>
			</div>
		</div>
	</div>
</div>
<?php if ( $wo['loggedin'] ): ?>
    <?php if ( isset( $_GET['mode'] ) && $_GET['mode'] == 'opengift' ): ?>
        <div class="modal fade" id="gift_show_model" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
                        <h4 class="modal-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                        <?php echo $wo['user_profile']['name'] . " " . $wo['lang']['send_gift_to_you'] ?></h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo lui_GetMedia($_GET['gift_img']);?>" style="max-width: 100%;margin: 0 auto;display: block;">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
    	<div class="modal fade" id="finding_a_job_modal" role="dialog" data-keyboard="false">
			<div class="modal-dialog wow_mat_mdl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
						<h4 class="modal-title"><?php echo $wo['lang']['add_job_preferences'] ?></h4>
					</div>
					<form class="form form-horizontal finding_a_job_form" method="post" action="#">
						<div class="modal-body">
							<h4><?php echo $wo['lang']['tell_us_kind_work'] ?></h4>
							<div class="modal_finding_a_job_modal_alert"></div>
							<div class="clear"></div>
							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['job_title']; ?></label>
								<input name="job_title" type="text" autocomplete="off">
							</div>
							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['job_location']; ?></label>
								<input name="job_location" type="text" autocomplete="off">
							</div>

							<div class="wow_form_fields mb-0">
								<label><?php echo $wo['lang']['workplaces']; ?></label>
							</div>
							<span class="round-check">
								<input type="checkbox" id="on_site" name="workplaces[]" value="on_site">
								<label for="on_site"><?php echo $wo['lang']['on_site']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="hybrid" name="workplaces[]" value="hybrid">
								<label for="hybrid"><?php echo $wo['lang']['hybrid']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="remote" name="workplaces[]" value="remote">
								<label for="remote"><?php echo $wo['lang']['remote']; ?></label>
							</span>

							<div class="wow_form_fields mb-0">
								<label><?php echo $wo['lang']['job_types']; ?></label>
							</div>
							<span class="round-check">
								<input type="checkbox" id="full_time" name="job_type[]" value="full_time">
								<label for="full_time"><?php echo $wo['lang']['full_time']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="contract" name="job_type[]" value="contract">
								<label for="contract"><?php echo $wo['lang']['contract']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="part_time" name="job_type[]" value="part_time">
								<label for="part_time"><?php echo $wo['lang']['part_time']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="internship" name="job_type[]" value="internship">
								<label for="internship"><?php echo $wo['lang']['internship']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="temporary" name="job_type[]" value="temporary">
								<label for="temporary"><?php echo $wo['lang']['temporary']; ?></label>
							</span>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div class="modal-footer">
							<div class="ball-pulse"><div></div><div></div><div></div></div>
							<button type="submit" class="btn btn-main btn-mat"><?php echo $wo['lang']['add']; ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="providing_services_modal" role="dialog" data-keyboard="false">
			<div class="modal-dialog wow_mat_mdl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
						<h4 class="modal-title"><?php echo $wo['lang']['set_up_services_page'] ?></h4>
					</div>
					<form class="form form-horizontal providing_services_form" method="post" action="#">
						<div class="modal-body">
							<div class="providing_services_modal_alert"></div>
							<div class="clear"></div>

							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['services']; ?></label>
								<input name="services" type="text" autocomplete="off" id="providing_services_input">
							</div>

							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['location']; ?></label>
								<input name="job_location" type="text" autocomplete="on">
							</div>

							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['description']; ?></label>
								<textarea name="description" cols="20" rows="3"></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div class="modal-footer">
							<div class="ball-pulse"><div></div><div></div><div></div></div>
							<button type="button" onclick="SubmitAjaxForm('.providing_services_form')" class="btn btn-main btn-mat"><?php echo $wo['lang']['add']; ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
    <?php } ?>
	<?php if ($wo['config']['website_mode'] == 'linkedin' && $wo['user_profile']['is_open_to_work'] != 0) { ?>

		<div class="modal fade" id="edit_finding_a_job_modal" role="dialog" data-keyboard="false">
			<div class="modal-dialog wow_mat_mdl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
						<h4 class="modal-title"><?php echo $wo['lang']['edit_job_preferences'] ?></h4>
					</div>
					<form class="form form-horizontal edit_finding_a_job_form" method="post" action="#">
						<div class="modal-body">
							<div class="modal_edit_finding_a_job_modal_alert"></div>
							<div class="clear"></div>
							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['job_title']; ?></label>
								<input name="job_title" type="text" autocomplete="off" value="<?php echo $wo['user_profile']['open_to_work_data']->job_title; ?>">
							</div>
							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['job_location']; ?></label>
								<input name="job_location" type="text" autocomplete="off" value="<?php echo $wo['user_profile']['open_to_work_data']->job_location; ?>">
							</div>

							<div class="wow_form_fields mb-0">
								<label><?php echo $wo['lang']['workplaces']; ?></label>
							</div>
							<span class="round-check">
								<input type="checkbox" id="on_site-edit" name="workplaces[]" value="on_site" <?php echo(strpos($wo['user_profile']['open_to_work_data']->workplaces, 'on_site') !== false ? 'checked' : '') ?>>
								<label for="on_site-edit"><?php echo $wo['lang']['on_site']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="hybrid-edit" name="workplaces[]" value="hybrid" <?php echo(strpos($wo['user_profile']['open_to_work_data']->workplaces, 'hybrid') !== false ? 'checked' : '') ?>>
								<label for="hybrid-edit"><?php echo $wo['lang']['hybrid']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="remote-edit" name="workplaces[]" value="remote" <?php echo(strpos($wo['user_profile']['open_to_work_data']->workplaces, 'remote') !== false ? 'checked' : '') ?>>
								<label for="remote-edit"><?php echo $wo['lang']['remote']; ?></label>
							</span>

							<div class="wow_form_fields mb-0">
								<label><?php echo $wo['lang']['job_types']; ?></label>
							</div>
							<span class="round-check">
								<input type="checkbox" id="full_time-edit" name="job_type[]" value="full_time" <?php echo(strpos($wo['user_profile']['open_to_work_data']->job_type, 'full_time') !== false ? 'checked' : '') ?>>
								<label for="full_time-edit"><?php echo $wo['lang']['full_time']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="contract-edit" name="job_type[]" value="contract" <?php echo(strpos($wo['user_profile']['open_to_work_data']->job_type, 'contract') !== false ? 'checked' : '') ?>>
								<label for="contract-edit"><?php echo $wo['lang']['contract']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="part_time-edit" name="job_type[]" value="part_time" <?php echo(strpos($wo['user_profile']['open_to_work_data']->job_type, 'part_time') !== false ? 'checked' : '') ?>>
								<label for="part_time-edit"><?php echo $wo['lang']['part_time']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="internship-edit" name="job_type[]" value="internship" <?php echo(strpos($wo['user_profile']['open_to_work_data']->job_type, 'internship') !== false ? 'checked' : '') ?>>
								<label for="internship-edit"><?php echo $wo['lang']['internship']; ?></label>
							</span>&nbsp;&nbsp;
							<span class="round-check">
								<input type="checkbox" id="temporary-edit" name="job_type[]" value="temporary" <?php echo(strpos($wo['user_profile']['open_to_work_data']->job_type, 'temporary') !== false ? 'checked' : '') ?>>
								<label for="temporary-edit"><?php echo $wo['lang']['temporary']; ?></label>
							</span>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div class="modal-footer">
							<div class="ball-pulse"><div></div><div></div><div></div></div>
							<input type="hidden" name="id" value="<?php echo $wo['user_profile']['open_to_work_data']->id; ?>">
							<button type="submit" class="btn btn-main btn-mat"><?php echo $wo['lang']['edit']; ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="delete_open_to_work" role="dialog" data-keyboard="false">
			<div class="modal-dialog modal-md wow_mat_mdl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
						<h4 class="modal-title"><?php echo $wo['lang']['delete'] ?> <?php echo $wo['lang']['open_to_work'] ?></h4>
					</div>
					<div class="modal-body">
						<div class="delete_finding_a_job_modal_alert"></div>
						<p><?php echo $wo['lang']['are_you_delete_open_work'] ?></p>
					</div>
					<div class="modal-footer">
						<div class="ball-pulse"><div></div><div></div><div></div></div>
						<button type="button" class="btn btn-main btn-mat" onclick="DeleteOpenToWork();"><?php echo $wo['lang']['delete']; ?></button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ($wo['config']['website_mode'] == 'linkedin' && $wo['user_profile']['is_providing_service'] != 0) { ?>

		<div class="modal fade" id="edit_providing_services_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
			<div class="modal-dialog wow_mat_mdl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
						<h4 class="modal-title"><?php echo $wo['lang']['set_up_services_page'] ?></h4>
					</div>
					<form class="form form-horizontal edit_providing_services_form" method="post" action="#">
						<div class="modal-body">
							<div class="edit_providing_services_modal_alert"></div>
							<div class="clear"></div>

							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['services']; ?></label>
								<input name="services" type="text" autocomplete="off" value="<?php echo $wo['user_profile']['providing_service']->services; ?>" id="edit_providing_services_input">
							</div>

							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['location']; ?></label>
								<input name="job_location" type="text" autocomplete="off" value="<?php echo $wo['user_profile']['providing_service']->job_location; ?>">
							</div>

							<div class="wow_form_fields">
								<label><?php echo $wo['lang']['description']; ?></label>
								<textarea name="description" cols="20" rows="3"><?php echo $wo['user_profile']['providing_service']->description; ?></textarea>
							</div>

							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div class="modal-footer">
							<div class="ball-pulse"><div></div><div></div><div></div></div>
							<input type="hidden" name="id" value="<?php echo $wo['user_profile']['providing_service']->id; ?>">
							<button type="button" onclick="SubmitAjaxForm('.edit_providing_services_form')" class="btn btn-main btn-mat"><?php echo $wo['lang']['edit']; ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="delete_providing_service" role="dialog" data-keyboard="false">
			<div class="modal-dialog modal-md wow_mat_mdl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
						<h4 class="modal-title"><?php echo $wo['lang']['delete'] ?> <?php echo $wo['lang']['providing_services'] ?></h4>
					</div>
					<div class="modal-body">
						<div class="delete_finding_a_job_modal_alert"></div>
						<p><?php echo $wo['lang']['are_you_delete_services'] ?></p>
					</div>
					<div class="modal-footer">
						<div class="ball-pulse"><div></div><div></div><div></div></div>
						<button type="button" class="btn btn-main btn-mat" onclick="DeleteProvidingService();"><?php echo $wo['lang']['delete']; ?></button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php endif; ?>
<style>
	.post-youtube iframe {
		height: 362px !important;
	}
</style>
<?php
	if ($wo['loggedin'] == true) {
		echo lui_LoadPage('modals/report-user');
	}
?>
<script>
function Wo_OpenReportBox() {
	$('#report-user-modal').modal({
  	  show: true
    });
}
function Wo_UnreportReportUser() {
	$.post(Wo_Ajax_Requests_File() + '?f=reports&s=unreport_user', {
	    user: <?php echo $wo['user_profile']['user_id'];?>
	}, function (data) {
	    if(data.status == 200) {
	    	$("#error_post").modal('show');
    		$('#error_post_text').text(data.message);
	        setTimeout(function () {
	            $("#error_post").modal('hide');
	            location.reload();
	        },3000);
	    }
	});
}
$(function(){
    var url = window.location.pathname,
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('.user-bottom-nav a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('menuactive');
            }
        });
    <?php if ($wo['nodejs_send_notification'] == true) { ?>
    	if (node_socket_flow == "1") {
    		socket.emit("user_notification", { to_id: $('.wo_user_profile').attr('data-id'), user_id: _getCookie("user_id")});
    	}
    <?php } ?>
});

function Wo_open_send_gift(){
    $('#send_gift').modal('show');
}

function Wo_SendGiftToUser(from, to){
    var gift_id = $('#send-gift-button').attr('data-gift-id');
    var gift_img = $('#send-gift-button').attr('data-gift-img');

    if (!from || !to || !gift_id) {
        return false;
    }

    $('#send-gift-button').attr('disabled','');
	$('#send_gift').find('.ball-pulse').fadeIn(100);

    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'send_gift',from:from,to:to,gift_id:gift_id,gift_img:gift_img},
    })
    .done(function(data) {
        if (data.status == 200) {
        	if (node_socket_flow == "1") {
        		socket.emit("user_notification", { to_id: to, user_id: _getCookie("user_id")});
        	}
            $('#send-gift-button').html('<?php echo $wo['lang']['gift_sent_succesfully']; ?>');
			$('#send_gift').find('.ball-pulse').fadeOut(100);
            Wo_Delay(function(){
                $("#send_gift").modal('hide');
                $('#send-gift-button').attr('data-gift-id', '').attr('data-gift-img', '').attr('disabled',false).html('<?php echo $wo['lang']['send']; ?>');
            },1500);
        }
    })
    .fail(function() {
        console.log("error");
    })

}

function Wo_RegisterPoke(received_user_id , send_user_id){
    if (!received_user_id || !send_user_id) {
        return false;
    }
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'poke',received_user_id:received_user_id,send_user_id:send_user_id},
    })
    .done(function(data) {
        if (data.status == 200) {
        	if (node_socket_flow == "1") {
        		socket.emit("user_notification", { to_id: received_user_id, user_id: _getCookie("user_id")});
        	}
            $("#poke_modal").modal('show');
            $("#pokebutton").remove();
            Wo_Delay(function(){
                $("#poke_modal").modal('hide');
            },1500);
        }
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_ActivateFamilyMember(id = false,self = false,member = false){
    if (!id || !self || !member) {
        return false;
    }
    Wo_progressIconLoader($(self).find('i'));
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'accept_member',id:id,type:member},
    })
    .done(function(data) {
        if (data.status == 200) {
            $("#accept_family_mbr_modal").modal('show');
            $('[data-family-member="'+id+'"]').slideUp(function(){
                    $(this).remove();
            })
            Wo_Delay(function(){
                $("#accept_family_mbr_modal").modal('hide');
            },1500);
        }
    })
    .fail(function() {
        console.log("error");
    })
    Wo_progressIconLoader($(self).find('i'));
}

function Wo_AcceptRelationRequest(id = false,member = false,type = false ,self = false){
    if (!member || !self || !type || !id) {
        return false;
    }
    Wo_progressIconLoader($(self));
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'accept_relation',id:id,type:type,member:member},
    })
    .done(function(data) {
        if (data.status == 200) {
            window.location = data.url;
        }
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_DeleteRelationRequest(id = false,user = false,type = false,self = false){
    if (!self || !id || !user || !type) {
        return false;
    }
    Wo_progressIconLoader($(self).find('i'));
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'delete_relation',id:id,user:user,type:type},
    })
    .done(function(data) {
        if (data.status == 200) {
            $("[data-relationship-request='"+id+"']").slideUp(function(){
                $(this).remove();
            })
        }
    })
    .fail(function() {
        console.log("error");
    })
    Wo_progressIconLoader($(self).find('i'));
}

function OpenCropModal() {
	$('#cropImage').modal('show');
	setTimeout(function () {
    	$('#image-to-crop img').rcrop({
            minSize : [130,130],
            preserveAspectRatio : true,
            grid : true,
        });
    }, 250);
}
function CropImage() {
    values = $('#image-to-crop img').rcrop('getValues');
    $path = $('#image-to-crop img').attr('data-image');
    if (!$path) {
    	return false;
    	$('#cropImage').modal('hide');
    }
    $('#cropImage').find('.ball-pulse').fadeIn(100);
    $.post(Wo_Ajax_Requests_File() + '?f=crop-avatar', {user_id:<?php echo $wo['user_profile']['id']; ?>, path: $path, x: values.x, y:values.y, height: values.height, width:values.width}, function(data, textStatus, xhr) {
        if (data.status == 200) {
        	location.reload(false);
        } else {
        	$('#cropImage').modal('hide');
        }
        $('#cropImage').find('.ball-pulse').fadeOut(100);
    });
}
function Wo_DeleteFamilyMember(id = false){
    if (!id) {
        return false;
    }
    $('#delete_family_mbr_modal').find('.modal-footer .ball-pulse').fadeIn(100);
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'delete_member',id:id},
    })
    .done(function(data) {
        if (data.status == 200) {
            $('[data-family-member="'+id+'"]').slideUp('slow',function(){
                    $(this).remove();
            })
            Wo_Delay(function(){
                $("#delete_family_mbr_modal").modal('hide');
            },1500);
        }
        $('#delete_family_mbr_modal').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}
function SelectFamilyList(id) {
	$("#family_list").val(id);
}
function Wo_AddFamilyMember(){
    var member_type = $("#family_list").val();
    if (!member_type || member_type < 1 || member_type > 43) {
        return false;
    }
    $('#add_to_family').find('.modal-footer .ball-pulse').fadeIn(100);
    $('#add_to_family').find('.btn-main').attr('disabled', 'true');
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {
            f: 'family',
            s:'add_member',
            member_id:'<?php echo $wo['user_profile']['user_id']; ?>',
            type:member_type
        },
    })
    .done(function(data) {
        if (data.status == 200) {
            $('.add_to_family_alert').html('<div class="alert alert-success">' + data.message + '</div>');
            Wo_Delay(function(){
                $("#open_add_to_family_modal").slideUp(function(){
                    $(this).remove();
                    $("#add_to_family").modal('hide');
                })
                $('#add_to_family').find('btn-main').removeAttr('disabled');
                location.reload()
            },1500);

        }
        else{
            $('.add_to_family_alert').html('<div class="alert alert-success">' + data.message + '</div>');
            $('#add_to_family').find('.btn-main').removeAttr('disabled');
        }
        $('#add_to_family').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_ReportProfile(id = false,report = true){
    var report_text = $("#report-user-text-<?php echo $wo['user_profile']['id']; ?>").val();
    if (!id) {return false;}
    else if(report == true){
      if (!report_text) {return false;}
    }
    $('#report_profile').find('.modal-footer .ball-pulse').fadeIn(100);
    $.ajax({
        url: Wo_Ajax_Requests_File() + '?f=reports&s=report_user',
        type: 'POST',
        dataType: 'json',
        data: {text:report_text,user:id},
    })
    .done(function(data) {
        if(data.status == 200 && data.code == 0){
            $('#report_status').replaceWith('\
                <li id="report_status" onclick="$(\'#report_profile\').modal(\'show\');">\
                    <a class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" /></svg>\
                    <?php echo $wo['lang']['report_user']; ?></a>\
                </li>');
        }

        else if (data.status == 200 && data.code == 1) {
            $("#report-user-text-<?php echo $wo['user_profile']['id']; ?>").val('');
            $("#report_profile").modal('hide');
            $('#report_status').replaceWith('\
                <li id="report_status" onclick="Wo_ReportProfile(<?php echo $wo['user_profile']['id']; ?>,false);">\
                    <a class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" /></svg>\
                    <?php echo $wo['lang']['unreport']; ?></a>\
                </li>');
        }
        $('#report_profile').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}

function loadposts(user_id) {
  $.get(Wo_Ajax_Requests_File() + '?f=load_profile_posts', {user_id:user_id}, function(data) {
    $('.posts_load').html(data);
  });
}

var user_id = $('.profile').attr('data-id');
$(function () {
  user_id = $('.profile').attr('data-id');
  <?php
  if (!empty($_GET['story'])) {
    ?>
    Wo_LoadStory('prof', $('[data-page=timeline]').attr('data-id'));
    <?php
  }
  ?>
  if($(window).width() > 600) {
    $(".user-avatar").hover(function () {
      $('.profile-avatar-changer').fadeIn(100);
    }, function () {
      $('.profile-avatar-changer').fadeOut(100);
    });
  }
  if($(window).width() > 600) {
    $(".user-cover").hover(function () {
      $('.profile-cover-changer').fadeIn(100);
    }, function () {
      $('.profile-cover-changer').fadeOut(100);
    });
  }

  $('form.profile-avatar-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_avatar_picture',

    beforeSend: function () {
      $('.profile_avatar').fadeOut(100);
      $('.user-avatar-uploading-container, .user-avatar-uploading-progress').fadeIn(200);
    },
    success: function (data) {
      $('.profile_avatar').fadeIn(100);
      if(data.status == 200) {
        Wo_GetNewPosts();
        $('[id^=updateImage-<?php echo $wo['user_profile']['id']; ?>]').attr('data-target', '#ProfileImageModal-Stopped');
        $('[id^=updateImage-<?php echo $wo['user_profile']['id']; ?>]').attr('onclick', 'Wo_OpenProfilePicture("' + data.img_or + '");');
        $('[id^=updateImage-<?php echo $wo['user_profile']['id']; ?>]').attr("src", data.img);
        $('#cropImage').modal('show');
         <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
            socket.emit("on_avatar_changed", {from_id: _getCookie("user_id"), name: data.img});
          <?php } ?>
        $('#image-to-crop img').attr('src', data.avatar_full);
        $('#image-to-crop img').attr('data-image', data.avatar_full_or);
        $('#image-to-crop img').on("load", function() {
		    setTimeout(function () {
		    	$('#image-to-crop img').rcrop({
		            minSize : [100,100],
		            preserveAspectRatio : true,
		            grid : true
		        });
		    }, 1000);
		}).each(function() {
		  if(this.complete) $(this).load();
		});
        if($("ul[data-profile-completion]").length == 1) {
            if ($('#add-profile-avatar').length == 1) {
               // window.location.reload();
            }
        }
      }
      else{
      	if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
      }

      $('.user-avatar-uploading-container,.user-avatar-uploading-progress').fadeOut(200);
    }
  });

  $('form.cover-position-form').ajaxForm({
        url:  Wo_Ajax_Requests_File() + '?f=re_cover',
        dataType:  'json',
        beforeSend: function() {
            $('.user-reposition-dragable-container').hide();
            $('.user-repositioning-icons-container1').show();
            $('.user-repositioning-icons-container').html('<div class="pace-activity-parent"><div class="pace-activity"></div></div>').fadeIn('fast');
        },
        success: function(data) {
            if (data.status == 200) {
                $('.user-cover-reposition-w img').attr('src', data.url + '?time=' + Math.random()).on("load", function () {
                    $('.when-edit').hide();
                    $('.when-notedit').show();
                    $('.user-repositioning-icons-container1').fadeOut('fast');
                    $('.user-repositioning-icons-container').fadeOut('fast').html('');
                    $('.user-cover-reposition-w').show();
                    $('.user-reposition-container').hide().find('img').css('top', 0);
                    $('.cover-resize-buttons').hide();
                    $('.default-buttons').show();
                    $('input.cover-position').val(0);
					$('.wo_user_profile .card.hovercard .pic-info-cont, .problackback').fadeIn();
                    // /$('.user-reposition-container img').draggable('destroy').css('cursor','default');

                });
            }
        }
    });
  $('.profile-cover-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_cover_picture',

    beforeSend: function () {
      $('.profile_cover').fadeOut(100);
      $('.user-cover-uploading-container,.user-cover-uploading-progress').fadeIn(200);
    },
    success: function (data) {
      $('.profile_cover').fadeIn(100);
      if(data.status == 200) {
        Wo_GetNewPosts();
        $('[id^=cover-image]').attr('data-target', '#ProfileCoverImageModal-Stopped');
        $('[id^=cover-image]').attr('onclick', 'Wo_OpenProfileCover("' + data.cover_or + '");');
        $('[id^=cover-image]').attr("src", data.img);
        $('#full-image').attr("src", data.cover_full);
        $('#full-input-image').val(data.cover_full);
        $('#cover-input-image').val(data.cover_or);
        Wo_StartRepositioner();

      }
      else{
      	if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
      }
      $('.user-cover-uploading-container,.user-cover-uploading-progress').fadeOut(200);
    }
  });
});

function Wo_GetFollowing(user_id) {
  Wo_progressIconLoader($('#sidebar-following-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_following_users',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-following-users-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-following-list-container').find('span'));
  });
}

function Wo_GetFollowers(user_id) {
  Wo_progressIconLoader($('#sidebar-followers-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_followers_users',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-followers-users-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-followers-list-container').find('span'));
  });
}

function Wo_GetLikes(user_id) {
  Wo_progressIconLoader($('#sidebar-pages-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'pages',
    s: 'get_likes',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-likes-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-pages-list-container').find('span'));
  });
}

function Wo_GetMoreFollowing(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.user-data:last').attr('data-user-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_following',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_users_to_show']; ?>");
      } else {
        $('#following-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMoreUserLikes(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.user-data:last').attr('data-page-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'pages',
    s: 'get_more_likes',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_pages']; ?>");
      } else {
        $('#likes-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMoreVideos(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.video-data:last').attr('data-video-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_videos',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_videos_to_show']; ?>");
      } else {
        $('#videos-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMorePhotos(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.profile-lists .photo-data:last').attr('data-photo-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_photos',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_photos_to_show']; ?>");
      } else {
        $('#photos-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMoreFollowers(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.user-data:last').attr('data-user-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_followers',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_users_to_show']; ?>");
      } else {
        $('#followers-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_UpdateProfileAvatar() {
  $("form.profile-avatar-changer").submit();
}

function Wo_UpdateProfileCover() {
  $("form.profile-cover-changer").submit();
}

function Wo_SetCookieAlert() {
  $.get(Wo_Ajax_Requests_File(), {
    f: 'set_admin_alert_cookie'
  });
}

function Wo_OpenProfileCover(image) {
    $.post(Wo_Ajax_Requests_File() + '?f=get_user_profile_cover_image_post', {
      image:image
    }, function (data) {
        if (data.status == 200) {
            Wo_OpenLightBox(data.post_id);
        } else {
            $('[id^=cover-image]').attr('data-target', '#ProfileCoverImageModal');
            $('[id^=cover-image]').attr('data-toggle', 'modal');
            $('#ProfileCoverImageModal').modal('show');
        }
    });
}

function Wo_OpenProfilePicture(image) {
    $.post(Wo_Ajax_Requests_File() + '?f=get_user_profile_image_post', {
      image:image
    }, function (data) {
        if (data.status == 200) {
            Wo_OpenLightBox(data.post_id);
        } else {
            $('[id^=updateImage-' + user_id + ']').attr('data-target', '#ProfileImageModal-' + user_id);
            $('[id^=updateImage-' + user_id + ']').attr('data-toggle', 'modal');
            $('#ProfileImageModal-' + user_id).modal('show');
        }
    });
}
function Wo_GetMutualFriends(user_id) {
  Wo_progressIconLoader($('#sidebar-mutual-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_mutual_users',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-mutual-users-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-mutual-list-container').find('span'));
  });
}

<?php if ( $wo['loggedin'] ){ ?>
    <?php if ( isset( $_GET['mode'] ) && $_GET['mode'] == 'opengift' ){ ?>
        $(document).ready(function() {
            setTimeout(() => {
                $('#gift_show_model').modal('show');
            }, 1000);
        });
    <?php } ?>
<?php } ?>
<?php if ($wo['config']['website_mode'] == 'linkedin') { ?>

	$(document).ready(function() {

	    var options = {
	      url: Wo_Ajax_Requests_File() + '?f=open_to&s=find_job&hash=' + $('.main_session').val() + "&mode_type=linkedin",
	        beforeSubmit:  function () {
	          $('.modal_finding_a_job_modal_alert').empty();
	          $("#finding_a_job_modal").find('.btn-mat').attr('disabled', 'true');
	          $("#finding_a_job_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
	        },
	        success: function (data) {
	          $("#finding_a_job_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
	          $("#finding_a_job_modal").find('.btn-mat').removeAttr('disabled')
	          if (data.status == 200) {
	            $('.modal_finding_a_job_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
	              data.message
	              +'</div>');
	            setTimeout(function(){
	            	location.reload()
	            },3000);
	          } else {
	            $('.modal_finding_a_job_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
	          }
	        }
	    };
	    $('.finding_a_job_form').ajaxForm(options);
	    var options = {
	      url: Wo_Ajax_Requests_File() + '?f=open_to&s=edit_job&hash=' + $('.main_session').val() + "&mode_type=linkedin",
	        beforeSubmit:  function () {
	          $('.modal_edit_finding_a_job_modal_alert').empty();
	          $("#edit_finding_a_job_modal").find('.btn-mat').attr('disabled', 'true');
	          $("#edit_finding_a_job_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
	        },
	        success: function (data) {
	          $("#edit_finding_a_job_modal").find('.btn-mat').text("<?php echo $wo['lang']['edit'] ?>");
	          $("#edit_finding_a_job_modal").find('.btn-mat').removeAttr('disabled')
	          if (data.status == 200) {
	            $('.modal_edit_finding_a_job_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
	              data.message
	              +'</div>');
	            setTimeout(function(){
	            	location.reload()
	            },3000);
	          } else {
	            $('.modal_edit_finding_a_job_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
	          }
	        }
	    };
	    $('.edit_finding_a_job_form').ajaxForm(options);
	    var options = {
	      url: Wo_Ajax_Requests_File() + '?f=open_to&s=providing_services&hash=' + $('.main_session').val() + "&mode_type=linkedin",
	        beforeSubmit:  function (formData, jqForm, options) {
	          $('.providing_services_modal_alert').empty();
	          $("#providing_services_modal").find('.btn-mat').attr('disabled', 'true');
	          $("#providing_services_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
	        },
	        success: function (data) {
	          $("#providing_services_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
	          $("#providing_services_modal").find('.btn-mat').removeAttr('disabled')
	          if (data.status == 200) {
	            $('.providing_services_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
	              data.message
	              +'</div>');
	            setTimeout(function(){
	            	location.reload()
	            },3000);
	          } else {
	            $('.providing_services_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
	          }
	        }
	    };
	    $('.providing_services_form').ajaxForm(options);
	    var options = {
	      url: Wo_Ajax_Requests_File() + '?f=open_to&s=edit_providing_services&hash=' + $('.main_session').val() + "&mode_type=linkedin",
	        beforeSubmit:  function (formData, jqForm, options) {
	          $('.edit_providing_services_modal_alert').empty();
	          $("#edit_providing_services_modal").find('.btn-mat').attr('disabled', 'true');
	          $("#edit_providing_services_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
	        },
	        success: function (data) {
	          $("#edit_providing_services_modal").find('.btn-mat').text("<?php echo $wo['lang']['edit'] ?>");
	          $("#edit_providing_services_modal").find('.btn-mat').removeAttr('disabled')
	          if (data.status == 200) {
	            $('.edit_providing_services_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
	              data.message
	              +'</div>');
	            setTimeout(function(){
	            	location.reload()
	            },3000);
	          } else {
	            $('.edit_providing_services_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
	          }
	        }
	    };
	    $('.edit_providing_services_form').ajaxForm(options);
	});
<?php } ?>
<?php if ($wo['loggedin'] && $wo['config']['website_mode'] == 'linkedin' && $wo['user_profile']['is_open_to_work'] != 0) { ?>
function DeleteOpenToWork(){
	$.ajax({
        url: Wo_Ajax_Requests_File()+"?f=open_to&s=delete_job" + "&mode_type=linkedin",
        type: 'POST',
        dataType: 'json',
        data: {id:<?php echo $wo['user_profile']['user_id']; ?>},
    })
    .done(function(data) {
        if (data.status == 200) {
            location.reload();
			$('#delete_open_to_work').modal('hide');
        }
        else{
        	$('.delete_finding_a_job_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
        }
    })
    .fail(function() {
        console.log("error");
    })
}
function EditOpenToWork(){
	$('#edit_finding_a_job_modal').modal('show');
}
<?php } ?>
<?php if ($wo['loggedin'] && $wo['config']['website_mode'] == 'linkedin' && $wo['user_profile']['is_providing_service'] != 0) { ?>
function EditProvidingService(){
	$('#edit_providing_services_input').tagsinput({});
	$('#edit_providing_services_modal').modal('show');
}
function DeleteProvidingService(){
	$.ajax({
        url: Wo_Ajax_Requests_File()+"?f=open_to&s=delete_service" + "&mode_type=linkedin",
        type: 'POST',
        dataType: 'json',
        data: {id:<?php echo $wo['user_profile']['user_id']; ?>},
    })
    .done(function(data) {
        if (data.status == 200) {
            location.reload();
			$('#delete_providing_service').modal('hide');
        }
        else{
        	$('.delete_finding_a_job_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
        }
    })
    .fail(function() {
        console.log("error");
    })
}
<?php } ?>
</script>
