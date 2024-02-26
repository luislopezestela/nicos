<?php if (lui_IsMobile() == false) { ?>
	<div class="left-sidebar">
		<?php if ($wo['loggedin'] == true && $wo['page'] != 'maintenance'):?>
			<ul class="categorias_de_tienda_pagina_principal">
				<?php if ($wo['loggedin'] == true): ?>
					<style>
						.billetera_layshane_sidebar{
							display:flex;
							background:#FAFAFA;
							flex-wrap:wrap;
							justify-content:center;
							border:1px dashed #9d9d9d;
							margin-bottom:5px;
						}
						.left-sidebar{background:#fff;min-height: calc(100vh - 165px);padding:5px 10px; }
						.billetera_layshane_sidebar svg{width:35px;height:35px;padding:4px;}
						.billetera_layshane_sidebar a{text-decoration:none;}
						.billetera_layshane_sidebar a span{
							display:block;width:100%;
						}
						.monto_bill_laysh{display:block;width:100%;padding:5px;margin-bottom:5px;}
					</style>
					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
						<div class="billetera_layshane_sidebar">
							<a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>" data-ajax="?link1=wallet">
									<span><svg viewBox="0 0 24 24"><path fill="currentColor" d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z" /></svg><?php echo $wo['lang']['wallet']; ?></span>

									<span class="monto_bill_laysh"><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?>
									<?php echo sprintf('%.2f',$wo['user']['wallet']);?></span>
								</a>
						</div>
					<?php endif ?>

					<span style="padding:5px;width:100;text-transform:uppercase;font-weight:100;user-select:none;"><?=$wo['lang']['opciones'];?></span>

					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
					<li>
						<a href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs">
							<svg viewBox="0 0 24 24" fill="currentColor">
								<path d="M12.5518 8C11.9995 8 11.5518 8.44772 11.5518 9C11.5518 9.55228 11.9995 10 12.5518 10H16.5518C17.104 10 17.5518 9.55228 17.5518 9C17.5518 8.44772 17.104 8 16.5518 8H12.5518Z" fill="#000000" fill-opacity="0.5"/>
								<path d="M12.5518 17C11.9995 17 11.5518 17.4477 11.5518 18C11.5518 18.5523 11.9995 19 12.5518 19H16.5518C17.104 19 17.5518 18.5523 17.5518 18C17.5518 17.4477 17.104 17 16.5518 17H12.5518Z" fill="#000000" fill-opacity="0.5"/>
								<path d="M12.5518 5C11.9995 5 11.5518 5.44772 11.5518 6C11.5518 6.55228 11.9995 7 12.5518 7H20.5518C21.104 7 21.5518 6.55228 21.5518 6C21.5518 5.44772 21.104 5 20.5518 5H12.5518Z" fill="#000000" fill-opacity="0.8"/>
								<path d="M12.5518 14C11.9995 14 11.5518 14.4477 11.5518 15C11.5518 15.5523 11.9995 16 12.5518 16H20.5518C21.104 16 21.5518 15.5523 21.5518 15C21.5518 14.4477 21.104 14 20.5518 14H12.5518Z" fill="#000000" fill-opacity="0.8"/>
								<path d="M3.44824 4.00208C2.89596 4.00208 2.44824 4.44979 2.44824 5.00208V10.0021C2.44824 10.5544 2.89596 11.0021 3.44824 11.0021H8.44824C9.00053 11.0021 9.44824 10.5544 9.44824 10.0021V5.00208C9.44824 4.44979 9.00053 4.00208 8.44824 4.00208H3.44824Z" fill="#000000"/>
								<path d="M3.44824 12.9979C2.89596 12.9979 2.44824 13.4456 2.44824 13.9979V18.9979C2.44824 19.5502 2.89596 19.9979 3.44824 19.9979H8.44824C9.00053 19.9979 9.44824 19.5502 9.44824 18.9979V13.9979C9.44824 13.4456 9.00053 12.9979 8.44824 12.9979H3.44824Z" fill="#000000"/>
							</svg>
							<?php echo $wo['lang']['my_articles'] ?>
						</a>
					</li>
					<?php endif ?>

					<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
					<li>
						<a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products">
							<svg viewBox="0 0 1024 1024"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"  /></svg>
							<?php echo $wo['lang']['my_products'] ?>
						</a>
					</li>
					<?php endif ?>
					<li>
						<a href="<?=lui_SeoLink('index.php?link1=saved-posts');?>" data-ajax="?link1=saved-posts">
							<svg viewBox="0 0 24 24"><path fill="currentColor" d="M17,3H7A2,2 0 0,0 5,5V21L12,18L19,21V5C19,3.89 18.1,3 17,3Z" /></svg>
							<?=$wo['lang']['saved_posts'];?>
						</a>
					</li>

				 	<li>
						<a href="<?=lui_SeoLink('index.php?link1=purchased');?>" data-ajax="?link1=purchased">
							<svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" /></svg>
							<?=$wo['lang']['mis_compras'];?>
						</a>
					</li>
				 	

					<li>
						<a href="<?php echo lui_SeoLink('index.php?link1=explore');?>" data-ajax="?link1=explore" title="<?php echo $wo['lang']['explore'];?>">
							<svg viewBox="0 0 24 24"><path fill="currentColor" d="M15.222 2.722a.751.751 0 0 0-.127.012L4.789 4.49A2.758 2.758 0 0 0 2.5 7.2v8.55a.75.75 0 1 0 1.5 0V7.2c0-.614.434-1.13 1.04-1.232l10.307-1.755a.75.75 0 0 0-.125-1.491Zm3 2.5a.751.751 0 0 0-.127.012L7.789 6.99A2.758 2.758 0 0 0 5.5 9.7v8.55a.75.75 0 1 0 1.5 0V9.7c0-.614.434-1.13 1.04-1.232l10.307-1.755a.75.75 0 0 0-.125-1.491Zm1.4 2.782a2.231 2.231 0 0 0-.254.028l-8.575 1.456A2.761 2.761 0 0 0 8.5 12.2v7.05c0 1.38 1.271 2.449 2.632 2.218l8.575-1.456A2.761 2.761 0 0 0 22 17.3v-7.05c0-1.294-1.117-2.314-2.378-2.246Zm.173 1.496a.733.733 0 0 1 .705.75v7.05c0 .613-.435 1.129-1.044 1.232l-8.575 1.457h-.001a.738.738 0 0 1-.88-.739V12.2c0-.613.435-1.129 1.044-1.232l8.575-1.457h.001a.823.823 0 0 1 .175-.011Z"></path></svg>
							<?=TextForMode('explore');?>
						</a>
					</li>
				<?php endif ?>

				<?php if ($wo['loggedin'] == true): ?>
					<?php if ($wo['config']['popular_posts'] == 1) { ?>
						<li>
							<a href="<?=$wo['config']['site_url']; ?>/most_liked" data-ajax="?link1=most_liked">
								<svg viewBox="0 0 24 24"><path fill="currentColor" d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z" /></svg>
								<?=TextForMode('trending');?>
							</a>
						</li>
					<?php } ?>
				<?php endif ?>
			</ul>
			<hr>
			<?php if($wo['loggedin'] && $wo['user']['admin'] == 1 || $wo['loggedin'] && $wo['user']['admin'] == 2): ?>
				<span style="padding:5px;width:100;text-transform:uppercase;font-weight:100;user-select:none;">
				<b>Usuarios</b>
				</span>
			<?php elseif($wo['loggedin'] && $wo['user']['admin'] == 0): ?>
				<span style="padding:5px;width:100;text-transform:uppercase;font-weight:100;user-select:none;">
					<b>Vendedores</b>
				</span>
			<?php endif ?>
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
<?php } ?>
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