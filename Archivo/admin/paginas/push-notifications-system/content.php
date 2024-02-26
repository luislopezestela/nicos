<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion de API</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configuracion de notificaciones automaticas</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de notificaciones automaticas</h6>
                    <div class="alert alert-info">Este sistema permite que su secuencia de comandos envie notificaciones automaticas a cualquier aplicacion que use nuestra API.<br> Para comenzar, <a href="https://onesignal.com/" target="_blank">Registrar aqui</a>.</div>
                    <div class="email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                      
                      <div class="float-left">
                          <label for="push" class="main-label">Sistema de notificaciones push</label>
                          <br><small class="admin-info">Habilite esta funcion y los usuarios recibiran una notificacion en su navegador/aplicacion mientras la aplicacion este cerrada.</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="push" value="0" />
                          <input type="checkbox" name="push" id="chck-push" value="1" <?php echo ($wo['config']['push'] == 1) ? 'checked': '';?>>
                          <label for="chck-push" class="check-trail"><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="android_push_messages" class="main-label">Mensajes de insercion de Android </label>
                          <br><small class="admin-info">Habilite esta funcion para dispositivos Android. (Solo mensajes de usuario push)</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="android_push_messages" value="0" />
                          <input type="checkbox" name="android_push_messages" id="chck-android_push_messages" value="1" <?php echo ($wo['config']['android_push_messages'] == 1) ? 'checked': '';?>>
                          <label for="chck-android_push_messages" class="check-trail"><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="ios_push_messages" class="main-label">Mensajes de insercion de IOS (mensajes de insercion de usuario)</label>
                          <br><small class="admin-info">Habilite esta funcion para dispositivos IOS. (Solo mensajes de usuario push)</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="ios_push_messages" value="0" />
                          <input type="checkbox" name="ios_push_messages" id="chck-ios_push_messages" value="1" <?php echo ($wo['config']['ios_push_messages'] == 1) ? 'checked': '';?>>
                          <label for="chck-ios_push_messages" class="check-trail"><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="android_push_native" class="main-label">Notificaciones automaticas de sitios nativos de Android</label>
                          <br><small class="admin-info">Habilite esta caracteristica para dispositivos Android. (Me gusta, seguir, pregunto, comentario, etc.)</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="android_push_native" value="0" />
                          <input type="checkbox" name="android_push_native" id="chck-android_push_native" value="1" <?php echo ($wo['config']['android_push_native'] == 1) ? 'checked': '';?>>
                          <label for="chck-android_push_native" class="check-trail"><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="ios_push_native" class="main-label">Notificaciones push de sitios nativos de IOS </label>
                          <br><small class="admin-info">Habilite esta función para dispositivos IOS (Me gusta, Seguir, Preguntado, Comentar, etc.)</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="ios_push_native" value="0" />
                          <input type="checkbox" name="ios_push_native" id="chck-ios_push_native" value="1" <?php echo ($wo['config']['ios_push_native'] == 1) ? 'checked': '';?>>
                          <label for="chck-ios_push_native" class="check-trail"><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="web_push" class="main-label">Notificaciones push web</label>
                          <br><small class="admin-info">El usuario recibira una notificacion en los navegadores web (Chrome, Firefox, etc.) Se requiere SSL</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="web_push" value="0" />
                          <input type="checkbox" name="web_push" id="chck-web_push" value="1" <?php echo ($wo['config']['web_push'] == 1) ? 'checked': '';?>>
                          <label for="chck-web_push" class="check-trail"><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>

                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
						<div><span class="help-block">¿Necesitas ayuda? <a href="https://documentation.onesignal.com/v3.0/docs/setup" target="_blank">Leer la documentacion</a></span></div>
                    </form>
                </div>
            </div>
			
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar notificaciones Android Global (Me gusta, Disgusto, Cometarios, Seguir etc.)</h6>
                    <div class="email2-settings-alert"></div>
                    <form class="email2-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">OneSignal APP ID</label>
                                <input type="text" id="android_n_push_id" name="android_n_push_id" class="form-control" value="<?php echo $wo['config']['android_n_push_id'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">REST API Key</label>
                                <input type="text" id="android_n_push_key" name="android_n_push_key" class="form-control" value="<?php echo $wo['config']['android_n_push_key'];?>">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de notificaciones IOS Global (Likes, Dislikes, Comments, Follow etc.)</h6>
                    <div class="email2-settings-alert"></div>
                    <form class="email2-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">OneSignal APP ID</label>
                                <input type="text" id="ios_n_push_id" name="ios_n_push_id" class="form-control" value="<?php echo $wo['config']['ios_n_push_id'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">REST API Key</label>
                                <input type="text" id="ios_n_push_key" name="ios_n_push_key" class="form-control" value="<?php echo $wo['config']['ios_n_push_key'];?>">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configu¡racion de notificaciones Web Global (Likes, Dislikes, Comments, Follow etc.)</h6>
                    <div class="email2-settings-alert"></div>
                    <form class="email2-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">OneSignal APP ID</label>
                                <input type="text" id="web_push_id" name="web_push_id" class="form-control" value="<?php echo $wo['config']['web_push_id'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">REST API Key</label>
                                <input type="text" id="web_push_key" name="web_push_key" class="form-control" value="<?php echo $wo['config']['web_push_key'];?>">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de notificaciones push de Android Messenger y Chat</h6>
                    <div class="email3-settings-alert"></div>
                    <form class="email3-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">OneSignal APP ID</label>
                                <input type="text" id="android_m_push_id" name="android_m_push_id" class="form-control" value="<?php echo $wo['config']['android_m_push_id'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">REST API Key</label>
                                <input type="text" id="android_m_push_key" name="android_m_push_key" class="form-control" value="<?php echo $wo['config']['android_m_push_key'];?>">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de notificaciones automaticas de IOS Messenger y Chat</h6>
                    <div class="ios-m-settings-alert"></div>
                    <form class="ios-m-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">OneSignal APP ID</label>
                                <input type="text" id="ios_m_push_id" name="ios_m_push_id" class="form-control" value="<?php echo $wo['config']['ios_m_push_id'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">REST API Key</label>
                                <input type="text" id="ios_m_push_key" name="ios_m_push_key" class="form-control" value="<?php echo $wo['config']['ios_m_push_key'];?>">
                            </div>
                        </div>
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