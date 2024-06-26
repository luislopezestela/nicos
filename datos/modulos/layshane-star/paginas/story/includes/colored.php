<?php if (!empty($wo['story']['color_id']) && !empty($wo['post_colors'][$wo['story']['color_id']])) { ?>
	<div dir="auto" 
		<?php if($wo['config']['colored_posts_system'] == 1){ ?>
			class="wo_actual_colrd_post" style="
			<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_1) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_2) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>
				background-image: linear-gradient(45deg, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_1; ?> 0%, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_2; ?> 100%);
			<?php }else{ ?>
				background-image:url('<?php echo lui_GetMedia($wo['post_colors'][$wo['story']['color_id']]->image); ?>'); <?php } ?>
			<?php if(strlen($wo['story']['postText']) > 330){ ?>font-size: 16px;font-weight: normal;<?php } ?>"
		<?php } ?>
	>
		<span data-translate-text="<?php echo $wo['story']['id']; ?>" <?php if($wo['config']['colored_posts_system'] == 1){ ?> style="<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>color:<?php echo $wo['post_colors'][$wo['story']['color_id']]->text_color; ?><?php } ?>"<?php } ?>> <?php echo $wo['story']['postText']; ?></span>
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
	</div>
<?php } ?>