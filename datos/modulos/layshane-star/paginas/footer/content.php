<?php
$copy = str_replace('{site_name}', $wo['config']['siteName'], $wo['lang']['copyrights']);
$copy = str_replace('{date}', date('Y'), $copy);
$projectVersion = $wo['config']['version'];
?>

<div class="footer_page_list_l">
    <nav class="footer-powered">
        <ul class="list-inline">
            <li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=about-us');?>" data-ajax="?link1=terms&type=about-us"><?php echo $wo['lang']['about'];?></a></li>
            <li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=privacy-policy');?>" data-ajax="?link1=terms&type=privacy-policy"><?php echo $wo['lang']['privacy_policy'];?></a></li>
            <li><a href="<?php echo lui_SeoLink('index.php?link1=terms&type=terms');?>" data-ajax="?link1=terms&type=terms"><?php echo $wo['lang']['terms_of_use'];?></a></li>
            <li><a href="<?php echo lui_SeoLink('index.php?link1=contact-us');?>" data-ajax="?link1=contact-us"><?php echo $wo['lang']['contact_us'];?></a></li>
        </ul>
    </nav>
    <span><?php echo $copy; ?></span>
    <span class="project-version">Versión: <?php echo $projectVersion; ?></span>
</div>
