<div class="blog-comment-item" data-blog-comment="<?php echo $wo['comment']['id']; ?>">
	<div>
		<div class="col-md-1 col-sm-1 col-xs-1 <?php echo lui_RightToLeft('pull-left');?> blog-comment-item-img">
			<img src="<?php echo $wo['comment']['user_data']['avatar']; ?>" alt="" class="responsive-img img-circle">
		</div>
		<div class="col-md-11 <?php echo lui_RightToLeft('pull-right');?> col-sm-10 col-xs-10 blog-comment-item-body">
			<h5>
				<a class="pointer bold" data-ajax="?link1=timeline&u=<?php echo $wo['comment']['user_data']['username']; ?>" href="<?php echo $wo['comment']['user_data']['url']; ?>">
					<?php echo $wo['comment']['user_data']['name']; ?>
				</a>
				<span class="time">
					<span class="ajax-time" title="<?php echo date('c',$wo['comment']['posted']); ?>">
						<?php echo lui_Time_Elapsed_String($wo['comment']['posted']); ?>
					</span>
				</span>
				<?php if ($wo['comment']['is_owner']): ?>
					<span class="pointer <?php echo lui_RightToLeft('pull-right');?> del-blog-comment" id="<?php echo $wo['comment']['id']; ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather" viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
					</span>
				<?php endif ?>
			</h5>
			<p><?php echo $wo['comment']['text']; ?></p>
			<div>
				<span class="comment-icons">
					<span class="pointer reply-toblog-comm"  id="<?php echo $wo['comment']['id']; ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather" viewBox="0 0 24 24"><path fill="currentColor" d="M10,9V5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9Z" /></svg>
					</span>
					&nbsp;

					<?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
						<?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
				            <!-- reaction -->
				            <div class="like-stat stat-item post-like-status" id="comment_reacted">
				              <span class="like-emo comment-reactions-icons-<?php echo $wo['comment']['id']; ?>">
				              <?php echo lui_GetPostReactions($wo['comment']['id'],"comment",'blog');?>
				              </span>
				            </div>
				        <?php } ?>
					<div class="wo-reaction wo-reaction-comment stat-item" id="comment_reactions" data-id="<?php echo $wo['comment']['id']; ?>">
		                <span class="like-btn like-btn-comment" data-id="<?php echo $wo['comment']['id']; ?>">
		                    <?php
		                    if ($wo['loggedin'] == true) {
			                    if (lui_IsReacted($wo['comment']['id'], $wo['user']['user_id'], "comment",'blog') === true) {    
			                        echo '<span class="comment-status-reaction-'.$wo['comment']['id'].' active-like unselectable"><svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="3"/> </svg> <span class="c_likes-'.$wo['comment']['id'].'"></span></span>'; 
			                    } else {   
			                        echo '<span class="comment-status-reaction-'.$wo['comment']['id'].' unselectable"><svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="3"/> </svg> <span class="c_likes'.$wo['comment']['id'].'"></span></span>';   
			                    }   
		                    } 
		                    ?>
		                </span>
		                <ul class="reactions-box reactions-comment-container-<?php echo $wo['comment']['id']; ?>" data-id="<?php echo $wo['comment']['id']; ?>">
		                	<?php if (!empty($wo['reactions_types'])) {
		                      foreach ($wo['reactions_types'] as $key => $value) {
		                        if ($value['status'] == 1) {
		                          
		                       ?>
		                    <li class="reaction reaction-<?php echo $value['id'];?>" data-reaction="<?php echo $value['name'];?>" data-reaction-id="<?php echo $value['id'];?>" data-reaction-lang="<?php echo $value['name'];?>" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,<?php echo $value['id'];?>);">
		                      <?php if (preg_match("/<[^<]+>/",$value['wowonder_icon'],$m)) {
		                            echo($value['wowonder_icon']);
		                         }
		                         else{ ?>
		                          <img src="<?=$wo['config']['site_url'].'/'?><?php echo($value['wowonder_icon']) ?>">
		                        <?php } ?>
		                    </li>
		                  <?php } } } ?>


		                    <!-- <li class="reaction reaction-like animated_2" data-reaction="Like" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,'Like');">
								<div class="emoji emoji--like">
									<div class="emoji__hand"><div class="emoji__thumb"></div></div>
								</div>
							</li>
		                    <li class="reaction reaction-love animated_4" data-reaction="Love" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,'Love');">
								<div class="emoji emoji--love">
									<div class="emoji__heart"></div>
								</div>
							</li>
		                    <li class="reaction reaction-haha animated_6" data-reaction="HaHa" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,'HaHa');">
								<div class="emoji emoji--haha">
									<div class="emoji__face">
										<div class="emoji__eyes"></div>
										<div class="emoji__mouth">
											<div class="emoji__tongue"></div>
										</div>
									</div>
								</div>
							</li>
		                    <li class="reaction reaction-wow animated_8" data-reaction="Wow" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,'Wow');">
								<div class="emoji emoji--wow">
									<div class="emoji__face">
										<div class="emoji__eyebrows"></div>
										<div class="emoji__eyes"></div>
										<div class="emoji__mouth"></div>
									</div>
								</div>
							</li>
		                    <li class="reaction reaction-sad animated_10" data-reaction="Sad" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,'Sad');">
								<div class="emoji emoji--sad">
									<div class="emoji__face">
										<div class="emoji__eyebrows"></div>
										<div class="emoji__eyes"></div>
										<div class="emoji__mouth"></div>
									</div>
								</div>
							</li>
		                    <li class="reaction reaction-angry animated_12" data-reaction="Angry" onclick="Wo_RegisterBlogCommentReaction(<?php echo $wo['comment']['id']; ?>,'Angry');">
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

		            	<span class="pointer add-blog-commlikes-<?php echo $wo['comment']['id']; ?>" onclick="Wo_AddBlogCommentLike(<?php echo $wo['comment']['id']; ?>)">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
						</span> 
						<span id="blog-comment-likes" data-blog-comlikes="<?php echo $wo['comment']['id']; ?>">
							<?php if ($wo['comment']['likes'] > 0): ?>
								<?php echo $wo['comment']['likes']; ?>
							<?php endif; ?>
						</span>
						<?php if ($wo['config']['second_post_button'] != 'disabled') { ?>
						&nbsp;
						<span class="pointer add-blog-commdislikes-<?php echo $wo['comment']['id']; ?>" onclick="Wo_AddBlogCommentDisLike(<?php echo $wo['comment']['id']; ?>)">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path></svg>
						</span>
						<span id="blog-comment-likes" data-blog-comdislikes="<?php echo $wo['comment']['id']; ?>">
							<?php if ($wo['comment']['dislikes'] > 0): ?>
								<?php echo $wo['comment']['dislikes']; ?>
							<?php endif; ?>
						</span>
						<?php } ?>
		            <?php } ?>
					
				</span>
				&nbsp;
				<?php if (count($wo['comment']['replies']) > 5): ?>
					<span class="pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down" style="margin-top: 0px;width: 18px;height: 18px;"><polyline points="7 13 12 18 17 13"></polyline><polyline points="7 6 12 11 17 6"></polyline></svg></span>
				<?php endif; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="blog-comment-reply-cont">
		<?php 
  		foreach ($wo['comment']['replies'] as $wo['comm-reply']) {
  			echo lui_LoadPage('blog/commreplies-list');
  		}
		?>
	</div>
	<?php if ($wo['loggedin'] == true): ?>
	<div class="blog-comment-reply-box col-md-11 col-sm-11 col-xs-11 <?php echo lui_RightToLeft('pull-right');?> hidden">
		<form class="form">
			<div class="form-group">
				<textarea  class="form-control blog-comment-reply" onkeydown="Wo_RegisterBlogCommReply(<?php echo $wo['comment']['id']; ?>,event,this)"  placeholder="<?php echo $wo['lang']['write_comment'];?>" type="text"></textarea>
			</div>
		</form>
	</div>
	<?php endif; ?>
</div>