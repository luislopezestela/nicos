<div class="slider__item slider__nuevo_item <?php echo($wo['user_status']['have_not_seen'] ? "not_seen_story" : ""); ?> ">
	<a class="see_all_stories" data_story_user_id="<?php echo $wo['user_status']['user_data']['user_id']?>" data_story_type="friends">
		<img width="100%" src="<?php echo $wo['user_status']['thumb']['filename'];?>" >
		<p><?php echo $wo['user_status']['user_data']['name']?></p>
	</a>
</div>