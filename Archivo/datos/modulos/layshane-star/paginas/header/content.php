<div class="lang_conf_d navbar-fixed-top">
	<div class="head_data_left_go"></div>
	<div class="head_data_rigt_go">
	  <?php $idioma = $db->where('iso',$wo['lang_attr'])->getOne(T_LANG_ISO); ?>
		<span class="language_select" data-toggle="modal" data-target="#select-language"><span class="<?=ucfirst($idioma->lang_name); ?>"></span></span>
	</div>
</div>

<div class="navbar navbar-default navbar-fixed-top">
	<div class="header-fixed1000">
		<div class="container-fluid">
			<div class="wow_hdr_innr_left">
				<a class="brand header-brand" href="<?php echo $wo['config']['site_url']; ?>" data-ajax="?index.php?link1=home" >
					<picture>
						<source media="(max-width: 1050px)" srcset="<?php echo $wo['config']['theme_url'];?>/img/icono.<?php echo $wo['config']['logo_extension'];?>" width="268" height="43">
						<source media="(min-width: 1050px)" srcset="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" width="280" height="45">

						<img decoding="async" rel="preload" width="280" height="45" src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="<?php echo $wo['config']['siteName'];?>" title="<?php echo $wo['config']['siteName'];?>">
					</picture>


				</a>
				<nav>
					<ul class="nav navbar-nav">
						<li>
								<a class="sixteen-font-size home_display <?php echo ($wo['page'] == 'home') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="home_display" data-ajax="?index.php?link1=home">
									<svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor" height="28" width="28">
										<path d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29"></path>
									</svg>
									<span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
								</a>
						</li>

						<li>
							<a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'products') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=products'); ?>" data="products_display" data-ajax="?link1=products" title="<?php echo $wo['lang']['tienda'];?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<line x1="3" y1="21" x2="21" y2="21"></line>
									<path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
									<line x1="5" y1="21" x2="5" y2="10.85"></line><line x1="19" y1="21" x2="19" y2="10.85"></line>
									<path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
								</svg>
								<span><?php echo $wo['lang']['tienda'] ?></span>
							</a>
						</li>
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
						<li>
							<a href="<?php echo lui_SeoLink('index.php?link1=checkout'); ?>" class="sixteen-font-size checkout_display <?php echo ($wo['page'] == 'checkout') ? 'active': '';?>" data="checkout_display" data-ajax="?link1=checkout" title="<?php echo $wo['lang']['carrito'];?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
									<circle cx="9" cy="21" r="1"></circle>
									<circle cx="20" cy="21" r="1"></circle>
									<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
								</svg>
								<div class="count_items_carrito">
									<span class="count_items_carrito_cou"><?=$totalcomprasencarrito;?></span>
								</div>
								<span>&nbsp;<?php echo $wo['lang']['carrito'] ?></span>
							</a>
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