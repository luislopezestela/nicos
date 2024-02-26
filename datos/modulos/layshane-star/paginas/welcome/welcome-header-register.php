<div id="welcomeheader" class="navbar-default">
	<div class="container">
		<div class="logo <?php echo lui_RightToLeft('pull-left');?>">
			<a href="<?php echo $wo['config']['site_url'];?>"><img src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="Logo"> </a>
		</div>
		<?php if ($wo['config']['user_registration'] == 1): ?>
			<ul class="nav navbar-nav navbar-right <?php echo lui_RightToLeft('pull-right');?>">
				<li class="absul-right">
					<a class="mdbtn" href="<?php echo lui_SeoLink('index.php?link1=register');?>"><?php echo $wo['lang']['register']?></a>
				</li>
			</ul>
		<?php endif ?>
	</div>
</div>