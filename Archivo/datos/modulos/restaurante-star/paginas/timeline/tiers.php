<?php
$IsOwner       = lui_IsOnwer($wo['user_profile']['user_id']);
$IsOwnerUser   = lui_IsOnwerUser($wo['user_profile']['user_id']);

if ($wo['loggedin'] && $IsOwnerUser) {
   $wo['pr_complition'] = lui_ProfileCompletion();
}
?>
<style>.post-youtube iframe {overflow: hidden !important; height: 360px !important;}</style>
<div class="row page-margin profile wo_tiers_profile" data-page="timeline" data-id="<?php echo $wo['user_profile']['user_id'];?>">
	<div class="sun_profile_header_area">
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
				</form>
			<?php } ?>
			<div class="user-cover-uploading-container"></div>
			<div class="user-cover-uploading-progress">
				<div class="pace-activity-parent"><div class="pace-activity"></div></div>
			</div>
			<div class="user-cover-reposition-container">
				<div class="user-cover-reposition-w">
					<img id="cover-image" src="<?php echo $wo['user_profile']['cover']?>" alt="<?php echo $wo['user_profile']['name']?> Cover Image" onclick="Wo_OpenProfileCover('<?php echo $wo['user_profile']['cover_org']?>');" class="pointer"/>
				</div>
				<div class="user-reposition-container">
					<img id="full-image" src="<?php echo lui_GetMedia($wo['user_profile']['cover_full'])?>" alt="User Image" />
					<div class="user-reposition-dragable-container" align="center">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg> <?php echo $wo['lang']['drag_to_re']; ?>
					</div>
					<div class="user-cover-uploading-container user-repositioning-icons-container1"></div>
					<div class="user-cover-uploading-progress user-repositioning-icons-container"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="row sun_profile_container" style="margin-top: 100px;">
		<?php if ($wo['user_profile']['user_id'] == $wo['user']['user_id']) { ?>
		<span>
			<span>
			    <a href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=tiers');?>" data-ajax="?link1=setting&user=<?php echo $wo['user_profile']['username'];?>&page=tiers"><?php echo $wo['lang']['add_tier']; ?></a>
			</span>							
		</span>
		<?php } ?>
		<div class="col-md-12"></div>
		<?php 
		$wo['tiers'] = $db->where('user_id',$wo['user_profile']['user_id'])->orderBy('id','DESC')->get(T_USER_TIERS);
	    if (!empty($wo['tiers'])) {
	        foreach ($wo['tiers'] as $key => $wo['tier']) { ?>
	        	<div class="col-md-3">
	        		<img src="<?php echo lui_GetMedia($wo['tier']->image); ?>" style="width: 100px;height: 100px;border-radius: 50%;">
	        		<h4><?php echo $wo['tier']->title; ?></h4>
	        		<?php if (!empty($wo['tier']->chat)) { ?>
	        			<p><?php echo $wo['lang'][$wo['tier']->chat]; ?></p>
	        		<?php } if (!empty($wo['tier']->live_stream)) { ?>
	        			<p><?php echo $wo['lang']['live_stream']; ?></p>
	        		<?php } ?>
	        		<?php if (!empty($wo['tier']->description)) { ?>
	        			<p><?php echo $wo['tier']->description; ?></p>
	        		<?php } ?>
	        		<button type="button" onclick="Wo_JoinTier()" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn">
				       <span class="button-text"> <?php echo $wo['lang']['join']; ?></span>
				    </button>
	        	</div>
	    <?php } } ?>
	    <div class="col-md-12"></div>
	</div>
	<div class="clear"></div>

	<div class="row sun_profile_container">
		<div class="col-md-3 sun_col-md-3 no-padding-right">
			<div class="sun_side_widget">
				<div class="sun_pic_info text-center">
					<div class="user-avatar flip <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?><?php echo($wo['story_seen_class']); ?><?php } ?>">
						<div class="user-avatar-uploading-container">
							<div class="user-avatar-uploading-progress">
								<div class="ball-pulse"><div></div><div></div><div></div></div>
							</div>
						</div>
						<img id="updateImage-<?php echo $wo['user_profile']['user_id']?>" class="pointer <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?> <?php echo($wo['story_seen_class']); ?> see_all_stories <?php } ?>" alt="<?php echo $wo['user_profile']['name']?> Profile Picture" src="<?php echo $wo['user_profile']['avatar']?>" <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?> data_story_user_id="<?php echo $wo['user_profile']['user_id']?>"  data_story_type="user" <?php } else{ ?> onclick="Wo_OpenProfilePicture('<?php echo $wo['user_profile']['avatar_org']?>');" <?php } ?> />
						<?php if($IsOwner === true) { ?>
						<form action="#" method="post" class="profile-avatar-changer">
							<div class="input-group">
								<span class="input-group-btn profile_avatar">
									<span class="btn btn-upload-image btn-file">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
										<input type="file" name="avatar" accept="image/x-png, image/jpeg" onchange="Wo_UpdateProfileAvatar();">
									</span>
									<?php if ($wo['user_profile']['avatar_org'] != $wo['userDefaultAvatar'] && $wo['user_profile']['avatar_org'] != $wo['userDefaultFAvatar']) {?>
									<span class="btn btn-upload-image btn-file" onclick="OpenCropModal()">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crop"><path d="M6.13 1L6 16a2 2 0 0 0 2 2h15"></path><path d="M1 6.13L16 6a2 2 0 0 1 2 2v15"></path></svg>
									</span>
								<?php } ?>
								</span>
							</div>
							<input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['user_profile']['user_id'];?>">
						</form>
						<?php } ?>
						
						<!--Online/Offline-->
						<?php if($wo['config']['user_lastseen'] == 1 && $wo['user_profile']['showlastseen'] != 0 && $wo['loggedin'] == true) {  ?>
							<span class="sun_status <?php echo($wo['user_profile']['lastseen'] > (time() - 60) ? 'online' : 'offline' ) ?> " title="<?php echo($wo['user_profile']['lastseen'] > (time() - 60) ? $wo['lang']['online'] : lui_Time_Elapsed_String($wo['user_profile']['lastseen']) ) ?>"></span>
						<?php } ?>
					</div>
					<div class="info">
						<div class="title">
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username'];?>"><?php echo $wo['user_profile']['name']; ?></a>
							<?php if($wo['user_profile']['verified'] == 1) {   ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg>
							<?php } ?>
							<?php if (lui_IsUserPro($wo['user_profile']['is_pro']) === true) { 
							$user_pro_type = lui_GetUserProType($wo['user_profile']['pro_type']);
							?>
							<span class="badge-pro" style="background-color:<?php echo $user_pro_type['color_name'];?>">
								<a class="badge-link" href="<?php echo lui_SeoLink('index.php?link1=go-pro');?>" title="<?php echo $user_pro_type['type_name'];?>">PRO</a>
							</span>
							<?php } ?>
						</div>
						<div class="opt_buttons">
							<span class="user-follow-button">
								<?php echo lui_GetFollowButton($wo['user_profile']['user_id']);?>
							</span>
							<?php if ($wo['config']['notify_new_post'] == 1) { ?>
	                        	<span class="user-follow-button">
		                        <?php echo lui_GetNotifyButton($wo['user_profile']['user_id']);?>
		                        </span>
	                        <?php } ?>
	                  <?php if (PatreonSubscribed($wo['user_profile']['user_id'])) { ?>
							<span class="profile-message-btn">
								<?php echo lui_GetMessageButton($wo['user_profile']['user_id']);?>
							</span>
							<?php } ?>
							<?php if($IsOwnerUser === true) { ?>
								<a class="btn btn-link" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=activities');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username'] . '&type=activities'; ?>"><?php echo $wo['lang']['activities'];?></a>
								<?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
								<select onchange="OpenToModal(this)">
									<option value=""><?php echo $wo['lang']['open_to']; ?></option>
									<?php if ($wo['user_profile']['is_open_to_work'] == 0) { ?>
									<option value="finding_a_job"><?php echo $wo['lang']['finding_a_job']; ?></option>
									<?php } ?>
									<?php if ($wo['user_profile']['is_providing_service'] == 0) { ?>
									<option value="providing_services"><?php echo $wo['lang']['providing_services']; ?></option>
									<?php } ?>
									<option value="hiring"><?php echo $wo['lang']['hiring']; ?></option>
								</select>
								<?php } ?>
							<?php } ?>
							
						<!--Mobile Buttons-->
						<div class="sun_user_actions mobi_show">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mobi_menu_hd"><path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"></path></svg></a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<?php if($wo['loggedin'] == true && $IsOwner) { ?>
										<span class="sun_user_actions_item" title="<?php echo $wo['lang']['edit'];?>">
											<a href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=general-setting') ?>" data-ajax="?link1=setting&user=<?php echo $wo['user_profile']['username'] . '&page=general-setting'; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" /></svg> <?php echo $wo['lang']['edit'];?></a>
										</span>
									<?php } ?>
									<?php if($IsOwnerUser === false && $wo['loggedin'] == true) { ?>
										<span class="sun_user_actions_item" title="<?php echo $wo['lang']['block_user'];?>">
											<a href="<?php echo $wo['marker'] . 'block_user=block'?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,0A12,12 0 0,1 24,12A12,12 0 0,1 12,24A12,12 0 0,1 0,12A12,12 0 0,1 12,0M12,2A10,10 0 0,0 2,12C2,14.4 2.85,16.6 4.26,18.33L18.33,4.26C16.6,2.85 14.4,2 12,2M12,22A10,10 0 0,0 22,12C22,9.6 21.15,7.4 19.74,5.67L5.67,19.74C7.4,21.15 9.6,22 12,22Z" /></svg> <?php echo $wo['lang']['block_user'];?></a>
										</span>
										<?php if ($wo['config']['poke_system'] == 1) { ?>
										<span class="sun_user_actions_item" id="pokebutton" onclick="Wo_RegisterPoke(<?php echo $wo['user_profile']['user_id'];?>,<?php echo $wo['user']['user_id'];?>)" title="<?php echo $wo['lang']['poke_user'];?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,9A1,1 0 0,1 11,8A1,1 0 0,1 12,9V13.47L13.21,13.6L18.15,15.79C18.68,16.03 19,16.56 19,17.14V21.5C18.97,22.32 18.32,22.97 17.5,23H11C10.62,23 10.26,22.85 10,22.57L5.1,18.37L5.84,17.6C6.03,17.39 6.3,17.28 6.58,17.28H6.8L10,19V9M11,5A4,4 0 0,1 15,9C15,10.5 14.2,11.77 13,12.46V11.24C13.61,10.69 14,9.89 14,9A3,3 0 0,0 11,6A3,3 0 0,0 8,9C8,9.89 8.39,10.69 9,11.24V12.46C7.8,11.77 7,10.5 7,9A4,4 0 0,1 11,5M11,3A6,6 0 0,1 17,9C17,10.7 16.29,12.23 15.16,13.33L14.16,12.88C15.28,11.96 16,10.56 16,9A5,5 0 0,0 11,4A5,5 0 0,0 6,9C6,11.05 7.23,12.81 9,13.58V14.66C6.67,13.83 5,11.61 5,9A6,6 0 0,1 11,3Z" /></svg> <?php echo $wo['lang']['poke_user'];?>
										</span>
										<?php } ?>
									<?php } ?>
									<?php if($IsOwnerUser === false && $wo['loggedin'] == true && !lui_IsFamilyMemberExists($wo['user']['id'],$wo['user_profile']['id'],false)) { ?>
										<span class="sun_user_actions_item" id="open_add_to_family_modal" onclick="$('#add_to_family').modal('show');" title="<?php echo $wo['lang']['add_to_family'];?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A3,3 0 0,1 15,5A3,3 0 0,1 12,8A3,3 0 0,1 9,5A3,3 0 0,1 12,2M12,9C13.63,9 15.12,9.35 16.5,10.05C17.84,10.76 18.5,11.61 18.5,12.61V18.38C18.5,19.5 17.64,20.44 15.89,21.19V19C15.89,18.05 15.03,17.38 13.31,16.97C12.75,16.84 12.31,16.78 12,16.78C11.13,16.78 10.3,16.95 9.54,17.3C8.77,17.64 8.31,18.08 8.16,18.61C9.5,19.14 10.78,19.41 12,19.41L13,19.31V21.94L12,22C10.63,22 9.33,21.72 8.11,21.19C6.36,20.44 5.5,19.5 5.5,18.38V12.61C5.5,11.61 6.16,10.76 7.5,10.05C8.88,9.35 10.38,9 12,9M12,11A2,2 0 0,0 10,13A2,2 0 0,0 12,15A2,2 0 0,0 14,13A2,2 0 0,0 12,11Z" /></svg> <?php echo $wo['lang']['add_to_family'];?>
										</span>
									<?php } ?>
									<?php if ($wo['loggedin'] && !lui_IsAdmin() && $wo['user']['id'] != $wo['user_profile']['id'] && !lui_IsAdmin($wo['user_profile']['id'])): ?>
										<?php if (!lui_IsReportExists($wo['user_profile']['id'],'user')): ?>
											<span class="sun_user_actions_item" id="report_status_mobi" onclick="$('#report_profile').modal('show');" title="<?php echo $wo['lang']['report_user']; ?>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg> <?php echo $wo['lang']['report_user'];?>
											</span>
										<?php else: ?>
											<span class="sun_user_actions_item" id="report_status_mobi" onclick="Wo_ReportProfile(<?php echo $wo['user_profile']['id']; ?>,false);" title="<?php echo $wo['lang']['unreport']; ?>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg> <?php echo $wo['lang']['unreport'];?>
											</span>
										<?php endif; ?>
									<?php endif;?>
								</ul>
							</div>
						</div>
						</div>
					</div>
				</div>
				
				<p class="sun_user_desc">
				<?php if(!empty($wo['user_profile']['about'])) {  ?>
					<?php echo $wo['user_profile']['about']; ?>
				<?php } ?>
				</p>
			
				<ul class="list-unstyled right_user_info">
					<li class="list-group-item text-muted hidden" contenteditable="false"><?php echo $wo['lang']['details']; ?></li>
					<?php if($wo['config']['user_lastseen'] == 1 && $wo['user_profile']['showlastseen'] != 0 && $wo['loggedin'] == true) {  ?>
						<!--<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" /></svg> <?php echo lui_UserStatus($wo['user_profile']['user_id'], $wo['user_profile']['lastseen'], 'profile') ?> 
						</li>-->
					<?php } ?>
					<li class="list-group-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M21,6V8H3V6H21M3,18H12V16H3V18M3,13H21V11H3V13Z" /></svg> <span id="user_post_count"><?php echo $wo['user_profile']['details']['post_count'];?></span> <?php echo TextForMode('posts'); ?>
					</li>
					<?php if(!empty($wo['user_profile']['website'])) {  ?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M3.9,12C3.9,10.29 5.29,8.9 7,8.9H11V7H7A5,5 0 0,0 2,12A5,5 0 0,0 7,17H11V15.1H7C5.29,15.1 3.9,13.71 3.9,12M8,13H16V11H8V13M17,7H13V8.9H17C18.71,8.9 20.1,10.29 20.1,12C20.1,13.71 18.71,15.1 17,15.1H13V17H17A5,5 0 0,0 22,12A5,5 0 0,0 17,7Z" /></svg> <a rel="nofollow" href="<?php echo $wo['user_profile']['website']?>"><?php echo $wo['user_profile']['website']?></a>
						</li>
					<?php } ?>
					<li class="list-group-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M17.58,4H14V2H21V9H19V5.41L15.17,9.24C15.69,10.03 16,11 16,12C16,14.42 14.28,16.44 12,16.9V19H14V21H12V23H10V21H8V19H10V16.9C7.72,16.44 6,14.42 6,12A5,5 0 0,1 11,7C12,7 12.96,7.3 13.75,7.83L17.58,4M11,9A3,3 0 0,0 8,12A3,3 0 0,0 11,15A3,3 0 0,0 14,12A3,3 0 0,0 11,9Z" /></svg>
						<?php 
							$gender = ucfirst(strtolower($wo['user_profile']['gender']));
							if (in_array($wo['user_profile']['gender'], array_keys($wo['genders']))) {
			                	echo $wo['genders'][$wo['user_profile']['gender']];
			                }
			                else{
			                	echo $wo['genders'][array_keys($wo['genders'])[0]];
			                }
						?>
					</li>
					<?php if ($wo['user_profile']['birthday'] != '0000-00-00' && lui_CanSeeBirthday($wo['user_profile']['user_id'], $wo['user_profile']['birth_privacy']) === true) {  ?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" /></svg> <?php echo date($wo['config']['date_style'],strtotime($wo['user_profile']['birthday']));?>
						</li>
					<?php  }  ?>
					<?php if(!empty(lui_UserRelationship($wo['user_profile']['id']))) {  ?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M15,14C12.3,14 7,15.3 7,18V20H23V18C23,15.3 17.7,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,15L4.4,14.5C2.4,12.6 1,11.4 1,9.9C1,8.7 2,7.7 3.2,7.7C3.9,7.7 4.6,8 5,8.5C5.4,8 6.1,7.7 6.8,7.7C8,7.7 9,8.6 9,9.9C9,11.4 7.6,12.6 5.6,14.5L5,15Z" /></svg> <?php echo lui_UserRelationship($wo['user_profile']['id']); ?>
						</li>
					<?php } ?>
					<?php if(!empty($wo['user_profile']['working'])) {  ?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z" /></svg>
							<span><?php echo $wo['lang']['working_at'];?> <?php if (!empty($wo['user_profile']['working_link'])) { ?><a href="<?php echo $wo['user_profile']['working_link']; ?>" target="_blank" rel="nofollow"><?php echo $wo['user_profile']['working']; ?></a> <?php } else { echo $wo['user_profile']['working'];} ?></span>
						</li>
					<?php } ?>
					<?php if(!empty($wo['user_profile']['school'])) {  ?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M18,22A2,2 0 0,0 20,20V4C20,2.89 19.1,2 18,2H12V9L9.5,7.5L7,9V2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18Z" /></svg> <span><?php echo ($wo['user_profile']['school_completed'] == 1)   ? $wo['lang']['studied_at'] : $wo['lang']['studying_at'] ;?> <?php echo $wo['user_profile']['school']; ?></span>
						</li>
					<?php } ?>
					<?php 
						$country = $wo['user_profile']['country_id'];
						if ($country > 0) {
					?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['living_in'];?> <?php echo $wo['countries_name'][$country];?>
						</li>
					<?php } ?>
					<?php if(!empty($wo['user_profile']['address']) && $wo['user_profile']['share_my_location'] == 1) {  ?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg>
							<span onclick="$('.user-location-frame').fadeToggle();" class="pointer"><?php echo $wo['lang']['located_in'];?> <?php echo $wo['user_profile']['address'];?></span>
							<?php if (!empty($wo['config']['google_map_api']) && $wo['config']['google_map']) { ?>
								<iframe width="100%" class="user-location-frame" frameborder="0" style="border:0;margin-top: 10px;display:none;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=<?php echo $wo['user_profile']['address'];?>&language=en"></iframe>
							<?php } ?>
							<?php if ($wo['config']['yandex_map'] == 1) { ?>
				            <div id="place_<?php echo($wo['user_profile']['user_id']) ?>" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 100%; height: 300px; padding: 0; margin: 0;"' : '') ?>></div>
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
						<li class="list-group-item user-social-links">
							<?php  if(!empty($wo['user_profile']['youtube'])) {  ?>
								<a class="social-btn" href="https://www.youtube.com/<?php echo $wo['user_profile']['youtube']?>" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-youtube" fill="#ff0000"><path d="M10,16.5V7.5L16,12M20,4.4C19.4,4.2 15.7,4 12,4C8.3,4 4.6,4.19 4,4.38C2.44,4.9 2,8.4 2,12C2,15.59 2.44,19.1 4,19.61C4.6,19.81 8.3,20 12,20C15.7,20 19.4,19.81 20,19.61C21.56,19.1 22,15.59 22,12C22,8.4 21.56,4.91 20,4.4Z" /></svg>
								</a>
							<?php } if(!empty($wo['user_profile']['twitter'])) {  ?>
								<a class="social-btn" href="https://twitter.com/<?php echo $wo['user_profile']['twitter']?>" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-twitter" fill="#1da1f2"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z"></path></svg>
								</a>
							<?php }  if(!empty($wo['user_profile']['google'])) {  ?>
								<!-- <a class="social-btn" rel="publisher" href="https://plus.google.com/<?php echo $wo['user_profile']['google']?>" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-google" fill="#dc4938"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z"></path></svg>
								</a> -->
							<?php }  if(!empty($wo['user_profile']['facebook'])) {  ?>
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
			</div>
		
			<!-- Profile Percentage System -->
			<?php if ($IsOwnerUser === true && array_sum($wo['pr_complition']) < 100): ?>
				<?php echo lui_LoadPage('timeline/profile-completion'); ?>
			<?php endif; ?>
		</div>
		
		<div class="col-md-6 sun_col-md-6 no-padding-right">
			<div class="sun_side_widget">
				<div class="sun_user_nav">
					<ul class="list-unstyled mb0">
						<li>
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username'];?>">
								<span class="split-link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg></span>
								<span><?php echo $wo['lang']['timeline'];?></span>
							</a>
						</li>
						<li>
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=photos');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=photos">
								<span class="split-link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg></span>
								<span><?php echo $wo['lang']['photos'];?></span>
							</a>
						</li> 
						<?php if ($wo['config']['video_upload'] == 1) { ?>                   
						<li>
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=videos');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=videos">
								<span class="split-link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5Z" /></svg></span>
								<span><?php echo $wo['lang']['videos'];?></span>
							</a>
						</li>
						<?php } ?>
						<?php if ($wo['config']['pages'] == 1) {?>
							<li>
								<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=likes');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=likes">
									<span class="split-link"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"><path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z" /></svg></span>
									<span><?php echo $wo['lang']['likes'];?></span>
								</a>
							</li>
						<?php } ?>
						<li class="dropdown-submenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" role="button">
								<span class="split-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" /></svg></span>
							</a>
							<ul class="dropdown-menu dropdown-menu-right" role="menu">
								<?php if ($wo['config']['groups'] == 1) {?>
									<li>
										<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=groups');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=groups"><?php echo $wo['lang']['groups'];?></a>
									</li>
								<?php } ?>
								<?php if ($wo['config']['connectivitySystem'] == 1) {?>
									<li>
										<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=followers');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=followers"><?php echo $wo['lang']['friends_btn'];?></a>
									</li>	
								<?php } ?>
								<?php if ($wo['config']['connectivitySystem'] == 0) {?>
									<li>
										<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=following');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=following"><?php echo $wo['lang']['following'];?></a>
									</li>
									<li>
										<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=followers');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=followers"><?php echo $wo['lang']['followers'];?></a>
									</li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			
			<?php
				if (isset($_GET['type'])) {
            	if ($_GET['type'] == 'activities' && $IsOwner) {
            		echo lui_LoadPage('timeline/activities');
            	} else if ($_GET['type'] == 'mutual_friends') {
			?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8d73cc" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"></path></svg> <?php echo $wo['lang']['mutual_friends'];?>
					</h3>
					<div id="following-list" class="row" style="margin: 0;">
						<?php
							if (lui_CountMutualFriends($wo['user_profile']['user_id']) == 0) {
								echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>' . $wo['lang']['no_mutual_friends'] . '</h5>';
							} else {
								foreach (lui_GetMutualFriends($wo['user_profile']['user_id'],'profile', 100) as $wo['UsersList']) {
									echo lui_LoadPage('timeline/follow-list');
								}
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } else if ($_GET['type'] == 'following') { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z"></path></svg> <?php echo $wo['lang']['following'];?>
						<span>
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=family_list');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=family_list"><?php echo $wo['lang']['family_members']; ?></a> 
						</span>
					</h3>
					<div id="following-list" class="row" style="margin: 0;">
						<?php
							if (lui_FriendPrivacy($wo['user_profile']['id'],$wo['user_profile']['friend_privacy'])) {
								if (lui_CountFollowing($wo['user_profile']['user_id']) == 0) {
									echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>' . $wo['lang']['not_following'] . '</h5>';
								} else {
									foreach (lui_GetFollowing($wo['user_profile']['user_id'], 'profile', 100) as $wo['UsersList']) {
										echo lui_LoadPage('timeline/follow-list');
									}
								}
							}	
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php if (lui_CountFollowing($wo['user_profile']['user_id']) > 10) { ?>
				<div class="load-more">
					<button class="btn btn-default text-center wo_load_more" onclick="Wo_GetMoreFollowing(<?php echo $wo['user_profile']['user_id'];?>);">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_users']; ?>
					</button>
				</div>
			<?php } ?>
			<?php } else if ($_GET['type'] == 'followers') { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8d73cc" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"></path></svg> 
						<?php 
							if ($wo['config']['connectivitySystem'] == 1) {
								echo $wo['lang']['friends_btn'];
							} else {
								echo $wo['lang']['followers'];
							}
						?> 
						<span>
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=family_list');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=family_list"><?php echo $wo['lang']['family_members']; ?></a> 
						</span>
					</h3>
					<div id="followers-list" class="row" style="margin: 0;">
						<?php
							if (lui_FriendPrivacy($wo['user_profile']['id'],$wo['user_profile']['friend_privacy'])) {
								if (lui_CountFollowers($wo['user_profile']['user_id']) == 0) {
									if ($wo['config']['connectivitySystem'] == 1) {
										echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>' . $wo['lang']['no_friends'] . '</h5>';
									} else {
										echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>' . $wo['lang']['no_followers'] . '</h5>';
									}
								} else {
									foreach (lui_GetFollowers($wo['user_profile']['user_id'],'profile',100) as $wo['UsersList']) {
										echo lui_LoadPage('timeline/follow-list');
									} 
								}
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php if (lui_CountFollowers($wo['user_profile']['user_id']) > 10) {  ?>
				<div class="load-more">
					<button class="btn btn-default text-center wo_load_more" onclick="Wo_GetMoreFollowers(<?php echo $wo['user_profile']['user_id'];?>);">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_users']; ?>
					</button>
				</div>
			<?php } ?>
            <?php } else if ($_GET['type'] == 'videos') { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f44336" d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5Z"></path></svg> <?php echo $wo['lang']['videos'];?>
					</h3>
					<div id="videos-list" class="user_media_list_section">
						<?php
							$video_stories = lui_GetPosts(array('filter_by' => 'video','limit' => 50, 'publisher_id' => $wo['user_profile']['user_id'])); 

							if (count($video_stories) == 0) {
								echo '<h5 class="search-filter-center-text empty_state" style="margin: 80px auto;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg> ' . $wo['lang']['no_posts_found'] . '</h5>';
							} else {
								foreach ($video_stories as $wo['story']) {
									if(isset($wo['story']['postFile']) && !empty($wo['story']['postFile'])){
										?>
										<div class="text-center video-data" data-video-id="<?php echo $wo['story']['post_id'];?>">
											<a href="<?php echo $wo['story']['url'];?>" target="_blank">
												<video><source src="<?php echo lui_GetMedia($wo['story']['postFile']);?>" type="video/mp4"></video>
											</a>
										</div>
                                    <?php
									}
								}
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php if (count($video_stories) > 1) {  ?>
				<div class="load-more">
					<button class="btn btn-default text-center wo_load_more" onclick="Wo_GetMoreVideos(<?php echo $wo['user_profile']['user_id'];?>);">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_videos']; ?>
					</button>
				</div>
			<?php } ?>
            <?php } else if ($_GET['type'] == 'photos') { ?>
				<div class="list-group profile-lists sun_photo_load_more sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8bc34a" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['photos'];?>
						<span>
							<a href="<?php echo lui_SeoLink('index.php?link1=albums&user=' . $wo['user_profile']['username']);?>" data-ajax="?link1=albums&user=<?php echo $wo['user_profile']['username'];?>"><?php echo $wo['lang']['albums'];?></a>
						</span>
					</h3>
					<div id="photos-list" class="user_media_list_section">
						<?php
							$photo_stories = lui_GetPosts(array('filter_by' => 'photos','limit' => 10, 'publisher_id' => $wo['user_profile']['user_id'])); 
                       
							if (count($photo_stories) == 0) {
								echo '<h5 class="search-filter-center-text empty_state" style="margin: 80px auto;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> ' . $wo['lang']['no_posts_found'] . '</h5>';
							} else {
								foreach ($photo_stories as $wo['story']) {
									if(isset($wo['story']['postFile']) && !empty($wo['story']['postFile'])){
										?>
										<div class="text-center photo-data" data-photo-id="<?php echo $wo['story']['post_id'];?>">
											<?php if ($wo['story']['blur'] == 1) { ?>
                                    		<a href="javascript:void(0)" onclick="Wo_OpenLightBox(<?php echo $wo['story']['post_id'];?>);">
	                                            <img src="<?php echo Wo_GetMedia( $wo['story']['postFile'] ) . "?cache=" . $wo['story']['cache'] ;?>" alt="image" class="image_blur">
	                                        </a>
					                    <?php }else{ ?>
                                        <a href="javascript:void(0)" onclick="Wo_OpenLightBox(<?php echo $wo['story']['post_id'];?>);">
												<img src="<?php echo lui_GetMedia( $wo['story']['postFile'] ) . "?cache=" . $wo['story']['cache'] ;?>" alt="image">
											</a>
                                    <?php } ?>
											
										</div>
										<?php
									}
								}
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php if (count($photo_stories) > 1) {  ?>
				<div class="load-more">
					<button class="btn btn-default text-center wo_load_more" onclick="Wo_GetMorePhotos(<?php echo $wo['user_profile']['user_id'];?>);">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_photos']; ?>
					</button>
				</div>
			<?php } ?>
			<?php } else if ($_GET['type'] == 'likes') { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f79f58" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z"></path></svg> <?php echo $wo['lang']['likes'];?>
					</h3>
					<div id="likes-list" class="row" style="margin: 0;">
						<?php
							if (lui_CountUserLikes($wo['user_profile']['user_id']) == 0) {
								echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>' . $wo['lang']['no_likes'] . '</h5>';
							} else {
								foreach (lui_GetLikes($wo['user_profile']['user_id'],'profile',100) as $wo['PageList']) {
									echo lui_LoadPage('timeline/likes-list');
								} 
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php if (lui_CountUserLikes($wo['user_profile']['user_id']) > 10) {  ?>
				<div class="load-more">
					<button class="btn btn-default text-center wo_load_more" onclick="Wo_GetMoreUserLikes(<?php echo $wo['user_profile']['user_id'];?>);">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_pages'];?>
					</button>
				</div>
			<?php } ?>
			<?php } else if ($_GET['type'] == 'groups') { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M12,6A3,3 0 0,0 9,9A3,3 0 0,0 12,12A3,3 0 0,0 15,9A3,3 0 0,0 12,6M6,8.17A2.5,2.5 0 0,0 3.5,10.67A2.5,2.5 0 0,0 6,13.17C6.88,13.17 7.65,12.71 8.09,12.03C7.42,11.18 7,10.15 7,9C7,8.8 7,8.6 7.04,8.4C6.72,8.25 6.37,8.17 6,8.17M18,8.17C17.63,8.17 17.28,8.25 16.96,8.4C17,8.6 17,8.8 17,9C17,10.15 16.58,11.18 15.91,12.03C16.35,12.71 17.12,13.17 18,13.17A2.5,2.5 0 0,0 20.5,10.67A2.5,2.5 0 0,0 18,8.17M12,14C10,14 6,15 6,17V19H18V17C18,15 14,14 12,14M4.67,14.97C3,15.26 1,16.04 1,17.33V19H4V17C4,16.22 4.29,15.53 4.67,14.97M19.33,14.97C19.71,15.53 20,16.22 20,17V19H23V17.33C23,16.04 21,15.26 19.33,14.97Z"></path></svg> <?php echo $wo['lang']['groups'];?>
					</h3>
					<div id="groups-list" class="row" style="margin: 0;">
						<?php
							if (lui_CountUserGroups($wo['user_profile']['user_id']) == 0) {
								echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>' . $wo['lang']['no_groups'] . '</h5>';
							} else {
								foreach (lui_GetUsersGroups($wo['user_profile']['user_id'], 5000) as $wo['GroupList']) {
									echo lui_LoadPage('timeline/groups-list');
								} 
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } else if ($_GET['type'] == 'family_list') { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#3d8cfa" d="M12,2A3,3 0 0,1 15,5A3,3 0 0,1 12,8A3,3 0 0,1 9,5A3,3 0 0,1 12,2M12,9C13.63,9 15.12,9.35 16.5,10.05C17.84,10.76 18.5,11.61 18.5,12.61V18.38C18.5,19.5 17.64,20.44 15.89,21.19V19C15.89,18.05 15.03,17.38 13.31,16.97C12.75,16.84 12.31,16.78 12,16.78C11.13,16.78 10.3,16.95 9.54,17.3C8.77,17.64 8.31,18.08 8.16,18.61C9.5,19.14 10.78,19.41 12,19.41L13,19.31V21.94L12,22C10.63,22 9.33,21.72 8.11,21.19C6.36,20.44 5.5,19.5 5.5,18.38V12.61C5.5,11.61 6.16,10.76 7.5,10.05C8.88,9.35 10.38,9 12,9M12,11A2,2 0 0,0 10,13A2,2 0 0,0 12,15A2,2 0 0,0 14,13A2,2 0 0,0 12,11Z"></path></svg> <?php echo $wo['lang']['family_members'];?>
						<?php if ($wo['user_profile']['user_id'] == $wo['user']['id']): ?>
							<span>
								<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=requests');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=requests"> <?php echo $wo['lang']['requests']; ?> </a>
							</span>
						<?php endif; ?>
					</h3>
					<div id="family-members-list" class="row" style="margin: 0;">
						<?php 
							$family = Wo_GetFamaly($wo['user_profile']['user_id'],false,1);
							$i      = 0;
							if (count($family) > 0) {
								foreach ($family as $wo['UsersList']) {
									if ($wo['UsersList']['type'] == 'family') {
										echo lui_LoadPage('timeline/family-list');
										$i++;
									}
								}
							}
							if($i < 1){
								echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> ' . $wo['lang']['no_members_found'] . '</h5>';
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php } else if ($_GET['type'] == 'requests' && $wo['user_profile']['user_id'] == $wo['user']['id']) { ?>
				<div class="list-group profile-lists sun_side_widget">
					<h3 class="sun_side_widget_title mainpage">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#3d8cfa" d="M10.63,14.1C12.23,10.58 16.38,9.03 19.9,10.63C23.42,12.23 24.97,16.38 23.37,19.9C22.24,22.4 19.75,24 17,24C14.3,24 11.83,22.44 10.67,20H1V18C1.06,16.86 1.84,15.93 3.34,15.18C4.84,14.43 6.72,14.04 9,14C9.57,14 10.11,14.05 10.63,14.1V14.1M9,4C10.12,4.03 11.06,4.42 11.81,5.17C12.56,5.92 12.93,6.86 12.93,8C12.93,9.14 12.56,10.08 11.81,10.83C11.06,11.58 10.12,11.95 9,11.95C7.88,11.95 6.94,11.58 6.19,10.83C5.44,10.08 5.07,9.14 5.07,8C5.07,6.86 5.44,5.92 6.19,5.17C6.94,4.42 7.88,4.03 9,4M17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14Z"></path></svg> <?php echo $wo['lang']['requests'];?>
						<span>
							<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=family_list');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=family_list"><?php echo $wo['lang']['family_members']; ?></a> 
						</span>
					</h3>
					<div id="family-requests-list" class="row" style="margin: 0;">
						<?php 
							$family = lui_GetFamaly($wo['user_profile']['user_id'],false,0,true);
							if (count($family) > 0) {
								$i      = 0;
								foreach ($family as $wo['UsersList']) {
									if ($wo['UsersList']['type'] == 'family' || $wo['UsersList']['type'] == 'rel_ship') {
										echo lui_LoadPage('timeline/requests-list');
										$i++;
									}
								}
							}
							else{
								echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> ' . $wo['lang']['no_requests_found'] . '</h5>';
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			<?php }else if ($_GET['type'] == 'job_apply' && $wo['user_profile']['user_id'] == $wo['user']['id']) {
				$job_apply = lui_GetApplyJob(array('job_id' => $_GET['id']));
			if (!empty($job_apply)) { ?>
				<div id="posts" data-story-page="<?php echo $wo['user_profile']['user_id'];?>" class="apply_job_info" data_apply_job="<?php echo($_GET['id']) ?>">
					<div class="post-container sun_post apply_job_container">
		<?php 	foreach ($job_apply as $key => $wo['job_apply']) {
					echo lui_LoadPage('page/job_apply');
				} ?>
					</div>
					<div class="posts_load">
						<?php if (count($job_apply) >= 1): ?>
							<div class="load-more">
								<div class="btn btn-default text-center pointer" id="load_more_nearby_users" onclick="Wo_LoadMoreApplyJobs();">
									<i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> 
									<?php echo $wo['lang']['load_more'] ?>
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
		  <?php  }

			} else { 
               header("Location: " . lui_SeoLink('index.php?link1=timeline&u=' . $_GET['u'])); 
               exit(); 
            } ?>
			<?php } else { 
				if ($wo['user_profile']['user_id'] == $wo['user']['user_id']) {
					echo lui_GetPostPublisherBox(0, $wo['user_profile']['user_id']); 
				}
				?>
			<?php if ($wo['loggedin'] == true) { echo lui_LoadPage('story/filter-by'); } ?>
				<div class="posts_load">
					<div id="posts" data-story-user="<?php echo $wo['user_profile']['user_id'];?>">
						<div class="pinned-post-container">
							<?php
								$pinedstory = lui_GetPinnedPost($wo['user_profile']['user_id']);
								if (count($pinedstory) == 1) {
									foreach ($pinedstory  as $wo['story']) {
										echo lui_LoadPage('story/content');
									}
								}
							?>
						</div>
						<?php
						$array = array('filter_by' => 'all','publisher_id' => $wo['user_profile']['user_id'],'placement' => 'multi_image_post');
					    if ($wo['loggedin'] && $wo['user_profile']['user_id'] == $wo['user']['id']) {
					    	$array['anonymous'] = true;
					    }
							$stories = lui_GetPosts($array); 
							if (count($stories) == 0 && count($pinedstory) == 0) {
								echo lui_LoadPage('story/profile-no-stories');
							} else {
								foreach ($stories as $wo['story']) {
									echo lui_LoadPage('story/content');
								}
							}
						?>
					</div>
					<?php if (count($stories) > 0) {  ?>
						<div class="load-more pointer" id="load-more-posts" onclick="Wo_GetMorePosts();">
							<span class="btn btn-default"><i class="fa fa-chevron-circle-down progress-icon" data-icon="chevron-circle-down"></i> &nbsp;<?php echo $wo['lang']['load_more_posts']; ?><span>
						</div>
					<?php } ?>
				</div>  
			<?php } ?>
			<div id="load-more-filter">
				<span class="filter-by-more hidden" data-filter-by="all"></span>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="sun_user_actions">
				<?php if($wo['loggedin'] == true && $IsOwner) { ?>
					<span class="sun_user_actions_item" title="<?php echo $wo['lang']['edit'];?>">
						<a href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=general-setting') ?>" data-ajax="?link1=setting&user=<?php echo $wo['user_profile']['username'] . '&page=general-setting'; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" /></svg></a>
					</span>
				<?php } ?>
				<?php if($IsOwnerUser === false && $wo['loggedin'] == true) { ?>
					<span class="sun_user_actions_item" title="<?php echo $wo['lang']['block_user'];?>">
						<a href="<?php echo $wo['marker'] . 'block_user=block'?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,0A12,12 0 0,1 24,12A12,12 0 0,1 12,24A12,12 0 0,1 0,12A12,12 0 0,1 12,0M12,2A10,10 0 0,0 2,12C2,14.4 2.85,16.6 4.26,18.33L18.33,4.26C16.6,2.85 14.4,2 12,2M12,22A10,10 0 0,0 22,12C22,9.6 21.15,7.4 19.74,5.67L5.67,19.74C7.4,21.15 9.6,22 12,22Z" /></svg></a>
					</span>
					<?php if ($wo['config']['poke_system'] == 1) { ?>
					<span class="sun_user_actions_item" id="pokebutton" onclick="Wo_RegisterPoke(<?php echo $wo['user_profile']['user_id'];?>,<?php echo $wo['user']['user_id'];?>)" title="<?php echo $wo['lang']['poke_user'];?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,9A1,1 0 0,1 11,8A1,1 0 0,1 12,9V13.47L13.21,13.6L18.15,15.79C18.68,16.03 19,16.56 19,17.14V21.5C18.97,22.32 18.32,22.97 17.5,23H11C10.62,23 10.26,22.85 10,22.57L5.1,18.37L5.84,17.6C6.03,17.39 6.3,17.28 6.58,17.28H6.8L10,19V9M11,5A4,4 0 0,1 15,9C15,10.5 14.2,11.77 13,12.46V11.24C13.61,10.69 14,9.89 14,9A3,3 0 0,0 11,6A3,3 0 0,0 8,9C8,9.89 8.39,10.69 9,11.24V12.46C7.8,11.77 7,10.5 7,9A4,4 0 0,1 11,5M11,3A6,6 0 0,1 17,9C17,10.7 16.29,12.23 15.16,13.33L14.16,12.88C15.28,11.96 16,10.56 16,9A5,5 0 0,0 11,4A5,5 0 0,0 6,9C6,11.05 7.23,12.81 9,13.58V14.66C6.67,13.83 5,11.61 5,9A6,6 0 0,1 11,3Z" /></svg>
					</span>
					<?php } ?>
				<?php } ?>
				<?php if($IsOwnerUser === false && $wo['loggedin'] == true && !lui_IsFamilyMemberExists($wo['user']['id'],$wo['user_profile']['id'],false)) { ?>
					<span class="sun_user_actions_item" id="open_add_to_family_modal" onclick="$('#add_to_family').modal('show');" title="<?php echo $wo['lang']['add_to_family'];?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A3,3 0 0,1 15,5A3,3 0 0,1 12,8A3,3 0 0,1 9,5A3,3 0 0,1 12,2M12,9C13.63,9 15.12,9.35 16.5,10.05C17.84,10.76 18.5,11.61 18.5,12.61V18.38C18.5,19.5 17.64,20.44 15.89,21.19V19C15.89,18.05 15.03,17.38 13.31,16.97C12.75,16.84 12.31,16.78 12,16.78C11.13,16.78 10.3,16.95 9.54,17.3C8.77,17.64 8.31,18.08 8.16,18.61C9.5,19.14 10.78,19.41 12,19.41L13,19.31V21.94L12,22C10.63,22 9.33,21.72 8.11,21.19C6.36,20.44 5.5,19.5 5.5,18.38V12.61C5.5,11.61 6.16,10.76 7.5,10.05C8.88,9.35 10.38,9 12,9M12,11A2,2 0 0,0 10,13A2,2 0 0,0 12,15A2,2 0 0,0 14,13A2,2 0 0,0 12,11Z" /></svg>
					</span>
				<?php } ?>
				<?php if ($wo['loggedin'] && !lui_IsAdmin() && $wo['user']['id'] != $wo['user_profile']['id'] && !lui_IsAdmin($wo['user_profile']['id'])): ?>
					<?php if (!lui_IsReportExists($wo['user_profile']['id'],'user')): ?>
						<span class="sun_user_actions_item" id="report_status" onclick="$('#report_profile').modal('show');" title="<?php echo $wo['lang']['report_user']; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg>
						</span>
					<?php else: ?>
						<span class="sun_user_actions_item" id="report_status" onclick="Wo_ReportProfile(<?php echo $wo['user_profile']['id']; ?>,false);" title="<?php echo $wo['lang']['unreport']; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg>
						</span>
					<?php endif; ?>
				<?php endif;?>
			</div>
			
			<?php if($wo['loggedin'] == true && $wo['config']['gift_system'] != 0) {  ?>
				<?php if ($IsOwnerUser == false) { ?>
					<span class="btn btn-md send_gift_btn" onclick="Wo_open_send_gift();">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504.124 504.124" style="enable-background:new 0 0 504.124 504.124;" xml:space="preserve"> <path style="fill:#DB5449;" d="M15.754,133.909l236.308,118.154L488.37,133.909v252.062L252.062,504.123L15.754,385.969V133.909z"/> <path style="fill:#C54B42;" d="M15.754,157.538v73.649l235.52,115.397l237.095-115.791v-73.255L252.062,273.33L15.754,157.538z"/> <path style="fill:#D05045;" d="M252.062,504.123V252.063L31.508,141.786H15.754v244.185L252.062,504.123z"/> <path style="fill:#BB483E;" d="M15.754,157.538v73.649l235.52,115.397l0.788-0.394v-73.255v0.394L15.754,157.538z"/> <path style="fill:#EB6258;" d="M0,125.638L252.062,0.001l252.062,125.637v16.542L252.062,267.815L0,142.573V125.638z"/> <path style="fill:#EFEFEF;" d="M396.603,39.779c-8.271-14.966-25.994-24.025-46.868-24.025c-47.655,0-81.132,44.505-97.674,72.862 c-16.542-28.357-50.412-72.468-97.674-72.468c-30.326,0-51.988,18.511-51.988,43.717c0,44.898,49.231,74.043,148.086,74.043 s151.237-37.415,151.237-73.649C401.723,53.17,400.148,46.081,396.603,39.779z M164.628,88.223 c-11.028-7.483-14.966-15.754-14.966-21.268c0-6.695,6.302-11.815,15.36-11.815c21.268,0,38.203,27.963,47.655,47.262 C187.865,100.432,173.292,93.736,164.628,88.223z M339.495,88.223c-8.665,5.514-23.237,12.209-48.049,14.178 c9.058-19.298,25.994-47.262,47.655-47.262c9.058,0,15.36,5.12,15.36,11.815C354.462,72.469,350.523,80.739,339.495,88.223z"/> <path style="fill:#E2574C;" d="M0,126.032l252.062,123.274l252.062-123.274v81.526l-252.85,123.274L0,207.558V126.032z"/> <path style="fill:#EFEFEF;" d="M346.585,213.859v-9.058l-94.523-51.2l-94.523,51.2v9.058L94.524,186.29v-12.603l154.387-81.526 l3.151,1.575l3.151-1.575L409.6,173.293v12.603L346.585,213.859z"/> <path style="fill:#DCDCDC;" d="M346.585,204.801v251.668l63.015-31.508V173.293L346.585,204.801z"/> <path style="fill:#D1D1D1;" d="M94.523,425.354l63.015,31.508V205.195l-63.015-31.902C94.523,173.292,94.523,425.354,94.523,425.354 z"/> </svg> <?php echo $wo['lang']['send_a_gift']; ?>
					</span>
				<?php } ?>
			<?php } ?>
			<?php if ($wo['config']['user_status'] == 1 && lui_CountUserStatus($wo['user_profile']['id']) > 0): ?>
				<!-- <ul class="list-group sun_side_widget" style="padding: 10px 0px;">
					<li class="list-group-item text-muted hidden" contenteditable="false"><?php echo $wo['lang']['story']; ?></li>
					<li class="list-group-item pointer see_all_stories"  data_story_user_id="<?php echo $wo['user_profile']['user_id']?>"  data_story_type="user">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg> <?php echo $wo['lang']['story']; ?>
					</li>
				</ul> -->
			<?php endif; ?>
			<?php if($wo['loggedin'] == true) {  ?>
				<ul class="list-group sun_side_widget">
					<li class="list-group-item text-muted search-for-posts-container hidden" contenteditable="false"><i class="fa fa-search progress-icon fa-fw" data-icon="search"></i></li>
					<li class="form-group inner-addon" style="margin-bottom: 0px;padding: 5px;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search glyphicon" color="gray" style="padding: 0;margin: 11px 7px 12px 8px;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
						<input type="text" class="form-control search-for-posts" onkeyup="Wo_SearchForPosts(this.value);" placeholder="<?php echo $wo['lang']['search_for_posts']; ?>" style="padding-left: 37px;padding-right: 37px;" />
					</li>
				</ul>
			<?php } ?>
			<?php
				$fields = lui_GetProfileFields('none'); 
				if (count($fields) > 0) { 
			?>
				<ul class="list-group sun_side_widget">
					<li class="list-group-item text-muted hidden" contenteditable="false"><?php echo $wo['lang']['more_info']; ?></li>
					<li class="list-group-item text-muted widget-heading" contenteditable="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list" style="background:#8d73cc;"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg> <?php echo $wo['lang']['more_info']; ?>
					</li>
					<?php
						foreach ($fields as $key => $wo['field']) {
							$name = $wo['field']['fid'];
							if (!empty($wo['user_profile']['fields'][$name])) {
								echo lui_LoadPage('timeline/custom-fields');
							}
						}
					?>
				</ul>
			<?php } ?>
			<?php 
				if ($wo['config']['connectivitySystem'] == 1) {
					echo lui_LoadPage('timeline/friends-sidebar');
				} else {
					echo lui_LoadPage('timeline/following-followers-sidebar');
				}
				if ($wo['config']['pages'] == 1) {
					echo lui_LoadPage('timeline/likes-sidebar');
				}
				if ($wo['config']['groups'] == 1) {
					echo lui_LoadPage('timeline/groups-sidebar');
				}
			?>
			<?php 
            $sidebar_ad = lui_GetAd('sidebar', false);
            if (!empty($sidebar_ad)) {?>
				<ul class="list-group sidebar-ad">
					<?php echo $sidebar_ad; ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</div>