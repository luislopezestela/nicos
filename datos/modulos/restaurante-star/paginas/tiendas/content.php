<?php if(lui_IsAdmin() || lui_IsModerator()){
}else{
	header('Location: ' . $wo['config']['site_url']);
	exit();
}
if ($wo['config']['can_use_market']){
}else{
	header('Location: ' . $wo['config']['site_url']);
	exit();
}
?>
<style type="text/css">
body{background-color:#F0F2FD;}
.contenido_tiendas_layshane {
    display: grid;
  width: min(75rem, 100%);
  margin-inline: auto;
  grid-template-columns: repeat(auto-fit, minmax(min(16rem, 100%), 1fr));
  gap: 2rem;
}
.tiendas_list{
	cursor:pointer;
	container-type: inline-size;
	aspect-ratio: 1/1;
	border: 0.5rem solid transparent;
	border-radius: 1rem;
  color:hsl(0 0% 10%);
  background: none;
  display: grid;
  place-content: center;
  gap:1rem;
  --shadow: -0.5rem -0.5rem 1rem hsl(0 0% 100% / 0.75),
    0.5rem 0.5rem 1rem hsl(0 0% 50% / 0.5);
  box-shadow: var(--shadow);
  outline: none;
  transition: all 0.3s;
  color:hsl(206, 80%, 50%, 0.6);
  &:hover,
  &:focus-visible {
    color: hsl(206 87% 53%);
    scale: 1.1;
  }
  &:active,
  &.active {
    box-shadow:var(--shadow), inset 0.5rem 0.5rem 1rem hsl(0 0% 50% / 0.5),
      inset -0.5rem -0.5rem 1rem hsl(0 0% 100% / 0.75);
    color: hsl(206 87% 53%);
    > svg {
    	margin-top:25px;
    	padding:8px;
    	width:100%;
      	height:28cqi;
    }
    > span {
      font-size:5cqi;
    }
  }

  > svg {
  	margin-top:8px;
  	padding:4px;
  	width:100%;
    height: 31cqi;
  }
  > span {
    font-family: system-ui, sans-serif;
    font-size:6cqi;
  }
  	> span > svg {
      	height:14cqi;
    }
}

</style>

<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>

<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
	</div>

	<br>
	<div class="wo_settings_page" style="background-color: #e5e9f4;">
		<div class="profile-lists singlecol">
			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg></span> Tiendas
					</div>
				</div>
			</div>
			<br><br>
			<div class="wo_my_pages">
				<div class="row" style="padding: 2rem;">
					<?php
					$layshanetiendas = lui_GetSucursalesTypes('');
						if (count($layshanetiendas) > 0) {
							if (lui_IsAdmin()) {
								echo "<div class='contenido_tiendas_layshane'>";
									foreach ($layshanetiendas as $wo['tiendas']) {
										echo lui_LoadPage('tiendas/tiendas_list');
									}
								echo "</div>";
							}else{
								$sucursal = $db->where('id', $wo['layshane']['sucursal'])->getOne('lui_sucursales');
								if($sucursal){
									echo "<div class='contenido_tiendas_layshane' style='width: min(15rem, 100%);'>";
										$wo['sucursal'] = $sucursal;
										echo lui_LoadPage('tiendas/tienda');
									echo "</div>";
								}else{
									echo '<h5 class="search-filter-center-text empty_state" style="color:#333;"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg> No perteneces a ninguna tienda.</h5><h5 class="empty_state" style="color:#777;">Contacta con el administrador para pertenecer a una tienda.</h5>';
								}								
							}
						} else {
							echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg> No hay tiendas activados</h5><h5 class="empty_state">Activa una tienda o contacta con el administrador</h5>';
						}
					?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<!-- .row -->
</div>

<script type="text/javascript">
	$(window.document).on('click', '.tiendas_list_layshane', function(){
		let layshane = $(this).attr('data');
		$.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=seleccionar_tienda&hash=' + $('.main_session').val(), {tienda: layshane}, function(data, textStatus, xhr) {location.reload();});
	})
	recpoll()
</script>