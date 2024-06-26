<?php
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'),
                    'DESC_u' => array('username' , 'DESC'),
                    'ASC_u'  => array('username' , 'ASC'),
                    'DESC_t' => array('pro_type' , 'DESC'),
                    'ASC_t'  => array('pro_type' , 'ASC'),
                    'DESC_s' => array('pro_time' , 'DESC'),
                    'ASC_s'  => array('pro_time' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
    $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$requests = $db->get(T_REFUND); 
$db->where('recipient_id',0)->where('admin',1)->where('seen',0)->where('type','refund')->update(T_NOTIFICATION,array('seen' => time()));
?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Sistema pro</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar reembolso profesional</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Administrar reembolso profesional</h6>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                      <th>ID 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('pro-refund?page-id=1')."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('pro-refund?page-id=1')."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
					                  <th>Usuario</th>
									  <th>Mensaje</th>
					                  <th>Estado</th>
					                  <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                if (!empty($requests)) {
          				            foreach ($requests as $wo['verification']) {
                                        $wo['verification'] = (Array)$wo['verification'];
                                        $wo['verification']['user_data'] = lui_UserData($wo['verification']['user_id']);
                                        if (empty($wo['verification']['order_hash_id'])) {
                                            $user_pro_type = lui_GetUserProType($wo['verification']['user_data']['pro_type']);
                                            $wo['verification']['type_name'] = $user_pro_type['type_name'];
                                        }
                                        else{
                                            $wo['verification']['type_name'] = '';
                                        }
          				                echo lui_LoadAdminPage('pro-refund/list');
          				            }
                                }
				                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                          <div class="col-lg-2 col-md-2">
                              <span>Accion</span>
                              <select class="form-control show-tick" id="action_type">
                                  <option value="approve">Aprobar</option>
                                  <option value="delete">Eliminar</option>
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3">
                              <span>&nbsp;</span>
                              <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Aceptar<span></span></button>
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
                <h5 class="modal-title" id="exampleModal1Label">¿Borrar peticion?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar esta solicitud?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Borrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DeleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Aprobar solicitud?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estas seguro de que quieres aprobar esta solicitud?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aprobar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Borrar peticion?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               ¿Esta seguro de que desea eliminar las solicitudes seleccionadas?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Aceptar</button>
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
    action_type = $('#action_type').val();
    $('#SelectedDeleteModal').find('.modal-body').html('¿Estás seguro de que quieres '+action_type+' la(s) solicitud(es) seleccionada(s)?');
    $('#SelectedDeleteModal').find('#exampleModal1Label').html(action_type+' request(s)');
    $('#SelectedDeleteModal').modal('show');
});
function DeleteSelected() {
    action_type = $('#action_type').val();
    data = new Array();
    $('td input:checked').parents('tr').each(function () {
        data.push($(this).attr('data_selected'));
    });
    $('.delete-selected').attr('disabled', true);
    $('.delete-selected').text('Please wait..');
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=delete_multi_refund', {ids: data,type: action_type}, function () {
        if (action_type == 'delete') {
            $.each( data, function( index, value ){
                $('#VerificationID_' + value).remove();
            });
        }
        else{
            //location.reload();
        }
        $('.delete-selected').text('Submit');
    });
}

function Wo_DeleteRefund(id,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteRefund('"+id+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  var delete_icon = $('.setting-verification-container').find('#VerificationID_' + id).find('.delete-verification');
  $('#review-verif-request-info-'+id).slideUp(function(){
        $(this).remove();
        $('#VerificationID_' + id).fadeOut(300, function() {
          $(this).remove();
        });
      })
  $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s:'delete_refund', id:id});
}

function Wo_ApproveRefund(id,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal2').find('.btn-primary').attr('onclick', "Wo_ApproveRefund('"+id+"')");
    $('#DeleteModal2').modal('show');
    return false;
  }
  $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s:'approve_refund', id:id}, function(data) {
    if (data.status == 200) {
      var delete_icon = $('.setting-verification-container').find('#VerificationID_' + id).find('.delete-verification');
  $('#review-verif-request-info-'+id).slideUp(function(){
        $(this).remove();
        $('#VerificationID_' + id).fadeOut(300, function() {
          $(this).remove();
        });
      })

    }
  });
}
function Wo_ToggleVerfRequest(id,self){
  if (!id || !self) {
    return false;
  }
  $(self).find('i').toggleClass('rotate-90d');
  $("#review-verif-request-info-"+id).slideToggle();

}

</script>

<style>
  .review-verif-request-cont{
    width: 100%;
    overflow: hidden;
    margin: 5px 0;
  }
  .review-verif-request-cont div{
    width: 200px;
    height: 150px;
    float: left;
    cursor: pointer;
    margin: 0 5px 5px 0;
  }

  .review-verif-request-cont h4{
    width: 100%;
    color: #666;
    font-size: 14px;
    font-weight: 600;
  }

  .toggle-verification-request{
    padding: 3px 5px;
  }
</style>