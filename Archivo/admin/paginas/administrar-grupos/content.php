<?php
$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? Wo_Secure($_GET['query']) : '';
$filter_type    = '';
$db->pageLimit  = 50;
$link = '';

if (!empty($filter_keyword)) {
  $link .= '&query='.$filter_keyword;
  $sql   = "(
    `id`          LIKE '%$filter_keyword%' OR 
    `group_name`  LIKE '%$filter_keyword%' OR
    `group_title` LIKE '%$filter_keyword%' OR
    `about`       LIKE '%$filter_keyword%'
  )";
  
  $db->where($sql);
} 
$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'),
                    'DESC_n' => array('group_name' , 'DESC'),
                    'ASC_n'  => array('group_name' , 'ASC'),
                    'DESC_c' => array('category' , 'DESC'),
                    'ASC_c'  => array('category' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
  $link .= "&sort=".Wo_Secure($_GET['sort']);
  $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$groups = $db->objectbuilder()->paginate(T_GROUPS, $page);

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . Wo_LoadAdminLinkSettings('manage-groups'));
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
                    <a>Administrar caracteristicas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Grupos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">GRUPOS</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                  <i class="material-icons">people</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllData('group'); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">UNIDOS</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-info-bright text-info rounded-pill">
                                  <i class="material-icons">people_outline</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountGroupData('members'); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">PUBLICACIONES</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                  <i class="material-icons">mode_edit</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountGroupData('groups_posts'); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">SOLICITUD UNION</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                  <i class="material-icons">library_add</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountGroupData('join_requests'); ?></div>
                  </div>
              </div>
          </div>
      </div>
        
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Administrar y editar grupos</h6>
                    <div class="row">
                      <div class="col-md-4" style="margin-bottom:0;">
                        <form method="get" action="<?php echo lui_LoadAdminLinkSettings('manage-groups'); ?>">
                          <div class="row">
                            <div class="col-md-11">
                              <div class="form-group form-float">
                                  <div class="form-line">
                                    <label class="form-label search-form">
                                        Busque ID de grupo, nombre de grupo, titulo de grupo.
                                      </label>
                                      <input type="text" name="query" id="query" class="form-control" value="<?php echo($filter_keyword); ?>">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-1">
                              <label>&nbsp;</label>
                               <button class="btn btn-info">Buscar</button>
                            </div>
                          </div>
                          <br>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                   <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                   <div class="clearfix"></div>
                    <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                    <th>ID 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-groups?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-groups?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
					                <th>Nombre
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_n') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-groups?page-id=1').$sort_link."&sort=ASC_n") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-groups?page-id=1').$sort_link."&sort=DESC_n") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
					                <th>Dueño</th>
					                <th>Categoria 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_c') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-groups?page-id=1').$sort_link."&sort=ASC_c") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-groups?page-id=1').$sort_link."&sort=DESC_c") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                                    <th>Miembros</th>
					                <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
    				                foreach ($groups as $grouplist) {
                                        $wo['grouplist']            = lui_GroupData($grouplist->id);
                                        $wo['grouplist']['members'] = lui_CountGroupMembers($grouplist->id);
                                        $wo['grouplist']['owner']   = lui_UserData($grouplist->user_id);
    				                    echo lui_LoadAdminPage('administrar-grupos/list');
    				                }
				                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="wo-admincp-feturepager">
                        <div class="pull-left">
                            <span>
                              <?php echo "Mostrando $page de " . $db->totalPages; ?>
                            </span>
                        </div>
                        <div class="pull-right">
                          <nav>
                              <ul class="pagination">
                                  <li>
                                    <a href="<?php echo lui_LoadAdminLinkSettings('manage-groups?page-id=1').$link; ?>" data-ajax="?path=manage-groups&page-id=1<?php echo($link); ?>" class="waves-effect" title='First Page'>
                                        <i class="material-icons">first_page</i>
                                    </a>
                                  </li>
                                  <?php if ($page > 1) {  ?>
                                    <li>
                                        <a href="<?php echo lui_LoadAdminLinkSettings('manage-groups?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=manage-groups&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Previous Page'>
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
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-groups?page-id=' . ($i)).$link; ?>" data-ajax="?path=manage-groups&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                        <?php echo $i ?>   
                                      </a>
                                    </li>

                                  <?php } $nums++; }?>

                                  <?php if ($db->totalPages > $page) { ?>
                                    <li>
                                        <a href="<?php echo lui_LoadAdminLinkSettings('manage-groups?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=manage-groups&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                            <i class="material-icons">chevron_right</i>
                                        </a>
                                    </li>
                                  <?php } ?>
                                  <li>
                                    <a href="<?php echo lui_LoadAdminLinkSettings('manage-groups?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=manage-groups&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                        <i class="material-icons">last_page</i>
                                    </a>
                                  </li>
                              </ul>
                          </nav>
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
        </div>
        <div class="clearfix"></div>
    </div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Eliminar grupo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar el grupo seleccionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar grupo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar este grupo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
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
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_group", {ids: data}, function () {
        $.each( data, function( index, value ){
            $("#GroupID_"+value).remove();
        });
        $('.delete-selected').text('Delete Selected');
    });
}
function Wo_DeleteGroup(group_id,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteGroup('"+group_id+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  hash_id = $('#hash_id').val();
  $('#GroupID_' + group_id).fadeOut(300, function() {
    $(this).remove();
  });
  $.get(Wo_Ajax_Requests_File(),{f:'admin_setting',s:'delete_group',group_id: group_id, hash_id:hash_id});
}

</script>