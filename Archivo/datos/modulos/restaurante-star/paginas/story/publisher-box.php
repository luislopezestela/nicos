<?php
$hashtag = '';
$url = '';
if (isset($_GET['link1']) && $_GET['link1'] == 'hashtag' && !empty($_GET['hash'])) {
  $hashtag = '#' . $_GET['hash'];
}
if (!empty($_GET['url'])) {
  $url = urldecode($_REQUEST['url']);
}
?>
<form action="#" method="post" class="post publisher-box" id="publisher-box-focus">
	<div class="panel post panel-shadow sun_pub_box">
		<div id="post-textarea"  onclick="Wo_ShowPosInfo();">
			<div class="wo_pub_txtara_combo">
				<?php //if ($wo['page'] != 'events') { ?>
					<img class="post-avatar" src="<?php echo (empty($wo['page_profile']['avatar'])) ? $wo['user']['avatar'] : $wo['page_profile']['avatar'];?>">
					<div class="sun_pub_name">
						<span><?php echo (empty($wo['page_profile']['name'])) ? $wo['user']['name'] : $wo['page_profile']['name'];?></span>
					</div>
				<?php //} ?>
				<i class="fa fa-spinner fa-spin" id="loading_indicator"></i>
				<textarea onkeyup="textAreaAdjust(this, 70)" name="postText" class="form-control postText" cols="10" rows="3" placeholder="<?php echo TextForMode('publisher_box_placeholder'); ?>" dir="auto"><?php echo $url; ?></textarea>
				<!--Add Emojis-->
				<div class="dropdown add-emoticons">
					<a href="#" class="dropdown-toggle" type="button" id="dropdownEmo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="load_ajax_publisher_emojii('<?php echo $wo['config']['theme_url'];?>/emoji/');">
						<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24" viewBox="0 0 24 24" class="feather feather-emoticons"><path d="M12,23 C5.92486775,23 1,18.0751322 1,12 C1,5.92486775 5.92486775,1 12,1 C18.0751322,1 23,5.92486775 23,12 C23,18.0751322 18.0751322,23 12,23 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z M15.2746538,14.2978292 L16.9105622,15.4483958 C15.7945475,17.0351773 13.9775544,18 12,18 C10.0224456,18 8.20545254,17.0351773 7.08943782,15.4483958 L8.72534624,14.2978292 C9.4707028,15.3575983 10.6804996,16 12,16 C13.3195004,16 14.5292972,15.3575983 15.2746538,14.2978292 Z M14,11 L14,9 L16,9 L16,11 L14,11 Z M8,11 L8,9 L10,9 L10,11 L8,11 Z" /></svg>
					</a>
					<ul class="dropdown-menu dropdown-menu-right publisher-box-emooji" aria-labelledby="dropdownEmo">
						
					</ul>
				</div>
			</div>
		</div>
		
		<!--Uploaded Video-->
		<?php if ($wo['config']['video_upload'] == 1) { ?>
		<div class="publisher-hidden-option" id="video-form">
			<div class="inner-addon <?php echo lui_RightToLeft('left-addon');?>">
				<span class="pull-left">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
					<input name="videocount" type="text" class="form-control bg_read_input" readonly>
				</span>
				<?php if ($wo['config']['ffmpeg_system'] != 'on') { ?>
				<span class="pull-right pointer video-custom-thumb">
					<?php echo $wo['lang']['custom_thumbnail']; ?>&nbsp;<i class="fa fa-caret-down"></i>
				</span>
				<?php } ?>
			</div>
			<div class="video-poster-image">
				<div class="thumb-renderer pointer" onclick="$('#custom-video-thumb').trigger('click');">
					<div id="post_vthumb_droparea">
						<div class="preview">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud" color="#384047"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
							<div class="error-text-renderer"></div>
							<div>
								<p><?php echo $wo['lang']['drop_img_here']; ?> <?php echo $wo['lang']['or']; ?> <?php echo $wo['lang']['browse_to_upload']; ?></p>
							</div>
						</div>
						<div class="image"></div>
					</div>
				</div>
			</div>
			<input type="file" class="hidden" name="video_thumb" id="custom-video-thumb" accept="image/*">
		</div>
		<?php } ?>
		<!--Uploaded Audio-->
		<?php if ($wo['config']['audio_upload'] == 1) { ?>
		<div class="publisher-hidden-option" id="music-form">
			<div class="inner-addon <?php echo lui_RightToLeft('left-addon');?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-music"><path d="M9 17H5a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm12-2h-4a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2a2 2 0 0 0 2-2z"></path><polyline points="9 17 9 5 21 3 21 15"></polyline></svg>
				<input name="musiccount" type="text" class="form-control bg_read_input" readonly>
			</div>
		</div>
		<?php } ?>
		<!--Poll Options-->
		<div id="poll-form">
			<div class="publisher-hidden-option answers">
				<input name="answer[]" type="text" class="form-control" placeholder="<?php echo $wo['lang']['answer'] ?> 1">
				<input name="answer[]" type="text" class="form-control" placeholder="<?php echo $wo['lang']['answer'] ?> 2">
			</div>
			<div class="create-poll" onclick="Wo_AddAnswer();" id="add_answer">
				<div class="create-text"><?php echo $wo['lang']['add_answer'] ?></div>
			</div>
		</div>
		<!--Create Album-->
		<div style="position:relative;">
			<div id="album-form">
				<div class="publisher-hidden-option">
					<input name="album_name" type="text" class="form-control" placeholder="<?php echo $wo['lang']['album_name'];?>">
				</div>
			</div>
			<div class="publisher-hidden-option" id="photo-form">
				<div class="inner-addon <?php echo lui_RightToLeft('left-addon');?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
					<input name="phtoscount" type="text" class="form-control bg_read_input" readonly>
				</div>
				<?php if ($wo['config']['website_mode'] != 'askfm' && $wo['config']['website_mode'] != 'instagram') { ?>
				<div class="create-album <?php echo lui_RightToLeft('pull-right');?>" onclick="Wo_OpenAlbum();">
					<div class="create-text"><?php echo $wo['lang']['create_album'];?></div>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div style="overflow-x: auto;"><div id="image-holder"></div></div>
			</div>
		</div>
		<!--Uploaded File-->
		<div class="publisher-hidden-option" id="file-form">
			<div class="inner-addon <?php echo lui_RightToLeft('left-addon');?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
				<input name="filename" type="text" class="form-control bg_read_input" readonly>
			</div>
		</div>
		<!--Set Location-->
		<div class="publisher-hidden-option" id="map-form">
			<div class="inner-addon <?php echo lui_RightToLeft('left-addon');?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
				<input name="postMap" id="searchTextField" type="text" class="form-control" placeholder="<?php echo $wo['lang']['maps_placeholder']?>">
				<?php if ($wo['config']['yandex_map'] == 1) { ?>
          <div class="yandex_search_publisher"></div>
        <?php } ?>
			</div>
		</div>
		<!--Add Emojis-->
		<div id="emo-form">
			<div class="publisher-hidden-option" style="border-top: 1px dashed #ededed;">
				<div class="feelings-type-to <?php echo lui_RightToLeft('pull-left');?> pointer" onclick="Wo_RestFeelings();"></div>
				<span class="feelings-value"></span>
				<input name="feeling" id="feelings-text" type="text" class="form-control bg_read_input" placeholder="<?php echo html_entity_decode($wo["lang"]["feel_d"])?>" onclick="Wo_ShowFeelings();" autocomplete="no">
				<input name="feeling_type" type="hidden" id="feeling-type" value="">
				<div class="clear"></div>
			</div>
			<div class="feeling-type feeling-types">
				<ul>
					<li class="pointer" onclick='Wo_ShowFeelingType("feelings", "<?php echo $wo['lang']['feeling'];?>", "<?php echo $wo['lang']['feeling_q'];?>");'>
						<svg fill="#009da0" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" class="feather feather-user-plus"><path d="M0 0h24v24H0z" fill="none"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"></path></svg> <span><?php echo $wo['lang']['feeling'];?></span>
					</li>
					<li class="pointer" onclick='Wo_ShowFeelingType("traveling", "<?php echo $wo['lang']['traveling'];?>" , "<?php echo $wo['lang']['traveling_q'];?>");'>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase" color="#3F51B5"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> <span><?php echo $wo['lang']['traveling'];?></span>
					</li>
					<li class="pointer" onclick='Wo_ShowFeelingType("watching", "<?php echo $wo['lang']['watching'];?>", "<?php echo $wo['lang']['watching_q'];?>");'>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tv" color="#E91E63"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg> <span><?php echo $wo['lang']['watching'];?></span>
					</li>
					<li class="pointer" onclick='Wo_ShowFeelingType("playing", "<?php echo $wo['lang']['playing'];?>", "<?php echo $wo['lang']['playing_q'];?>");'>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target" color="#FF9800"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> <span><?php echo $wo['lang']['playing'];?></span>
					</li>
					<li class="pointer" onclick='Wo_ShowFeelingType("listening", "<?php echo addslashes($wo['lang']['listening']);?>", "<?php echo addslashes($wo['lang']['listening_q']);?>");'>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones" color="#03A9F4"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg> <span><?php echo $wo['lang']['listening'];?></span>
					</li>
				</ul>
			</div>
			<div class="feeling-type feelings">
				<ul>
					<?php foreach ($wo['feelingIcons'] as $icon_name => $icon_code) { ?>
					<li class="pointer" onclick="Wo_AddFeeling('<?php echo $icon_name;?>', '<?php echo $wo['lang'][$icon_name]; ?>', '<?php echo $icon_code;?>');"><i class="twa-lg twa twa-<?php echo $icon_code; ?>"></i> <?php echo $wo['lang'][$icon_name]; ?></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!--Add Stickers-->
		<?php if ($wo['config']['stickers'] == 1): ?>
		<div id="gif-form">
			<div class="w100" id="publisher-box-stickers">
				<input type="text" class="form-control" style="border: none;" placeholder="<?php echo $wo['lang']['search'] ?> GIFs" onkeyup="Wo_GetPostStickers(this.value)">
				<div class="ball-pulse <?php echo lui_RightToLeft('pull-right');?>" style="margin: -33px 10px 0px 0px;"><div></div><div></div><div></div></div>
				<div id="publisher-box-stickers-cont" onscroll="GifScrolled(this)" oldWord="" loadOffset="0"></div>
			</div>
		</div>
		<?php endif ?>
		
		<div id="results"></div>
		
		<!--Progress Bar-->
		<div class="publisher-hidden-option">
			<div id="progress">
				<span id="percent" class="<?php echo lui_RightToLeft('pull-right');?>">0%</span>
				<div class="progress">
					<div id="bar" class="progress-bar progress-bar-striped active"></div> 
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<!--Publisher Box Footer-->
		<div class="sun_pub_mid_foot">
			<!--Add Post Color-->
			<?php if ($wo['config']['colored_posts_system'] == 1 && !empty($wo['post_colors']) && $wo['config']['can_use_colored_posts']) { ?>
			<div class="all_colors">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="Wo_CloseColor()"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
				<div>
				<?php foreach ($wo['post_colors'] as $key => $color) {
					if (!empty($color->color_1) && !empty($color->color_2) && !empty($color->text_color)) { ?>
						<div class="pointer all_colors_display" onclick="Wo_ChangeColor('<?php echo $color->color_1; ?>','<?php echo $color->color_2; ?>','<?php echo $color->text_color; ?>','',<?php echo $color->id; ?>)"> 
							<div class="all_colors_style" style="background-image: linear-gradient(45deg, <?php echo $color->color_1; ?> 0%, <?php echo $color->color_2; ?> 100%);"></div>
						</div>
				<?php }elseif (!empty($color->image) && !empty($color->text_color)) { ?>
					<div class="pointer all_colors_display" onclick="Wo_ChangeColor('','','<?php echo $color->text_color; ?>','<?php echo lui_GetMedia($color->image); ?>',<?php echo $color->id; ?>)"> 
						<div class="all_colors_style_image" style="background-image:url('<?php echo lui_GetMedia($color->image); ?>');"></div>
					</div>
				<?php } ?>
				<?php } ?>
				</div>
				<input type="hidden" name="post_color" id="post_color_input">
			</div>
			<?php } ?>
			<!--Uploaded Image-->
			<div class="poster-left-buttons" onclick="Wo_ShowPosInfo();">
				<span class="btn btn-file img">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4db3f6" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg> <?php echo $wo['lang']['upload_images']; ?>
					<input type="file" id="publisher-photos" accept="image/x-png, image/gif, image/jpeg" name="postPhotos[]" multiple="multiple">
				</span>
			</div>
			<?php if ($wo['config']['website_mode'] == 'linkedin' && empty($wo['page_profile']) && ($wo['page'] == 'timeline' || $wo['page'] == 'home')) { ?>
				<div class="poster-left-buttons" onclick="OpenLinkedinJobModal()">
					<span class="btn btn-file">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> <?php echo $wo['lang']['create_job']; ?>
					</span>
				</div>
			<?php } else { ?>
				<?php if ($wo['config']['post_poll'] == 1) { ?>
				<!--Create Poll-->
				<div class="poster-left-buttons" onclick="Wo_ShowPosInfo();">
					<span class="btn btn-file poll-form pol">
						<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="#31a38c" d="M17,17H15V13H17M13,17H11V7H13M9,17H7V10H9M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" /></svg> <?php echo $wo['lang']['create_poll']; ?>
					</span>
				</div>
				<?php } ?>
			<?php } ?>
			<?php if ($wo['config']['website_mode'] != 'askfm') { ?>
			<!--Uploaded Video-->
			<?php if ($wo['config']['video_upload'] == 1) { ?>
				<div class="poster-left-buttons" onclick="Wo_ShowPosInfo();">
					<span class="btn btn-file vid">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path fill="#71a257" d="M450.6 153.6c-3.3 0-6.5.9-9.3 2.7l-86.5 54.6c-2.5 1.6-4 4.3-4 7.2v76c0 2.9 1.5 5.6 4 7.2l86.5 54.6c2.8 1.7 6 2.7 9.3 2.7h20.8c4.8 0 8.6-3.8 8.6-8.5v-188c0-4.7-3.9-8.5-8.6-8.5h-20.8zM273.5 384h-190C55.2 384 32 360.8 32 332.6V179.4c0-28.3 23.2-51.4 51.4-51.4h190c28.3 0 51.4 23.2 51.4 51.4v153.1c.1 28.3-23 51.5-51.3 51.5z"/></svg> <?php echo $wo['lang']['upload_video']; ?>
						<input type="file" id="publisher-video" name="postVideo" accept="<?php echo($wo['config']['ffmpeg_system'] == 'on' ? '*/*' : 'video/*') ?>">
					</span>
				</div>
			<?php } ?>
			
			<div class="poster-left-buttons" onclick="Wo_ShowPosInfo();">
				<span class="btn mor">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <span><?php echo $wo['lang']['more']; ?></span>
				</span>
			</div>
			<?php } ?>
		</div>
		
		
		<!--Publisher Box Footer-->
		<div class="publisher-box-footer">
			<div class="sun_pub_more">
			
			<?php if ($wo['config']['website_mode'] == 'linkedin' && empty($wo['page_profile']) && ($wo['page'] == 'timeline' || $wo['page'] == 'home')) { ?>

				<?php if ($wo['config']['post_poll'] == 1) { ?>
				<!--Create Poll-->
				<div class="sun_pub_more_items">
				<div class="poster-left-buttons" onclick="Wo_ShowPosInfo();">
					<span class="btn btn-file poll-form pol">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="#31a38c" d="M17,17H15V13H17M13,17H11V7H13M9,17H7V10H9M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" /></svg></span> <?php echo $wo['lang']['create_poll']; ?>
					</span>
				</div>
				</div>
				<?php } ?>
			<?php } ?>
			<!--Add GIFs-->
			<?php if ($wo['config']['stickers'] == 1): ?>
			<div class="sun_pub_more_items gif-form">
				<div class="poster-left-buttons">
					<span class="btn btn-file btngif gif" style="padding: 0px;">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg></span> <?php echo $wo['lang']['gif']; ?>
					</span>
				</div>
			</div>
			<?php endif ?>
			<!--Record Audio-->
			<?php if ($wo['config']['audio_upload'] == 1) { ?>
			<div class="sun_pub_more_items" id="recordPostAudioWrapper">
				<div class="poster-left-buttons">
					<span class="btn btn-file rec">
						<span id="recordPostAudio" data-record="0"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="#ff3a55" d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z" /></svg></span> <?php echo $wo['lang']['record_voice']; ?>
					</span>
					<span id="postRecordingTime" class="hidden">00:00</span>
				</div>
			</div>
			<?php } ?>
			<?php if ($wo['config']['post_feelings'] == 1) { ?>
			<!--Add Feeling-->
			<div class="sun_pub_more_items emo-form">
				<div class="poster-left-buttons">
					<span class="btn btn-file fel">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="#f3c038" d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M8.5,8C9.328,8,10,8.896,10,10	s-0.672,2-1.5,2S7,11.104,7,10S7.672,8,8.5,8z M12,18c-1.905,0-3.654-0.874-4.8-2.399l1.599-1.201C9.563,15.417,10.73,16,12,16	c1.27,0,2.436-0.583,3.2-1.601l1.6,1.201C15.653,17.126,13.904,18,12,18z M15.5,12c-0.828,0-1.5-0.896-1.5-2s0.672-2,1.5-2	S17,8.896,17,10S16.328,12,15.5,12z" /></svg></span>
						<?php echo $wo['lang']['feelings']; ?>
					</span>
				</div>
			</div>
			<?php } ?>
			<!--Uploaded File-->
			<?php if($wo['config']['fileSharing'] == 1) { ?>
			<div class="sun_pub_more_items">
				<div class="poster-left-buttons">
					<span class="btn btn-file fil">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path fill="#6bcfef" d="M312 155h91c2.8 0 5-2.2 5-5 0-8.9-3.9-17.3-10.7-22.9L321 63.5c-5.8-4.8-13-7.4-20.6-7.4-4.1 0-7.4 3.3-7.4 7.4V136c0 10.5 8.5 19 19 19z"/><path fill="#6bcfef" d="M267 136V56H136c-17.6 0-32 14.4-32 32v336c0 17.6 14.4 32 32 32h240c17.6 0 32-14.4 32-32V181h-96c-24.8 0-45-20.2-45-45z"/></svg></span> <?php echo $wo['lang']['upload_files']; ?>
						<input type="file" id="publisher-file" name="postFile">
					</span>
				</div>
			</div>
			<?php } ?>

			<!--Create Product-->
			<?php if ($wo['page'] != 'group' && $wo['config']['classified'] == 1 && $wo['config']['can_use_market']) { ?>
			<div class="sun_pub_more_items">
				<div class="poster-left-buttons">
					<a href="#" data-toggle="modal" data-target="#create-product-modal" class="btn btn-file sel">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="#f07729" d="M3.572,5.572l4.506,10.813C8.233,16.757,8.597,17,9.001,17H18c0.417,0,0.79-0.259,0.937-0.648l3-8 c0.115-0.308,0.072-0.651-0.114-0.921C21.635,7.161,21.328,7,21,7H6.333L4.923,3.615C4.768,3.243,4.404,3,4,3H2v2h1L3.572,5.572z"/><circle fill="#f07729" cx="10.5" cy="20.5" r="1.5"/><circle fill="#f07729" cx="16.438" cy="20.5" r="1.5"/></svg></span> <?php echo $wo['lang']['sell_product']; ?>
					</a>
				</div>
			</div>
			<?php } ?>
			<!--Add Color-->
			<?php if ($wo['config']['colored_posts_system'] == 1 && !empty($wo['post_colors']) && $wo['config']['can_use_colored_posts']) { ?>
			<div class="sun_pub_more_items" onclick="Wo_ShowColors()">
				<div class="poster-left-buttons">
					<span class="btn btn-file" style="padding: 0px;">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#673ab7" d="M17.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,9A1.5,1.5 0 0,1 19,10.5A1.5,1.5 0 0,1 17.5,12M14.5,8A1.5,1.5 0 0,1 13,6.5A1.5,1.5 0 0,1 14.5,5A1.5,1.5 0 0,1 16,6.5A1.5,1.5 0 0,1 14.5,8M9.5,8A1.5,1.5 0 0,1 8,6.5A1.5,1.5 0 0,1 9.5,5A1.5,1.5 0 0,1 11,6.5A1.5,1.5 0 0,1 9.5,8M6.5,12A1.5,1.5 0 0,1 5,10.5A1.5,1.5 0 0,1 6.5,9A1.5,1.5 0 0,1 8,10.5A1.5,1.5 0 0,1 6.5,12M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A1.5,1.5 0 0,0 13.5,19.5C13.5,19.11 13.35,18.76 13.11,18.5C12.88,18.23 12.73,17.88 12.73,17.5A1.5,1.5 0 0,1 14.23,16H16A5,5 0 0,0 21,11C21,6.58 16.97,3 12,3Z" /></svg></span> <?php echo $wo['lang']['color']; ?>
					</span>
				</div>
			</div>
			<?php } ?>
			<?php if ($wo['config']['post_location'] == 1) { ?>
			<!--Add Location-->
			<div class="sun_pub_more_items">
				<div class="poster-left-buttons">
					<span class="btn btn-file map-form loc">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="#f35369" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg></span> <?php echo $wo['lang']['location']; ?>
					</span>
				</div>
			</div>
			<?php } ?>
			<!--Uploaded Music-->
			<?php if ($wo['config']['audio_upload'] == 1) { ?>
			<div class="sun_pub_more_items">
				<div class="poster-left-buttons">
					<span class="btn btn-file aud">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="#4db3f6" d="M16,9V7H12V12.5C11.58,12.19 11.07,12 10.5,12A2.5,2.5 0 0,0 8,14.5A2.5,2.5 0 0,0 10.5,17A2.5,2.5 0 0,0 13,14.5V9H16M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2Z" /></svg></span> <?php echo $wo['lang']['audio_upload']; ?>
						<input type="file" id="publisher-music" name="postMusic" accept="audio/*">
					</span>
				</div>
			</div>
			<?php } ?>
			</div>
      <?php if ($wo['config']['website_mode'] == 'askfm' && $wo['config']['shout_box_system'] == 1 && $wo['config']['can_use_shout_box']) { ?>
    	<div class="w_ask_anonymously">
    		<div class="w-float-left">
	          <label for="ask_anonymously" class="w-main-label"><?php echo $wo['lang']['ask_anonymously']; ?></label>
	      </div>
	      <div class="form-group w-float-left w-switcher">
	          <input type="hidden" name="ask_anonymously" value="0" />
	          <input type="checkbox" name="postPrivacy" id="chck-ask_anonymously" value="4">
	          <label for="chck-ask_anonymously" class="w-check-trail"><span class="w-check-handler"></span></label>
	      </div>
	      <div class="clearfix"></div>
    	</div>
      <?php } ?>

		 <div class="pub-footer-bottom">
			<div class="<?php echo lui_RightToLeft('pull-right');?>">
				<?php if ($wo['config']['live_video'] == 1 && ($wo['config']['millicast_live_video'] == 1 || $wo['config']['agora_live_video'] == 1) && $wo['config']['can_use_live']) { ?>
					<a class="btn btn-default btn-mat btn-go-live" onclick="$('body').removeClass('pub-focus');" href="<?php echo($wo['config']['site_url']) ?>/live" data-ajax="?link1=live"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z" /></svg> <?php echo $wo['lang']['live']; ?></a>
				<?php } ?>
				<button type="button" onclick="Wo_GetPRecordLink($('#postRecord'))" id="publisher-button" class="btn btn-main btn-mat add_wow_loader">
					<span><?php echo TextForMode('share'); ?></span>
				</button>
			</div>
			
			<div class="<?php echo lui_RightToLeft('pull-right');?>"><div class="ball-pulse"><div></div><div></div><div></div></div></div>
			
			<div id="status"></div>
			<?php if ($wo['config']['website_mode'] != 'askfm') { ?>
			<?php if (!isset($wo['input']['recipient']) && $wo['page'] != 'group') { ?>
			<div class="<?php echo lui_RightToLeft('pull-left');?>">
				<div class="poster-left-select">
					<div class="publisher-hidden-option inputsm">
						<?php $postprivacyCookie = (!empty($_COOKIE['post_privacy'])) ? $_COOKIE['post_privacy'] : 0;?>
						<div class="sun_pub_privacy">
							<div class="sun_pub_privacy_dropdown">
								<?php  if (empty($wo['page_profile'])) {?>
									<?php if ($postprivacyCookie == 3) {?>
										<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" /></svg> <?php echo $wo['lang']['only_me'];?></p>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
									<?php } ?>
									<?php if ($postprivacyCookie == 0) {?>
										<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['everyone'];?></p>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
									<?php } ?>
									<?php if ($postprivacyCookie == 4) {?>
										<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,3C9.31,3 7.41,4.22 7.41,4.22L6,9H18L16.59,4.22C16.59,4.22 14.69,3 12,3M12,11C9.27,11 5.39,11.54 5.13,11.59C4.09,11.87 3.25,12.15 2.59,12.41C1.58,12.75 1,13 1,13H23C23,13 22.42,12.75 21.41,12.41C20.75,12.15 19.89,11.87 18.84,11.59C18.84,11.59 14.82,11 12,11M7.5,14A3.5,3.5 0 0,0 4,17.5A3.5,3.5 0 0,0 7.5,21A3.5,3.5 0 0,0 11,17.5C11,17.34 11,17.18 10.97,17.03C11.29,16.96 11.63,16.9 12,16.91C12.37,16.91 12.71,16.96 13.03,17.03C13,17.18 13,17.34 13,17.5A3.5,3.5 0 0,0 16.5,21A3.5,3.5 0 0,0 20,17.5A3.5,3.5 0 0,0 16.5,14C15.03,14 13.77,14.9 13.25,16.19C12.93,16.09 12.55,16 12,16C11.45,16 11.07,16.09 10.75,16.19C10.23,14.9 8.97,14 7.5,14M7.5,15A2.5,2.5 0 0,1 10,17.5A2.5,2.5 0 0,1 7.5,20A2.5,2.5 0 0,1 5,17.5A2.5,2.5 0 0,1 7.5,15M16.5,15A2.5,2.5 0 0,1 19,17.5A2.5,2.5 0 0,1 16.5,20A2.5,2.5 0 0,1 14,17.5A2.5,2.5 0 0,1 16.5,15Z" /></svg> <?php echo $wo['lang']['anonymous'];?></p>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
									<?php } ?>
									<?php if ($postprivacyCookie == 5 && $wo['config']['website_mode'] == 'patreon') {?>
											<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> <?php echo $wo['lang']['patrons'];?></p>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
										<?php } ?>
										<?php if ($postprivacyCookie == 5 && $wo['config']['website_mode'] == 'linkedin') {?>
											<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> <?php echo $wo['lang']['hiring'];?></p>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
										<?php } ?>

									<?php if ($wo['config']['connectivitySystem'] == 0) { ?>
										<?php if ($postprivacyCookie == 1) {?>
											<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg> <?php echo $wo['lang']['people_i_follow'];?></p>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
										<?php } ?>
										<?php if ($postprivacyCookie == 2) {?>
											<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['people_follow_me'];?></p>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
										<?php } ?>
										
									<?php } else {?>
										<?php if ($postprivacyCookie == 1) {?>
											<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['my_friends'];?></p>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
										<?php } ?>
									<?php }?>
								<?php } else {?>
										<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['everyone'];?></p>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
								<?php } ?>
							</div>
							<ul class="sun_pub_privacy_menu">
								<?php if (empty($wo['page_profile'])) {?>
									<li>
										<label>
											<input type="radio" class="option-input radio" name="postPrivacy" id="3" value="3" <?php echo ($postprivacyCookie == 3) ? ' checked': ''?>>
											<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" /></svg> <?php echo $wo['lang']['only_me'];?></span>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" class="option-input radio" name="postPrivacy" id="0" value="0" <?php echo ($postprivacyCookie == 0) ? ' checked': ''?>>
											<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['everyone'];?></span>
										</label>
									</li>
									<?php if ($wo['config']['connectivitySystem'] == 0) { ?>
										<li>
											<label>
												<input type="radio" class="option-input radio" name="postPrivacy" id="1" value="1" <?php echo ($postprivacyCookie == 1) ? ' checked': ''?>>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg> <?php echo $wo['lang']['people_i_follow'];?></span>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" class="option-input radio" name="postPrivacy" id="2" value="2" <?php echo ($postprivacyCookie == 2) ? ' checked': ''?>>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['people_follow_me'];?></span>
											</label>
										</li>
									<?php } else {?>
										<li>
											<label>
												<input type="radio" class="option-input radio" name="postPrivacy" id="1" value="1" <?php echo ($postprivacyCookie == 1) ? ' checked': ''?>>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['my_friends'];?></span>
											</label>
										</li>
									<?php }?>
									<?php if ($wo['config']['shout_box_system'] == 1 && $wo['config']['can_use_shout_box']) { ?>
										<li>
											<label>
												<input type="radio" class="option-input radio" name="postPrivacy" id="4" value="4" <?php echo ($postprivacyCookie == 4) ? ' checked': ''?>>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,3C9.31,3 7.41,4.22 7.41,4.22L6,9H18L16.59,4.22C16.59,4.22 14.69,3 12,3M12,11C9.27,11 5.39,11.54 5.13,11.59C4.09,11.87 3.25,12.15 2.59,12.41C1.58,12.75 1,13 1,13H23C23,13 22.42,12.75 21.41,12.41C20.75,12.15 19.89,11.87 18.84,11.59C18.84,11.59 14.82,11 12,11M7.5,14A3.5,3.5 0 0,0 4,17.5A3.5,3.5 0 0,0 7.5,21A3.5,3.5 0 0,0 11,17.5C11,17.34 11,17.18 10.97,17.03C11.29,16.96 11.63,16.9 12,16.91C12.37,16.91 12.71,16.96 13.03,17.03C13,17.18 13,17.34 13,17.5A3.5,3.5 0 0,0 16.5,21A3.5,3.5 0 0,0 20,17.5A3.5,3.5 0 0,0 16.5,14C15.03,14 13.77,14.9 13.25,16.19C12.93,16.09 12.55,16 12,16C11.45,16 11.07,16.09 10.75,16.19C10.23,14.9 8.97,14 7.5,14M7.5,15A2.5,2.5 0 0,1 10,17.5A2.5,2.5 0 0,1 7.5,20A2.5,2.5 0 0,1 5,17.5A2.5,2.5 0 0,1 7.5,15M16.5,15A2.5,2.5 0 0,1 19,17.5A2.5,2.5 0 0,1 16.5,20A2.5,2.5 0 0,1 14,17.5A2.5,2.5 0 0,1 16.5,15Z" /></svg> <?php echo $wo['lang']['anonymous'];?></span>
											</label>
										</li>
									<?php } ?>
									<?php if ($wo['config']['website_mode'] == 'patreon') { ?>
										<li>
											<label>
												<input type="radio" class="option-input radio" name="postPrivacy" id="5" value="5" <?php echo ($postprivacyCookie == 5) ? ' checked': ''?>>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> <?php echo $wo['lang']['patrons'];?></span>
											</label>
										</li>
									<?php } ?>
									<?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
										<li>
											<label>
												<input type="radio" class="option-input radio" name="postPrivacy" id="5" value="5" <?php echo ($postprivacyCookie == 5) ? ' checked': ''?>>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> <?php echo $wo['lang']['hiring'];?></span>
											</label>
										</li>
									<?php } ?>
								<?php } else { ?>
									<li>
										<label>
											<input type="radio" class="option-input radio" name="postPrivacy" id="0" value="0">
											<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['everyone'];?></span>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" class="option-input radio" name="postPrivacy" id="2" value="2">
											<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z" /></svg> <?php echo $wo['lang']['liked_my_page'];?></span>
										</label>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php } ?>
			
			<div class="<?php echo lui_RightToLeft('pull-left');?> charsLeft-post"><span id="charsLeft"></span></div>
			
			<div class="clear"></div>
			<div class="w_search_for" style="display: none;">
				<div class="clearfix"></div>
				<br>
				<div class="form-group inner-addon left-addon ">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search glyphicon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					<input type="text" class="form-control search-input" onkeyup="SearchForFriends(this.value)" placeholder="<?php echo $wo['lang']['search_for_friends'];?>" dir="auto">
					<input type="hidden" name="parts" id="w_search_users">
					<span class="input-group-addon" id="w_search_mbrs">0</span>
					<div class="w_search_for_users"></div>
				</div>
			</div>
		 </div>
      </div>
   </div>
   <?php if (isset($wo['input']['recipient'])) { ?>
   <input type="hidden" name="recipient_id" value="<?php echo $wo['user_profile']['user_id']; ?>">
   <?php } ?>
   <?php if ($wo['page'] == 'page') {?>
   <input type="hidden" name="page_id" value="<?php echo $wo['page_profile']['page_id']; ?>">
   <?php } else if ($wo['page'] == 'group') {?>
   <input type="hidden" name="group_id" value="<?php echo $wo['group_profile']['id']; ?>">
   <?php } else if ($wo['page'] == 'events') { ?>
   <input type="hidden" name="event_id" value="<?php echo $wo['event']['id']; ?>">
   <?php } ?>
   <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   <input type="hidden" name="postRecord" value="" id="postRecord">
   <input type="hidden" name="postSticker" value="" id="postSticker" onchange="alert(this.value)">
</form>
<div id="hidden_inputbox"></div>
<?php echo lui_LoadPage('products/create'); ?>
<?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
<div class="modal fade sun_modal" id="create_hiring_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
        <h4 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> <?php echo $wo['lang']['create_job'] ?></h4>
      </div>
      <form class="create-hiring-form form-horizontal" method="post">
        <div class="modal-body">
          <div class="app-general-alert setting-update-alert"></div>
          <div class="clear"></div>
          <div class="setting-panel row hiring-setting-panel">
              <!-- Text input-->
              <div class="col-lg-6">
                <div class="sun_input">
                  <input id="hiring_title" name="job_title" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['job_title'] ?>" value="">
                  <label for="job_title"><?php echo $wo['lang']['job_title'] ?></label>  
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sun_input">
                  <input id="location" name="location" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['location'] ?>" value="<?php echo $wo['user']['address'];?>">
                  <label for="location"><?php echo $wo['lang']['location'] ?></label>  
                </div>
              </div>
              <div class="col-lg-12 no-padding-right">
                <div><?php echo $wo['lang']['salary_range'] ?></div>
                <div class="col-md-3 no-padding-right">
                  <div class="sun_input">
                    <input id="minimum" name="minimum" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['minimum'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <label for="minimum"><?php echo $wo['lang']['minimum'] ?></label>  
                  </div>
                </div>
                <div class="col-md-1 no-padding-right">
                  <br>
                  <?php echo $wo['lang']['to'] ?>
                </div>
                <div class="col-md-3 no-padding-right">
                  <div class="sun_input">
                    <input id="maximum" name="maximum" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['maximum'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <label for="maximum"><?php echo $wo['lang']['maximum'] ?></label>
                  </div>
                </div>
                <div class="col-md-2 no-padding-right">
                  <div class="sun_input">
                    <select id="currency" name="currency" class="form-control input-md">
                      <?php foreach ($wo['currencies'] as $key => $currency) { ?>
                      <option value="<?php echo $key; ?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 no-padding-right">
                  <div class="sun_input">
                    <select id="salary_date" name="salary_date" class="form-control input-md">
                      <option value="per_hour"><?php echo $wo['lang']['per_hour'] ?></option>
                      <option value="per_day"><?php echo $wo['lang']['per_day'] ?></option>
                      <option value="per_week"><?php echo $wo['lang']['per_week'] ?></option>
                      <option value="per_month"><?php echo $wo['lang']['per_month'] ?></option>
                      <option value="per_year"><?php echo $wo['lang']['per_year'] ?></option>
                    </select>
                  </div>
                </div>
                
              </div>

              <div class="col-lg-6">
                <div class="sun_input">
                  <select id="job_type" name="job_type" class="form-control input-md">
                    <option value="full_time"><?php echo $wo['lang']['full_time'] ?></option>
                    <option value="part_time"><?php echo $wo['lang']['part_time'] ?></option>
                    <option value="internship"><?php echo $wo['lang']['internship'] ?></option>
                    <option value="volunteer"><?php echo $wo['lang']['volunteer'] ?></option>
                    <option value="contract"><?php echo $wo['lang']['contract'] ?></option>
                  </select>
                  <label for="job_type"><?php echo $wo['lang']['job_type'] ?></label> 
                </div>
              </div>

              <div class="col-lg-6">
                <div class="sun_input">
                  <select class="form-control" name="category" id="category">
                    <?php foreach ($wo['job_categories'] as $category_id => $category_name) {?>
                    <option value="<?php echo $category_id?>"><?php echo $category_name; ?></option>
                    <?php } ?>
                  </select>
                  <label for="category"><?php echo $wo['lang']['category'] ?></label>  
                </div>
              </div>
              <div class="col-lg-12">
                <label><?php echo $wo['lang']['questions'] ?></label>
                <div class="sun_input">
                  <a href="javascript:void(0)" id="add_new_question_"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> <?php echo $wo['lang']['add_question']; ?></a>
                  <div class="modal-header">
                    <div id="question_one_parent_"></div>
                    <div id="question_two_parent_"></div>
                    <div id="question_three_parent_"></div>
                  </div>
                  
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sun_input">
                  <textarea class="form-control" name="description" rows="3" id="description" placeholder="<?php echo $wo['lang']['description'] ?>"></textarea>
                  <label for="description"><?php echo $wo['lang']['description'] ?></label>  
                  <span class="help-block"><?php echo $wo['lang']['job_des_text'] ?></span> 
                </div>
              </div>
              <div class="form-group th-alert col-lg-12">
                <div class="col-md-12">
                  <label for="job_add_iamge"><?php echo $wo['lang']['job_add_iamge'] ?></label> 
                  <div class="clear"></div> 
                  <br>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-main form-control" id="use_upload_photo_"><?php echo $wo['lang']['browse_to_upload'] ?></button>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-main form-control" id="use_cover_photo_"><?php echo $wo['lang']['use_cover_photo'] ?></button>
                  </div>
                  <div class="clear"></div>
                  <br>
                  <div class="main prv-img pointer" id="select-img-job" data-block="thumdrop-zone">
                    <div class="thumbnail-rendderer">
                      <img src="<?php echo(!empty($wo['user_profile']) ? $wo['user_profile']['cover'] : (!empty($wo['user']) ? $wo['user']['cover'] : '')) ?>">
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="publisher-hidden-option">
              <div id="progress" class="create-product-progress">
                <span id="percent" class="create-product-percent_ <?php echo lui_RightToLeft('pull-right');?>">0%</span>
                <div class="progress">
                  <div id="bar" class="progress-bar active create-product-bar_"></div> 
                </div>
                <div class="clear"></div>
              </div>
            </div>

          <input type="file" class="hidden" id="thumbnail_job" name="thumbnail" accept="image/*">
          <input type="text" class="hidden" id="image_type_" name="image_type" value="cover">
          <input type="hidden" name="lat" id="lat-job" class="form-control input-md" value="">
          <input type="hidden" name="lng" id="lng-job" class="form-control input-md" value="">
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
        </div>
        <div class="form-group last-sett-btn modal-footer">
          <div class="ball-pulse"><div></div><div></div><div></div></div>
          <button type="submit" class="btn btn-main setting-panel-mdbtn"><?php echo $wo['lang']['publish'] ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<script type="text/javascript">
<?php if ($wo['config']['website_mode'] == 'linkedin' && empty($wo['page_profile']) && ($wo['page'] == 'timeline' || $wo['page'] == 'home')) { ?>
function OpenLinkedinJobModal(){
	$('#create_hiring_modal').modal('show');
}
var question_one = '<div id="question_one_block_"><span><?php echo $wo['lang']['question_one'] ?></span><button type="button" class="close" onclick="HideQuestion_(\'one\')"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button><select class="form-control" name="question_one_type" id="question_one_type_"><option value="free_text_question"><?php echo $wo['lang']['free_text_question'] ?></option><option value="yes_no_question"><?php echo $wo['lang']['yes_no_question'] ?></option><option value="multiple_choice_question"><?php echo $wo['lang']['multiple_choice_question'] ?></option></select><br><textarea class="form-control" name="question_one" rows="3" id="question_one_"></textarea><div id="question_one_answers_div_" style="display: none;"><br><input class="form-control" type="text" name="question_one_answers" id="question_one_answers_" placeholder="<?php echo $wo['lang']['add_an_answers'] ?>"></div></div>';
var question_two = '<div id="question_two_block_"><hr><span><?php echo $wo['lang']['question_two'] ?></span><button type="button" class="close" onclick="HideQuestion_(\'two\')"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button><select class="form-control" name="question_two_type" id="question_two_type_"><option value="free_text_question"><?php echo $wo['lang']['free_text_question'] ?></option><option value="yes_no_question"><?php echo $wo['lang']['yes_no_question'] ?></option><option value="multiple_choice_question"><?php echo $wo['lang']['multiple_choice_question'] ?></option></select><br><textarea class="form-control" name="question_two" rows="3" id="question_two_"></textarea><div id="question_two_answers_div_" style="display: none;"><br><input class="form-control" type="text" name="question_two_answers" id="question_two_answers_" placeholder="<?php echo $wo['lang']['add_an_answers'] ?>"></div></div>';

var question_three = '<div id="question_three_block_"><hr><span><?php echo $wo['lang']['question_three'] ?></span><button type="button" class="close" onclick="HideQuestion_(\'three\')"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button><select class="form-control" name="question_three_type" id="question_three_type_"><option value="free_text_question"><?php echo $wo['lang']['free_text_question'] ?></option><option value="yes_no_question"><?php echo $wo['lang']['yes_no_question'] ?></option><option value="multiple_choice_question"><?php echo $wo['lang']['multiple_choice_question'] ?></option></select><br><textarea class="form-control" name="question_three" rows="3" id="question_three_"></textarea><div id="question_three_answers_div_" style="display: none;"><br><input class="form-control" type="text" name="question_three_answers" id="question_three_answers_" placeholder="<?php echo $wo['lang']['add_an_answers'] ?>"></div></div>';


function HideQuestion_(type) {
	$('#question_'+type+'_block_').remove();
	$('#add_new_question_').css('display', 'block');
}
$(document).ready(function() {
	$('#add_new_question_').click(function(event) {
			if ($('#question_one_block_').is(":visible")) {
				if ($('#question_two_block_').is(":visible")) {
					if ($('#question_three_block_').is(":visible")) {
						$(this).css('display', 'none');
					}
					else{
						$('#question_three_parent_').html(question_three);
						setTimeout(function (argument) {
							$("#question_three_answers_").tagsinput({
						      maxTags: 10,
						    });
						},1000);
					}
				}
				else{
					$('#question_two_parent_').html(question_two);
					setTimeout(function (argument) {
						$("#question_two_answers_").tagsinput({
					      maxTags: 10,
					    });
					},1000);
				}
			}
			else{
				$('#question_one_parent_').html(question_one);
				setTimeout(function (argument) {
					$("#question_one_answers_").tagsinput({
				      maxTags: 10,
				    });
				},1000);
			}
		});
		$(document).on('change', '#question_one_type_', function(event) {
	    	if ($(this).val() == 'multiple_choice_question') {
		      	$('#question_one_answers_div_').css('display', 'block');
		      }
		      else{
		      	$('#question_one_answers_div_').css('display', 'none');
		      }
	   });

	   $(document).on('change', '#question_two_type_', function(event) {
	    	if ($(this).val() == 'multiple_choice_question') {
		      	$('#question_two_answers_div_').css('display', 'block');
		      }
		      else{
		      	$('#question_two_answers_div_').css('display', 'none');
		      }
	   });

	   $(document).on('change', '#question_three_type_', function(event) {
	    	if ($(this).val() == 'multiple_choice_question') {
		      	$('#question_three_answers_div_').css('display', 'block');
		      }
		      else{
		      	$('#question_three_answers_div_').css('display', 'none');
		      }
	   });
	   $("#select-img-job").click(function(event) {
	      $("#thumbnail_job").click()
	   });

	   $("#use_upload_photo_").click(function(event) {
	      $("#thumbnail_job").click()
	   });

	   $("#thumbnail_job").change(function(event) {
	      $('#create_hiring_modal').find(".prv-img").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
	      $('#image_type_').val('upload');
	   });

	   $("#use_cover_photo_").click(function(event) {
	      $('#create_hiring_modal').find(".prv-img").html("<img src='<?php echo(!empty($wo['user_profile']) ? $wo['user_profile']['cover'] : (!empty($wo['user']) ? $wo['user']['cover'] : '')) ?>' alt='Picture'>");
	      $('#image_type_').val('cover');
	   });

	   var create_bar = $('.create-product-bar_');
	   var create_percent = $('.create-product-percent_');

	   $('form.create-hiring-form').ajaxForm({
	        url: Wo_Ajax_Requests_File() + '?f=job&s=create_job',
	        beforeSend: function() {
	         var percentVal = '0%';
	         create_bar.width(percentVal);
	         create_percent.html(percentVal);
	        },
	        uploadProgress: function (event, position, total, percentComplete) {
	           var percentVal = percentComplete + '%';
	           create_bar.width(percentVal);
	           $('.create-product-progress').slideDown(200);
	           create_percent.html(percentVal);
	        },
	        success: function(data) {
	         if (data.status == 200) {
	           $('.app-general-alert').html("<div class='alert alert-success'><?php echo($wo['lang']['job_successfully_created']) ?></div>");
		       $('.app-general-alert').find('.alert-success').fadeIn(300);
		       setTimeout(function (argument) {
		        $('.app-general-alert').find('.alert-success').fadeOut(300);
		        window.location.reload(true);

		       },3000);
	         } else {
	         	$('#create-job-modal').animate({
			        scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
			    });
	             $('.app-general-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
	             $('.app-general-alert').find('.alert-danger').fadeIn(300);
	             setTimeout(function (argument) {
	             	$('.app-general-alert').find('.alert-danger').fadeOut(300);
	             },3000);
	         }
	        }
	   });
});
<?php } ?>
function Wo_ChangeColor(color_1,color_2,text_color,image,id) {
	if (color_1 != '' && color_2 != '' && text_color != '' && id) {
		$('.wo_pub_txtara_combo').css("cssText", "background-image: linear-gradient(45deg, "+color_1+" 0%, "+color_2+" 100%) !important;color: "+text_color+" !important");
		$('#post_color_input').val(id);
		$('.post.publisher-box').addClass('wo_pub_change_color');
	}
	else if(text_color != '' && image != '' && id){
		$('.wo_pub_txtara_combo').css("cssText", "background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;background-image:url('"+image+"') !important;color: "+text_color+" !important");
		$('#post_color_input').val(id);
		$('.post.publisher-box').addClass('wo_pub_change_color');
	};
}
function Wo_ShowColors() {
	if ($('.all_colors').is(":visible")) {
		$('.all_colors').hide();
		$('#post_color_input').val("");
		$('.post.publisher-box').removeClass('wo_pub_change_color');
	}
	else{
		$('.all_colors').show();
	}
}
function Wo_CloseColor() {
	$('.all_colors').hide();
	$('.wo_pub_txtara_combo').css("cssText", "");
	$('#post_color_input').val("");
	$('.post.publisher-box').removeClass('wo_pub_change_color');
	$(".all_colors_display").removeClass('selected');
}

$(document).ready(function(){
	$(".sun_pub_privacy_dropdown").click(function(){
		$(".sun_pub_privacy").toggleClass("showMenu");
		$(".sun_pub_privacy_menu > li").click(function(){
			$(".sun_pub_privacy_dropdown > p").html($(this).find('span').html());
			$(".sun_pub_privacy").removeClass("showMenu");
		});
	});
});

jQuery(document).click(function(event){
    if (!(jQuery(event.target).closest(".sun_pub_privacy").length)) {
        jQuery('.sun_pub_privacy').removeClass('showMenu');
    }
});
var imgArray = [];
var deleted_images = [];
function DeleteImageById(name,id) {
	$('#image_to_'+id).remove();
	imgArray.splice(id, 1);
	var image_holder = $("#image-holder");
	image_holder.empty();

	for (var i = 0; i < imgArray.length; i++){

		var reader = new FileReader();
		var ii = 0;
		reader.onload = function (e) {
			name = "'"+imgArray[ii].name+"'";
		  image_holder.append('<span class="thumb-image-delete" id="image_to_'+ii+'"><span onclick="DeleteImageById('+name+','+ii+')" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+e.target.result+'" class="thumb-image"></span>')
		  ii = ii +1;

		}
		image_holder.show();
    reader.readAsDataURL(imgArray[i]);
	}
	$("#publisher-photos")[0].files = new FileListItems(imgArray);
	if ($('.add_more_images').length == 0) {
		image_holder.prepend('<span class="wow_prod_imgs add_more_images"><div class="upload-product-image" onclick="document.getElementById(\'publisher-photos\').click(); return false"><div class="upload-image-content"><svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg></div></div></span>')
	}
}

function FileListItems (files) {
  var b = new ClipboardEvent("").clipboardData || new DataTransfer()
  for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
  return b.files
}
$(document).ready(function() {
	$("textarea.postText").keyup(function(){
		if($(this).val().length > 180){
			$('.all_colors').hide();
			$('.wo_pub_txtara_combo').css("cssText", "");
			$('#post_color_input').val("");
			$('.post.publisher-box').removeClass('wo_pub_change_color');
			$(".all_colors_display").removeClass('selected');
		}
		else {
			
		}
	});
	
	$(".all_colors_display").click(function() {
		$(".all_colors_display").removeClass('selected');
		$(this).addClass('selected');
	});
	
	$("#publisher-photos").on('change', function(e) {
		$('#postSticker').val('');
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		var image_holder = $("#image-holder");
		var countFiles = $(this)[0].files.length;
		let self = this;

		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof(FileReader) != "undefined") {
				for (var i = 0; i < countFiles; i++){

					var reader = new FileReader();
					
					imgArray.push($(self)[0].files[i]);
					if ($("#image-holder .thumb-image-delete").length == 0) {
						var ii = 0;
					}
					else{
						var ii = $("#image-holder .thumb-image-delete").length;
					}
					
					reader.onload = function (e) {
						name = "'"+$(self)[0].files[ii].name+"'";
					  image_holder.append('<span class="thumb-image-delete" id="image_to_'+ii+'"><span onclick="DeleteImageById('+name+','+ii+')" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+e.target.result+'" class="thumb-image"></span>')
					  ii = ii +1;

					}
					image_holder.show();
          reader.readAsDataURL($("#publisher-photos")[0].files[i]);
				}
				$("#publisher-photos")[0].files = new FileListItems(imgArray);
				if ($('.add_more_images').length == 0) {
					image_holder.prepend('<span class="wow_prod_imgs add_more_images"><div class="upload-product-image" onclick="document.getElementById(\'publisher-photos\').click(); return false"><div class="upload-image-content"><svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg></div></div></span>')
				}
					
			}
			else {
        image_holder.html("<p>This browser does not support FileReader.</p>");
      }
		}
	});
});

var fetch_url = 1;
$(function () {
   var allowed = "<?php echo $wo['config']['allowedExtenstion']?>";
  <?php if (!empty($url)) { ?>
    $('textarea').trigger('click');
    setTimeout(function () {
      $('textarea').trigger('keyup')
    }, 1000);
  <?php } ?>
  $('.postText').triggeredAutocomplete({
     hidden: '#hidden_inputbox',
     source: Wo_Ajax_Requests_File() + "?f=mention",
     trigger: "@" 
  });
  <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
  $('.postText').limit("<?php echo $wo['config']['maxCharacters']?>", '#charsLeft');
  <?php } ?>
  $('.emo-form').click(function () {
    $('#emo-form').slideToggle(200);
    Wo_RestFeelings();
  });
  
  $('.gif-form').click(function () {
    $('#gif-form').slideToggle(200);
  });

  $('.map-form').click(function () {
    $('#map-form').slideToggle(200);
	$('#map-form input').focus();
  });
  $('.poll-form').click(function () {
    $('#poll-form').slideToggle(200);
     $('.answers').find('input').each(function (index_id) {
       $(this).val('');
    });
  });
  $("#publisher-file").change(function () {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file-form input").val(filename);
    $("#file-form").slideDown(200);
    if (Wo_IsFileAllowedToUpload(filename, allowed) == false) {
      $("#file_not_supported").modal('show');
      Wo_Delay(function(){
        $("#file_not_supported").modal('hide');
      },3000);
      $("#publisher-file").val('');
      $("#file-form input").val('');
      $("#file-form").slideUp(200);
      return false;
    }
  });

  $("#publisher-photos").change(function () {
  	$('#postSticker').val('');
    var numFiles = this.files.length;
    $('.create-album').css('display', 'unset');
    $("#photo-form input").val(numFiles + ' photo(s) selected');
    $("#photo-form").slideDown(200);
  });

  $("#publisher-video").change(function () {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#video-form input[type='text']").val(filename);
    $("#video-form").slideDown(200);
    if (Wo_IsFileAllowedToUpload(filename, allowed) == false) {
      $("#file_not_supported").modal('show');
      Wo_Delay(function(){
        $("#file_not_supported").modal('hide');
      },3000);
      $("#publisher-video").val('');
      $("#video-form input[type='text']").val('');
      $("#video-form").slideUp(200);
      return false;
    }
  });

  $("#publisher-music").change(function () {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#music-form input").val(filename);
    $("#music-form").slideDown(200);
    if (Wo_IsFileAllowedToUpload(filename, allowed) == false) {
      $("#file_not_supported").modal('show');
      Wo_Delay(function(){
        $("#file_not_supported").modal('hide');
      },3000);
      $("#publisher-music").val('');
      $("#music-form input").val('');
      $("#music-form").slideUp(200);
      return false;
    }
  });

  $(document).on("click",".read-ads-description",function(event) {
    var self = $(this);
    self.toggleClass('unsetheight');
  });

  $(document).on('click', '.rads-clicks', function(event) {
    var self  = $(this);
    var ad_id = self.attr('id');
    var url   = self.find('a').attr('href');
    window.open(url, '_blank');
    if (ad_id) {
      $.ajax({
        url: Wo_Ajax_Requests_File() ,
        type: 'GET',
        dataType: 'json',
        data: {f: 'ads',s:'rads-c',ad_id:ad_id},
      })
      .done(function(data) {/*pass*/})
      .fail(function() {/*pass*/});
    }
    event.preventDefault();
  });

  $(document).on('click', '.rvad-clicks', function(event) {
    var self  = $(this);
    self.off("click").removeClass('rvad-clicks');
    var ad_id = self.parent().attr('id');
    var url   = self.find('a').attr('href');
    if (ad_id) {
      $.ajax({
        url: Wo_Ajax_Requests_File() ,
        type: 'GET',
        dataType: 'json',
        data: {f: 'ads',s:'rads-c',ad_id:ad_id},
      })
      .done(function(data) {/*pass*/})
      .fail(function() {/*pass*/});
    }
    event.preventDefault();
  });

  $(document).on('click', '.rvad-views', function(event) {
    var self  = $(this);
    self.off("click").removeClass('rvad-views');
    var ad_id = self.parent().attr('id');
    var url   = self.find('a').attr('href');
    if (ad_id) {
      $.ajax({
        url: Wo_Ajax_Requests_File() ,
        type: 'GET',
        dataType: 'json',
        data: {f: 'ads',s:'rads-v',ad_id:ad_id},
      })
      .done(function(data) {/*pass*/})
      .fail(function() {/*pass*/});
    }
    event.preventDefault();
  });



  <?php if ($wo['config']['video_upload'] == 1) { ?>  
  var thumb_drop_block = $(".thumb-renderer");

  if (typeof(window.FileReader) == 'undefined') {
    thumb_drop_block.find('.preview').text('Drag drop is not supported in your browser!');
  }

  else{
    thumb_drop_block[0].ondragover = function() {
        thumb_drop_block.addClass('hover');
        return false;
    };
        
    thumb_drop_block[0].ondragleave = function() {
        thumb_drop_block.removeClass('hover');
        return false;
    };

    thumb_drop_block[0].ondrop = function(event) {
        event.preventDefault();
        thumb_drop_block.removeClass('hover');
        var file = event.dataTransfer.files;
        $("#post_vthumb_droparea").find('.preview').hide(5, function() {
	      $("#post_vthumb_droparea").find('.image').html($("<img>",{
	        src:window.URL.createObjectURL(file[0])
	      })).show(5);
	    });
        $("#custom-video-thumb").prop('files', file);
    };
  }
  <?php } ?>

  $("#custom-video-thumb").change(function(event) {
    $("#post_vthumb_droparea").find('.preview').hide(5, function() {
      $("#post_vthumb_droparea").find('.image').html($("<img>",{
        src:window.URL.createObjectURL(event.target.files[0])
      })).show(5);
    });;
  });

  $(".video-custom-thumb").click(function(event) {
    $(this).find('i').toggleClass('rotate-90d');

    $('.video-poster-image').slideToggle(100,function () {
      var display_stat = $(this).css('display');

      if (display_stat == 'none') {
        $(".video-poster-image").find('.preview').show(10);
        $(".video-poster-image").find('.image').empty().hide(10);
        $("#custom-video-thumb").val('');
      }

    });
  });

  $(document).on('click', '.rads-views', function(event) {
    var self  = $(this);
    var ad_id = self.attr('id');
    var url   = self.find('a').attr('href');
    window.open(url, '_blank');
    if (ad_id) {
      $.ajax({
        url: Wo_Ajax_Requests_File() ,
        type: 'GET',
        dataType: 'json',
        data: {f: 'ads',s:'rads-v',ad_id:ad_id},
      })
      .done(/* pass */)
      .fail(/* pass */)
    }
    event.preventDefault();
  });

  var bar = $('#bar');
  var percent = $('#percent');
  var status = $('#status');
  var publisher_button = $('#publisher-button');

  $('form.post').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=posts&s=insert_new_post',
    beforeSend: function () {
      var percentVal = '0%';
      bar.width(percentVal);
      percent.html(percentVal);
   //    publisher_button.attr('disabled', true);
   //    publisher_button.css('color', '#333');
	  // $('#publisher-box-focus .pub-footer-bottom').find('.ball-pulse').fadeIn(100);
    },
    uploadProgress: function (event, position, total, percentComplete) {
      var percentVal = percentComplete + '%';
      bar.width(percentVal);
      $('#progress').slideDown(200);
      percent.html(percentVal);
    },beforeSubmit: function (a,b,c) {
    	for (var i = 0 ;i < a.length ; i++) {
    		if (a[i].name == 'postPhotos[]') {
    			for (var b = 0 ;b < deleted_images.length ; b++) {
    				if (a[i].value.name == deleted_images[b]) {
    					a[i] = {name:'',value:''};
    				}
    			}
    		}
    	}
    	deleted_images = [];
    	
    },
    success: function (data) {
    	$("#image-holder").empty();
      imgArray = [];
    	publisher_button.removeClass('btn-loading');
      $('#post_color_input').val("");
      $('.all_colors').hide();
	  $('.wo_pub_txtara_combo').css("cssText", "");
	  $('.postText').css("cssText", "");
	  $('.post.publisher-box').removeClass('wo_pub_change_color');
      $('#progress').slideUp(200);
      publisher_button.attr('disabled', false);
      publisher_button.css('color', '#fff');
      percent.removeClass('white');
      $('.postText').css('height', 'auto');
      $("#postRecord").val('');
      $("#postSticker").val('');
      if(data.status == 200) {
      	$('#user_post_count').text(data.post_count);

        if(data.html.length > 0) {
          $('#posts, #posts_hashtag').find('.posts-container').remove();
        }
        if (data.mention && data.mention.length > 0 && node_socket_flow == "1") {
	        $.each(data.mention, function( index, value ) {
	          socket.emit("user_notification", { to_id: value, user_id: _getCookie("user_id")});
	        });
	     }
	    if ($("[name='recipient_id']").length > 0) {
	    	if (node_socket_flow == "1") { socket.emit("user_notification", { to_id: $("[name='recipient_id']").val(), user_id: _getCookie("user_id")}); }
	    }
      if (node_socket_flow == "1") { socket.emit("update_new_posts", { user_id: _getCookie("user_id")}); }
	    if ($("[name='page_id']").length > 0) {
	    	if (node_socket_flow == "1") { socket.emit("page_notification", { to_id: $("[name='page_id']").val(), user_id: _getCookie("user_id")}); }
	    }
        $('#posts, #posts_hashtag').prepend(data.html);
        if (data.send_notify && data.send_notify == 'yes' && data.post_id) {
        	$.post(Wo_Ajax_Requests_File() + '?f=posts&s=send_notify', {post_id: data.post_id}, function(data, textStatus, xhr) {});
        }
        $('#video-form, #emo-form, #music-form, #map-form, #file-form, #photo-form, #album-form, .feeling-type, #poll-form, #gif-form').slideUp(200);
        $(".video-poster-image").hide(10, function() {
          $(this).find('.preview').show(10);
          $(this).find('.image').empty().hide(10);
          $(".video-custom-thumb").find('i').removeClass('rotate-90d');
        });
		$("body").removeClass('pub-focus');
        Wo_RemoveFetchedUrl();
		Wo_HidePosInfo();
        $('form.post').clearForm();
        $('.feelings-value').html('');
        $('#postSticker').html('');
        $('select').prop('selectedIndex', 1);
        <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
        $('#charsLeft').text("<?php echo $wo['config']['maxCharacters']?>");
        <?php } ?>
        <?php if (!empty($url)) { ?>
        window.close();
        <?php } ?>
        if (data.invalid_file == 1) {
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
            $("#invalid_file").modal('hide');
          },3000);
        }
        else if(data.invalid_file == 2){
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
          },3000);
        }
        else if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
        else if(data.invalid_file == 4){
          $("#approve_post").modal('show');
          Wo_Delay(function(){
            $("#approve_post").modal('hide');
          },3000);
        }
        else{
        	if (data.errors && data.errors != '') {
        		$("#error_post").modal('show');
        		$('#error_post_text').text(data.errors);
		        Wo_Delay(function(){
		            $("#error_post").modal('hide');
		        },3000);
        	}
        }
      } 
      else if (data.status == 300) {
      	$('#video-form, #emo-form, #music-form, #map-form, #file-form, #photo-form, #album-form, .feeling-type, #poll-form, #gif-form').slideUp(200);
        $(".video-poster-image").hide(10, function() {
          $(this).find('.preview').show(10);
          $(this).find('.image').empty().hide(10);
          $(".video-custom-thumb").find('i').removeClass('rotate-90d');
        });
      	$("body").removeClass('pub-focus');
        Wo_RemoveFetchedUrl();
		Wo_HidePosInfo();
        $('form.post').clearForm();
        $('.feelings-value').html('');
        $('#postSticker').html('');
        $('select').prop('selectedIndex', 1);
        <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
        $('#charsLeft').text("<?php echo $wo['config']['maxCharacters']?>");
        <?php } ?>
      	$("#ffmpeg_file").modal('show');
        Wo_Delay(function(){
            $("#ffmpeg_file").modal('hide');
        },3000);
        if (data.update && data.update == 1) {
        	intervalUpdates = setTimeout(function(){ Wo_intervalUpdates(1); }, 10000);
        }

      }
      else if (data.status == 400) {
        if (data.invalid_file == 1) {
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
            $("#invalid_file").modal('hide');
          },3000);
        }
        else if(data.invalid_file == 2){
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
          },3000);
        }
        else if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
        else if(data.invalid_file == 4){
          $("#pro_upload_file").modal('show');
          Wo_Delay(function(){
            $("#pro_upload_file").modal('hide');
          },3000);
        }
        else{
        	if (data.errors && data.errors != '') {
        		$("#error_post").modal('show');
        		$('#error_post_text').text(data.errors);
		        Wo_Delay(function(){
		            $("#error_post").modal('hide');
		        },3000);
        	}
         // alert('Foramt is not supported, please try again later');
        }
      } 
      fetch_url = 1;
      $('#publisher-box-focus .pub-footer-bottom').find('.ball-pulse').fadeOut(100);
    }
  });

  <?php if ($wo['config']['google_map']) { ?>
  var pac_input = document.getElementById('searchTextField');
  (function pacSelectFirst(input) {
    // store the original event binding function
    var _addEventListener = (input.addEventListener) ? input.addEventListener : input.attachEvent;
    function addEventListenerWrapper(type, listener) {
      // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
      // and then trigger the original listener.
      if(type == "keydown") {
        var orig_listener = listener;
        listener = function (event) {
          var suggestion_selected = $(".pac-item-selected").length > 0;
          if(event.which == 13 && !suggestion_selected) {
            var simulated_downarrow = $.Event("keydown", {
              keyCode: 40,
              which: 40
            });
            orig_listener.apply(input, [simulated_downarrow]);
          }
          orig_listener.apply(input, [event]);
        };
      }
      // add the modified listener
      _addEventListener.apply(input, [type, listener]);
    }
    if(input.addEventListener)
      input.addEventListener = addEventListenerWrapper;
    else if(input.attachEvent)
      input.attachEvent = addEventListenerWrapper;
  })(pac_input);

  $(function () {
     var autocomplete = new google.maps.places.Autocomplete(pac_input);
  });
  <?php } ?>
