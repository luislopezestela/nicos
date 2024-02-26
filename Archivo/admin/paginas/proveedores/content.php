<?php $wo['proveedores'] = lui_GetProveedoresTypes(''); ?>
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
                    Proveedores
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
                    <form id="add_proveedores_form" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Razón social</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>

                            <div class="form-line">
                                <label class="form-label">Ruc</label>
                                <input type="text" name="ruc" class="form-control">
                            </div>

                            <div class="form-line">
                                <label class="form-label">Contacto</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Logo</label>
                                <div class="btn-file d-flex align-items-center">
                                    <input type="file" id="icono_sucursal" accept="image/x-png, image/gif, image/jpeg" name="media_file" class="hidden">
                                    <div class="mr-2 change-file-ico">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
                                    </div>
                                    <div class="full-width">
                                        <b id="icono_sucursal-name">Icono</b>
                                    </div>
                                </div>
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
                    <h6 class="card-title">Administrar reaccion</h6>
                    <div class="clearfix"></div>
                    <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Razon social</th>
                                    <th>Ruc</th>
                                    <th>Contacto</th>
                                    <th>Logo</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($wo['proveedores'] as $sucursal) {
                                  $wo['nombre'] = $sucursal['razon_social'];
                                  $wo['id'] = $sucursal['id'];
                                  $wo['ruc'] = $sucursal['ruc'];
                                  $wo['phone'] = $sucursal['phone'];
                                  $wo['logo'] = $sucursal['logo'];
                                    echo lui_LoadAdminPage('proveedores/list');
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
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar sucursal</h5>
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
        <h5 class="modal-title" id="editcategoryModalLabel">Editar proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_reaction_form_alert"></div>
        <form class="edit_proveedores_form" method="POST" id="modal-body-langs">
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

<div class="modal fade" id="agregar_sucursalproveedoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Sucursales proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_reaction_form_alert"></div>
        <form class="agregar_proveedores_sucursal_form" method="POST" id="modal-body-langs">
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="agregar_proveedor_sucursal">Agregar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sucursalesproveedoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal fade" id="DeleteModal_sucur" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar sucursal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal fade" id="DeleteModal_sucur" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal1Label">Eliminar sucursal</h5>
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
                    Estas seguro de que quieres continuar? esta acción no se puede deshacer
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
  <div class="modal-dialog" role="document" style="max-width:100%!important;">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Sucursales de proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_reaction_form_alert"></div>
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editsucursal_proveedores_Modal_listas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Editar sucursal de proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_reaction_form_alert"></div>
        <form class="edit_proveedores_listas_sucursales_form" method="POST" id="modal-body-langs">
          <div class="data_lang_sucursal"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
        </form>
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="save_edited_sucursal_proveedor">Guardar</button>
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
        $("#icono_sucursal").change(function () {
        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $("#icono_sucursal-name").text(filename);
        });

        function DeleteProveedores(self,id,type = 'show') {
            if (type == 'hide') {
              $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteProveedores(this,'"+id+"')");
              $('#DeleteModal').modal('show');
              return false;
            }
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_proveedores', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    $('#list-'+id).slideUp('slow');
                    setTimeout(function () {
                        $('#list-'+id).remove();
                    },2000);
                }
            });
          }
          function EliminarSucursalProveedores(self,id,type = 'show') {
            if (type == 'hide') {
              $('#DeleteModal_sucur').find('.btn-primary').attr('onclick', "EliminarSucursalProveedores(this,'"+id+"')");
              $('#DeleteModal_sucur').modal('show');
              return false;
            }
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=eliminar_sucursal_proveedor', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    $('#list-'+id).slideUp('slow');
                    setTimeout(function () {
                        $('#list-'+id).remove();
                    },2000);
                }
            });
          }


          function editar_proveedor_delsucursal_lista(id) {
            var ident = id;
              $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_sucursal_proveedores_form_lista', {id: ident}, function(data, textStatus, xhr) {
                  if (data.status == 200) {
                    $('.data_lang_sucursal').html(data.html);
                    $('#editsucursal_proveedores_Modal_listas').modal();
                  }
              });
          }

        function EditProveedores(id) {
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_proveedores_form', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                  $('.data_lang').html(data.html);
                  $('#editsucursalModal').modal();
                }
            });
        }

        function AgregarProveedoresSucursal(id) {
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_sucursalproveedores_form', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                  $('.data_lang').html(data.html);
                  $('#agregar_sucursalproveedoresModal').modal();
                }
            });
        }

        function MostrarProveedoresSucursal(id) {
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_sucursalesproveedores_form', {id: id}, function(data, textStatus, xhr) {
                if (data.status == 200) {
                  $('.data_lang').html(data.html);
                  $('#sucursalesproveedoresModal').modal();
                }
            });
        }


        var add_proveedores_form = $('form#add_proveedores_form');
        var edit_proveedores_form = $('form.edit_proveedores_form');
        var agregar_proveedores_sucursal_form = $('form.agregar_proveedores_sucursal_form');

        add_proveedores_form.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=agregar_proveedores',
            beforeSend: function() {
                add_proveedores_form.find('.btn-primary').text("Espere..");
            },
            success: function(data) {
              add_proveedores_form.find('.btn-primary').text('Agregar');
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

        edit_proveedores_form.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=edit_proveedores&hash=' + $('.main_session').val(),
            beforeSend: function() {
                $('#editsucursalModal').find('.btn-success').text("Espere..");
            },
            success: function(data) {
                if (data.status == 200) {
                    $('#editsucursalModal').find('.btn-success').text('Guardar');
                    $('.edit_reaction_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Guardado</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 3000);
                    window.location.reload();
                }else{
                  $('.edit_reaction_form_alert').html('<div class="alert alert-danger"> '+data.message+'</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 2000);
                }
            }
        });

        $(document).on('click','#save_edited_sucursal', function(event) {
          event.preventDefault();
          $('.edit_proveedores_form').submit();
        });

        agregar_proveedores_sucursal_form.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=agregar_proveedores_sucursal&hash=' + $('.main_session').val(),
            beforeSend: function() {
                $('#agregar_sucursalproveedoresModal').find('.btn-success').text("Espere..");
            },
            success: function(data) {
                if (data.status == 200) {
                    $('#agregar_sucursalproveedoresModal').find('.btn-success').text('Agregar');
                    $('.edit_reaction_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Sucursal agregado</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 3000);
                    window.location.reload();
                }else{
                  $('.edit_reaction_form_alert').html('<div class="alert alert-danger"> '+data.message+'</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 2000);
                }
            }
        });

        $(document).on('click','#agregar_proveedor_sucursal', function(event) {
          event.preventDefault();
          $('.agregar_proveedores_sucursal_form').submit();
        });



        var edit_proveedores_listas_sucursales_form = $('form.edit_proveedores_listas_sucursales_form');

        edit_proveedores_listas_sucursales_form.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=edit_proveedores_sucursales&hash=' + $('.main_session').val(),
            beforeSend: function() {
               $('#editsucursalModal').find('.btn-success').text("Espere..");
            },
            success: function(data) {
                if (data.status == 200) {
                    $('#editsucursalModal').find('.btn-success').text('Guardar');
                    $('.edit_reaction_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Editado exito</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 3000);
                    window.location.reload();
                }else{
                    $('.edit_reaction_form_alert').html('<div class="alert alert-danger"> '+data.message+'</div>');
                    setTimeout(function () {
                        $('.edit_reaction_form_alert').empty();
                    }, 2000);
                }
            }
        });

        $(document).on('click','#save_edited_sucursal_proveedor', function(event) {
            event.preventDefault();
            $('.edit_proveedores_listas_sucursales_form').submit();
        });


    </script>