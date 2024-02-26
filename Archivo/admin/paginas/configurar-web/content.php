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
                <li class="breadcrumb-item active" aria-current="page">Configurar web</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Informacion</h6>
                    <div class="site-settings-alert"></div>
                    <form class="site-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Titulo</label>
                                <input type="text" id="siteTitle" name="siteTitle" class="form-control" value="<?php echo $wo['config']['siteTitle']; ?>">
                                <small class="admin-info">El título general de su sitio web, aparecerá en Google y en la pestaña de su navegador.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nombre de pagina</label>
                                <input type="text" id="siteName" name="siteName" class="form-control" value="<?php echo $wo['config']['siteName']; ?>">
                                <small class="admin-info">El nombre de su sitio web aparecerá en el pie de página del sitio web y en los correos electrónicos.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Palabras clave</label>
                                <input type="text" id="siteKeywords" name="siteKeywords" class="form-control" value="<?php echo $wo['config']['siteKeywords']; ?>">
                                <small class="admin-info">La palabra clave de su sitio web, utilizada principalmente para SEO y motores de búsqueda.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Descripcion</label>
                                <textarea name="siteDesc" id="siteDesc" class="form-control" cols="30" rows="5"><?php echo $wo['config']['siteDesc']; ?></textarea>
                                <small class="admin-info">La descripción de su sitio web, utilizada principalmente para SEO y motores de búsqueda, se recomienda un máximo de 100 caracteres</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label main-label">Logo</label>
                                <small class="admin-info">Puede cambiar su logotipo en <a href="<?php echo lui_LoadAdminLinkSettings('manage-site-design'); ?>" data-ajax="?path=manage-site-design">Diseño del sitio</a></small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Codigo de análisis de Google</label>
                                <textarea name="googleAnalytics" id="googleAnalytics" class="form-control" cols="30" rows="5"><?php echo $wo['config']['googleAnalytics']; ?></textarea>
                                <small class="admin-info">Pegue su código completo de Google Analytics aquí para rastrear el tráfico.</small>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Codigo Google Tag Manager Head</label>
                                <textarea name="tagManager_head" id="tagManager_head" class="form-control" cols="30" rows="5"><?php echo $wo['config']['tagManager_head']; ?></textarea>
                                <small class="admin-info">código lo más arriba posible en la sección head de la página.</small>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Codigo Google Tag Manager Body</label>
                                <textarea name="tagManager_body" id="tagManager_body" class="form-control" cols="30" rows="5"><?php echo $wo['config']['tagManager_body']; ?></textarea>
                                <small class="admin-info">código justo después de la etiqueta de apertura body.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Funciones Claves de API e información</h6>
                    <div class="api-settings-alert"></div>
                    <form class="api-settings" method="POST">
                        <div class="float-left">
                            <label for="google_map" class="main-label">Google Maps</label>
                            <br><small class="admin-info">Mostrar Google Map en (Publicaciones, Perfil, Configuración, Anuncios).</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="google_map" value="0" />
                            <input type="checkbox" name="google_map" id="chck-google_map" value="1" <?php echo ($wo['config']['google_map'] == 1) ? 'checked': '';?>>
                            <label for="chck-google_map" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Google Map API</label>
                                <input type="text" id="google_map_api" name="google_map_api" class="form-control" value="<?php echo $wo['config']['google_map_api']?>">
                                <small class="admin-info">Esta clave es necesaria para GEO y para ver Google Maps.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="yandex_map" class="main-label">Mapas Yandex</label>
                            <br><small class="admin-info">Mostrar el mapa de Yandex en (Publicaciones, Perfil, Configuración, Anuncios).</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="yandex_map" value="0" />
                            <input type="checkbox" name="yandex_map" id="chck-yandex_map" value="1" <?php echo ($wo['config']['yandex_map'] == 1) ? 'checked': '';?>>
                            <label for="chck-yandex_map" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave de la API del mapa de Yandex</label>
                                <input type="text" id="yandex_map_api" name="yandex_map_api" class="form-control" value="<?php echo $wo['config']['yandex_map_api']?>">
                                <small class="admin-info">Esta clave es necesaria para GEO y para ver Yandex Maps.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="yandex_translate" class="main-label">API de traducción de Yandex</label>
                            <br><small class="admin-info">Traducir el texto de la publicación.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="yandex_translate" value="0" />
                            <input type="checkbox" name="yandex_translate" id="chck-yandex_translate" value="1" <?php echo ($wo['config']['yandex_translate'] == 1) ? 'checked': '';?>>
                            <label for="chck-yandex_translate" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave de API de traducción de Yandex</label>
                                <input type="text" id="yandex_translation_api" name="yandex_translation_api" class="form-control" value="<?php echo $wo['config']['yandex_translation_api']?>">
                                <small class="admin-info">Esta clave es necesaria para la traducción posterior.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="google_translate" class="main-label">API de traducción de Google</label>
                            <br><small class="admin-info">Traducir el texto de la publicación.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="google_translate" value="0" />
                            <input type="checkbox" name="google_translate" id="chck-google_translate" value="1" <?php echo ($wo['config']['google_translate'] == 1) ? 'checked': '';?>>
                            <label for="chck-google_translate" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave API de traducción de Google</label>
                                <input type="text" id="google_translation_api" name="google_translation_api" class="form-control" value="<?php echo $wo['config']['google_translation_api']?>">
                                <small class="admin-info">Esta clave es necesaria para la traducción posterior.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave API de YouTube</label>
                                <input type="text" id="youtube_api_key" name="youtube_api_key" class="form-control" value="<?php echo $wo['config']['youtube_api_key']?>">
                                <small class="admin-info">Esta clave es necesaria para importar o publicar videos de YouTube.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">API Giphy</label>
                                <input type="text" id="giphy_api" name="giphy_api" class="form-control" value="<?php echo $wo['config']['giphy_api']?>">
                                <small class="admin-info">Esta clave es necesaria para los GIF en mensajes, publicaciones y comentarios.</small>
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
    $('input[type=text], input[type=number], textarea').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            if (configName == 'googleAnalytics') {
                objData['googleAnalytics_en'] = btoa($('#googleAnalytics').val());
                 objData['googleAnalytics'] = "";
            }
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
               // thisElement.focus();
            });
    }, 500));


});
</script>