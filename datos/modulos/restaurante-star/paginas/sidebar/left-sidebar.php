<style type="text/css">
.wow_content{border-radius:max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;padding:15px 15px 1px;width:100%;word-wrap:break-word;}
.wow_sett_sidebar{padding:0;}
.list-unstyled{padding-left: 0;list-style:none;}
.wow_sett_sidebar > ul{margin:0;padding:10px 0;}
.wow_sett_sidebar > ul > li > a{padding:0;display:block;font-size:15px;padding:13px 22px;min-width:88px;text-decoration:none;transition:background-color .4s cubic-bezier(.25,.8,.25,1);letter-spacing:.01em;color:rgba(0,0,0,0.65);font-family:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;}
.wow_sett_sidebar > ul hr{border-color:#e8e8e8;border-top:1px solid #f4f4f4;margin:5px 0 !important;}
.wow_sett_sidebar > ul > li > a span{position:relative;height:32px;width:32px;margin:auto 13px auto 0;display:inline-flex;align-items:center;justify-content:center;vertical-align:middle;word-wrap:break-word;}
.wow_sett_sidebar > ul > li > a span:before{content:'';position:absolute;top:0;right:0;bottom:0;left:0;opacity:0.1;border-radius:50%;}
.wow_sett_sidebar > ul > li > a span svg, .wow_sett_sidebar > ul > li > a span img{position:relative;height:24px;width:24px;padding:0;border-radius:0;margin:auto;background:transparent;vertical-align:middle;}
.wow_sett_sidebar > ul > li > a:hover, .wow_sett_sidebar .wow_sett_submenu > ul li a:hover{background-color:rgba(158,158,158,0.05);}
.wow_sett_sidebar > ul > li.active > a{color:currentColor;font-weight:bold;background-color:rgb(0 0 0 / 4%);box-shadow:inset -3px 0px currentColor;}
.wow_sett_sidebar > ul > .tiendas.active{border:0.5rem solid #99cbff;}
.wow_sett_sidebar > ul > li.myblogs.active > a{color:#1abc9c;box-shadow:inset -3px 0px #1abc9c;}
.wow_sett_sidebar > ul > li.myproducts.active > a{color:#1da1f2;box-shadow:inset -3px 0px #1da1f2;}
.wow_sett_sidebar > ul > li.mypurchased.active > a {color:#0984e3;box-shadow: inset -3px 0px #0984e3;}
.wow_sett_sidebar > ul > li.myqr_tienda.active > a {color:#9b59b6;box-shadow: inset -3px 0px #9b59b6;}
.wow_sett_sidebar > ul > li.imventarios.active > a {color:#2ecc71;box-shadow: inset -3px 0px #2ecc71;}
.wow_sett_sidebar > ul > li.active > a svg{fill:currentColor;}
.des_set_act_menu{display:none!important;}
.desl_dider_d_menu{width:100%!important;}
@media (min-width: 992px){
  .Wo_new_sett_sidee{padding-left:15px;width:30%;}
}
</style>
<?php
$user_id            = $wo['user']['user_id'];
$wo['is_admin']     = lui_IsAdmin();
$wo['is_moderoter'] = lui_IsModerator();

$wo['layshane']['admin'] = false;
if (isset($_GET['user']) && !empty($_GET['user']) && ($wo['is_admin'] === true || $wo['is_moderoter'] === true)) {
    if (lui_UserExists($_GET['user']) === false) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
    $user_id                = lui_UserIdFromUsername($_GET['user']);
    $wo['layshane']['admin'] = true;
}
$wo['layshane'] = lui_UserData($user_id);
if ($wo['is_moderoter']) {
  if ($wo['layshane']['admin'] == 1) {
       header("Location: " . $wo['config']['site_url']);
       exit();
  }
}

$wo['paginas_sidebar'] = '';
$pages_array = array(
	'tiendas',
  'my-blogs',
  'my-products',
  'purchased',
  'qrtienda',
  'imventario',
  'imv_productos',
  'imv_ingredientes',
  'new-product',
  'edit-product'
);
if (!empty($_GET['link1'])) {
   if (in_array($_GET['link1'], $pages_array)) {
      $wo['paginas_sidebar'] = $_GET['link1'];
   }
}
$wo['sucursales'] = lui_GetSucursalesTypes('');
?>
<div class="columna-4 Wo_new_sett_sidee sidebar left-sidebar leftcol sidebar_layshane_configuration_menu">
	<div class="wow_content wow_sett_sidebar">
		<?php if ($wo['loggedin'] == true && $wo['page'] != 'maintenance'):?>
			<ul class="list-unstyled">
				<?php if ($wo['loggedin'] == true): ?>
					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
						<style>
							.tienda_activo_layshane_peru{container-type:inline-size;border:0.5rem solid #aecdec;border-radius:1rem;color:hsl(0 0% 10%);background:none;display:flex;place-content:center;gap:0.5rem;outline:none;transition:all 0.1s;margin-top:10px;user-select:none;text-align:center;padding:10px;cursor:pointer;}
							.tienda_activo_layshane_peru span{display:flex;align-items:center;justify-content:center;}
							.tienda_activo_layshane_peru svg{width:45px;height:45px;padding:4px;fill:#54aef1;}
							.detalles_tiendas_layshane{display:block;width:100%;padding:5px;margin-bottom:5px;color:currentColor;}
							.detalles_tiendas_layshane h3{color:#2097ef;}
						</style>
						<?php if($wo['layshane']['sucursal']==null): ?>
							<a class="tiendas tienda_activo_layshane_peru <?php echo ($wo['paginas_sidebar'] == 'tiendas') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=tiendas'); ?>" data-ajax="?link1=tiendas">
								<div class="detalles_tiendas_layshane">
									<h3><span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg></span></h3>
									<p>Selecciona una tienda</p>
								</div>
							</a>
						<?php else: ?>
							<?php $sucursal = $db->where('id', $wo['layshane']['sucursal'])->getOne('lui_sucursales'); ?>
							<a class="tiendas tienda_activo_layshane_peru <?php echo ($wo['paginas_sidebar'] == 'tiendas') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=tiendas'); ?>" data-ajax="?link1=tiendas">
								<span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg></span>
								<div class="detalles_tiendas_layshane">
									<?php if (isset($sucursal)): ?>
										<h3><?=$sucursal->nombre;?></h3>
										<p><?=$sucursal->direccion;?></p>
									<?php else: ?>
										<p>Selecciona otra tienda.</p>
									<?php endif ?>
								</div>
							</a>
						<?php endif ?>
					<?php endif ?>
					<br>

					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
					<li class="myblogs <?php echo ($wo['paginas_sidebar'] == 'my-blogs') ? 'active': '';?>">
						<a href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs">
							<span style="color:#1abc9c;">
								<svg viewBox="0 0 24 24" fill="currentColor">
									<path d="M12.5518 8C11.9995 8 11.5518 8.44772 11.5518 9C11.5518 9.55228 11.9995 10 12.5518 10H16.5518C17.104 10 17.5518 9.55228 17.5518 9C17.5518 8.44772 17.104 8 16.5518 8H12.5518Z" fill="currentColor" fill-opacity="0.5"/>
									<path d="M12.5518 17C11.9995 17 11.5518 17.4477 11.5518 18C11.5518 18.5523 11.9995 19 12.5518 19H16.5518C17.104 19 17.5518 18.5523 17.5518 18C17.5518 17.4477 17.104 17 16.5518 17H12.5518Z" fill="currentColor" fill-opacity="0.5"/>
									<path d="M12.5518 5C11.9995 5 11.5518 5.44772 11.5518 6C11.5518 6.55228 11.9995 7 12.5518 7H20.5518C21.104 7 21.5518 6.55228 21.5518 6C21.5518 5.44772 21.104 5 20.5518 5H12.5518Z" fill="currentColor" fill-opacity="0.8"/>
									<path d="M12.5518 14C11.9995 14 11.5518 14.4477 11.5518 15C11.5518 15.5523 11.9995 16 12.5518 16H20.5518C21.104 16 21.5518 15.5523 21.5518 15C21.5518 14.4477 21.104 14 20.5518 14H12.5518Z" fill="currentColor" fill-opacity="0.8"/>
									<path d="M3.44824 4.00208C2.89596 4.00208 2.44824 4.44979 2.44824 5.00208V10.0021C2.44824 10.5544 2.89596 11.0021 3.44824 11.0021H8.44824C9.00053 11.0021 9.44824 10.5544 9.44824 10.0021V5.00208C9.44824 4.44979 9.00053 4.00208 8.44824 4.00208H3.44824Z" fill="currentColor"/>
									<path d="M3.44824 12.9979C2.89596 12.9979 2.44824 13.4456 2.44824 13.9979V18.9979C2.44824 19.5502 2.89596 19.9979 3.44824 19.9979H8.44824C9.00053 19.9979 9.44824 19.5502 9.44824 18.9979V13.9979C9.44824 13.4456 9.00053 12.9979 8.44824 12.9979H3.44824Z" fill="currentColor"/>
								</svg>
							</span>
							<?php echo $wo['lang']['my_articles'] ?>
						</a>
					</li>
					<?php endif ?>

					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
						<?php if($wo['layshane']['sucursal']): ?>
						<li class="myproducts <?php echo ($wo['paginas_sidebar'] == 'my-products' or $wo['paginas_sidebar'] == 'new-product' or $wo['paginas_sidebar'] == 'edit-product') ? 'active': '';?>"  >
							<a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products">
								<span style="color:#1da1f2;">
									<svg viewBox="0 0 1024 1024" fill="currentColor"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"  /></svg>
								</span>
								<?php echo $wo['lang']['my_products'] ?>
							</a>
						</li>
						<?php endif ?>
					<?php endif ?>


					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
				 	<li class="imventarios <?php echo ($wo['paginas_sidebar'] == 'imventario' or $wo['paginas_sidebar'] == 'imv_productos' or $wo['paginas_sidebar'] == 'imv_ingredientes') ? 'active': '';?>">
						<a href="<?=lui_SeoLink('index.php?link1=imventario');?>" data-ajax="?link1=imventario">
							<span style="color:#2ecc71;">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M192 64v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H224c-17.7 0-32 14.3-32 32zM82.7 207c-15.3 8.8-20.5 28.4-11.7 43.7l32 55.4c8.8 15.3 28.4 20.5 43.7 11.7l55.4-32c15.3-8.8 20.5-28.4 11.7-43.7l-32-55.4c-8.8-15.3-28.4-20.5-43.7-11.7L82.7 207zM288 192c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H288zm64 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H352zM160 384v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zM32 352c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H32z"/></svg>
							</span>
							Imventario
						</a>
					</li>
					<?php endif ?>

					<li class="mypurchased <?php echo ($wo['paginas_sidebar'] == 'purchased') ? 'active': '';?>">
						<a href="<?=lui_SeoLink('index.php?link1=purchased');?>" data-ajax="?link1=purchased">
							<span style="color:#0984e3;">
								<svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" /></svg>
							</span>
							<?=$wo['lang']['mis_compras'];?>
						</a>
					</li>
				 	<li class="myqr_tienda <?php echo ($wo['paginas_sidebar'] == 'qrtienda') ? 'active': '';?>">
						<a href="<?=lui_SeoLink('index.php?link1=qrtienda');?>" data-ajax="?link1=qrtienda">
							<span style="color:#9b59b6;">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/></svg>
							</span>
							QR carta
						</a>
					</li>
				<?php endif ?>
				<hr>
			</ul>
			
			<div class="chat_usuarios_contenedor">
				<?php
					if($wo['loggedin'] == true && $wo['page'] != 'maintenance') {
						if($wo['config']['chatSystem'] == 1 && $wo['page'] != 'get_news_feed' && $wo['page'] != 'sharer' && $wo['page'] != 'video-api' && $wo['page'] != 'messages'){
							$OnlineUsers = lui_GetChatUsers('online');
							$Offlineusers = lui_GetChatUsers('offline');
							if(empty($Offlineusers) && empty($OnlineUsers)) { ?>
								<!--no hay chats-->
							<?php } else { ?>
								<div class="online-users">
									<?php
										if (count($OnlineUsers) == 0) {
											echo '';
										}else{
											foreach ($OnlineUsers as $wo['chatList']) {
													echo lui_LoadPage('chat/online-user');
											}
										}
									?>
								</div>
								<div class="offline-users">
									<?php
										if (count($Offlineusers) == 0) {
											echo '';
										} else {
											foreach ($Offlineusers as $wo['chatList']) {
													echo lui_LoadPage('chat/offline-user');
											}
										}
									?>
								</div>
							<?php } 
						}
					}
				?>
			</div>
		<?php endif ?>
	</div>
</div>
<script type="text/javascript">
function recpoll() {
	current_width = $(window).width();
	if (current_width < 992) {
		var elementoConClase = document.querySelector('.main_layshane_configuration_menu.des_set_act_menu');
		if (elementoConClase) {
			$('.sidebar_layshane_configuration_menu').removeClass('des_set_act_menu')
		}else{
			$('.sidebar_layshane_configuration_menu').addClass('des_set_act_menu')
		}
		
		$('.button_controle_layshane_back_settign').removeClass('des_set_act_menu');
		$('.main_layshane_configuration_menu').addClass('desl_dider_d_menu');
	}else{
		$('.main_layshane_configuration_menu').removeClass('des_set_act_menu');
		$('.main_layshane_configuration_menu').removeClass('desl_dider_d_menu');
		$('.sidebar_layshane_configuration_menu').removeClass('des_set_act_menu');
		$('.button_controle_layshane_back_settign').addClass('des_set_act_menu');
	}
};

$(window).resize(recpoll);

$(window.document).on('click', '.seleccionar_menu_laysh', function(){
	$('.main_layshane_configuration_menu').addClass('des_set_act_menu');
	$('.sidebar_layshane_configuration_menu').removeClass('des_set_act_menu')
})

</script>
<?php if ($wo['config']['order_posts_by'] == 0) { ?>
<script>
function Wo_StorePosts(type) {
  if (type > 1) {
     return false;
  }
  if (type == 0) {
	$('.order_all').addClass('active');
	$('.order_people').removeClass('active');
  } else {
	$('.order_all').removeClass('active');
	$('.order_people').addClass('active');
  }
  $('#posts-laoded').html('<div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div><div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div>');
  $.get(Wo_Ajax_Requests_File() + '?f=update_order_by', {type:type}, function (data) {
    if (data.status == 200) {
      loadposts();
    }
  });
}
</script>
<?php } ?>