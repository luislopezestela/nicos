<?php $copy = str_replace('{site_name}', $wo['config']['siteName'], $wo['lang']['copyrights']); $pages = lui_GetCustomPages();?>
<?php $idioma = $db->where('iso',$wo['lang_attr'])->getOne(T_LANG_ISO); ?>
<div class="footer_page_list_l">
	<hr style="margin:0!important"><br><br>
	<nav class="footer-powered">
		<ul class="list-inline">
			<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=about-us');?>" data-ajax="?link1=terms&type=about-us"><?php echo $wo['lang']['about'];?></a></li>
			<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=privacy-policy');?>" data-ajax="?link1=terms&type=privacy-policy"><?php echo $wo['lang']['privacy_policy'];?></a></li>
			<li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=terms');?>" data-ajax="?link1=terms&type=terms"><?php echo $wo['lang']['terms_of_use'];?></a></li>
			<li><a href="<?php echo lui_SeoLink('index.php?link1=contact-us');?>" data-ajax="?link1=contact-us"><?php echo $wo['lang']['contact_us'];?></a></li>
			<?php if ($wo['config']['developers_page'] == 1)  { ?>
				<li><a data-ajax="?link1=developers" href="<?php echo lui_SeoLink('index.php?link1=developers');?>"><?php echo $wo['lang']['developers'];?></a></li>
			<?php } ?>
			<li>
				<span class="language_select flex" data-toggle="modal" data-target="#select-language">
					<span><?=ucfirst($wo['lang'][ucfirst($idioma->lang_name).'_'.$idioma->iso]); ?></span><i class="<?=ucfirst($idioma->lang_name);?>"></i></span>
			</li>
		</ul>
	</nav>
	<span><?php echo $copy = str_replace('{date}', date('Y'), $copy);?></span>
	
</div>
<br><br>