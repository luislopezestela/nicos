<?php if(lui_IsAdmin() || lui_IsModerator()){
}else{
	header('Location: ' . $wo['config']['site_url']);
   exit();
}?>
<style type="text/css">
body{background-color:#F0F2FD;}
.carousel{padding:15px 0;padding-top:0;}
.carousel h2{margin:0;}
.carousel a{text-decoration: none;color:#fff;}

.carousel .carousel__wrapper{position:relative;margin-bottom:24px;}

.carousel .carousel__content{
  display: flex;
  flex-wrap:wrap;
  gap:24px;
  list-style: none;
  padding:20px 10px;
  padding-left:15px;
  margin:auto -20px;
}
.carousel .carousel__item{
	flex:0 0 auto;
	display:inline-flex;
	width:100%;
	 box-shadow: inset 5px 5px 10px #a9a9aa77,
              inset -5px -5px 10px #ffffff7e;
  	border-radius: 20px;
  	background: #f2f2f3;
  	overflow:hidden;
  	padding:22px;
}
.carousel .carousel__item a{
	display:flex;
  position: relative;
  user-select: none;
  width:100%;
  cursor: pointer;
}
.carousel .carousel__item .carousel__description{width:80%;position:relative;display:flex;flex-wrap:wrap;justify-content:center;gap:1rem;align-items:flex-start;}
.logo_lista_condsd{display:flex;width:20%;justify-content:center;align-items:center;}
.logo_lista_condsd svg{width:100%;height:auto;padding:30px}
.carousel h3{
  width:100%;
  padding:0 13px;
  text-align:center;
  background: linear-gradient(120deg, rgba(0,194,255,1) 0%, rgba(0,86,255,1) 100%);
  background-clip: border-box;
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
 font-weight: bold;
 font-size: 1.5cqi;
}
.number_stok{font-size:1.9cqi;background: linear-gradient(120deg, rgba(0,194,255,1) 0%, rgba(0,86,255,1) 100%);
  background-clip: border-box;
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
 font-weight:bold;
 box-shadow: inset 5px 5px 10px #a9a9aa77,
              inset -5px -5px 10px #ffffff7e;
 border-radius:10px;
 padding:10px;
 font-size: 1.5cqi;}
@media (min-width: 1650px){
.carousel .carousel__item{width: calc(100% / 2 - 1rem);}
.logo_lista_condsd{width:20%}
.carousel .carousel__item .carousel__description{width:80%;}
.logo_lista_condsd svg{padding:10px}
.carousel h3{font-size:1.2cqi;}
}
@media (max-width: 1650px){
.number_stok{font-size: 2.9cqi;}
.logo_lista_condsd svg{padding:20px}
.carousel h3{font-size:1.9cqi;}
}
@media (max-width: 992px){
.carousel h3{font-size:2.6cqi;}
.number_stok{font-size: 3.9cqi;}
}
@media (max-width: 700px){
.logo_lista_condsd svg{padding:10px}
.carousel h3{font-size:3.6cqi;}
.number_stok{font-size: 4.9cqi;}
}
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
						<span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M192 64v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H224c-17.7 0-32 14.3-32 32zM82.7 207c-15.3 8.8-20.5 28.4-11.7 43.7l32 55.4c8.8 15.3 28.4 20.5 43.7 11.7l55.4-32c15.3-8.8 20.5-28.4 11.7-43.7l-32-55.4c-8.8-15.3-28.4-20.5-43.7-11.7L82.7 207zM288 192c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H288zm64 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H352zM160 384v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zM32 352c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H32z"/></svg></span> Mis imventarios
					</div>
				</div>
			</div>
			<br><br>
			
			<div class="wo_my_pages">
				<section>
					<div class="carousel">
						<div class="carousel__wrapper">
						    <ul class="carousel__content">
						    	<li class="carousel__item">
						    		<a href="<?php echo lui_SeoLink('index.php?link1=imv_productos');?>" data-ajax="?link1=imv_productos">
						    			<div class="logo_lista_condsd">
						    				<svg xmlns="http://www.w3.org/2000/svg" fill="#f1c40f" height="16" width="18" viewBox="0 0 576 512"><path d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/></svg>
						    			</div>
						    			<div class="carousel__description">
						    				<h3 class="carousel__title">Productos</h3>
						    				<div class="number_stok">56</div>
						    			</div>
						    		</a>
						    	</li>
						    	<li class="carousel__item">
						    		<a href="<?php echo lui_SeoLink('index.php?link1=imv_ingredientes');?>" data-ajax="?link1=imv_ingredientes">
						    			<div class="logo_lista_condsd">
						    				<svg xmlns="http://www.w3.org/2000/svg" fill="#3498db" height="16" width="18" viewBox="0 0 576 512"><path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
						    			</div>
						    			<div class="carousel__description">
						    				<h3 class="carousel__title">Ingredientes</h3>
						    				<div class="number_stok">102</div>
						    			</div>
						    		</a>
						    	</li>
						    </ul>
						  

						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- .row -->
</div>
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