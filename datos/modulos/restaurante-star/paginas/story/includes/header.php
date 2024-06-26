<?php 

if (!empty($wo['story']['parent_id'])) {
   $post_shared_from = $wo['post_shared_from'] = lui_PostData($wo['story']['parent_id']);
   ?>
<div class="post-heading">
   <div class="<?php echo lui_RightToLeft('pull-left');?> image">
      <a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>" class="avatar wow_post_usr_ava <?php if($wo['story']['publisher']['verified'] == 1) { ?>wow_post_usr_ava_active<?php } ?>">
         <img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" alt="<?php echo $wo['story']['publisher']['name']; ?> foto de perfil">
         <?php if($wo['story']['publisher']['verified'] == 1) { ?>
            <span class="verified-color">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo ($wo['story']['page_id'] > 0 ? $wo['lang']['verified_page'] : $wo['lang']['verified_user']);?>" data-toggle="tooltip">
                  <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
               </svg>
            </span>
            <?php } ?>
      </a>
   </div>
   <div>
      <?php  if ($wo['story']['admin'] === true || $wo['story']['group_admin'] === true) { ?>
      <span class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
               <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
         </a>
         <ul class="dropdown-menu post-privacy-menu post-options" role="menu">
            <?php if ($wo['story']['admin'] === true && empty($wo['story']['product_id']) && empty($wo['story']['shared_from'])) { ?>
            <li>
				<div class="pointer" onclick="Wo_OpenPostEditBox(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['edit_post'];?></b>
						<p><?php echo $wo['lang']['edit_post_tx'];?></p>
					</div>
				</div>
            </li>
            <?php } else if (!empty($wo['story']['product_id'])) { 
               if ($wo['story']['product']['status'] == 0) { ?>
             <li>
               <div class="pointer mark-as-sold-post" onclick="Wo_MarkAsSold(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['product_id']; ?>);">
               <?php echo $wo['lang']['mark_as_sold']?>
               </div>
               </li>
               <li>
               <a class="pointer" href="<?php echo lui_SeoLink('index.php?link1=edit-product&id=' . $wo['story']['product_id']);?>">
               <?php echo $wo['lang']['edit_product']?>
               </a>
               </li> 
            <?php } } ?>
            <li>
				<div class="pointer" onclick="Wo_OpenPostDeleteBox(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['delete_post'];?></b>
						<p><?php echo $wo['lang']['delete_post_tx'];?></p>
					</div>
				</div>
            </li>
            <li>
				<div class="pointer disable-comments" onclick="Wo_DisableComment(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['comments_status']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M5,5V7H19V5H5M5,9V11H13V9H5M5,13V15H15V13H5Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo ($wo['story']['comments_status'] == 1) ? $wo['lang']['disable_comments'] : $wo['lang']['enable_comments'];?></b>
						<p><?php echo $wo['lang']['comments_status_tx'];?></p>
					</div>
				</div>
            </li>
            <li>
               <hr>
            </li>
            <li>
				<a href="<?php echo $wo['story']['url'];?>" target="_blank">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['open_post_in_new_tab'];?></b>
						<p><?php echo $wo['lang']['open_post_in_new_tab_tx'];?></p>
					</div>
				</a>
            </li>
            <?php if (empty($wo['story']['recipient']) && $wo['story']['admin'] === true) { ?>
            <?php if ($wo['story']['is_group_post'] == false) { ?>
            <!-- <li>
               <?php
                  $pin_post_id = $wo['story']['publisher']['id'];
                  $pin_post_text = 'profile';
                  if (!empty($wo['story']['page_id'])) {
                    $pin_post_id = $wo['story']['page_id'];
                    $pin_post_text = 'page';
                  } else if (!empty($wo['story']['group_id'])) {
                    $pin_post_id = $wo['story']['group_id'];
                    $pin_post_text = 'group';
                  }  else if (!empty($wo['story']['event_id'])) {
                    $pin_post_id = $wo['story']['event_id'];
                    $pin_post_text = 'event';
                  }
                  ?>
                 <div class="pin-post pointer" onclick="Wo_PinPost(<?php echo $wo['story']['id']; ?>, <?php echo $pin_post_id;?>, '<?php echo $pin_post_text; ?>');">
                 <?php if($wo['story']['is_post_pinned'] === true) { ?>
               <?php echo $wo['lang']['unpin_post'];?>
                 <?php } else { ?>
               <?php echo $wo['lang']['pin_post'];?>
                 <?php } ?>
                 </div>
               </li> -->
            <?php } } ?>
            <?php if (!empty($wo['story']['album_name']) && ($wo['story']['group_admin'] === false || $wo['story']['admin'] === true)) {?>
            <!-- <li>
               <a href="<?php echo lui_SeoLink('index.php?link1=create-album&album=' . $wo['story']['id']);?>" >
               <?php echo $wo['lang']['add_photos'];?>
               </a>
               </li> -->
            <?php } ?>
            <?php $hr = 0; if ($wo['config']['pro'] == 1 && ($wo['story']['group_admin'] === false || $wo['story']['admin'] === true)) { ?>
            <!-- <li>
               <?php if ($wo['user']['is_pro'] == 0) { ?>
               <a href="<?php echo lui_SeoLink('index.php?link1=go-pro');?>" data-ajax="?link1=go-pro">
               <?php echo $wo['lang']['boost_post']; ?>
               </a>
               <?php } else if ($wo['user']['is_pro'] == 1 && $wo['user']['pro_type'] == 1) { $hr = 1;?>
               
               <?php } else if ($wo['user']['is_pro'] == 1 && $wo['user']['pro_type'] > 1) { ?>
               <?php if ($wo['story']['is_post_boosted'] == 0) { ?>
               <div class="boost-post pointer" onclick="Wo_BoostPost(<?php echo $wo['story']['id']; ?>)">
               <?php echo $wo['lang']['boost_post']; ?>
               </div>
               <?php } else { ?>
               <div class="boost-post pointer" onclick="Wo_BoostPost(<?php echo $wo['story']['id']; ?>)">
               <?php echo $wo['lang']['unboost_post']; ?>
               </div>
               <?php } ?>
               <?php } ?>
               </li> -->
            <?php if ($hr == 0) { ?>
            <?php } } ?>
         </ul>
      </span>
      <?php  } elseif ($wo['loggedin'] == true) { ?>
      <span class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="pointer">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                  <polyline points="6 9 12 15 18 9"></polyline>
               </svg>
            </span>
         </a>
         <ul class="dropdown-menu post-privacy-menu post-options post-recipient" role="menu"  >
            <?php if (lui_IsAdmin()): ?>
            <li>
				<div class="pointer" onclick="Wo_OpenPostDeleteBox(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['delete_post'];?></b>
						<p><?php echo $wo['lang']['delete_post_tx'];?></p>
					</div>
				</div>
            </li>
            <?php endif; ?>
            <!-- <li>
               <div class="save-post pointer" class="save-post" onclick="Wo_SavePost(<?php echo $wo['story']['id']; ?>);">
               <?php if($wo['story']['is_post_saved'] === true) { ?>
               <?php echo $wo['lang']['unsave_post'];?>
               <?php } else { ?>
               <?php echo $wo['lang']['save_post'];?>
               <?php } ?>
               </div>
               </li> -->
            <li>
				<div  class="report-post pointer" onclick="Wo_ReportPost(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M13 13H11V7H13M11 15H13V17H11M15.73 3H8.27L3 8.27V15.73L8.27 21H15.73L21 15.73V8.27L15.73 3Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b>
							<?php if($wo['story']['is_post_reported'] === true) { ?>
								<?php echo $wo['lang']['unreport_post'];?>
							<?php } else { ?>
								<?php echo $wo['lang']['report_post'];?>
							<?php } ?>
						</b>
						<p><?php echo $wo['lang']['report_post_tx'];?></p>
					</div>
				</div>
            </li>
            <li>
				<a href="<?php echo $wo['story']['url'];?>" target="_blank">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['open_post_in_new_tab'];?></b>
						<p><?php echo $wo['lang']['open_post_in_new_tab_tx'];?></p>
					</div>
				</a>
            </li>
            <li>
				<a class="pointer" onclick="Wo_HidePost(<?php echo $wo['story']['id'];?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M11.83,9L15,12.16C15,12.11 15,12.05 15,12A3,3 0 0,0 12,9C11.94,9 11.89,9 11.83,9M7.53,9.8L9.08,11.35C9.03,11.56 9,11.77 9,12A3,3 0 0,0 12,15C12.22,15 12.44,14.97 12.65,14.92L14.2,16.47C13.53,16.8 12.79,17 12,17A5,5 0 0,1 7,12C7,11.21 7.2,10.47 7.53,9.8M2,4.27L4.28,6.55L4.73,7C3.08,8.3 1.78,10 1,12C2.73,16.39 7,19.5 12,19.5C13.55,19.5 15.03,19.2 16.38,18.66L16.81,19.08L19.73,22L21,20.73L3.27,3M12,7A5,5 0 0,1 17,12C17,12.64 16.87,13.26 16.64,13.82L19.57,16.75C21.07,15.5 22.27,13.86 23,12C21.27,7.61 17,4.5 12,4.5C10.6,4.5 9.26,4.75 8,5.2L10.17,7.35C10.74,7.13 11.35,7 12,7Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['hide_post'];?></b>
						<p><?php echo $wo['lang']['hide_post_tx'];?></p>
					</div>
				</a>    
            </li>
         </ul>
      </span>
      <?php } ?>
   </div>
   <div class="meta">
      <div class="title h5">
         <span class="user-popover" data-type="<?php echo $wo['story']['publisher']['type']; ?>" data-id="<?php echo $wo['story']['publisher']['id']; ?>">
            <a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']; ?>"><b><?php echo $wo['story']['publisher']['name']; ?></b></a>
         </span>
		 
		 <?php if (!empty($wo['story']['publisher']['is_open_to_work']) && $wo['config']['website_mode'] == 'linkedin') { ?>
			<span class="wo_open_job_badge" title="<?php echo($wo['lang']['open_to_work']); ?>" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg></span>
		<?php } ?>
		 
         <?php if (isset($wo['story']['publisher']['is_pro'])) { 
            if(lui_IsUserPro($wo['story']['publisher']['is_pro']) === true) { ?>
         <?php 
            $user_pro_type = lui_GetUserProType($wo['story']['publisher']['pro_type']);
            ?>
         <span class="wo_post_pro_ico" style="background:<?php echo $user_pro_type['color_name'];?>">
         <?php 
            if (!empty(in_array($wo['story']['publisher']['pro_type'], array_keys($wo['pro_packages'])) && !empty($wo['pro_packages'][$wo['story']['publisher']['pro_type']]['image'])) && $_COOKIE['mode'] == 'day') { ?>
         <img src="<?php echo($wo['pro_packages'][$wo['story']['publisher']['pro_type']]['image']) ?>" class="pro_packages_icon_inline">
         <?php }
         elseif(!empty(in_array($wo['story']['publisher']['pro_type'], array_keys($wo['pro_packages'])) && !empty($wo['pro_packages'][$wo['story']['publisher']['pro_type']]['night_image'])) && $_COOKIE['mode'] == 'night'){ ?>
            <img src="<?php echo($wo['pro_packages'][$wo['story']['publisher']['pro_type']]['night_image']) ?>" class="pro_packages_icon_inline">
         <?php }
         else{ ?>
         <i class="fa fa-<?php echo $user_pro_type['icon'];?> fa-fw" title="<?php echo $user_pro_type['type_name'];?>" data-toggle="tooltip"></i>
         <?php } ?>
         </span>
         <?php } } ?>
         <span class="user-popover" data-type="<?php echo $wo['story']['shared_from']['type']; ?>" data-id="<?php echo $wo['story']['shared_from']['id']; ?>">         
         <span><?php echo $wo['lang']['shared_a_post']; ?></span> 
         </span>
         <span>  
         <a href="<?php echo $post_shared_from['url']; ?>" class="pointer"><span style="color: #666;"><?php echo strtolower($wo['lang']['post']); ?></span></a>
         </span>
         &nbsp;
         <?php if (empty($wo['story']['parent_id'])) { ?>
         <?php if ($wo['story']['recipient_exists'] == true) {  ?>
         <?php echo $wo['lang']['to']; ?>
         <span class="user-popover" data-type="<?php echo $wo['story']['recipient']['type']; ?>" data-id='<?php echo $wo['story']['recipient']['id']; ?>'>
            <a href="<?php echo $wo['story']['recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['recipient']['username']; ?>">
            <b>
            <?php echo $wo['story']['recipient']['name']; ?>
            </b>
            </a>
            <?php if($wo['story']['recipient']['verified'] == 1) { ?> 
            <span class="verified-color">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo ($wo['story']['page_id'] > 0 ? $wo['lang']['verified_page'] : $wo['lang']['verified_user']);?>" data-toggle="tooltip">
                  <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
               </svg>
            </span>
            <?php } ?>
         </span>
         <?php } ?>
         <?php if (!empty($wo['story']['page_event_id'])) {?>
         <small class="small-text"> <?php echo $wo['lang']['created_new_event'] ?></small>
         <?php } ?>
         <?php if (!empty($wo['story']['fund_id']) && empty($wo['story']['parent_id'])) {?>
         <small class="small-text"> <?php echo $wo['lang']['created_donation_request'] ?></small>
         <?php } ?>
         <?php if (!empty($wo['story']['fund_raise_id']) && empty($wo['story']['parent_id'])) {?>
         <small class="small-text"> <?php echo $wo['lang']['donated_to_request'] ?></small>
         <?php } ?>
         <?php if (!empty($wo['story']['offer_id']) && empty($wo['story']['parent_id'])) {?>
         <small class="small-text"> <?php echo $wo['lang']['created_offer'] ?></small>
         <?php } ?>
         <?php if (!empty($wo['story']['event_id']) && $wo['page'] != 'events') {  ?>
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M14 16.94V12.94H5.08L5.05 10.93H14V6.94L19 11.94Z" /></svg> <a href="<?php echo $wo['story']['event']['url']; ?>" data-ajax="?link1=show-event&eid=<?php echo $wo['story']['event']['id']; ?>"><b><?php echo $wo['story']['event']['name']; ?></b></a>
         <?php } ?>
         <?php if ($wo['story']['group_recipient_exists'] == true && $wo['page'] != 'group') {  ?>
         <?php echo $wo['lang']['to']; ?>
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
         <?php }else{$extra_exists = 1;} ?>
      </div>
      <h6>
         <span class="time">
         <a  style="color:#9197a3" class="ajax-time" href="<?php echo $wo['story']['url'];?>" title="<?php echo date('c',$wo['story']['time']); ?>" target="_blank"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></a>
         </span>
         <?php if (strlen($wo['story']['postText']) >= 2 && ($wo['config']['google_translate'] == 1 || $wo['config']['yandex_translate'] == 1)): ?>
         <span onclick="Wo_Translate($(this).attr('id'),$(this).attr('data-language'))" title="<?php echo $wo['lang']['translate'];?>" class="pointer time" id="<?php echo $wo['story']['id']; ?>" data-language="<?php echo DetermineUserLang(); ?>" data-trans-btn="<?php echo $wo['story']['id']; ?>">
            - <?php echo $wo['lang']['translate'];?>
            </span>
         <?php endif ?>
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
<?php }elseif (empty($wo['story']['parent_id'])) {
   if ($wo['config']['shout_box_system'] == 1 && $wo['story']['postPrivacy'] == 4) {
      $anonymous = true;
   $wo['story']['publisher']['username'] = 'anonymous';
   $wo['story']['publisher']['name'] = $wo['lang']['anonymous'];
   $wo['story']['publisher']['avatar'] = lui_GetMedia('upload/photos/incognito.png');
   $wo['story']['publisher']['verified'] = 0;
   $wo['story']['publisher']['type'] = '';
   $wo['story']['publisher']['url'] = 'javascript:void(0)';
}
   ?>
<div class="post-heading">
   <?php //if (empty($current_post['parent_id'])) { ?>
   <!-- Hide dropdown -->
   <div>
      <?php  if ($wo['story']['admin'] === true || $wo['story']['group_admin'] === true) { ?>
      <span class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo"><g fill-rule="evenodd" transform="translate(-446 -350)"><path d="M458 360a2 2 0 1 1-4 0 2 2 0 0 1 4 0m6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0"></path></g></svg>
         </a>
         <ul class="dropdown-menu post-privacy-menu post-options" role="menu">
            
            <?php if ($wo['story']['admin'] === true && empty($wo['story']['product_id']) && empty($wo['story']['shared_from'])) { ?>
            <li>
				<div class="pointer" onclick="Wo_OpenPostEditBox(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['edit_post'];?></b>
						<p><?php echo $wo['lang']['edit_post_tx'];?></p>
					</div>
				</div>
            </li>
            <?php } else if (!empty($wo['story']['product_id'])) { 
               if ($wo['story']['product']['status'] == 0) { ?>
            <li>
				<a class="pointer" href="<?php echo lui_SeoLink('index.php?link1=edit-product&id=' . $wo['story']['product_id']);?>">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['edit_product'];?></b>
						<p><?php echo $wo['lang']['edit_product_tx'];?></p>
					</div>
				</a>
            </li>
            <?php } } ?>
            <li>
				<div class="pointer" onclick="Wo_OpenPostDeleteBox(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['delete_post'];?></b>
						<p><?php echo $wo['lang']['delete_post_tx'];?></p>
					</div>
				</div>
            </li>
            <li>
				<div class="pointer disable-comments" onclick="Wo_DisableComment(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['comments_status']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M5,5V7H19V5H5M5,9V11H13V9H5M5,13V15H15V13H5Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo ($wo['story']['comments_status'] == 1) ? $wo['lang']['disable_comments'] : $wo['lang']['enable_comments'];?></b>
						<p><?php echo $wo['lang']['comments_status_tx'];?></p>
					</div>
				</div>
            </li>
            <li>
				<hr>
            </li>
            <li>
				<a href="<?php echo $wo['story']['url'];?>" target="_blank">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['open_post_in_new_tab'];?></b>
						<p><?php echo $wo['lang']['open_post_in_new_tab_tx'];?></p>
					</div>
				</a>
            </li>
            <li>
               <hr>
            </li>
        
         </ul>
      </span>
      <?php  } elseif ($wo['loggedin'] == true) { ?>
      <span class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="pointer">
               <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo"><g fill-rule="evenodd" transform="translate(-446 -350)"><path d="M458 360a2 2 0 1 1-4 0 2 2 0 0 1 4 0m6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0"></path></g></svg>
            </span>
         </a>
         <ul class="dropdown-menu post-privacy-menu post-options post-recipient" role="menu"  >
            <?php if (lui_IsAdmin()): ?>
            <li>
				<div class="pointer" onclick="Wo_OpenPostDeleteBox(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['delete_post'];?></b>
						<p><?php echo $wo['lang']['delete_post_tx'];?></p>
					</div>
				</div>
            </li>
            <?php endif; ?>
            <li>
				<div class="save-post pointer" class="save-post" onclick="Wo_SavePost(<?php echo $wo['story']['id']; ?>);">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M17,3H7A2,2 0 0,0 5,5V21L12,18L19,21V5C19,3.89 18.1,3 17,3Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b>
							<?php if($wo['story']['is_post_saved'] === true) { ?>
								<?php echo $wo['lang']['unsave_post'];?>
							<?php } else { ?>
								<?php echo $wo['lang']['save_post'];?>
							<?php } ?>
						</b>
						<p><?php echo $wo['lang']['save_post_tx'];?></p>
					</div>
				</div>
            </li>
            <li>
				<a href="<?php echo $wo['story']['url'];?>" target="_blank">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" /></svg>
					&nbsp;&nbsp;&nbsp;
					<div>
						<b><?php echo $wo['lang']['open_post_in_new_tab'];?></b>
						<p><?php echo $wo['lang']['open_post_in_new_tab_tx'];?></p>
					</div>
				</a>
            </li>
         </ul>
      </span>
      <?php } ?>
   </div>
   <!-- Hide dropdown -->
   <?php //} ?>
   <!-- Hide dropdown -->
   <div class="meta">
      <div class="title h5">
      <?php if (!isset($anonymous)) { ?>
      <?php }else{ ?>
         <b><?php echo $wo['story']['publisher']['name']; ?></b>
         <?php } ?>
         <?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
         <span class="user-popover" data-type="<?php echo $wo['story']['shared_from']['type']; ?>" data-id="<?php echo $wo['story']['shared_from']['id']; ?>">
            <span><?php echo $wo['lang']['shared']; ?></span> 
            <a href="<?php echo $wo['story']['shared_from']['url']; ?>" class="pointer no_decor" data-ajax="?link1=timeline&u=<?php echo $wo['story']['shared_from']['username']; ?>"><b><?php echo $wo['story']['shared_from']['name']; ?></b></a>
            <?php if($wo['story']['shared_from']['verified'] == 1) { ?>
            <span class="verified-color">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo ($wo['story']['page_id'] > 0 ? $wo['lang']['verified_page'] : $wo['lang']['verified_user']);?>" data-toggle="tooltip">
                  <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
               </svg>
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
         <span><span style="color: #666;" class="was_live_text_<?php echo($wo['story']['id']) ?>"><?php echo ($wo['story']['is_still_live'] ? $wo['lang']['is_live'] : $wo['lang']['was_live']); ?></span></span>
      <?php } ?>
         <?php if ($wo['story']['recipient_exists'] == true) {  ?>
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M14 16.94V12.94H5.08L5.05 10.93H14V6.94L19 11.94Z" /></svg>
         <span class="user-popover" data-type="<?php echo $wo['story']['recipient']['type']; ?>" data-id='<?php echo $wo['story']['recipient']['id']; ?>'>
            <a href="<?php echo $wo['story']['recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['recipient']['username']; ?>">
            <b>
            <?php echo $wo['story']['recipient']['name']; ?>
            </b>
            </a>
            <?php if($wo['story']['recipient']['verified'] == 1) { ?> 
            <span class="verified-color">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo ($wo['story']['page_id'] > 0 ? $wo['lang']['verified_page'] : $wo['lang']['verified_user']);?>" data-toggle="tooltip">
                  <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
               </svg>
            </span>
            <?php } ?>
         </span>
         <?php } ?>
      </div>
      <h6>
         <!-- Hide privacy -->
         <?php //if (empty($current_post['parent_id'])) { ?>
         <!-- Hide privacy -->
         <?php if (strlen($wo['story']['postText']) >= 2 && ($wo['config']['google_translate'] == 1 || $wo['config']['yandex_translate'] == 1)): ?>
         <span onclick="Wo_Translate($(this).attr('id'),$(this).attr('data-language'))" title="<?php echo $wo['lang']['translate'];?>" class="pointer time" id="<?php echo $wo['story']['id']; ?>" data-language="<?php echo DetermineUserLang(); ?>" data-trans-btn="<?php echo $wo['story']['id']; ?>">
         - <?php echo $wo['lang']['translate'];?>
         </span>
         <?php endif ?>
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
         <!-- Hide privacy -->
         <?php //} ?>
         <!-- Hide privacy -->
      </h6>
   </div>
</div>
<?php } ?>