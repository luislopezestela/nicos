<div class="columna-4 columna-x4" data-rm-blog="<?php echo $wo['blog']['id']; ?>">
	<div class="view-blog wow_main_blogs" id="<?php echo $wo['blog']['id']; ?>">
		<div class="avatar">
			<img src="<?php echo $wo['blog']['thumbnail']; ?>" alt="<?php echo $wo['blog']['title']; ?>">
			<div class="wow_main_blogs_info">
				<a class="postCategory" href="<?php echo $wo['blog']['category_link']; ?>" data-ajax="?link1=blog-category&id=<?php echo $wo['blog']['category']; ?>"><?php echo $wo['blog_categories'][$wo['blog']['category']]; ?></a>
				<h2 class="art-title"><a href="<?php echo $wo['blog']['url']; ?>"><?php echo $wo['blog']['title']; ?></a></h2>
				<div class="postMeta--author-text">
					<span><?php echo $wo['blog']['view']; ?> <?php echo $wo['lang']['views'] ?></span>
					<span class="middot">·</span>
					<time><?php echo date("d M Y",$wo['blog']['posted']); ?></time>
				</div>
				<?php if ($wo['blog']['is_post_admin']):?>
					<div class="wow_main_blogs_btns">
						<a href="<?php echo lui_SeoLink('index.php?link1=edit-blog&id=' . $wo['blog']['id']) ?>" class="btn btn-mat" id="<?php echo $wo['blog']['id'];?>"><?php echo $wo['lang']['edit']; ?></a>
						<a class="btn btn-mat delete-blog" id="<?php echo $wo['blog']['id'];?>"><?php echo $wo['lang']['delete'] ?></a>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>