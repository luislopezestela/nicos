<?php 
$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$filter_type    = '';
$db->pageLimit  = 50;
$link = '';

if (!empty($filter_keyword)) {
  $link .= '&query='.$filter_keyword;
  $sql   = "(`title` LIKE '%$filter_keyword%' OR `description` LIKE '%$filter_keyword%')";
  $db->where($sql);
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
    $db->where('time',$this_start,'>=')->where('time',$this_end,'<=');
}

$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'),
                    'DESC_t' => array('title' , 'DESC'),
                    'ASC_t'  => array('title' , 'ASC'),
                    'DESC_p' => array('time' , 'DESC'),
                    'ASC_p'  => array('time' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
  $link .= "&sort=".lui_Secure($_GET['sort']);
  $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$posts = $db->objectbuilder()->paginate(T_FUNDING, $page);

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_LoadAdminLinkSettings('manage-fund'));
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
                    <a>Administrar fuciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Fondos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar fondos</h6>
                    <form class="funding-settings" method="POST">
                        <div class="float-left">
                            <label for="funding_system" class="main-label">Configurar fondos</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="funding_request" id="funding_request-admin" onchange="SelectProModel('can_use_funding',this)" value="admin" <?php echo ($wo['config']['funding_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="funding_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="funding_request" id="funding_request-all" onchange="SelectProModel('can_use_funding',this)" value="all" <?php echo ($wo['config']['funding_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="funding_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="funding_request" id="funding_request-verified" onchange="SelectProModel('can_use_funding',this)" value="verified" <?php echo ($wo['config']['funding_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="funding_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="funding_request" id="funding_request-pro" onchange="SelectProModel('can_use_funding',this)" value="pro" <?php echo ($wo['config']['funding_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="funding_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Permita que los usuarios creen solicitudes de financiación y obtengan donaciones.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="funding_system" value="0" />
                            <input type="checkbox" name="funding_system" id="chck-funding_system" value="1" <?php echo ($wo['config']['funding_system'] == 1) ? 'checked': '';?>>
                            <label for="chck-funding_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Comision (%)</label>
                                <input type="text" id="donate_percentage" name="donate_percentage" class="form-control" value="<?php echo $wo['config']['donate_percentage']?>">
                                <small class="admin-info">¿Cuanto quieres ganar comisiones de las donaciones? Déjalo en 0 si no quieres recibir ninguna comision.</small>
                            </div>
                        </div>
                        <!-- <div class="funding-settings-alert"></div> -->
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                    </form>
                </div>
            </div>
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
                  <h6 class="card-title">Administrar Fondos</h6>
                    <div class="row">
                      <div class="col-md-9" style="margin-bottom:0;">
                        <form method="get" action="<?php echo lui_LoadAdminLinkSettings('manage-fund'); ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-float">
                                  <div class="form-line">
                                    <label class="form-label search-form">
                                        Buscar por id de publicacion  o por texto
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
                    <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    <div class="clearfix"></div>
                    <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                             <th>ID 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-fund?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-fund?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                             <th>Publisher</th>
                             <th>Titulo 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_t') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-fund?page-id=1').$sort_link."&sort=ASC_t") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-fund?page-id=1').$sort_link."&sort=DESC_t") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                             <th>Url</th>
                             <th>Publicacion 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_p') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-fund?page-id=1').$sort_link."&sort=ASC_p") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-fund?page-id=1').$sort_link."&sort=DESC_p") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                             <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php 
                              foreach ($posts as $post) {
                                $wo['story'] = $post;
                                if (!empty($post->user_id)) {
                                  $wo['story']->publisher = lui_UserData($post->user_id);
                                  if (!empty($wo['story']->publisher)) {
                                    echo lui_LoadAdminPage('administrar-fondos/list');
                                  }
                                }
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
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-fund?page-id=1').$link; ?>" data-ajax="?path=manage-fund&page-id=1<?php echo($link); ?>" class="waves-effect" title='First Page'>
                                          <i class="material-icons">first_page</i>
                                      </a>
                                    </li>
                                    <?php if ($page > 1) {  ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-fund?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=manage-fund&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Previous Page'>
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
                                        <a href="<?php echo lui_LoadAdminLinkSettings('manage-fund?page-id=' . ($i)).$link; ?>" data-ajax="?path=manage-fund&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                          <?php echo $i ?>   
                                        </a>
                                      </li>

                                    <?php } $nums++; }?>

                                    <?php if ($db->totalPages > $page) { ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-fund?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=manage-fund&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                              <i class="material-icons">chevron_right</i>
                                          </a>
                                      </li>
                                    <?php } ?>
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-fund?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=manage-fund&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
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
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar seleccionados<span></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar fondo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar este fondo?
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
                <h5 class="modal-title" id="exampleModal1Label">Eliminar fondo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar el fondo seleccionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
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
    $('#SelectedDeleteModal').modal('show');
});
function DeleteSelected() {
    data = new Array();
    $('td input:checked').parents('tr').each(function () {
        data.push($(this).attr('data_selected'));
    });
    $('.delete-selected').attr('disabled', true);
    $('.delete-selected').text('Please wait..');
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_fund", {ids: data}, function () {
        $.each( data, function( index, value ){
            $("#PostID_"+value).remove();
        });
        $('.delete-selected').text('Eliminar seleccionados');
    });
}
jQuery(document).ready(function($) {
        $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            setToTrue = 1;
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = setToTrue;
        objData['hash_id'] = hash_id;
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
	$('.round_check input[type=radio]').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
    $('input[type=text], input[type=number], textarea').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));
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
                $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('manage-fund').$rang_link; ?>&range="+$(this).attr('data-range-key'));
                $('#redirect_link').attr('data-ajax', "?path=manage-fund<?php echo('&'.$rang_link) ?>&range="+$(this).attr('data-range-key'));
                $('#redirect_link').click();
                //location.href = "<?php echo lui_LoadAdminLinkSettings('manage-fund').$rang_link; ?>&range="+$(this).attr('data-range-key');
            }
        });
        $(document).on('click', '.applyBtn', function(event) {
            event.preventDefault();
            $(document).off('click', '.applyBtn');
            $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('manage-fund').$rang_link; ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
            $('#redirect_link').attr('data-ajax', "?path=manage-fund<?php echo('&'.$rang_link) ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
            $('#redirect_link').click();
            //location.href = "<?php echo lui_LoadAdminLinkSettings('manage-fund').$rang_link; ?>&range="+$('.drp-selected').html();
        });
});

function Wo_AdminDeletePost(fund_id,type = 'show') {
    if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_AdminDeletePost('"+fund_id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
    hash_id = $('#hash_id').val();
    $('#PostID_' + fund_id).fadeOut(300, function() {
       $(this).remove();
    });
    $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_fund', {fund_id:fund_id, hash_id:hash_id});
}

</script>