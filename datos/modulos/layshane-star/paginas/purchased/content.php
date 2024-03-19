<style type="text/css">
	body{background-color:#F0F2FD;}
</style>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>

<div class="page-margin">
	<div class="productos_listar_pagina_view">
		<div class="caja_de_productos_en_lista singlecol">
			<div class="wow_content my_purchased_content">
				<?php if ($wo['have_products'] > 0) { ?>
						<li><a href="<?php echo lui_SeoLink('index.php?link1=orders'); ?>" data-ajax="?link1=orders"><?php echo $wo['lang']['orders'] ?></a></li>
				<?php } ?>
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
