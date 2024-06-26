<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Usuarios</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Sistema de afiliados</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configurar afiliados</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de afiliados</h6>
                    <div class="affiliates-settings-alert"></div>
                    <form class="affiliates-settings" method="POST">
                        <div class="float-left">
                            <label for="affiliate_system" class="main-label">Affiliates System</label>
                            <div class="dropdown user_filter_drop">
                                <button class="btn btn-light" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="dropdown-menu-innr">
                                        <b>¿Quien puede usar esta funcion?</b>
                                        <div>
                                            <div class="round_check">
                                                <input type="radio" name="affiliate_request" id="affiliate_request-admin" onchange="SelectProModel('can_use_affiliate',this)" value="admin" <?php echo ($wo['config']['affiliate_request'] == 'admin')   ? ' checked' : '';?>>
                                                <label class="radio-inline" for="affiliate_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
                                            </div>
                                            <div class="round_check">
                                                <input type="radio" name="affiliate_request" id="affiliate_request-all" onchange="SelectProModel('can_use_affiliate',this)" value="all" <?php echo ($wo['config']['affiliate_request'] == 'all')   ? ' checked' : '';?>>
                                                <label class="radio-inline" for="affiliate_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
                                            </div>
                                            <div class="round_check">
                                                <input type="radio" name="affiliate_request" id="affiliate_request-verified" onchange="SelectProModel('can_use_affiliate',this)" value="verified" <?php echo ($wo['config']['affiliate_request'] == 'verified')   ? ' checked' : '';?>>
                                                <label class="radio-inline" for="affiliate_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
                                            </div>
                                            <div class="round_check">
                                                <input type="radio" name="affiliate_request" id="affiliate_request-pro" onchange="SelectProModel('can_use_affiliate',this)" value="pro" <?php echo ($wo['config']['affiliate_request'] == 'pro')   ? ' checked' : '';?>>
                                                <label class="radio-inline" for="affiliate_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <br><small class="admin-info">El usuario ganara dinero al invitar a los usuarios a su sitio</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="affiliate_system" value="0" />
                            <input type="checkbox" name="affiliate_system" id="chck-affiliate_system" value="1" <?php echo ($wo['config']['affiliate_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('affiliate_system')) ?>>
                            <label for="chck-affiliate_system" class="check-trail <?php echo(EnableForMode('affiliate_system',true)) ?>" <?php echo(EnableForMode('affiliate_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="affiliate_type">El usuario ganara dinero cuando</label>
                        <select class="form-control show-tick" id="affiliate_type" name="affiliate_type">
                          <option value="0" <?php echo ($wo['config']['affiliate_type'] == 0) ? 'selected': '';?> >Nuevo usuario esta registrado</option>
                          <option value="1" <?php echo ($wo['config']['affiliate_type'] == 1) ? 'selected': '';?> >El nuevo usuario esta registrado y compro un paquete profesional.</option>
                        </select>
                        <small class="admin-info">El usuario ganara dinero de los afiliados</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float amount_ref">
                            <div class="form-line">
                                <label class="form-label">Cantidad</label>
                                <input type="text" id="amount_ref" name="amount_ref" class="form-control" value="<?php echo $wo['config']['amount_ref']?>">
                                <small class="admin-info">The price you'll pay for each new referred user. Default 0.10</small>
                            </div>
                        </div>
                        <div class="form-group form-float amount_percent_ref">
                            <div class="form-line">
                                <label class="form-label">Cantidad %</label>
                                <input type="number" min="0" max="100" id="amount_percent_ref" name="amount_percent_ref" class="form-control" value="<?php echo $wo['config']['amount_percent_ref']?>">
                                <small class="admin-info">El precio que pagara por cada nuevo usuario referido. Despues de unirse a cualquier paquete profesional.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nivel de afiliado</label>
                                <input type="number" id="affiliate_level" name="affiliate_level" class="form-control" value="<?php echo $wo['config']['affiliate_level']?>">
                                <small class="admin-info">Ejemplo: si establece el nivel 4, el primer afiliado obtiene el 100 %, el segundo el 75 % y el tercero el 50 %, y asi sucesivamente.</small>
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

$(document).ready(function() {
    $('#amount_ref').focus(function() { $(this).select(); } );
    $('#amount_percent_ref').focus(function() { $(this).select(); } );
});
$(function() {
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

    //to ensure that value is Between 0-100
    $('#amount_percent_ref').keyup(function(e) {
        var num = $(this).val();
        if(isNaN(num)||num<0 ||num>100) {
            $('.affiliates-settings-alert').html('<div class="alert alert-danger">Only Enter Number Between 0-100</div>');
            setTimeout(function () {
                $('.affiliates-settings-alert').empty();
            }, 2000);
            $(this).val("0");
        }

        $('#amount_ref').val(0);
    });

    $('#amount_ref').keyup(function(e) {
        var num = $(this).val();
        if(isNaN(num)||num<0) {
            $('.affiliates-settings-alert').html('<div class="alert alert-danger">Only Enter Number</div>');
            setTimeout(function () {
                $('.affiliates-settings-alert').empty();
            }, 2000);
            $(this).val("0");
        }

        $('#amount_percent_ref').val(0);
    });

    //to hide and show inputs according to selected value
    // $('#affiliate_type').change(function(e){
    //     var selected_affiliate_type = $('#affiliate_type :selected').text();
    //     if( selected_affiliate_type == "New user is registred" ){
    //         $('.amount_ref').show();
    //         $('.amount_percent_ref').hide();
    //     }else if( selected_affiliate_type == "New user is registred & bought a pro package" ){
    //         $('.amount_ref').hide();
    //         $('.amount_percent_ref').show();
    //     }
    // });
});
</script>