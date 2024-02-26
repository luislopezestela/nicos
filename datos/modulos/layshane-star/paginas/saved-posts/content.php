<div class="page-margin">
	<div class="productos_listar_pagina_view">
		<div class="contenedor_productos_lista leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="caja_de_productos_en_lista middlecol wo_market">
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<?php echo $wo['lang']['saved']; ?>
					</div>
				</div>
			</div>
			
			<div class="market_bottom saved-posts">
				<div class="productos_en_cuadros">
				<?php
					$stories = lui_GetSavedPosts($wo['user']['user_id']);
					if (count($stories) <= 0) {
						echo lui_LoadPage('saved-posts/no-posts');
					} else {
						foreach ($stories as $wo['story']) {
							echo lui_LoadPage('story/content');
						}
					}
				?>
				</div>
			</div>
		</div>
	</div>
</div>