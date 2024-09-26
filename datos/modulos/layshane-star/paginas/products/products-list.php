<?php $colores = '';
$condicion = ($wo['product']['type'] == 0) ? '' . "NewCondition" . '' : '' . "RefurbishedCondition" . '';
$condicions = ($wo['product']['type'] == 0) ? '' . "Nuevo" . '' : '' . "Reacondicionado" . ''
?>
<?php if (!empty($wo['product']['images'][0]['id_color'])): ?>
   <?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
   
   <?php if(isset($color_id['id_color'])!=0): ?>
      <?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
      <?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
      <?php $el_color_b = '&opcion='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
      <?php $colores = ' Color '.$wo['lang'][$buscar_el_color_por_id['lang_key']]; ?>
   <?php else: ?>
      <?php $el_color = ''; ?>
      <?php $el_color_b = ''; ?>
   <?php endif ?>
<?php else: ?>
   <?php $el_color = ''; ?>
   <?php $el_color_b = ''; ?>
<?php endif ?>

<div class="product" id="product-<?php echo $wo['product']['id']?>" data-id="<?php echo $wo['product']['id']?>">
	<div class="product_info wow_main_mkt_prod">
		<div class="product-image">
			<a href="<?php echo $wo['product']['url']?><?=$el_color;?>" style="font-size:0;"  data-ajax="?link1=item&items=<?=$wo['product']['seo_id'].$el_color_b;?>">
				<?php echo $wo['product']['name']?><?php echo $colores; ?>
				<img width="400" height="400" loading="lazy" src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="Imagen">
			</a>
		</div>
		<div class="produc_info">
			<div class="product-by">
				<?php
				    $product_by_ = $wo['product']['category'];
				    $product_by_ = str_replace('{product_category_name}', $wo['products_categories'][$wo['product']['category']]['id'], $product_by_);
				?>
				<span>
					<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id=' . $wo['product']['category']);?>"><?php echo $wo["lang"][$wo['products_categories'][$wo['product']['category']]['lang_key']];?></a>
					<?php if (!empty($wo['product']['product_sub_category'])) { ?>
						<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id=' . $wo['product']['category'].'&sub_id='.$wo['product']['sub_category']);?>"><?php echo $wo['product']['product_sub_category'];?></a>
					<?php } ?>
				</span>
				<span class="<?=$condicion;?>cc"><?=$condicions;?></span>
			</div> 

			<div class="product-title">
				<a class="titulos_prodf" href="<?php echo $wo['product']['url']?><?=$el_color;?>" data-ajax="?link1=item&items=<?=$wo['product']['seo_id'].$el_color_b;?>" title="<?php echo $wo['product']['name']?><?php echo $colores; ?>"><?php echo $wo['product']['name']?><?php echo $colores; ?></a>
			</div>
			<div class="product-price">
				<?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?>
				<?php echo $wo['product']['price_format']?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>