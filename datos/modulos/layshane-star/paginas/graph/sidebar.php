<div class="wow_content">
	<div class="wo_page_hdng pag_neg_padd pag_alone">
		<div class="wo_page_hdng_menu">
			<ul class="list-unstyled">
				<li class="<?php echo ($wo['active'] == 1) ? 'active': ''; ?>"><a href="<?php echo lui_SeoLink('index.php?link1=developers') ?>" data-ajax="?link1=developers"><?php echo $wo['lang']['developers'] ?></a></li>
			</ul>
			<a class="btn btn-main btn-mat btn-mat-raised" data-ajax="?link1=create-app" href="<?php echo lui_SeoLink('index.php?link1=create-app');?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg> <?php echo $wo['lang']['create'] ?> Aplicación</a>
		</div>
	</div>
</div>