<?php if(lui_IsAdmin() || lui_IsModerator()){
}else{
	header('Location: ' . $wo['config']['site_url']);
   exit();
}?>
<style type="text/css">
	body{background-color:#F0F2FD;}
.wow_main_blogs{background-color:#fff;box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);border-radius:6px;margin-bottom:30px;}
.view-blog{color:#666;font-size:14.5px;line-height:17px;}
.wow_main_blogs .avatar{display:block;position:relative;padding-bottom:80%;}
.wow_main_blogs .avatar > img{width:100%;border-radius:6px;position:absolute;top:0;right:0;bottom:0;left:0;height:100%;object-fit:cover;vertical-align:middle;}
.wo_my_products{padding-right:10px;padding-left:10px;margin-bottom:20px;}
.wo_my_products a{background:#fff;display:block;border-radius:2px;box-shadow:0 1px 2px rgba(0,0,0,0.2);}
.wo_my_products .avatar img, .wo_sidebar_products .avatar img{width:100%;vertical-align:middle;}
.wo_my_products .produc_info, .wo_sidebar_products .produc_info{padding:7px 10px;word-break:break-word;}
.wo_my_products .produc_info span, .wo_sidebar_products .produc_info span{font-size:16px;display:block;word-break:break-all;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-wrap:break-word;}
.wo_my_products .produc_info h4, .wo_sidebar_products .produc_info h4{font-size:14.5px;color:#4CAF50;font-weight:700;letter-spacing:.3px;margin:7px 0 0;display:block;word-break:break-all;overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;}
</style>
<style type="text/css">
.colores_activados_prod{display:block;border:3px dashed rgba(8, 8, 8, 0.32);transition:all .5s;border-radius:6px;padding:8px;}
.disable_added_media{display:none!important;}
.contain_data_images_group_s{width:100%;padding:5px!important;}
.contenedor_media_colors{position:relative;padding-top:20px;background-color:#fff;max-width:100%;}
.color_view_data{padding:6px;position:sticky;top:0;left:0;right:0;z-index:1;}
.color_view_data i{padding:5px;position:absolute;top:-10px;right:0;z-index:1;border-radius:5px;}
</style>
<style type="text/css">
.publicar_producto_head h4{font-size:20px;font-weight:600;}
.modal-content{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;width:100%;pointer-events:auto;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.2);border-radius:0.3rem;outline:0;}
.close{float:right;font-size:1.5rem;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;opacity:.5;}
.td-avatar{width:28px;}
.publicar_producto{overflow:hidden;border-radius: 0.2rem;}
.publicar_producto_head{background:#3498db;color:#FAFAFA;padding:10px;font-size:17px;}
.publicar_producto_head h4{margin:0;}
.publicar_producto_dialog,.editar_producto_dialog{max-width:820px!important;}
@media (min-width: 768px){
.publicar_producto_dialog,.editar_producto_dialog{max-width:820px!important;width:100%;}
}
@media (min-width: 992px){
.columna-4{padding-left:15px;}
}
</style>
<style type="text/css">
.wow_form_fields select{height:44px;}
.wow_form_fields input, .wow_form_fields textarea, .wow_form_fields select,.wow_form_fields > .bootstrap-select.btn-group > .dropdown-toggle{background-color:transparent;box-shadow:rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;border-radius:0;transition:background-color 240ms, box-shadow 240ms;color:#393d4a;font-weight:400;font-size:16px;line-height:28px;padding:8px;width:100%;border:0;outline:0;}
.wow_form_fields{position:relative;margin:15px 0;font-family:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;}
.wow_form_fields > label{font-weight: bold;font-size:14.5px;display:block;color:#777;}
.wow_prod_imgs{margin:0 -7px;display:flex;}
.wow_prod_imgs .upload-product-image{width:100px;min-width:100px;height: 100px;border-radius:max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;cursor:pointer;display:table;margin:10px 5px 0 8px;background-color:#f0f2f5;}
.upload-image-content{font-size:15px;color:#555;display:table-cell;vertical-align:middle;}
.upload-image-content{transition:all .2s ease-in-out;text-align:center;}
.wow_prod_imgs .upload-product-image svg.feather{width:24px;height:24px;color:#848484dd;}
.wow_prod_imgs .productimage_holder_image{overflow-x:auto;}
.productimage_holder_image{width:100%;margin:0;white-space:nowrap;}
.wow_prod_imgs .productimage_holder_image .thumb-image{pointer-events:auto;}
.productimage_holder_image .thumb-image{width:100px;height:100px;margin:10px 5px 0 0;display:inline-block;object-fit:cover;user-select:none;pointer-events:none;border:2px solid;border-radius:max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;}
.thumb-image-delete{position:relative;display:inline-block;}
.thumb-image-delete-btn{position:absolute;right:5px;top:5px;color:white;background-color:rgba(0, 0, 0, 0.3);border-radius:50%;text-align:center;line-height:1;padding:3px;}
.thumb-image-delete-btn svg{padding:1px;}
.background_image_product{background-size:cover;background-repeat:no-repeat;background-position:50% 50%;width:100%;border-radius:6px;height:100%;}
.btn_add_product{display:block;text-align:center;width:100%;background-color:#3498db;color:#FAFAFA;}
</style>
<style type="text/css">
.carousel {
  padding: 15px 0;
  padding-top:0;
}
.carousel h2 {
  margin: 0;
}
.carousel a {
  text-decoration: none;
  color: #fff;
}
.carousel .carousel__wrapper .carousel__content .carousel__item a img {
  aspect-ratio: 1/1;
  width: 100%;
  height: 100%;
  object-fit: cover;
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
  user-drag: none;
  margin-bottom: 16px;
  border-radius: clamp(0px, ((100vw - 4px) - 100%) * 9999, 4px);
}
.carousel h3 {
  font-size:16px;
  width:100%;
  display:flex;
  justify-content:center;
  background: linear-gradient(180deg, rgb(0 0 0 / 0%) 0%, rgb(0 0 0 / 39%) 35%, rgb(0 0 0 / 57%) 75%, rgb(0 0 0 / 63%) 100%);
  padding: 10px 3px;
  align-items: flex-end;
  padding:10px 3px;padding-bottom:20px;
  text-align:center;
}
.carousel .dragging a {
  user-select: none;
}
.carousel .carousel__wrapper {
  position: relative;
  margin-bottom: 24px;
}

@media only screen and (min-width: 1180px) {
  .carousel .carousel__wrapper.has-arrows .carousel__arrows {
    display: flex;
  }
}
.carousel .carousel__header {
  display: grid;
  grid-auto-flow: column;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}
.carousel .carousel__content {
  overflow-y: hidden;
  overflow-x: scroll;
  scrollbar-width: none;
  -ms-overflow-style: none;
  display: flex;
  -webkit-overflow-scrolling: touch;
  cursor:grab;
  grid-gap:24px;
  list-style: none;
  padding:20px 10px;
  padding-left:15px;
  margin:auto -20px;
  background:#f0f2f5;
}
.carousel .carousel__content::-webkit-scrollbar {
  display: none;
}

.carousel .carousel__item{
	aspect-ratio: 1/1;
	flex:0 0 auto;
	display:inline-flex;
	width:calc(100% / 5 - 1.31rem);
	box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.123);
  	border-radius: 20px;
  	background: rgb(245, 245, 245);
  	overflow:hidden;
}
@media only screen and (max-width: 1500px) {
  .carousel .carousel__item{width:calc(100% / 4 - 1.31rem);}
}
@media only screen and (max-width: 1200px) {
  .carousel .carousel__item{width:calc(100% / 3 - 1.03rem)}
}
@media only screen and (max-width: 990px) {
  .carousel .carousel__item{width:calc(100% / 4 - 1.31rem);}
}
@media only screen and (max-width: 870px) {
  .carousel .carousel__item{width:calc(100% / 3 - 1.03rem)}
}
@media only screen and (max-width: 620px) {
  .carousel .carousel__item{width:calc(100% / 2 - 1.03rem)}
}
@media only screen and (max-width: 390px) {
	.columna_xs-6{width:100%;float:none;}
  .carousel .carousel__item{width:calc(100% / 1 - 0.5rem)}
}

.carousel .carousel__item .carousel__description{width:100%;position:absolute;bottom:0;display:flex;top:50%;}
.carousel .carousel__item a {
  position: relative;
  user-select: none;
  width:100%;
  cursor: pointer;
  overflow:hidden;
  
}
.carousel .carousel__controls {
  display: grid;
  grid-auto-flow: column;
  grid-gap: 24px;
}
.carousel .carousel__arrow {
  padding: 0;
  background: transparent;
  box-shadow: none;
  border: 0;
}
.carousel .carousel__arrow:before {
  content: "";
  background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSI5IiB2aWV3Qm94PSIwIDAgMTUgOSI+Cgk8cGF0aCBmaWxsPSIjMzMzMzMzIiBkPSJNNy44NjcgOC41NzRsLTcuMjItNy4yMi43MDctLjcwOEw3Ljg2NyA3LjE2IDE0LjA1Ljk4bC43MDYuNzA3Ii8+Cjwvc3ZnPgo=");
  background-size: contain;
  filter: brightness(0);
  display: block;
  width: 18px;
  height: 12px;
  cursor: pointer;
}
.carousel .carousel__arrow.arrow-prev:before {
  transform: rotate(90deg);
}
.carousel .carousel__arrow.arrow-next:before {
  transform: rotate(-90deg);
}
.carousel .carousel__arrow.disabled::before {
  filter: brightness(3);
}

.disclaimer a {
  color: #fff;
}
.load-produts .load-more button{width:auto}
</style>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<?php if($wo['layshane']['sucursal']): ?>
	<?php $category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
	$category_sub_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
	$nombre_de_categoria_seleccionado = false;
	$subcategorias_nombre_name=false; ?>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
	</div>
	<br>
	<div class="wo_settings_page">
		<div class="profile-lists singlecol">

			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg viewBox="0 0 1024 1024" fill="currentColor" whidth="16" height="16"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"></path></svg></span> <?php echo $wo['lang']['my_products']; ?>
					</div>
				</div>
				<?php if ($wo['config']['can_use_market']) { ?>
					<a class="boton_add_nluis first" href="#" data-toggle="modal" data-target="#create-product-modal" data-backdrop="static" data-keyboard="false"><?php echo $wo['lang']['create'] ?></a>
				<?php } ?>
			</div>
			<br><br>
			
			<div class="wo_my_pages">
				<section>
					<div class="carousel">
						<div class="carousel__wrapper">
							<div class="carousel__header">
						        <h2 class="carousel__headline">Categorias</h2>
						        <div class="carousel__controls">
						          <button class="carousel__arrow disabled arrow-prev"></button>
						          <button class="carousel__arrow arrow-next"></button>
						        </div>
						    </div>
						    <script type="text/javascript">
								function guardarPosicionHorizontal() {
							      var miDiv = document.getElementById('carousel__content');
							      sessionStorage.setItem('scrollLeft', miDiv.scrollLeft);
							    }
							    function restaurarPosicionHorizontal() {
							      var miDiv = document.getElementById('carousel__content');
							      var scrollLeft = sessionStorage.getItem('scrollLeft') || 0;
							      miDiv.scrollLeft = scrollLeft;
							    }
							    
							    window.onbeforeunload = guardarPosicionHorizontal;
							    window.onload = restaurarPosicionHorizontal;

							</script>
						    <ul class="carousel__content" id="carousel__content">
						    	<?php if($category_id==0): ?>
						    		<?php foreach ($wo['products_categories'] as $category){
						    			$cat_id_produc = $category['id'];
										$cat_nombre_produc = $wo["lang"][$category["lang_key"]];
										$cat_logo_produc = $category['logo'];
										$all_categorie = $category_id == $cat_id_produc;
										$active = ($category_id == $cat_id_produc) ? 'active not_seen_story' : '';?>
						    			<?php if($cat_id_produc==0): ?>
						    			<?php else: ?>
						    				<li class="carousel__item <?php echo $active?>">
						    					<a href="<?php echo lui_SeoLink('index.php?link1=my-products&c_id='.$cat_id_produc);?>" data-ajax="?link1=my-products&c_id=<?=$cat_id_produc?>"><img class="carousel__item__image" src="<?php echo($cat_logo_produc) ?>" alt="<?php echo $cat_nombre_produc;?>"/>
							    					<div class="carousel__description">
							    						<h3 class="carousel__title"><?php echo $cat_nombre_produc;?></h3>
							    					</div>
							    				</a>
							    			</li>
						    			<?php endif ?>
						    		<?php } ?>
						    	<?php else: $subcat_name = false;?>
						    		<?php foreach ($wo['products_categories'] as $category){
						    			$cat_id_produc = $category['id'];
						    			$all_categorie = $category_id == $cat_id_produc;
						    			$active = ($category_id == $cat_id_produc) ? 'active not_seen_story' : '';?>
						    			<?php $cat_logo_produc = $category['logo'];
						    			$cat_nombre_producs = $wo["lang"][$category["lang_key"]];?>
						    			<?php if(!empty($wo['products_sub_categories'][$_GET['c_id']])): if($all_categorie){ ?>
						    				<li class="carousel__item <?php echo $active?>">
						    					<a href="<?php echo lui_SeoLink('index.php?link1=my-products');?>" data-ajax="?link1=my-products"><svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 512 512" style="padding:50px;" fill="#2097ef"><path d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z"/></svg>
						    					</a>
						    				</li>
						    			<?php } ?>
						    			<?php else: if(!$cat_id_produc==0){?>
						    				<li class="carousel__item <?php echo $active?>">
						    					<a href="<?php echo lui_SeoLink('index.php?link1=my-products&c_id='.$cat_id_produc);?>" data-ajax="?link1=my-products&c_id=<?=$cat_id_produc?>"><img class="carousel__item__image" src="<?php echo($cat_logo_produc) ?>" alt="<?php echo $cat_nombre_producs;?>"/>
						    						<div class="carousel__description">
						    							<h3 class="carousel__title"><?=$cat_nombre_producs;?></h3>
						    						</div>
						    					</a>
						    				</li>
						    			<?php } endif ?>
						    		<?php } ?>
						    		<?php if(!empty($_GET['c_id']) && !empty($wo['products_sub_categories'][$_GET['c_id']])){
						    			$category_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
						    			foreach ($wo['products_sub_categories'][$_GET['c_id']] as $key => $category) {
						    				$cat_logo_producs = $category['logo'];
						    				$active = ($category_id == $category['id']) ? 'active products_seleccionado_cat' : '';?>
						    				<?php if($category_id == $category['id']):?>
						    					<?php $subcat_name =  $category['lang'];?>
						    				<?php endif ?>
						    				<li id="divsubcats<?php echo($category['id']) ?>" class="carousel__item <?php echo $active?>" data_prodect_cat_id="<?php echo($category['id']) ?>">
						    					<a href="<?php echo lui_SeoLink('index.php?link1=my-products&c_id='.$_GET['c_id'].'&sub_id='.$category['id']);?>" data-ajax="<?='?link1=my-products&c_id='.$_GET['c_id'].'&sub_id='.$category['id'];?>">
						    						<img class="carousel__item__image" src="<?php echo($cat_logo_producs) ?>" alt="<?php echo $category['lang'];?>"/>
						    						<div class="carousel__description">
						    							<h3 class="carousel__title"><?php echo $category['lang'];?></h3>
						    						</div>
						    					</a>
						    				</li>
						    			<?php } ?>
						    		<?php } ?>
						    	<?php endif ?>
						    </ul>
						  
						</div>
					</div>
				</section>
				<div class="row my_products">
					<?php
					$category_name = '';
					$data = array();
					if (!empty($_GET['c_id'])) {
						if (is_numeric($_GET['c_id'])) {
							if (array_key_exists($_GET['c_id'], $wo['products_categories'])) {
								?>
								<input type="hidden" value="<?php echo lui_Secure($_GET['c_id']); ?>" id="c_id" />
								<?php
								$category_name = $wo['products_categories'][$_GET['c_id']];
								$data['c_id'] = lui_Secure($_GET['c_id']);
							}
						}
						if (!empty($wo['products_sub_categories'][$_GET['c_id']]) && !empty($_GET['sub_id'])) {
							foreach ($wo['products_sub_categories'][$_GET['c_id']] as $key => $value) {
								if ($_GET['sub_id'] == $value['id']) { ?>
									<input type="hidden" value="<?php echo lui_Secure($_GET['sub_id']); ?>" id="sub_id" />
									<?php
									$data['sub_id'] = lui_Secure($value['id']);
									break;
								}
							}
						}
					} else {
						echo '<input type="hidden" value="0" id="c_id" />';
						echo '<input type="hidden" value="" id="sub_id" />';
					}
					?>
					<?php
						$data['limit'] = 10;
						$products = lui_GetProducts($data);
						?>
						<div id="products" class="productos_en_cuadros">
						<?php
						if (count($products) > 0) {
							foreach ($products as $wo['product']) {
								echo lui_LoadPage('products/product-style');
							}
						} else {
							echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> ' . $wo['lang']['no_available_products'] . '</h5>';
						}?>
						</div>
				</div>

				<div class="posts_load load-produts">
				    <?php if (count($products) > 0): ?>
					<div class="load-more">
	                    <button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts();"><?php echo $wo['lang']['load_more_products'] ?></button>
	                </div>
	                <?php endif ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- .row -->
</div>

<div class="modal fade" id="delete-product-post" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['delete_product_post']; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_product_post']; ?></p>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button id="delete-my-product-post" type="button" class="btn main btn-mat"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function Wo_LoadProducts() {
	$('.load-produts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="cs-loader-inner"><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label></div></div></div>');
	var $c_id = $('#c_id').val();
	var sub_id = $('#sub_id').val();
	var $last_id = $('.product:last').attr('data-id');
	var length = $('#cusrange-reader').val();
	$.post(Wo_Ajax_Requests_File() + '?f=load_more_my_products', {last_id: $last_id, c_id:$c_id, sub_id:sub_id, length: length}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts();"><i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more_products'] ?></button></div>');
				$('#products').append(data.html);
			} else {
				$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts();"><?php echo $wo['lang']['no_available_products'] ?></button></div>');
			}
		}
	});
}
	var COMPONENT_SELECTOR = '.carousel__wrapper';
	var CONTROLS_SELECTOR = '.carousel__controls';
	var CONTENT_SELECTOR = '.carousel__content';

	var components = document.querySelectorAll( COMPONENT_SELECTOR );

	for ( let i = 0; i < components.length; i++ ) {
		const component = components[ i ];
		const content = component.querySelector( CONTENT_SELECTOR );
		let x = 0;
		let mx = 0;
		const maxScrollWidth = content.scrollWidth - content.clientWidth / 2 - content.clientWidth / 2;
		const nextButton = component.querySelector( '.arrow-next' );
		const prevButton = component.querySelector( '.arrow-prev' );

		if ( maxScrollWidth !== 0 ) {
			component.classList.add( 'has-arrows' );
		}

		if ( nextButton ) {
			nextButton.addEventListener( 'click', function ( event ) {
				event.preventDefault();
				x = content.clientWidth / 2 + content.scrollLeft + 0;
				content.scroll( {
					left: x,
					behavior: 'smooth',
				} );
			} );
		}

		if ( prevButton ) {
			prevButton.addEventListener( 'click', function ( event ) {
				event.preventDefault();
				x = content.clientWidth / 2 - content.scrollLeft + 0;
				content.scroll( {
					left: -x,
					behavior: 'smooth',
				} );
			} );
		}

		/**
		 * @param {object} e event object.
		 */
		const mousemoveHandler = ( e ) => {
			const mx2 = e.pageX - content.offsetLeft;
			if ( mx ) {
				content.scrollLeft = content.sx + mx - mx2;
			}
		};

		/**
		 * @param {object} e event object.
		 */
		const mousedownHandler = ( e ) => {
			content.sx = content.scrollLeft;
			mx = e.pageX - content.offsetLeft;
			content.classList.add( 'dragging' );
		};
		const scrollHandler = () => {
			toggleArrows();
		};
		const toggleArrows = () => {
			if ( content.scrollLeft > maxScrollWidth - 10 ) {
				nextButton.classList.add( 'disabled' );
			} else if ( content.scrollLeft < 10 ) {
				prevButton.classList.add( 'disabled' );
			} else {
				nextButton.classList.remove( 'disabled' );
				prevButton.classList.remove( 'disabled' );
			}
		};
		const mouseupHandler = () => {
			mx = 0;
			content.classList.remove( 'dragging' );
		};

		content.addEventListener( 'mousemove', mousemoveHandler );
		content.addEventListener( 'mousedown', mousedownHandler );
		if ( component.querySelector( CONTROLS_SELECTOR ) !== undefined ) {
			content.addEventListener( 'scroll', scrollHandler );
		}
		content.addEventListener( 'mouseup', mouseupHandler );
		content.addEventListener( 'mouseleave', mouseupHandler );
	}
</script>
<script type="text/javascript">
	function RemoveUserProduct(id,type = 'show') {
		if (type == 'hide') {
			$('#delete-product-post').find('#delete-my-product-post').attr('onclick', "RemoveUserProduct('"+id+"')");
			$('#delete-product-post').modal({
			    show: true
			});
			return false;
		}
		$('#delete-product-post').modal('hide');
		$('#product_'+id).slideUp(300).remove();
		$.post(Wo_Ajax_Requests_File() + "?f=products&s=delete",{id: id},function () {});
	}
</script>
<?php else: ?>
	<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
		<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
		</div>
		<br>
		<div class="wo_settings_page">
			<div class="profile-lists singlecol">
				<div class="avatar-holder mt-0">
					<div class="wo_page_hdng pag_neg_padd pag_alone">
						<div class="wo_page_hdng_innr big_size">
							<span><svg viewBox="0 0 1024 1024" fill="currentColor" whidth="16" height="16"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"></path></svg></span> <?php echo $wo['lang']['my_products']; ?>
						</div>
					</div>
				</div>
				<br><br>
				<div class="wo_my_pages">
					<div class="row my_products">
						<h3 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg> Selecciona una tienda para continuar <br><hr><br> <a href="<?php echo lui_SeoLink('index.php?link1=tiendas'); ?>" data-ajax="?link1=tiendas" class="btn btn-main">Seleccionar tienda</a></h3>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	
<?php endif ?>
<script type="text/javascript">recpoll()</script>