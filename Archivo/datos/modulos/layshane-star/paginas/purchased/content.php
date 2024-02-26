<div class="page-margin">
	<div class="productos_listar_pagina_view">
		<div class="contenedor_productos_lista leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="caja_de_productos_en_lista singlecol">
			<div class="page-margin wow_content">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_menu">
						<ul class="list-unstyled">
							<?php if (lui_IsAdmin() == true): ?>
								<?php if ($wo['config']['can_use_market']) { ?>
								<li><a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products"><?php echo $wo['lang']['my_products'] ?></a></li>
								<?php } ?>
							<?php endif ?>
							<?php if ($wo['config']['store_system'] == 'on') { ?>
							<li class="active"><a href="<?php echo lui_SeoLink('index.php?link1=purchased'); ?>" data-ajax="?link1=purchased"><?php echo $wo['lang']['purchased'] ?></a></li>
							<?php if ($wo['have_products'] > 0) { ?>
								<li><a href="<?php echo lui_SeoLink('index.php?link1=orders'); ?>" data-ajax="?link1=orders"><?php echo $wo['lang']['orders'] ?></a></li>
							<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="wow_content my_purchased_content">
				<?php if (count($wo['purchased']) > 0): ?>
					<div class="row">
						<?php echo($wo['html']); ?>
					</div>
					<?php if (count($wo['purchased']) == 20){ ?>
						<div class="purchased_posts_load">
							<div class="purchased_load-more">
								<button class="btn btn-default text-center pointer" onclick="Wo_LoadPurchase();"><?php echo $wo['lang']['load_more']; ?></button>
							</div>
						</div>
					<?php } ?>
				<?php else: ?>
					<div class="search-filter-center-text empty_state">
					<?php echo($wo['html']); ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- .row -->
</div>
