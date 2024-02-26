<?php
$category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
$category_sub_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
$nombre_de_categoria_seleccionado = false;
$subcategorias_nombre_name=false;
?>
<div class="productos_listar_pagina_view products wo_market">
		<div class="contenedor_productos_lista leftcol">
			<div class="head_productos_fitrar wo_job_head_filter wo_market_head_filter">
				<div class="price_conten_product_title">
					<?php foreach ($wo['products_categories'] as $nombrecategorias):
						$all_nombrecategorias = $category_id == $nombrecategorias['id'];?>
						<?php if($all_nombrecategorias): ?>
							<?php $nombre_de_categoria_seleccionado = $wo["lang"][$nombrecategorias["lang_key"]]; ?>
						<?php endif ?>
					<?php endforeach ?>

					<?php if(!empty($_GET['c_id']) && !empty($wo['products_sub_categories'][$_GET['c_id']])): ?>
						<?php foreach ($wo['products_sub_categories'][$_GET['c_id']] as $key => $nombre_sub_categorias):
							$all_nombrecategorias = $category_sub_id == $nombre_sub_categorias['id'];?>
							<?php if($all_nombrecategorias): ?>
								<?php $subcategorias_nombre_name = $wo["lang"][$nombre_sub_categorias["lang_key"]]; ?>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
					
					<?php if(!$category_id==0): ?>
						<?php if (!empty($nombre_de_categoria_seleccionado)): ?>
							<div style="font-size:12px;text-transform:uppercase;text-align:center;user-select:none;">
								<?php if (!$subcategorias_nombre_name==false): ?>
									<span><?=$subcategorias_nombre_name;?></span>
								<?php else: ?>
									<span><?=$nombre_de_categoria_seleccionado;?></span>
								<?php endif ?>
							</div>
						<?php else: ?>
							<div style="font-size:12px;text-transform:uppercase;text-align:center;user-select:none;">
								<span><?=$wo['lang']['tienda'];?></span>
							</div>
						<?php endif ?>
					<?php else: ?>
						<div style="font-size:12px;text-transform:uppercase;text-align:center;user-select:none;">
							<span><?=$wo['lang']['tienda'];?></span>
						</div>
					<?php endif ?>
				</div>

				<div class="search-blog">
					<form action="">
						<?php
							$placeholder = $wo['lang']['search_for_products_main'];
							if (!empty($category_name)) {
								$placeholder = str_replace('{category_name}', $category_name, $wo['lang']['search_for_products']);
				    	    }
						?>
						<input type="text" onkeyup="Wo_SearchProducts(this.value)" placeholder="<?php echo $placeholder; ?>" id="product-text">
					</form>
				</div>

				<br>
				<div class="espacio_para_filtrar_y_ordenar">
					<div class="dropdown market_widget dropdown_market_stylin_widget">
						<div class="m_widget_head dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
							<?php echo $wo['lang']['sort_by'];?>
						</div>
						<div class="dropdown-menu menu_drop_up_page dropdown_en_lista_view_productos">
							<div class="market_categories">
								<ul class="product-sort-slider price_conten_product_rigth">
									<li class="active" onclick="changePriceSortValue('latest');$(this).addClass('active');"><a href="javascript:void(0)"><?php echo $wo['lang']['latest'] ?></a></li>
									<li onclick="changePriceSortValue('price_low');$(this).addClass('active');"><a href="javascript:void(0)"><?php echo $wo['lang']['price_low'] ?></a></li>
									<li onclick="changePriceSortValue('price_high');$(this).addClass('active');"><a href="javascript:void(0)"><?php echo $wo['lang']['price_high'] ?></a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>


				<!---->
			</div>
		</div>
		
		<div class="caja_de_productos_en_lista">

			<section class="estados_vendedores">
				<button class="estados_vendedores_control atras"><svg fill="currentColor" viewBox="0 0 24 24" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xxk0z11 xvy4d1p"><path d="M14.791 5.207 8 12l6.793 6.793a1 1 0 1 1-1.415 1.414l-7.5-7.5a1 1 0 0 1 0-1.414l7.5-7.5a1 1 0 1 1 1.415 1.414z"></path></svg></button>
				<button class="estados_vendedores_control siguiente"><svg fill="currentColor" viewBox="0 0 24 24" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xxk0z11 xvy4d1p"><path d="M9.209 5.207 16 12l-6.791 6.793a1 1 0 1 0 1.415 1.414l7.5-7.5a1 1 0 0 0 0-1.414l-7.5-7.5a1 1 0 1 0-1.415 1.414z"></path></svg></button>
				<div class="estados_vendedores_contenedor" data-multislide="true" >
					<?php if($category_id==0): ?>
						<?php foreach ($wo['products_categories'] as $category) {
							$cat_id_produc = $category['id'];
							$cat_nombre_produc = $wo["lang"][$category["lang_key"]];
							$cat_logo_produc = $category['logo'];
							$all_categorie = $category_id == $cat_id_produc;
							$active = ($category_id == $cat_id_produc) ? 'active not_seen_story' : '';?>
							<?php if($cat_id_produc==0): ?>
							<?php else: ?>
								<div class="slider__item slider__nuevo_item <?php echo $active?>">
									<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id='.$cat_id_produc);?>" data-ajax="?link1=products&c_id=<?=$cat_id_produc?>">
										<img width="100%" src="<?php echo($cat_logo_produc) ?>" alt="<?php echo $cat_nombre_produc;?>">
										<p><?php echo $cat_nombre_produc;?></p>
									</a>
								</div>
							<?php endif ?>
						<?php } ?>

					<?php else: $subcat_name = false;?>
						<?php foreach ($wo['products_categories'] as $category) {
							$cat_id_produc = $category['id'];
							$all_categorie = $category_id == $cat_id_produc;
							$active = ($category_id == $cat_id_produc) ? 'active not_seen_story' : '';?>
							<?php if($all_categorie):
								$cat_logo_produc = $category['logo'];
								$cat_nombre_producs = $wo["lang"][$category["lang_key"]];?>

								<div class="slider__item slider__nuevo_item <?php echo $active?>">
									<?php if($category_sub_id): ?>
										<a class="back_disl_category_data" href="<?php echo lui_SeoLink('index.php?link1=products&c_id='.$cat_id_produc);?>" data-ajax="?link1=products&c_id=<?=$cat_id_produc?>">
											<img style="opacity:0.5" width="100%" src="<?php echo($cat_logo_produc) ?>" alt="<?php echo $cat_nombre_producs;?>">
											<span class="btn_back_shop_prucducts"><?=$cat_nombre_producs;?></span>
										</a>
									<?php else: ?>
										<a class="back_disl_category_data" href="<?php echo lui_SeoLink('index.php?link1=products');?>" data-ajax="?link1=products">
											<img style="opacity:0.5" width="100%" src="<?php echo($cat_logo_produc) ?>" alt="<?php echo $cat_nombre_producs;?>">
											<span class="btn_back_shop_prucducts"><?=$wo['lang']['tienda'];?></span>
										</a>
									<?php endif ?>
									
								</div>
							<?php endif ?>
						<?php } ?>

						<?php if(!empty($_GET['c_id']) && !empty($wo['products_sub_categories'][$_GET['c_id']])){
								$category_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
								foreach ($wo['products_sub_categories'][$_GET['c_id']] as $key => $category) {
									$cat_logo_producs = $category['logo'];
									$active = ($category_id == $category['id']) ? 'active products_seleccionado_cat' : '';?>
									<?php if($category_id == $category['id']):?>
										<script type="text/javascript">
											window.setTimeout(function () { 
											    document.getElementById('divsubcats<?=$_GET['sub_id'] ?>').scrollIntoView(); 
											}, 10);
										</script>
										<?php $subcat_name =  $category['lang'];?>
									<?php endif ?>
									<div id="divsubcats<?php echo($category['id']) ?>" class="slider__item slider__nuevo_item <?php echo $active?>" data_prodect_cat_id="<?php echo($category['id']) ?>">
										<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id='.$_GET['c_id'].'&sub_id='.$category['id']);?>" data-ajax="<?='?link1=products&c_id='.$_GET['c_id'].'&sub_id='.$category['id'];?>">
											<img width="100%" src="<?php echo($cat_logo_producs) ?>" alt="<?php echo $category['lang'];?>">
											<p><?php echo $category['lang'];?></p>
										</a>
									</div>
								<?php } ?>
						<?php } ?>

					<?php endif;?>
				</div>
			</section>

				
			<div class="latest-products">
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
				<div class="market_bottom">
					<?php
						$data['limit'] = 10;
						$products = lui_GetProducts($data);
						if (count($products) > 0) {
					?>
					<div id="products" class="productos_en_cuadros">
						<?php
						foreach ($products as $key => $wo['product']) {
							echo lui_LoadPage('products/products-list');
						}
						} else {
							echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>' . $wo['lang']['no_available_products'] . '</div>';
						}
						?>
					</div>
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

