<nav class="ads-navbar-wrapper" role="navigation">
	<div class="ads_mini_wallet">
		<p><?php echo $wo['lang']['my_balance'];?></p>
		<h3><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo sprintf('%.2f',$wo['user']['wallet']);?></h3>
	</div>
	<ul class="ads-nav list-unstyled">
		<?php if ($wo['config']['user_ads'] == 1) { ?>
			<li>
				<a href="<?php echo lui_SeoLink('index.php?link1=advertise'); ?>" data-ajax="?link1=advertise" class="<?php echo ($wo['ap'] == 'ads') ? 'active' : ''; ?>" data-ajax="?link1=advertise"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z" /></svg> <?php echo $wo['lang']['my_campaigns']; ?></a>
			</li>
		<?php } ?>
		<li>
			<a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>" data-ajax="?link1=wallet" class="<?php echo ($wo['ap'] == 'wallet') ? 'active' : ''; ?>" data-ajax="?link1=wallet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z" /></svg> <?php echo $wo['lang']['my_wallet']; ?></a>
		</li>
		<!-- <li>
			<a href="<?php echo lui_SeoLink('index.php?link1=send_money'); ?>" data-ajax="?link1=send_money" class="<?php echo ($wo['ap'] == 'send') ? 'active' : ''; ?>"><?php echo $wo['lang']['send_money']; ?></a>
		</li> -->
		<li><hr></li>
		<?php if ($wo['config']['user_ads'] == 1) { ?>
			<li>
				<a href="<?php echo lui_SeoLink('index.php?link1=create-ads'); ?>" data-ajax="?link1=create-ads" class="<?php echo ($wo['ap'] == 'create') ? 'active' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['create_new_ads']; ?></a>
			</li>
		<?php } ?>
	</ul>
	<div class="clear"></div>
</nav>

<?php if ($wo['ap'] == 'create') { ?>
<div class="page-margin">
	<div class="fake_ad_post">
		<div class="wo_page_hdng">
			<div class="wo_page_hdng_innr">
				<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z"></path></svg></span> <?php echo $wo['lang']['ad_preview']; ?>
			</div>
		</div>
		<div class="fads_heading">
			<div class="fads_meta">
				<div class="fads_avatar" style="background-image:url('<?php echo $wo['user']['avatar'];?>')"></div>
				<div class="fads_m_info">
					<div class="company" id="copy_camp_comp"><span><?php echo $wo['lang']['company']?></span></div>
					<div class="location" id="copy_camp_location"><span><?php echo $wo['lang']['location']?></span></div>
				</div>
			</div>
			<div class="fads_headline">
				<div id="copy_camp_desc"><span><?php echo $wo['lang']['description']?></span></div>
			</div>
			<div class="fads_cover">
				<div class="fcov_title">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18.5,4L19.66,8.35L18.7,8.61C18.25,7.74 17.79,6.87 17.26,6.43C16.73,6 16.11,6 15.5,6H13V16.5C13,17 13,17.5 13.33,17.75C13.67,18 14.33,18 15,18V19H9V18C9.67,18 10.33,18 10.67,17.75C11,17.5 11,17 11,16.5V6H8.5C7.89,6 7.27,6 6.74,6.43C6.21,6.87 5.75,7.74 5.3,8.61L4.34,8.35L5.5,4H18.5Z" /></svg>
					<div id="copy_camp_title"><span><?php echo $wo['lang']['title']?></span></div>
				</div>
				<div class="fcov_image">
					<div id="fake_post_img_holder"><img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>