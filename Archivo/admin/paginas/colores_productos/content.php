
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Caracteristicas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Colores</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Colores</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Agregar</h6>
                  <div class="row">
                       <div class="col-md-12" style="margin-bottom:0;">
                        <div class="agregar_color_producto_alert"></div>
                            <form method="POST" id="agregar_color_producto">
                              	<input class="form-control" type="color" name="colores" style="padding:0;border:0;cursor:pointer;max-width:200px;width:100%;margin:10px auto;">
                              <div class="row">
                                <?php foreach (lui_LangsNamesFromDB() as $wo['key_']) { ?>
                                    <div class="col-md-2" id="normal-query-form">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                            <label class="form-label"><?php echo ucfirst($wo['key_']); ?></label>
                                              <input type="text" class="form-control" name="<?php echo($wo['key_']) ?>">
                                          </div>
                                      </div>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                              <div class="col-md-2">
                                <div>&nbsp;</div>
                                  <button class="btn btn-info">Agregar</button>
                              </div>
                              </div>
                              <div class="clearfix"></div>
                           </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Colores</h6>
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                	<th>Color</th>
					                <th>Name</th>
					                <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $colores_keys = lui_GetCategoriesKeys('lui_products_colores');
                                foreach($wo["colores_productos"] as $colores_id => $colores_name) {
                                  $colors = $db->where('id',$colores_id)->getOne("lui_products_colores");
                                  $wo['colores_key'] = $colores_id;
                                  $wo['colores_name'] = $colores_name;
                                  $wo['color'] = $colors->color;
                                  $wo['colores_lang_key'] = $colores_keys[$colores_id];
                                	echo lui_LoadAdminPage('colores_productos/colores');
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar seleccionados<span></span></button>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->

<div class="modal fade" id="editcolores_productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="editar_color_producto_form_alert"></div>
        <form class="edit_colores_product_lang" method="POST" id="modal-body-langs">
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
        </form>
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_edited_colores_product">Guardar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres eliminar este color?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<script>

var agregar_color_producto = $('form#agregar_color_producto');
var editar_color_producto_form = $('form.edit_colores_product_lang');

agregar_color_producto.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_category&type=color_producto',
    beforeSend: function() {
        agregar_color_producto.find('.waves-effect').text("Espere..");
    },
    success: function(data) {
        if (data.status == 200) {
            agregar_color_producto.find('.waves-effect').text('Guardar');
            $('.agregar_color_producto_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Categoria agregado con exito</div>');
            setTimeout(function () {
                $('.agregar_color_producto_alert').empty();
            }, 2000);
            window.location.reload();
        }
        else{
          $('.agregar_color_producto_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.agregar_color_producto_alert').empty();
            }, 2000);
        }
    }
});

editar_color_producto_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_lang_key&hash=' + $('.main_session').val(),
    beforeSend: function() {
        editar_color_producto_form.find('.waves-effect').text("Espere..");
    },
    success: function(data) {
        if (data.status == 200) {
            editar_color_producto_form.find('.waves-effect').text('Save');
            $('.editar_color_producto_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i>Datos guardados</div>');
            setTimeout(function () {
                $('.editar_color_producto_form_alert').empty();
            }, 3000);
            window.location.reload();
        }
        else{
          $('.editar_color_producto_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.editar_color_producto_form_alert').empty();
            }, 2000);
        }
    }
});

$(document).on('click','#save_edited_colores_product', function(event) {
  event.preventDefault();
  $('.edit_colores_product_lang').submit();
});

function edit_colores_productos(id) {
  $('#id_of_key').val(id);
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_langs_colores_productos', {lang_key: id}, function(data, textStatus, xhr) {
      if (data.status == 200) {
        $('.data_lang').html(data.html);
        $('#editcolores_productModal').modal();
      }
  });
}
function Wo_DeleteColoresProducto(id,type = 'show') {
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteColoresProducto('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
  $('#list-' + id).fadeOut(300, function() {
    $(this).remove();
  });
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_category&type=color_producto', {lang_key: id}, function(data, textStatus, xhr) {});
}

</script>