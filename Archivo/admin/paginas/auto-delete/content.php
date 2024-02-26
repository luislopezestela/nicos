<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Herramientas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Eliminar automaticamente los datos del sitio web</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Eliminar automaticamente los datos del sitio web</h6>
                    <div class="alert alert-info">Se recomienda crear una copia de seguridad antes de aplicar cualquier accion.</div>
                   <label for="delete">Seleccione lo que le gustaria eliminar</label>
                        <select class="form-control show-tick" id="delete" name="delete">
                           <option value="1">Eliminar todos los usuarios inactivos</option>
                           <option value="2">Eliminar usuarios que no hayan iniciado sesion por más de 1 semana</option>
                           <option value="3">Eliminar usuarios que no hayan iniciado sesion por más de 1 mes</option>
                           <option value="4">Eliminar usuarios que no hayan iniciado sesion por más de 1 año</option>
                           <option value="5">Eliminar publicaciones que duren mas de 1 semana</option>
                           <option value="6">Eliminar publicaciones que tengan mas de 1 mes</option>
                           <option value="7">Eliminar publicaciones que tengan mas de 1 año</option>
                        </select>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="alert alert-warning">Este proceso puede llevar algun tiempo, puede verificar los cambios en su sitio despues de unos minutos.</div>
                        <div class="clearfix"></div>
                  <button type="submit" class="btn btn-danger waves-effect waves-light m-t-20" id="delete-btn" onclick="Wo_DeleteAuto('hide');">Borrar datos</button>
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
                <h5 class="modal-title" id="exampleModal1Label">¿Borrar automaticamente?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estas seguro que quieres borrarlo? esta accion no se puede deshacer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<script>
  function Wo_DeleteAuto(type = 'show') {
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteAuto()");
      $('#DeleteModal').modal('show');
      return false;
    }
    $('#delete-btn').text('Por favor espere..');
  $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'auto_delete', delete: $('#delete').val()}, function(data, textStatus, xhr) {
    $('#delete-btn').text('Los datos se estan eliminando, revise su sitio después de unos minutos.');
    setTimeout(function () {
      $('#delete-btn').text('Borrar datos');
    }, 4000);
  });
}
</script>