<div class="blog-sidebar row">
	<div style="margin: 20px 10px;">
		<h4 style="font-weight: 600;font-size: 17px;">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> <?php echo $wo['lang']['read_more'] ?>
		</h4>
	</div>
	<?php 
	$blogs = lui_GetBlogs(array('limit' => 3, 'order_by' => 'RAND', 'id' => $wo['article']['id']));
	foreach ($blogs as $key => $wo['blog-style']) {
		echo lui_LoadPage('blog/blog-recom');
	}
	?>
</div>
