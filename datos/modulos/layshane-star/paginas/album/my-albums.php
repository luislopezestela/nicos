<?php if (lui_IsAdmin()): ?>
<div class="page-margin">
	<div class="productos_listar_pagina_view">
		<div class="contenedor_productos_lista leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="caja_de_productos_en_lista singlecol">
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M22,16V4A2,2 0 0,0 20,2H8A2,2 0 0,0 6,4V16A2,2 0 0,0 8,18H20A2,2 0 0,0 22,16M11,12L13.03,14.71L16,11L20,16H8M2,6V20A2,2 0 0,0 4,22H18V20H4V6"></path></svg></span> <?php echo $wo['lang']['albums']; ?>
					</div>
				</div>
			</div>
			<div class="page-margin wow_content">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_menu">
						<ul class="list-unstyled">
							<li class="active"><a href="<?php echo lui_SeoLink('index.php?link1=albums'); ?>" data-ajax="?link1=albums"><?php echo $wo['lang']['my_albums'] ?></a></li>
						</ul>
						<a class="btn btn-main btn-mat btn-mat-raised" href="<?php echo lui_SeoLink('index.php?link1=create-album');?>" data-ajax="?link1=create-album"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg> <?php echo $wo['lang']['create'] ?></a>
					</div>
				</div>
			</div>
			<div class="wo_my_pages">
				<div class="row">
					<?php
						$albums = lui_GetUserAlbums($wo['user_id']);
						if (count($albums) > 0) {
							foreach ($albums as $wo['album']) {
								echo lui_LoadPage('album/album-list');
							}
						} else {
							echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22,16V4A2,2 0 0,0 20,2H8A2,2 0 0,0 6,4V16A2,2 0 0,0 8,18H20A2,2 0 0,0 22,16M11,12L13.03,14.71L16,11L20,16H8M2,6V20A2,2 0 0,0 4,22H18V20H4V6" /></svg> ' . $wo['lang']['no_albums_found'] . '</div>';
						}
					?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
<?php endif ?>