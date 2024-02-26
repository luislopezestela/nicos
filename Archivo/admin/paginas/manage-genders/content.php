<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Usuarios</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar generos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
					<button class="btn btn-info float-right" id="add_new_gender">Agregar</button>
                    <h6 class="card-title">Administrar y editar generos</h6>
                    <div class="row">
                       <div class="col-md-12" style="margin-bottom:0;">
                        <div class=" add_category_form_alert"></div>
                              <div class="clearfix"></div>
                       </div>
                   </div>
                   <br>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                   <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                   <th>ID</th>
                                   <th>Nombre clave</th>
                                   <th>Valor</th>
                                   <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $wo['gender_id'] = 1;
                                foreach ($wo['genders'] as $wo['gender_key'] => $wo['gender']) {
                                    echo lui_LoadAdminPage('manage-genders/list');
                                    $wo['gender_id'] = $wo['gender_id'] + 1;
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
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
    <!-- #END# Vertical Layout -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar genero?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar este genero?
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar genero?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar el genero seleccionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<script>
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
          $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_gender", {ids: data}, function () {
              $.each( data, function( index, value ){
                  $("#"+value).remove();
              });
              $('.delete-selected').text('Eliminar seleccionados');
          });
      }
$('.btn-lang').on('click', function(event) {
    $('#defaultModal .modal-body form .data').html('<div class="preloader pl-size-xl "><div class="spinner-layer pl-teal"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
    var lang_id = $(this).attr('data-id');
    $.get(Wo_Ajax_Requests_File() + '?f=get_lang_key', {id: lang_id, lang_name: lang_id}, function(data, textStatus, xhr) {
        if (data.have_image == 1) {
            $('#gender_icon').css('display', 'block');
        }
        else{
            $('#gender_icon').css('display', 'none');
        }
        $('#defaultModal .modal-title').html('Editar clave: ' + lang_id);
        $('#id_of_key').val(lang_id);
        $('#defaultModal .modal-body form .data').html(data.html);
    });
});
function Wo_SubmitLangForm() {
    $('.edit-key-settings').submit();
}
function Wo_SubmitAddGenderForm() {
    $('.langsModalForm').submit();
}
$(function () {
  var form_lang_settings = $('form.edit-key-settings');
    form_lang_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_lang_key&hash=' + $('.main_session').val(),
        beforeSend: function() {
            $('.btn-save').text('Please wait..');
        },
        success: function(data) {
            if (data.status == 200) {
                $('.btn-save').text('Guardar cambios');
                var value_to_use = $('[data-editable=1]').val();
                var id_of_key = $('#id_of_key').val();
                $('#edit_' + id_of_key).text(value_to_use);
                $('#defaultModal').modal('hide');
                location.reload();
            }
        }
    });

    var form_gender_settings = $('form.langsModalForm');
    form_gender_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_gender&hash=' + $('.main_session').val(),
        beforeSend: function() {
            $('.btn-save').text('Please wait..');
        },
        success: function(data) {
            
            if (data.status == 200) {
                $('.btn-save').text('Guardar cambios');
                $('#langsModal').modal('hide');
                location.reload();
            }
            else{
                $('.btn-save').text('Guardar cambios');
                $('.langsModalAlert').html('<div class="alert alert-danger">'+data.message+'</div>');
                setTimeout(function () {
                    $('.langsModalAlert').empty();
                }, 2000);
            }
            $("#langsModal").animate({ scrollTop: 0 }, 100);

        }
    });
});

$(document).on('click', '#add_new_gender', function(event) {
    $('#langsModal').modal('show');
});
function Wo_DeleteGender(key,type = 'show') {
  if (key == '') {
    return false;
  }
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteGender('"+key+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  $('#' + key).fadeOut(300, function () {
    $(this).remove();
  });
  $.get(Wo_Ajax_Requests_File(), {f: 'admin_setting', s:'delete_gender', key:key});
}
</script>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="edit-lang-settings-alert"></div>
                <form class="edit-key-settings" method="POST">
                    <div class="data"></div>
                    <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    <input type="hidden" name="id_of_key" id="id_of_key" value="">
                    <div class="form-group form-float">
                        <div class="form-line focused">
                            <label class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control">
                        </div>
                    </div>
                    <div id="gender_icon" style="display: none;">
                        <label for="icon_to_use">Icono a utilizar</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="icon_to_use" id="icon_to_use-enabled" value="1">
                                <label class="form-check-label" for="icon_to_use-enabled">Por defecto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="icon_to_use" id="icon_to_use-disabled" value="0" checked>
                                <label class="form-check-label" for="icon_to_use-disabled" class="m-l-20">Mi icono</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="Wo_SubmitLangForm();">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="langsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="langsModalLabel">Agregar genero</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="langsModalAlert"></div>
                <form class="langsModalForm" method="POST">
                    <?php foreach (lui_LangsNamesFromDB() as $wo['key_']) { ?>
                        <div class="form-group">
                            <div class="form-lins">
                                <label class="form-lasbel"><?php echo ucfirst($wo['key_']); ?></label>
                                <textarea style="resize: none;" name="<?php echo $wo['key_']; ?>" id="<?php echo $wo['key_']; ?>" class="form-control" cols="20" rows="2"></textarea>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="data"></div>
                    <div class="form-group form-float">
                        <div class="form-line focused">
                            <label class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="Wo_SubmitAddGenderForm();">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>