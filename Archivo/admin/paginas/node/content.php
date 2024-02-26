<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configuar NodeJs</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar NodeJs</h6>
					
                    <form class="email-settings" method="POST">
                        <div class="float-left">
                            <label for="node_socket_flow" class="main-label">NodeJS</label>
                            <br><small class="admin-info">Obtenga mensajes en tiempo real, notificaciones en tiempo real y reduzca la carga del servidor en un 80 % menos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="node_socket_flow" value="0" />
                            <input type="checkbox" name="node_socket_flow" id="chck-node_socket_flow" value="1" <?php echo ($wo['config']['node_socket_flow'] == 1) ? 'checked': '';?>>
                            <label for="chck-node_socket_flow" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="nodejs_ssl" class="main-label">Conexion NodeJs SSL</label>
                            <br><small class="admin-info">Habilite esta caracteristica si esta utilizando su sitio bajo SSL.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="nodejs_ssl" value="0" />
                            <input type="checkbox" name="nodejs_ssl" id="chck-nodejs_ssl" value="1" <?php echo ($wo['config']['nodejs_ssl'] == 1) ? 'checked': '';?>>
                            <label for="chck-nodejs_ssl" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="nodejs_live_notification" class="main-label">Barra de notificaciones en vivo</label>
                            <br><small class="admin-info">Habilite esta funcion y los usuarios recibiran notificaciones fijas en la parte inferior izquierda de la pantalla.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="nodejs_live_notification" value="0" />
                            <input type="checkbox" name="nodejs_live_notification" id="chck-nodejs_live_notification" value="1" <?php echo ($wo['config']['nodejs_live_notification'] == 1) ? 'checked': '';?>>
                            <label for="chck-nodejs_live_notification" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Puerto NodeJs HTTP</label>
                                <input type="number" id="nodejs_port" name="nodejs_port" class="form-control" value="<?php echo $wo['config']['nodejs_port']?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Puerto NodeJs HTTPS (SSL)</label>
                                <input type="number" id="nodejs_ssl_port" name="nodejs_ssl_port" class="form-control" value="<?php echo $wo['config']['nodejs_ssl_port']?>">
                            </div>
                        </div>
                       
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Ruta de clave de certificado SSL de NodeJs (.key)</label>
                                <input type="text" id="nodejs_key_path" name="nodejs_key_path" class="form-control" value="<?php echo $wo['config']['nodejs_key_path']?>">
                                <small class="admin-info">Solo se requiere si NodeJS SSL esta habilitado.</small>
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Ruta del certificado SSL de NodeJs (.crt)</label>
                                <input type="text" id="nodejs_cert_path" name="nodejs_cert_path" class="form-control" value="<?php echo $wo['config']['nodejs_cert_path']?>">
                                <small class="admin-info">Solo se requiere si NodeJS SSL esta habilitado.</small>
                            </div>
                        </div>
                        <div class="hidden">
                            <hr>

                         <div class="float-left">
                            <label for="redis" class="main-label">Servidor Redis</label>
                            <br><small class="admin-info">Habilite esta funcion para establecer una conexion de socket más rapida.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="redis" value="0" />
                            <input type="checkbox" name="redis" id="chck-redis" value="1" <?php echo ($wo['config']['redis'] == 'Y') ? 'checked': '';?>>
                            <label for="chck-redis" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Puerto Redis</label>
                                <input type="number" id="redis_port" name="redis_port" class="form-control" value="<?php echo $wo['config']['redis_port']?>">
                                <small class="admin-info">El puerto Redis del servidor no debe ser el mismo que el puerto nodejs.</small>
                            </div>
                        </div>
                            
                        </div>
                        
                        <div class="alert alert-info">Si deshabilita el sistema NodeJs, el sistema ajax predeterminado se habilitara para el sistema de chat y notificaciones.</div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
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