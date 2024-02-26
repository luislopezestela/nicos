ewfewefwefweefw
<div id="posts" class="productos_en_cuadros">
	<?php
		if ($wo['config']['pro'] == 1) {
		$promoted = $wo['story'] = lui_GetPromotedPost();
		if (count($promoted) > 0) {
		$wo['story']['post_is_promoted'] = 1;
	?>

	<?php } } ?>
	<?php
		$stories = lui_GetPosts(array('limit' => 10, 'publisher_id' => 0,'placement' => 'multi_image_post','anonymous' => true));
		if (count($stories) <= 0) {
			echo lui_LoadPage('story/no-stories');
		} else {
			foreach ($stories as $wo['story']) {
				
			}
		}
		?>
</div>
<?php if (count($stories) > 0) { ?>
<div class="load-more pointer" id="load-more-posts" onclick="Wo_GetMorePosts();">
	<span class="btn btn-default">
		<i class="fa fa-chevron-circle-down progress-icon" data-icon="chevron-circle-down"></i> &nbsp;<?php echo $wo['lang']['load_more_posts'];?>
	</span>
</div>
<?php } ?>
<!-- .load-more pointer -->
<div id="load-more-filter">
	<span class="filter-by-more hidden" data-filter-by="all"></span>
</div>
<!-- #load-more-filter -->