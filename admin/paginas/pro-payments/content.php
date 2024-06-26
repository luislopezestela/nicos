<?php 
$this_start = strtotime("1 January ".date('Y')." 12:00am");
$this_end = strtotime("31 December ".date('Y')." 11:59pm");
$array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0);
$code = 'm';
$main_range = 'This Year';
$title = "Yearly";
if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month'))) {
    if ($_GET['range'] == 'Today' || $_GET['range'] == 'Yesterday') {
        $array = array('00' => 0 ,'01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0 ,'13' => 0 ,'14' => 0 ,'15' => 0 ,'16' => 0 ,'17' => 0 ,'18' => 0 ,'19' => 0 ,'20' => 0 ,'21' => 0 ,'22' => 0 ,'23' => 0);
        $this_start = strtotime(date('M')." ".date('d').", ".date('Y')." 12:00am");
        $this_end = strtotime(date('M')." ".date('d').", ".date('Y')." 11:59pm");
        if ($_GET['range'] == 'Yesterday') {
            $this_start = strtotime(date('M')." ".date('d',strtotime("-1 days")).", ".date('Y')." 12:00am");
            $this_end = strtotime(date('M')." ".date('d',strtotime("-1 days")).", ".date('Y')." 11:59pm");
        }
        $code = 'H';
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
        
        $array = array('Saturday' => 0 , 'Sunday' => 0 , 'Monday' => 0 , 'Tuesday' => 0 , 'Wednesday' => 0 , 'Thursday' => 0 , 'Friday' => 0);
        $code = 'l';
        $main_range = 'This Week';
        $title = "Weekly";
    }
    elseif ($_GET['range'] == 'This Month' ||$_GET['range'] == 'Last Month') {
        $this_start = strtotime("1 ".date('M')." ".date('Y')." 12:00am");
        $this_end = strtotime(cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'))." ".date('M')." ".date('Y')." 11:59pm");
        $array = array_fill(1, cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')),0);
        $month_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        if ($_GET['range'] == 'Last Month') {
            $this_start = strtotime("1 ".date('M',strtotime("-1 month"))." ".date('Y')." 12:00am");
            $this_end = strtotime(cal_days_in_month(CAL_GREGORIAN, date('m',strtotime("-1 month")), date('Y'))." ".date('M',strtotime("-1 month"))." ".date('Y')." 11:59pm");
            $array = array_fill(1, cal_days_in_month(CAL_GREGORIAN, date('m',strtotime("-1 month")), date('Y')),0);
            $month_days = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime("-1 month")), date('Y'));
        }
        if (cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')) == 31) {
            $array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0 ,'13' => 0 ,'14' => 0 ,'15' => 0 ,'16' => 0 ,'17' => 0 ,'18' => 0 ,'19' => 0 ,'20' => 0 ,'21' => 0 ,'22' => 0 ,'23' => 0,'24' => 0 ,'25' => 0 ,'26' => 0 ,'27' => 0 ,'28' => 0 ,'29' => 0 ,'30' => 0 ,'31' => 0);
        }elseif (cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')) == 30) {
            $array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0 ,'13' => 0 ,'14' => 0 ,'15' => 0 ,'16' => 0 ,'17' => 0 ,'18' => 0 ,'19' => 0 ,'20' => 0 ,'21' => 0 ,'22' => 0 ,'23' => 0,'24' => 0 ,'25' => 0 ,'26' => 0 ,'27' => 0 ,'28' => 0 ,'29' => 0 ,'30' => 0);
        }elseif (cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')) == 29) {
            $array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0 ,'13' => 0 ,'14' => 0 ,'15' => 0 ,'16' => 0 ,'17' => 0 ,'18' => 0 ,'19' => 0 ,'20' => 0 ,'21' => 0 ,'22' => 0 ,'23' => 0,'24' => 0 ,'25' => 0 ,'26' => 0 ,'27' => 0 ,'28' => 0 ,'29' => 0);
        }elseif (cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')) == 28) {
            $array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0 ,'13' => 0 ,'14' => 0 ,'15' => 0 ,'16' => 0 ,'17' => 0 ,'18' => 0 ,'19' => 0 ,'20' => 0 ,'21' => 0 ,'22' => 0 ,'23' => 0,'24' => 0 ,'25' => 0 ,'26' => 0 ,'27' => 0 ,'28' => 0);
        }
        $code = 'd';
        $main_range = 'This Month';
        $title = "Monthly";
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
$weekly_array = $array;
$monthly_array = $array;
$yearly_array = $array;
$lifetime_array = $array;
$weekly = $db->where('time',$this_start,'>=')->where('time',$this_end,'<=')->where('type','weekly')->get(T_PAYMENTS);
$monthly = $db->where('time',$this_start,'>=')->where('time',$this_end,'<=')->where('type','monthly')->get(T_PAYMENTS);
$yearly = $db->where('time',$this_start,'>=')->where('time',$this_end,'<=')->where('type','yearly')->get(T_PAYMENTS);
$lifetime = $db->where('time',$this_start,'>=')->where('time',$this_end,'<=')->where('type','lifetime')->get(T_PAYMENTS);
foreach ($weekly as $key => $value) {
    $day = date($code,$value->time);
    if ($main_range == 'Custom' && !empty($first_code) && !empty($second_code)) {
        $day = "'".(int)date($first_code,$value->time).'-'.(int)date($second_code,$value->time)."'";
    }
    elseif ($main_range == 'Custom') {
        $day = "'".(int)date($code,$value->time)."'";
    }
    if (in_array($day, array_keys($weekly_array))) {
        $weekly_array[$day] += 1; 
    }
}
foreach ($monthly as $key => $value) {
    $day = date($code,$value->time);
    if ($main_range == 'Custom' && !empty($first_code) && !empty($second_code)) {
        $day = "'".(int)date($first_code,$value->time).'-'.(int)date($second_code,$value->time)."'";
    }
    elseif ($main_range == 'Custom') {
        $day = "'".(int)date($code,$value->time)."'";
    }
    if (in_array($day, array_keys($monthly_array))) {
        $monthly_array[$day] += 1; 
    }
}
foreach ($yearly as $key => $value) {
    $day = date($code,$value->time);
    if ($main_range == 'Custom' && !empty($first_code) && !empty($second_code)) {
        $day = "'".(int)date($first_code,$value->time).'-'.(int)date($second_code,$value->time)."'";
    }
    elseif ($main_range == 'Custom') {
        $day = "'".(int)date($code,$value->time)."'";
    }
    if (in_array($day, array_keys($yearly_array))) {
        $yearly_array[$day] += 1; 
    }
}
foreach ($lifetime as $key => $value) {
    $day = date($code,$value->time);
    if ($main_range == 'Custom' && !empty($first_code) && !empty($second_code)) {
        $day = "'".(int)date($first_code,$value->time).'-'.(int)date($second_code,$value->time)."'";
    }
    elseif ($main_range == 'Custom') {
        $day = "'".(int)date($code,$value->time)."'";
    }
    if (in_array($day, array_keys($lifetime_array))) {
        $lifetime_array[$day] += 1; 
    }
}
$w_array = implode(', ', $weekly_array);
$m_array = implode(', ', $monthly_array);
$y_array = implode(', ', $yearly_array);
$l_array = implode(', ', $lifetime_array);
?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Sistema profesional</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar pagos</li>
            </ol>
        </nav>
    </div>
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">TOTAL GANANCIAS</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-info-bright text-info rounded-pill">
                                  <i class="material-icons">attach_money</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllPayment(); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">GANANCIAS ESTE MES</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                  <i class="material-icons">attach_money</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountThisMonthPayment(); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">VENTAS ESTRELLA</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                  <i class="material-icons">stars</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllPaymentData('weekly'); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">VENTAS CALIENTES</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-main-bright text-main rounded-pill">
                                  <i class="material-icons">whatshot</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllPaymentData('monthly'); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">ULTIMAS VENTAS</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-info-bright text-info rounded-pill">
                                  <i class="material-icons">flash_on</i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllPaymentData('yearly'); ?></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">VENTAS VIP</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                  <i class="material-icons"><svg style="width:90%;height:90%;" viewBox="0 0 24 24">
    <path fill="#fff" d="M2.81,14.12L5.64,11.29L8.17,10.79C11.39,6.41 17.55,4.22 19.78,4.22C19.78,6.45 17.59,12.61 13.21,15.83L12.71,18.36L9.88,21.19L9.17,17.66C7.76,17.66 7.76,17.66 7.05,16.95C6.34,16.24 6.34,16.24 6.34,14.83L2.81,14.12M5.64,16.95L7.05,18.36L4.39,21.03H2.97V19.61L5.64,16.95M4.22,15.54L5.46,15.71L3,18.16V16.74L4.22,15.54M8.29,18.54L8.46,19.78L7.26,21H5.84L8.29,18.54M13,9.5A1.5,1.5 0 0,0 11.5,11A1.5,1.5 0 0,0 13,12.5A1.5,1.5 0 0,0 14.5,11A1.5,1.5 0 0,0 13,9.5Z" />