<?php if ($wo['config']['yandex_map'] == 1) { ?>
  $(function() {
    $('#searchTextField').on( "keydown", function() {
      let self = this;
      var myGeocoder = ymaps.geocode($(this).val());
      myGeocoder.then(
          function (res) {
            if (res.geoObjects.getLength() == 0) {
              $('.yandex_search_publisher').html('');
            }
            else{
              let html = '';
              for (var i = 0; i < res.geoObjects.getLength(); i++) {
                html += '<p class="pointer" onclick="AddYandexResult(\'#searchTextField\',this,\'.yandex_search_publisher\')">'+res.geoObjects.get(i).properties.get('name')+'</p>';
              }
              $('.yandex_search_publisher').html(html);
            }
          },
          function (err) {
              $('.yandex_search_publisher').html('');
          }
      );
    });
  });
<?php } ?>

  var getUrl  = $('.form-control.postText'); //url to extract from text field
  var sent = 0;
  $('.form-control.postText').bind("paste keyup input propertychange", function(e) {    
    // if ($(this).val() == '') {
    //     fetch_url = 1;
    //  }
    if (($(".extracted_url").length > 0)){
      return false;
    }

    else if (/(https?:\/\/(?:.*)\.(?:png|jpg|gif|jpeg))/ig.test(getUrl.val())) {
      /* pass */
    }

    else{
    	
      var match_url = /(https?:\/\/[^\s]+)/g;
      if (match_url.test(getUrl.val()) && sent == 0 && fetch_url == 1) {

      	  sent = 1;

          $("#results").hide();
          $("#loading_indicator").show(); 
          var extracted_url = getUrl.val().match(match_url)[0];

          $.post(Wo_Ajax_Requests_File() + '?f=posts&s=fetch_url',{'url': extracted_url}, function(data){         
            extracted_images = data.images;
            total_images     = parseInt(data.images.length-1);
            img_arr_pos      = total_images;
            if(extracted_images != ''){
              inc_image   = '<div class="extracted_thumb" id="extracted_thumb"><img src="'+data.images[img_arr_pos]+'"></div>';
              input_image = data.images[img_arr_pos];
            } 

            else {
              inc_image   = '';
              input_image = '';
            }
            
            var img_content = '';
            if (total_images > 1) {
              img_content = '<div class="thumb_select"><div class="thumb_sel"><span class="prev_thumb" id="thumb_next"><i class="fa fa-arrow-circle-right"></i></span><span class="next_thumb" id="thumb_prev"><i class="fa fa-arrow-circle-left"></i></span> </div><span class="small_text" id="total_imgs">'+img_arr_pos+' of '+total_images+'</span></div></div></div>';
            }

            var content = '<div class="extracted_url"><span class="remove-fetched-url" onclick="Wo_RemoveFetchedUrl();"><i class="fa fa-remove"></i></span>'+ inc_image +'<div class="extracted_content"><input class="form-control url-input" type="text" name="url_title" value="'+data.title+'" dir="auto"><br><textarea onkeyup="textAreaAdjust(this, 70)" class="form-control url-input-textarea url-input" name="url_content" placeholder="<?php echo $wo['lang']['description']?>" dir="auto">' + data.content + '</textarea><input type="hidden" id="url_image" name="url_image" value="'+ input_image +'"><input type="hidden" id="url_link" name="url_link" value="'+data.url+'"><div class="clear"></div>' + img_content;
            if (data.tweet && data.tweet == 'yes') {
            	var content = '<div class="extracted_url"><span class="remove-fetched-url" onclick="Wo_RemoveFetchedUrl();"><i class="fa fa-remove"></i></span>'+ inc_image +'<div class="extracted_content"><input class="form-control url-input hidden" type="text" name="url_title" value="'+data.title+'" dir="auto"><br><textarea onkeyup="textAreaAdjust(this, 70)" class="form-control url-input-textarea url-input hidden" name="url_content" placeholder="<?php echo $wo['lang']['description']?>" dir="auto">' + data.content + '</textarea><input type="hidden" id="url_image" name="url_image" value="'+ input_image +'"><input type="hidden" id="url_link" name="url_link" value="'+data.url+'"><div class="clear"></div>' + img_content+data.content;
            }
            if (data.mp4 && data.mp4 == 'yes') {
            	var content = '<div class="extracted_url"><span class="remove-fetched-url" onclick="Wo_RemoveFetchedUrl();"><i class="fa fa-remove"></i></span>'+data.content+'<div class="clear"><input type="hidden" id="url_link" name="url_link" value="'+data.url+'"><input class="form-control url-input hidden" type="text" name="url_title" value="mp4" dir="auto"></div>';
            }
            if (data.facebook && data.facebook == 'yes') {

            }
            else{
            	$("#results").html(content); 
	            $("#results").fadeIn(); 
            }

            
            $("#loading_indicator").hide();
            sent = 0;

          },'json');
      }
    }
  });


  
  $("body").on("click","#thumb_prev", function(e){    
    if(img_arr_pos>0) 
    {
      img_arr_pos--; 
      
      $("#extracted_thumb").html('<img src="'+extracted_images[img_arr_pos]+'">');

      $("#url_image").attr('value', extracted_images[img_arr_pos]);
      
      $("#total_imgs").html((img_arr_pos) +' of '+ total_images);
    }
  });
  
  $("body").on("click","#thumb_next", function(e){    
    if(img_arr_pos<total_images)
    {
      img_arr_pos++;
      
      $("#extracted_thumb").html('<img src="'+extracted_images[img_arr_pos]+'">');

      $("#url_image").attr('value', extracted_images[img_arr_pos]);
      
      $("#total_imgs").html((img_arr_pos) +' of '+ total_images);
    }
  });

});



