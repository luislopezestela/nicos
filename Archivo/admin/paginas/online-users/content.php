<?php 

$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$db->pageLimit  = 50;
$link = '';

if (!empty($filter_keyword)) {
  $link .= '&query='.$filter_keyword;
  $sql   = "(
    `username`     LIKE '%$filter_keyword%' OR 
    `email`        LIKE '%$filter_keyword%' OR 
    `first_name`   LIKE '%$filter_keyword%' OR 
    `ip_address`   LIKE '%$filter_keyword%' OR 
    `phone_number` LIKE '%$filter_keyword%' OR 
    `last_name`    LIKE '%$filter_keyword%'
  )";

  $users = $db->where($sql);
}


if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
    if ($_GET['range'] == 'Today' || $_GET['range'] == 'Yesterday') {
        $this_start = strtotime(date('M')." ".date('d').", ".date('Y')." 12:00am");
        $this_end = strtotime(date('M')." ".date('d').", ".date('Y')." 11:59pm");
        if ($_GET['range'] == 'Yesterday') {
            $this_start = strtotime(date('M')." ".date('d',strtotime("-1 days")).", ".date('Y')." 12:00am");
            $this_end = strtotime(date('M')." ".date('d',strtotime("-1 days")).", ".date('Y')." 11:59pm");
        }
        $main_range = 'Today';
        $title = "Daily";
    }
    elseif ($_GET['range'] == 'This Week') {
        $time = strtotime(date('l').", ".date('M')." ".date('d').", ".date('Y'));

        if (date('l') == 'Saturday') {
            $this_start = strtotime(date('M')." ".date('d').", ".date('Y')." 12:00am");
        }
        else{
            $this_start = strtotime('last saturday, 12:00am', $time);
        }

        if (date('l') == 'Friday') {
            $this_end = strtotime(date('M')." ".date('d').", ".date('Y')." 11:59pm");
        }
        else{
            $this_end = strtotime('next Friday, 11:59pm', $time);
        }
        
        $main_range = 'This Week';
        $title = "Weekly";
    }
    elseif ($_GET['range'] == 'This Month' ||$_GET['range'] == 'Last Month') {
        $this_start = strtotime("1 ".date('M')." ".date('Y')." 12:00am");
        $this_end = strtotime(cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'))." ".date('M')." ".date('Y')." 11:59pm");
        if ($_GET['range'] == 'Last Month') {
            $this_start = strtotime("1 ".date('M',strtotime("-1 month"))." ".date('Y')." 12:00am");
            $this_end = strtotime(cal_days_in_month(CAL_GREGORIAN, date('m',strtotime("-1 month")), date('Y'))." ".date('M',strtotime("-1 month"))." ".date('Y')." 11:59pm");
        }
        $main_range = 'This Month';
        $title = "Monthly";
    }
    elseif ($_GET['range'] == 'This Year') {
        $this_start = strtotime("1 January ".date('Y')." 12:00am");
        $this_end = strtotime("31 December ".date('Y')." 11:59pm");
        $main_range = 'This Year';
        $title = "Yearly";
    }
}
$start = '';
$end = '';
$first_code = '';
$second_code = '';
if (!empty($_GET['range']) && !in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
    $arr = explode('-', $_GET['range']);
    if (preg_match('~(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d~m', $arr[0]) && preg_match('~(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d~m', $arr[1])) {
        $start = lui_Secure($arr[0]);
        $end = lui_Secure($arr[1]);
        $this_start = strtotime($start);
        $this_end = strtotime($end);
        $month_days = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
        $diff = abs(strtotime($end) - strtotime($start));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        if ($years >= 1) {
            $array = array();
            for ($i=date('Y',strtotime($start)); $i <= date('Y',strtotime($end)); $i++) { 
                $array["'".$i."'"] = 0;
            }
            $main_range = 'Custom';
            $code = 'Y';
            $title = "Yearly";
        }
        elseif ($months >= 1) {
            $array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0);
            $code = 'm';
            $main_range = 'This Year';
            $title = "Monthly";
            if (date('Y',strtotime($start)) == date('Y',strtotime($end))) {
                $array = array();
                for ($i=date('m',strtotime($start)); $i <= date('m',strtotime($end)); $i++) { 
                    $array["'".(int)$i."'"] = 0;
                }
                $code = 'm';
                $main_range = 'Custom';
            }
            else{
                $month = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
                $array = array();
                for ($i=(int)date('m',strtotime($start)); $i <= 12; $i++) { 
                    $array["'".(int)$i.'-'.date('Y',strtotime($start))."'"] = 0;
                }
                for ($i=1; $i <= (int)date('m',strtotime($end)); $i++) { 
                    $array["'".(int)$i.'-'.date('Y',strtotime($end))."'"] = 0;
                }
                $first_code = 'm';
                $second_code = 'Y';
                $main_range = 'Custom';
            }
        }
        elseif ($days > 7) {
            if (date('m',strtotime($start)) == date('m',strtotime($end))) {
                $array = array();
                for ($i=date('d',strtotime($start)); $i <= date('d',strtotime($end)); $i++) { 
                    $array["'".(int)$i."'"] = 0;
                }
                $code = 'd';
                $main_range = 'Custom';
            }
            else{
                $month = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
                $array = array();
                for ($i=(int)date('d',strtotime($start)); $i <= $month; $i++) { 
                    $array["'".(int)$i.'-'.date('m',strtotime($start))."'"] = 0;
                }
                for ($i=1; $i <= (int)date('d',strtotime($end)); $i++) { 
                    $array["'".(int)$i.'-'.date('m',strtotime($end))."'"] = 0;
                }
                $first_code = 'd';
                $second_code = 'm';
                $main_range = 'Custom';
            }
            $title = "Daily";
        }
        elseif ($days >= 1 && $days < 8) {
            $title = "Daily";
            $code = 'l';
            $array = array('Saturday' => 0 , 'Sunday' => 0 , 'Monday' => 0 , 'Tuesday' => 0 , 'Wednesday' => 0 , 'Thursday' => 0 , 'Friday' => 0);
            if (date('m',strtotime($start)) == date('m',strtotime($end))) {
                $array = array();
                for ($i=date('d',strtotime($start)); $i <= date('d',strtotime($end)); $i++) { 
                    $array["'".(int)$i."'"] = 0;
                }
                $code = 'd';
                $main_range = 'Custom';
            }
            else{
                $month = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
                $array = array();
                for ($i=(int)date('d',strtotime($start)); $i <= $month; $i++) { 
                    $array["'".(int)$i.'-'.date('m',strtotime($start))."'"] = 0;
                }
                for ($i=1; $i <= (int)date('d',strtotime($end)); $i++) { 
                    $array["'".(int)$i.'-'.date('m',strtotime($end))."'"] = 0;
                }
                $first_code = 'd';
                $second_code = 'm';
                $main_range = 'Custom';
            }
        }
    }
}


