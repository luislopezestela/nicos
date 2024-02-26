<div class="product" id="product-<?php echo $wo['product']['id']?>" data-id="<?php echo $wo['product']['id']?>">
	<div class="product_info wow_main_mkt_prod">
		<div class="product-image">
			<?php if(!empty($wo['product']['images'][0]['id_color'])): ?>
				<?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
				<?php if(isset($color_id['id_color'])!=0): ?>
					<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
					<?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
					<?php $el_color_b = '&type='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
				<?php else: ?>
					<?php $el_color = ''; ?>
					<?php $el_color_b = ''; ?>
				<?php endif ?>
			<?php else: ?>
				<?php $el_color = ''; ?>
				<?php $el_color_b = ''; ?>
			<?php endif ?>


			<a href="<?php echo $wo['product']['url']?><?=$el_color;?>" data-ajax="?link1=timeline&items=<?php echo $wo['product']['seo_id'];?><?=$el_color_b;?>">
				<?php if (!empty($wo['product']['images'][0]['image_org'])): ?>
					<img src="<?php echo $wo['product']['images'][0]['image_org'];?>">
				<?php else: ?>
					<svg style="width:100%;height:100%;padding:35px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-x" width="400" height="400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
				<?php endif ?>
			</a>
			<?php if ($wo['loggedin']) { if ($wo['product']['seller']['id'] != $wo['user']['user_id']) { ?>
				<div class="product-links">
					<a class="more-info btn btn-mat" href="<?php echo $wo['product']['url']?><?=$el_color;?>" data-ajax="?link1=timeline&items=<?php echo $wo['product']['seo_id'];?><?=$el_color_b;?>"><?php echo $wo['lang']['more_info'] ?></a>
				</div>
			<?php } else { ?>
			<?php } ?>
			<?php } ?>
			
		</div>
		<div class="produc_info">
			<div class="wow_main_prod_foot" style="<?php echo(empty($wo['product']['units']) && $wo['product']['units'] < 1 ? 'padding-bottom: 5px;' : '') ?>">
				<?php if ($wo['loggedin']) { if ($wo['product']['seller']['id'] != $wo['user']['user_id']) { ?>
					<?php if ($wo['config']['store_system'] == 'on') { ?>
					<?php if (!empty($wo['product']['units']) && $wo['product']['units'] > 0) { ?>
						<button class="contact btn btn-main btn-mat" onclick="AddProductToCart(this,'<?php echo($wo['product']['id']); ?>','add')" title="<?php echo $wo['lang']['buy_now'] ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path></svg>
						</button>
					<?php }else{ ?>
						<button class="contact btn btn-main btn-mat" title="<?php echo $wo['lang']['buy_now'] ?>" style="background-color:buttonface;">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path></svg>
						</button>
					<?php } ?> 
					<?php } ?> 

				<?php } else { ?>
					<a class="btn btn-default btn-mat" href="<?php echo $wo['product']['url']?><?=$el_color;?>" data-ajax="?link1=timeline&items=<?php echo $wo['product']['seo_id'];?><?=$el_color_b;?>" title="<?php echo $wo['lang']['more_info'] ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>
					</a>
				<?php } ?>
				<?php } ?>
			</div>
			<div class="product-by product-title">
				<?php
				    $product_by_ = $wo['product']['category'];
				    $product_by_ = str_replace('{product_category_name}', $wo['products_categories'][$wo['product']['category']]['id'], $product_by_);
			
				?>
				<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $wo['product']['category']);?>"><?php echo $wo["lang"][$wo['products_categories'][$wo['product']['category']]['lang_key']];?></a>
				<?php if (!empty($wo['product']['product_sub_category'])) { ?>
				<div>
					<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $wo['product']['category']);?>"><?php echo $wo['product']['product_sub_category'];?></a>
				</div>
				<?php } ?>
			</div>
			<div class="product-title">
				<a href="<?php echo $wo['product']['url']?>" data-ajax="?link1=post&id=<?php echo $wo['product']['seo_id'];?>" title="<?php echo $wo['product']['name']?>"><?php echo $wo['product']['name']?></a>
			</div>
			<div class="product-price">
				<?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>