function Wo_RemoveFetchedUrl() {
  fetch_url = 0;
  var content = $('form.publisher-box').find('.extracted_url');
  content.slideUp(function () {
    $(this).remove();
    if ($('.form-control.postText').val() != '') {
    	$('.form-control.postText').focus();
    }
    
    
  });
}

function Wo_OpenAlbum() {
  $('#album-form').slideToggle(100);
  $('#album-form input').focus();
}
function Wo_ShowFeelings() {
  if ($('.feelings-type-to').is(':empty')) {
    $('.feeling-types').slideToggle(200);
  }
}
var pac_input2 = document.getElementById('feelings-text');
function Wo_ShowFeelingType(type, text, placeholder, icon) {
  $('.feeling-types').slideUp(200, function () {
    $('.feelings-type-to').html(text);
    $('#feelings-text').attr('placeholder', decodeHtml(placeholder)).focus();
    $('#feeling-type').val(type);
    if (type != 'feelings') {
      $('#feelings-text').attr('readonly', false);
    }
    <?php if ($wo['config']['google_map']) { ?>
    if (type == 'traveling') {
      var autocomplete = new google.maps.places.Autocomplete(pac_input2);
    } else {
      google.maps.event.clearInstanceListeners(pac_input2);
    }
    <?php } ?>
    $('.' + type).slideToggle(200);
  });
}
function Wo_RestFeelings() {
  $('.feelings-type-to, .feelings-value').empty();
  $('#feelings-text').val('');
  $('#feelings-text').attr('readonly', true);
  $('#feelings-text').attr('placeholder', decodeHtml("<?php echo $wo["lang"]["feel_d"]?>"));
  $('.feeling-type, .feelings-type').slideUp(200);
  <?php if ($wo['config']['google_map']) { ?>
  google.maps.event.clearInstanceListeners(pac_input2);
  <?php } ?>
  Wo_ShowFeelings();
}

