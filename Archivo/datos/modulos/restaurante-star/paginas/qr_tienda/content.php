<style type="text/css">
	body{background-color:#F0F2FD;}
	.center_bootn, #qrcode{display:flex;flex-wrap:wrap;justify-content:center;width:100%;}
	#qrcode{cursor:default!important;}
</style>
<script src="<?php echo $wo['config']['theme_url'];?>/javascript/qrcode.js?version=<?php echo $wo['config']['version']; ?>"></script>
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
	<div class="wo_settings_page">
		<div class="profile-lists singlecol">
			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/></svg></span>  Qr carta
					</div>
				</div>
			</div>
			<br><br>
			<div class="wo_my_pages">
				<div class="row" style="padding: 2rem;">
					<div id="qrcode" title="Carta"></div>
					<br>
					<hr>
					<br>
					<div class="center_bootn">
						<span class="Btn_dorado" onclick="descargarImagen()">Descargar</span>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	recpoll()
	new QRCode(document.getElementById("qrcode"), "<?php echo $wo['config']['site_url'].'/carta';?>");
	$('#qrcode').attr('title', "Carta");
	function descargarImagen() {
      var div = document.getElementById('qrcode');
      var imagen = div.querySelector('img');
      if (imagen) {
        var canvas = document.createElement('canvas');
        canvas.width = imagen.width;
        canvas.height = imagen.height;
        var contexto = canvas.getContext('2d');
        contexto.drawImage(imagen, 0, 0);
        var urlImagen = canvas.toDataURL('image/png');
        var enlaceDescarga = document.createElement('a');
        enlaceDescarga.href = urlImagen;
        enlaceDescarga.download = 'qr_tienda.png';
        enlaceDescarga.click();
      } else {
      }
    }
</script>