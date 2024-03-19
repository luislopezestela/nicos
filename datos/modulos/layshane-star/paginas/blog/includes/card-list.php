<div class="publicacion_br" data-blog-id="<?php echo $wo['article']['id']; ?>">
	<div class="contenido_datos_blof">
		<span class="imagen_blod">
			<img decoding="async" src="<?php echo $wo['article']['thumbnail']; ?>" alt="<?php echo $wo['article']['title']; ?>" title="<?php echo $wo['article']['title']; ?>" srcset="<?php echo $wo['article']['thumbnail']; ?> 768w, <?php echo $wo['article']['thumbnail']; ?> 480w" sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 768px, 100vw">
		</span>
		<div class="articulo_blog_texto">
			<h2><a href="<?php echo $wo['article']['url']; ?>"><?php echo $wo['article']['title']; ?></a></h2>
			<p class="textto_blog_cat">
				<span class="postMeta--author-text">
					<time><?php echo date("d M Y",$wo['article']['posted']); ?></time>
				</span>
				|
				<a class="postCategory" href="<?php echo $wo['article']['category_link']; ?>" data-ajax="?link1=blog-category&id=<?php echo $wo['article']['category']; ?>"><?php echo $wo['blog_categories'][$wo['article']['category']]; ?></a>
			</p>
			
			
			<a href="<?php echo $wo['article']['url']; ?>" class="bboton_blog_le"><?php echo $wo['lang']['read_more'] ?></a>
		</div>
	</div>
</div>

