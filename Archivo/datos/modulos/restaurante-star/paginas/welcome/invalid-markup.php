<?php echo lui_LoadPage('welcome/welcome-header');?>
<div class="wrapper">
	<?php echo lui_LoadPage('welcome/welcome-header-logo');?>
	<form class="login" id="forgot-form" method="post" style="padding-bottom:10px;">
		<h5><?php echo $wo['lang']['invalid_markup']; ?>.</h5>
		<a href="<?php echo lui_SeoLink('index.php?link1=welcome');?>"><?php echo $wo['lang']['go_back'] ?></a>
	</form>
	<?php echo lui_LoadPage('footer/welcome');?>
</div>
<?php echo lui_LoadPage('welcome/welcome-users-profiles');?>