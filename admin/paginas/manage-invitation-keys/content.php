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
                <li class="breadcrumb-item active" aria-current="page">Codigos de invitacion</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="add-invitation" class="pull-right"><button type="submit" class="btn btn-warning waves-effect waves-light m-t-20">Generar nuevo codigo</button></form>
                  <h6 class="card-title">Administrar codigos de invitacion</h6>
                  
                     <div>Este sistema se utiliza para invitar a los usuarios a su sitio si el sistema de registro esta desactivado.</div>
                     <br>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                   <th>ID</th>
                                   <th>Creado</th>
                                   <th>Codigo de invitacion</th>
                                   <th>Estado</th>
                                   <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody class="manage-invitation-list">
                                <?php 
                                foreach (lui_GetAdminInvitation() as $wo['invitation']) {
                                    echo lui_LoadAdminPage('manage-invitation-keys/list');
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar codigo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar este codigo?
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar codigo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar el Codigo seleccionado?
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
    $('.delete-selected').text('Please wait..');
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_code", {ids: data}, function () {
        $.each( data, function( index, value ){
            $("tr[data-invitation='"+value+"']").remove();
        });
        $('.delete-selected').text('Delete Selected');
    });
}
function DeleteBan(id,type = 'show') {
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteBan('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
 $("tr[data-invitation='"+id+"']").remove();
 $.ajax({
    url:  Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'manage-invitation',s:'rm-invitation',id:id},
 })
 .done(function(data) {
    if (data.status == 200) {
       
    }
 })
 .fail(function() {
    console.log("error");
 })
}
jQuery(document).ready(function($) {
      $('#add-invitation').ajaxForm({
      url: Wo_Ajax_Requests_File(),
      type:'GET',
      dataType:'json',
      data: {f: 'manage-invitation',s:'insert-invitation'},
      beforeSend: function() {
        $('#add-invitation').find('button').text('Por favor espere..');
      },
      success: function(data) {
        if (data.status == 200) {
            if ($('tr.setting-invitation').length > 0) {
               $('.manage-invitation-list').prepend(data.html);            
            }
            else{
               $('.manage-invitation-list').html(data.html); 
            }
        } 
        $('#add-invitation').find('button').text('Generar nuevo codigo');
      }});

      $(document).on('click', '.copy-invitation-url', function(event) {
         event.preventDefault();
           var $temp = $("<input>");
           $("body").append($temp);
           $temp.val($(this).attr('data-link')).select();
           document.execCommand("copy");
           $temp.remove();
           $(this).addClass('main');
      });

   });
</script>