</svg></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllPaymentData('lifetime'); ?></div>
                  </div>
              </div>
          </div>
      </div>



    </div>
    <!-- #END# Widgets -->
    <div class="row clearfix">
        <!-- Bar Chart -->
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                </div>
                <p class="text-muted mb-4">Estrella , Caliente , Ultima , Ventas Vip</p>
                <div class="row">
                    <div class="col-md-11"></div>
                    <div class="col-md-1">
                        <div id="dashboard-daterangepicker" class="btn btn-outline-light">
                            <?php 
                            if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
                                echo $_GET['range'];
                            }else if (!empty($start) && !empty($end)){
                                echo $_GET['range'];
                            }else{
                                echo 'This Year';
                            } ?>
                        </div>
                    </div>
                </div>
                <div id="users"></div>
            </div>
        </div>
    </div>
        <!-- #END# Bar Chart -->
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
        var range = { "Today": [moment() , moment()], 
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
            var start = range.This_Year[0];
            var end = range.This_Year[1];
        <?php } ?>

        function cb(start, end) {
            //$('#dashboard-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#dashboard-daterangepicker').daterangepicker({
            startDate: start,
            endDate: end,
            opens: $('body').hasClass('rtl') ? 'right' : 'left',
            ranges: {
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
                $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('pro-payments'); ?>&range="+$(this).attr('data-range-key'));
                $('#redirect_link').attr('data-ajax', "?path=pro-payments&range="+$(this).attr('data-range-key'));
                $('#redirect_link').click();
                //location.href = "<?php echo lui_LoadAdminLinkSettings('pro-payments'); ?>?range="+$(this).attr('data-range-key');
            }
        });
        $(document).on('click', '.applyBtn', function(event) {
            event.preventDefault();
            $(document).off('click', '.applyBtn');
            $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('pro-payments'); ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
            $('#redirect_link').attr('data-ajax', "?path=pro-payments&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
            $('#redirect_link').click();
            //location.href = "<?php echo lui_LoadAdminLinkSettings('pro-payments'); ?>?range="+$('.drp-selected').html();
        });
    var rgbToHex = function (rgb) {
        var hex = Number(rgb).toString(16);
        if (hex.length < 2) {
            hex = "0" + hex;
        }
        return hex;
    };

    var fullColorHex = function (r, g, b) {
        var red = rgbToHex(r);
        var green = rgbToHex(g);
        var blue = rgbToHex(b);
        return red + green + blue;
    };

    var colors = {
        primary: $('.colors .bg-primary').css('background-color'),
        primaryLight: $('.colors .bg-primary-bright').css('background-color'),
        secondary: $('.colors .bg-secondary').css('background-color'),
        secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
        info: $('.colors .bg-info').css('background-color'),
        infoLight: $('.colors .bg-info-bright').css('background-color'),
        success: $('.colors .bg-success').css('background-color'),
        successLight: $('.colors .bg-success-bright').css('background-color'),
        danger: $('.colors .bg-danger').css('background-color'),
        dangerLight: $('.colors .bg-danger-bright').css('background-color'),
        warning: $('.colors .bg-warning').css('background-color'),
        warningLight: $('.colors .bg-warning-bright').css('background-color'),
    };
    //console.log(colors.primary[1]);
    colors.primary = '#' + fullColorHex(colors.primary[0], colors.primary[1], colors.primary[2]);
    colors.secondary = '#' + fullColorHex(colors.secondary[0], colors.secondary[1], colors.secondary[2]);
    colors.info = '#' + fullColorHex(colors.info[0], colors.info[1], colors.info[2]);
    colors.success = '#' + fullColorHex(colors.success[0], colors.success[1], colors.success[2]);
    colors.danger = '#' + fullColorHex(colors.danger[0], colors.danger[1], colors.danger[2]);
    colors.warning = '#' + fullColorHex(colors.warning[0], colors.warning[1], colors.warning[2]);
});


