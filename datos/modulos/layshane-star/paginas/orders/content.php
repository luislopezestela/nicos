<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<style type="text/css">
body{background-color:#F0F2FD;}
</style>

<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
	</div>

	<br>
	<div class="wo_settings_page loader_page_content">
		<div class="profile-lists singlecol">
			<div class="avatar-holder mt-0">
		        <div class="wo_page_hdng pag_neg_padd pag_alone">
		        	<div class="wo_page_hdng_innr big_size">
		        		<span style="color:#3498db;"><svg xmlns="http://www.w3.org/2000/svg" style="fill:none;" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 5a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-10z"></path><path d="M7 20h10"></path><path d="M9 16v4"></path><path d="M15 16v4"></path></svg></span> Ventas
		        	</div>
		        </div>
		    </div>
		    <br><br>
		    <section>
		    	<div class="page-margin wow_content">
					<div class="wo_page_hdng pag_neg_padd pag_alone">
						<div class="wo_page_hdng_menu">
							<ul class="list-unstyled">
								<?php if ($wo['config']['can_use_market']) { ?>
								<li><a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products"><?php echo $wo['lang']['my_products'] ?></a></li>
								<?php } ?>
								<?php if ($wo['config']['store_system'] == 'on') { ?>
									<li><a href="<?php echo lui_SeoLink('index.php?link1=purchased'); ?>" data-ajax="?link1=purchased"><?php echo $wo['lang']['purchased'] ?></a></li>
									<li class="active"><a href="<?php echo lui_SeoLink('index.php?link1=orders'); ?>" data-ajax="?link1=orders"><?php echo $wo['lang']['orders'] ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="wow_content my_purchased_content">
					<?php if (!empty($wo['orders']) && count($wo['orders']) > 0): ?>
						<div class="row">
							<?php echo($wo['html']); ?>
						</div>

						<?php if (count($wo['orders']) == 10){ ?>
							<div class="purchased_posts_load">
								<div class="purchased_load-more">
									<button class="btn btn-default text-center pointer" onclick="Wo_LoadOrders();"><?php echo $wo['lang']['load_more']; ?></button>
								</div>
							</div>
							<?php } ?>
					<?php else: ?>
						<?php echo($wo['html']); ?>
					<?php endif; ?>
				</div>
		    </section>
		</div>
	</div>
</div>
<script type="text/javascript">
	recpoll()
</script>