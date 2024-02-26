<style type="text/css">
.dropdown-search-link{display:none;}
.user-avatar img{margin-right:3px;width:50px;height:50px;border-radius:50%;box-shadow:0 0 1px rgba(255,255,255,.8);}
.dropdown-menu:not(.notfi-dropdown):not([role=combobox]){
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    box-shadow: 0 12px 28px 0 rgba(0, 0, 0, 0.20), 0 2px 4px 0 rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
    padding:8px 0;
    transform: scale3d(.8,.8,1);
    transform-origin: right top;
    display: block;
    opacity: 0;
    visibility: hidden;
    border: 0;
}
.dropdown-menu {
    float: left;
}
.sixteen-font-size svg {
    width: 22px;
    height: 22px;
    margin: -1px 0;
    vertical-align:middle;
}
.hide_fill_svg {
    display: none;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    min-width: 180px;
    padding: 5px 0;
    font-size: 13px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
.dropdown-menu {
    margin-top: 0;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.dropdown-menu.ani-acc-menu {
    min-width: 250px;
}

.wow_hdr_menu_usr_lnk {
    display: flex !important;
    align-items: center;
    justify-content: space-between;
}
.dropdown-menu>li>a {
    display: block;
    padding: 5px 10px;
    clear: both;
    font-weight: 400;
    font-size: 14.5px;
    color: #555;
    text-shadow: none;
}
.dropdown-menu>li>a {
    line-height: 1.42857143;
    white-space: nowrap;
}
.dropdown-menu:not(.notfi-dropdown) > li > a {
    padding: 5px 15px;
    line-height: 30px;
}
.dropdown-menu.ani-acc-menu .wo_user_name {
    margin: 0 8px 8px;
    background-color: rgb(0 0 0 / 4%);
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    overflow: hidden;
}
.navbar-default .open>.dropdown-menu.ani-acc-menu {
    top: 4px;
}
.open>.dropdown-menu.ani-acc-menu li a{
	transition:none!important;
	text-transform:initial;
}
.open>.dropdown-menu.ani-acc-menu li a::before{
	display:none!important;
}
.open>.dropdown-menu:not(.notfi-dropdown):not([role=combobox]) {
    transition: opacity 150ms cubic-bezier(0.4, 0.0, 0.2, 1) 0ms,transform 150ms cubic-bezier(0.4, 0.0, 0.2, 1) 0ms;
    transform: none;
    opacity: 1;
    visibility: visible;
}
.wow_hdr_menu_usr_lnk b {
    max-width: 140px;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #050505;
}
.wow_hdr_menu_usr_lnk img {
    width: 27px;
    min-width: 27px;
    height: 27px;
    border-radius: 50%;
}
.dropdown-menu.ani-acc-menu .wo_user_name > a:not(.wow_hdr_menu_usr_lnk) {
    padding: 4px 15px;
    font-size: 14px;
    line-height: 30px;
}
.dropdown-menu li a svg {
    height: 18px;
    width: 18px;
    vertical-align: middle;
    margin: -3px 15px 0 2px;
}
.dropdown-menu.ani-acc-menu >li>a:hover {
    color:var(--boton-color);
    background-color:var(--boton-fondo);
}
.clearfix:after, .clearfix:before{
	display:table;
	content:" ";
}
.clearfix:after{clear:both;}
.dropdown-menu .empty_state{display:block;margin:85px 0;font-family:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;font-size:15px;color:#6d6d6d;text-align:center;width:100%;word-wrap:break-word;text-transform:math-auto;}
.dropdown-menu .empty_state svg{display:block;margin:0 auto 15px;width:60px;height:60px;color:#ffffff;background-color:#607D8B;border-radius:50%;padding:14px;opacity:0.7;}
.dropdown-menu .empty_state.single svg{background:transparent;padding:0;opacity:1;width:70px;height:70px;margin:0 auto 20px;border-radius:0;}
.dropdown-menu .empty_state svg path{fill:revert-layer;}
.notifications-dropdown .turn-off-sound svg{
    margin-top: -2px;
}
.open>.dropdown-menu {
    display: block;
}
.notifications-dropdown {
    width: 390px;
    overflow: auto;
    max-height: 550px;
    padding: 0 !important;
}
svg.feather {
    vertical-align: middle;
    margin-top: -4px;
    width: 19px;
    height: 19px;
}
.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-left-radius:0;border-top-right-radius:0;}
.notification-list{padding:10px;}
.messages-list{cursor:pointer;}
.notification-list .notification-user-avatar img{border-radius:50%;margin-right:10px;width:56px;height:56px;margin-left:0;vertical-align:middle;}
.messages-list .notification-user-avatar img{margin-right:10px;margin-left:0;width:56px;height:56px;}
.notification-list .notification-text{font-size:14.5px;color:#666;}
.notification-list .notification-time div{font-size:12px!important;color:#666;margin:4px 0 0;}
.messages-list .notification-time div{color:#777!important;margin:5px 0 0;}
.notification-list .notification-text{font-size:14.5px;color:#666;text-transform:none;}
.notification-list span.main-color{color:#050505!important;font-size:14.5px;font-weight:600;}
.notification-list:hover{background:#f7f7f7;}
.messages-list span.main-color{color:#272727!important;}
.header-message{font-size:14px;color:#8c8c8c;padding:3px 0 2px;}
.header-message{text-overflow:ellipsis;overflow:hidden;width:260px;height:24px;white-space:nowrap;}
.dropdown-menu .divider{height:1px;overflow:hidden;background-color:#ededed;}
.show-message-link-container a{font-size:14.5px;padding:6px;text-align:center;background:#f9f9f9;color:#666;display:block;}
.show-message-link-container a:hover{text-decoration:underline;color:#666;}
@media (max-width: 1050px){
.dropdown.open .dropdown-menu {
    position: fixed;
    width: 100%;
    left: 60px;
    top: 0;
    bottom: 0;
    right: 0;
}
}
@media (min-width: 768px){
.dropdown-menu {
    right: 0;
    left: auto;
}
.navbar-right .dropdown-menu {
    right: 0;
    left: auto;
}
.navbar-right .dropdown-menu.notifications-dropdown {
    left: auto;
    overflow-x: hidden;
}
}
.nav .logo a.current::before{background:transparent!important;}
</style>
<nav class="nav <?php if($_GET['link1']=='home'){}else{echo('active luis_slid_open_box');} ?>">
	<div class="container">
		<h1 class="logo"><a class="<?=($wo['page'] == 'home') ? 'current': '';?>" data="home" href="<?=$wo['config']['site_url'];?>" data-ajax="?index.php?link1=home"><img src="<?=$wo['config']['theme_url'];?>/img/logo.<?=$wo['config']['logo_extension'];?>" width="50" height="50" alt="<?=$wo['config']['siteName'];?> Logo" id="logo" data-height-percentage="64"></a></h1>
		<div style="display:flex;">
		<ul class="luis_menu_mobil_container">
			<li><a class="<?=($wo['page'] == 'home') ? 'current': '';?>" data="home" href="<?=$wo['config']['site_url']; ?>" data-ajax="?index.php?link1=home">Inicio</a></li>
			<li><a class="<?=($wo['page'] == 'servicios') ? 'current': '';?>" data="servicios" href="<?=lui_SeoLink('index.php?link1=servicios');?>" data-ajax="?link1=servicios">Servicios</a></li>
			<li><a class="<?=($wo['page'] == 'blog') ? 'current': '';?>" data="blog" href="<?=lui_SeoLink('index.php?link1=blogs');?>" data-ajax="?link1=blogs">Blog</a></li>
			<li><a class="<?php echo($wo['page'] == 'carta') ? 'current': 'hh';?>" data="carta" href="<?=lui_SeoLink('index.php?link1=carta');?>" data-ajax="?link1=carta">Carta</a></li>
			
			
		</ul>
		<ul>
			<?php
	        if ($wo['loggedin'] == true) {
	        	echo lui_LoadPage('header/loggedin-header');
	        } else {
	        	echo lui_LoadPage('header/main-header');
	        }
	        ?>
		</ul>
		<div class="luis_menu_mobil">
			<svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" fill="currentColor" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
			<div class="menu_mobil_line"><svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 384 512"><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg></div>
		</div>
		</div>
		
	</div>
	<div class="luis_menu_six"></div>
</nav>
<script type="text/javascript">
function Wo_ChangeHomeButtonIcon() {
  $('.navbar-home #home-button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
}
function smokeTheHash(str) {
  var n = str.search("#");
  if(n != "-1"){
    return true;
  } else {
    return false;
  }
}
</script>
