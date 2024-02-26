<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Administrar configuracion</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tienda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configurar tienda</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
      <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de tienda</h6>
                    <div class="store-settings-alert"></div>
                    <div class="store-settings-test-alert"></div>
                    <form class="store-settings" method="POST">
                        <div class="float-left">
                            <label for="store_system" class="main-label">Sistema de tienda</label>
                            <br><small class="admin-info">Los usuarios podrán vender y comprar productos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="store_system" value="off" />
                            <input type="checkbox" name="store_system" id="chck-store_system" value="on" <?php echo ($wo['config']['store_system'] == 'on') ? 'checked': '';?> <?php echo(EnableForMode('store_system')) ?>>
                            <label for="chck-store_system" class="check-trail <?php echo(EnableForMode('store_system',true)) ?>" <?php echo(EnableForMode('store_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="store_review_system" class="main-label">Revisar productos</label>
                            <br><small class="admin-info">Revise los productos del administrador o los moderadores antes de publicarlos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="store_review_system" value="off" />
                            <input type="checkbox" name="store_review_system" id="chck-store_review_system" value="on" <?php echo ($wo['config']['store_review_system'] == 'on') ? 'checked': '';?>>
                            <label for="chck-store_review_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Comisión de ventas</label>
                                <input type="text" name="store_commission" class="form-control" value="<?php echo ($wo['config']['store_commission']);?>">
                                <small class="admin-info">¿Cuánto quieres ganar con cada venta? (%), deja 0 si no quieres ninguno.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function() {
    $('.switcher input[type=checkbox]').click(function () {
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        if ($(this).is(":checked") === true) {
            objData[configName] = $(this).val();
        }
        else{
            if ($('input[name='+configName+']')[0]) {
                objData[configName] = $($('input[name='+configName+']')[0]).val();
            }
        }
        objData['hash_id'] = hash_id;
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = thisElement.val();
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
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
    $('input[type=text], input[type=number] , textarea').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
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






$(function() {
    $('#upload_system_type').change(function(event) {
        if ($(this).val() == 1) {
            $('#p_f_users_').removeClass('hidden');
            $('#all_users_').addClass('hidden');
        }
        else{
            $('#all_users_').removeClass('hidden');
            $('#p_f_users_').addClass('hidden');
        }
    });

    var form_fame_settings = $('form.fame-settings');

    form_fame_settings.ajaxForm({
        url: '{{CONFIG ajax_url}}/ap/save-settings',
        beforeSend: function() {
            form_fame_settings.find('button').text("Please wait");
        },
        success: function(data) {
            if (data.status == 200) {
                form_fame_settings.find('button').text('Save');
                $('.fame-settings-test-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.fame-settings-test-alert').empty();
                }, 2000);
            }
        }
    });

    var form_lock_settings = $('form.lock-settings');

    form_lock_settings.ajaxForm({
        url: '{{CONFIG ajax_url}}/ap/save-settings',
        beforeSend: function() {
            form_lock_settings.find('button').text("Please wait");
        },
        success: function(data) {
            if (data.status == 200) {
                form_lock_settings.find('button').text('Save');
                $('.lock-settings-test-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.lock-settings-test-alert').empty();
                }, 2000);
            }
        }
    });

    var form_user_settings = $('form.user-settings');

    form_user_settings.ajaxForm({
        url: '{{CONFIG ajax_url}}/ap/save-settings',
        beforeSend: function() {
            form_user_settings.find('button').text("Please wait");
        },
        success: function(data) {
            if (data.status == 200) {
                form_user_settings.find('button').text('Save');
                $('.user-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.user-settings-alert').empty();
                }, 2000);
            }
        }
    });

    var ffmpeg_settings = $('form.ffmpeg-settings');
    ffmpeg_settings.ajaxForm({
        url: '{{CONFIG ajax_url}}/ap/save-settings',
        beforeSend: function() {
            ffmpeg_settings.find('.waves-effect').text("Please wait");
        },
        success: function(data) {
            if (data.status == 200) {
                ffmpeg_settings.find('.waves-effect').text('Save');
                $('.ffmpeg-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    $('.ffmpeg-settings-alert').empty();
                }, 2000);
            }
        }
    });

});
</script>
