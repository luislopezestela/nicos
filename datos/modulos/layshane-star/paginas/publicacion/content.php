<div class="page-margin page-wrapper grid  ">
	<main id="maincontent" class="page-main">
		<?php
			$symbol =  (!empty($wo['currencies'][$wo['itemsdata']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['itemsdata']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
			$text =  (!empty($wo['currencies'][$wo['itemsdata']['product']['currency']]['text'])) ? $wo['currencies'][$wo['itemsdata']['product']['currency']]['text'] : $wo['config']['classified_currency'];
			$status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
		    if ($wo['itemsdata']['product']['units'] > 0) {
		      $status = ($wo['itemsdata']['product']['status'] == 0) ? '' . $wo['lang']['in_stock'] . '' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
		    }
		    $estok = 'InStock';
		    if ($wo['itemsdata']['product']['units'] > 0) {
		      $estok = ($wo['itemsdata']['product']['status'] == 0) ? '' . "InStock" . '' : 'OutOfStock';
		    }
			$type = ($wo['itemsdata']['product']['type'] == 0) ? '' . $wo['lang']['new'] . '' : '' . $wo['lang']['used'] . '';
			$condicion = ($wo['itemsdata']['product']['type'] == 0) ? '' . "NewCondition" . '' : '' . "RefurbishedCondition" . '';
			$condicions = ($wo['itemsdata']['product']['type'] == 0) ? '' . "Nuevo" . '' : '' . "Reacondicionado" . '';
			$disponibilidad = ($wo['itemsdata']['product']['disponible'] == 1) ? '' . "InStock" . '' : 'OutOfStock';
			$offerta = false;
			$marca = false;
			if($wo['itemsdata']['product']['marca']) {
				$marca = $wo['itemsdata']['product']['marca'];
			}
			if(!empty($wo['itemsdata']['product']['images'])){
				$color_idc = lui_buscar_color_en_opciones_redir($wo['itemsdata']['product']['id'],1);
				if(!empty($color_idc)){
					$buscar_el_color_por_idc = lui_buscar_color_en_colores($color_idc['id_color']);
					$el_colorvc = lui_SlugPost($wo['lang'][$buscar_el_color_por_idc['lang_key']]);

					if ($wo['atributo_items']==0){
						header('Location: ' . $wo['itemsdata']['product']['url'].'/'.$el_colorvc);
						exit();
					}

					$opciones_del_productod = lui_poner_en_lista_las_opciones($wo['itemsdata']['product']['id']);
					if (isset($opciones_del_productod)) {
						$activacion_de_colores = 0;
						foreach($opciones_del_productod as $color => $valorcolor){
							$buscar_el_color_por_id_atributo = lui_buscar_color_en_colores($valorcolor['id_color']);
							$muestrael_color = lui_SlugPost($wo['lang'][$buscar_el_color_por_id_atributo['lang_key']]);
							$text1 = $muestrael_color;
							$text2 = $wo['atributo_items'];
							if($text1==$text2){
								$activacion_de_colores = 1;
							}
						}
					}
					if($activacion_de_colores==0) {
						header('Location: ' . $wo['itemsdata']['product']['url'].'/'.$el_colorvc);
						exit();
					}
				}
			
			}else{
				header('Location: ' . $wo['itemsdata']['product']['url']);
				exit();
			}

			$cantidad_productos = 0;
			$variantes_atributos = [];
			$atributos_productos = Mostrar_Atributos_producto($wo['itemsdata']['product']['id']);
			//unset($_SESSION['seleccion_atributos']);
			$producto_id = $wo['itemsdata']['product']['id'];
		?>
		<div class="columns">
			<div class="column main_columnas">
				<div name="bvSeoContainer" itemscope itemtype="https://schema.org/Product" itemid="<?=$wo['config']['site_url']."/item/".$wo['itemsdata']['id_publicacion'].$wo['itemsdata']['product']['coloreds']; ?>" style="padding:10px;">
	        <meta itemprop="name" content="<?= isset($wo['itemsdata']['product']['name']) ? htmlspecialchars($wo['itemsdata']['product']['name']) : '' ?>">
					<meta itemprop="sku" content="<?= isset($wo['itemsdata']['product']['sku']) ? htmlspecialchars($wo['itemsdata']['product']['sku']) : '' ?>">
					<meta itemprop="GTIN" content="<?= isset($wo['itemsdata']['product']['gtin']) ? htmlspecialchars($wo['itemsdata']['product']['gtin']) : '' ?>">
					<meta itemprop="mpn" content="<?= isset($wo['itemsdata']['product']['sku']) ? htmlspecialchars($wo['itemsdata']['product']['sku']) : '' ?>">
					<link itemprop="image" href="<?php echo $wo['itemsdata']['product']['imagen_portada']; ?>">
					<meta itemprop="description" content="<?= isset($wo['itemsdata']['product']['description']) ? htmlspecialchars(html_entity_decode(lui_EditMarkup(br2nl($wo['itemsdata']['product']['description'], true, false, false)))) : '' ?>">
					<?php if (isset($marca)): ?>
					    <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope="">
					        <meta itemprop="name" content="<?= htmlspecialchars($marca) ?>">
					    </div>
					<?php endif ?>
					
			    <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope="">
		        <meta itemprop="itemCondition" content="https://schema.org/<?= isset($condicion) ? htmlspecialchars($condicion) : '' ?>">
		        <meta itemprop="price" content="<?= isset($wo['itemsdata']['product']['price_format']) ? htmlspecialchars($wo['itemsdata']['product']['price_format']) : '' ?>">
		        <meta itemprop="priceCurrency" content="<?= isset($text) ? htmlspecialchars($text) : '' ?>">
		        <meta itemprop="itemOffered" content="<?= isset($wo['itemsdata']['product']['name']) ? htmlspecialchars($wo['itemsdata']['product']['name']) : '' ?>">
		        <meta itemprop="availability" content="http://schema.org/<?= isset($disponibilidad) ? htmlspecialchars($disponibilidad) : '' ?>">
		        <meta itemprop="url" content="<?= isset($wo['config']['site_url']) && isset($wo['itemsdata']['id_publicacion']) ? htmlspecialchars($wo['config']['site_url'] . "/item/" . $wo['itemsdata']['id_publicacion'].$wo['itemsdata']['product']['coloreds']) : '' ?>">
			      <?php if (isset($offerta)): ?>
			      	<meta itemprop="priceValidUntil" content="">
			      <?php endif ?>
			    </div>
			    <style type="text/css">
			    	.carg_over_pr_a{aspect-ratio:1;height:100%;width:100%;overflow:hidden;min-width:100%;min-height:100%;max-width:100%;max-height:100%;}
					.carg_over_pr_a img{width:100;}
			    </style>
					<div class="hpols-bts-pdp grid">
						<?php if (!empty($wo['itemsdata']['product']['images'])): ?>
							<div class="producto_media_display media">
								<div class="wo_post_prod_full_img in-use-carousel flickity-enabled is-draggable carg_over_pr_a" data-flickity='{ "imagesLoaded": true }'>
									<?php
									$el_colorv = null;
										foreach($wo['itemsdata']['product']['images'] as $index => $photo){
											$color_id = lui_buscar_color_en_opciones($photo['id_color']);
											if(isset($color_id['id_color'])!=0) {
												$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
												$el_colorv = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
												if ($wo['atributo_items']==$el_colorv) {
													if ($index === 0) {
														echo '<img class="imagen" src="'. $photo['image'] .'" data-flickity-lazyload-src="'. ($photo['image']) .'" loading="lazy" title="'.$wo['itemsdata']['product']['name'].'_'.$photo['id'].'" alt="'.$wo['itemsdata']['product']['name'].'" onclick="Wo_OpenAlbumLightBox(' . $photo['id'] . ', \'product\');" data-flickity-lazyload="'. ($photo['image']) .'">';
													}else{
														echo '<img class="imagen" data-flickity-lazyload-src="'. ($photo['image']) .'" loading="lazy" title="'.$wo['itemsdata']['product']['name'].'_'.$photo['id'].'" alt="'.$wo['itemsdata']['product']['name'].'" onclick="Wo_OpenAlbumLightBox(' . $photo['id'] . ', \'product\');" data-flickity-lazyload="'. ($photo['image']) .'">';
													}
												}else{}
											}else{
												if ($index === 0) {
													echo '<img class="imagen" src="'. $photo['image'] .'" data-flickity-lazyload-src="'. ($photo['image']) .'" loading="lazy" title="'.$wo['itemsdata']['product']['name'].'_'.$photo['id'].'"  alt="'.$wo['itemsdata']['product']['name'].'"  onclick="Wo_OpenAlbumLightBox(' . $photo['id'] . ', \'product\');" >';
												}else{
													echo '<img class="imagen" data-flickity-lazyload-src="'. ($photo['image']) .'" loading="lazy" title="'.$wo['itemsdata']['product']['name'].'_'.$photo['id'].'"  alt="'.$wo['itemsdata']['product']['name'].'"  onclick="Wo_OpenAlbumLightBox(' . $photo['id'] . ', \'product\');" >';
												}
											}
										}
									?>
								</div>
								
				
								<div class="wo_post_prod_full_img_slider loated_disoka_b carg_over_b">
									<?php
									$s_photo_color_id = false;
									$el_colorx = null;
										foreach($wo['itemsdata']['product']['images'] as $photo){
											$color_id = lui_buscar_color_en_opciones($photo['id_color']);
											if(isset($color_id['id_color'])!=0) {
												$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
												$el_colorx = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
												if($wo['atributo_items']==$el_colorx){
													$s_photo_color_id = $color_id['id_color'];
													$rutadeimage = $photo['image_mini'];
													$ch = curl_init($rutadeimage);
													curl_setopt($ch, CURLOPT_NOBODY, true);
													curl_exec($ch);
													$statuss = curl_getinfo($ch, CURLINFO_HTTP_CODE);
													curl_close($ch);
													if($statuss == 200) {
														echo  "<div><img src='" . ($photo['image_mini']) ."' loading='lazy' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
													}else{
														echo  "<div><img src='" . ($photo['image_org']) ."' loading='lazy' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
													}
													
												}
											}else{
												$rutadeimage = $photo['image_mini'];
												$ch = curl_init($rutadeimage);
												curl_setopt($ch, CURLOPT_NOBODY, true);
												curl_exec($ch);
												$statuss = curl_getinfo($ch, CURLINFO_HTTP_CODE);
												curl_close($ch);
												if($statuss == 200) {
													echo  "<div><img src='" . ($photo['image_mini']) ."' loading='lazy' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
												}else{
													echo  "<div><img src='" . ($photo['image_org']) ."' loading='lazy' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
												}
											}
										}
									?>
								</div>
							</div>
							<span class="copy_url_product_data">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
							    <path d="M14.5563 13.2183C13.514 14.2606 11.8241 14.2606 10.7817 13.2183C9.73942 12.1759 9.73942 10.486 10.7817 9.44364L13.1409 7.0845C14.1357 6.08961 15.7206 6.04433 16.7692 6.94866M16.4437 3.78175C17.486 2.73942 19.1759 2.73942 20.2183 3.78175C21.2606 4.82408 21.2606 6.51403 20.2183 7.55636L17.8591 9.9155C16.8643 10.9104 15.2794 10.9557 14.2308 10.0513" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
							    <path d="M21 13C21 16.7712 21 18.6569 19.8284 19.8284C18.6569 21 16.7712 21 13 21H11C7.22876 21 5.34315 21 4.17157 19.8284C3 18.6569 3 16.7712 3 13V11C3 7.22876 3 5.34315 4.17157 4.17157C5.34315 3 7.22876 3 11 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
								</svg>
							</span>
						<?php endif ?>
						<div class="informacion_del_producto">
							<div class="page-title-wrapper product">
								<h1 class="page-title">
									<span class="base" data-ui-id="page-title-wrapper" itemprop="name"><?php echo $wo['itemsdata']['product']['name'] ?></span>
								</h1>
								<p><?php echo html_entity_decode($wo['itemsdata']['product']['description']);?></p>
								<?php $sku_colors_product = $db->where('id_producto',$wo['itemsdata']['product']['id'])->where('id_color',$s_photo_color_id)->getOne('lui_opcion_de_colores_productos'); ?>
								<?php if (isset($sku_colors_product->sku)): ?>
									<span>SKU: <?=$sku_colors_product->sku;?></span>
								<?php else: ?>
									<?php if($wo['itemsdata']['product']['sku']!=''): ?>
										<span>SKU: <?=$wo['itemsdata']['product']['sku'];?></span>
									<?php endif ?>
								<?php endif ?>
								<?php if (!empty($wo['itemsdata']['product']['marca'])): ?>
									<span style="text-transform:uppercase;"><?=$wo['lang']['brand'].': '.$wo['itemsdata']['product']['marca']; ?></span>
								<?php endif ?>
								<?php if (!empty($wo['itemsdata']['product']['marca'])): ?>
									<span style="text-transform:uppercase;"><?=$wo['lang']['modelo'].': '.$wo['itemsdata']['product']['modelo']; ?></span>
								<?php endif ?>
								<span class="<?=$condicion;?>"><?=$condicions;?></span>
								<span style="display:flex;gap:1rem;">
									<?php if (!empty($wo['itemsdata']['product']['disponible']==1)): ?>
										<div style="color:#002fff;">En inventario</div>
									<?php else: ?>
										<div style="color:#d20000;">Agotado</div>
									<?php endif ?>
									<?php if (!empty($wo['itemsdata']['product']['solo_web']==1)): ?>
										<div>|</div>
										<div style="color:#0066f4;">Solo por la web</div>
									<?php endif ?>
								</span>
							</div>

							<?php
								$stars = '0';
								if (!empty($wo['itemsdata']['product']['rating']) && is_numeric($wo['itemsdata']['product']['rating'])) {
									$stars = $wo['itemsdata']['product']['rating'];
								}
							?>
							<?php if ($wo['config']['store_system'] == 'on') { ?>
								<div class="pr_stars wo_post_prod_full_stars" data-stars="<?php echo $stars; ?>">
									<svg class="star rating" viewBox="0 0 24 24" width="18" height="18" data-rating="1"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
									<svg class="star rating" viewBox="0 0 24 24" width="18" height="18" data-rating="2"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
									<svg class="star rating" viewBox="0 0 24 24" width="18" height="18" data-rating="3"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
									<svg class="star rating" viewBox="0 0 24 24" width="18" height="18" data-rating="4"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
									<svg class="star rating" viewBox="0 0 24 24" width="18" height="18" data-rating="5"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
									<span <?php if($wo['loggedin'] == true) { echo 'onclick="ShowProductReviews('.$wo['itemsdata']['product']['id'].')" ';}?>  class="pointer"><?php echo $wo['itemsdata']['product']['reviews_count'] ?> <?php echo $wo['lang']['reviews']; ?></span>
								</div>
							<?php } ?>
							<?php $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['itemsdata']['product']['id']);?>
							<?php
							$precio_de_atributos = 0;
							foreach ($atributos_productos as $atributo) {
							    if ($atributo['nombre'] == 'Color') {
							        continue;
							    }
							    $atributos_opciones_a = Mostrar_Opciones_Atributos_producto($atributo['id']);
							    foreach ($atributos_opciones_a as $opcion) {
							        if (isset($_SESSION['seleccion_atributos'][$wo['itemsdata']['product']['id']][$atributo['id']])) {
							            if ($_SESSION['seleccion_atributos'][$wo['itemsdata']['product']['id']][$atributo['id']] == $opcion['id']) {
							                $precio_de_atributos += $opcion['precio_adicional'];
							                break;
							            }
							        } elseif ($opcion['active'] == 1) {
							            $precio_de_atributos += $opcion['precio_adicional'];
							        }
							    }
							}
							if (!empty($sku_colors_product->precio_adicional)) {
								$precio_subtotal_producto = $sku_colors_product->precio_adicional+$wo['itemsdata']['product']['price'];
							}else{
								$precio_subtotal_producto = $wo['itemsdata']['product']['price'];
							}

							if ($precio_de_atributos > 0) {
								$suma_precios_atributs = $precio_de_atributos;
								$precio_tota_del_producto = $suma_precios_atributs+$precio_subtotal_producto;
							}else{
								$precio_tota_del_producto = $precio_subtotal_producto;
							}
							
							echo '<div class="wo_post_prod_full_price">' . $symbol . '<span id="total_price">' .number_format($precio_tota_del_producto, 2,".",".") . '</span> (' . $text . ')</div>';
							?>
							<?php if (isset($opciones_del_producto)): ?>
								<?php if (count($opciones_del_producto) > 0): ?>
									<style type="text/css">
										.atributos_from_publication_color{display:flex;width:100%;background:transparent;position:relative;margin:18px auto;}
										.content_atributos{display:flex;flex-wrap:wrap;}
										.content_atributos .atribut_product{border: 2px solid transparent; display:flex;border-radius:5px;box-shadow: -10px -10px 20px rgb(255, 255, 255), 10px 10px 20px rgba(0, 0, 0, 0.1);color:#b6b6b6;background:#f4f4f4;list-style:none;margin:7px;}
										.content_atributos span{position:absolute;top:-17px;left:1px;color:#333;}
										.content_atributos .atribut_product a{text-transform:uppercase;padding:6px 8px;text-decoration:none;display:flex;justify-content:center;align-items: center;}
										.content_atributos .atribut_product a i{display:block;height:20px;width:20px;border-radius:30px;margin:5px;}
										.btn_sty_go{box-shadow: -10px -10px 20px rgb(255, 255, 255), 10px 10px 20px rgba(0, 0, 0, 0.1);background:#f4f4f4;transition:all .5s;}
									</style>
									<div class="atributos_from_publication_color">
										<div class="content_atributos">
											<?php $nombreColorMostrado = false; foreach ($opciones_del_producto as $color => $valorcolor): $seleccionadocoloor='';?>
												<?php if (!empty($valorcolor['id_atributo'])): ?>
													<?php $atributo = $db->where('id',$valorcolor['id_atributo'])->getOne('atributos'); ?>
													<?php if ($atributo->nombre=='Color' && !$nombreColorMostrado): ?>
														<span><?=$atributo->nombre;?></span>
														<?php $nombreColorMostrado = true; ?>
													<?php endif ?>
													<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color'])?>
													<?php $el_color = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
													<?php if($el_color==$wo['atributo_items']): ?>
														<?php $seleccionadocoloor = 'style="border: 2px solid '.$buscar_el_color_por_id['color'].'!important;"'; ?>
													<?php endif ?>
													
													<div class="atribut_product" <?=$seleccionadocoloor; ?>>
														<a href="<?=$wo['itemsdata']['product']['url'].'/'.$el_color?>" data-ajax="?link1=item&items=<?=$wo['itemsdata']['product']['seo_id'].'&opcion='.$el_color;?>"><?=$wo['lang'][$buscar_el_color_por_id['lang_key']]; ?> <i style="background:<?=$buscar_el_color_por_id['color'];?>;"></i></a>
													</div>
												<?php else: ?>
													<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color'])?>
													<?php $el_color = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
													<?php if($el_color==$wo['atributo_items']): ?>
														<?php $seleccionadocoloor = 'style="border: 2px solid '.$buscar_el_color_por_id['color'].'!important;"'; ?>
													<?php endif ?>
													<div class="atribut_product" <?=$seleccionadocoloor; ?>>
														<a href="<?=$wo['itemsdata']['product']['url'].'/'.$el_color?>" data-ajax="?link1=item&items=<?=$wo['itemsdata']['product']['seo_id'].'&opcion='.$el_color;?>"><?=$wo['lang'][$buscar_el_color_por_id['lang_key']]; ?> <i style="background:<?=$buscar_el_color_por_id['color'];?>;"></i></a>
													</div>
												<?php endif ?>
											<?php endforeach ?>
										</div>
									</div>
								<?php else: ?>
									<br>
								<?php endif ?>
							<?php endif ?>
							
							
							<div class="content_atributos_c">
								<?php foreach($atributos_productos as $wo['atributos']): ?>
									<?php if($wo['atributos']['nombre']=='Color'): ?>
									<?php else: $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos']['id']);?>
										<span><?=$wo['atributos']['nombre'];?></span>
										<div class="contenido_opciones_atriburts">
											<?php foreach ($atributos_opciones as $wo['opt_atributos']): ?>
												<?php $isChecked = '';
												if (isset($_SESSION['seleccion_atributos'][$wo['itemsdata']['product']['id']][$wo['atributos']['id']])) {
													if ($_SESSION['seleccion_atributos'][$wo['itemsdata']['product']['id']][$wo['atributos']['id']] == $wo['opt_atributos']['id']) {
														$isChecked = 'checked';
													}
													$selecciones = $_SESSION['seleccion_atributos'][$wo['itemsdata']['product']['id']];
													foreach ($selecciones as $atributoId => $opcionId) {
														if (!isset($variantes_atributos[$atributoId])) {
															$variantes_atributos[$atributoId] = [];
														}
														$variantes_atributos[$atributoId][] = $opcionId;
													}
												} elseif ($wo['opt_atributos']['active'] == 1) {
													$isChecked = 'checked';
													$variantes_atributos[$wo['atributos']['id']][] = $wo['opt_atributos']['id'];
												} ?>
												<div class="lista_de_opciones_de_atributes">
													<input class="seleccted_atributes_s" type="radio" name="opcion<?=$wo['atributos']['id'];?>" id="atr_opt_list<?=$wo['opt_atributos']['id'];?>" <?=$isChecked; ?> value="<?=$wo['opt_atributos']['precio_adicional']; ?>" data-atributo="<?=$wo['atributos']['id'];?>" data-opcion="<?=$wo['opt_atributos']['id'];?>" onchange="updateSelection()">
													<label for="atr_opt_list<?=$wo['opt_atributos']['id'];?>"><?=$wo['opt_atributos']['nombre'];?></label>
												</div>
											<?php endforeach ?>
										</div>
									<?php endif ?>
								<?php endforeach ?>
							</div>
							<?php
							    if (!empty($variantes_atributos)) {
								    $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$wo['itemsdata']['product']['id']} AND estado = 1";
								    $subqueries = [];
								    foreach ($variantes_atributos as $atributo => $opciones) {
								        foreach ($opciones as $opcion) {
								            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
								        }
								    }
								    $cantidad_prod = $db->rawQueryOne($sql)->cantidad;
								    $cantidad_productos =	($cantidad_prod !== null) ? $cantidad_prod : 0;
								} else{
									if ($s_photo_color_id) {
										$cantidad_productos = $db->where('estado', 1)
										->where('color', $s_photo_color_id)
										->where('producto', $wo['itemsdata']['product']['id'])
										->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
										$cantidad_productos = ($cantidad_productos !== null) ? $cantidad_productos : 0;
									}else{
										$cantidad_productos = $db->where('estado', 1)
										->where('producto', $wo['itemsdata']['product']['id'])
										->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
										$cantidad_productos = ($cantidad_productos !== null) ? $cantidad_productos : 0;
									}
								}
							?>
							<span hidden id="cantidad_products"><?=$cantidad_productos;?></span>
							<?php if ($wo['loggedin']) { ?>
								<div class=" wo_post_prod_full_btns">
									<?php if ($wo['config']['store_system'] == 'on') { ?>
										<?php if (!empty($cantidad_productos) && $cantidad_productos > 0) { ?>
											<?php $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['product']['id']) ?>
											<?php //$color_nombre_atributo = $db->where('id_producto', $wo['product']['id'])->getOne('atributos')?>
											<br><br>
											<?php if ($opciones_del_producto): ?>
											<?php else: ?>
												<?php $existencia_atributes = false; foreach ($atributos as $wo['atributos_b']): ?>
													<?php if($wo['atributos_b']['nombre']=='Color'): ?>
													<?php else: ?>
														<?php $existencia_atributes = true; ?>
													<?php endif ?>
												<?php endforeach ?>

												<button class="flex buttton_add_cart_list button3  contact btn-main btn btn-mat <?php echo ($existencia_atributes==true ? 'menu-link_us_add': 'add_product_compra_list'); ?>" data-col="" data-id="<?php echo($wo['itemsdata']['product']['id']); ?>">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg> <?php echo($wo['lang']['buy_now']) ?>
												</button>
											<?php endif ?>
											
											<br><br>
										<?php }?>
									<?php } ?>
								</div>
							<?php } ?>
							<style type="text/css">
								.selected-information{width:100%;max-width:500px;padding:15px!important;word-spacing:4px;line-height:1.8;margin:10px 0;}
								.selected-information>p{margin-bottom:1em!important;}
							</style>
							<?php if($wo['loggedin'] == false): ?>
								<div class="selected-information alert alert-info">
									<p>Para realizar una compra, es necesario
									<a style="color:#000;font-weight:700;" href="<?php echo lui_SeoLink('index.php?link1=acceder');?>"> Acceder </a> al sistema,
									 si es nuevo debe <a style="color:#000;font-weight:700;" href="<?php echo lui_SeoLink('index.php?link1=register');?>"> Registrarse </a>. (es requerido por su seguridad al momento de comprar). Hacemos que tus compras sean mas seguras.</p>
								</div>
							<?php endif ?>
							<br><br>
						</div>
					</div>
					
					<?php
						$fields = lui_GetCustomFields('product'); 
						if (!empty($fields)) {
							foreach ($fields as $key => $wo['field']) { 
								if (!empty($wo['itemsdata']['product']['fid_'.$wo['field']['id']])) {
									if ($wo['field']['type'] == 'selectbox') {
										$options = @explode(',', $wo['field']['options']);
										foreach ($options as $key => $value) {
											if (($key + 1) == $wo['itemsdata']['product']['fid_'.$wo['field']['id']]) {
												$wo['itemsdata']['product']['fid_'.$wo['field']['id']] = $value;
											}
										}
									}
									echo '<div class="wow_post_prod_infos"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /></svg><p class="product-description">' . $wo['itemsdata']['product']['fid_'.$wo['field']['id']] . '</p></div>';
						        } 
						    } 
					    } 
					?>
					<style type="text/css">
						.panel-body:after, .panel-body:before{display:table;content:" ";}
						.product-spec .panel-body{color:#333;font-size:16px !important;line-height:24px !important;padding:15px;}
						.header_detalles_product{}
					</style>
					<div class="header_detalles_product"></div>
					<div class="detalles_de_publicacion" style="background:#FFF;display:block;width:100%;margin:auto;margin-top:34px;position:relative;overflow-x:auto;padding:35px;">
						<?php echo html_entity_decode(lui_EditMarkup(br2nl($wo['itemsdata']['product']['detalles'], true, false, false)));?>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$(document).on('click', '.add_product_compra_list', function(){
	    let product = $(this).attr('data-id');
	    let prod_co = $(this).attr('data-col');
	    if (product){
	        $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bdd', {value: product,color:prod_co}, function (data) {
	        	console.log(data)
	        });
	    }
	});
});