<script>
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');

function changePriceSortValue(price_sort) {
	cat_id = $('.product-category-slider').find('.active').attr('data_prodect_cat_id');
	sub_id = $('.product-category-slider-sub').find('.active').attr('data_prodect_cat_id');
	distance = $('#distance_val').text();
	$('.product-sort-slider li').removeClass('active');
	$('.price_conten_product_rigth li').removeClass('active');
	$(this).addClass('active');
	
	$.post(Wo_Ajax_Requests_File() + '?f=get_prodects_by_filter', {price_sort: price_sort, cat_id:cat_id, sub_id:sub_id, distance: distance}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('#products').html(data.html);
			} else {
				$('#products').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg><?php echo $wo['lang']['no_available_products'] ?></div>');
			}
		}
	});
}

function Wo_SearchProductsNearBy() {
	length = $('#cusrange-reader').val();
	text_value = $('#product-text').val();
	var c_id = 0;
	if ($('#c_id').length > 0) {
		c_id = $('#c_id').val();
	}
	var sub_id = $('#sub_id').val();
	$.post(Wo_Ajax_Requests_File() + '?f=search_products', {value: text_value, c_id:c_id, sub_id:sub_id, length: length}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('#products').html(data.html);
			} else {
				$('#products').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg> <?=$wo['lang']['no_available_products'];?> </div>');
			}
		}
	});
}
function Wo_LoadProducts() {
	$('.load-produts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="cs-loader-inner"><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label></div></div></div>');
	var $c_id = $('#c_id').val();
	var sub_id = $('#sub_id').val();
	var $last_id = $('.product:last').attr('data-id');
	var length = $('#cusrange-reader').val();
	$.post(Wo_Ajax_Requests_File() + '?f=load_more_products', {last_id: $last_id, c_id:$c_id, sub_id:sub_id, length: length}, function (data) {
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
function Wo_SearchProducts(value) {
	length = $('#cusrange-reader').val();
	var c_id = 0;
	if ($('#c_id').length > 0) {
		c_id = $('#c_id').val();
	}
	var sub_id = $('#sub_id').val();
	$.post(Wo_Ajax_Requests_File() + '?f=search_products', {value: value, c_id:c_id, sub_id:sub_id, length: length}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('#products').html(data.html);
			} else {
				$('#products').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg> <?=$wo['lang']['no_available_products'];?> </div>');
			}
		}
	});
}