$rang_link = $link;
if (!empty($this_start) && !empty($this_end)) {
    $link .= "&range=".lui_Secure($_GET['range']);
    $db->where('joined',$this_start,'>=')->where('joined',$this_end,'<=');
}
$sort_link = $link;
$sort_array = array('DESC_i' => array('user_id' , 'DESC'),
                    'ASC_i'  => array('user_id' , 'ASC'),
                    'DESC_u' => array('username' , 'DESC'),
                    'ASC_u'  => array('username' , 'ASC'),
                    'DESC_e' => array('email' , 'DESC'),
                    'ASC_e'  => array('email' , 'ASC'),
                    'DESC_s' => array('active' , 'DESC'),
                    'ASC_s'  => array('active' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
    $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
    $link .= "&sort=".lui_Secure($_GET['sort']);
    $rang_link .= "&sort=".lui_Secure($_GET['sort']);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('user_id', 'DESC');
} 
$db->where('lastseen',time() - 60,'>');
$users = $db->objectbuilder()->paginate(T_USERS, $page);
if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_LoadAdminLinkSettings('online-users'));
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
                    <a>Usuarios</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Usuarios en linea</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
					<div id="dashboard-daterangepicker" class="btn btn-outline-light pull-right">
                            <?php 
                            if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
                                echo $_GET['range'];
                            }else if (!empty($start) && !empty($end)){
                                echo $_GET['range'];
                            }else{
                                echo 'All';
                            } ?>
                        </div>
                    <div class="row">
                      <div class="col-md-12">
                         <div class="site-settings-alert"></div>
                      </div>
                      <div class="col-md-9" style="margin-bottom:0;">
                        <form method="get" action="<?php echo lui_LoadAdminLinkSettings('online-users'); ?>">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group form-float">
                                  <div class="form-line">
                                    <label class="form-label search-form">
                                        Buscar
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
                          <div class="clearfix"></div>
                        </form>
                      </div>
                      <div class="col-md-3" style="margin-bottom:0;">
                        
                       </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                              <th>ID 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                              <th>Username 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_u') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=ASC_u") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=DESC_u") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                              <th>Source</th>
                              <th>E-mail 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_e') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=ASC_e") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=DESC_e") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                              <th>IP Address</th>
                              <th>Status 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_s') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=ASC_s") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('online-users?page-id=1').$sort_link."&sort=DESC_s") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                foreach ($users as $userlist) {
                                  $wo['userlist'] = lui_UserData($userlist->user_id);
                                  echo lui_LoadAdminPage('manage-users/list');
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
                              <a href="<?php echo lui_LoadAdminLinkSettings('online-users?page-id=1').$link; ?>" data-ajax="?path=online-users&page-id=1<?php echo($link); ?>" class="waves-effect" title='First Page'>
                                  <i class="material-icons">first_page</i>
                              </a>
                            </li>
                            <?php if ($page > 1) {  ?>
                              <li>
                                  <a href="<?php echo lui_LoadAdminLinkSettings('online-users?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=online-users&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Previous Page'>
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
                                <a href="<?php echo lui_LoadAdminLinkSettings('online-users?page-id=' . ($i)).$link; ?>" data-ajax="?path=online-users&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                  <?php echo $i ?>   
                                </a>
                              </li>

                            <?php } $nums++; }?>

                            <?php if ($db->totalPages > $page) { ?>
                              <li>
                                  <a href="<?php echo lui_LoadAdminLinkSettings('online-users?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=online-users&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                      <i class="material-icons">chevron_right</i>
                                  </a>
                              </li>
                            <?php } ?>
                            <li>
                              <a href="<?php echo lui_LoadAdminLinkSettings('online-users?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=online-users&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                  <i class="material-icons">last_page</i>
                              </a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                      <div class="clearfix"></div>
                      <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <span>Action</span>
                            <select class="form-control show-tick" id="action_type">
                                <option value="activate">Activar</option>
                                <option value="deactivate">Desactivar</option>
                                <option value="delete">Eliminar</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <span>&nbsp;</span>
                            <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Confirmar<span></span></button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar usuario?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar este usuario?
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar usuario?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar los usuarios seleccionados?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DeleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Delete User Posts?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               ¿Esta seguro de que desea eliminar estas publicaciones de usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="FollowersForm" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <form class="add-followers" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal1Label">Agregar seguidores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     <div class="site-settings-alert-modal"></div>
        
          <div class="form-group form-float">
              <div class="form-line">
                <label class="form-label">¿Cuántos seguidores quieres agregar? Puedes sumar entre 1 y <?php echo $db->getValue(T_USERS, "COUNT(*)");?>.</label>
                  <input type="number" id="followers" name="followers" class="form-control">
              </div>
          </div>
          <input type="hidden" id="user_id" name="user_id">
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Iniciar</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script>
jQuery(document).ready(function($) {
        var range = { "All": [moment().startOf('year') , moment().endOf('year')],
                      "Today": [moment() , moment()], 
                      "Yesterday": [moment().subtract(1, 'days') , moment().subtract(1, 'days')], 
                      "This_Week": [moment().subtract(6, 'days') , moment()],
                      "This_Month": [moment().startOf('month') , moment().endOf('month')],
                      "Last_Month": [moment().subtract(1, 'month').startOf('month') , moment().subtract(1, 'month').endOf('month')],
                      "This_Year": [moment().subtract(1, 'year').startOf('year') , moment().subtract(1, 'year').endOf('year')]}; 
        <?php 
        if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) { 
            if ($_GET['range'] == 'Today') { ?>
                var start = range.Today[0];
                var end = range.Today[1];
            <?php }elseif ($_GET['range'] == 'Yesterday') { ?>
                var start = range.Yesterday[0];
                var end = range.Yesterday[1];
            <?php }elseif ($_GET['range'] == 'This Week') { ?>
                var start = range.This_Week[0];
                var end = range.This_Week[1];
            <?php }elseif ($_GET['range'] == 'This Month') { ?>
                var start = range.This_Month[0];
                var end = range.This_Month[1];
            <?php }elseif ($_GET['range'] == 'Last Month') { ?>
                var start = range.Last_Month[0];
                var end = range.Last_Month[1];
            <?php }elseif ($_GET['range'] == 'This Year') { ?>
                var start = range.This_Year[0];
                var end = range.This_Year[1];
            <?php } ?>
        <?php } elseif (!empty($_GET['range']) && !empty($start) && !empty($end)) { ?>
            var start = "<?php echo($start) ?>";
            var end = "<?php echo($end) ?>";
        <?php } else{ ?>
            var start = range.All[0];
            var end = range.All[1];
        <?php } ?>

        function cb(start, end) {
            //$('#dashboard-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#dashboard-daterangepicker').daterangepicker({
            startDate: start,
            endDate: end,
            opens: $('body').hasClass('rtl') ? 'right' : 'left',
            ranges: {
                'All': [moment().startOf('year') , moment().endOf('year')],
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'This Week': [moment().subtract(6, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            }
        }, cb);

        

        cb(start, end);

        // setTimeout(function (argument) {
        //     $('.ranges ul li').removeClass('active');
        // },800);
        
        $(document).on('click', '.ranges ul li', function(event) {
            event.preventDefault();
            if ($(this).attr('data-range-key') != 'Custom Range') {
                $(document).off('click', '.ranges ul li');
                //location.href = "<?php echo lui_LoadAdminLinkSettings('online-users').$rang_link; ?>&range="+$(this).attr('data-range-key');
                $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('online-users').$rang_link; ?>&range="+$(this).attr('data-range-key'));
                $('#redirect_link').attr('data-ajax', "?path=online-users<?php echo('&'.$rang_link) ?>&range="+$(this).attr('data-range-key'));
                $('#redirect_link').click();
            }
        });
        $(document).on('click', '.applyBtn', function(event) {
            event.preventDefault();
            $(document).off('click', '.applyBtn');
            $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('online-users').$rang_link; ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
            $('#redirect_link').attr('data-ajax', "?path=online-users<?php echo('&'.$rang_link) ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
            $('#redirect_link').click();
            //location.href = "<?php echo lui_LoadAdminLinkSettings('online-users').$rang_link; ?>&range="+$('.drp-selected').html();
        });
});


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
    $('#SelectedDeleteModal').find('.modal-body').html('¿Estás seguro de que quieres '+action_type+' los usuarios seleccionados?');
    $('#SelectedDeleteModal').find('#exampleModal1Label').html(action_type+' user(s)');
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
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=delete_multi_users', {ids: data,type: action_type}, function () {
        if (action_type == 'delete') {
            $.each( data, function( index, value ){
                $('#UserID_' + value).remove();
            });
        }
        else{
            location.reload();
        }
        $('.delete-selected').text('Submit');
    });
}



