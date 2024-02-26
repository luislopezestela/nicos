<div id="posts" class="productos_en_cuadros">
	<?php
		if ($wo['config']['pro'] == 1) {
		$promoted = $wo['story'] = lui_GetPromotedPost();
		if (count($promoted) > 0) {
		$wo['story']['post_is_promoted'] = 1;
	?>
	<div class="promoted-post">
		<span class="promoted-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award" data-toggle="tooltip" title="<?php echo $wo['lang']['promoted'];?>">
				<circle cx="12" cy="8" r="7"></circle>
				<polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
			</svg>
		</span>
		<?php echo lui_LoadPage('story/content'); ?>
	</div>
	<?php } } ?>
	<?php
		$stories = lui_GetPosts(array('limit' => 10, 'publisher_id' => 0,'placement' => 'multi_image_post','anonymous' => true));
		if (count($stories) <= 0) {
			echo lui_LoadPage('story/no-stories');
		} else {
			foreach ($stories as $wo['story']) {
				echo lui_LoadPage('story/content');
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