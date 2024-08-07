<?php 
   $wo['story']['model_type'] = 'image';
   $query = $wo['story']['id'];
   $image = lui_GetMedia($wo['story']['postFile']);
   if (strpos($wo['story']['postFile'],',') !== false) {
       $explode = @explode(',', $wo['story']['postFile']);
       $image = lui_GetMedia($explode[0]);
   }
   if (!empty($wo['story']['postSticker'])) {
      $image = $wo['story']['postSticker'];
   }
   if (!empty($wo['story']['postFile']) && (strpos($wo['story']['postFile'], '.mp4') !== false || strpos($wo['story']['postFile'], '.mkv') !== false || strpos($wo['story']['postFile'], '.avi') !== false || strpos($wo['story']['postFile'], '.webm') || strpos($wo['story']['postFile'], '.mov') || strpos($wo['story']['postFile'], '.m3u8') !== false )) {
        $wo['story']['model_type'] = 'video';
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
<div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div>
<div class="lightbox-content post wo_imagecombo_lbox lightpost-<?php echo $wo['story']['id'];?>" id="post-<?php echo $wo['story']['id'];?>" data-post-id="<?php echo $wo['story']['id'];?>">
   <div class="story-img">
      <div class="sun_img_innr">
         <?php if ($wo['story']['have_pre_image']) { ?>
         <span class="changer previous-btn" onclick="Wo_PreviousPicture(<?php echo $query;?>);">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" color="#fff">
               <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
         </span>
         <?php } ?>
         <?php if ($wo['story']['have_next_image']) { ?>
         <span class="changer next-btn" onclick="Wo_NextPicture(<?php echo $query;?>);">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right" color="#fff">
               <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
         </span>
         <?php } ?>
         <div id="draggableHelper" style="display: table-cell;vertical-align: middle;">
            <?php if ($wo['story']['model_type'] == 'image') { ?>
            <?php if ($wo['story']['blur'] == 1) { ?>
            <button class='btn btn-main image_blur_btn remover_blur_btn_<?php echo $wo['story']['id']; ?>' onclick='Wo_RemoveBlur(this,<?php echo $wo['story']['id']; ?>)'><?php echo $wo['lang']['view_image']; ?></button>
            <img src="<?php echo $image. "?cache=" . time();?>" alt="media"class="image_blur remover_blur_<?php echo $wo['story']['id']; ?>" id="wo_zoom_<?php echo $wo['story']['id'];?>"> 
            <?php }else{ ?>
            <img src="<?php echo $image. "?cache=" . time();?>" alt="media"class="" id="wo_zoom_<?php echo $wo['story']['id'];?>">
            <?php } ?>
         <?php }else{ ?>
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

         <?php } ?>
         </div>
      </div>
      <div class="wo_lbox_topbar sun_light_tool">
         <?php if ($wo['story']['blur'] == 0) { ?>
         <span class="lbox_topbar_child">
         <span>
         <a href="<?php echo $image;?>" download><?php echo $wo['lang']['download'];?></a>
         </span>
         <span class="middot">·</span>
         <span>
         <a href="<?php echo $image;?>" target="_blank"><?php echo $wo['lang']['open_original'];?></a>
         </span>
         </span>
         <?php } ?>
         <span class="lbox_topbar_child right">
            <?php
               $fileType = strtolower(substr($image, strrpos($image, '.') + 1));
               if ($wo['loggedin'] && $wo['user']['user_id'] == $wo['story']['publisher']['user_id'] && ( $fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png') ){?>
            <span onclick="rotate(<?php echo $wo['story']['id'];?>)">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M7.47,21.5C4.2,19.93 1.86,16.76 1.5,13H0C0.5,19.16 5.66,24 11.95,24C12.18,24 12.39,24 12.61,23.97L8.8,20.15L7.47,21.5M12.05,0C11.82,0 11.61,0 11.39,0.04L15.2,3.85L16.53,2.5C19.8,4.07 22.14,7.24 22.5,11H24C23.5,4.84 18.34,0 12.05,0M16,14H18V8C18,6.89 17.1,6 16,6H10V8H16V14M8,16V4H6V6H4V8H6V16A2,2 0 0,0 8,18H16V20H18V18H20V16H8Z" />
               </svg>
            </span>
            <?php } ?>
            <span onclick="zoomin(<?php echo $wo['story']['id'];?>)">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M15.5,14L20.5,19L19,20.5L14,15.5V14.71L13.73,14.43C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.43,13.73L14.71,14H15.5M9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14M12,10H10V12H9V10H7V9H9V7H10V9H12V10Z" />
               </svg>
            </span>
            <span onclick="zoomout(<?php echo $wo['story']['id'];?>)">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M15.5,14H14.71L14.43,13.73C15.41,12.59 16,11.11 16,9.5A6.5,6.5 0 0,0 9.5,3A6.5,6.5 0 0,0 3,9.5A6.5,6.5 0 0,0 9.5,16C11.11,16 12.59,15.41 13.73,14.43L14,14.71V15.5L19,20.5L20.5,19L15.5,14M9.5,14C7,14 5,12 5,9.5C5,7 7,5 9.5,5C12,5 14,7 14,9.5C14,12 12,14 9.5,14M7,9H12V10H7V9Z" />
               </svg>
            </span>
            <?php
               $fileType = strtolower(substr($image, strrpos($image, '.') + 1));
               if ($wo['loggedin'] && $wo['user']['user_id'] == $wo['story']['publisher']['user_id'] && ( $fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png') && $wo['story']['multi_image_post']){?>
            <span class="<?php echo lui_RightToLeft('pull-right');?> close-lightbox" onclick="Wo_DeletePost(<?php echo $wo['story']['id'];?>);">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                  <polyline points="3 6 5 6 21 6"></polyline>
                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                  <line x1="10" y1="11" x2="10" y2="17"></line>
                  <line x1="14" y1="11" x2="14" y2="17"></line>
               </svg>
            </span>
            <?php } ?>
         </span>
      </div>
   </div>
   <?php if ($wo['loggedin'] == true): ?>
   <div class="comment-section">
      <div class="wow_lightbox_right">
         <div class="comment-section-inner">
            <div class="comment-inner-header">
               <div class="<?php echo lui_RightToLeft('pull-right');?> close-lightbox" onclick="Wo_CloseLightbox();">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" style="margin-top: 0px;width: 24px;height: 24px;">
                     <line x1="18" y1="6" x2="6" y2="18"></line>
                     <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>
               </div>
               <div class="user-avatar <?php echo lui_RightToLeft('pull-left');?>">
                  <img src="<?php echo $wo['story']['publisher']['avatar'];?>" alt="">
               </div>
               <div class="user-name h5">
                  <?php if (!isset($anonymous)) { ?>
                  <span class="user-popover" data-type="<?php echo $wo['story']['publisher']['type']; ?>" data-id="<?php echo $wo['story']['publisher']['id']; ?>">
                  <a href="<?php echo $wo['story']['publisher']['url'];?>"><?php echo $wo['story']['publisher']['name'];?></a>
                  </span>
                  <?php }else{ ?>
                  <?php echo $wo['story']['publisher']['name'];?>
                  <?php } ?>
               </div>
               <h6>
                  <div class="time" style="color:#9197a3">
                     <span class="ajax-time" title="<?php echo date('c',$wo['story']['time']); ?>"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></span>
                  </div>
               </h6>
            </div>
            <div class="clear"></div>
            <div class="comment-inner-middle" <?php if ($wo['loggedin'] != true) { ?>onclick="location.href= '<?php echo $wo['config']['site_url'];?>'"<?php } ?>>
               <div class="post-info">
                  <div class="post-text">
                     <p><?php echo $wo['story']['postText'];?></p>
                  </div>
               </div>
               <div class="stats buttons" style="display: flex;">
                  <?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
                  <div class="like-stat  stat-item post-like-status" style="width: inherit;">
                     <span class="like-emo post-reactions-icons-<?php echo $wo['story']['id']; ?>" onclick="Wo_OpenPostReactedUsers(<?php echo $wo['story']['id']; ?>);">
                     <?php echo lui_GetPostReactions($wo['story']['id']);?>
                     </span>
                     <!-- <span class="like-details">Arkaprava Majumder and 1k others</span> -->
                  </div>
                  <?php }?>
               </div>
               <?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
               <style>#wo_post_stat_button > .stat-item:first-child{border-radius: 2em;}</style>
               <?php } ?>
               <div class="stats" id="wo_post_stat_button">
                  <?php if ($wo['loggedin'] == true) { $wo['story']['viewmode'] = "lightbox";  echo lui_LoadPage('buttons/like-wonder');}?>
               </div>
            </div>
         </div>
         <div class="comment-inner-footer lightbox-post-footer <?php echo ($wo['story']['comments_status'] == 0) ? 'hidden' : '';?>">
            <div id="hidden_inputbox_comment_lighbox"></div>
            <?php if($wo['story']['post_comments'] > 3 && $wo['story']['limited_comments'] === true && $wo['story']['comments_status'] == 1) { ?>
            <div class="view-more-wrapper load-more-comments" onclick="Wo_loadAllCommentslightbox(<?php echo $wo['story']['id']; ?>);">
               <span><?php echo $wo['lang']['view_more_comments'];?></span>
               <div class="ball-pulse <?php echo lui_RightToLeft('pull-right');?>" style="line-height: 20px;">
                  <div></div>
                  <div></div>
                  <div></div>
               </div>
            </div>
            <?php } ?>
            <div class="comments-list comments-list-lightbox">
               <div class="comment comment-container"></div>
               <div class="comment comment-container"></div>
               <?php 
                  foreach($wo['story']['get_post_comments'] as $wo['comment']) {
                  	echo lui_LoadPage('comment/lightbox-content');
                  }
                  ?>
               <?php  if (empty($wo['story']['get_post_comments'])) { ?>
               <div class="lightbox-no-comments">
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 58 58" style="enable-background:new 0 0 58 58;" xml:space="preserve">
                     <g>
                        <path style="fill:#2CB742;" d="M33.224,10.494H13.776C6.168,10.494,0,16.661,0,24.27v11.345c0,7.608,6.392,13.879,14,13.879h0 v7.446c0,0.503,0.384,0.755,0.74,0.4l1.521-1.521c4.116-4.116,9.699-6.325,15.52-6.325h1.443C40.832,49.494,47,43.223,47,35.615 V24.27C47,16.661,40.832,10.494,33.224,10.494z"/>
                        <g>
                           <path style="fill:#9BC0EA;" d="M44.224,0.494H24.776c-6.371,0-11.717,4.332-13.292,10.206c0.747-0.125,1.509-0.206,2.292-0.206 h19.448C40.832,10.494,47,16.661,47,24.27v11.345c0,1.259-0.183,2.476-0.5,3.639C52.957,38.061,58,32.37,58,25.615V14.27 C58,6.661,51.832,0.494,44.224,0.494z"/>
                        </g>
                        <circle style="fill:#FFFFFF;" cx="12" cy="30.494" r="3"/>
                        <circle style="fill:#FFFFFF;" cx="24" cy="30.494" r="3"/>
                        <circle style="fill:#FFFFFF;" cx="36" cy="30.494" r="3"/>
                     </g>
                  </svg>
                  <h5><?php echo TextForMode('no_comments_found');?></h5>
               </div>
               <?php } ?>
            </div>
         </div>
         <?php if ($wo['loggedin'] == true): ?>
         <div class="lightbox-post-footer post-comments <?php echo ($wo['story']['comments_status'] == 0) ? 'hidden' : '';?>" id="post-comments-<?php echo $wo['story']['id'];?>"  <?php if ($wo['loggedin'] != true) { ?>onclick="location.href= '<?php echo $wo['config']['site_url'];?>'"<?php } ?>>
            <div class="post-commet-textarea dropup">
               <textarea class="form-control lighbox comment-textarea textarea" placeholder="<?php echo TextForMode('write_comment');?>" type="text" onkeyup="Wo_RegisterComment(this.value,<?php echo $wo['story']['id']; ?>,<?php echo $wo['story']['publisher']['user_id']; ?>, event, <?php echo (!empty($wo['story']['publisher']['page_id'])) ? $wo['story']['publisher']['page_id'] : '0'; ?>)"  onkeydown="textAreaAdjust(this, 30,'lightbox')" dir="auto"></textarea>
               <span class="input-group-btn emo-comment dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="btn btn-file">
                     <svg fill="gray" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" class="feather feather-user-plus">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                     </svg>
                  </span>
               </span>
               <div class="emo-post-container dropdown-menu" role="menu">
                  <?php  
                     foreach ($wo['emo'] as $code => $name) {
                     	$code   = $code;
                     	echo  '<span onclick="Wo_AddEmoToCommentInput(' . $wo["story"]["id"] . ', \'' . $code . '\', \'lightbox-post-footer\');"><i class="pointer twa-lg twa twa-' . $name . '"></i></span>'; 
                     } 
                     ?>
               </div>
            </div>
         </div>
         <?php endif ?>
         <div class="clear"></div>
      </div>
   </div>
   <?php endif ?>
</div>
<script>
   $(document).keydown(function(e) {
       if (e.keyCode == 27) {
           Wo_CloseLightbox();
       }
       $(".lighbox.textarea").triggeredAutocomplete({
          hidden: '#hidden_inputbox_comment_lighbox',
          source: Wo_Ajax_Requests_File() + "?f=mention",
          trigger: "@" 
       });
   });
   $( ".story-img" ).mouseover(function() {
     $( ".changer" ).fadeIn(200);
   });
   $( ".story-img" ).mouseleave(function() {
     $( ".changer" ).fadeOut(200);
   });
   
   function zoomin(id){
   	var myImg = document.getElementById("wo_zoom_<?php echo $wo['story']['id'];?>");
   	$(myImg).addClass("double_zoom");
   	$('#draggableHelper').draggable({ cursor: "move", revert: true, disabled: false });
   }
   function zoomout(id){
   	var myImg = document.getElementById("wo_zoom_<?php echo $wo['story']['id'];?>");
   	$(myImg).removeClass("double_zoom");
   	$('#draggableHelper').draggable({ disabled: true, revert: true });
   }
   
   var angle = 0;
   function rotate(id){
   	angle += 90;
   	$('#wo_zoom_<?php echo $wo['story']['id'];?>').css({'transform': 'rotate(-' + angle + 'deg)'});
   	$.get(Wo_Ajax_Requests_File(), {
   		f: 'rotate_image',
   		angle: angle,
   		image: '<?php echo $wo['story']['id'];?>'
   	}, function (data) {
   		
   	});
   }
</script>