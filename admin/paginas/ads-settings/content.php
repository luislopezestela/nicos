<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Anuncios</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Anuncios Configuracion del sistema</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de anuncios</h6>
                    <div class="ads-settings-alert"></div>
                    <form class="ads-settings" method="POST">
                      
                          <div class="float-left">
                              <label for="user_ads" class="main-label">Sistema de anuncios</label>
                              <br><small class="admin-info">Permitir a los usuarios crear anuncios.</small>
                          </div>
                          <div class="form-group float-right switcher">
                              <input type="hidden" name="user_ads" value="0" />
                              <input type="checkbox" name="user_ads" id="chck-user_ads" value="1" <?php echo ($wo['config']['user_ads'] == 1) ? 'checked': '';?>>
                              <label for="chck-user_ads" class="check-trail"><span class="check-handler"></span></label>
                          </div>
                          <div class="clearfix"></div>
                          <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Costo por vista</label>
                                <input type="text" id="ad_v_price" name="ad_v_price" class="form-control" value="<?php echo $wo['config']['ad_v_price'];?>">
                                <small class="admin-info">Establezca un precio para las impresiones de anuncios.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Coste por clic</label>
                                <input type="text" id="ad_c_price" name="ad_c_price" class="form-control" value="<?php echo $wo['config']['ad_c_price'];?>">
                                <small class="admin-info">Establezca un precio para los clics en los anuncios.</small>
                            </div>
                        </div>
                        <!-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="video_ad_skip" name="video_ad_skip" class="form-control" value="<?php echo $wo['config']['video_ad_skip'];?>">
                                <label class="form-label">Video ads skip button seconds</label>
                            </div>
                        </div> -->
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Completar <?php echo $wo['user']['name'] ?>la billetera</h6>
                    <div class="top-up-settings-alert"></div>
                    <form class="top-up-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Cantidad</label>
                                <input type="text" id="amount" name="amount" class="form-control" value="<?php echo $wo['user']['wallet'];?>">
                                <small class="admin-info">Puede recargar su propia billetera desde aqui, establecer cualquier numero.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Completar</button>
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

    var form_top_settings = $('form.top-up-settings');
    form_top_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=top_up_wallet',
        beforeSend: function() {
            form_top_settings.find('.waves-effect').text('Please wait..');
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.top-up-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Amount added to your wallet successfully.</div>');
                setTimeout(function () {
                    $('.top-up-settings-alert').empty();
                }, 2000);
            }
            form_top_settings.find('.waves-effect').text('Top Up');
        }
    });
});
</script>