<div class="blog-sidebar">
	<div class="wo_page_hdng">
		<div class="wo_page_hdng_innr">
			<?php echo $wo['lang']['read_more'];?>
		</div>
	</div>
	<div class="row">
	<?php 
		$blogs = lui_GetBlogs(array('limit' => 3, 'order_by' => 'RAND', 'id' => $wo['article']['id']));
		foreach ($blogs as $key => $wo['blog-style']) {
			echo lui_LoadPage('blog/blog-recom');
		}
	?>
	</div>
</div>