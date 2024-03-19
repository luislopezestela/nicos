<?php $totalcarrito = 0;
$totalcomprasencarrito = 0;
if($wo['loggedin'] == true){
	$items = $db->where('user_id',$wo['user']['user_id'])->get(T_USERCARD);
	if(!empty($items)){
		foreach($items as $key => $item){
			$totalcarrito += $item->units;
		}
	}
}
$totalcomprasencarrito = $totalcarrito; ?>
<div class="lang_conf_d navbar-fixed-top">
	<div class="head_data_left_go">
		<?php $idioma = $db->where('iso',$wo['lang_attr'])->getOne(T_LANG_ISO); ?>
		<a href="<?php echo lui_SeoLink('index.php?link1=checkout'); ?>" class="sixteencart checkout_display <?php echo ($wo['page'] == 'checkout') ? 'active': '';?>" data="checkout_display" data-ajax="?link1=checkout" title="<?php echo $wo['lang']['carrito'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
			<circle cx="9" cy="21" r="1"></circle>
			<circle cx="20" cy="21" r="1"></circle>
			<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
			<div class="count_items_carrito">
				<span class="count_items_carrito_cou"><?=$totalcomprasencarrito;?></span>
			</div>
		</a>
	</div>
	<div class="head_data_rigt_go">
		<span class="language_select" data-toggle="modal" data-target="#select-language"><span class="<?=ucfirst($idioma->lang_name); ?>"></span></span>
	</div>
</div>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="header-fixed1000">
		<div class="container-fluid">
			<div class="wow_hdr_innr_left">
				<a class="brand header-brand" href="<?php echo $wo['config']['site_url']; ?>" data-ajax="?index.php?link1=home" >
					<picture>
						<source media="(max-width: 920px)" srcset="<?php echo $wo['config']['theme_url'];?>/img/icono.<?php echo $wo['config']['logo_extension'];?>" width="268" height="43">
						<source media="(min-width: 920px)" srcset="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" width="280" height="45">
						<img decoding="async" rel="preload" width="280" height="45" src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="<?php echo $wo['config']['siteName'];?>" title="<?php echo $wo['config']['siteName'];?>">
					</picture>


				</a>
				<nav>
					<ul class="nav navbar-nav">
						<li>
							<a class="sixteen-font-size home_display <?php echo ($wo['page'] == 'home') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="home_display" data-ajax="?index.php?link1=home"><?php echo $wo['lang']['home'] ?></a>
						</li>

						<li>
							<a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'tienda') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=tienda'); ?>" data="products_display" data-ajax="?link1=tienda" title="<?php echo $wo['lang']['tienda'];?>"><?php echo $wo['lang']['tienda'] ?></a>
						</li>
					</ul>
				</nav>
			</div>
			<?php if($wo['loggedin'] == true) {
				echo lui_LoadPage('header/loggedin-header');
			}else{
				echo lui_LoadPage('header/main-header');
			} ?>
		</div>
		<div class="header_no_ap_go_lie"></div>
  </div>
</div>