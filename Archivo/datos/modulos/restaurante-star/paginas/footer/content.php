<br><br>
<br><br>

<?php 
$pages = lui_GetCustomPages();
?>

<div class="contenido_footer">
		<hr>
		<div class="footer-powered">
			
			<ul class="list-inline">
				<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=about-us');?>" data-ajax="?link1=terms&type=about-us"><?php echo $wo['lang']['about'];?></a></li>
				<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=privacy-policy');?>" data-ajax="?link1=terms&type=privacy-policy"><?php echo $wo['lang']['privacy_policy'];?></a></li>
				<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=terms');?>" data-ajax="?link1=terms&type=terms"><?php echo $wo['lang']['terms_of_use'];?></a></li>
				<?php if ($wo['config']['refund_system'] == 'on') { ?>
					<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=refund');?>" data-ajax="?link1=terms&type=refund"><?php echo $wo['lang']['request_refund'];?></a></li>
				<?php } ?>
				
				<li><a href="<?php echo lui_SeoLink('index.php?link1=contact-us');?>" data-ajax="?link1=contact-us"><?php echo $wo['lang']['contact_us'];?></a></li>

				<?php if ($wo['config']['developers_page'] == 1)  { ?>
					<li><a data-ajax="?link1=developers" href="<?php echo lui_SeoLink('index.php?link1=developers');?>"><?php echo $wo['lang']['developers'];?></a></li>
				<?php } ?>
				<?php if (count($pages) > 0) { ?>
					<li>
						<div class="dropdown dropup">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?php echo $wo['lang']['more'];?> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" style="width: auto; min-width: 100px; font-size: 11px;">
								<?php
									if (count($pages) > 0) {
									foreach ($pages as $key => $page) {
								?>
									<li><a href="<?php echo lui_SeoLink('index.php?link1=paginas&page_name=' . $page['page_name']);?>"><?php echo $page['page_title'];?></a></li>
								<?php } } ?>
							</ul>
						</div>
					</li> 
				<?php } ?>
			</ul>

			<p>
				<?php 
					$copy = str_replace('{site_name}', $wo['config']['siteName'], $wo['lang']['copyrights']);
					echo $copy = str_replace('{date}', date('Y'), $copy);
				?>
			</p>
		</div>
		<div class="clear"></div>
</div>