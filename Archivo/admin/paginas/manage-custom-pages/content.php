<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Paginas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar paginas personalizadas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
					<a href="<?php echo lui_LoadAdminLinkSettings('add-new-custom-page'); ?>" class="btn btn-info waves-effect waves-light m-t-20 pull-right">Crear nueva pagina personalizada</a>
                  <h6 class="card-title">Administrar y editar paginas personalizadas</h6>
                  
                  <div class="clearfix"></div>
                  <br>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                   <th>ID</th>
					               <th>Nombre de pagina</th>
					               <th>Titulo de pagina</th>
					               <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
				                foreach (lui_GetCustomPages() as $wo['page']) {
				                    echo lui_LoadAdminPage('manage-custom-pages/list');
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar pagina?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estas seguro de que quieres eliminar esta pagina?
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar pagina?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar la pagina seleccionada?
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
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_page", {ids: data}, function () {
        $.each( data, function( index, value ){
            $('#'+value).remove();
        });
        $('.delete-selected').text('Eliminar seleccionado');
    });
}
function Wo_DeleteCustomPage(id,type = 'show') {
  if (id == '') {
    return false;
  }
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteCustomPage('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
  $('#' + id).fadeOut(300, function () {
	  $(this).remove();
	});
  $.get(Wo_Ajax_Requests_File(), {f: 'admin_setting', s:'delete_page', id:id});
}
</script>