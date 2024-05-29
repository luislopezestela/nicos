<div class="container-fluid">
    <div>
        <h3>Actualizaciones y corrección de errores</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Actualizaciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Actualizaciones y corrección de errores</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Buscar nuevas actualizaciones</h6>
                    <div class="CheckForUpdates_alert"></div>
                    <div class="alert alert-warning">
                        El sistema de actualización automática está deshabilitado por ahora debido a varios temas. Si desea actualizar su sitio, puede actualizarlo manualmente siguiendo esto. <a href="https://docs.layshaneperu.com/actualizaciones">guía</a>
                    </div>
                	 <div class="alert alert-danger">
                		<b>Important:</b> <br><br>

                		<b>1.</b> Si ha editado el nombre del tema, este sistema no actualizará su sitio.<br><br>
                		<b>2.</b> Si está utilizando layshane_star, la carpeta del tema debe restablecerse a "layshane_star".<br><br>
                		<b>3.</b> Si está utilizando restaurante_star, la carpeta del tema debe restablecerse a "restaurante_star".
                	</div>
                    <div class="alert alert-success email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="purchase_code" name="purchase_code" class="purchase_code form-control">
                                <label class="form-label">Código de compra</label>
                            </div>
                        </div>
                        <span class="help-block">Tu código de compra de WoWonder, tu código de compra no se guardará por motivos de seguridad.</span>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <input type="hidden" value="<?php echo $wo['script_version']?>" id="script-version">
                        <button type="button" class="btn btn-primary m-t-15 waves-effect check-update-button" onclick="Wo_CheckForUpdates()">Buscar actualizaciones</button>
                    </form>
                </div> 
            </div>
        </div>
         <div class="col-lg-6 col-md-6">
            <div class="card updates-layout hidden">
                <div class="card-body">
                    <h6 class="card-title">¡Nueva actualización está disponible!</h6>
                    <div class="RunUpdates_alert"></div>
                    <div>Se instalarán las siguientes versiones:</div>
                    <div class="updates"></div>
                    <button class="btn btn-success waves-effect waves-light m-t-10 run-update" onclick="Wo_RunUpdates()">Instalar actualizaciones</button>
                    <button class="btn btn-success waves-effect waves-light m-t-10 download-update" onclick="Wo_DownloadUpdates()">Descargar actualizaciones</button>
                    <br><br>
                    <div>
                    	1. El botón "Instalar actualizaciones" descargará y actualizará automáticamente su sitio a las últimas versiones. <span class="help-block red" style="color: red">Nota: "Instalar actualizaciones" reemplazará y sobrescribirá todas las modificaciones de su código. Si desea conservar sus modificaciones, utilice el proceso manual (botón de descarga).<br>Asegúrese de crear una copia de seguridad antes de iniciar el proceso de actualización.</span><br>
                    </div>
                     <div>
                    	2. El botón "Descargar actualizaciones" descargará las últimas versiones y las guardará en el disco de su servidor; puede encontrarlas en la carpeta "/actualizaciones". Puede actualizar su sitio manualmente utilizando la guía incluida en la actualización.
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

function Wo_CheckForUpdates() {
	var purchase_code = $('.purchase_code').val();
	var script_version = $('#script-version').val();
	$('.check-update-button').text('Please wait..');
	$.get(Wo_Ajax_Requests_File(), {f: 'check_for_updates', purchase_code: purchase_code}, function (data) {
		if (data.status == 200) {
			$('.updates-layout').removeClass('hidden');
			$('.updates').html('<ul class="list-group"></ul>').find('ul').append('<li class="list-group-item hidden">Versiones</li>');;
			data.versions.forEach(function(entry) {
			    $('.updates').find('ul').append('<li class="list-group-item"> ' + entry + '</li>');
			});
			$('#script-version').val(data.script_version);
		} else if (data.status == 300) {
            $('.CheckForUpdates_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Su sitio está actualizado.</div>');
            setTimeout(function () {
                $('.CheckForUpdates_alert').empty();
            }, 2000);
		} else if (data.status == 400) {
            $('.CheckForUpdates_alert').html('<div class="alert alert-danger">'+data.ERROR_NAME+'</div>');
            setTimeout(function () {
                $('.CheckForUpdates_alert').empty();
            }, 2000);
		}  else  {
            $('.CheckForUpdates_alert').html('<div class="alert alert-danger">Error al conectarse al servidor, verifique sus datos</div>');
            setTimeout(function () {
                $('.CheckForUpdates_alert').empty();
            }, 2000);
		}
		$('.check-update-button').text('Buscar actualizaciones');
	});
}
function Wo_DownloadUpdates() {
	$('.download-update').text('Descargando, por favor espera...');
	var purchase_code = $('.purchase_code').val();
	$.get(Wo_Ajax_Requests_File(), {f: 'download_updates', purchase_code: purchase_code}, function (data) {
		if (data.status == 200) {
            $('.RunUpdates_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Se descargaron las actualizaciones.</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
			$('.updates-layout').addClass('hidden');
		} else if (data.status == 300) {
            $('.RunUpdates_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Su sitio está actualizado.</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
		} else if (data.status == 400) {
            $('.RunUpdates_alert').html('<div class="alert alert-danger">'+data.ERROR_NAME+'</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
		}  else  {
            $('.RunUpdates_alert').html('<div class="alert alert-danger">Error al conectarse al servidor, verifique sus datos</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
		}
		$('.download-update').text('Descargar actualizaciones');
	});
}

function Wo_RunUpdates() {
	$('.run-update').text('Actualizando, por favor espera...');
	var purchase_code = $('.purchase_code').val();
	var script_version = $('#script-version').val();
	$.get('<?php echo $wo['config']['site_url']?>/updater.php', {f: 'run_updater', purchase_code: purchase_code, script_version:script_version}, function (data) {
		if (data.status == 200) {
            $('.RunUpdates_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Su sitio fue actualizado, actualice su página y limpie el caché de su navegador.</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
			$('.updates-layout').addClass('hidden');
		} else if (data.status == 300) {
            $('.RunUpdates_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Su sitio está actualizado.</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
		} else if (data.status == 400) {
            $('.RunUpdates_alert').html('<div class="alert alert-danger">'+data.ERROR_NAME+'</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
		}  else  {
            $('.RunUpdates_alert').html('<div class="alert alert-danger">Error al conectarse al servidor, verifique sus datos</div>');
            setTimeout(function () {
                $('.RunUpdates_alert').empty();
            }, 2000);
		}
		$('.run-update').text('Instalar actualizaciones');
	});
}
</script>