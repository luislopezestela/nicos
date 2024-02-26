<?php if ($wo['config']['shout_box_system'] == 1 && $wo['story']['postPrivacy'] == 4) {
	$anonymous = true;
   $wo['story']['publisher']['username'] = 'anonymous';
   $wo['story']['publisher']['name'] = $wo['lang']['anonymous'];
   $wo['story']['publisher']['avatar'] = lui_GetMedia('upload/photos/incognito.png');
   $wo['story']['publisher']['verified'] = 0;
   $wo['story']['publisher']['type'] = '';
   $wo['story']['publisher']['url'] = 'javascript:void(0)';
} ?>
<div class="modal fade share_post_modal_" id="share_post_modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path></svg> <?php echo $wo['lang']['share_new_post'] ?></h4>
			</div>
			<div class="modal-body">
				<div class="share_post_modal_alert"></div>
				<div class="share_modal_social_icos">
					<?php if($wo['config']['social_share_twitter'] == 1): ?>
						<a class="social-btn-parent" href="https://twitter.com/intent/tweet?text=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#55acee"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" /></svg></div> <span><?php echo $wo['lang']['twitter'];?></span>
						</a>
					<?php endif;?>
					<?php if($wo['config']['social_share_google'] == 1): ?>
						<!-- <a class="social-btn-parent" rel="publisher" href="https://plus.google.com/share?url=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#d9534f"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" /></svg></div> <span><?php echo $wo['lang']['google'];?></span>
						</a> -->
					<?php endif;?>
					<?php if($wo['config']['social_share_facebook'] == 1): ?>
						<a class="social-btn-parent" rel="publisher" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#337ab7"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" /></svg></div> <span><?php echo $wo['lang']['facebook'];?></span>
						</a>
					<?php endif;?>
					<?php if($wo['config']['social_share_whatsup'] == 1): ?>
						<a class="social-btn-parent" href="https://api.whatsapp.com/send?text=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" data-action="share/whatsapp/share" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#04aa24"><path d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" /></svg></div> <span><?php echo $wo['lang']['whatsapp'];?></span>
						</a>
					<?php endif;?>
					<?php if($wo['config']['social_share_pinterest'] == 1): ?>
						<a class="social-btn-parent" href="https://pinterest.com/pin/create/button/?url=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#cb2027"><path d="M13,16.2C12.2,16.2 11.43,15.86 10.88,15.28L9.93,18.5L9.86,18.69L9.83,18.67C9.64,19 9.29,19.2 8.9,19.2C8.29,19.2 7.8,18.71 7.8,18.1C7.8,18.05 7.81,18 7.81,17.95H7.8L7.85,17.77L9.7,12.21C9.7,12.21 9.5,11.59 9.5,10.73C9.5,9 10.42,8.5 11.16,8.5C11.91,8.5 12.58,8.76 12.58,9.81C12.58,11.15 11.69,11.84 11.69,12.81C11.69,13.55 12.29,14.16 13.03,14.16C15.37,14.16 16.2,12.4 16.2,10.75C16.2,8.57 14.32,6.8 12,6.8C9.68,6.8 7.8,8.57 7.8,10.75C7.8,11.42 8,12.09 8.34,12.68C8.43,12.84 8.5,13 8.5,13.2A1,1 0 0,1 7.5,14.2C7.13,14.2 6.79,14 6.62,13.7C6.08,12.81 5.8,11.79 5.8,10.75C5.8,7.47 8.58,4.8 12,4.8C15.42,4.8 18.2,7.47 18.2,10.75C18.2,13.37 16.57,16.2 13,16.2M20,2H4C2.89,2 2,2.89 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" /></svg></div> <span><?php echo $wo['lang']['pinterest'];?></span>
						</a>
					<?php endif;?>
					<?php if($wo['config']['social_share_linkedin'] == 1): ?>
						<a class="social-btn-parent" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#007bb6"><path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" /></svg></div> <span><?php echo $wo['lang']['linkedin'];?></span>
						</a>
					<?php endif;?>
					<?php if($wo['config']['social_share_telegram'] == 1): ?>
						<a class="social-btn-parent" href="https://telegram.me/share/url?url=<?php echo (!empty($wo['story']['blog']['url'])) ? $wo['story']['blog']['url']  : $wo['story']['url'];?>" target="_blank">
							<div class="social-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" fill="#239bcd"><path d="M9.78,18.65L10.06,14.42L17.74,7.5C18.08,7.19 17.67,7.04 17.22,7.31L7.74,13.3L3.64,12C2.76,11.75 2.75,11.14 3.84,10.7L19.81,4.54C20.54,4.21 21.24,4.72 20.96,5.84L18.24,18.65C18.05,19.56 17.5,19.78 16.74,19.36L12.6,16.3L10.61,18.23C10.38,18.46 10.19,18.65 9.78,18.65Z" /></svg></div> <span><?php echo $wo['lang']['telegram'];?></span>
						</a>
					<?php endif;?>
				</div>
				<div>
					<textarea class="form-control" style="padding: 10px; border-radius: 0" placeholder="<?php echo $wo['lang']['publisher_box_placeholder']?>" dir="auto" rows="4" onkeyup="Wo_Get_Mention(this)" id="share_post_text"></textarea>
					<br>
				</div>
				<?php if (empty($wo['story']['parent_id']) && empty($wo['story']['shared_from']) && $wo['story']['postPrivacy'] == 0): ?>
				<div class="select_radio_btn small_rbtn share_modal_opts_icos">
					<h4><?php echo $wo['lang']['share_new_post']?></h4>
					<div class="select_radio_btn_innr">
						<?php //if ($wo['story']['admin'] != true) { ?>

						<?php if ((!empty($wo['story']['page_id']) || !empty($wo['story']['group_id'])) || (empty($wo['story']['page_id']) && empty($wo['story']['group_id']) && !$wo['story']['admin']) ) { ?>
						<label>
							<input type="radio" name="share_type_select" id="share_type_select" value="timeline" checked>
							<div class="sr_btn_lab_innr">
								<div class="sr_btn_img">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4d91ea" d="M5,2V8H3V2H5M3,22H5V16H3V22M6,12A2,2 0 0,0 4,10A2,2 0 0,0 2,12A2,2 0 0,0 4,14A2,2 0 0,0 6,12M22,7V17A2,2 0 0,1 20,19H11A2,2 0 0,1 9,17V14L7,12L9,10V7A2,2 0 0,1 11,5H20A2,2 0 0,1 22,7M17,13H12V15H17V13M19,9H12V11H19V9Z" /></svg>
								</div>
								<span><?php echo $wo['lang']['my_timeline'];?></span>
							</div>
						</label>
						<?php } ?>
						<?php //} ?>

						<?php if (!empty($wo['story']['page_id']) || !empty($wo['story']['group_id']) ) { ?>
						<!-- <label>
							<input type="radio" name="share_type_select" id="share_type_select" value="user">
							<div class="sr_btn_lab_innr">
								<div class="sr_btn_img">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>
								</div>
								<span><?php echo $wo['lang']['user'];?></span>
							</div>
						</label> -->
						<?php } ?>
						<?php if (empty($wo['story']['page_id']) && empty($wo['story']['group_id']) ) { ?>
					    <?php if ($wo['config']['pages'] != 0) { ?>
						<label>
							<input type="radio" name="share_type_select" id="share_type_select" value="page">
							<div class="sr_btn_lab_innr">
								<div class="sr_btn_img">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f25e4e" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg>
								</div>
								<span><?php echo $wo['lang']['page'];?></span>
							</div>
						</label>
						<?php } ?>
						<?php if ($wo['config']['groups'] != 0) { ?>
						<label>
							<input type="radio" name="share_type_select" id="share_type_select" value="group">
							<div class="sr_btn_lab_innr">
								<div class="sr_btn_img">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M12,6A3,3 0 0,0 9,9A3,3 0 0,0 12,12A3,3 0 0,0 15,9A3,3 0 0,0 12,6M6,8.17A2.5,2.5 0 0,0 3.5,10.67A2.5,2.5 0 0,0 6,13.17C6.88,13.17 7.65,12.71 8.09,12.03C7.42,11.18 7,10.15 7,9C7,8.8 7,8.6 7.04,8.4C6.72,8.25 6.37,8.17 6,8.17M18,8.17C17.63,8.17 17.28,8.25 16.96,8.4C17,8.6 17,8.8 17,9C17,10.15 16.58,11.18 15.91,12.03C16.35,12.71 17.12,13.17 18,13.17A2.5,2.5 0 0,0 20.5,10.67A2.5,2.5 0 0,0 18,8.17M12,14C10,14 6,15 6,17V19H18V17C18,15 14,14 12,14M4.67,14.97C3,15.26 1,16.04 1,17.33V19H4V17C4,16.22 4.29,15.53 4.67,14.97M19.33,14.97C19.71,15.53 20,16.22 20,17V19H23V17.33C23,16.04 21,15.26 19.33,14.97Z" /></svg>
								</div>
								<span><?php echo $wo['lang']['group'];?></span>
							</div>
						</label>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
				<?php endif;?>
				<div class="clear"></div>
				<div class="shar_modl_chose_pgrp">
					<?php if (!empty($wo['story']['page_id']) || !empty($wo['story']['group_id']) ) { ?>
			        <div class="form-group search_for_form" id="type_user_name" style="display: none;">
			            <input onkeydown="SearchFor(this,'user')" type="text" class="form-control" name="name" placeholder="<?php echo $wo['lang']['username']; ?>" autocomplete="off">
			         </div>
			         <?php } ?>
			         <?php if (empty($wo['story']['page_id']) && empty($wo['story']['group_id']) ) { ?>
			         <div class="form-group search_for_form" id="type_group_name" style="display: none;">
			            <input onkeydown="SearchFor(this,'group')" type="text" class="form-control" name="name" placeholder="<?php echo $wo['lang']['please_group_name']; ?>" autocomplete="off">
			        </div>
			        <div class="form-group search_for_form" id="type_page_name" style="display: none;">
			            <input onkeydown="SearchFor(this,'page')" type="text" class="form-control" name="name" placeholder="<?php echo $wo['lang']['please_page_name']; ?>" autocomplete="off">
			        </div>
			        <?php } ?>
				</div>
			        <div id="share_post_container">
			          	<div class="post-container share_modl_post_cont">
  <div class="post<?php echo (!empty($wo['story']['post_is_promoted'])) ? ' boosted': '';?>" id="post-<?php echo $wo['story']['id']; ?>" data-post-id="<?php echo $wo['story']['id'];?>" <?php if( isset( $wo['story']['LastTotal'] ) ) { echo 'data-post-total="'.$wo['story']['LastTotal'].'"'; }?> <?php if( isset( $wo['story']['ids'] ) ) { echo 'data-post-ids="'.$wo['story']['ids'].'"'; }?> <?php if( isset( $wo['story']['dt'] ) ) { echo 'data-post-dt="'.$wo['story']['dt'].'"'; }?>>
    <?php
      if (empty($wo['page'])) {
        $wo['page'] = 'home';
      }
     if ($wo['story']['is_post_pinned'] === true && ($wo['page'] == 'timeline' || $wo['page'] == 'events' || $wo['page'] == 'page' || $wo['page'] == 'group' )) {?>
    <div class="pin-icon" data-toggle="tooltip" title="<?php echo $wo['lang']['pinned_post'];?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
    </div>
    <?php } ?>
    <div class="panel panel-white panel-shadow">
      <div class="post-heading">
        <div class="<?php echo lui_RightToLeft('pull-left');?> image">
        	<?php if (!isset($anonymous)) { ?>
            <a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>">
            <img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture">
            </a>
        <?php }else{ ?>
        	<img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture">
            <?php } ?>
        </div>
		<div class="<?php echo lui_RightToLeft('pull-right');?>">
			<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="collapse" role="button" aria-expanded="false" data-target="#shar_body_coll">
            <span class="pointer">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize-2"><polyline points="15 3 21 3 21 9"></polyline><polyline points="9 21 3 21 3 15"></polyline><line x1="21" y1="3" x2="14" y2="10"></line><line x1="3" y1="21" x2="10" y2="14"></line></svg>
            </span>
            </a>
		</div>
        <div class="meta">
          <div class="title h5">
          	<?php if (!isset($anonymous)) { ?>
            <span class="user-popover" data-type="<?php echo $wo['story']['publisher']['type']; ?>" data-id="<?php echo $wo['story']['publisher']['id']; ?>">

              <a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']; ?>"><b><?php echo $wo['story']['publisher']['name']; ?></b></a>
              <?php if($wo['story']['publisher']['verified'] == 1) { ?>
                <span class="verified-color">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
                </span>
              <?php } ?>
              
            
            </span>
        <?php }else{ ?>
        	<b><?php echo $wo['story']['publisher']['name']; ?></b>
            <?php } ?>
            

            <?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
              <span class="user-popover" data-type="<?php echo $wo['story']['shared_from']['type']; ?>" data-id="<?php echo $wo['story']['shared_from']['id']; ?>">         
                    <span><?php echo $wo['lang']['shared']; ?></span> 
                    <a href="<?php echo $wo['story']['shared_from']['url']; ?>" class="pointer no_decor" data-ajax="?link1=timeline&u=<?php echo $wo['story']['shared_from']['username']; ?>"><b><?php echo $wo['story']['shared_from']['name']; ?></b></a>
                    <?php if($wo['story']['shared_from']['verified'] == 1) { ?>
                    <span class="verified-color">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
                    </span>
              <?php } ?>
              </span>
            <?php endif; ?>
            <?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
            <span>  
              <a href="<?php echo $wo['story']['post_url']; ?>" class="pointer"><span style="color: #666;"><?php echo strtolower($wo['lang']['post']); ?></span></a>
            </span>
            <?php endif; ?>
            <?php if ($wo['config']['live_video'] == 1 && !empty($wo['story']['stream_name'])) { ?>
         <span><span style="color: #666;"><?php echo ($wo['story']['is_still_live'] ? $wo['lang']['is_live'] : $wo['lang']['was_live']); ?></span></span>
      <?php } ?>

          

            <?php if ($wo['story']['recipient_exists'] == true) {  ?>
            <i class="fa fa-arrow-right"></i>
            <span class="user-popover" data-type="<?php echo $wo['story']['recipient']['type']; ?>" data-id='<?php echo $wo['story']['recipient']['id']; ?>'>
            <a href="<?php echo $wo['story']['recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['recipient']['username']; ?>">
            <b>
            <?php echo $wo['story']['recipient']['name']; ?>
            </b>
            </a>
            <?php if($wo['story']['recipient']['verified'] == 1) { ?> <span class="verified-color"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg></span>
            <?php } ?>
            </span>
            <?php } ?>

            <?php if (!empty($wo['story']['page_event_id'])) {?>
            <small class="small-text"> <?php echo $wo['lang']['created_new_event'] ?></small>
            <?php } ?>
            <?php if (!empty($wo['story']['event_id']) && $wo['page'] != 'events') {  ?>
            <i class="fa fa-arrow-right"></i> <a href="<?php echo $wo['story']['event']['url']; ?>" data-ajax="?link1=show-event&eid=<?php echo $wo['story']['event']['id']; ?>"><b><?php echo $wo['story']['event']['name']; ?></b></a>
            <?php } ?>
            <?php if ($wo['story']['group_recipient_exists'] == true && $wo['page'] != 'group') {  ?>
            <i class="fa fa-arrow-right"></i>
            <span class="user-popover" data-type="<?php echo $wo['story']['group_recipient']['type']; ?>" data-id='<?php echo $wo['story']['group_recipient']['id']; ?>'>
            <a href="<?php echo $wo['story']['group_recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['group_recipient']['username']; ?>">
            <b><?php echo $wo['story']['group_recipient']['name']; ?></b>
            </a>
            </span>
            <?php } ?>
            <?php if (!empty($wo['story']['album_name']) && empty($wo['story']['shared_from'])) {  ?>
            <small class="small-text"><?php echo $wo['lang']['added_new_photos_to'];?> <b><a href="<?php echo $wo['story']['url']; ?>" data-ajax="?link1=post&id=<?php echo $wo['story']['id'];?>"><?php echo $wo['story']['album_name']; ?></a></b></small>
            <?php } ?>
            <?php if (!empty($wo['story']['product_id']) && empty($wo['story']['shared_from'])) {  ?>
            <small class="small-text"><?php echo $wo['lang']['added_new_product_for_sell']; ?></small>
            <?php } ?>
            <?php if (!empty($wo['story']['blog_id'])  && empty($wo['story']['shared_from'])) {  ?>
            <small class="small-text"><?php echo $wo['lang']['created_new_blog'] ?></small>
            <?php } ?>
            <?php if (!empty($wo['story']['forum_id'])  && empty($wo['story']['shared_from']) && !empty($wo['story']['forum'])) {  ?>
            <small class="small-text"><?php echo $wo['lang']['shared_forum'] ?></small>
            <?php } ?>
            <?php if (!empty($wo['story']['thread_id'])  && empty($wo['story']['shared_from']) && !empty($wo['story']['thread'])) {  ?>
         <small class="small-text"><?php echo $wo['lang']['shared_thread'] ?></small>
         <?php } ?>
            <?php if (empty($wo['story']['shared_from'])): ?>
              <small class="small-text">
                <?php 
                  if($wo['story']['postType'] == 'profile_picture') { 
                     $changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
                     if ($wo['story']['publisher']['gender'] == 'female') {
                        $changed_profile_pic_lang = $wo['lang']['changed_profile_picture_female'];
                     } else {
                        $changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
                     }
                     echo $changed_profile_pic_lang;
                  } 
                  if($wo['story']['postType'] == 'profile_cover_picture') { 
                     $changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
                     if ($wo['story']['publisher']['gender'] == 'female') {
                        $changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_female'];
                     } else {
                        $changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
                     }
                     echo $changed_profile_cover_pic_lang;
                  } 
                  ?>
              </small>
            <?php endif; ?>
            <?php if($wo['story']['via_type'] == 'share') {  ?>
            <small style="color:#a33e40;"><?php echo $wo['story']['via']['name'];?> <?php echo $wo['lang']['shared_this_post'];?></small>
            <?php }  ?>
            <?php 
          $extra_exists = 0;
          if (!empty($wo['story']['postFeeling'])) {
            if (empty($changed_profile_pic_lang) 
              && $wo['story']['via_type'] != 'share'
              && $wo['story']['group_recipient_exists'] != true
              && empty($wo['story']['album_name'])) {
          ?>
          <span class="feeling-text"> <?php echo $wo['lang']['is_feeling'];?> <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
          <?php
          } else {
            $extra_exists = 1;
          }
          }
          if (!empty($wo['story']['postTraveling'])) {
            if (empty($changed_profile_pic_lang) 
              && $wo['story']['via_type'] != 'share'
              && $wo['story']['group_recipient_exists'] != true
              && empty($wo['story']['album_name'])) {
          ?>
          <span class="feeling-text"><i class="fa fa-plane"></i> <?php echo $wo['lang']['is_traveling'];?> <?php echo $wo['story']['postTraveling'];?></span>
          <?php
          } else {
            $extra_exists = 1;
          }
          }
          if (!empty($wo['story']['postListening'])) {
            if (empty($changed_profile_pic_lang) 
              && $wo['story']['via_type'] != 'share'
              && $wo['story']['group_recipient_exists'] != true
              && empty($wo['story']['album_name'])) {
          ?>
          <span class="feeling-text"><i class="fa fa-headphones"></i> <?php echo $wo['lang']['is_listening'];?> <?php echo $wo['story']['postListening'];?></span>
          <?php
          } else {
            $extra_exists = 1;
          }
          }
          if (!empty($wo['story']['postPlaying'])) {
            if (empty($changed_profile_pic_lang) 
              && $wo['story']['via_type'] != 'share'
              && $wo['story']['group_recipient_exists'] != true
              && empty($wo['story']['album_name'])) {
          ?>
          <span class="feeling-text"><i class="fa fa-gamepad"></i> <?php echo $wo['lang']['is_playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
          <?php
          } else {
            $extra_exists = 1;
          }
          }
          if (!empty($wo['story']['postWatching'])) {
            if (empty($changed_profile_pic_lang) 
              && $wo['story']['via_type'] != 'share'
              && $wo['story']['group_recipient_exists'] != true
              && empty($wo['story']['album_name'])) {
          ?>
          <span class="feeling-text"><i class="fa fa-eye"></i> <?php echo $wo['lang']['is_watching'];?> <?php echo $wo['story']['postWatching'];?></span>
          <?php
          } else {
            $extra_exists = 1;
          }
          }
          ?>
          </div>
          <h6>
            <span class="time">
               <a  style="color:#9197a3" class="ajax-time" href="<?php echo $wo['story']['url'];?>" title="<?php echo date('c',$wo['story']['time']); ?>" target="_blank"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></a>
            </span>

            <?php if(!empty($wo['story']['postMap'])) { ?>
            <?php if(!empty($wo['story']['postSoundCloud']) || 
              !empty($wo['story']['postVine']) || 
              !empty($wo['story']['postYoutube']) || 
              !empty($wo['story']['postPlaytube']) || 
              !empty($wo['story']['postVimeo']) || 
              !empty($wo['story']['postText']) || 
              !empty($wo['story']['postFile']) || 
              !empty($wo['story']['postLink']) || 
              !empty($wo['story']['postFacebook']) || 
              !empty($wo['story']['postDailymotion']) ||
              !empty($wo['story']['album_name']) || ($wo['config']['google_map'] == 0 && $wo['config']['yandex_map'] == 0)) { ?>
            <span style="color:#9197a3"> - <i class="fa fa-map-marker"></i> <?php echo $wo['story']['postMap'];?>.</span>
            <?php } ?>
            <?php } else { ?>
            <?php
              $small_icon = '';
              $icon_type = '';
              if(!empty($wo['story']['postVine'])) { 
                 $small_icon = 'vine';
                 $icon_type = 'Vine';
              } else if (!empty($wo['story']['postVimeo'])) {
                 $small_icon = 'vimeo';
                 $icon_type = 'Vimeo';
              } else if (!empty($wo['story']['postFacebook'])) {
                 $small_icon = 'facebook-official';
                 $icon_type = 'Facebook';
              } else if (!empty($wo['story']['postDailymotion'])) {
                 $small_icon = 'film';
                 $icon_type = 'Dailymotion';
              } else if (!empty($wo['story']['postYoutube'])) {
                 $small_icon = 'youtube-square';
                 $icon_type = 'Youtube';
              } else if (!empty($wo['story']['postPlaytube'])) {
                // $small_icon = 'play-circle';
                // $icon_type = 'PlayTube';
              } else if (!empty($wo['story']['postSoundCloud'])) {
                 $small_icon = 'soundcloud';
                 $icon_type = 'SoundCloud';
              }
              if (!empty($icon_type)) {
              ?>
            <span style="color:#9197a3; text-transform: capitalize;">
             - <i class="fa fa-<?php echo $small_icon; ?>"></i> <?php echo $icon_type; ?>
            </span>
            <?php  } } ?>
          </h6>
        </div>
      </div>
		<div class="collapse" id="shar_body_coll">
      <div class="post-description" id="post-description-<?php echo $wo['story']['id']; ?>">

      	<?php if (!empty($wo['story']['fund_raise_id']) && empty($wo['story']['parent_id'])) { 
	 		$wo['story']['fund'] = GetFundByRaiseId($wo['story']['fund_raise_id'],$wo['story']['user_id']);
	 	

      		?>
          <?php if (!empty($wo['story']['fund']['fund']['image'])): ?>
        <div class="post-file" id="fullsizeimg" style="width: 100%;margin-left: unset;">
          <img src="<?php echo $wo['story']['fund']['fund']['image']; ?>" alt="Picture">
          <div class="wow_dontd_posts">
            <div class="wow_dontd_posts_innr">
              <div class="wow_dontd_posts_left">
                <h4>
                  <a href="<?php echo $wo['config']['site_url'].'/show_fund/'. $wo['story']['fund']['fund']['hashed_id']; ?>" data-ajax="?link1=show_fund&id=<?php echo($wo['story']['fund']['fund']['hashed_id']) ?>"><?php echo $wo['story']['fund']['fund']['title']; ?></a>
                </h4>
                <!--<h5><?php echo $wo['lang']['amount'] ?> : <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']].$wo['story']['fund']['amount']; ?></h5>-->
                <p><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']].$wo['story']['fund']['fund']['raised']; ?>  <?php echo $wo['lang']['raised_of']; ?> <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']].$wo['story']['fund']['fund']['amount']; ?></p>
              </div>
              <?php if ($wo['story']['fund']['fund']['amount'] > $wo['story']['fund']['fund']['raised']) { ?>
              <div class="wow_dontd_posts_right">
                <a class="btn" href="<?php echo $wo['config']['site_url'].'/show_fund/'. $wo['story']['fund']['fund']['hashed_id']; ?>" data-ajax="?link1=show_fund&id=<?php echo($wo['story']['fund']['fund']['hashed_id']) ?>"><?php echo $wo['lang']['donate'] ?></a>
              </div>
              <?php } ?>
            </div>
            <div class="fund_raise_bar">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $wo['story']['fund']['fund']['bar']; ?>%" aria-valuenow="<?php echo $wo['story']['fund']['fund']['bar']; ?>" aria-valuemin="0" aria-valuemax="<?php echo($wo['story']['fund']['fund']['amount']) ?>"></div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>


        <?php } ?>

        <?php if (!empty($wo['story']['fund_id']) && empty($wo['story']['parent_id'])) {
	 		$wo['story']['fund_data'] = GetFundingById($wo['story']['fund_id']);
         ?>

          <?php if (!empty($wo['story']['fund_data']['image'])): ?>
        <div class="post-file" id="fullsizeimg" style="width: 100%;margin-left: unset;">
          <img src="<?php echo $wo['story']['fund_data']['image']; ?>" alt="Picture">
          <div class="wow_dontd_posts">
            <div class="wow_dontd_posts_innr">
              <div class="wow_dontd_posts_left">
                <h4>
                  <a href="<?php echo $wo['config']['site_url'].'/show_fund/'. $wo['story']['fund_data']['hashed_id']; ?>" data-ajax="?link1=show_fund&id=<?php echo($wo['story']['fund_data']['hashed_id']) ?>"><?php echo $wo['story']['fund_data']['title']; ?></a>
                </h4>
                <!--<h5><?php echo $wo['lang']['amount'] ?> : <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']].$wo['story']['fund_data']['amount']; ?></h5>-->
                <p><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']].$wo['story']['fund_data']['raised']; ?>  <?php echo $wo['lang']['raised_of']; ?> <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']].$wo['story']['fund_data']['amount']; ?></p>
              </div>
              <?php if ($wo['story']['fund_data']['amount'] > $wo['story']['fund_data']['raised']) { ?>
              <div class="wow_dontd_posts_right">
                <a class="btn" href="<?php echo $wo['config']['site_url'].'/show_fund/'. $wo['story']['fund_data']['hashed_id']; ?>" data-ajax="?link1=show_fund&id=<?php echo($wo['story']['fund_data']['hashed_id']) ?>"><?php echo $wo['lang']['donate'] ?></a>
              </div>
            <?php } ?>
            </div>
            <div class="fund_raise_bar">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $wo['story']['fund_data']['bar']; ?>%" aria-valuenow="<?php echo $wo['story']['fund_data']['bar']; ?>" aria-valuemin="0" aria-valuemax="<?php echo($wo['story']['fund_data']['amount']) ?>"></div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>


        <?php } ?>
        <?php if (!empty($wo['story']['offer_id'])) { ?>
          <div class="post-fetched-url wo_post_fetch_event" id="fullsizeimg">
             <a href="<?php echo $wo['story']['offer']['url'];?>">
                <?php if (!empty($wo['story']['offer']['image'])) {?>
                   <img src="<?php echo $wo['story']['offer']['image'];?>"/>
                <?php } ?>
                <div class="fetched-url-text">
                   <div class="short_start_dt">
                      <b><?php echo $wo['lang']['end_date']." ".$wo['story']['offer']['expire_date'];?></b>
                   </div>
                   <h4><?php if (strlen($wo['story']['offer']['description']) > 175):?>
                      <?php echo mb_substr($wo['story']['offer']['description'],0,175,"UTF-8") . "..."; ?>
                      <?php else:?>
                      <?php echo $wo['story']['offer']['description']; ?>
                      <?php endif;?></h4>
                   <div class="url"><?php echo $wo['story']['offer']['offer_text'].' '.$wo['story']['offer']['discounted_items']; ?></div>
                </div>
                <div class="clear"></div>
             </a>
          </div>
        <?php } ?>



        <?php
        if (!empty($wo['story']['product_id'])) {
			$class = '';
            $small = '';
			$singleimg = '';
			if (count($wo['story']['product']['images']) == 1) {
                 $singleimg = 'wo_single_proimg';
            }
            if (count($wo['story']['product']['images']) == 2) {
                 $class = 'width-2';
            }
            if (count($wo['story']['product']['images']) > 1) {
                 $small = '_small';
            }
            if (count($wo['story']['product']['images']) > 2) {
                 $class = 'width-3';
            }
            if (count($wo['story']['product']['images']) > 3) {
             foreach (array_slice($wo['story']['product']['images'],0,3) as $key => $photo) {
              if ($key == 2) {
                  echo "<div onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");' class='album-collapse pointer'> 
                            <img src='".($photo['image_org'])."' class='image-file'>
                            <span>+".count(array_slice($wo['story']['product']['images'],2))."</span>
                        </div>
                        "; 
              }
              else{
                echo  "<img src='" . ($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                       onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
              }
              
             }
             foreach (array_slice($wo['story']['product']['images'],3) as $photo) {
                echo  "<img src='" . ($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer hidden' 
                      onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
             }
            }
            else{
              foreach ($wo['story']['product']['images'] as $photo) {
                echo  "<img src='" . ($photo['image_org']) ."' alt='image' class='" . $class . " " . $singleimg . " image-file pointer' 
                      onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
              }
            }
			echo '<br><br>';
            $symbol =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
            $text =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['text'])) ? $wo['currencies'][$wo['story']['product']['currency']]['text'] : $wo['config']['classified_currency'];
            $status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
            if ($wo['story']['product']['units'] > 0) {
            	$status = ($wo['story']['product']['status'] == 0) ? '<span class="product-description">' . $wo['lang']['in_stock'] . '</span>' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
            }
            $type = ($wo['story']['product']['type'] == 0) ? '<span class="product-description">' . $wo['lang']['new'] . '</span>' : '<span class="product-description">' . $wo['lang']['used'] . '</span><br>';
            echo '<div class="product-name"><h4 class="product-description">' . $wo['story']['product']['name'] . '</h4></div>';
			if (!empty($wo['story']['product']['location'])) {
               echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span> <span class="product-description"> ' . $wo['story']['product']['location'] . '</span></div><br>';
            }
            echo '<div class="product-name"><p class="product-description product-description-'.$wo['story']['product']['id'].'">' . $wo['story']['product']['description'] . '</p></div><br>';
            echo '<div class="wo_product_row"><div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag" color="#2196F3"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>' . $wo['lang']['type'] . '</span> ' . $type . '</div>';
			echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card" color="#349238"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>' . $wo['lang']['price'] . '</span> <span class="product-description" style="max-height: none;">' . $symbol . $wo['story']['product']['price'] . ' (' . $text . ')</span></div>';
            echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package" color="#9C27B0"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>' . $wo['lang']['status'] . '</span> ' . $status . '</div></div>';
            
          } 
        ?>
        <p dir="auto">
        <span data-translate-text="<?php echo $wo['story']['id']; ?>"> <?php echo $wo['story']['postText']; ?></span>
        <?php if (!empty($wo['story']['postFeeling']) && $extra_exists == 1) { ?>
        <span class="feeling-text"> — <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang']['feeling'];?> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
        <?php } ?>
        <?php if (!empty($wo['story']['postTraveling']) && $extra_exists == 1) { ?>
        <span class="feeling-text"> — <i class="fa fa-plane"></i> <?php echo $wo['lang']['traveling'];?><?php echo $wo['story']['postTraveling'];?></span>
        <?php } ?>
        <?php if (!empty($wo['story']['postWatching']) && $extra_exists == 1) { ?>
        <span class="feeling-text"> — <i class="fa fa-eye"></i> <?php echo $wo['lang']['watching'];?> <?php echo $wo['story']['postWatching'];?></span>
        <?php } ?>
        <?php if (!empty($wo['story']['postPlaying']) && $extra_exists == 1) { ?>
        <span class="feeling-text"> — <i class="fa fa-gamepad"></i> <?php echo $wo['lang']['playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
        <?php } ?>
         <?php if (!empty($wo['story']['postListening']) && $extra_exists == 1) { ?>
        <span class="feeling-text"> — <i class="fa fa-headphones"></i> <?php echo $wo['lang']['listening'];?> <?php echo $wo['story']['postListening'];?></span>
        <?php } ?>
        </p>
        <?php if(!empty($wo['story']['postYoutube'])) {  ?>
        <div class="post-youtube wo_video_post">
          <iframe id="ytplayer" type="text/html" width="100%" height="340" src="https://www.youtube.com/embed/<?php echo $wo['story']['postYoutube']; ?>?autoplay=0"
            frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
        </div>
        <?php } ?>
        <?php if(!empty($wo['story']['postPlaytube'])) {  ?>
        <div class="post-youtube wo_video_post">
          <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['playtube_url']; ?>/embed/<?php echo $wo['story']['postPlaytube']; ?>?autoplay=0&fullscreen=1"
            frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
        </div>
        <?php } ?>
        <?php if(!empty($wo['story']['postVimeo'])) {  ?>
        <div class="post-youtube wo_video_post">
          <iframe src="https://player.vimeo.com/video/<?php echo $wo['story']['postVimeo'];?>?byline=0&portrait=0" width="100%" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <?php } ?>
        <?php if(!empty($wo['story']['postFacebook'])) {  ?>
        <div class="post-youtube wo_video_post">
          <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/<?php echo $wo['story']['postFacebook'];?>&show_text=0" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
          <div class="clear"></div>
        </div>

        <?php } ?>
        <?php if(!empty($wo['story']['postDailymotion'])) {  ?>
        <div class="post-youtube wo_video_post">
          <iframe frameborder="0" width="100%" height="340" src="https://www.dailymotion.com/embed/video/<?php echo $wo['story']['postDailymotion']?>" allowfullscreen></iframe>
        </div>

        
        <?php } ?>
        <?php if(!empty($wo['story']['postVine'])) {  ?>
        <iframe src="https://vine.co/v/<?php echo $wo['story']['postVine']; ?>/embed/simple" width="100%" height="400" frameborder="0"></iframe>
        <?php } ?>
        <?php if(!empty($wo['story']['postSoundCloud'])) { ?>
        <iframe width="100%" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $wo['story']['postSoundCloud'];?>&auto_play=false"></iframe>
        <?php } ?>
        <?php if(!empty($wo['story']['postMap']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postVimeo']) && empty($wo['story']['postDailymotion']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postFile']) && ($wo['config']['google_map'] == 1 || $wo['config']['yandex_map'] == 1)) { ?>
        <div class="post-map">
        	<?php if ($wo['config']['yandex_map'] == 1) { ?>
        		<div id="share_place_<?php echo($wo['story']['id']) ?>" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 100%; height: 300px; padding: 0; margin: 0;"' : '') ?>></div>
					<script type="text/javascript">
        			<?php if (!empty($wo['story']['postMap'])) { ?>
        				setTimeout(function () {
        					var myMap;
					        ymaps.geocode("<?php echo($wo['story']['postMap']); ?>").then(function (res) {
					            myMap = new ymaps.Map('share_place_<?php echo($wo['story']['id']) ?>', {
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
        	<?php if ($wo['config']['google_map'] == 1) { ?>
          <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $wo['story']['postMap'];?>&zoom=13&size=600x250&maptype=roadmap&markers=color:red%7C<?php echo $wo['story']['postMap'];?>&key=<?php echo $wo['config']['google_map_api'];?>" width="100%">
          <?php } ?>
        </div>
        <?php } ?>
        <?php if(!empty($wo['story']['postLink']) && empty($wo['story']['postVine']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile'])) { ?>
        	<?php if (!preg_match("/(http|https):\/\/twitter\.com\/[a-zA-Z0-9_]+\/status\/[0-9]+/", $wo['story']['postLink']) && !preg_match("/(http|https):\/\/www.tiktok\.com\/(.*)\/video\/(.*)+/", $wo['story']['postLink']) && !preg_match("/^(http:\/\/|https:\/\/|www\.).*(\.mp4)$/", $wo['story']['postLink'])) { ?>
        <div class="post-fetched-url wo_post_fetch_link">
          <a href="<?php echo $wo['story']['postLink'];?>" target="_blank">
            <?php if (!empty($wo['story']['postLinkImage'])) {?>
            <div class="post-fetched-url-con">
              <img src="<?php echo $wo['story']['postLinkImage'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['postLinkTitle'];?>"/>
			        <div class="url">
                <?php 
                  $parse = parse_url($wo['story']['postLink']);
                  echo $parse['host'];
                  ?>
              </div>
            </div>
            <?php } ?>
            <div class="fetched-url-text">
        			<h4><?php echo $wo['story']['postLinkTitle'];?></h4>
        			<div class="description"><?php echo $wo['story']['postLinkContent'];?></div>
            </div>
            <div class="clear"></div>
            </a>
        </div>
        <?php }
        elseif (preg_match("/(http|https):\/\/www.tiktok\.com\/(.*)\/video\/(.*)+/", $wo['story']['postLink'])) {
        	echo html_entity_decode($wo['story']['postLinkContent']);
        }elseif (preg_match("/^(http:\/\/|https:\/\/|www\.).*(\.mp4)$/", $wo['story']['postLink'])) {
         ?>
         <div class="post-file wo_shared_doc_file" id="fullsizeimg">
            <?php
               $wo['media'] = array('storyId' => $wo['story']['id'],
                                    'filename' => $wo['story']['postLink'],
                                    'video_thumb' => '');
               $wo['wo_ad_id'] = '';
               $wo['rvad_con'] = '';
               echo lui_LoadPage('players/video');
               ?>
         </div>
         <?php
        }
        else{ ?>
   <?php echo html_entity_decode($wo['story']['postLinkContent']);?>
 <?php } ?>
        <?php } ?>
        <?php if(!empty($wo['story']['page_event_id'])) { ?>
        <div class="post-fetched-url wo_post_fetch_event">
          <a href="<?php echo $wo['story']['event']['url'];?>">
            <?php if (!empty($wo['story']['event']['cover'])) {?>
            <div class="post-fetched-url-con">
              <img src="<?php echo $wo['story']['event']['cover'];?>" class="<?php echo lui_RightToLeft('pull-left');?>"/>
			  <div class="description">
				<p>
				<?php if (strlen($wo['story']['event']['description']) > 175):?>
					<?php echo mb_substr($wo['story']['event']['description'],0,175,"UTF-8") . "..."; ?>
				<?php else:?>
					<?php echo $wo['story']['event']['description']; ?>
				<?php endif;?>
				</p>
			  </div>
            </div>
            <?php } ?>
            <div class="fetched-url-text">
              <h4><?php echo $wo['story']['event']['name'];?></h4>
			  <div class="url">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> <?php echo $wo['story']['event']['start_date'];?> - <?php echo $wo['story']['event']['end_date'];?>
              </div>
            </div>
            <div class="clear"></div>
            </a>
        </div>
        <?php } ?>
        <?php if(!empty($wo['story']['blog_id'])) { ?>
        <div class="post-fetched-url wo_post_fetch_blog">
          <a href="<?php echo $wo['story']['blog']['url'];?>">
			<div class="fetched-url-text">
			  <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> <?php echo $wo['story']['blog']['title'];?></h4>
              <div class="description"><?php echo $wo['story']['blog']['description'];?></div>
            </div>
            <?php if (!empty($wo['story']['blog']['thumbnail'])) {?>
            <div class="post-fetched-url-con">
              <img src="<?php echo $wo['story']['blog']['thumbnail'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
            </div>
            <?php } ?>
            <div class="clear"></div>
            </a>
        </div>
        <?php } ?>
        <?php if(!empty($wo['story']['forum_id']) && !empty($wo['story']['forum'])) { ?>
<div class="post-fetched-url wo_post_fetch_blog">
   <a href="<?php echo $wo['config']['site_url'].'/forums/'.$wo['story']['forum']['id'];?>">
      <div class="fetched-url-text">
         <h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
               <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
               <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <?php echo $wo['story']['forum']['name'];?>
         </h4>
         <div class="description"><?php echo $wo['story']['forum']['description'];?></div>
      </div>
      <div class="clear"></div>
   </a>
</div>
<?php } ?>
<?php if(!empty($wo['story']['thread_id']) && !empty($wo['story']['thread'])) { ?>
<div class="post-fetched-url wo_post_fetch_blog">
   <a href="<?php echo $wo['config']['site_url'].'/forums/thread/'.$wo['story']['thread_id'];?>">
      <div class="fetched-url-text">
         <h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
               <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
               <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <?php echo $wo['story']['thread']['headline'];?>
         </h4>
      </div>
      <div class="clear"></div>
   </a>
</div>
<?php } ?>
        <?php if(!empty($wo['story']['postFile'])) { ?>

        <div class="post-file" id="fullsizeimg">
          <!-- <div style="width: 100%;height: 100%;position: absolute;background-color: rgba(0,0,0,0.3);filter: blur(5px);"></div> -->
            <?php
            $media = array(
                'type' => 'post',
                'storyId' => $wo['story']['id'],
                'filename' => $wo['story']['postFile'],
                'name' => $wo['story']['postFileName'],
                'postFileThumb' => $wo['story']['postFileThumb'],
            );
            echo lui_DisplaySharedFile($media, '', $wo['story']['cache']);
            ?>
        </div>

        <?php } ?>
        <?php if ($wo['config']['live_video'] == 1 && !empty($wo['story']['stream_name'])) { ?>
			<div class="post-file" <?php echo $wo['story']['is_still_live'] ? 'style="/*height: 440px;*/"' : ''; ?> id="fullsizeimg">
				<?php if ($wo['story']['is_still_live']) { ?>
					<div class="embed-responsive embed-responsive-4by3">
						<iframe src="https://viewer.millicast.com/v2?streamId=<?php echo($wo['config']['live_account_id']) ?>/<?php echo($wo['story']['stream_name']) ?>" class="embed-responsive-item"></iframe>
						<div class="wow_liv_counter"><span id="live_word_<?php echo($wo['story']['id']) ?>"><?php echo $wo['lang']['live']; ?></span> <span id="live_count_<?php echo($wo['story']['id']) ?>"> <?php echo $wo['story']['live_sub_users']; ?></span></div>
					</div>
				<?php } else{
					$wo['media'] = array('filename' => 'https://viewer.millicast.com/v2?streamId='.$wo['config']['live_account_id'].'/'.$wo['story']['stream_name']);
					echo lui_LoadPage('players/chat-video');
					}
				?>
			</div>
        <?php } ?>
        <?php if (lui_IsUrl($wo['story']['postSticker'])): ?>
          <div class="post-file wo_video_post">
            <?php if (strpos('.mp4', $wo['story']['postSticker'])) { ?>
            <video autoplay loop><source src="<?php echo $wo['story']['postSticker']; ?>" type="video/mp4"></video>
            <?php } else { ?>
            <img src="<?php echo $wo['story']['postSticker']; ?>" alt="GIF">
            <?php } ?>
          </div>
        <?php endif; ?>
        <?php if (lui_IsUrl($wo['story']['postPhoto'])): ?>
          <div class="post-file" id="fullsizeimg">
            <img src="<?php echo $wo['story']['postPhoto']; ?>" alt="Picture">
          </div>
        <?php endif; ?>
        <?php if(!empty($wo['story']['postRecord'])) { ?>
        <div class="post-file">
            <?php  
              $media = array(
                'type' => 'post',
                'storyId' => $wo['story']['id'],
                'filename' => $wo['story']['postRecord'],
                'name' => ''
              );
              echo  lui_DisplaySharedFile($media,'record');
            ?>
        </div>
        <?php } ?>
        <div id="fullsizeimg" style="position: relative;">
          <?php if (!empty($wo['story']['photo_album']) && $wo['story']['blur'] == 1) { ?>
            <div class="post-file show_album_<?php echo $wo['story']['id']; ?> blur_multi_images" id="fullsizeimg">
              <button class='btn btn-main image_blur_btn remover_blur_btn_<?php echo $wo['story']['id']; ?>' onclick='Wo_RemoveBlurAlbum(this,<?php echo $wo['story']['id']; ?>)'><?php echo $wo['lang']['view_image']; ?></button>
                  <img src="<?php echo(lui_GetMedia($wo['story']['photo_album'][0]['image_org'])) ?>" alt='image' class='image-file pointer image_blur remover_blur_<?php echo $wo['story']['id']; ?>'>
                </div>
          <?php } ?>
        <?php if (!empty($wo['story']['photo_album'])) {
           $class = '';
           $small = '';
           if (count($wo['story']['photo_album']) == 2) {
                $class = 'width-2';
           }
           if (count($wo['story']['photo_album']) > 1) {
                $small = '_small';
           }
           if (count($wo['story']['photo_album']) > 2) {
                $class = 'width-3';
           }
           $delete  = '';
           $onhover = '';
			
			if (count($wo['story']['photo_album']) == 3) {
				echo "<div class='wo_adaptive_media'>";
             foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true) {
                $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
			 
			 echo "</div>";
			}
			
			else if (count($wo['story']['photo_album']) == 4) {
				echo "<div class='wo_adaptive_media_4'>";
             foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true) {
                $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
			 
			 echo "</div>";
			}
			
			else if (count($wo['story']['photo_album']) == 5) {
				echo "<div class='wo_adaptive_media_5'>";
             foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true) {
                $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
			 
			 echo "</div>";
			}
			
			else if (count($wo['story']['photo_album']) > 3) {
             foreach (array_slice($wo['story']['photo_album'],0,3) as $key => $photo) {
              if ($key == 2) {
                  echo "<div onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");' class='album-collapse pull-left pointer'> 
                            <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                            <span>+".count(array_slice($wo['story']['photo_album'],2))."</span>
                        </div>
                        "; 
              }
              else{
                if ($wo['story']['admin'] === true) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file  pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                }
             }
             foreach (array_slice($wo['story']['photo_album'],3) as $photo) {
                if ($wo['story']['admin'] === true) {
                $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer hidden' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
          }
          else{
              foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                echo  "<div style='text-align:center;width: 100%;' class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
              }
          }
        } 
        ?>
        <?php if ($wo['story']['multi_image'] == 1) {
          if ($wo['story']['blur'] == 1) { ?>
            <div class="post-file show_album_<?php echo $wo['story']['id']; ?> blur_multi_images" id="fullsizeimg">
              <button class='btn btn-main image_blur_btn remover_blur_btn_<?php echo $wo['story']['id']; ?>' onclick='Wo_RemoveBlurAlbum(this,<?php echo $wo['story']['id']; ?>)'><?php echo $wo['lang']['view_image']; ?></button>
                  <img src="<?php echo(lui_GetMedia($wo['story']['photo_multi'][0]['image_org'])) ?>" alt='image' class='image-file pointer image_blur remover_blur_<?php echo $wo['story']['id']; ?>'>
                </div>
          <?php }
           $class = '';
           $small = '';
           if (count($wo['story']['photo_multi']) == 2) {
                $class = 'width-2';
           }
           if (count($wo['story']['photo_multi']) > 1) {
                $small = '_small';
           }
           if (count($wo['story']['photo_multi']) > 2) {
                $class = 'width-3';
           }
			
			if (count($wo['story']['photo_multi']) == 3) {
				echo "<div class='wo_adaptive_media'>";
             foreach ($wo['story']['photo_multi'] as $photo) {
                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
			 echo "</div>";
			}
			
			else if (count($wo['story']['photo_multi']) == 4) {
				echo "<div class='wo_adaptive_media_4'>";
             foreach ($wo['story']['photo_multi'] as $photo) {
                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
			 echo "</div>";
			}
			
			else if (count($wo['story']['photo_multi']) == 5) {
				echo "<div class='wo_adaptive_media_5'>";
             foreach ($wo['story']['photo_multi'] as $photo) {
                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
             }
			 echo "</div>";
			}
			
           else if (count($wo['story']['photo_multi']) > 3) {
             foreach (array_slice($wo['story']['photo_multi'],0,3) as $key => $photo) {
              if ($key == 2) {
                  echo "<div onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");' class='album-collapse pointer'> 
                            <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                            <span>+".count(array_slice($wo['story']['photo_multi'],2))."</span>
                        </div>
                        "; 
              }
              else{
                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                       onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'>";
              }
              
             }
             foreach (array_slice($wo['story']['photo_multi'],3) as $photo) {
                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer hidden' 
                      onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'>";
             }
           }
		   else{
              foreach ($wo['story']['photo_multi'] as $photo) {
                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                      onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'>";
              }
           }
        }
        ?>
        <div class="clear"></div>
        </div>
        <?php
        if ($wo['story']['poll_id'] == 1) {
           echo lui_LoadPage('story/entries/options');
        }
        ?>
        <div class="clear"></div>
      </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>


			        </div>
			        <input type="hidden" id="SearchForInputType" name="type" value="timeline">
			        <input type="hidden" id="SearchForInputPostId" name="post_id">
			        <input type="hidden" id="SearchForInputTypeId" name="type_id">
				    <div class="clear"></div>
			</div>
			<div class="modal-footer">
				<button id="share_post_on_btn" type="button" class="btn btn-main"><?php echo $wo['lang']['share']; ?></button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function () {
	<?php if (!empty($wo['story']['product_id'])): ?>
  ReadMoreText("#post-<?php echo $wo['story']['id']; ?> .product-description-<?php echo $wo['story']['product_id']; ?>");
  <?php endif; ?>
  ReadMoreText("#post-<?php echo $wo['story']['id']; ?> .post-description p");
    $("#post-<?php echo $wo['story']['id']; ?> .textarea").triggeredAutocomplete({
       hidden: '#hidden_inputbox_comment',
       source: Wo_Ajax_Requests_File() + "?f=mention",
       trigger: "@" 
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('.dropdown-menu.post-recipient, .dropdown-menu.post-options, .wo_emoji_post').click(function (e) {
      e.stopPropagation();
    });
});

jQuery(document).click(function(event){
    if (!(jQuery(event.target).closest(".remove_combo_on_click").length)) {
        jQuery('.remove_combo_on_click').removeClass('comment-toggle');
    }
});
</script>