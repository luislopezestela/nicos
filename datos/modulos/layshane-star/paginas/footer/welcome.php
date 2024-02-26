<div class="welcome-footer">
	<?php 
		$copy = str_replace('{site_name}', $wo['config']['siteName'], $wo['lang']['copyrights']);
		echo $copy = str_replace('{date}', date('Y'), $copy);
	?> &nbsp;•&nbsp;
	<a href="<?php echo lui_SeoLink('index.php?link1=products');?>" data-ajax="?link1=products"><?php echo $wo['lang']['market'];?></a> &nbsp;•&nbsp;

	<?php
		$pages = lui_GetCustomPages();
		if (count($pages) > 0) {
		foreach ($pages as $key => $page) {
	?>
		<a href="<?php echo lui_SeoLink('index.php?link1=paginas&page_name=' . $page['page_name']);?>"><?php echo $page['page_title'];?></a> &nbsp;•&nbsp;
	<?php } } ?>
	<span class="lang">
		<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="modal" data-target="#select-language">
		<?php echo $wo['lang']['language'];?></a>
	</span>
</div>