function Wo_AddFeeling(type, text, icon) {
  $('#feelings-text').val(type);
  $('.feelings-value').html('<span><i class="twa-lg twa twa-' + icon + '"></i> ' + text + '</span>')
  Wo_ShowFeelingType('feelings', 'Feeling', 'What are you feeling ?', 'smile-o');
}
function smokeTheAt(str) {
  var n = str.search("@");
  if(n != "-1"){
    alert('sd');
  }
}
function CloseAnswer(id,self) {
	$('#answer_'+id).remove();
	$(self).remove();
	answer_id = 0;
	$('.answers').find('input').each(function (index_id) {
	    answer_id = Number(index_id) + 1;
	    $(this).attr('placeholder', "<?php echo $wo['lang']['answer'] ?> "+answer_id);
	});
}
function Wo_AddAnswer() {
  answer_id = 0;
  $('.answers').find('input').each(function (index_id) {
     answer_id = Number(index_id) + 1;
  });
  var last_answer_id = (Number(answer_id) + 1);
  if (last_answer_id < 9) {
     $('.answers').append('<span><input name="answer[]" type="text" class="form-control" placeholder="<?php echo $wo['lang']['answer'] ?> ' + last_answer_id + '" id="answer_' + last_answer_id + '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="CloseAnswer(' + last_answer_id + ',this);"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></span>');
     if (last_answer_id == 8) {
      $('#add_answer').hide();
     }
     $('.answers').find('input:last').focus();
  } else {
     $('#add_answer').hide();
  }
  
}

