<?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
<?php if(isset($color_id['id_color'])!=0): ?>
	<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
	<?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
	<?php $el_color_b = '&type='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
<?php else: ?>
	<?php $el_color = ''; ?>
	<?php $el_color_b = ''; ?>
<?php endif ?>
<div class="slider__item slider__nuevo_item not_seen_story ">
	<a href="<?php echo $wo['product']['url'].$el_color;?>" data-ajax="?link1=timeline&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
		<img width="100%" src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>">
		<p class="name_producto_ultimo" style="padding:0px 5px;margin-bottom:0;"><?php echo $wo['product']['name']; ?></p>
		<h4 style="text-align:center;width:100%;margin-top:0;margin-bottom:3px;"><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
	</a>
</div>