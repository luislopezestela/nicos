<script type="text/javascript">
	if ($('#style_pag_css').length) {
    $('#style_pag_css').remove();
  }
  if ($('#s_pag_loop').length) {
    $('#s_pag_loop').remove();
  }
  var preloadLink_blogs_s = document.createElement('link');
  preloadLink_blogs_s.id = 's_pag_loop';
  preloadLink_blogs_s.rel = 'preload';
  preloadLink_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/layshane_t.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>";
  preloadLink_blogs_s.as = 'style';
  document.head.appendChild(preloadLink_blogs_s);

  var sucjsslik_blogs_s  = document.createElement('link');
  sucjsslik_blogs_s.rel = 'stylesheet';
	sucjsslik_blogs_s.id   = 'style_pag_css';
	sucjsslik_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/layshane_t.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>";
	document.head.appendChild(sucjsslik_blogs_s);
</script>
<?php
$category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
$category_sub_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
$nombre_de_categoria_seleccionado = false;
$subcategorias_nombre_name=false;
foreach ($wo['products_categories'] as $nombrecategorias){
	$all_nombrecategorias = $category_id == $nombrecategorias['id'];
	if($all_nombrecategorias){
		$nombre_de_categoria_seleccionado = $wo["lang"][$nombrecategorias["lang_key"]];
	}
}
if(!empty($_GET['c_id']) && !empty($wo['products_sub_categories'][$_GET['c_id']])){
	foreach($wo['products_sub_categories'][$_GET['c_id']] as $key => $nombre_sub_categorias){
		$all_nombrecategorias = $category_sub_id == $nombre_sub_categorias['id'];
		if($all_nombrecategorias){
			$subcategorias_nombre_name = $wo["lang"][$nombre_sub_categorias["lang_key"]];
		}
	}
}
$placeholder = $wo['lang']['search_for_products_main'];
if(!empty($category_name)){
	$placeholder = str_replace('{category_name}', $category_name, $wo['lang']['search_for_products']);
}
$section_keys = lui_GetSectionCatKeys('section_product');
?>
<style type="text/css">
.carousel {
  padding: 15px 0;
  padding-top:0;
  position:relative;
}
.carousel h2 {
  margin: 0;
}
.carousel a {
  text-decoration: none;
  color: #fff;
}
.carousel .carousel__wrapper .carousel__content .carousel__item a figure {
  aspect-ratio: 1/1;
  width: 100%;
  height: 100%;
  position:relative;
  object-fit: contain;
  background-size:contain;
  background-position:center center;
  background-repeat:no-repeat;
  -webkit-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
  user-drag: none;
  margin: auto;
  max-width:100%;
  max-height:100%;
  border-radius: clamp(0px, ((100vw - 4px) - 100%) * 9999, 4px);
}
.carousel h3 {
  font-size:16px;
  width:100%;
  display:flex;
  justify-content:center;
  background: linear-gradient(180deg, rgb(0 0 0 / 0%) 0%, rgb(0 0 0 / 39%) 35%, rgb(0 0 0 / 57%) 75%, rgb(0 0 0 / 63%) 100%);
  align-items: flex-end;
  padding:10px 3px;
  padding-bottom:20px;
  height:100%;
  margin:0;
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
  margin:auto;
  background:#f0f2f5;
}
.carousel .carousel__content::-webkit-scrollbar {
  display: none;
}

