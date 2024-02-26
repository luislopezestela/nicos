<?php $replies = lui_CountCommentReplies($wo['comment']['id']);?>
<div class="comment comment-container" id="comment_<?php echo $wo['comment']['id'];?>" data-comment-id ="<?php echo $wo['comment']['id'];?>">
   <a class="<?php echo lui_RightToLeft('pull-left'); ?>" href="<?php echo $wo['comment']['publisher']['url']?>">
   <img class="avatar <?php echo lui_RightToLeft('pull-left'); ?>" src="<?php echo $wo['comment']['publisher']['avatar']?>" alt="avatar">
   </a>
   <div class="comment-body">
      <div class="comment-heading">
         <span class="user-popover" data-id="<?php echo $wo['comment']['publisher']['id'];?>" data-type="<?php echo $wo['comment']['publisher']['type'];?>">
         <a href="<?php echo $wo['comment']['publisher']['url']?>">
            <h4 class="user">
               <?php echo $wo['comment']['publisher']['name']?>
            </h4>
         </a>
         </span>
         <?php  if($wo['comment']['publisher']['verified'] == 1) {   ?>
         <span class="verified-color" data-toggle="tooltip" title="<?php echo $wo['lang']['verified_user'];?>"><i class="fa fa-check-circle"></i></span>
         <?php } ?>

         <div class="<?php echo lui_RightToLeft('pull-right');?> comment-options comment_edele_options">
            <?php if ($wo['comment']['onwer'] === true) { ?>
            <span class="pointer comment-icons" id="editComment" onclick="Wo_OpenCommentEditBox(<?php echo $wo['comment']['id']?>);">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg>
            </span>
            <?php } ?>
            <?php if ($wo['comment']['post_onwer'] === true|| $wo['comment']['onwer'] === true) {?>
            <!--<span class="pointer" id="deleteComment" onclick="Wo_DeleteComment(<?php echo $wo['comment']['id']?>);">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
            </span>-->
            <?php } ?>
         </div>
         <span class="time ajax-time" title="<?php echo date('c',$wo['comment']['time']);?>"><?php echo $wo['comment']['time']?></span>
         <div class="comment-text"><?php echo $wo['comment']['text']?></div>
         <div class="comment-image">
            <?php if (!empty($wo['comment']['c_file'])): ?>
               <a href="<?php echo lui_GetMedia($wo['comment']['c_file']);?>" target="_blank"><img src="<?php echo lui_GetMedia($wo['comment']['c_file']);?>" alt="Comment image"></a>
            <?php endif ?>
         </div>
         <div class="clear"></div>   
      </div>
      <?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
            <!-- reaction -->

            <div class="like-stat stat-item post-like-status" id="comment_reacted">
              <span class="like-emo lightbox-comment-reactions-icons-<?php echo $wo['comment']['id']; ?>">
              <?php echo lui_GetPostReactions($wo['comment']['id'],"comment");?>
              </span>
            </div>
        <?php } ?>
      <span class="comment-options" <?php if ($wo['loggedin'] != true) { ?>onclick="location.href= '<?php echo $wo['config']['site_url'];?>'"<?php } ?>>
            <?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
				<div class="wo-reaction wo-reaction-lightbox-comment stat-item" id="comment_reactions" data-id="<?php echo $wo['comment']['id']; ?>">
                <span class="like-btn like-btn-lightbox-comment" data-id="<?php echo $wo['comment']['id']; ?>">
                    <?php
                    if (lui_IsReacted($wo['comment']['id'], $wo['story']['user_id'],"comment") === true) {    
                    echo '<span class="lightbox-comment-status-reaction-'.$wo['comment']['id'].' active-like"><svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="3"/> </svg> <span class="c_likes-'.$wo['comment']['id'].'"></span></span>';   
                    } else {   
                    echo '<span class="lightbox-comment-status-reaction-'.$wo['comment']['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="3"/> </svg> <span class="c_likes-'.$wo['comment']['id'].'"></span></span>';   
                    }    
                    ?>
                </span>
                <ul class="reactions-box reactions-lightbox-comment-container-<?php echo $wo['comment']['id']; ?>" data-id="<?php echo $wo['comment']['id']; ?>" style="margin-top: 0px;left: -5px;top: -46px;">

                  <?php if (!empty($wo['reactions_types'])) {
                      foreach ($wo['reactions_types'] as $key => $value) {
                        if ($value['status'] == 1) {
                          
                       ?>
                    <li class="reaction reaction-<?php echo $value['id'];?>" data-reaction="<?php echo $value['name'];?>" data-reaction-id="<?php echo $value['id'];?>" data-reaction-lang="<?php echo $value['name'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,<?php echo $value['id'];?>);">
                      <?php if (preg_match("/<[^<]+>/",$value['wowonder_icon'],$m)) {
                            echo($value['wowonder_icon']);
                         }
                         else{ ?>
                          <img src="<?php echo($value['wowonder_icon']) ?>">
                        <?php } ?>
                    </li>
                  <?php } } } ?>



                    <!-- <li class="reaction reaction-like" data-reaction="Like" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,'Like');">
						<div class="emoji emoji--like">
							<div class="emoji__hand"><div class="emoji__thumb"></div></div>
						</div>
					</li>
                    <li class="reaction reaction-love" data-reaction="Love" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,'Love');">
						<div class="emoji emoji--love">
							<div class="emoji__heart"></div>
						</div>
					</li>
                    <li class="reaction reaction-haha" data-reaction="HaHa" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,'HaHa');">
						<div class="emoji emoji--haha">
							<div class="emoji__face">
								<div class="emoji__eyes"></div>
								<div class="emoji__mouth">
									<div class="emoji__tongue"></div>
								</div>
							</div>
						</div>
					</li>
                    <li class="reaction reaction-wow" data-reaction="Wow" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,'Wow');">
						<div class="emoji emoji--wow">
							<div class="emoji__face">
								<div class="emoji__eyebrows"></div>
								<div class="emoji__eyes"></div>
								<div class="emoji__mouth"></div>
							</div>
						</div>
					</li>
                    <li class="reaction reaction-sad" data-reaction="Sad" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,'Sad');">
						<div class="emoji emoji--sad">
							<div class="emoji__face">
								<div class="emoji__eyebrows"></div>
								<div class="emoji__eyes"></div>
								<div class="emoji__mouth"></div>
							</div>
						</div>
					</li>
                    <li class="reaction reaction-angry" data-reaction="Angry" onclick="Wo_RegisterlightboxCommentReaction(<?php echo $wo['comment']['id']; ?>,'Angry');">
						<div class="emoji emoji--angry">
							<div class="emoji__face">
								<div class="emoji__eyebrows"></div>
								<div class="emoji__eyes"></div>
								<div class="emoji__mouth"></div>
							</div>
						</div>
					</li> -->
                </ul>
            </div>
            <?php }else{ ?>
			
                  <span class="comment-icons">
                  <span class="pointer" id="LikeComment" onclick="Wo_RegisterCommentLike(<?php echo $wo['comment']['id']; ?>);">
                  <?php if($wo['comment']['is_comment_liked'] !== true) { ?>
                     <?php echo GetModeBtn('like_comment'); ?>
                  <?php } else { ?>
                     <?php echo GetModeBtn('liked_comment'); ?>
                  <?php } ?>
                  </span> 
                  <span id="comment-likes">
                  <?php echo $wo['comment']['comment_likes'];?>
                  </span> · 
                  </span>
                  <?php if ($wo['config']['website_mode'] != 'twitter' && $wo['config']['website_mode'] != 'instagram' && $wo['config']['website_mode'] != 'askfm') { ?>
                  <span class="pointer" id="WonderComment" onclick="Wo_RegisterCommentWonder(<?php echo $wo['comment']['id']; ?>);">
                  <?php if($wo['comment']['is_comment_wondered'] !== true) { ?>
                              <?php echo $wo['second_post_button_icon'];?>
                  <?php } else {  ?>
                              <span class="active-wonder"><?php echo $wo['second_post_button_icon'];?></span>
                  <?php } ?>
                  </span>
                  <span id="comment-wonders">
                  <?php echo $wo['comment']['comment_wonders'];?>
                  </span>
                  <?php } ?>
            <?php } ?>
      </span> 
      <div class="comment-edit">
         <input type="text" class="form-control" value="<?php echo $wo['comment']['Orginaltext']?>" onkeyup="Wo_EditComment(this.value,<?php echo $wo['comment']['id']?>, event)" placeholder="<?php echo $wo['lang']['edit_comment']; ?>" dir="auto">
      </div>
      <div class="comment-replies" <?php if ($wo['loggedin'] != true) { ?>onclick="location.href= '<?php echo $wo['config']['site_url'];?>'"<?php } ?>>
         <div class="comment-replies-text">
          <div class="reply-container"></div>
         </div>
         <?php if ($replies > 0) { ?>
         <div class="view-more-replies" onclick="Wo_ViewMoreReplies(<?php echo $wo['comment']['id'];?>);">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right" style="margin-top: -3px;"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg> <?php echo $replies;?> <?php echo $wo['lang']['replies']?>
         </div>
         <?php } ?>
         <div class="comment-reply">
            <input type="text" class="form-control textarea" onkeyup="Wo_RegisterReply(this.value,<?php echo $wo['comment']['id']; ?>,<?php echo $wo['story']['publisher']['user_id']; ?>, event, <?php echo (!empty($wo['story']['publisher']['page_id'])) ? $wo['story']['publisher']['page_id'] : '0'; ?>)" placeholder="<?php echo $wo['lang']['reply_to_comment'];?>" dir="auto">
         </div>
      </div>
   </div>
</div>