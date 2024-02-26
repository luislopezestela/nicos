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
                <li class="breadcrumb-item active" aria-current="page">Administrar clave de servidor de API</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar API (API v1)</h6>
                    <div class="alert-info alert">Utilice estas teclas para configurar su aplicacion.</div>
                    <div class="email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">API ID</label>
                                <input type="text" id="app-id" name="app-id" class="form-control" value="<?php echo $wo['config']['widnows_app_api_id'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">API clave secreta</label>
                                <input type="text" id="app-key" name="app-key" class="form-control app-key" value="<?php echo $wo['config']['widnows_app_api_key'];?>" disabled>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" onclick="Wo_ResetKeys('hide')">Restablecer clave</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Clave de servidor (API v2)</h6>
                    <div class="alert alert-info">Utilice esta clave para configurar y acceder a los puntos finales de la API. <a href="<?php echo $wo['config']['site_url']; ?>/api/v2/Documentation.html" target="_blank">Leer documentacion</a></div>
                    <div class="email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave de servidor</label>
                                <input type="text" id="app-key" name="app-key" class="form-control app-key" value="<?php echo $wo['config']['widnows_app_api_key'];?>" disabled>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" onclick="Wo_ResetKeys('hide')">Restablecer clave de servidor</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Restablecer la clave secreta de API?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea restablecer la clave secreta de API? todas sus aplicaciones de Windows/telefono dejaran de funcionar en todos los dispositivos de sus usuarios.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Restablecer</button>
            </div>
        </div>
    </div>
</div>
<script>

function Wo_ResetKeys(type = 'show') {
    if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_ResetKeys()");
      $('#DeleteModal').modal('show');
      return false;
    }
    $('.email-settings').find('button').text('Please wait..');
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'reset_windows_app_keys'}, function (data) {
        if (data.status == 200) {
            $('.app-key').val(data.app_key);
        } else {
            $('.email-settings-alert').html('<div class="alert alert-danger">Se encontró un error al restablecer, intente nuevamente más tarde.</div>');
              setTimeout(function () {
                  $('.email-settings-alert').empty();
              }, 2000);
        }
        $('.email-settings').find('button').text('Restablecer clave');
    });
}
</script>