.carousel .carousel__item{
	aspect-ratio: 1/1;
	flex:0 0 auto;
	display:inline-flex;
	width:calc(100% / 7 - 1.31rem);
	box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.123);
  border-radius: 20px;
  background: rgb(245, 245, 245);
  overflow:hidden;
  position:relative;
  margin:0px;
}
@media only screen and (max-width: 1500px) {
  .carousel .carousel__item{width:calc(100% / 5 - 1.31rem);}
}
@media only screen and (max-width: 1200px) {
  .carousel .carousel__item{width:calc(100% / 4 - 1.03rem)}
}
@media only screen and (max-width: 990px) {
  .carousel .carousel__item{width:calc(100% / 5 - 1.31rem);}
}
@media only screen and (max-width: 870px) {
  .carousel .carousel__item{width:calc(100% / 4 - 1.03rem)}
}
@media only screen and (max-width: 620px) {
  .carousel .carousel__item{width:calc(100% / 3 - 1.03rem)}
}
@media only screen and (max-width: 470px) {
	.carousel .carousel__content{grid-gap:11px;}
	.columna_xs-6{width:100%;float:none;}
  .carousel .carousel__item{width:calc(100% / 2 - 3.5rem)}
}
@media only screen and (max-width: 390px) {
	.columna_xs-6{width:100%;float:none;}
  .carousel .carousel__item{width:calc(100% / 1 - 10rem)}
}
@media only screen and (max-width: 330px) {
	.columna_xs-6{width:100%;float:none;}
  .carousel .carousel__item{width:calc(100% / 1 - 6rem)}
}
@media only screen and (max-width: 290px) {
	.columna_xs-6{width:100%;float:none;}
  .carousel .carousel__item{width:calc(100% / 1 - 4rem)}
}
.carousel .carousel__item .carousel__description{width:100%;position:absolute;bottom:0;display:flex;top:50%;}
.carousel .carousel__item a {
  position:absolute;
  user-select:none;
  width:100%;
  height:100%;
  max-width:100%;
  max-height:100%;
  display:-webkit-box;
  display:-ms-flexbox;
  display:flex;
  margin:0;
  flex-wrap:wrap;
  cursor:pointer;
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
.text_category span{font-family:sans-serif;padding-top:10px;}
.carousel__content {
  overflow: auto!important; /* o overflow: scroll; */
  -webkit-overflow-scrolling: touch!important; /* Mejora la experiencia de desplazamiento en iOS */
  overscroll-behavior: none!important; /* Evita el desplazamiento en dispositivos táctiles */
  overscroll-behavior-x: none!important;
}

</style>
<div class="header_layshane_tienda" style="text-align:center;">
	<h1><?php echo $wo['lang']['tienda'] ?> <?=$wo['config']['siteName'];?></h1>
	<?php if(!$category_id==0): ?>
		<?php if (!empty($nombre_de_categoria_seleccionado)): ?>
			<div class="text_category">
				<?php if(!$subcategorias_nombre_name==false): ?>
					<span><?=$subcategorias_nombre_name;?></span>
				<?php else: ?>
					<span><?=$nombre_de_categoria_seleccionado;?></span>
				<?php endif ?>
			</div>
		<?php else: ?>
			<div class="text_category">
				<span><?=$wo['lang']['products'];?></span>
			</div>
		<?php endif ?>
	<?php else: ?>
		<div class="text_category">
			<span><?=$wo['lang']['products'];?></span>
		</div>
	<?php endif ?>
</div>
<div class="contenido_layshane_items products wo_market">
		<div class="sidebar_layshane_items leftcol">
			<div class="head_productos_fitrar wo_job_head_filter wo_market_head_filter">
				<div class="buscar_productos_layshane">
					<form action="" class="form_search_layshane">
						<label for="product-text">
							<input class="input" type="text" onkeyup="Wo_SearchProducts(this.value)" placeholder="<?php echo $placeholder; ?>" id="product-text" required="">
							<div class="fancy-bg"></div>
							<div class="search">
			          <svg viewBox="0 0 24 24" width="17px" aria-hidden="true" class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr">
			            <g>
			              <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
			            </g>
			          </svg>
			        </div>

			        <button class="close-btn" type="reset">
		            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
		              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
		            </svg>
		        	</button>
						</label>
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
									<li class="active" onclick="changePriceSortValue('latest');$(this).addClass('active');"><span></span><?php echo $wo['lang']['latest'] ?></li>
									<li onclick="changePriceSortValue('price_low');$(this).addClass('active');"><span></span><?php echo $wo['lang']['price_low'] ?></li>
									<li onclick="changePriceSortValue('price_high');$(this).addClass('active');"><span></span><?php echo $wo['lang']['price_high'] ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="contenido_categorias_layshane">
					<?php if (!empty($wo['sections_categories'])): ?>
						<?php foreach($wo['sections_categories'] as $section_id => $section_name): ?>
							<?php $categorias = lui_GetCategories_sections(T_PRODUCTS_CATEGORY,$section_id); ?>
							<span class="titilo_sections_layshane"><?=$wo["lang"][$section_keys[$section_id]]; ?></span>
							<nav class="categories_contenido_layshane">
								<ul>
									<?php foreach($categorias as $category): ?>
										<?php $cat_id_produc = $category['id']; ?>
										<?php if ($cat_id_produc==0): ?>
										<?php else: ?>
											<?php $cat_logo_produc = $category['logo']; ?>
											<?php $cat_nombre_producs = $wo["lang"][$category["lang_key"]];?>
											<li><a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id='.$cat_id_produc);?>" data-ajax="?link1=tienda&c_id=<?=$cat_id_produc?>" alt="Comprar - <?=$cat_nombre_producs;?>"><?=$cat_nombre_producs;?></a></li>
										<?php endif ?>
									<?php endforeach ?>
								</ul>
							</nav>
						<?php endforeach ?>
					<?php endif ?>
				</div>
				<!---->
			</div>
		</div>
		
		<div class="caja_de_productos_en_lista">
			<section>
					<div class="carousel">
						<div class="carousel__wrapper">
							<div class="carousel__header">
						        <h2 class="carousel__headline">Categorias</h2>
						        <div class="carousel__controls">
						          <button class="carousel__arrow disabled arrow-prev" aria-label="Atras"></button>
						          <button class="carousel__arrow arrow-next" aria-label="Adelante"></button>
						        </div>
						    </div>
						    
						    <ul class="carousel__content more_its" id="carousel__content">
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
						    					<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id='.$cat_id_produc);?>" data-ajax="?link1=tienda&c_id=<?=$cat_id_produc?>" alt="<?php echo $cat_nombre_produc;?>">
						    						<figure class="carousel__item__image categories-g__bg bg--change" data-bg="<?php echo($cat_logo_produc) ?>" style="background-image: url(&quot;<?php echo($cat_logo_produc) ?>&quot;);"></figure>

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
						    					<a href="<?php echo lui_SeoLink('index.php?link1=tienda');?>" data-ajax="?link1=tienda"><svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 512 512" style="padding:50px;" fill="#2097ef"><path d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z"/></svg>
						    					</a>
						    				</li>
						    			<?php } ?>
						    			<?php else: if(!$cat_id_produc==0){?>
						    				<li class="carousel__item <?php echo $active?>">
						    					<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id='.$cat_id_produc);?>" data-ajax="?link1=tienda&c_id=<?=$cat_id_produc?>" alt="<?php echo $cat_nombre_producs;?>">
						    						<figure class="carousel__item__image categories-g__bg bg--change" data-bg="<?php echo($cat_logo_produc) ?>" style="background-image: url(&quot;<?php echo($cat_logo_produc) ?>&quot;);"></figure>

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
						    					<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id='.$_GET['c_id'].'&sub_id='.$category['id']);?>" data-ajax="<?='?link1=tienda&c_id='.$_GET['c_id'].'&sub_id='.$category['id'];?>" alt="<?php echo $category['lang'];?>">
						    						<figure class="carousel__item__image categories-g__bg bg--change" data-bg="<?php echo($cat_logo_producs) ?>" style="background-image: url(&quot;<?php echo($cat_logo_producs) ?>&quot;);"></figure>

						    						<div class="carousel__description">
						    							<h3 class="carousel__title"><?php echo $category['lang'];?></h3>
						    						</div>
						    					</a>
						    				</li>
						    			<?php } ?>
						    		<?php } ?>
						    	<?php endif ?>
						    </ul>
						    <script type="text/javascript">
								function guardarPosicionHorizontal() {
							      var miDiv = document.getElementById('carousel__content');
							      if (miDiv) {
							      	sessionStorage.setItem('scrollLeft', miDiv.scrollLeft);
							      }
							      
							    }
							    function restaurarPosicionHorizontal() {
							      var miDiv = document.getElementById('carousel__content');
							      if (miDiv) {
							      	var scrollLeft = sessionStorage.getItem('scrollLeft') || 0;
							      	miDiv.scrollLeft = scrollLeft;
							      }
							      
							    }
							    
							    window.onbeforeunload = guardarPosicionHorizontal;
							    window.onload = restaurarPosicionHorizontal;

							</script>
						  
						</div>
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
	var COMPONENT_SELECTOR = '.carousel__wrapper';
	var CONTROLS_SELECTOR = '.carousel__controls';
	var CONTENT_SELECTOR = '.carousel__content';
	var components = document.querySelectorAll( COMPONENT_SELECTOR );


	for ( let i = 0; i < components.length; i++ ) {
		const component = components[ i ];
		const content = component.querySelector( CONTENT_SELECTOR );
		let isDragStart = false, isDragging = false;
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
			if(!isDragStart) return;
			e.preventDefault();
    	isDragging = true;
    	content.classList.add("dragging");
    	content.classList.add("no-click");
			const mx2 = e.pageX - content.offsetLeft;
			if ( mx ) {
				content.scrollLeft = content.sx + mx - mx2;
			}
		};

		/**
		 * @param {object} e event object. 
		 */
		const mousedownHandler = ( e ) => {
			isDragStart = true;
			content.sx = content.scrollLeft;
			mx = e.pageX - content.offsetLeft;
		};

		const scrollHandler = () => {
			toggleArrows();
		};
		const toggleArrows = () => {
			if ( content.scrollLeft > maxScrollWidth - 10 ) {
				nextButton.classList.add( 'disabled' );
				content.classList.remove("more_its");
			} else if ( content.scrollLeft < 10 ) {
				prevButton.classList.add( 'disabled' );
				content.classList.add("more_its");
			} else {
				content.classList.add("more_its");
				nextButton.classList.remove( 'disabled' );
				prevButton.classList.remove( 'disabled' );
			}
		};
		const mouseupHandler = () => {
			isDragStart = false;
			mx = 0;
			content.classList.remove( 'dragging' );
			content.classList.remove("no-click");
			if(!isDragging) return;
    	isDragging = false;
		};

		/**
		 * @param {object} e event object.
		 */
		const touchmoveHandler = (e) => {
		    if (!isDragStart) return;
		    e.preventDefault();
		    isDragging = true;
		    content.classList.add("dragging");
		    content.classList.add("no-click");
		    const mx2 = e.touches[0].pageX - content.offsetLeft;
		    if (mx) {
		        content.scrollLeft = content.sx + mx - mx2;
		    }
		};

		/**
		 * @param {object} e event object. 
		 */
		const touchstartHandler = (e) => {
		    isDragStart = true;
		    content.sx = content.scrollLeft;
		    mx = e.touches[0].pageX - content.offsetLeft;
		};

		content.addEventListener('touchstart', touchstartHandler);
		content.addEventListener('touchmove', touchmoveHandler);


		content.addEventListener( 'mousedown', mousedownHandler );

		document.addEventListener( 'mousemove', mousemoveHandler );

		if ( component.querySelector( CONTROLS_SELECTOR ) !== undefined ) {
			content.addEventListener( 'scroll', scrollHandler );
		}
		document.addEventListener( 'mouseup', mouseupHandler );
		content.addEventListener( 'touchend', mouseupHandler);

		//content.addEventListener( 'mouseleave', mouseupHandler );
		document.addEventListener('mouseleave', () => {
		    isDragStart = false;
		    isDragging = false;
		});
	}


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

</script>