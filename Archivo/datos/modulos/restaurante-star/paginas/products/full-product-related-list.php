<div class="col-xs-6 col-sm-4 col-md-3" id="product-<?php echo $wo['product']['id']?>" data-id="<?php echo $wo['product']['id']?>">
	<div class="wo_post_prod_full_related">
		<?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
			<?php if(isset($color_id['id_color'])!=0): ?>
				<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
				<?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
				<?php $el_color_b = '&type='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
			<?php else: ?>
				<?php $el_color = ''; ?>
				<?php $el_color_b = ''; ?>
			<?php endif ?>
		<a href="<?php echo $wo['product']['url'].$el_color?>" class="img" data-ajax="?link1=timeline&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
			<img src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']?>">
		</a>
		<div class="info">
			<h5 class="title">
				<a href="<?php echo $wo['product']['url'].$el_color?>" data-ajax="?link1=timeline&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>" title="<?php echo $wo['product']['name']?>"><?php echo $wo['product']['name']?></a>
			</h5>
			<div class="product-price">
				&nbsp;<?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']?>
			</div>
			<div class="product-by">
				<?php
				    $product_by_ = $wo['product']['category'];
				    $product_by_ = str_replace('{product_category_name}', $wo['lang'][$wo['products_categories'][$wo['product']['category']]['lang_key']], $product_by_);
				?>
				&nbsp;<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $wo['product']['category']);?>" data-ajax="?link1=products&c_id=<?php echo $wo['product']['category'];?>"><?php echo $wo['lang'][$wo['products_categories'][$wo['product']['category']]['lang_key']];?></a>
			</div>
		</div>
	</div>
</div>