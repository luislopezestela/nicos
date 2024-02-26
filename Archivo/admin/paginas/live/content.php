<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuraciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Transmision en vivo</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
        <div class="alert alert-warning">Nota: Algunas funciones estan deshabilitadas debido al modo de sitio web que utilizo.</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar</h6>
                    <form class="email-settings" method="POST">
                        <div class="float-left">
                            <label for="live_video" class="main-label">Transmicion en vivo</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="live_request" id="live_request-admin" onchange="SelectProModel('can_use_live',this)" value="admin" <?php echo ($wo['config']['live_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="live_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label>
											</div>
											<div class="round_check">
												<input type="radio" name="live_request" id="live_request-all" onchange="SelectProModel('can_use_live',this)" value="all" <?php echo ($wo['config']['live_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="live_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label>
											</div>
											<div class="round_check">
												<input type="radio" name="live_request" id="live_request-verified" onchange="SelectProModel('can_use_live',this)" value="verified" <?php echo ($wo['config']['live_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="live_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label>
											</div>
											<div class="round_check">
												<input type="radio" name="live_request" id="live_request-pro" onchange="SelectProModel('can_use_live',this)" value="pro" <?php echo ($wo['config']['live_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="live_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label>
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Los usuarios pueden ir a vivir al instante.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="live_video" value="0" />
                            <input type="checkbox" name="live_video" id="chck-live_video" value="1" <?php echo ($wo['config']['live_video'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('live_video')) ?>>
                            <label for="chck-live_video" class="check-trail <?php echo(EnableForMode('live_video',true)) ?>" <?php echo(EnableForMode('live_video',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="live_video_save" class="main-label">Almacenamiento de transmision en vivo</label>
                            <br><small class="admin-info">Deje que la transmision en vivo guarde las transmisiones para volver a verlas mas tarde.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="live_video_save" value="0" />
                            <input type="checkbox" name="live_video_save" id="chck-live_video_save" value="1" <?php echo ($wo['config']['live_video_save'] == 1) ? 'checked': '';?>>
                            <label for="chck-live_video_save" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de la API de Millicast</h6>
                    <form class="millicast-settings" method="POST">
                        <div class="alert alert-info">
                            Para comenzar a usar esta función, deberá crear una cuenta en <a href="https://www.millicast.com/">MilliCast</a>.
                        </div>
                        <div class="float-left">
                            <label for="millicast_live_video" class="main-label">Transmisión en vivo de Millicast</label>
                            <br><small class="admin-info">Los usuarios pueden transmitir en vivo al instante usando Millicast. <br> Tenga en cuenta que solo puede elegir un proveedor al mismo tiempo.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="millicast_live_video" value="0" />
                            <input type="checkbox" name="millicast_live_video" id="chck-millicast_live_video" value="1" <?php echo ($wo['config']['millicast_live_video'] == 1) ? 'checked': '';?>>
                            <label for="chck-millicast_live_video" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Token Publico</label>
                                <input type="text" id="live_token" name="live_token" class="form-control" value="<?php echo $wo['config']['live_token'];?>">
                                <small class="admin-info">Tu token publico de Millicast.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID de cuenta</label>
                                <input type="text" id="live_account_id" name="live_account_id" class="form-control" value="<?php echo $wo['config']['live_account_id'];?>">
                                <small class="admin-info">Tu id de cuenta Millicast.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6" style="float: right;">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion Agora API </h6>
                    <form class="agora-settings" method="POST">
                        <div class="alert-info alert">Para comenzar a usar esta funcion, debera crear una cuenta en <a href="https://www.agora.io/en/">Agora</a>.</div>
                        <div class="float-left">
                            <label for="agora_live_video" class="main-label">Transmision en vivo de Agora</label>
                            <br><small class="admin-info">Los usuarios pueden salir en vivo al instante usando Agora. <br> Tenga en cuenta que solo puede elegir un proveedor al mismo tiempo.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="agora_live_video" value="0" />
                            <input type="checkbox" name="agora_live_video" id="chck-agora_live_video" value="1" <?php echo ($wo['config']['agora_live_video'] == 1) ? 'checked': '';?>>
                            <label for="chck-agora_live_video" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID de aplicacion</label>
                                <input type="text" id="agora_app_id" name="agora_app_id" class="form-control" value="<?php echo $wo['config']['agora_app_id'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Certificado de aplicacion</label>
                                <input type="text" id="agora_app_certificate" name="agora_app_certificate" class="form-control" value="<?php echo $wo['config']['agora_app_certificate'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID Cliente</label>
                                <input type="text" id="agora_customer_id" name="agora_customer_id" class="form-control" value="<?php echo $wo['config']['agora_customer_id'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Cliente Secret</label>
                                <input type="text" id="agora_customer_certificate" name="agora_customer_certificate" class="form-control" value="<?php echo $wo['config']['agora_customer_certificate'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="float-left">
                            <label for="amazone_s3_2" class="main-label">Almacenamiento de transmision en vivo de Amazon S3</label>
                            <br><small class="admin-info">Se utiliza para almacenar secuencias de video si "Almacenamiento de transmisión en vivo" esta habilitado.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="amazone_s3_2" value="0" />
                            <input type="checkbox" name="amazone_s3_2" id="chck-amazone_s3_2" value="1" <?php echo ($wo['config']['amazone_s3_2'] == 1) ? 'checked': '';?>>
                            <label for="chck-amazone_s3_2" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Amazon Bucket Nombre</label>
                                <input type="text" id="bucket_name_2" name="bucket_name_2" class="form-control" value="<?php echo $wo['config']['bucket_name_2']?>">
                                <small class="admin-info">Tu S3 Amazon <a href="https://docs.aws.amazon.com/AmazonS3/latest/userguide/creating-bucket.html" target="_blank">Nombre Bucket</a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Amazon S3 Key</label>
                                <input type="text" id="amazone_s3_key_2" name="amazone_s3_key_2" class="form-control" value="<?php echo $wo['config']['amazone_s3_key_2']?>">
                                <small class="admin-info">Tu Amazon Key de <a href="https://docs.aws.amazon.com/general/latest/gr/aws-sec-cred-types.html" target="_blank">AWS credentials</a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Amazon S3 Secret Key</label>
                                <input type="text" id="amazone_s3_s_key_2" name="amazone_s3_s_key_2" class="form-control" value="<?php echo $wo['config']['amazone_s3_s_key_2']?>">
                                <small class="admin-info">Tu Amazon Secret de <a href="https://docs.aws.amazon.com/general/latest/gr/aws-sec-cred-types.html" target="_blank">AWS credentials</a></small>
                            </div>
                        </div>
                        <label for="region_2">Amazon S3 bucket Region</label>
                        <select class="form-control show-tick" id="region_2" name="region_2">
                          <option value="us-east-1" <?php echo ($wo['config']['region_2'] == 'us-east-1')   ? ' selected' : '';?> >US East (N. Virginia)</option>
                          <option value="us-east-2" <?php echo ($wo['config']['region_2'] == 'us-east-2')   ? ' selected' : '';?> >US East (Ohio)</option>
                          <option value="us-west-1" <?php echo ($wo['config']['region_2'] == 'us-west-1')   ? ' selected' : '';?> >US West (N. California)</option>
                          <option value="us-west-2" <?php echo ($wo['config']['region_2'] == 'us-west-2')   ? ' selected' : '';?> >US West (Oregon)</option>
                          <option value="ap-northeast-2" <?php echo ($wo['config']['region_2'] == 'ap-northeast-2')   ? ' selected' : '';?> >Asia Pacific (Seoul)</option>
                          <option value="ap-south-1" <?php echo ($wo['config']['region_2'] == 'ap-south-1')   ? ' selected' : '';?> >Asia Pacific (Mumbai)</option>
                          <option value="ap-southeast-1" <?php echo ($wo['config']['region_2'] == 'ap-southeast-1')   ? ' selected' : '';?> >Asia Pacific (Singapore)</option>
                          <option value="ap-southeast-2" <?php echo ($wo['config']['region_2'] == 'ap-southeast-2')   ? ' selected' : '';?> >Asia Pacific (Sydney)</option>
                          <option value="ap-northeast-1" <?php echo ($wo['config']['region_2'] == 'ap-northeast-1')   ? ' selected' : '';?> >Asia Pacific (Tokyo)</option>
                          <option value="ca-central-1" <?php echo ($wo['config']['region_2'] == 'ca-central-1')   ? ' selected' : '';?> >Canada (Central)</option>
                          <option value="eu-central-1" <?php echo ($wo['config']['region_2'] == 'eu-central-1')   ? ' selected' : '';?> >EU (Frankfurt)</option>
                          <option value="eu-west-1" <?php echo ($wo['config']['region_2'] == 'eu-west-1')   ? ' selected' : '';?> >EU (Ireland)</option>
                          <option value="eu-west-2" <?php echo ($wo['config']['region_2'] == 'eu-west-2')   ? ' selected' : '';?> >EU (London)</option>
                          <option value="sa-east-1" <?php echo ($wo['config']['region_2'] == 'sa-east-1')   ? ' selected' : '';?> >South America (São Paulo)</option>
                        </select>
                        <small class="admin-info">Tu Amazon's S3 Region</small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="alert alert-info">
                           Antes de habilitar Amazon S3, asegurese de cargar toda la carpeta "upload/" en su depósito. <br><br>
                            Antes de deshabilitar Amazon S3, asegúrese de descargar toda la carpeta "upload/" en su servidor.<br><br>
                            Recomendamos cargar la carpeta y los archivos a traves de <a href="http://s3tools.org/s3cmd">S3cmd</a>.<br><br>
                            Si su sitio aun es nuevo, puede evitar el paso de carga, pero asegúrese de hacer clic en "Probar conexion".<br>
                        </div>
                        <div class="agora-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="button" class="btn btn-warning m-t-15" onclick="Wo_TestS3()">Probar coneccion del servidor</button>
                        <hr>
                        <small class="admin-info">¿Esta buscando la configuración de videollamadas? <a href="<?php echo lui_LoadAdminLinkSettings('video-settings'); ?>">Click aqui</a>.</small>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

function Wo_TestS3() {
    $('form.agora-settings').find('.btn-warning').text('Please wait..');
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_s3_2'}, function (data) {
        if (data.status == 200) {
            $('.agora-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> ¡Conexion establecida!</div>');
            setTimeout(function () {
                $('.agora-settings-alert').empty();
            }, 2000);
        } else if (data.status == 300) {
            $('.agora-settings-alert').html('<div class="alert alert-danger">El cubo no existe</div>');
            setTimeout(function () {
                $('.agora-settings-alert').empty();
            }, 2000);
        } else if (data.status == 500) {
            $('.agora-settings-alert').html('<div class="alert alert-danger">Tu Cuenta S3 no tiene cubos, cree uno.</div>');
            setTimeout(function () {
                $('.agora-settings-alert').empty();
            }, 2000);
        } else if (data.status == 400) {
            $('.agora-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            setTimeout(function () {
                $('.agora-settings-alert').empty();
            }, 2000);
        } else  {
            $('.agora-settings-alert').html('<div class="alert alert-danger">Error al conectarse a amazone, verifique sus detalles</div>');
            setTimeout(function () {
                $('.agora-settings-alert').empty();
            }, 2000);
        }
        $('form.agora-settings').find('.btn-warning').text('Conexion de prueba');
    });
}

$(function() {
    $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            setToTrue = 1;
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        if (configName == 'redis') {
            setToTrue = 'N';
            if ($(this).is(":checked") === true) {
              setToTrue = 'Y';
            }
        }
        objData[configName] = setToTrue;
        objData['hash_id'] = hash_id;
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
    $('.round_check input[type=radio]').on('change', function() {
           clearTimeout(setTimeOutColor);
          var thisElement = $(this);
          var configName = thisElement.attr('name');
          var hash_id = $('input[name=hash_id]').val();
          var objData = {};
          objData[configName] = this.value;
          objData['hash_id'] = hash_id;
          thisElement.addClass('warning');
          $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
              if (data.status == 200) {
                  thisElement.removeClass('warning');
                  thisElement.addClass('success');
              } else {
                  thisElement.addClass('error');
              }
              var setTimeOutColor = setTimeout(function () {
                  thisElement.removeClass('success');
                  thisElement.removeClass('warning');
                  thisElement.removeClass('error');
              }, 2000);
          });
      });
    $('input[type=text], input[type=number]').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));
});
</script>
