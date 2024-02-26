<?php
	if (!empty($wo['story']['product_id']) && !empty($wo['story']['product']) && !empty($wo['story']['product']['images'])) {
		$class = '';
		$small = '';
		$singleimg = 'wo_single_proimg';

    echo '<div class="">';

		
		echo '<div class="wo_post_prod_img">';
			if (count($wo['story']['product']['images']) > 0) {
				foreach (array_slice($wo['story']['product']['images'],0,1) as $key => $photo) {
					$color_id = lui_buscar_color_en_opciones($photo['id_color']);
					if(isset($color_id['id_color'])!=0){
						$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
						$el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
						$el_color_b = '&type='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
					}else{
						$el_color = '';
						$el_color_b = '';
					}
					echo '<a href="'.$wo['story']['product']['url'].$el_color.'" data-ajax="?link1=timeline&items='.$wo['story']['product']['seo_id'].$el_color_b.'">';
						echo  "<img src='" . ($photo['image_org']) ."' alt='".$wo['story']['product']['name']."' class='" . $class . " " . $singleimg . " image-file pointer'>";
					echo '</a>';
				}
			}else{
				foreach ($wo['story']['product']['images'] as $photo) {
					$color_id = lui_buscar_color_en_opciones($photo['id_color']);
					if(isset($color_id['id_color'])!=0){
						$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
						$el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
						$el_color_b = '&type='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
					}else{
						$el_color = '';
						$el_color_b = '';
					}
					echo '<a href="'.$wo['story']['product']['url'].$el_color.'" data-ajax="?link1=timeline&items='.$wo['story']['product']['seo_id'].$el_color_b.'">';
						echo  "<img src='" . ($photo['image_org']) ."' alt='".$wo['story']['product']['name']."' class='" . $class . " " . $singleimg . " image-file pointer'>";
					echo '</a>';
				}
			}
		echo '</div>';
		


		$symbol =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
		$text =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['text'])) ? $wo['currencies'][$wo['story']['product']['currency']]['text'] : $wo['config']['classified_currency'];
		//$status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
        //if ($wo['story']['product']['units'] > 0) {
          //$status = ($wo['story']['product']['status'] == 0) ? '' . $wo['lang']['in_stock'] . '' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
        //}
		$type = ($wo['story']['product']['type'] == 0) ? '' . $wo['lang']['new'] . '' : '' . $wo['lang']['used'] . '<br>';
		echo '<div class="produc_info">';
		
		?>
		<?php if ($wo['loggedin']) { ?>
			<div class="wo_store_post_btns">
				<?php if ($wo['story']['product']['user_id'] != $wo['user']['user_id']) { ?>
					<?php if ($wo['config']['store_system'] == 'on') { ?>
					<?php if (!empty($wo['story']['product']['units']) && $wo['story']['product']['units'] > 0) { ?>
						<button class="contact btn btn-main btn-mat" onclick="AddProductToCart_layshane(this,'<?php echo($wo['story']['product']['id']); ?>','add')">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg>
						</button>
					<?php }else{ ?>
						<button class="contact btn btn-main btn-mat" style="background-color:buttonface;" >
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg>
						</button>
					<?php } ?> 
					<?php } ?>
				<?php } ?>
			</div>
		<?php } ?>
		<?php
		echo '<div class="producto_stock product-title">';
		echo '<span> ' .$type. '</span>';
		echo '</div>';

		echo '<div class="product-title">';
		echo '<span> ' . $wo['story']['product']['name'] . '</span>';
		echo '</div>';

		echo '<div class="product-price">' . $symbol . $wo['story']['product']['price_format'] . ' (' . $text . ')</div>';
		?>
		
		<?php

		$fields = lui_GetCustomFields('product'); 
		if (!empty($fields)) {
			foreach ($fields as $key => $wo['field']) { 
				if (!empty($wo['story']['product']['fid_'.$wo['field']['id']])) {
					if ($wo['field']['type'] == 'selectbox') {
						$options = @explode(',', $wo['field']['options']);
						foreach ($options as $key => $value) {
							if (($key + 1) == $wo['story']['product']['fid_'.$wo['field']['id']]) {
								$wo['story']['product']['fid_'.$wo['field']['id']] = $value;
							}
						}
					}
					echo '<div class="wow_post_prod_infos"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /></svg><p class="product-description">' . $wo['story']['product']['fid_'.$wo['field']['id']] . '</p></div>';
		        } 
		    } 
	    } 


		echo '</div>';
		echo '</div>';
} ?>