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
                <li class="breadcrumb-item active" aria-current="page">Configurar CronJob</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar CronJob</h6>
                    <div class="alert alert-warning">Asegurese de agregar este cronjob a su lista crontab, el archivo de destino es: cron-job.php, debe ejecutarse cada 5 minutos como el siguiente comando:</div>
					
                    <form class="email-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Comando CronJob</span>
                                <p class="form-control">*/5 * * * * curl <?php echo $wo['config']['site_url'] ;?>/cron-job.php &>/dev/null</p>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Ultima ejecucion de CronJob</span>
                                <p class="form-control"><?php echo !empty($wo['config']['cronjob_last_run']) ? date("d-m-Y h:i:s",$wo['config']['cronjob_last_run']): ''; ?></p>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo Lui_CreateSession();?>">
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