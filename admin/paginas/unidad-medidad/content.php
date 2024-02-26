<?php $wo['unidadmedida'] = lui_GetUnidadmedidaTypes(''); ?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tienda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Unidad de medida
                </li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="add_reaction_form_alert"></div>
                    <h6 class="card-title">Agregar</h6>
                    <form id="add_unidadmedida_form" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix"></div>
                    <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($wo['unidadmedida'] as $um) {
                                  $wo['nombre'] = $um['nombre'];
                                  $wo['id'] = $um['id'];
                                    echo lui_LoadAdminPage('unidad-medidad/list');
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Estas seguro de que quieres continuar? esta acción no se puede deshacer
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="editsucursalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_reaction_form_alert"></div>
        <form class="edit_unidadmedida_form" method="POST" id="modal-body-langs">
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
        </form>
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="save_edited_sucursal">Guardar</button>
      </div>
    </div>
  </div>
</div>
    <style type="text/css">
    .btn-file { position: relative; overflow: hidden;cursor: pointer;}
    .btn-file input[type=file] { position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 100px; text-align: right; opacity: 0; outline: none; background: #fff; cursor: inherit; display: block; }
    .change-file-ico {min-width: 36px;}
    .change-file-ico svg {border-radius: 50%;background: rgb(2 154 214 / 15%);color: #029ad6;padding: 7px;width: 36px;height: 36px;}
    .full-width {width: 100%;}
    #wowonder-icon-name{font-weight: normal;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;display: block;}
</style>
    <script type="text/javascript">

        function DeleteUnidadmedida(self,id,type = 'show') {
            if (type == 'hide') {
              $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteUnidadmedida(this,'"+id+"')");
              $('#DeleteModal').modal('show');
              return false;
            }
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_unidadmedida', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    $('#list-'+id).slideUp('slow');
                    setTimeout(function () {
                        $('#list-'+id).remove();
                    },2000);
                }
            });
          }

        function EditUnidadmedida(id) {console.log(id) 
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_unidadmedida_form', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                  $('.data_lang').html(data.html);
                  $('#editsucursalModal').modal();
                }
            });
        }
        var add_unidadmedida_form = $('form#add_unidadmedida_form');
        var edit_unidadmedida_form = $('form.edit_unidadmedida_form');

        add_unidadmedida_form.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=agregar_unidadmedida',
            beforeSend: function() {
                add_unidadmedida_form.find('.btn-primary').text("Espere..");
            },
            success: function(data) {
              add_unidadmedida_form.find('.btn-primary').text('Agregar');
                if (data.status == 200) {
                    $('.add_reaction_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Reaccion agregada con exito</div>');
                    setTimeout(function () {
                        $('.add_reaction_form_alert').empty();
                    }, 2000);
                    window.location.reload();
                }
                else{
                  $('.add_reaction_form_alert').html('<div class="alert alert-danger"> '+data.message+'</div>');
                    setTimeout(function () {
                        $('.add_reaction_form_alert').empty();
                    }, 2000);
                }
            }
        });


        edit_unidadmedida_form.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=edit_unidadmedida&hash=' + $('.main_session').val(),
            beforeSend: function() {
                $('#editsucursalModal').find('.btn-success').text("Espere..");
            },
            success: function(data) {
                if (data.status == 200) {
                    $('#editsucursalModal').find('.btn-success').text('Guardar');
                    $('.edit_reaction_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Reaccion editada con exito</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 3000);
                    window.location.reload();
                }
                else{
                  $('.edit_reaction_form_alert').html('<div class="alert alert-danger"> '+data.message+'</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 2000);
                }
            }
        });

        $(document).on('click','#save_edited_sucursal', function(event) {
          event.preventDefault();
          $('.edit_unidadmedida_form').submit();
        });
    </script>