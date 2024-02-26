<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configurar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configurar correo y sms</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar correo</h6>
                    <form class="email-settings" method="POST">
                        <label for="smtp_or_mail" class="main-label">Servidor de correo</label>
                        <select class="form-control show-tick" id="smtp_or_mail" name="smtp_or_mail">
                          <option value="smtp" <?php if($wo['config']['smtp_or_mail'] == 'smtp'){echo 'selected';};?> >SMTP Server</option>
                          <option value="mail" <?php if($wo['config']['smtp_or_mail'] == 'mail'){echo 'selected';};?> >Server Mail (Default)</option>
                        </select>
                        <small class="admin-info">Seleccione que servidor de correo desea utilizar; no se recomienda la funcion Servidor de correo.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Correo predeterminado del sitio web</label>
                                <input type="text" id="siteEmail" name="siteEmail" class="form-control" value="<?php echo $wo['config']['siteEmail']; ?>">
                                <small class="admin-info">Este es el correo predeterminado de su sitio web, se utilizara para enviar correos a los usuarios.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Host SMTP</label>
                                <input type="text" id="smtp_host" name="smtp_host" class="form-control" value="<?php echo $wo['config']['smtp_host'];?>">
                                <small class="admin-info">El nombre de host de su cuenta SMTP puede ser IP, dominio o subdominio.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Usuario SMTP</label>
                                <input type="text" id="smtp_username" name="smtp_username" class="form-control" value="<?php echo $wo['config']['smtp_username'];?>">
                                <small class="admin-info">Your SMTP account username.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Contraseña SMTP</label>
                                <input type="password" id="smtp_password" name="smtp_password" class="form-control" value="<?php echo openssl_decrypt($wo['config']['smtp_password'], "AES-128-ECB", 'mysecretkey1234');?>">
                                <small class="admin-info">La contraseña de su cuenta SMTP.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Puerto SMTP</label>
                                <input type="text" id="smtp_port" name="smtp_port" class="form-control" value="<?php echo $wo['config']['smtp_port'];?>">
                                <small class="admin-info">¿Que puerto utiliza su servidor SMTP? el 587 mas utilizado para TLS y el 465 para cifrado SSL. </small>
                            </div>
                        </div>
                        <label for="smtp_encryption">Cifrado SMTP</label>
                        <select class="form-control show-tick" id="smtp_encryption" name="smtp_encryption">
                          <option value="tls" <?php if((strtolower($wo['config']['smtp_encryption']) == 'tls')){echo 'selected';};?> >TLS (predeterminado, no protegido)</option>
                          <option value="ssl" <?php if((strtolower($wo['config']['smtp_encryption']) == 'ssl')){echo 'selected';};?> >SSL (Seguro)</option>
                        </select>
                        <small class="admin-info">¿Qué método de cifrado utiliza su servidor SMTP?</small>
                        <div class="clearfix"></div><br>
                        <div class="alert alert-info">
                            Después de hacer clic en "Probar servidor de correo electrónico", se enviará un mensaje de prueba a la dirección de correo electrónico de su cuenta.
                        </div>
                        <div class="email-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestMessage();">Probar Servidor de correo</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de SMS</h6>

                    <form class="sms-settings" method="POST">
                        <div class="alert alert-info">Para comenzar a enviar SMS, debe crear una cuenta y comprar creditos en <a href="http://www.twilio.com">Twilio</a> <span class="red">o</span> <a href="http://www.bulksms.com/">BulkSMS</a> <span class="red">o</span> <a href="https://www.infobip.com/">Infobip</a>.</div><br>

                        <label for="sms_provider" class="main-label">Proveedor de SMS predeterminado</label>
                        <select class="form-control show-tick" id="sms_provider" name="sms_provider">
                          <option value="twilio" <?php if($wo['config']['sms_provider'] == 'twilio'){echo 'selected';};?> >Twilio</option>
                          <option value="bulksms" <?php if($wo['config']['sms_provider'] == 'bulksms'){echo 'selected';};?> >BulkSMS</option>
                          <option value="infobip" <?php if($wo['config']['sms_provider'] == 'infobip'){echo 'selected';};?> >Infobip</option>
                          <option value="msg91" <?php if($wo['config']['sms_provider'] == 'msg91'){echo 'selected';};?> >Msg91</option>
                        </select>
                        <small class="admin-info">Seleccione qué proveedor de SMS desea usar, puede usar solo uno al mismo tiempo.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Su numero de celular</label>
                                <input type="text" id="sms_phone_number" name="sms_phone_number" class="form-control" value="<?php echo $wo['config']['sms_phone_number'];?>">
                                <small class="admin-info">Configure el numero predeterminado de su sitio web, se utilizará para enviar SMS a los usuarios, por ejemplo (+51 982..)</small>
                            </div>
                        </div>
                        <hr>
                        <label  class="main-label">Configuracion BulkSMS</label><br><br>
                        <!-- <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">BulkSMS Eapi_URL</label>
                                <input type="text" id="eapi" name="eapi" class="form-control" value="<?php echo $wo['config']['eapi'];?>">
                            </div>
                        </div> -->
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">BulkSMS Username</label>
                                <input type="text" id="sms_username" name="sms_username" class="form-control" value="<?php echo $wo['config']['sms_username'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">BulkSMS Password</label>
                                <input type="password" id="sms_password" name="sms_password" class="form-control" value="<?php echo $wo['config']['sms_password'];?>">
                            </div>
                        </div>
                       <hr>
                       <label  class="main-label">Twilio Configuration</label><br><br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Twilio account_sid</label>
                                <input type="text" id="sms_twilio_username" name="sms_twilio_username" class="form-control" value="<?php echo $wo['config']['sms_twilio_username'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Twilio auth_token</label>
                                <input type="text" id="sms_twilio_password" name="sms_twilio_password" class="form-control" value="<?php echo $wo['config']['sms_twilio_password'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Twilio Phone number</label>
                                <input type="text" id="sms_t_phone_number" name="sms_t_phone_number" class="form-control" value="<?php echo $wo['config']['sms_t_phone_number'];?>">
                            </div>
                        </div>
                        <hr>
                        <label  class="main-label">Infobip Configuration</label><br><br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Infobip API Key</label>
                                <input type="text" id="infobip_api_key" name="infobip_api_key" class="form-control" value="<?php echo $wo['config']['infobip_api_key'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Infobip Base URL</label>
                                <input type="text" id="infobip_base_url" name="infobip_base_url" class="form-control" value="<?php echo $wo['config']['infobip_base_url'];?>">
                            </div>
                        </div>
                        <hr>
                        <label  class="main-label">Msg91 Configuration</label><br><br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Msg91 AuthKey</label>
                                <input type="text" id="msg91_authKey" name="msg91_authKey" class="form-control" value="<?php echo $wo['config']['msg91_authKey'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Msg91 DLT ID</label>
                                <input type="text" id="msg91_dlt_id" name="msg91_dlt_id" class="form-control" value="<?php echo $wo['config']['msg91_dlt_id'];?>">
                            </div>
                        </div>


                        <div class="alert alert-info">Después de hacer clic en "Probar servidor SMS", se enviara un mensaje de prueba a su celular</div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="sms-settings-alert"></div>
                        <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestSMSMessage();">Probar SMS Server</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Entrega de correo depuracion</h6>
                    <div class="alert alert-info">Esta funcion probara la capacidad de entrega del correo y se asegurara de que el sistema funcione correctamente.</div>
                    <form class="debug-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Registro de depuracion</label>
                                <textarea name="debug_email" id="debug_email" class="form-control" cols="30" rows="5" style="height: 700px !important;" disabled>Haga clic en Depurar capacidad de entrega de correo para mostrar los resultados de la prueba.</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="debug-settings-alert"></div>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Depuracion de entrega de correo</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
