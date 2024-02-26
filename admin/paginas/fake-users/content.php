<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Herramientas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Generador de usuarios falsos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Generador de usuarios falsos</h6>
                    <div class="alert alert-info">Genera una cantidad ilimitada de usuarios falsos.</div>
                <form action="" method="POST" class="generate-form">
                	
                	 <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">¿Cuantos usuarios quieres generar?</label>
                                <input type="number" id="count_users" name="count_users" class="form-control" value="10">
                                <small class="admin-info">Los usuarios minimos requeridos son 10</small>
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Contraseña</label>
                                <input type="text" id="password" name="password" class="form-control">
                                <small class="admin-info">Elija la contraseña que se utilizará para todos los usuarios, por defecto: 123456789</small>
                            </div>
                        </div>
                        <label for="avatar">¿Crear avatar aleatorio?</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar-enabled" value="1">
                                <label class="form-check-label" for="avatar-enabled">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar-disabled" value="0" checked>
                                <label class="form-check-label" for="avatar-disabled" class="m-l-20">No</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <small>Si el avatar esta habilitado, es posible que vea avatares duplicados, los avatares se generan aleatoriamente.</small><br>
                        <small>Este proceso puede llevar algun tiempo, puede verificar los cambios en su sitio despues de unos minutos.</small><br><div class="clearfix"></div>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light m-t-20" id="delete-btn">Generar datos falsos</button><br><br>
                        <button type="button" class="btn btn-success waves-effect waves-light m-t-20" onclick="DeleteAllFake('hide')" id="delete_all_btn">Eliminar todos los usuarios falsos</button>
                
                </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Eliminar usuarios falsos?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar todos los usuarios falsos?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<script>
function DeleteAllFake(type = 'show') {
    if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteAllFake()");
      $('#DeleteModal').modal('show');
      return false;
    }
    $('#delete_all_btn').text('Por favor espere..');
    $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_fake_users', function(data, textStatus, xhr) {
        $('#delete_all_btn').text('El usuario esta siendo eliminado, revisa tu sitio despues de unos minutos.');
        setTimeout(function () {
            $('#delete_all_btn').text('Eliminar todos los usuarios falsos');
        }, 4000);
    });
}
$(function() {
    var generate_form = $('form.generate-form');
    generate_form.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=generate_fake_users',
        beforeSend: function() {
            $('#delete-btn').text('Por favor espere..');
        },
        success: function(data) {
            if (data.status == 200) {
            	$('#delete-btn').text('Se estan generando usuarios, revisa tu sitio despues de unos minutos.');
            	setTimeout(function () {
					$('#delete-btn').text('Generar datos falsos');
				}, 4000);
            }
        }
    });

});
</script>