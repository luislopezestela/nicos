<style type="text/css">
body{background:#F0F2FD;}
/*Full Product Post page*/
.flickity-enabled {position: relative;}
.flickity-enabled:focus { outline: none; }
.flickity-viewport {overflow: hidden;position: relative;height: 100%;}
.flickity-slider {position: absolute;width: 100%;height: 100%;}
.flickity-button {position: absolute;background: hsla(0, 0%, 100%, 0.75);border: none;color: #333;}
.flickity-button:hover {background: white;cursor: pointer;}
.flickity-button:focus {outline: none;box-shadow: 0 0 0 5px #19F;}
.flickity-button:active {opacity: 0.6;}
.flickity-button:disabled {opacity: 0.3;cursor: auto;pointer-events: none;}
.flickity-button-icon {fill: currentColor;}
.flickity-prev-next-button {top: 50%;width: 44px;height: 44px;border-radius: 50%;transform: translateY(-50%);}
.flickity-prev-next-button.previous { left: 10px; }
.flickity-prev-next-button.next { right: 10px; }
.flickity-rtl .flickity-prev-next-button.previous {left: auto;right: 10px;}
.flickity-rtl .flickity-prev-next-button.next {right: auto;left: 10px;}
.flickity-prev-next-button .flickity-button-icon {position: absolute;left: 20%;top: 20%;width: 60%;height: 60%;}
.wo_post_prod_full {padding: 20px;background-color:#FFFF}
.wo_post_prod_full_img img {border: 0;width: 100%;aspect-ratio: 1;border-radius: 7px;}
.wo_post_prod_full_img_slider {text-align: center;margin-top: 15px;white-space: nowrap;overflow-x: auto;}
.wo_post_prod_full_img_slider img {aspect-ratio: 1;width: 60px;border-radius: 3px;margin: 2px;}
.wo_post_prod_full_img_slider .is-selected img {box-shadow: 0 0 0 2px #4a4a4a;}
.wo_post_prod_full_name {font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-weight: 400;font-size: 37px;word-wrap: break-word;line-height: 50px;}
.wo_post_prod_full_price {font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size: 32px;word-wrap: break-word;color:var(--boton-fondo);}
.wo_post_prod_full_stars {margin: 10px 0;}
/*Product Review Stars*/
.pr_stars .star {width: 18px;height: 18px;margin: 0 2px 0 0px;}
.pr_stars .star path { fill: rgb(0 0 0 / 20%);}
.pr_stars[data-stars] .star path {fill: #ff9800;}
.pr_stars[data-stars="0"] .star path {fill: rgb(0 0 0 / 20%);}
.pr_stars[data-stars="1"] .star:nth-child(1) ~ .star path {fill: rgb(0 0 0 / 20%);}
.pr_stars[data-stars="2"] .star:nth-child(2) ~ .star path {fill: rgb(0 0 0 / 20%);}
.pr_stars[data-stars="3"] .star:nth-child(3) ~ .star path {fill: rgb(0 0 0 / 20%);}
.pr_stars[data-stars="4"] .star:nth-child(4) ~ .star path {fill: rgb(0 0 0 / 20%);}
.pr_stars[data-stars="5"] .star:nth-child(5) ~ .star path {fill: rgb(0 0 0 / 20%);}

.wo_post_prod_full_user {display: flex;align-items: center;border: 1px solid #e7e7e7;border-radius: 7px;padding: 10px;margin: 25px 0;}
.wo_post_prod_full_user .avatar {margin: 0;width: 40px;height: 40px;flex: 0 0 auto;}
.wo_post_prod_full_user h5 {margin: 0;font-size: 16px;}
.wo_post_prod_full_user h5 b {display: block;margin: 0 0 2px;font-weight: normal;font-size: 14.5px;opacity: 0.8;}
.wo_post_prod_full_user h5 a {color: inherit;}
.wo_post_prod_full_btns .btn {border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;line-height:42px;font-size: 15px;width:100%;max-width:420px;}
.wo_post_prod_full_info {padding: 0;margin: 0;list-style: none;border: 0;}
.wo_post_prod_full_info li {display: flex;align-items: center;justify-content: space-between;}
.wo_post_prod_full_info li > span {display: inline-flex;font-size: 15px;padding: 7px 0 0;align-items: center;}
.wo_post_prod_full_info li > span svg {width: 14px;height: auto;}
.wo_post_prod_full_info li > span:first-child { white-space: nowrap;position: relative;width: 30%;flex: 1 1 auto;}
.wo_post_prod_full_info li > span:first-child:after {content: '';height: 1px;background: rgb(0 0 0 / 7%);flex-grow: 1;margin: 0 7px;}
.wo_post_prod_full_info li > span:last-child {flex: 0 0 auto;}
.wo_post_prod_full hr {margin: 20px 0 !important;}
.wo_post_prod_full > p {margin: 0;font-size: 15px;line-height: 26px;}
.wo_post_prod_full_related_prnt {padding: 20px 20px 1px;}
.wo_post_prod_full_related {background-color:#fff; border: 1px solid #f0f2f5;border-radius: 10px;font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;transition: all 0.2s;overflow: hidden;margin-bottom: 30px;}
.wo_post_prod_full_related .img {display: block;}
.wo_post_prod_full_related .img img {aspect-ratio: 1;width: 100%;}
.wo_post_prod_full_related .info {padding: 10px;}
.wo_post_prod_full_related .info .title {margin: 0 0 7px;font-size: 16px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
.wo_post_prod_full_related .info .title a {color: inherit;}
.wo_post_prod_full_related .info > div {margin-top: 3px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
.wo_post_prod_full_related .info > div svg {margin-top: -3px;}
.grid .g-col-lg-12{grid-column: auto/span 12;}
:root{
    --bs-gap: 28px;
    --bs-padding: 0 116px;
}
:root{
    --bs-columns: 12;
    --bs-gap: 24px;
    --bs-margin: auto 28px;
    --bs-width: 28px;
    --bs-offset: -28px;
}
.page-wrapper.grid {
    margin: var(--bs-margin,auto);
    max-width: 1920px;
    row-gap: 0;
    box-sizing: content-box;
}
.grid {
    display: grid;
    grid-template-rows: repeat(var(--bs-rows,1),1fr);
    grid-template-columns: repeat(var(--bs-columns,12),1fr);
    gap: var(--bs-gap,1.5rem);
    margin: var(--bs-margin,auto);
}
#posts-laoded{
	margin-left:-7px;
	margin-right:-7px;
}
#posts{
	display:flex;
	position:relative;
	flex-wrap:wrap;
	width:initial!important;
	max-width:initial!important;
}
.post-container{
	max-width:100%;
	position:relative;
	margin:7px;
	width: calc(100% / 4 - 15px);
}
.post{width:100%;}
.page-wrapper.grid #maincontent {
    margin: 0;
    row-gap: 0;
    grid-column: auto/span 12;
}
.page-wrapper.grid #maincontent .grid {
    margin: 0;
}

.page-wrapper.grid #maincontent .grid .producto_media_display.media {
    grid-column: auto/span 7;
    grid-column-start: 2;
    grid-column-end: 7;
    padding: 0;
}
.informacion_del_producto, .producto_media_display.media {
    width: unset;
    margin-left: unset;
    margin-right: unset;
}
.page-wrapper .page-main {
    padding-left: 0;
    padding-right: 0;
}
.page-main {
    max-width: 100%;
    padding: 0;
}
.page-wrapper.grid .grid {
    --bs-margin: 0;
}
.columns{
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    -webkit-flex-wrap:wrap;
    flex-wrap:wrap;
    box-sizing:border-box;
}
.columns .column.main_columnas {
    padding-bottom: 40px;
    -webkit-flex-basis: auto;
    flex-basis: auto;
    -webkit-flex-grow: 1;
    flex-grow: 1;
    -ms-flex-order: 1;
    -webkit-order: 1;
    order: 1;
    width: 100%;
}

.page-wrapper .grid .informacion_del_producto,.page-wrapper .grid .producto_media_display.media {
    width: unset;
    margin-left: unset;
    margin-right: unset;
}

.producto_media_display.media {
    margin-top: 10px;
    padding-top: 5px;
}
.page-wrapper.grid #maincontent .grid .informacion_del_producto {
    grid-column: auto/span 5;
    grid-column-start: 8;
    padding: 0;
}

.informacion_del_producto .page-title{
    font-size: 34px;
    line-height: 40px;
    font-family: 'FormaDJRMicro-Regular';
    font-weight: 400;
    color: #000;
}
.informacion_del_producto .page-title-wrapper h1 {
    margin-bottom:14px;
    margin-top:0;
}
.panel{
	margin-bottom:0!important;
}
.categorias_de_tienda_pagina_principal{
	display:block;
	position:relative;
	margin-bottom:7px;
}
.categorias_de_tienda_pagina_principal li{
	display:block;
	background:#fff;
	border-radius:4px;
}
.rightcol{margin-top:20px;}


.content_atributos_c{display:flex;flex-wrap:wrap;width:100%;}
.content_atributos_c h4{display:block;width:100%;user-select:none;font-weight:bold;padding:3px;color:#444;}
.contenido_opciones_atriburts{display:flex;flex-wrap:wrap;gap:.5rem;width:100%;}
.lista_de_opciones_de_atributes{--background: #ffffff;
  --text: #414856;
  --radio: #7C96B2;
  --radio-checked: #4F29F0;
  --radio-size:28px;
  --width: 100%;
  --border-radius:10px;
  display:flex;
  align-items:center;
  width:100%;
  color: var(--text);
  position: relative;
  padding: 5px 20px;
cursor:pointer;}
.lista_de_opciones_de_atributes label{margin-top:4px;align-items:center;padding:7px;font-size:16px;user-select:none;width:100%;}
.lista_de_opciones_de_atributes input[type="radio"]{
	-webkit-appearance:none;
	-moz-appearance: none;
	position: relative;
height: var(--radio-size);
width: var(--radio-size);
outline: none;
margin: 0;
cursor: pointer;
border: 2px solid var(--boton-fondo);
background: transparent;
border-radius: 50%;
display: grid;
justify-self: end;
justify-items: center;
align-items: center;
overflow: hidden;
transition: border .5s ease;
}
.lista_de_opciones_de_atributes input[type="radio"]::before, .lista_de_opciones_de_atributes input[type="radio"]::after {
content: "";
display: flex;
justify-self: center;
border-radius: 50%;
}
.lista_de_opciones_de_atributes input[type="radio"]::before {
  position: absolute;
  width: 100%;
  height: 100%;
  background: var(--background);
  z-index: 1;
  opacity: var(--opacity, 1);
}

.lista_de_opciones_de_atributes input[type="radio"]::after {
  position: relative;
  width: calc(100% /2);
  height: calc(100% /2);
  background: var(--boton-fondo);
  top: var(--y, 100%);
  transition: top 0.5s cubic-bezier(0.48, 1.97, 0.5, 0.63);
}
.lista_de_opciones_de_atributes input[type="radio"]:checked {
  --radio: var(--radio-checked);
}

.lista_de_opciones_de_atributes input[type="radio"]:checked::after {
  --y: 0%;
  animation: stretch-animate .3s ease-out .17s;
}

.lista_de_opciones_de_atributes input[type="radio"]:checked::before {
  --opacity: 0;
}

.lista_de_opciones_de_atributes input[type="radio"]:checked ~ input[type="radio"]::after {
  --y: -100%;
}

.lista_de_opciones_de_atributes input[type="radio"]:not(:checked)::before {
  --opacity: 1;
  transition: opacity 0s linear .5s;
}

@keyframes stretch-animate {
  0% {
    transform: scale(1, 1);
  }

  28% {
    transform: scale(1.15, 0.85);
  }

  50% {
    transform: scale(0.9, 1.1);
  }

  100% {
    transform: scale(1, 1);
  }
}
</style>
<div class="page-margin page-wrapper grid">
	<main id="maincontent" class="page-main">
		<br>
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

		
		 ?>
	<div class="columns">
		<div class="column main_columnas">
			<div name="bvSeoContainer" itemscope itemtype="https://schema.org/Product" itemid="<?=$wo['config']['site_url']."/".$wo['itemsdata']['id_publicacion'] ?>">
				<meta itemprop="name" content="<?=$wo['itemsdata']['product']['name'] ?>">
				<meta itemprop="sku" content="<?=$wo['itemsdata']['product']['sku'] ?>">
				<meta itemprop="GTIN" content="">
				<meta itemprop="mpn" content="<?=$wo['itemsdata']['product']['sku'] ?>">
				<?php if(!empty($wo['itemsdata']['product']['images'][0]['image_org'])): ?>
					<link itemprop="image" href="<?php echo $wo['itemsdata']['product']['images'][0]['image_org'];?>">
				<?php endif ?>
				<meta itemprop="description" content="<?php echo html_entity_decode(lui_EditMarkup(br2nl($wo['itemsdata']['product']['description'], true, false, false)));?>">

				<?php if ($marca): ?>
					<div itemprop="brand" itemtype="https://schema.org/Brand" itemscope="">
			        	<meta itemprop="name" content="<?=$marca;?>">
			    	</div>
				<?php endif ?>
				
			    <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope="">
			    	<meta itemprop="priceCurrency" content="<?=$text;?>">
			    	<meta itemprop="itemCondition" content="https://schema.org/<?=$condicion;?>" />
			    	<meta itemprop="price" content="<?=$wo['itemsdata']['product']['price_format'];?>">
			    	<meta itemprop="itemOffered" content="<?=$wo['itemsdata']['product']['units']; ?>">
			    	<meta itemprop="availability" content="http://schema.org/<?=$wo['itemsdata']['product']['name'] ?>">
			    	<meta itemprop="url" content="<?=$wo['config']['site_url']."/".$wo['itemsdata']['id_publicacion'] ?>">
			    	<?php if (isset($offerta)): ?>
			    		<meta itemprop="priceValidUntil" content="">
			    	<?php endif ?>
			    	
                </div>


				<div class="hpols-bts-pdp grid">
					<?php if (!empty($wo['itemsdata']['product']['images'])): ?>
						<div class="producto_media_display media">
							<div class="wo_post_prod_full_img">
								<?php
								$el_colorv = null;
									foreach($wo['itemsdata']['product']['images'] as $photo){
										$color_id = lui_buscar_color_en_opciones($photo['id_color']);
										if(isset($color_id['id_color'])!=0) {
											$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
											$el_colorv = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
											if ($wo['atributo_items']==$el_colorv) {
												echo  "<img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
											}
										}else{
											echo  "<img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
										}
									}
								?>
							</div>
							<div class="wo_post_prod_full_img_slider">
								<?php
								$el_colorx = null;
									foreach($wo['itemsdata']['product']['images'] as $photo){
										$color_id = lui_buscar_color_en_opciones($photo['id_color']);
										if(isset($color_id['id_color'])!=0) {
											$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
											$el_colorx = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
											if($wo['atributo_items']==$el_colorx){
												echo  "<div><img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
											}
										}else{
											echo  "<div><img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
										}
										
										
									}
								?>
							</div>
						</div>
					<?php endif ?>
					<div class="informacion_del_producto">
						<div class="page-title-wrapper product">
							<h1 class="page-title">
								<span class="base" data-ui-id="page-title-wrapper" itemprop="name"><?php echo $wo['itemsdata']['product']['name'] ?></span>
							</h1>
							<p><?php echo html_entity_decode($wo['itemsdata']['product']['description']);?></p>
							<br><br>
						</div>
						<?php
							$stars = '0';
							if (!empty($wo['itemsdata']['product']['rating']) && is_numeric($wo['itemsdata']['product']['rating'])) {
								$stars = $wo['itemsdata']['product']['rating'];
							}
						?>
						<?php if ($wo['config']['store_system'] == 'on') { ?>
							<div class="pr_stars wo_post_prod_full_stars" data-stars="<?php echo $stars; ?>">
								<svg class="star rating" viewBox="0 0 24 24" data-rating="1"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="2"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="3"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="4"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="5"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<span <?php if($wo['loggedin'] == true) { echo 'onclick="ShowProductReviews('.$wo['itemsdata']['product']['id'].')" ';}?>  class="pointer"><?php echo $wo['itemsdata']['product']['reviews_count'] ?> <?php echo $wo['lang']['reviews']; ?></span>
							</div>
						<?php } ?>
						<?php
							echo '<div class="wo_post_prod_full_price">' . $symbol . $wo['itemsdata']['product']['price_format'] . ' (' . $text . ')</div>';
						?>
						<style type="text/css">
							.atributos_from_publication_color{display:flex;width:100%;background:transparent;position:relative;margin:18px auto;}
							.content_atributos{display:flex;flex-wrap:wrap;}
							.content_atributos .atribut_product{border: 2px solid transparent; display:flex;border-radius:5px;box-shadow: -10px -10px 20px rgb(255, 255, 255), 10px 10px 20px rgba(0, 0, 0, 0.1);color:#b6b6b6;background:#f4f4f4;list-style:none;margin:7px;}
							.content_atributos span{position:absolute;top:-17px;left:1px;color:#998;}
							.content_atributos .atribut_product a{text-transform:uppercase;padding:6px 8px;text-decoration:none;display:flex;justify-content:center;align-items: center;}
							.content_atributos .atribut_product a i{display:block;height:20px;width:20px;border-radius:30px;margin:5px;}
							.btn_sty_go{box-shadow: -10px -10px 20px rgb(255, 255, 255), 10px 10px 20px rgba(0, 0, 0, 0.1);background:#f4f4f4;transition:all .5s;}
						</style>
						<?php $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['itemsdata']['product']['id']) ?>
						
						<div class="atributos_from_publication_color">
							<?php if (isset($opciones_del_producto)): ?>
								<div class="content_atributos">
									<?php foreach ($opciones_del_producto as $color => $valorcolor): $seleccionadocoloor='';?>
										<?php if (!empty($valorcolor['id_atributo'])): ?>
											<?php $atributo = $db->where('id',$valorcolor['id_atributo'])->getOne('atributos'); ?>
											<span><?=$atributo->nombre;?></span>
											<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color'])?>
											<?php $el_color = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
											<?php if($el_color==$wo['atributo_items']): ?>
												<?php $seleccionadocoloor = 'style="border: 2px solid '.$buscar_el_color_por_id['color'].'!important;"'; ?>
											<?php endif ?>
											
											<li class="atribut_product" <?=$seleccionadocoloor; ?>>
												<a href="<?=$wo['itemsdata']['product']['url'].'/'.$el_color?>" data-ajax="?link1=item&items=<?=$wo['itemsdata']['product']['seo_id'].'&opcion='.$el_color;?>"><?=$wo['lang'][$buscar_el_color_por_id['lang_key']]; ?> <i style="background:<?=$buscar_el_color_por_id['color'];?>;"></i></a>
											</li>
										<?php else: ?>
											<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color'])?>
											<?php $el_color = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
											<?php if($el_color==$wo['atributo_items']): ?>
												<?php $seleccionadocoloor = 'style="border: 2px solid '.$buscar_el_color_por_id['color'].'!important;"'; ?>
											<?php endif ?>
											<li class="atribut_product" <?=$seleccionadocoloor; ?>>
												<a href="<?=$wo['itemsdata']['product']['url'].'/'.$el_color?>" data-ajax="?link1=item&items=<?=$wo['itemsdata']['product']['seo_id'].'&opcion='.$el_color;?>"><?=$wo['lang'][$buscar_el_color_por_id['lang_key']]; ?> <i style="background:<?=$buscar_el_color_por_id['color'];?>;"></i></a>
											</li>
										<?php endif ?>
									<?php endforeach ?>
								</div>
							<?php endif ?>
						</div>
						<?php $atributos_productos = Mostrar_Atributos_producto($wo['itemsdata']['product']['id']); ?>
						<div class="content_atributos_c">
							<?php foreach($atributos_productos as $wo['atributos']): ?>
								<?php if($wo['atributos']['nombre']=='Color'): ?>
								<?php else: $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos']['id']);?>
									<h4><?=$wo['atributos']['nombre'];?></h4>
									<div class="contenido_opciones_atriburts">
										
										<?php foreach ($atributos_opciones as $wo['opt_atributos']): ?>
											<div class="lista_de_opciones_de_atributes">
												<input type="radio" name="opcion<?=$wo['atributos']['id'];?>" id="atr_opt_list<?=$wo['opt_atributos']['id'];?>" <?=$wo['opt_atributos']['active'] ? 'checked' : ''; ?>>
												<label for="atr_opt_list<?=$wo['opt_atributos']['id'];?>"><?=$wo['opt_atributos']['nombre'];?></label>
											</div>
										<?php endforeach ?>
										
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
						<?php $pagina = $wo['page'];?>
						<?php if ($wo['loggedin']) { ?>
							<div class=" wo_post_prod_full_btns">
								<?php if ($wo['config']['store_system'] == 'on') { ?>
								<?php if (!empty($wo['itemsdata']['product']['units']) && $wo['itemsdata']['product']['units'] > 0) { ?>
									<button class="contact btn-main btn btn-mat" onclick="AddProductToCart(this,'<?php echo($wo['itemsdata']['product']['id']); ?>','add')">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg> <?php echo($wo['lang']['buy_now']) ?>
									</button>
								<?php }else{}?> 
								<?php } ?>
							</div>
						<?php } ?>
						
						<?php if($wo['loggedin'] == false): ?>
							<div class="product-care-info stellar-body__small">
								<div class="care-container">
									<div class="title">
										<div class="selected-carepack two-lines">Para realizar una compra, es necesario <a href="<?php echo lui_SeoLink('index.php?link1=acceder');?>"> Acceder </a> al sistema, si es nuevo debe <a href="<?php echo lui_SeoLink('index.php?link1=register');?>"> Registrarse </a>. (es requerido por su seguridad al momento de comprar). Hacemos que tus compras sean mas seguras.</div>
									</div>
								</div>
							</div>
							<div>
							</div>
						<?php endif ?>
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
			</div>
		</div>
	</div>

	<script>
	// 1st carousel, main
	$('.wo_post_prod_full_img').flickity({
		pageDots: false,
		draggable: false
	});
	// 2nd carousel, navigation
	$('.wo_post_prod_full_img_slider').flickity({
		asNavFor: '.wo_post_prod_full_img',
		contain: true,
		pageDots: false,
		prevNextButtons: false,
	});
	</script>
	</main>
</div>