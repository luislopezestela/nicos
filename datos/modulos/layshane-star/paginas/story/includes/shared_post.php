<?php if (!empty($wo['story']['parent_id'])) {
   $post_shared_from = lui_PostData($wo['story']['parent_id']);
   $wo['story'] = $post_shared_from;
   if (!empty($wo['story']['fund_raise_id'])) {
    $wo['story']['fund'] = GetFundByRaiseId($wo['story']['fund_raise_id'],$wo['story']['user_id']);
   }
   if (!empty($wo['story']['fund_id'])) {
      $wo['story']['fund_data'] = GetFundingById($wo['story']['fund_id']);
    }
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
<div>
   <div class="clear"></div>
   <div class="bs-callout bs-callout-default wow_shared_posts">
      <div class="post-heading">
         <div class="<?php echo lui_RightToLeft('pull-left');?> image">
          <?php if (!isset($anonymous)) { ?>
            <a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>">
            <img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture" style="width: 40px;height: 40px;">
            </a>
          <?php }else{ ?>
            <img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture" style="width: 40px;height: 40px;">
          <?php } ?>
         </div>
         <div class="title h5" style="margin-bottom: 0;margin-top: 4px;">
          <?php if (!isset($anonymous)) { ?>
            <span class="user-popover" data-type="<?php echo $wo['story']['publisher']['type']; ?>" data-id="<?php echo $wo['story']['publisher']['id']; ?>">
               <a class="main-color" href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']; ?>">
               <b style="margin-right:0px;"><?php echo $wo['story']['publisher']['name']; ?></b>
               </a>
               <?php if($wo['story']['publisher']['verified'] == 1) { ?>
               <span class="verified-color">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip">
                     <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
                  </svg>
               </span>
               <?php } ?>
            </span>
          <?php }else{ ?>
            <b style="margin-right:0px;"><?php echo $wo['story']['publisher']['name']; ?></b>
            <?php } ?>
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
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip">
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
            <i class="fa fa-arrow-right"></i> <a href="<?php echo $wo['story']['event']['url']; ?>" data-ajax="?link1=show-event&eid=<?php echo $wo['story']['event']['id']; ?>"><b><?php echo $wo['story']['event']['name']; ?></b></a>
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
         <?php if ($wo['config']['live_video'] == 1 && !empty($wo['story']['stream_name'])) { ?>
         <span><span style="color: #666;" class="was_live_text_<?php echo($wo['story']['id']) ?>"><?php echo ($wo['story']['is_still_live'] ? $wo['lang']['is_live'] : $wo['lang']['was_live']); ?></span></span>
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
         </h6>
      </div>
      <div>
        <?php if (empty($wo['story']['color_id']) || (!empty($wo['story']['color_id']) && empty($wo['post_colors'][$wo['story']['color_id']]))) { ?>
         <p class="wow_shared_posts_p"><?php echo $wo['story']['postText']; ?></p>
         <?php } ?>
         <?php if (!empty($wo['story']['color_id']) && !empty($wo['post_colors'][$wo['story']['color_id']])) { ?>
    <div dir="auto" 
    <?php if($wo['config']['colored_posts_system'] == 1){ ?>
      class="wo_actual_colrd_post" style="
      <?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_1) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_2) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>
        background-image: linear-gradient(45deg, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_1; ?> 0%, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_2; ?> 100%);margin: 10px 0 0;
      <?php }else{ ?>
        background-image:url('<?php echo lui_GetMedia($wo['post_colors'][$wo['story']['color_id']]->image); ?>');margin: 10px 0 0; <?php } ?>
      <?php if(strlen($wo['story']['postText']) > 330){ ?>font-size: 16px;font-weight: normal;<?php } ?>"
    <?php } ?>
  >
  <span <?php if($wo['config']['colored_posts_system'] == 1){ ?> style="<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>color:<?php echo $wo['post_colors'][$wo['story']['color_id']]->text_color; ?><?php } ?>"<?php } ?>> <?php echo $wo['story']['postText']; ?></span>
  </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
      <?php if (!empty($wo['story']['fund_raise_id'])) {  ?>
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
        <?php if (!empty($wo['story']['fund_id'])) { ?>

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
      <!-- start decs -->
      <?php  $wo['story'] = $current_post; ?>
      <!-- Hide Post Owner -->
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
      $status = ($wo['story']['product']['status'] == 0) ? '' . $wo['lang']['in_stock'] . '' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
    }
    $type = ($wo['story']['product']['type'] == 0) ? '<span class="product-description">' . $wo['lang']['new'] . '</span>' : '<span class="product-description">' . $wo['lang']['used'] . '</span><br>';
    echo '<div class="wow_post_prod">';
    echo '<h4 class="wow_post_prod_name">' . $wo['story']['product']['name'] . '</h4>';
    echo '<div class="wow_post_prod_shead">';
    if (!empty($wo['story']['product']['location'])) {
      echo '<span> ' . $wo['story']['product']['location'] . '</span><span class="middot">·</span>';
    }
    echo '<span> ' . $status . '</span>';
    echo '</div>';
    echo '<div class="wow_post_prod_infos"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>' . $wo['lang']['price'] . ' <span class="product-description" style="max-height: none;">' . $symbol . $wo['story']['product']['price'] . ' (' . $text . ')</span></div>';
    echo '<div class="wow_post_prod_infos"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,17H5V7H16L19.55,12M17.63,5.84C17.27,5.33 16.67,5 16,5H5A2,2 0 0,0 3,7V17A2,2 0 0,0 5,19H16C16.67,19 17.27,18.66 17.63,18.15L22,12L17.63,5.84Z" /></svg>' . $wo['lang']['type'] . ' ' . $type . '</div>';
    echo '<div class="wow_post_prod_infos"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /></svg><p class="product-description product-description-'.$wo['story']['product']['id'].'">' . nofollow(htmlspecialchars_decode($wo['story']['product']['description'])) . '</p></div>';
    echo '</div>';
         } 
         ?>
      <p class="wow_shared_posts_p" dir="auto"><?php if (!empty($wo['story']['postFeeling']) && $extra_exists == 1) { ?>
         <span class="feeling-text"> — <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang']['feeling'];?> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span><?php } ?><?php if (!empty($wo['story']['postTraveling']) && $extra_exists == 1) { ?>
         <span class="feeling-text"> — <i class="fa fa-plane"></i> <?php echo $wo['lang']['traveling'];?><?php echo $wo['story']['postTraveling'];?></span>
         <?php } ?><?php if (!empty($wo['story']['postWatching']) && $extra_exists == 1) { ?>
         <span class="feeling-text"> — <i class="fa fa-eye"></i> <?php echo $wo['lang']['watching'];?> <?php echo $wo['story']['postWatching'];?></span>
         <?php } ?><?php if (!empty($wo['story']['postPlaying']) && $extra_exists == 1) { ?>
         <span class="feeling-text"> — <i class="fa fa-gamepad"></i> <?php echo $wo['lang']['playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
         <?php } ?><?php if (!empty($wo['story']['postListening']) && $extra_exists == 1) { ?>
         <span class="feeling-text"> — <i class="fa fa-headphones"></i> <?php echo $wo['lang']['listening'];?> <?php echo $wo['story']['postListening'];?></span>
         <?php } ?></p>
     
      <?php if(!empty($wo['story']['postYoutube'])) {  ?>
      <div class="post-youtube wo_video_post">
         <iframe id="ytplayer" type="text/html" width="100%" height="340" src="https://www.youtube.com/embed/<?php echo $wo['story']['postYoutube']; ?>?autoplay=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
      </div>
      <?php } ?>
      <?php if(!empty($wo['story']['postPlaytube'])) {  ?>
      <div class="post-youtube wo_video_post">
         <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['playtube_url']; ?>/embed/<?php echo $wo['story']['postPlaytube']; ?>?autoplay=0&fullscreen=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
      </div>
      <?php } ?>
      <?php if(!empty($wo['story']['postDeepsound'])) {  ?>
      <div class="post-youtube wo_video_post">
         <iframe id="ptplayer" type="text/html" width="100%" height="200" src="<?php echo $wo['config']['deepsound_url']; ?>/embed/<?php echo $wo['story']['postDeepsound']; ?>?autoplay=0&fullscreen=1" frameborder="0" style="height: 140px !important;"/></iframe>
      </div>
      <?php } ?>
      <?php if(!empty($wo['story']['postVimeo'])) {  ?>
      <div class="post-youtube wo_video_post">
         <iframe src="https://player.vimeo.com/video/<?php echo $wo['story']['postVimeo'];?>?byline=0&portrait=0" width="100%" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>
      <?php } ?>
      <?php if(!empty($wo['story']['postFacebook'])) {  ?>
        <script>
        // window.fbAsyncInit = function() {
              
        //    };
        FB.init({
              appId      : '374255706379985',
              xfbml      : true,
              version    : 'v3.2'
              });
        </script>
        <div id="fb-root"></div>
        <div class="fb-video" data-href="https://www.facebook.com/<?php echo $wo['story']['postFacebook'];?>" data-show-text="false" data-width=""></div>
        <div class="clear"></div>
      <!-- <div class="post-youtube wo_video_post">
         <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/<?php echo $wo['story']['postFacebook'];?>&show_text=0" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
         <div class="clear"></div>
      </div> -->
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
      <?php if(!empty($wo['story']['postMap']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postVimeo']) && empty($wo['story']['postDailymotion']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postDeepsound']) && empty($wo['story']['postFile']) && ($wo['config']['google_map'] == 1 || $wo['config']['yandex_map'] == 1)) { ?>
      <div class="post-map">
        <?php if ($wo['config']['google_map'] == 1) { ?>
         <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $wo['story']['postMap'];?>&zoom=13&size=600x250&maptype=roadmap&markers=color:red%7C<?php echo $wo['story']['postMap'];?>&key=<?php echo $wo['config']['google_map_api'];?>" width="100%">
         <?php } ?>
            <?php if ($wo['config']['yandex_map'] == 1) { ?>
            <div id="shared_place_<?php echo($wo['story']['id']) ?>" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 100%; height: 300px; padding: 0; margin: 0;"' : '') ?>></div>
            <script type="text/javascript">
                  <?php if (!empty($wo['story']['postMap'])) { ?>
                    setTimeout(function () {
                      var myMap;
                      ymaps.geocode("<?php echo($wo['story']['postMap']); ?>").then(function (res) {
                          myMap = new ymaps.Map('shared_place_<?php echo($wo['story']['id']) ?>', {
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
      </div>
      <?php } ?>
      <?php if(!empty($wo['story']['postLink']) && empty($wo['story']['postVine']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postDeepsound']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile'])) { ?>
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
         <div class="post-file" id="fullsizeimg" style="width: 100%;margin-left:0;">
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
      <div class="post-fetched-url wo_post_fetch_event" id="fullsizeimg">
    <a href="<?php echo $wo['story']['event']['url'];?>">
      <?php if (!empty($wo['story']['event']['cover'])) {?>
        <img src="<?php echo $wo['story']['event']['cover'];?>"/>
      <?php } ?>
      <div class="fetched-url-text">
        <div class="short_start_dt">
          <b><?php echo date('d',strtotime($wo['story']['event']['start_edit_date'])); ?></b>
          <span><?php echo date('M',strtotime($wo['story']['event']['start_edit_date'])); ?></span>
        </div>
        <h4><?php echo $wo['story']['event']['name'];?></h4>
        <div class="url"><?php echo $wo['story']['event']['start_date'];?> <?php echo $wo['lang']['to'];?> <?php echo $wo['story']['event']['end_date'];?></div>
      </div>
      <div class="clear"></div>
    </a>
  </div>
      <?php } ?>
      <?php if(!empty($wo['story']['blog_id'])) { ?>
      <div class="post-fetched-url wo_post_fetch_blog" id="fullsizeimg">
    <a href="<?php echo $wo['story']['blog']['url'];?>">
      <?php if (!empty($wo['story']['blog']['thumbnail'])) {?>
        <div class="post-fetched-url-con">
          <img src="<?php echo $wo['story']['blog']['thumbnail'];?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
        </div>
      <?php } ?>
      <div class="fetched-url-text">
        <div class="wow_post_blog_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f35d4d" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg></div>
        <h4><?php echo $wo['story']['blog']['title'];?></h4>
        <div class="description"><?php echo $wo['story']['blog']['description'];?></div>
      </div>
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
      <div class="post-file" id="fullsizeimg" style="width: 100%;margin-left:0;">
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
      <?php 
        if ($wo['config']['live_video'] == 1 && !empty($wo['story']['stream_name'])) { ?>
      <div class="post-file" <?php echo $wo['story']['is_still_live'] ? 'style="/*height: 440px;*/"' : ''; ?> id="fullsizeimg">
        <?php if ($wo['story']['is_still_live']) { ?>
          <div class="embed-responsive embed-responsive-4by3">
            <iframe src="https://viewer.millicast.com/v2?streamId=<?php echo($wo['config']['live_account_id']) ?>/<?php echo($wo['story']['stream_name']) ?>" class="embed-responsive-item"></iframe>
            <div class="wow_liv_counter"><span id="live_word_<?php echo($wo['story']['id']) ?>"><?php echo $wo['lang']['live']; ?></span> <span id="live_count_<?php echo($wo['story']['id']) ?>"> <?php echo $wo['story']['live_sub_users']; ?></span></div>
          </div>
          <?php if (!empty($wo['page']) && $wo['page']  == 'story' && $wo['story']['comments_status'] == 1) { ?>
            <div id="live_post_comments_<?php echo($wo['story']['id']) ?>" class="wow_liv_comments_feed">
              <?php if (!empty($wo['story']['get_post_comments'])) { 
                $count = 0;
                for ($i=count($wo['story']['get_post_comments'])-1; $i >= 0 ; $i--){ 
                  $wo['comment'] = $wo['story']['get_post_comments'][$i];
                  if (!empty($wo['comment']['text'])) { 
                    echo lui_LoadPage('story/includes/live_comment');
                    $count = $count + 1;
                    if ($count == 4) {
                      break;
                    }
                  }
                }
              }
              ?>
            </div>
          <?php } ?>
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
         <video autoplay loop>
            <source src="<?php echo $wo['story']['postSticker']; ?>" type="video/mp4">
         </video>
         <?php } else { ?>
         <img src="<?php echo $wo['story']['postSticker']; ?>" alt="GIF">
         <?php } ?>
      </div>
      <?php endif; ?>
      <?php if (lui_IsUrl($wo['story']['postPhoto'])): ?>
      <div class="post-file" id="fullsizeimg" style="width: 100%;margin-left:0;">
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
      <div id="fullsizeimg" style="position: relative; width: 100%;margin-left:0;">
         <?php if (!empty($wo['story']['photo_album']) && $wo['story']['blur'] == 1) { ?>
         <div class="post-file show_album_<?php echo $wo['story']['id']; ?> blur_multi_images" id="fullsizeimg" style="width: 100%;margin-left:0;">
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
                if ($wo['story']['admin'] === true && empty($wo['story']['parent_id'])) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
               if (!empty($photo['parent_id'])) {
                 $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
               }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
              echo "</div>";
            }
            else if (count($wo['story']['photo_album']) == 4) {
              echo "<div class='wo_adaptive_media_4'>";
              foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true && empty($wo['story']['parent_id'])) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
               if (!empty($photo['parent_id'])) {
                 $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
               }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
              echo "</div>";
            }
            else if (count($wo['story']['photo_album']) == 5) {
              echo "<div class='wo_adaptive_media_5'>";
              foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true && empty($wo['story']['parent_id'])) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
               if (!empty($photo['parent_id'])) {
                 $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
               }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
              echo "</div>";
            }
            else if (count($wo['story']['photo_album']) > 3) {
              foreach (array_slice($wo['story']['photo_album'],0,3) as $key => $photo) {
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
               if (!empty($photo['parent_id'])) {
                 $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
               }
                if ($key == 2) {
                  echo "<div onclick='".$multi_image_function."' class='album-collapse pull-left pointer'> 
                  <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                  <span>+".count(array_slice($wo['story']['photo_album'],2))."</span>
                  </div>
                    "; 
                }
                else{
                  if ($wo['story']['admin'] === true && empty($wo['story']['parent_id'])) {
                    $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                    $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                  }
                  echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file  pointer' onclick='".$multi_image_function."'></div>";
                }
              }
              foreach (array_slice($wo['story']['photo_album'],3) as $photo) {
                if ($wo['story']['admin'] === true && empty($wo['story']['parent_id'])) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
               if (!empty($photo['parent_id'])) {
                 $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
               }
                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer hidden' onclick='".$multi_image_function."'></div>";
              }
            }
            else{
              foreach ($wo['story']['photo_album'] as $photo) {
                if ($wo['story']['admin'] === true && empty($wo['story']['parent_id'])) {
                  $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                  $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                }
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
               if (!empty($photo['parent_id'])) {
                 $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
               }
                echo  "<div style='text-align:center;width: 100%;' class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
            }
            } 
            ?>
         <?php if ($wo['story']['multi_image'] == 1) {
            if ($wo['story']['blur'] == 1) { ?>
         <div class="post-file show_album_<?php echo $wo['story']['id']; ?> blur_multi_images" id="fullsizeimg" style="width: 100%;margin-left:0;">
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
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
                if (!empty($photo['parent_id'])) {
                  $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
                }
                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
              echo "</div>";
            }
            else if (count($wo['story']['photo_multi']) == 4) {
              echo "<div class='wo_adaptive_media_4'>";
              foreach ($wo['story']['photo_multi'] as $photo) {
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
                if (!empty($photo['parent_id'])) {
                  $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
                }
                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
              echo "</div>";
            }
            else if (count($wo['story']['photo_multi']) == 5) {
              echo "<div class='wo_adaptive_media_5'>";
              foreach ($wo['story']['photo_multi'] as $photo) {
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
                if (!empty($photo['parent_id'])) {
                  $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
                }
                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
              }
              echo "</div>";
            }
            else if (count($wo['story']['photo_multi']) > 3) {
              foreach (array_slice($wo['story']['photo_multi'],0,3) as $key => $photo) {
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
                if (!empty($photo['parent_id'])) {
                  $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
                }
                if ($key == 2) {
                  echo "<div onclick='".$multi_image_function."' class='album-collapse pointer'> 
                  <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                  <span>+".count(array_slice($wo['story']['photo_multi'],2))."</span>
                  </div>
                  "; 
                }
                else{
                  echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                  onclick='".$multi_image_function."'>";
                }
              }
              foreach (array_slice($wo['story']['photo_multi'],3) as $photo) {
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
                if (!empty($photo['parent_id'])) {
                  $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
                }
                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer hidden' 
                onclick='".$multi_image_function."'>";
              }
            }
            else{
              foreach ($wo['story']['photo_multi'] as $photo) {
                $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
                if (!empty($photo['parent_id'])) {
                  $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
                }
                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                onclick='".$multi_image_function."'>";
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
      <!-- end decs -->
   </div>
   <div class="clear"></div>
</div>
<div class="clear"></div>
<?php  $wo['story'] = $current_post;}
   ?>