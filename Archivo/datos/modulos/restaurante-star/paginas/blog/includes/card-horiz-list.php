<div class="publicacion_br" data-rm-blog="<?php echo $wo['blog']['id']; ?>">
	<div class="wow_main_blogs" id="<?php echo $wo['blog']['id']; ?>">
		<span class="avatar">
			<img src="<?php echo $wo['blog']['thumbnail']; ?>" alt="<?php echo $wo['blog']['title']; ?>">
		</span>
		<div class="articulo_blog_texto">
			<h2 class="art-title"><a href="<?php echo $wo['blog']['url']; ?>"><?php echo $wo['blog']['title']; ?></a></h2>
			<p class="textto_blog_cat">
				<span class="postMeta--author-text">
					<time><?php echo date("d M Y",$wo['blog']['posted']); ?></time>
				</span>
				|
				<a class="postCategory" href="<?php echo $wo['blog']['category_link']; ?>" data-ajax="?link1=blog-category&id=<?php echo $wo['blog']['category']; ?>"><?php echo $wo['blog_categories'][$wo['blog']['category']]; ?></a>
			</p>
			<a href="<?php echo $wo['blog']['url']; ?>" class="bboton_blog_le"><?php echo $wo['lang']['read_more'] ?></a>
		</div>
	</div>
</div>