function Wo_DeleteUserPosts(user_id,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal2').find('.btn-primary').attr('onclick', "Wo_DeleteUserPosts('"+user_id+"')");
    $('#DeleteModal2').modal('show');
    return false;
  }
  hash_id = $('#hash_id').val();
  $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'delete_user_posts', user_id: user_id, hash_id: hash_id},function(data) {
    if (data.status == 200) {
      $('.site-settings-alert.alert-success').html('<i class="fa fa-check"></i> Las publicaciones de los usuarios se estan eliminando en segundo plano, verifiquelo en un momento.');
      setTimeout(function () {
        $('.site-settings-alert.alert-success').html('');
      },3000);
    }
  });
}

function Wo_DeleteUser(user_id,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteUser('"+user_id+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  hash_id = $('#hash_id').val();
  $('#UserID_' + user_id).fadeOut(300, function() {
    $(this).remove();
  });
  $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'delete_user', user_id: user_id, hash_id: hash_id});
}
function getUserId(user_id) {
   $('#user_id').val(user_id);
}
$(function() {
    var form_site_settings = $('form.add-followers');
    form_site_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_followers',
        beforeSend: function() {
           $('.site-settings-alert.alert-danger').empty();
            $('#submitLikes').text('Please wait..');
        },
        success: function(data) {
            if (data['status'] == 200) {
                $('#submitLikes').text('Add');
                $('#closeLikesForm').click();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.site-settings-alert-modal').html('<div class="alert alert-success"><i class="fa fa-check"></i> Followers are being added in the background, this process might take few mins.</div>');
                setTimeout(function () {
                    $('.site-settings-alert-modal').empty();
                }, 10000);
            } else if (data['status'] == 500) {
              $('#submitLikes').text('Add');
              $('.site-settings-alert-modal').html('<div class="alert alert-danger">'+data['error']+'</div>');
            }
        }
    });
});
$('#FollowersForm').on('hidden.bs.modal', function () {
  $('.site-settings-alert-modal').empty();
})
</script>