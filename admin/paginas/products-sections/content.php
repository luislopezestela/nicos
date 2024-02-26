
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Administrar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Seccion de categorias</li>
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
                        <div class=" add_cat_section_form_alert"></div>
                            <form method="POST" id="add_cat_section_form">
                              <div class="row">
                                <input type="hidden" hidden name="add_section_productos" value="1">
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
                  <h6 class="card-title">Secciónes</h6>
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
					                  <th>Nombre</th>
					                  <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $section_keys = lui_GetSectionCatKeys('section_product');
                                if(!empty($wo['sections_categories'])){
	                                foreach ($wo['sections_categories'] as $section_id => $section_name) {
	                                  $wo['section_key'] = $section_id;
	                                  $wo['section_name'] = $wo["lang"][$section_keys[$section_id]];
	                                  $wo['section_lang_key'] = $section_keys[$section_id];
	                                	echo lui_LoadAdminPage('products-sections/list');
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar esta Sección?
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar la seccion seleccionada?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editsectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editsectionModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_section_form_alert"></div>
        <form class="edit_section_lang" method="POST" id="modal-body-langs">
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
          <input type="hidden" name="sections_id" id="sections_idd" value="">
        </form>
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_edited_section">Guardar</button>
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
var add_cat_section_form = $('form#add_cat_section_form');
var edit_section_form = $('form.edit_section_lang');

add_cat_section_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_section&type=product',
    beforeSend: function() {
        add_cat_section_form.find('.waves-effect').text("Por favor espere..");
    },
    success: function(data) {
        console.log(data)
        if (data.status == 200) {
            add_cat_section_form.find('.waves-effect').text('Guardar');
            $('.add_cat_section_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Sección agregado con exito</div>');
            setTimeout(function () {
                $('.add_cat_section_form_alert').empty();
            }, 2000);
            window.location.reload();
        }
        else{
          $('.add_cat_section_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.add_cat_section_form_alert').empty();
            }, 2000);
        }
    }
});

edit_section_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_lang_key_sections&hash=' + $('.main_session').val(),
    beforeSend: function() {
        edit_section_form.find('.waves-effect').text("Por favor espere..");
    },
    success: function(data) {
        if (data.status == 200) {
            edit_section_form.find('.waves-effect').text('Guardar');
            $('.edit_section_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Sección editada con exito</div>');
            setTimeout(function () {
                $('.edit_section_form_alert').empty();
            }, 3000);
            window.location.reload();
        }
        else{
          $('.edit_section_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.edit_section_form_alert').empty();
            }, 2000);
        }
    }
});

$(document).on('click','#save_edited_section', function(event) {
  event.preventDefault();
  $('.edit_section_lang').submit();
});

function edit_section(id,id_sections) {
  $('#id_of_key').val(id);
  $('#sections_idd').val(id_sections);
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_section_langs', {lang_key: id,sections_id:id_sections}, function(data, textStatus, xhr) {
      if (data.status == 200) {
        $('.data_lang').html(data.html);
        $('#editsectionModal').modal();
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
    $('.delete-selected').text('Por favor espere..');
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_section&type=product", {ids: data}, function () {
        $.each( data, function( index, value ){
            $('#list-' + value).remove();
        });
        $('.delete-selected').text('Eliminar seleccionado');
    });
}
function Wo_DeleteCat_section(id,type = 'show') {
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteCat_section('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
  $('#list-' + id).fadeOut(300, function() {
    $(this).remove();
  });
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_section&type=product', {lang_key: id}, function(data, textStatus, xhr) {});
}

</script>