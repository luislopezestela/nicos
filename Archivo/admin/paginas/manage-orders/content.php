<?php 

$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$filter_type    = '';
$db->pageLimit  = 50;
$link = '';

// if (!empty($filter_keyword)) {
//   $link .= '&query='.$filter_keyword;
//   $sql   = "(`title` LIKE '%$filter_keyword%' OR `desc` LIKE '%$filter_keyword%')";
//   $db->where($sql);
// }
$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
  $link .= "&sort=".lui_Secure($_GET['sort']);
  $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$posts = $db->groupBy('hash_id')->objectbuilder()->paginate(T_USER_ORDERS, $page);

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_LoadAdminLinkSettings('manage-orders'));
  exit();
}

?>

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
                <li class="breadcrumb-item active" aria-current="page">Administrar compras</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Administrar compras</h6>
                  <!-- <div class="row">
                      <div class="col-md-9" style="margin-bottom:0;">
                        <form method="get" action="<?php echo lui_LoadAdminLinkSettings('manage-orders'); ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-float">
                                  <div class="form-line">
                                    <label class="form-label search-form">
                                        Search for title, description.
                                      </label>
                                      <input type="text" name="query" id="query" class="form-control" value="<?php echo($filter_keyword); ?>">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-1">
                              <label>&nbsp;</label>
                               <button class="btn btn-info">Search</button>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div> -->
                   <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th width="50"><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                      <th>ID 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-orders?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-orders?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
					                  <th>Link</th>
					                  <th>Author</th>
					                  <th>Publicado</th>
                                      <th>Estado</th>
					                  <th width="220">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
				               foreach ($posts as $wo['order']) {
                                    $wo['order']->user_data = lui_UserData($wo['order']->user_id);
				                    echo lui_LoadAdminPage('manage-orders/list');
				                }
				               ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="wo-admincp-feturepager">
                        <div class="pull-left">
                            <span>
                              <?php echo "Mostrar $page de " . $db->totalPages; ?>
                            </span>
                        </div>
                        <div class="pull-right">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-orders?page-id=1').$link; ?>" data-ajax="?path=manage-orders&page-id=1<?php echo($link); ?>" class="waves-effect" title='First Page'>
                                          <i class="material-icons">first_page</i>
                                      </a>
                                    </li>
                                    <?php if ($page > 1) {  ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-orders?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=manage-orders&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Previous Page'>
                                              <i class="material-icons">chevron_left</i>
                                          </a>
                                      </li>
                                    <?php  } ?>

                                    <?php 
                                      $nums       = 0;
                                      $nums_pages = ($page > 4) ? ($page - 4) : $page;

                                      for ($i=$nums_pages; $i <= $db->totalPages; $i++) { 
                                        if ($nums < 20) {
                                    ?>
                                      <li class="<?php echo ($page == $i) ? 'active' : ''; ?>">
                                        <a href="<?php echo lui_LoadAdminLinkSettings('manage-orders?page-id=' . ($i)).$link; ?>" data-ajax="?path=manage-orders&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                          <?php echo $i ?>   
                                        </a>
                                      </li>

                                    <?php } $nums++; }?>

                                    <?php if ($db->totalPages > $page) { ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-orders?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=manage-orders&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                              <i class="material-icons">chevron_right</i>
                                          </a>
                                      </li>
                                    <?php } ?>
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-orders?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=manage-orders&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                          <i class="material-icons">last_page</i>
                                      </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <span>Accion</span>
                                <select class="form-control show-tick" id="action_type">
                                    <option value="delete">Eliminar</option>
                                      <option value="pendiente">Pendiente</option>
                                        <option value="aceptado">Aceptado</option>
                                        <option value="listo">Listo</option>
                                        <option value="enviado">Enviado</option>
                                        <option value="entregado">Entregado</option>
                                        <option value="cancelado">Cancelado</option>
                                </select>
                            </div>
                            <div class="col-lg-1 col-md-1">
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Confirmar<span></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<style type="text/css">
    .td-avatar {
    width: 28px;
}
</style>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar compra?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar este pedido?
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
                <h5 class="modal-title" id="exampleModal1Label">¿Alerta de acción?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres hacer esta acción?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ChangeStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Cambiar el estado del pedido?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea cambiar el estado de este pedido?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cambiar</button>
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
    $('.delete-selected').text('Espere..');
    action_type = $('#action_type').val();
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=order_multi_status', {ids: data,action_type: action_type}, function () {
        if (action_type == 'delete') {
            $.each( data, function( index, value ){
                $("#list_"+value).remove();
            });
        }
        $('.delete-selected').text('Confirmar');
        location.reload()
            
    });
}
function DeleteOrder(id,type = 'show') {
  if (!id) {
   return false;
  }
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteOrder('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
    $('#list_' + id).fadeOut(300, function() {
        $(this).remove();
    });
    $("#DeleteModal").modal('hide');
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=delete-order',{id: id});
  
}
function ChangeStatus(id,status,type = 'show') {
    if (!id) {
   return false;
  }
  if (type == 'hide') {
      $('#ChangeStatusModal').find('.btn-primary').attr('onclick', "ChangeStatus('"+id+"','"+status+"')");
      $('#ChangeStatusModal').modal('show');
      return false;
    }
    $("#ChangeStatusModal").modal('hide');
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=change_status',{id: id,status: status}, function(data, textStatus, xhr) {
        location.reload()
    });
}
</script>