function users() {
    if ($('#users').length) {
        var options = {
            chart: {
                type: 'bar',
                fontFamily: "Inter",
                offsetX: -26,
                stacked: false,
                height: 265,
                width: '102%',
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
        name: 'Star Sales',
        data: [<?php echo $w_array; ?>]

        },{
        name: 'Hot Sales',
        data: [<?php echo $m_array; ?>]

        },{
        name: 'Ultima Sales',
        data: [<?php echo $y_array; ?>]

        },{
        name: 'Vip Sales',
        data: [<?php echo $l_array; ?>]

        }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            colors: ['#6abd46', '#ce3d3d', '#f2b92b', '#6abd46'],
            xaxis: {
                <?php if ($main_range == 'Today' || $main_range == 'Yesterday') { ?>
                        categories: [
                            '00 AM',
                            '1 AM',
                            '2 AM',
                            '3 AM',
                            '4 AM',
                            '5 AM',
                            '6 AM',
                            '7 AM',
                            '8 AM',
                            '9 AM',
                            '10 AM',
                            '11 AM',
                            '12 PM',
                            '1 PM',
                            '2 PM',
                            '3 PM',
                            '4 PM',
                            '5 PM',
                            '6 PM',
                            '7 PM',
                            '8 PM',
                            '9 PM',
                            '10 PM',
                            '11 PM'
                        ]
                    <?php }elseif ($main_range == 'This Week') { ?>
                    categories: [
                        'Saturday',
                        'Sunday',
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday'
                    ]
                    <?php }elseif ($main_range == 'This Month') { ?>
                        <?php if ($month_days == 31) { ?>
                            categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                        <?php }elseif ($month_days == 30) { ?>
                            categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
                        <?php }elseif ($month_days == 29) { ?>
                            categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]
                        <?php }elseif ($month_days == 28) {  ?>
                            categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                        <?php } ?>
                    <?php }elseif ($main_range == 'This Year') { ?>
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec']
                    <?php }elseif ($main_range == 'Custom') {
                        echo "categories: [".implode(',',array_keys($array))."]";
                    } ?>
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        };

        var chart = new ApexCharts(
            document.querySelector("#users"),
            options
        );

        chart.render();
    }
}

users();






</script>







