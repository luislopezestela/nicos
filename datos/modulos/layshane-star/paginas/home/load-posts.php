<?php $section_keys = lui_GetSectionCatKeys('section_product'); ?>
<div id="posts" class="productos_layshane">
	<?php if(!empty($wo['sections_categories'])): ?>
		<?php foreach ($wo['sections_categories'] as $section_id => $section_name): ?>
			<?php $categorias = lui_GetCategories_sections(T_PRODUCTS_CATEGORY,$section_id); ?>
			<div class="paage_welcome">
				<h4 class="titulo_layshane_peru_h"><?=$wo["lang"][$section_keys[$section_id]]; ?></h4>
			</div>
			<nav>
				<ul class="productos_contenido" style="padding-left:0!important;">
					<?php foreach ($categorias as $category): ?>
						<?php $cat_id_produc = $category['id']; ?>
						<?php if ($cat_id_produc==0): ?>
						<?php else: ?>
						<?php $cat_logo_produc = $category['logo']; ?>
						<?php $cat_nombre_producs = $wo["lang"][$category["lang_key"]];?>
						<li class="product_layshane">
							<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id='.$cat_id_produc);?>" data-ajax="?link1=tienda&c_id=<?=$cat_id_produc?>" alt="Comprar - <?=$cat_nombre_producs;?>">
								<figure class="categories-g__bg bg--change" data-bg="<?=$cat_logo_produc; ?>" style="background-image: url(&quot;<?=$cat_logo_produc; ?>&quot;);"></figure>
								<span class="name_product" alt="Informacion <?=$cat_nombre_producs;?>"><?=$cat_nombre_producs;?></span>
							</a>
						</li>
						<?php endif ?>
					<?php endforeach ?>
				</ul>
			</nav>
		<?php endforeach ?>
	<?php endif ?>
</div>