function Wo_HidePosInfo() {
  $(".postText").attr('opened', '0');
  $(".postText").css('height', '112px');
  $("body").removeClass('pub-focus');
  $(".publisher-box-footer").slideUp(100);
  $(".add-emoticons").removeClass('show_emo');
  fetch_url = 1;
}
function Wo_ShowPosInfo() {
  $(".postText").attr('opened', '1');
  $(".postText").css('height', '112px').focus();
  $("body").addClass('pub-focus');
  $(".publisher-box-footer").slideDown(100);
  $(".add-emoticons").addClass('show_emo');
}
$(document).on('focus', '#publisher-box-focus',function(){
	$("body").addClass('pub-focus');
	if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
	    $(".publisher-box-footer").slideDown(100);
		$(".add-emoticons").addClass('show_emo');
  		$(".postText").attr('opened', '1');
	}
});
$('#focus-overlay').on('click',function (){
	Wo_HidePosInfo();
	$('#video-form, #emo-form, #music-form, #map-form, #file-form, #photo-form, #album-form, .feeling-type, #poll-form, #gif-form').slideUp(200);
	$('.all_colors').hide();
	$('.wo_pub_txtara_combo').css("cssText", "");
	$('.postText').css("cssText", "");
	$('#post_color_input').val("");
	$('.post.publisher-box').removeClass('wo_pub_change_color');
	$(".all_colors_display").removeClass('selected');
});

