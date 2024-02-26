<?php 
function lui_GetPopularBlogs($limit) {
    global $sqlConnect, $wo;
    $data = array();
    $query  = mysqli_query($sqlConnect, "SELECT * FROM  " . T_BLOG . "  
                                         ORDER BY `view` DESC LIMIT $limit");
    while ($fetched_data = mysqli_fetch_assoc($query)) {
        $data[] = lui_GetArticle($fetched_data['id']);
    }
    return $data;
}
?>
<div class="main-blog-sidebar">
	<!-- Search system -->
	<div class="widget search-blog">
		<div class="wo_page_hdng" style="padding-bottom:0;">
			<div class="form_sugerencias_conten">
				<input type="text" placeholder="<?php echo $wo['lang']['search']?>" id="search-blog-input">
				<ul class="popular-articles search_suggs" id="recent-blogs-search"></ul>
			</div>
		</div>
		
	</div>

	<!--Popular Posts-->
	<div class="widget">
		<div class="wo_page_hdng">
			<div class="wo_page_hdng_innr">
				<?php echo ucfirst($wo['lang']['popular_posts']);?>
			</div>
		</div>
		<ul class="popular-articles">
		<?php 
		$blogs = lui_GetPopularBlogs(5);
		foreach ($blogs as $key => $wo['blog-style']) {
			echo lui_LoadPage('blog/blog-popular');
		}
		?>
		</ul>
	</div>
	<?php if ($wo['config']['user_ads'] == 1 && $wo['loggedin']): ?>
	<div class="widget sidebar">
        <?php 
            foreach (lui_GetSideBarAds() as $wo['sidebar-ad']) {
                echo lui_LoadPage('ads/includes/sidebar-ad');
            }
        ?>
        <div class="clear"></div>
    </div>
    <?php endif; ?>
	
	<!--Categories-->
	<div class="widget">
		<div class="wo_page_hdng">
			<div class="wo_page_hdng_innr">
				<?php echo $wo['lang']['categories'];?>
			</div>
		</div>
		<ul class="popular-categories">
			<?php 
				$category_id = (!empty($_GET['id'])) ? (int) $_GET['id'] : 0;
				foreach ($wo['blog_categories'] as $key => $category) {
			?>
			<li>
				<a href="<?php echo lui_SeoLink('index.php?link1=blog-category&id=' . $key) ?>" data-ajax="?link1=blog-category&id=<?php echo $key?>"><?php echo $category;?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>

<script>
$('#search-blog-input').keyup(function(event) {
	$keyword = $(this).val();
	$('#load-search-icon').removeClass('hidden');
	$.post(Wo_Ajax_Requests_File() + '?f=search-blog-read', {keyword: $keyword}, function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('#recent-blogs-search').html(data.html);
		} else {
			$('#recent-blogs-search').html('<div class="text-center">' + data.message + '</div>');
		}
		$('#load-search-icon').addClass('hidden');
	});
});
</script>