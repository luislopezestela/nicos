<?php 
//unset($wo['products_categories'][1]);
$sub_key = array_keys($wo['products_categories'])[0];
if (!empty($_GET['key']) && in_array($_GET['key'], array_keys($wo['products_categories']))) {
  $sub_key = $_GET['key'];
}
?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Administrar</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Categorias</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sub categorias productos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Nuevo</h6>
                  <div class="row">
                       <div class="col-md-12" style="margin-bottom:0;">
                        <div class=" add_category_form_alert"></div>
                            <form method="POST" id="add_category_form">
                              <div class="row">
                                <div class="col-md-2" id="normal-query-form">
                                  <div class="form-group form-float">
                                    <div class="form-line">
                                      <label class="form-label">&nbsp;</label>
                                      <select class="form-control show-tick" id="category_id" name="category_id">
                                        <?php foreach ($wo['products_categories'] as $category) {
                                            $cat_id_produc = $category['id'];
                                            $cat_nombre_produc = $wo["lang"][$category["lang_key"]]; ?>
                                            <?php if(!$cat_id_produc==0): ?>
                                                <option value="<?php echo($cat_id_produc) ?>"><?php echo $cat_nombre_produc;?></option>
                                            <?php endif ?>
                                        <?php  } ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
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
                                <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Logo</label>
                                        <div class="btn-file d-flex align-items-center">
                                            <input type="file" id="icono_categorias" accept="image/x-png, image/gif, image/jpeg" name="media_file" class="hidden">
                                            <div class="mr-2 change-file-ico">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
                                            </div>
                                            <div class="full-width">
                                                <b id="icono_categorias-name">Logo</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
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
                  <h6 class="card-title">Sub categorias</h6>
                  <div class="row">
                       <div class="col-md-6" style="margin-bottom:0;">
                            <form method="get" action="<?php echo lui_LoadAdminLinkSettings('products-sub-categories'); ?>">
                              <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                        <select class="form-control show-tick" name="key">
                                            <?php foreach($wo['products_categories'] as $key => $category){
                                                $cat_id_produc = $category['id'];
                                                $cat_nombre_produc = $wo["lang"][$category["lang_key"]];
                                                ?>
                                                <?php if(!$cat_id_produc==0): ?>
                                                <option value="<?php echo $cat_id_produc?>" <?php echo (!empty($_GET['key']) && $_GET['key'] == $key) ? 'selected' : '' ?>><?php echo $cat_nombre_produc ?></option>
                                                <?php endif ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <div class="col-md-1">
                                   <button class="btn btn-info">Mostrar</button>
                                </div>
                              </div>

                              <div class="clearfix"></div>
                           </form>
                       </div>
                   </div>
                   <br>
                   <div class="clearfix"></div>
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                      <th>Logo</th>
					                  <th>Nombre</th>
					                  <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (!empty($wo['products_sub_categories'][$sub_key])) {
                                  foreach ($wo['products_sub_categories'][$sub_key] as $id => $sub_category) {
                                    $wo['category_key'] = $sub_category['id'];
                                    $wo['category_name'] = $sub_category['lang'];
                                    $wo['category_lang_key'] = $sub_category['lang_key'];
                                    $wo['category_logo'] = $sub_category['logo'];
                                    echo lui_LoadAdminPage('products-sub-categories/list');
                                  }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar seleccionado<span></span></button>
                            </div>
                        </div>
                    <div class="clearfix"></div>
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar sub categoria?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres eliminar esta sub categoria?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar sub categoria?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres eliminar esta sub categoria?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Editar sub categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_category_form_alert"></div>
        <form class="edit_category_lang" method="POST" id="modal-body-langs">
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
          <input type="hidden" name="categoria_id" id="categoria_idd" value="">
        </form>
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_edited_category">Guardar</button>
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
<script>
$("#icono_categorias").change(function () {
        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $("#icono_categorias-name").text(filename);
        });
var add_category_form = $('form#add_category_form');
var edit_category_form = $('form.edit_category_lang');

add_category_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_sub_category&type=product',
    beforeSend: function() {
        add_category_form.find('.waves-effect').text("Por favor espere..");
    },
    success: function(data) {
        if (data.status == 200) {
            add_category_form.find('.waves-effect').text('Guardar');
            $('.add_category_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i>La sub categoria se agrego con exito</div>');
            setTimeout(function () {
                $('.add_category_form_alert').empty();
            }, 2000);
            window.location.reload();
        }
        else{
          $('.add_category_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.add_category_form_alert').empty();
            }, 2000);
        }
    }
});

edit_category_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_lang_key_sub_categoria&hash=' + $('.main_session').val(),
    beforeSend: function() {
        edit_category_form.find('.waves-effect').text("Por favor espere..");
    },
    success: function(data) {
        console.log(data)
        if (data.status == 200) {
            edit_category_form.find('.waves-effect').text('Guardar');
            $('.edit_category_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Sub categoria editado con exito</div>');
            setTimeout(function () {
                $('.edit_category_form_alert').empty();
            }, 3000);
            window.location.reload();
        }
        else{
          $('.edit_category_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.edit_category_form_alert').empty();
            }, 2000);
        }
    }
});

$(document).on('click','#save_edited_category', function(event) {
  event.preventDefault();
  $('.edit_category_lang').submit();
});

function edit_category(id,id_categoria) {
  $('#id_of_key').val(id);
  $('#categoria_idd').val(id_categoria);
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_category_langs', {lang_key: id,categoria_id:id_categoria}, function(data, textStatus, xhr) {
      if (data.status == 200) {
        $('.data_lang').html(data.html);
        $('#editcategoryModal').modal();
      }
  });
}

$('.check-all').on('click', function(event) {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$('.delete-checkbox, .check-all').change(function(event) {
    $('.delete-selected').attr('disabled', false);
    $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
});

$('.delete-selected').on('click', function(event) {
    event.preventDefault();
    $('#SelectedDeleteModal').modal('show');
});
function DeleteSelected() {
    data = new Array();
    $('td input:checked').parents('tr').each(function () {
        data.push($(this).attr('data_selected'));
    });
    $('.delete-selected').attr('disabled', true);
    $('.delete-selected').text('Please wait..');
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_sub_category&type=product", {ids: data}, function () {
        $.each( data, function( index, value ){
            $('#list-' + value).remove();
        });
        $('.delete-selected').text('Delete Selected');
    });
}
function Wo_DeleteCat(id,type = 'show') {
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteCat('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
  $('#list-' + id).fadeOut(300, function() {
    $(this).remove();
  });
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_sub_category&type=product', {lang_key: id}, function(data, textStatus, xhr) {});
}



</script>