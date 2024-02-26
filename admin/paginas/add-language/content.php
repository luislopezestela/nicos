<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Lenguages</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Agregar Language & Key</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Agregar Lenguage</h6>
					<div class="alert alert-info">Note: Esto puede tomar hasta 5 minutos.</div>
                    <div class="email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nombre de lenguage</label>
                                <input type="text" id="lang" name="lang" class="form-control">
                                <small class="admin-info">Use solo letras en ingles, no se permiten espacios. por ejemplo: ruso</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Lenguage ISO <small></small></label>
                                <input type="iso" id="iso" name="iso" class="form-control">
                            </div>
                        </div>
                        
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar lenguage</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Agregar nuevo lenguage Key</h6>
                    <div class="key-settings-alert"></div>
                    <form class="key-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nombre Key </label>
                                <input type="text" id="lang_key" name="lang_key" class="form-control">
                                <small class="admin-info">Use solo letras en inglés, no se permiten espacios, ejemplo: this_is_a_key</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar Key</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

$(function() {
    var form_email_settings = $('form.email-settings');
    form_email_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_lang',
        beforeSend: function() {
            form_email_settings.find('button').text('Por favor espere..');
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.email-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i>Idioma agregado con exito</div>');
                setTimeout(function () {
		            window.location.href = '<?php echo lui_LoadAdminLinkSettings('manage-languages'); ?>';
		        }, 1000);
            }
            form_email_settings.find('button').text('Agregar Lenguage');
        }
    });

    var form_key_settings = $('form.key-settings');
    form_key_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_lang_key',
        beforeSend: function() {
            form_key_settings.find('button').text('Por favor espere..');
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.key-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Key agregado con exito</div>');
                 setTimeout(function () {
                    window.location.href = data.url;
                  }, 1000);
            } else {
                $('.key-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
                setTimeout(function () {
                    $('.key-settings-alert').empty();
                }, 2000);
            }
            form_key_settings.find('button').text('Add Key');
        }
    });
});
</script>