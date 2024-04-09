<style type="text/css">
/*Dropdown*/
.open>.dropdown-menu:not(.notfi-dropdown):not([role=combobox]) {transition: opacity 150ms cubic-bezier(0.4, 0.0, 0.2, 1) 0ms,transform 150ms cubic-bezier(0.4, 0.0, 0.2, 1) 0ms;transform: none;opacity: 1;visibility: visible;}
.dropdown-menu:not(.notfi-dropdown) > li > a {padding: 5px 15px;line-height: 30px;}
	.notification-list{padding:10px}
.notification-list:hover{background:#f7f7f7}
.notification-list .notification-text{font-size: 14.5px;color:#666;}
.notification-list .notification-time{font-size: 12px;color:#666;margin:4px 0 0}
.notification-list .notification-time svg.feather{margin:-1px 3px 0;width:15px;height:15px;color:#575757}
.notification-list span.main-color{color: #050505!important;font-size: 14.5px;font-weight: 600;/* font-family: sans-serif; */}
.notification-list .notification-user-avatar img{border-radius:50%;margin-right:10px;width: 56px;height: 56px;margin-left:0}
.notifications-dropdown{width: 390px;overflow:auto;max-height: 550px;padding:0 !important}
.notifications-dropdown .turn-off-sound{
	    color: #ff574b;
    padding: 6px 16px;
    display: inline-block;
    background-color: rgb(244 67 54 / 10%);
    font-weight: 500;
    font-family: "Roboto", sans-serif;
    font-size: 12px;
    letter-spacing: 0.4px;
    word-spacing: 0.8px;
    margin: 10px;
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;cursor:pointer
}
.notifications-dropdown .turn-off-sound svg {
	margin-top: -2px;
}
.order-by{padding: 12px;margin-bottom:20px}
.order-by .dropdown-toggle{cursor: pointer;
    font-weight: 600;
    color: inherit;
    padding: 4px 10px;
    border-radius: 5px;
    margin: 0 3px;}
.order-by .dropdown-menu{margin-top:6px}
.plus-images{position:relative}
.plus-images .plus-images-num{position:absolute;top:30px;color:#fff;font-size:20px}
.messages-dropdown{width: 390px;overflow:auto;max-height: 500px;padding:0}
.messages-list{cursor:pointer}
.messages-list .notification-time{color:#777!important;margin:5px 0 0}
.messages-list .notification-user-avatar img{margin-right:10px;margin-left:0;width: 56px;height: 56px;}
.messages-list span.main-color{color:#272727!important}
.header-message{font-size: 14px;color:#8c8c8c;padding:3px 0 2px}
.header-message svg.feather{margin-top:-1px;width:13px;height:13px}
.activities-wrapper{overflow-y:auto}
.activities-wrapper .notification-list .notification-text{font-size: 14.5px;color:#666}
.activities-wrapper .notification-list .notification-time{font-size: 12px;color:#666}
.activities-wrapper *{font-size: 14px}
.activities-wrapper h2 .text-center{font-size: 14.5px;color:#777}
.header-loading-sppiner{font-size:30px;text-align:center;margin-left:auto;margin-right:auto;display:block;color:#777}
.wowonder-well{background-color:#fff;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;padding:15px 15px 1px;}
.wowonder-well.one-well{padding-top:0}
.familly-list-link {font-weight:normal;padding: 10px;margin-left: auto;border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;background: rgba(0,0,0,0.07);}
.familly-list-link:hover {background: rgba(0,0,0,0.09);}
.familly-list-link a:hover{text-decoration: none;}
.profile-style .avatar img{width:74px;border-radius:50%;margin-right:10px;border:1px solid #ededed}
.profile-style:not(.promoted-style){width:48%;margin-right:6px;display:inline-table;margin-bottom:20px}
.profile-style .user-like-button button{font-size: 14.5px;border:1px solid #ededed;margin:3px}
.profile-style .user-like-button button.btn-active{font-size: 14.5px;border:1px solid #fff}
.profile-style .user-follow-button button{padding:3px;font-size: 14.5px;background-color:#fff;margin-top:10px;border:1px solid #ededed}
.profile-style .user-follow-button button:hover{box-shadow:0;box-shadow:none}
.profile-style .user-follow-button button.btn-active{padding:3px;font-size: 14.5px;border:1px solid #fff;outline:0}
.sidebar-profile-style{padding-bottom:10px!important;margin-bottom:15px!important;border-radius:2px;box-shadow:0 1px 0 0 #e3e4e8,0 0 0 1px #f1f1f1;background-color:#fff}
.load-bar {
  position: relative;
  width: 100%;
    top: 0px;
    left: 0px;
    right: 0px;
	height:3px;
	width:100%;
	position:fixed;
	z-index:5000;
  background-color: #fdba2c;
}
.bar {
  content: "";
  display: inline;
  position: absolute;
  width: 0;
  height: 100%;
  left: 50%;
  text-align: center;
}
.bar:nth-child(1) {
  background-color: #0095d8;
  animation: loading 3s linear infinite;
}
.bar:nth-child(2) {
  background-color: #eee;
  animation: loading 3s linear 1s infinite;
}
.bar:nth-child(3) {
  background-color: #c54147;
  animation: loading 3s linear 2s infinite;
}
@keyframes loading {
    from {left: 50%; width: 0;z-index:100;}
    33.3333% {left: 0; width: 100%;z-index: 10;}
    to {left: 0; width: 100%;}
}
header .barloading{
	/* background-color: #fff !important; */
}
.barloading {
  height: 4px;
  width: 100%;
  top: 0px;
  left: 0px;
  right: 0px;
  height: 2px;
  width:100%;
  display: none;
  position:fixed;
  z-index:5000;
  overflow: hidden;
  background-color: #fff;
}
.barloading:before {
  display: block;
  position: absolute;
  content: "";
  left: -200px;
  width: 200px;
  height: 3px;
  animation: barloading 1.5s linear infinite;
}
.share_modal_social_icos .social-btn-parent {
	transition: all 0.2s;
	padding: 10px;
	border-radius: 10px;
}
.share_modal_social_icos .social-btn-parent:hover {
	background: rgba(0,0,0, 0.1) !important;
}
@keyframes barloading {
    from {left: -200px; width: 30%;}
    50% {width: 30%;}
    70% {width: 70%;}
    80% { left: 50%;}
    95% {left: 120%;}
    to {left: 100%;}
}

.animated_20 {-webkit-animation-duration: 0.2s;animation-duration: 0.2s;}
.animated_40 {-webkit-animation-duration: 0.4s;animation-duration: 0.4s;}
.animated_60 {-webkit-animation-duration: 0.6s;animation-duration: 0.6s;}
.animated_80 {-webkit-animation-duration: 0.8s;animation-duration: 0.8s;}
.show-message-link-container a{font-size:14.5px;padding:6px;text-align:center;background:#f9f9f9;color:#666;display:block;}
.show-message-link-container a:hover{text-decoration:underline;color:#666;}
.dropdown-menu .divider{height:1px;overflow:hidden;background-color:#ededed;}
.show-message-link-container a{font-size:14.5px;padding:6px;text-align:center;background:#f9f9f9;color:#666;display:block;}
.show-message-link-container a:hover{text-decoration:underline;color:#666;}
</style>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="header-fixed1000">
		<div class="container-fluid">
			<div class="wow_hdr_innr_left">
				<a class="brand header-brand" href="<?php echo $wo['config']['site_url']; ?>" data-ajax="?index.php?link1=home" >
					<picture>
						<img decoding="async" rel="preload" width="150" height="30" src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="<?php echo $wo['config']['siteName'];?>" title="<?php echo $wo['config']['siteName'];?>">
					</picture>
				</a>
				<nav>
					<ul class="nav navbar-nav">
						<li>
							<a class="sixteen-font-size home_display <?php echo ($wo['page'] == 'home') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="home_display" data-ajax="?index.php?link1=home"><?php echo $wo['lang']['home'] ?></a>
						</li>

						<li>
							<a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'tienda') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=tienda'); ?>" data="products_display" data-ajax="?link1=tienda" title="<?php echo $wo['lang']['tienda'];?>"><?php echo $wo['lang']['tienda'] ?></a>
						</li>
					</ul>
				</nav>
			</div>
			<?php if ($wo['loggedin'] == true): ?>
				<?=lui_LoadPage('header/loggedin-header');?>
			<?php else: ?>
				<?php echo lui_LoadPage('header/main-header');?>
			<?php endif ?>
		</div>
		<div class="header_no_ap_go_lie"></div>
  </div>
</div>