function Agregar_producto_al_carrito(self,id,type) {
  qty = 1;
  if ($('#cart_product_qty').length > 0) {
    qty = $('#cart_product_qty').val();
  }
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=add_cart&hash=' + $('.main_session').val(), {product_id: id,qty:qty}, function(data, textStatus, xhr) {
    if (data.status == 200){
      $('.count_items_carrito_cou').html(data.totalunidades);
    }
  });
}
document.addEventListener('DOMContentLoaded', function() {
	document.querySelectorAll('.copy_url_product_data').forEach(function(button) {
	  button.addEventListener('click', function() {
	  	$('.copy_url_product_data').html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none"><path d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>');
	    var link = window.location.href;
	    var inputElement = document.createElement('input');
	    inputElement.setAttribute('value', link);
	    document.body.appendChild(inputElement);
	    inputElement.select();
	    inputElement.setSelectionRange(0, 99999);
	    document.execCommand('copy');
	    document.body.removeChild(inputElement);

	    setTimeout(function() {
				$('.copy_url_product_data').html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none"><path d="M14.5563 13.2183C13.514 14.2606 11.8241 14.2606 10.7817 13.2183C9.73942 12.1759 9.73942 10.486 10.7817 9.44364L13.1409 7.0845C14.1357 6.08961 15.7206 6.04433 16.7692 6.94866M16.4437 3.78175C17.486 2.73942 19.1759 2.73942 20.2183 3.78175C21.2606 4.82408 21.2606 6.51403 20.2183 7.55636L17.8591 9.9155C16.8643 10.9104 15.2794 10.9557 14.2308 10.0513" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /><path d="M21 13C21 16.7712 21 18.6569 19.8284 19.8284C18.6569 21 16.7712 21 13 21H11C7.22876 21 5.34315 21 4.17157 19.8284C3 18.6569 3 16.7712 3 13V11C3 7.22876 3 5.34315 4.17157 4.17157C5.34315 3 7.22876 3 11 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /></svg>');
		  }, 1500);
	  });
	});

function convertirAJPEG(rutaWebP,nombreImagen) {
  var img = new Image();
  img.onload = function() {
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");
    canvas.width = img.width;
    canvas.height = img.height;
    ctx.drawImage(img, 0, 0);
    ctx.font = '20px Arial';
    ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
    ctx.fillText('Layshane Perú', canvas.width - 200, canvas.height - 20);

    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    var tieneTransparencia = false;
    for (var i = 0; i < imageData.data.length; i += 4) {
      if (imageData.data[i + 3] < 255) {
        tieneTransparencia = true;
        break;
      }
    }
    if (tieneTransparencia) {
      ctx.globalCompositeOperation = "destination-over";
      ctx.fillStyle = "#ffffff"; 
      ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    var dataURL = canvas.toDataURL("image/jpeg");
    var enlace = document.createElement("a");
    enlace.href = dataURL;
    enlace.download = nombreImagen.replace(/\.[^/.]+$/, "") + ".jpeg";
    enlace.click();
  };
  img.src = rutaWebP;
}

var menu = document.createElement('div');
menu.innerHTML = '<button id="descargarJPEGimglayshane" class="boton-menu-layshane-dow">Descargar Imagen</button>' +
                 '<button id="cancelardescargaimg" class="boton-menu-layshane-dow">Cancelar</button>';
menu.style.position = 'absolute';
menu.style.backgroundColor = '#000000c9';
menu.style.border = '1px solid #333';
menu.style.borderRadius = '10px';
menu.style.padding = '5px';
menu.style.flexWrap = 'wrap';
menu.style.gap = '0.35rem';
menu.style.display = 'none';
var menuAbierto = false;
function handleContextMenu(event) {
  event.preventDefault();
  var x = event.clientX;
  var y = event.clientY;

  if (menuAbierto) {
      menu.style.display = 'none';
  }
  menu.style.left = x + 'px';
  menu.style.top = y + 'px';
  document.body.appendChild(menu);
  menu.style.display = 'flex';
  menuAbierto = true;

  document.getElementById('descargarJPEGimglayshane').onclick = function() {
      var rutaImagen = event.target.src;
      var img = event.target;
      var nombreImagen = img.title;
      convertirAJPEG(rutaImagen,nombreImagen);
      menu.style.display = 'none';
      menuAbierto = false;
  };

  document.getElementById('cancelardescargaimg').onclick = function() {
    menu.style.display = 'none';
    menuAbierto = false;
  };
}
function cerrarMenu(event) {
  if (menuAbierto) {
    if (!menu.contains(event.target)) {
      if (event.target.disabled) {
        return;
      }
      menu.style.display = 'none';
      menuAbierto = false;
    }
  }
}

function cerrarMenuImagen(event) {
  if (menuAbierto && event.target.classList.contains('imagen')) {
    menu.style.display = 'none';
    menuAbierto = false;
  }
}
function cerrarMenuClicDerecho(event) {
  if (menuAbierto && event.button === 2) {
    menu.style.display = 'none';
    menuAbierto = false;
  }
}
function cerrarMenuEnToque(event) {
  if (menuAbierto && !menu.contains(event.target) && !event.target.classList.contains('imagen')) {
    menu.style.display = 'none';
    menuAbierto = false;
  }
}
var imagenes = document.querySelectorAll('.imagen');
imagenes.forEach(function(imagen) {
    imagen.addEventListener("contextmenu", handleContextMenu);
    imagen.addEventListener("click", cerrarMenuImagen);
});

document.addEventListener("click", cerrarMenu);
document.addEventListener("mousedown", cerrarMenuClicDerecho);
document.addEventListener("touchstart", cerrarMenuEnToque);
});

function Wo_OpenAlbumLightBox(image_id, type) {
	$('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
	$.get(Wo_Ajax_Requests_File(), {f:'open_album_lightbox', image_id:image_id, type:type}, function(data) {
		if (data.status == 200) {
			document.body.style.overflow = 'hidden';
			$('.lightbox-container').html(data.html);
		}
	    if (data.html.length == 0) {
	       document.body.style.overflow = 'auto';
	    }
	});
}
var selections = {};
var basePrice = <?=$precio_subtotal_producto;?>;
function updateSelection() {
      selections = {};
      var selectedRadios = document.querySelectorAll('.seleccted_atributes_s:checked');
      selectedRadios.forEach(function(radio) {
          var atributoId = radio.getAttribute('data-atributo');
          var opcionId = radio.getAttribute('data-opcion');
          selections[atributoId] = opcionId;
      });
      var totalPrice = basePrice;
      Object.values(selections).forEach(function(opcionId) {
          var additionalPrice = parseFloat(document.querySelector('#atr_opt_list' + opcionId).value);
          totalPrice += additionalPrice;
      });
      document.getElementById('total_price').textContent = totalPrice.toFixed(2);
      guardarSeleccion(selections);
  }

  function guardarSeleccion(selecciones) {
      $.post(Wo_Ajax_Requests_File() + '?f=g_s_pr', {
          producto_id: <?=$wo['itemsdata']['product']['id'];?>,
          selecciones: selecciones
      }, function(data) {
      	document.getElementById('cantidad_products').textContent = data.cantidad_productos;
      	if (data.cantidad_productos==0) {
      		$('.buttton_add_cart_list').addClass('hidden');
      	}else{
      		$('.buttton_add_cart_list').removeClass('hidden');
      	}
          if (data.status == 200) {
          }
      });
  }
</script>