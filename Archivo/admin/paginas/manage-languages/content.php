<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Lenguajes</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar Lenguajes</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Administrar & Editar Lenguajes</h6>
                    <div class="langs-settings-alert"></div>
                    <div class="alert alert-info">Puede administrar, editar y eliminar idiomas.</div>
                   <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" style="table-layout: inherit; border-top: 1px solid;">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                    <th style="text-align: center;">Nombre</th>
                                    <th style="text-align: center;">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $langs = lui_LangsNamesFromDB();
                                if (count($langs) > 0) {
                                    foreach ($langs as $key => $wo['langs']) {
                                        $wo['langs_'] = $wo['langs'];
                                        $wo['langs'] = ucfirst($wo['langs']);
                                        echo lui_LoadAdminPage('manage-languages/list');
                                    }
                                }  
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <span>&nbsp;</span>
                            <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar seleccionado <span></span></button>
                        </div>
                    </div>
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
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar lenguaje?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar este idioma?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar lenguaje?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar los idiomas seleccionados?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Eliminar</button>
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
    $('.submit-selected').on('click', function(event) {
        event.preventDefault();
        $('#SelectedStatusModal').modal('show');
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
        $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_lang", {ids: data}, function () {
            $.each( data, function( index, value ){
                $('#' + value).remove();
            });
            $('.delete-selected').text('Eliminar seleccionado');
        });
    }
function Wo_DeleteLang(id,type = 'show') {
  if (id == '') {
    return false;
  }
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteLang('"+id+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  $('#' + id).fadeOut(300, function () {
      $(this).remove();
  });
  $.get(Wo_Ajax_Requests_File(), {f: 'admin_setting', s:'delete_lang', id:id});
}

function update_lang_status(self,name) {
    value = 1;
    if ($(self).attr('data-type') == 'disable') {
        value = 0;
    }
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=update_lang_status", {name:name,value:value}, function(data, textStatus, xhr) {
        if ($(self).attr('data-type') == 'disable') {
            $(self).attr('data-type','enable');
            $(self).html('Enable');
        }
        else{
            $(self).attr('data-type','disable');
            $(self).html('Disable');
        }
        $('.langs-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Estado de idioma actualizado.</div>');
        setTimeout(function () {
            $('.langs-settings-alert').empty();
        }, 2000);
    });
}
</script>