function Wo_TestMessage() {
    $('form.email-settings').find('.btn-success').text('Please wait..');
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_message'}, function (data) {
        if (data.status == 200) {
            $('.email-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Message sent!</div>');
            setTimeout(function () {
                $('.email-settings-alert').empty();
            }, 2000);
        } else {
            $('.email-settings-alert').html('<div class="alert alert-danger">Message failed to sent, error: ' + data.error+'</div>');
            setTimeout(function () {
                $('.email-settings-alert').empty();
            }, 2000);
        }
        $('form.email-settings').find('.btn-success').text('Test E-mail Server');
    });
}
function Wo_TestSMSMessage() {
    $('form.sms-settings').find('.btn-success').text('Please wait..');
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_sms_message'}, function (data) {
        if (data.status == 200) {
            $('.sms-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Message sent!</div>');
            setTimeout(function () {
                $('.sms-settings-alert').empty();
            }, 2000);
        } else {
            $('.sms-settings-alert').html('<div class="alert alert-danger">Message failed to sent, error: ' + data.error+'</div>');
            setTimeout(function () {
                $('.sms-settings-alert').empty();
            }, 2000);
        }
        $('form.sms-settings').find('.btn-success').text('Test SMS Server');
    });
}
$(function() {
    var debug_settings = $('form.debug-settings');
    debug_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=email_debug',
        beforeSend: function() {
            debug_settings.find('.waves-effect').text("Please wait..");
        },
        success: function(data) {
            debug_settings.find('.waves-effect').text('Debug');
            $('#debug_email').val(data);
        },
        error: function(data) {
            debug_settings.find('.waves-effect').text('Debug');
            $('#debug_email').val(data.responseText);
        }
    });

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
    $('input[type=text], input[type=number], input[type=password]').on('input', delay(function() {
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
