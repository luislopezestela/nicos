<div class="who_react_to_this_user">
	<div class="who_react_to_this_user_info">
		<div class="avatar <?php echo lui_RightToLeft('pull-left');?>" id="inline_emo_react">
			<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' .  $wo['WondredLikedusers']['page_info']['page_name'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['WondredLikedusers']['page_info']['page_name'];?>">
			<img src="<?php echo $wo['WondredLikedusers']['page_info']['avatar'];?>" alt="<?php echo $wo['WondredLikedusers']['page_info']['page_name']; ?> Profile Picture" />
			<?php if( isset( $wo['WondredLikedusers']['reaction'] ) ){?>
				<span class="like-emo wo_who_react_this">
					<?php
						switch (strtolower($wo['WondredLikedusers']['reaction'])) {
							case 'like':
								echo '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>';
							break;
							case 'love':
								echo '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>';
							break;
							case 'haha':
								echo '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>';
							break;
							case 'wow':
								echo '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
							break;
							case 'sad':
								echo '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
							break;
							case 'angry':
								echo '<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
							break;
							default:
							}
						?>
				</span>
			<?php } ?>
			</a>
		</div>
		<div>
			<span class="user-popover views_info_count" data-id="<?php echo $wo['WondredLikedusers']['id']; ?>" data-row-id="<?php echo $wo['WondredLikedusers']['row_id']; ?>" data-type="<?php echo $wo['WondredLikedusers']['type']; ?>">
				<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' .  $wo['WondredLikedusers']['page_info']['page_name'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['WondredLikedusers']['page_info']['page_name'];?>"><p><?php echo $wo['WondredLikedusers']['page_info']['page_name']; ?></p></a>
			</span>
		</div>
	</div>
	<div class="user-follow-button">
		<?php echo lui_GetLikeButton($wo['WondredLikedusers']['page_info']['page_id']);?>
	</div>
</div>