var sliders = [...document.querySelectorAll(".estados_vendedores_contenedor")];
var sliderControlPrev = [...document.querySelectorAll(".estados_vendedores_control.atras")];
var sliderControlNext = [...document.querySelectorAll(".estados_vendedores_control.siguiente")];

  sliders.forEach((slider, i) => {
  let isDragStart = false,
      isDragging = false,
      isSlide = false,
      prevPageX,
      prevScrollLeft,
      positionDiff;

  const sliderItem = slider.querySelector(".slider__item");
  var isMultislide = (slider.dataset.multislide === 'true');

  sliderControlPrev[i].addEventListener('click', () => {
    if (isSlide) return;
    isSlide = true;
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
    slider.scrollLeft += -slideWidth;
    setTimeout(function(){ isSlide = false; }, 700);
  });

  sliderControlNext[i].addEventListener('click', () => {
    if (isSlide) return;
    isSlide = true;
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth ;
    slider.scrollLeft += slideWidth;
    setTimeout(function(){ isSlide = false; }, 700);
  });

  function autoSlide() {
    if(slider.scrollLeft - (slider.scrollWidth - slider.clientWidth) > -1 || slider.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff);
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
    let valDifference = slideWidth - positionDiff;
    if(slider.scrollLeft > prevScrollLeft) {
        return slider.scrollLeft += positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
    }
    slider.scrollLeft -= positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
  }

  function dragStart(e) {
    if (isSlide) return;
    isSlide = true;
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = slider.scrollLeft;
    setTimeout(function(){ isSlide = false; }, 700);
  }

  function dragging(e) {
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    slider.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    slider.scrollLeft = prevScrollLeft - positionDiff;
  }

  function dragStop() {
    isDragStart = false;
    slider.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
  }

  addEventListener("resize", autoSlide);
  slider.addEventListener("mousedown", dragStart);
  slider.addEventListener("touchstart", dragStart);
  slider.addEventListener("mousemove", dragging);
  slider.addEventListener("touchmove", dragging);
  slider.addEventListener("mouseup", dragStop);
  slider.addEventListener("touchend", dragStop);
  slider.addEventListener("mouseleave", dragStop);
});
</script>