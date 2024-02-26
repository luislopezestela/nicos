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
                <li class="breadcrumb-item active" aria-current="page">Configuracion de inicio de sesion social</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de inicio de sesion social</h6>
                    <div class="social-settings-alert"></div>
                    <form class="social-settings" method="POST">
                        <div class="float-left">
                            <label for="facebookLogin" class="main-label">Facebook Login</label>
                            <br><small class="admin-info">Habilite la posibilidad de que los usuarios inicien sesion en su sitio utilizando su cuenta de Facebook.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="facebookLogin" value="0" />
                            <input type="checkbox" name="facebookLogin" id="chck-facebookLogin" value="1" <?php echo ($wo['config']['facebookLogin'] == 1) ? 'checked': '';?>>
                            <label for="chck-facebookLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="VkontakteLogin" class="main-label">Vkontakte Login</label>
                            <br><small class="admin-info">Habilite la posibilidad de que los usuarios inicien sesion en su sitio con su cuenta de Vkontakte.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="VkontakteLogin" value="0" />
                            <input type="checkbox" name="VkontakteLogin" id="chck-VkontakteLogin" value="1" <?php echo ($wo['config']['VkontakteLogin'] == 1) ? 'checked': '';?>>
                            <label for="chck-VkontakteLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="twitterLogin" class="main-label">Twitter Login</label>
                            <br><small class="admin-info">Habilite la posibilidad de que los usuarios inicien sesion en su sitio utilizando su cuenta de Twitter.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="twitterLogin" value="0" />
                            <input type="checkbox" name="twitterLogin" id="chck-twitterLogin" value="1" <?php echo ($wo['config']['twitterLogin'] == 1) ? 'checked': '';?>>
                            <label for="chck-twitterLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="linkedinLogin" class="main-label">Linkedin Login</label>
                            <br><small class="admin-info">Habilite la posibilidad de que los usuarios inicien sesion en su sitio utilizando su cuenta de Linkedin.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="linkedinLogin" value="0" />
                            <input type="checkbox" name="linkedinLogin" id="chck-linkedinLogin" value="1" <?php echo ($wo['config']['linkedinLogin'] == 1) ? 'checked': '';?>>
                            <label for="chck-linkedinLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="instagramLogin" class="main-label">Instagram Login</label>
                            <br><small class="admin-info">Habilite la posibilidad de que los usuarios inicien sesion en su sitio con su cuenta de Instagram.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="instagramLogin" value="0" />
                            <input type="checkbox" name="instagramLogin" id="chck-instagramLogin" value="1" <?php echo ($wo['config']['instagramLogin'] == 1) ? 'checked': '';?>>
                            <label for="chck-instagramLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar claves API de inicio de sesion social</h6>
                    <form class="api-settings" method="POST">
                        <div class="alert alert-info">Tenga en cuenta que algunos sitios web pueden requerir la verificación de la aplicación.</div>
                        <label class="form-label main-label" style="background: #1877F2; color: #fff; margin-bottom: 12px;">Facebook Configuracion</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="facebookAppId" name="facebookAppId" class="form-control" value="<?php echo $wo['config']['facebookAppId']?>" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="facebookAppKey" name="facebookAppKey" class="form-control" value="<?php echo $wo['config']['facebookAppKey']?>" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>

                        <label class="form-label main-label" style="background: #1DA1F2; color: #fff; margin-bottom: 12px;">Twitter Configuracion</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="twitterAppId" name="twitterAppId" class="form-control" value="<?php echo $wo['config']['twitterAppId']?>" placeholder="Consumer Key">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="twitterAppKey" name="twitterAppKey" class="form-control" value="<?php echo $wo['config']['twitterAppKey']?>" placeholder="Consumer Secret">
                            </div>
                        </div>
                        <hr>

                        <label class="form-label main-label" style="background: #0077B5; color: #fff; margin-bottom: 12px;">LinkedIn Configuracion</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="linkedinAppId" name="linkedinAppId" class="form-control" value="<?php echo $wo['config']['linkedinAppId']?>"  placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="linkedinAppKey" name="linkedinAppKey" class="form-control" value="<?php echo $wo['config']['linkedinAppKey']?>"  placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>

                        <label class="form-label main-label" style="background: #2787F5; color: #fff; margin-bottom: 12px;">Vkontakte Configuracion</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="VkontakteAppId" name="VkontakteAppId" class="form-control" value="<?php echo $wo['config']['VkontakteAppId']?>" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="VkontakteAppKey" name="VkontakteAppKey" class="form-control" value="<?php echo $wo['config']['VkontakteAppKey']?>" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>

                        <label class="form-label main-label" style="background: #AA2996; color: #fff; margin-bottom: 12px;">Instagram Configuracion</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="instagramAppId" name="instagramAppId" class="form-control" value="<?php echo $wo['config']['instagramAppId']?>" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="instagramAppkey" name="instagramAppkey" class="form-control" value="<?php echo $wo['config']['instagramAppkey']?>" placeholder="Application Secret Key">
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