// $(function() {
  // $(window).scroll(function() {
    // var scrollfocus = $(window).scrollTop();
    // if (scrollfocus >= 500) {
      // $("body").removeClass('pub-focus');
    // }
  // });
// });

function Wo_ResetAnswers() {
  $('.answers').find('input').each(function (index_id) {
     $(this).val('');
  });
  $('#poll-form').slideUp(200);
}
function DeleteGif() {
	var image_holder = $("#image-holder");
	$('#postSticker').val('');
    image_holder.empty();
}
function Wo_PostSticker(self){
  if (!self) {
    return false;
  }

  var image_holder = $("#image-holder");
  image_holder.empty();
  image_holder.append('<span class="thumb-image-delete" id="image_to_gif"><span onclick="DeleteGif()" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+$(self).attr('data-gif')+'" class="thumb-image"></span>')
  image_holder.show();
  $('.create-album').css('display', 'none');
  $("#photo-form").slideDown(200);
  $('#postSticker').val($(self).attr('data-gif'));
  // Wo_Delay(function(){
  //    Wo_GetPRecordLink();
  // },500)
}
function GifScrolled(self) {
	if ((($(self).prop("scrollHeight") - $(self).height()) - $(self).scrollTop()) < 300) {
		Wo_GetPostStickers($('#publisher-box-stickers').attr('oldWord'),$('#publisher-box-stickers').attr('loadOffset'));
	}
}
function Wo_GetPostStickers(keyword,offset = 0){
  if (!keyword) {
    //return false;
  }
  if ($('#publisher-box-stickers').attr('oldWord') != keyword) {
  	$('#publisher-box-stickers-cont').empty();
  	$('#publisher-box-stickers').attr('loadOffset', 0);
  	$('#publisher-box-stickers').attr('oldWord', keyword);
  }
  else{
  	$('#publisher-box-stickers').attr('loadOffset', parseInt($('#publisher-box-stickers').attr('loadOffset')) + 20);
  }
  $('#publisher-box-stickers').find('.ball-pulse').fadeIn(100);
  Wo_Delay(function(){
    $.ajax({
      url: 'https://api.giphy.com/v1/gifs/search?',
      type: 'GET',
      dataType: 'json',
      data: {q:keyword,api_key:'<?php echo $wo['config']['giphy_api'];?>', limit: 20,offset:offset},
    })
    .done(function(data) {
      if (data.meta.status == 200 && data.data.length > 0) {
        // $('#publisher-box-stickers-cont').empty();
        var appended = false;
        for (var i = 0; i < data.data.length; i++) {
            appended = true;
            if (appended == true) {
              appended = false;
              $('#publisher-box-stickers-cont').append($('<img alt="gif" src="'+data.data[i].images.fixed_height_small.url+'" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostSticker(this)" autoplay loop>'));
              appended = true;
            }
        }
        var images = 0;
        Wo_ElementLoad($('img[alt=gif]'), function(){
          images++;
        });
        if (data.data.length == images || images >= 5) {
          $('#publisher-box-stickers').find('.ball-pulse').fadeOut(100);
        }
      }
      else{
        $('#publisher-box-stickers-cont').html('<p class="no_gifs_found"><i class="fa fa-frown-o"></i> <?php echo $wo['lang']['no_result']; ?></p>');
      }
    })
    .fail(function() {
      console.log("error");
    })
  },100);
}
</script>