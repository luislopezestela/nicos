<?php
$page  = 'dashboard';
$wo['all_pages'] = scandir('admin/paginas');
unset($wo['all_pages'] [0]);
unset($wo['all_pages'] [1]);
unset($wo['all_pages'] [2]);
$pages = array(
    'configuracion-general',
    'dashboard',
    'configurar-web',
    'compras',
    'imventario',
    'administrar-caracteristicas',
    'configurar-subidas-de-archivos',
    'configurar-correo',
    'social-login',
    'configurar-chat',
    'manage-languages',
    'add-language',
    'edit-lang',
    'manage-users',
    'manage-stories',
    'add-new-profile-field',
    'edit-profile-field',
    'manage-verification-reqeusts',
    'payment-reqeuests',
    'affiliates-settings',
    'referrals-list',
    'pro-memebers',
    'pro-settings',
    'pro-payments',
    'payment-settings',
    'administrar-paginas',
    'administrar-grupos',
    'administrar-publicaciones',
    'manage-articles',
    'ads-settings',
    'manage-site-ads',
    'manage-user-ads',
    'manage-themes',
    'manage-site-design',
    'manage-announcements',
    'mass-notifications',
    'ban-users',
    'generate-sitemap',
    'manage-invitation-keys',
    'backups',
    'manage-custom-pages',
    'add-new-custom-page',
    'edit-custom-page',
    'edit-terms-pages',
    'manage_terms_pages',
    'manage-reports',
    'push-notifications-system',
    'manage-api-access-keys',
    'manage-updates',
    'changelog',
    'online-users',
    'custom-code',
    'auto-delete',
    'manage-gifts',
    'add-new-gift',
    'configurar-publicaciones',
    'manage-stickers',
    'add-new-sticker',
    'auto-friend',
    'fake-users',
    'manage-genders',
    'blogs-categories',
    'products-categories',
    'products-sections',
    'bank-receipts',
    'manage-currencies',
    'administrar-colores-para-publicaciones',
    'administras-trabajos',
    'administrar-reacciones',
    'products-sub-categories',
    'pro-features',
    'pro-refund',
    'administrar-ofertas',
    'manage-invitation',
    'send_email',
    'live',
    'node',
    'manage_emails',
    'ffmpeg',
    'manage-permissions',
    'store-settings',
    'manage-products',
    'manage-orders',
    'manage-reviews',
    'administrar-sucursales',
    'user_reports',
    'edit-forum',
    'edit-section',
    'cronjob_settings',
    'system_status',
    'proveedores',
    'unidad-medidad',
    'colores_productos',
    "upload-to-storage"
);
$wo['mod_pages'] = array('dashboard','proveedores','compras','imventario','manage-products','manage-orders', 'manage-reports', 'bank-receipts','colores_productos');
$wo['nopag_pages'] = array('proveedores','compras','imventario','colores_productos');

if (!empty($_GET['page'])) {
    $page = lui_Secure($_GET['page'], 0);
}
$wo['decode_android_v']  = $wo['config']['footer_background'];
$wo['decode_android_value']  = base64_decode('I2FhYQ==');

$wo['decode_android_n_v']  = $wo['config']['footer_background_n'];
$wo['decode_android_n_value']  = base64_decode('I2FhYQ==');

$wo['decode_ios_v']  = $wo['config']['footer_background_2'];
$wo['decode_ios_value']  = base64_decode('I2FhYQ==');

$wo['decode_windwos_v']  = $wo['config']['footer_text_color'];
$wo['decode_windwos_value']  = base64_decode('I2RkZA==');
if ($is_moderoter && !empty($wo['user']['permission'])) {
    $wo['user']['permission'] = json_decode($wo['user']['permission'],true);
    if (!in_array($page, array_keys($wo['user']['permission']))) {
        $wo['user']['permission'][$page] = 0;
        $permission = json_encode($wo['user']['permission']);
        $db->where('user_id',$wo['user']['user_id'])->update(T_USERS,array('permission' => $permission));
        header("Location: " . lui_LoadAdminLinkSettings($page));
        exit();
    }else{
        if ($wo['user']['permission'][$page] == 0) {
            foreach ($wo['user']['permission'] as $key => $value) {
                if ($value == 1) {
                    header("Location: " . lui_LoadAdminLinkSettings($key));
                    exit();
                }
            }
        }
    }
}elseif ($is_moderoter && empty($wo['user']['permission'])) {
    $permission = array();
    if (!empty($wo['all_pages'])) {
        foreach ($wo['all_pages']  as $key => $value) {
            if(in_array($value,$wo['nopag_pages'])){
                $permission[$value] = 0;
            }elseif (in_array($value,$wo['mod_pages'])) {
                $permission[$value] = 1;
            }else{
                $permission[$value] = 0;
            }
            
            
        }
    }
    $permission = json_encode($permission);
    $db->where('user_id',$wo['user']['user_id'])->update(T_USERS,array('permission' => $permission));
    $wo['user'] = lui_UserData($wo['user']['user_id']);
}

if ($is_moderoter == true && $is_admin == false) {
    if (!in_array($page, $wo['mod_pages'])) {
        header("Location: " . lui_SeoLink('index.php?link1=admin-cp'));
        exit();
    }
}
if (in_array($page, $pages)) {
   $page_loaded = lui_LoadAdminPage("$page/content");
}
if (empty($page_loaded)) {
    header("Location: " . lui_SeoLink('index.php?link1=admin-cp'));
    exit();
}

$notify_count = $db->where('recipient_id',0)->where('admin',1)->where('seen',0)->getValue(T_NOTIFICATION,'COUNT(*)');
$notifications = $db->where('recipient_id',0)->where('admin',1)->where('seen',0)->orderBy('id','DESC')->get(T_NOTIFICATION);
$old_notifications = $db->where('recipient_id',0)->where('admin',1)->where('seen',0,'!=')->orderBy('id','DESC')->get(T_NOTIFICATION,5);
$mode = 'day';
if (!empty($_COOKIE['mode']) && $_COOKIE['mode'] == 'night') {
    $mode = 'night';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | <?=$wo['config']['siteTitle'];?></title>
    <link rel="shortcut icon" href="<?=lui_LoadAdminLink("datos/imagenes/icon.png");?>" type="image/png">
    <!-- Css principal -->
    <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/bundle.css')); ?>" type="text/css">
     <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/datepicker/daterangepicker.css')); ?>" type="text/css">
    <!-- DataTable -->
    <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/dataTable/datatables.min.css')) ?>" type="text/css">
    <!-- App css -->
    <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/css/app.css')) ?>" type="text/css">
    <!-- layshane css -->
    <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/css/layshane.css')) ?>" type="text/css">

    <!--Script principal -->
    <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/bundle.js')) ?>"></script>

    <!-- Apex chart -->
    <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/charts/apex/apexcharts.min.js')) ?>"></script>
    <!-- Daterangepicker -->
    <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/datepicker/daterangepicker.js')) ?>"></script>
    <!-- DataTable -->
    <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/dataTable/datatables.min.js')) ?>"></script>
    <!-- Dashboard scripts -->
    <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/js/examples/pages/dashboard.js')) ?>"></script>
    <script src="<?php echo (lui_LoadAdminLink('datos/source/estilos/charts/chartjs/chart.min.js')); ?>"></script>

    <!-- App scripts -->
    <link href="<?php echo (lui_LoadAdminLink('datos/source/estilos/sweetalert/sweetalert.css')); ?>" rel="stylesheet" />
    <script src="<?php echo (lui_LoadAdminLink('datos/source/estilos/js/admin.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/select2/css/select2.min.css')) ?>" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php //if ($page == 'create-article' || $page == 'edit-article' || $page == 'manage-announcements' || $page == 'newsletters') { ?>
    <script src="<?php echo lui_LoadAdminLink('datos/source/estilos/tinymce/js/tinymce/tinymce.min.js'); ?>" id="scrps37"></script>
    <script src="<?php echo lui_LoadAdminLink('datos/source/estilos/bootstrap-tagsinput/src/bootstrap-tagsinput.js'); ?>"></script>
    <link href="<?php echo lui_LoadAdminLink('datos/source/estilos/bootstrap-tagsinput/src/bootstrap-tagsinput.css'); ?>" rel="stylesheet" />
    <?php //} ?>
    <?php //if ($page == 'custom-code') { ?>
    <script src="<?php echo lui_LoadAdminLink('datos/source/estilos/codemirror-5.30.0/lib/codemirror.js'); ?>"></script>
    <script src="<?php echo lui_LoadAdminLink('datos/source/estilos/codemirror-5.30.0/mode/css/css.js'); ?>"></script>
    <script src="<?php echo lui_LoadAdminLink('datos/source/estilos/codemirror-5.30.0/mode/javascript/javascript.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo lui_LoadAdminLink('datos/source/estilos/codemirror-5.30.0/lib/codemirror.css'); ?>">
    <?php //} ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php if ($page == 'bank-receipts' || $page == 'manage-verification-reqeusts' || $page == 'monetization-requests' || $page == 'manage-user-ads') { ?>
        <!-- Css -->
        <link rel="stylesheet" href="<?php echo(lui_LoadAdminLink('datos/source/estilos/lightbox/magnific-popup.css')) ?>" type="text/css">

        <!-- Javascript -->
        <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/lightbox/jquery.magnific-popup.min.js')) ?>"></script>
        <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/charts/justgage/raphael-2.1.4.min.js')) ?>"></script>
        <script src="<?php echo(lui_LoadAdminLink('datos/source/estilos/charts/justgage/justgage.js')) ?>"></script>
    <?php } ?>

    <script src="<?php echo lui_LoadAdminLink('datos/source/estilos/js/jquery.form.min.js'); ?>"></script>
    <script>
        function Wo_Ajax_Requests_File(){
            return "<?=$wo['config']['site_url'].'/requests.php';?>"
        }
        function Wo_Ajax_Requests_File_load(){
            return "<?=$wo['config']['site_url'].'/admin_load.php';?>"
        }
    </script>
    <style>
        .btn.btn-primary, a.btn[href="#next"], a.btn[href="#previous"] {color: #fff !important;background: #3498db;border-color: #3498db;}
        .btn.btn-primary:not(:disabled):not(.disabled):hover, a.btn[href="#next"]:not(:disabled):not(.disabled):hover, a.btn[href="#previous"]:not(:disabled):not(.disabled):hover, .btn.btn-primary:not(:disabled):not(.disabled):focus, a.btn[href="#next"]:not(:disabled):not(.disabled):focus, a.btn[href="#previous"]:not(:disabled):not(.disabled):focus, .btn.btn-primary:not(:disabled):not(.disabled):active, a.btn[href="#next"]:not(:disabled):not(.disabled):active, a.btn[href="#previous"]:not(:disabled):not(.disabled):active, .btn.btn-primary:not(:disabled):not(.disabled).active, a.btn[href="#next"]:not(:disabled):not(.disabled).active, a.btn[href="#previous"]:not(:disabled):not(.disabled).active {background: #CE3643;border-color: #CE3643;}
        body.dark .navigation .navigation-menu-body ul li a.active, .breadcrumb .breadcrumb-item.active, body.dark .breadcrumb li.breadcrumb-item.active, body.dark .navigation .navigation-menu-body ul li a.active .nav-link-icon {color: #3498db !important;}
        .card form .form-check-inline input:checked {background-color: #3498db;}
        .card form .form-check-inline input:checked + label::before, .card form .form-check-inline input:active + label::before {border-color: #3498db;}
        .card form .form-check-inline label::after {background-color: #3498db;}
        .select2-container--default.select2-container--focus .select2-selection--multiple {border: 2px solid #3498db !important;}

    </style>
</head>
<script type="text/javascript">

    $(function() {

        $(document).on('click', 'a[data-ajax]', function(e) {
            $(document).off('click', '.ranges ul li');
            $(document).off('click', '.applyBtn');
            e.preventDefault();
            if (($(this)[0].hasAttribute("data-sent") && $(this).attr('data-sent') == '0') || !$(this)[0].hasAttribute("data-sent")) {
                if (!$(this)[0].hasAttribute("data-sent") && !$(this).hasClass('waves-effect')) {
                    $('.navigation-menu-body').find('a').removeClass('active');
                    $(this).addClass('active');
                }
                window.history.pushState({state:'new'},'', $(this).attr('href'));
                $(".barloading").css("display","block");
                if ($(this)[0].hasAttribute("data-sent")) {
                    $(this).attr('data-sent', "1");
                }
                var url = $(this).attr('data-ajax');
                $.post(Wo_Ajax_Requests_File_load() + url, {url:url}, function (data) {
                    $(".barloading").css("display","none");
                    if ($('#redirect_link')[0].hasAttribute("data-sent")) {
                        $('#redirect_link').attr('data-sent', "0");
                    }
                    json_data = JSON.parse($(data).filter('#json-data').val());
                    $('.content').html(data);
                    setTimeout(function () {
                      $(".content").getNiceScroll().resize()
                    }, 500);
                    $(".content").animate({ scrollTop: 0 }, "slow");
                });
            }
        });
        $(window).on("popstate", function (e) {
            location.reload();
        });
    });
</script>
<body id="bod" <?php echo($mode == 'night' ? 'class="dark"' : '');?>>
    <div class="barloading"></div>
    <a id="redirect_link" href="" data-ajax="" data-sent="0"></a>
    <input type="hidden" class="main_session" value="<?=lui_CreateMainSession();?>">
    <div class="colors"> <!-- To use theme colors with Javascript -->
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Cargando...</span>
    </div>

    <!-- ./ Preloader -->

    <!-- Sidebar group -->
    <div class="sidebar-group">

    </div>
    <!-- ./ Sidebar group -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

    <!-- Header -->
    <div class="header d-print-none">
        <div class="header-container">
            <div class="header-left">
                <div class="navigation-toggler">
                    <a href="#" data-action="navigation-toggler">
                        <i data-feather="menu"></i>
                    </a>
                </div>

                <div class="header-logo">
                    <a href="<?=$wo['config']['site_url'];?>/admin-cp">
                        <div class="logo_layshane_page">
                            <div class="logo_layshane_page_text">
                                <h2><?=$wo['config']['siteName'];?></h2>
                                <h2><?=$wo['config']['siteName'];?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="header-body">
                <div class="header-body-left">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-3">
                            <div class="header-search-form">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="search" class="form-control" placeholder="Buscar"  onkeyup="searchInFiles($(this).val())">
                                    <div class="pt_admin_hdr_srch_reslts" id="search_for_bar"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="header-body-right">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link <?php if ($notify_count > 0) { ?> nav-link-notify<?php } ?>" title="Notifications" data-toggle="dropdown">
                                <i data-feather="bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <div
                                    class="border-bottom px-4 py-3 text-center d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Notificaciones</h5>
                                    <?php if ($notify_count > 0) { ?>
                                    <small class="opacity-7"><?php echo $notify_count;; ?>   notificaciones no leidas</small>
                                    <?php } ?>
                                </div>
                                <div class="dropdown-scroll">
                                    <ul class="list-group list-group-flush">
                                        <?php if ($notify_count > 0) { ?>
                                            <li class="px-4 py-2 text-center small text-muted bg-light">Notificaciones no leidas</li>
                                     
                                            <?php if (!empty($notifications)) {
                                                    foreach ($notifications as $notify) {
                                                        $page_ = '';
                                                        $text = '';
                                                        if ($notify->type == 'bank') {
                                                            $page_ = 'bank-receipts';
                                                            $text = 'Tienes un nuevo pago bancario pendiente de aprobacion';
                                                        }
                                                        elseif ($notify->type == 'verify') {
                                                            $page_ = 'manage-verification-reqeusts';
                                                            $text = 'Tienes una nueva solicitud de verificación esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'refund') {
                                                            $page_ = 'pro-refund';
                                                            $text = 'Tienes una nueva solicitud de reembolso esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'with') {
                                                            $page_ = 'payment-reqeuests';
                                                            $text = 'Tienes una nueva solicitud de retiro esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'report') {
                                                            $page_ = 'manage-reports';
                                                            $text = 'Tienes un nuevo informe esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'user_reports') {
                                                            $page_ = 'user_reports';
                                                            $text = 'Tienes un nuevo informe esperando tu aprobacion';
                                                        }
                                                ?>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="<?=lui_LoadAdminLinkSettings($page_);?>" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span
                                                                class="avatar-title bg-info-bright text-info rounded-circle">
                                                                <?php if ($notify->type == 'bank') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                                                <?php }elseif ($notify->type == 'verify') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196f3" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"></path></svg>
                                                                <?php }elseif ($notify->type == 'refund') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                                                                <?php }elseif ($notify->type == 'with') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                                <?php }elseif ($notify->type == 'report' || $notify->type == 'user_reports') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
                                                                <?php } ?>

                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            <?php echo $text; ?>
                                                        </p>
                                                        <span class="text-muted small"><?=lui_Time_Elapsed_String($notify->time); ?></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php } } ?>
                                        <?php } ?>
                                        <?php if ($notify_count == 0 && !empty($old_notifications)) { ?>
                                            <li class="px-4 py-2 text-center small text-muted bg-light">Notificaciones antiguas</li>
                                            <?php
                                                    foreach ($old_notifications as $key => $notify) {
                                                        $page_ = '';
                                                        $text = '';
                                                        if ($notify->type == 'bank') {
                                                            $page_ = 'bank-receipts';
                                                            $text = 'Tienes un nuevo pago bancario pendiente de aprobacion';
                                                        }
                                                        elseif ($notify->type == 'verify') {
                                                            $page_ = 'verification-requests';
                                                            $text = 'Tienes una nueva solicitud de verificación esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'refund') {
                                                            $page_ = 'pro-refund';
                                                            $text = 'Tienes una nueva solicitud de reembolso esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'with') {
                                                            $page_ = 'payment-reqeuests';
                                                            $text = 'Tienes una nueva solicitud de retiro esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'report') {
                                                            $page_ = 'manage-reports';
                                                            $text = 'Tienes un nuevo informe esperando tu aprobacion';
                                                        }
                                                        elseif ($notify->type == 'user_reports') {
                                                            $page_ = 'user_reports';
                                                            $text = 'Tienes un nuevo informe esperando tu aprobacion';
                                                        }
                                                ?>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="<?=lui_LoadAdminLinkSettings($page_); ?>" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span class="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                                                <?php if ($notify->type == 'bank') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                                                <?php }elseif ($notify->type == 'verify') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196f3" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"></path></svg>
                                                                <?php }elseif ($notify->type == 'refund') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                                                                <?php }elseif ($notify->type == 'with') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                                <?php }elseif ($notify->type == 'report' || $notify->type == 'user_reports') { ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
                                                                <?php } ?>
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            <?php echo $text; ?>
                                                        </p>
                                                        <span class="text-muted small"><?=lui_Time_Elapsed_String($notify->time); ?></span>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } } ?>
                                    </ul>
                                </div>
                                <?php if ($notify_count > 0) { ?>
                                <div class="px-4 py-3 text-right border-top">
                                    <ul class="list-inline small">
                                        <li class="list-inline-item mb-0">
                                            <a href="javascript:void(0)" onclick="ReadNotify()">Marcar todo como leido</a>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                <figure class="avatar avatar-sm">
                                    <img src="<?php echo $wo['user']['avatar']; ?>"
                                         class="rounded-circle"
                                         alt="avatar">
                                </figure>
                                <span class="ml-2 d-sm-inline d-none"><?php echo $wo['user']['name']; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <div class="text-center py-4">
                                    <figure class="avatar avatar-lg mb-3 border-0">
                                        <img src="<?php echo $wo['user']['avatar']; ?>"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                    <h5 class="text-center"><?php echo $wo['user']['name']; ?></h5>
                                    <div class="mb-3 small text-center text-muted"><?php echo $wo['user']['email']; ?></div>
                                    <a href="<?php echo $wo['user']['url']; ?>" class="btn btn-outline-light btn-rounded">Ver perfil</a>
                                </div>
                                <div class="list-group">
                                    <a href="<?php echo(lui_Link('logout')) ?>" class="list-group-item text-danger">Cerrar session</a>
                                    <?php if ($mode == 'night') { ?>
                                        <a href="javascript:void(0)" class="list-group-item admin_mode" onclick="ChangeMode('day')">
                                            <span id="night-mode-text">Modo dia</span>
                                            <svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                                        </a>
                                    <?php }else{ ?>
                                        <a href="javascript:void(0)" class="list-group-item admin_mode" onclick="ChangeMode('night')">
                                            <span id="night-mode-text">Modo noche</span>
                                            <svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i data-feather="arrow-down"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Header -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- begin::navigation -->
        <div class="navigation">
            <div class="navigation-header">
                <span>Layshane</span>
                <a href="#">
                    <i class="ti-close"></i>
                </a>
            </div>
            <div class="navigation-menu-body">
                <ul>
                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['dashboard'] == 1)) { ?>
                    <li>
                        <a <?php echo ($page == 'dashboard') ? 'class="active"' : ''; ?>  href="<?php echo lui_LoadAdminLinkSettings(''); ?>" data-ajax="?path=dashboard">
                            <span class="nav-link-icon">
                                <i class="material-icons">dashboard</i>
                            </span>
                            <span><?=$wo['lang']['dashboard'];?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['configurar-publicaciones'] == 1 || $wo['user']['permission']['administrar-colores-para-publicaciones'] == 1 || $wo['user']['permission']['administrar-reacciones'] == 1 || $wo['user']['permission']['live'] == 1 || $wo['user']['permission']['configuracion-general'] == 1 || $wo['user']['permission']['configurar-web'] == 1 || $wo['user']['permission']['configurar-subidas-de-archivos'] == 1 || $wo['user']['permission']['configurar-correo'] == 1 || $wo['user']['permission']['configurar-chat'] == 1 || $wo['user']['permission']['social-login'] == 1 || $wo['user']['permission']['node'] == 1 || $wo['user']['permission']['cronjob_settings'] == 1))) { ?>
                    <li <?php echo ($page == 'configuracion-general' || $page == 'configurar-publicaciones' || $page == 'configurar-web' || $page == 'configurar-correo' || $page == 'social-login' || $page == 'administrar-caracteristicas' || $page == 'configurar-subidas-de-archivos' ||  $page == 'configurar-chat' || $page == 'manage-currencies' || $page == 'administrar-colores-para-publicaciones' || $page == 'live' || $page == 'node' || $page == 'administrar-reacciones' || $page == 'ffmpeg' || $page == 'cronjob_settings') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">settings</i>
                            </span>
                            <span><?=$wo['lang']['setting']; ?></span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configuracion-general'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'configuracion-general') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configuracion-general'); ?>" data-ajax="?path=configuracion-general"><?=$wo['lang']['general_setting'];?></a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configurar-web'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'configurar-web') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configurar-web'); ?>" data-ajax="?path=configurar-web"><?=$wo['lang']['site_setting']; ?></a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configurar-subidas-de-archivos'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'configurar-subidas-de-archivos') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configurar-subidas-de-archivos'); ?>" data-ajax="?path=configurar-subidas-de-archivos"><?=$wo['lang']['upload_docs']; ?></a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configurar-correo'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'configurar-correo') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configurar-correo'); ?>" data-ajax="?path=configurar-correo">Configurar Correo & SMS</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configurar-chat'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'configurar-chat') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configurar-chat'); ?>" data-ajax="?path=configurar-chat">Chat & Video/Audio</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['social-login'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'social-login') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('social-login'); ?>" data-ajax="?path=social-login">Configurar login social</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['node'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'node') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('node'); ?>" data-ajax="?path=node">Configurar NodeJS</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['cronjob_settings'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'cronjob_settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('cronjob_settings'); ?>" data-ajax="?path=cronjob_settings">Configuracion de trabajo cron</a>
                            </li>
                            <?php } ?>

                            <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['configurar-publicaciones'] == 1 || $wo['user']['permission']['administrar-colores-para-publicaciones'] == 1 || $wo['user']['permission']['administrar-reacciones'] == 1 || $wo['user']['permission']['live'] == 1))) { ?>
                            <li>
                                <a <?php echo ($page == 'configurar-publicaciones' || $page == 'administrar-colores-para-publicaciones' || $page == 'administrar-reacciones' || $page == 'live') ? 'class="open"' : ''; ?> href="javascript:void(0);">Configuracion de publicaciones</a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configurar-publicaciones'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'configurar-publicaciones') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configurar-publicaciones'); ?>" data-ajax="?path=configurar-publicaciones">
                                            <span>Configurar publicaciones</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && isset($wo['user']['permission']['administrar-colores-para-publicaciones']) == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'administrar-colores-para-publicaciones') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('administrar-colores-para-publicaciones'); ?>" data-ajax="?path=administrar-colores-para-publicaciones">
                                            <span>Colores para publicaciones</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && isset($wo['user']['permission']['administrar-reacciones']) == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'administrar-reacciones') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('administrar-reacciones'); ?>" data-ajax="?path=administrar-reacciones">
                                            <span>Publicar reacciones</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && isset($wo['user']['permission']['live']) == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'live') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('live'); ?>" data-ajax="?path=live">Transmision en vivo</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-stickers'] == 1 || $wo['user']['permission']['add-new-sticker'] == 1 || $wo['user']['permission']['manage-gifts'] == 1 || $wo['user']['permission']['add-new-gift'] == 1 || $wo['user']['permission']['administrar-publicaciones'] == 1 || $wo['user']['permission']['manage-articles'] == 1 || $wo['user']['permission']['products-sub-categories'] == 1 || $wo['user']['permission']['blogs-categories'] == 1 || $wo['user']['permission']['products-categories'] == 1 || $wo['user']['permission']['products-sections'] == 1 || $wo['user']['permission']['administrar-ofertas'] == 1 || $wo['user']['permission']['administrar-sucursales'] == 1 || $wo['user']['permission']['proveedores'] == 1 || $wo['user']['permission']['unidad-medidad'] == 1 || $wo['user']['permission']['compras'] == 1 || $wo['user']['permission']['manage-products'] == 1 || $wo['user']['permission']['manage-orders'] == 1))) { ?>

                     <li <?php echo ($page == 'manage-stickers' || $page == 'add-new-sticker' || $page == 'manage-gifts' || $page == 'add-new-gift' || $page == 'administrar-publicaciones' || $page == 'manage-articles' || $page == 'products-sub-categories' || $page == 'blogs-categories' || $page == 'products-categories' || $page == 'products-sections' || $page == 'administrar-ofertas' || $page == 'administrar-sucursales' || $page == 'proveedores'  || $page == 'unidad-medidad' || $page == 'compras' || $page == 'manage-products' || $page == 'manage-orders') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">view_agenda</i>
                            </span>
                            <span>Administrar</span>
                        </a>

                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['administrar-caracteristicas'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'administrar-caracteristicas') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('administrar-caracteristicas'); ?>" data-ajax="?path=administrar-caracteristicas">Habilitar/deshabilitar funciones</a>
                            </li>
                            <?php } ?>
                         
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['administrar-publicaciones'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'administrar-publicaciones') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('administrar-publicaciones'); ?>" data-ajax="?path=administrar-publicaciones">Publicaciones</a>
                            </li>
                            <?php } ?>
                           
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['administrar-ofertas'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'administrar-ofertas') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('administrar-ofertas'); ?>" data-ajax="?path=administrar-ofertas">Ofertas</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-articles'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-articles') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-articles'); ?>" data-ajax="?path=manage-articles">Articulos (Blog)</a>
                            </li>
                            <?php } ?>
                           
                            <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['store-settings'] == 1 || $wo['user']['permission']['manage-products'] == 1 || $wo['user']['permission']['manage-orders'] == 1 || $wo['user']['permission']['manage-reviews'] == 1 || $wo['user']['permission']['administrar-sucursales'] == 1 || $wo['user']['permission']['proveedores'] == 1 || $wo['user']['permission']['unidad-medidad'] == 1 || $wo['user']['permission']['compras'] == 1 || $wo['user']['permission']['colores_productos'] == 1 ))) { ?>
                            <li <?php echo ($page == 'store-settings' || $page == 'manage-products' || $page == 'manage-orders' || $page == 'manage-reviews' || $page == 'administrar-sucursales' || $page == 'proveedores' || $page == 'unidad-medidad' || $page == 'compras' || $page=='colores_productos') ? 'class="open"' : ''; ?>>
                                <a href="javascript:void(0);">Tienda</a>
                                <ul class="ml-menu">

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-orders'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'manage-orders') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-orders'); ?>" data-ajax="?path=manage-orders">
                                            <span>Ventas</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['compras'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'compras') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('compras'); ?>" data-ajax="?path=compras">
                                            <span>Compras</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-products'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'manage-products') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-products'); ?>" data-ajax="?path=manage-products">
                                            <span>Productos</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['imventario'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'imventario') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('imventario'); ?>" data-ajax="?path=imventario">
                                            <span>Imventario</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['proveedores'] == 1 )) { ?>
                                    <li>
                                        <a <?php echo ($page == 'proveedores') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('proveedores'); ?>" data-ajax="?path=proveedores">
                                            <span>Proveedores</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reviews'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'manage-reviews') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-reviews'); ?>" data-ajax="?path=manage-reviews">
                                            <span>Calificacion de productos</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['administrar-sucursales'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'administrar-sucursales') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('administrar-sucursales'); ?>" data-ajax="?path=administrar-sucursales">
                                            <span>Sucursales</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['unidad-medidad'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'unidad-medidad') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('unidad-medidad'); ?>" data-ajax="?path=unidad-medidad">
                                            <span>Unidad de medida</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['store-settings'] == 1 )) { ?>
                                    <li>
                                        <a <?php echo ($page == 'store-settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('store-settings'); ?>" data-ajax="?path=store-settings">
                                            <span>Configurar tienda</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if($is_admin || ($is_moderoter && $wo['user']['permission']['colores_productos'] == 1)){ ?>
                                        <li>
                                            <a <?php echo($page == 'colores_productos') ? 'class="active"' : ''; ?> href="<?=lui_LoadAdminLinkSettings('colores_productos');?>" data-ajax="?path=colores_productos">
                                                <span>Colores productos</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>

                            <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['products-sub-categories'] == 1 || $wo['user']['permission']['blogs-categories'] == 1 || $wo['user']['permission']['products-categories'] == 1 || $wo['user']['permission']['products-sections'] == 1 ))) { ?>
                            <li <?php echo ($page == 'products-sub-categories' || $page == 'blogs-categories' || $page == 'products-categories' || $page == 'products-sections') ? 'class="open"' : ''; ?>>
                                <a href="javascript:void(0);">Categorias</a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['blogs-categories'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'blogs-categories') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('blogs-categories'); ?>" data-ajax="?path=blogs-categories">
                                            <span>Blogs Categorias</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-sections'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'products-sections') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('products-sections'); ?>" data-ajax="?path=products-sections">
                                            <span><?=$wo['lang']['categoria_section'];?></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-categories'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'products-categories') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('products-categories'); ?>" data-ajax="?path=products-categories">
                                            <span>Categorias productos</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['products-sub-categories'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'products-sub-categories') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('products-sub-categories'); ?>" data-ajax="?path=products-sub-categories">
                                            <span>Sub Categorias Productos</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['add-new-gift'] == 1 || $wo['user']['permission']['manage-gifts'] == 1 ))) { ?>
                            <?php if ($wo['config']['gift_system'] == 1){?>
                            <li <?php echo ($page == 'manage-gifts' || $page == 'add-new-gift') ? 'class="open"' : ''; ?>>
                                <a href="javascript:void(0);">Gifts</a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-gifts'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'manage-gifts') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-gifts'); ?>" data-ajax="?path=manage-gifts">
                                            <span>Administrar Gifts</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-gift'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'add-new-gift') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('add-new-gift'); ?>" data-ajax="?path=add-new-gift">
                                            <span>Agregar nuevo Gift</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php } ?>

                            <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-stickers'] == 1 || $wo['user']['permission']['add-new-sticker'] == 1 ))) { ?>
                            <?php if ($wo['config']['stickers_system'] == 1){?>
                            <li <?php echo ($page == 'manage-stickers' || $page == 'add-new-sticker') ? 'class="open"' : ''; ?>>
                                <a href="javascript:void(0);">Stickers</a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-stickers'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'manage-stickers') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-stickers'); ?>" data-ajax="?path=manage-stickers">
                                            <span>Administrar Stickers</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-new-sticker'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'add-new-sticker') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('add-new-sticker'); ?>" data-ajax="?path=add-new-sticker">
                                            <span>Agregar sticker</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-languages'] == 1 || $wo['user']['permission']['add-language'] == 1 || $wo['user']['permission']['edit-lang'] == 1 ))) { ?>
                    <li <?php echo ($page == 'manage-languages' || $page == 'add-language' || $page == 'edit-lang') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">language</i>
                            </span>
                            <span><?=$wo['lang']['languages'];?></span>
                        </a>
                        <ul <?php echo ($page == 'manage-languages' || $page == 'add-language' || $page == 'edit-lang') ? 'style="display: block;"' : ''; ?>>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['add-language'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'add-language') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('add-language'); ?>" data-ajax="?path=add-language">Agregar Lenguaje & Keys</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-languages'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-languages' || $page == 'edit-lang') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-languages'); ?>" data-ajax="?path=manage-languages">Administrar Lenguajes</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && empty(isset($wo['user']['permission']['manage-users']) == 1 || isset($wo['user']['permission']['manage-stories']) == 1 || isset($wo['user']['permission']['add-new-profile-field']) == 1 || isset($wo['user']['permission']['manage-verification-reqeusts']) == 1 || isset($wo['user']['permission']['affiliates-settings']) == 1 || isset($wo['user']['permission']['payment-reqeuests']) == 1 || isset($wo['user']['permission']['referrals-list']) == 1 || isset($wo['user']['permission']['online-users']) == 1 || isset($wo['user']['permission']['manage-genders']) == 1))) { ?>
                    <li  <?php echo ($page == 'manage-users' || $page == 'manage-stories' || $page == 'add-new-profile-field' || $page == 'edit-profile-field' || $page == 'manage-verification-reqeusts' || $page == 'affiliates-settings' || $page == 'payment-reqeuests' || $page == 'referrals-list' || $page == 'online-users' || $page == 'manage-genders') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">account_circle</i>
                            </span>
                            <span>Usuarios</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-users'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-users') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-users'); ?>" data-ajax="?path=manage-users">Administrar usuarios</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['online-users'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'online-users') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('online-users'); ?>" data-ajax="?path=online-users">Usuarios en linea</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-stories'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-stories') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-stories'); ?>" data-ajax="?path=manage-stories">Administrar historias de usuario / estado</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-verification-reqeusts'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-verification-reqeusts') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-verification-reqeusts'); ?>" data-ajax="?path=manage-verification-reqeusts">Administrar solicitudes de verificacion</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && (isset($wo['user']['permission']['affiliates-settings']) == 1 || isset($wo['user']['permission']['payment-reqeuests']) == 1 || isset($wo['user']['permission']['referrals-list']) == 1))) { ?>

                            <li>
                                <a <?php echo ($page == 'affiliates-settings' || $page == 'payment-reqeuests' || $page == 'referrals-list') ? 'class="active"' : ''; ?> href="javascript:void(0);">Sistema de Afiliados</a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['affiliates-settings'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'affiliates-settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('affiliates-settings'); ?>" data-ajax="?path=affiliates-settings">
                                            <span>Configuracion de afiliados</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['payment-reqeuests'] == 1)) { ?>
                                    <li>
                                        <a <?php echo ($page == 'payment-reqeuests') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('payment-reqeuests'); ?>" data-ajax="?path=payment-reqeuests">
                                            <span>Solicitudes de pago</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-genders'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-genders') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-genders'); ?>" data-ajax="?path=manage-genders">Administrar generos</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['ads-settings'] == 1 || $wo['user']['permission']['manage-site-ads'] == 1 || $wo['user']['permission']['manage-user-ads'] == 1 || $wo['user']['permission']['bank-receipts'] == 1 || $wo['user']['permission']['payment-settings'] == 1 || $wo['user']['permission']['manage-currencies'] == 1 ))) { ?>
                    <li <?php echo ($page == 'ads-settings' || $page == 'manage-site-ads' || $page == 'manage-user-ads' || $page == 'bank-receipts' || $page == 'payment-settings' || $page == 'manage-currencies') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">attach_money</i>
                            </span>
                            <span>Pagos</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['payment-settings'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'payment-settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('payment-settings'); ?>" data-ajax="?path=payment-settings">Configuracion de pago</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['ads-settings'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'ads-settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('ads-settings'); ?>" data-ajax="?path=ads-settings">Configuracion de anuncios </a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-currencies'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-currencies') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-currencies'); ?>" data-ajax="?path=manage-currencies">Administrar monedas</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-site-ads'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-site-ads') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-site-ads'); ?>" data-ajax="?path=manage-site-ads">Administrar anuncios del sitio</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-user-ads'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-user-ads') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-user-ads'); ?>" data-ajax="?path=manage-user-ads">Administrar anuncios de usuario</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['bank-receipts'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'bank-receipts') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('bank-receipts'); ?>" data-ajax="?path=bank-receipts">
                                    <span>Administrar recibos bancarios</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && empty(isset($wo['user']['permission']['pro-settings']) == 1 || isset($wo['user']['permission']['pro-memebers']) == 1 || isset($wo['user']['permission']['pro-payments']) == 1 || isset($wo['user']['permission']['pro-features']) == 1 || isset($wo['user']['permission']['pro-refund']) == 1))) { ?>
                        <li <?php echo ($page == 'pro-settings' || $page == 'pro-memebers' || $page == 'pro-payments' || $page == 'pro-features' || $page == 'pro-refund') ? 'class="open"' : ''; ?>>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i class="material-icons">stars</i>
                                </span>
                                <span>Sistema profesional</span>
                            </a>
                            <ul class="ml-menu">
                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-settings'] == 1)) { ?>
                                <li>
                                    <a <?php echo ($page == 'pro-settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('pro-settings'); ?>" data-ajax="?path=pro-settings">Sistema profesional</a>
                                </li>
                                <?php } ?>
                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-payments'] == 1)) { ?>
                                <li>
                                    <a <?php echo ($page == 'pro-payments') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('pro-payments'); ?>" data-ajax="?path=pro-payments">Administrar pagos</a>
                                </li>
                                <?php } ?>
                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-memebers'] == 1)) { ?>
                                <li>
                                    <a <?php echo ($page == 'pro-memebers') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('pro-memebers'); ?>" data-ajax="?path=pro-memebers">Administrar miembros</a>
                                </li>
                                <?php } ?>
                                <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['pro-refund'] == 1)) { ?>
                                <li>
                                    <a <?php echo ($page == 'pro-refund') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('pro-refund'); ?>" data-ajax="?path=pro-refund">Administrar solicitudes de reembolso</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-themes'] == 1 || $wo['user']['permission']['manage-site-design'] == 1 || $wo['user']['permission']['custom-code'] == 1))) { ?>
                    <li <?php echo ($page == 'manage-themes' || $page == 'manage-site-design' || $page == 'custom-code') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">color_lens</i>
                            </span>
                            <span>Diseño</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-themes'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-themes') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-themes'); ?>" data-ajax="?path=manage-themes">Temas</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-site-design'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-site-design') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-site-design'); ?>" data-ajax="?path=manage-site-design">Diseño del sitio</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['custom-code'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'custom-code') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('custom-code'); ?>" data-ajax="?path=custom-code">JS/CSS personalizado</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-announcements'] == 1 || $wo['user']['permission']['mass-notifications'] == 1 || $wo['user']['permission']['ban-users'] == 1 || $wo['user']['permission']['generate-sitemap'] == 1 || $wo['user']['permission']['manage-invitation-keys'] == 1 || $wo['user']['permission']['backups'] == 1 || $wo['user']['permission']['auto-delete'] == 1 || $wo['user']['permission']['auto-friend'] == 1 || $wo['user']['permission']['fake-users'] == 1 || $wo['user']['permission']['send_email'] == 1 || $wo['user']['permission']['manage-invitation'] == 1))) { ?>
                    <li <?php echo ($page == 'manage-announcements' || $page == 'mass-notifications' || $page == 'ban-users' || $page == 'generate-sitemap' || $page == 'manage-invitation-keys' || $page == 'backups' || $page == 'auto-delete' || $page == 'auto-friend' || $page == 'fake-users' || $page == 'send_email' || $page == 'manage-invitation') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">build</i>
                            </span>
                            <span>Herramientas</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage_emails'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage_emails') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage_emails'); ?>" data-ajax="?path=manage_emails">Administrar correos</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-invitation'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-invitation') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-invitation'); ?>" data-ajax="?path=manage-invitation">Invitacion de los usuarios</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['send_email'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'send_email') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('send_email'); ?>" data-ajax="?path=send_email">Enviar correo</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-announcements'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-announcements') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-announcements'); ?>" data-ajax="?path=manage-announcements">Anuncios</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['auto-delete'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'auto-delete') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('auto-delete'); ?>" data-ajax="?path=auto-delete">Eliminar datos automáticamente</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['auto-friend'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'auto-friend') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('auto-friend'); ?>" data-ajax="?path=auto-friend">Amigo automatico</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['fake-users'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'fake-users') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('fake-users'); ?>" data-ajax="?path=fake-users">Generador de usuarios falsos</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['mass-notifications'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'mass-notifications') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('mass-notifications'); ?>" data-ajax="?path=mass-notifications">Notificaciones Masivas</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['ban-users'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'ban-users') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('ban-users'); ?>" data-ajax="?path=ban-users">Lista negra</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['generate-sitemap'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'generate-sitemap') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('generate-sitemap'); ?>" data-ajax="?path=generate-sitemap">Generar mapa del sitio</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-invitation-keys'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-invitation-keys') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-invitation-keys'); ?>" data-ajax="?path=manage-invitation-keys">Codigos de invitacion</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['backups'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'backups') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('backups'); ?>" data-ajax="?path=backups">Copia de seguridad de SQL y archivos</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && empty(isset($wo['user']['permission']['edit-terms-pages']) == 1 || isset($wo['user']['permission']['manage_terms_pages']) == 1 || isset($wo['user']['permission']['manage-custom-pages']) == 1 || isset($wo['user']['permission']['add-new-custom-page']) == 1 || isset($wo['user']['permission']['edit-custom-page']) == 1 ))) { ?>
                    <li <?php echo ($page == 'edit-terms-pages' || $page == 'manage_terms_pages' || $page == 'manage-custom-pages' || $page == 'add-new-custom-page' || $page == 'edit-custom-page') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">description</i>
                            </span>
                            <span>Paginas</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-custom-pages'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-custom-pages') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-custom-pages'); ?>" data-ajax="?path=manage-custom-pages">Administrar paginas personalizadas</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['edit-terms-pages'] == 1 && $wo['user']['permission']['manage_terms_pages'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage_terms_pages' || $page == 'edit-terms-pages') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage_terms_pages'); ?>" data-ajax="?path=manage_terms_pages">Administrar terminos de paginas</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['manage-reports'] == 1 || $wo['user']['permission']['user_reports'] == 1 ))) { ?>
                    <li <?php echo ($page == 'manage-reports' || $page == 'user_reports') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">warning</i>
                            </span>
                            <span>Informes</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-reports'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-reports') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-reports'); ?>" data-ajax="?path=manage-reports">Administrar informes</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['user_reports'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'user_reports') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('user_reports'); ?>" data-ajax="?path=user_reports">Administrar informes de usuarios</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['push-notifications-system'] == 1 || $wo['user']['permission']['manage-api-access-keys'] == 1))) { ?>
                    <li <?php echo ($page == 'push-notifications-system' || $page == 'manage-api-access-keys') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">compare_arrows</i>
                            </span>
                            <span>Configuracion de la API</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-api-access-keys'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-api-access-keys') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-api-access-keys'); ?>" data-ajax="?path=manage-api-access-keys">Administrar la clave del servidor API</a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['push-notifications-system'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'push-notifications-system') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('push-notifications-system'); ?>" data-ajax="?path=push-notifications-system">Configuracion de notificaciones automaticas</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($is_admin || ($is_moderoter && (isset($wo['user']['permission']['manage-updates']) == 1))) { ?>
                   <!--  <li <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i class="material-icons">cloud_download</i>
                            </span>
                            <span>Updates</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-updates'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-updates'); ?>" data-ajax="?path=manage-updates">Updates & Bug Fixes</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li> -->
                    <?php } ?>

                    <?php if ($is_admin) { ?>
                    <li>
                        <a <?php echo ($page == 'system_status') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('system_status'); ?>" data-ajax="?path=system_status">
                            <span class="nav-link-icon">
                                <i class="material-icons">info</i>
                            </span>
                            <span><?=$wo['lang']['status'];?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['changelog'] == 1))) { ?>
                    <li>
                        <a <?php echo ($page == 'changelog') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('changelog'); ?>" data-ajax="?path=changelog">
                            <span class="nav-link-icon">
                                <i class="material-icons">update</i>
                            </span>
                            <span><?=$wo['lang']['update'];?></span>
                        </a>
                    </li>
                    <?php } ?>
                    <a class="pow_link" target="_blank">
                        <img height="40" width="40" src="<?=$wo['config']['site_url']."/admin/datos/imagenes/icon.png" ?>">
                        <b class="badge">v<?php echo $wo['config']['version'];?></b>
                    </a>
                </ul>
            </div>
        </div>
        <!-- end::navigation -->

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                <?php echo $page_loaded; ?>
            </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->
<div class="select_pro_model"></div>
    <!--Script principal -->
    <script src="<?=lui_LoadAdminLink('datos/source/estilos/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?=lui_LoadAdminLink('datos/source/estilos/select2/js/select2.min.js') ?>"></script>
    <script src="<?=lui_LoadAdminLink('datos/source/estilos/js/examples/select2.js') ?>"></script>
    <script src="<?=lui_LoadAdminLink('datos/source/estilos/js/app.min.js') ?>"></script>

     <script type="text/javascript">
        function Wo_SubmitSelectProForm(self) {
            let form_select_pro = $('.SelectProModalForm');
            form_select_pro.ajaxForm({
                url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=select_pro_package',
                beforeSend: function() {
                    form_select_pro.find('.waves-effect').text('Please wait..');
                },
                success: function(data) {
                    form_select_pro.find('.waves-effect').text('Save');
                    $('#SelectProModal').animate({
                        scrollTop : 0                       // Scroll to top of body
                    }, 500);
                    if (data.status == 200) {
                        $('#SelectProModalAlert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                    else{
                        $('#SelectProModalAlert').html('<div class="alert alert-danger">'+data.message+'</div>');
                    }
                }
            });
            form_select_pro.submit();
        }
        function SelectProModel(type,self) {
            if ($(self).val() == 'pro') {
                hash_id = $('#hash_id').val();
                $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'select_pro_model', hash_id: hash_id, type: type}, function(data) {
                    $('.select_pro_model').html('');
                    $('.select_pro_model').html(data.html);
                    $('#SelectProModal').modal('show');
                });
            }
                
        }
        function ChangeMode(mode) {
            if (mode == 'day') {
                $('body').removeClass('dark');
                $('.admin_mode').html('<span id="night-mode-text">Night mode</span><svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>');
                $('.admin_mode').attr('onclick', "ChangeMode('night')");
            }
            else{
                $('body').addClass('dark');
                $('.admin_mode').html('<span id="night-mode-text">Day mode</span><svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>');
                $('.admin_mode').attr('onclick', "ChangeMode('day')");
            }
            hash_id = $('#hash_id').val();
            $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'change_mode', hash_id: hash_id}, function(data) {});
        }
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
            var hash = $('.main_session').val();
              $.ajaxSetup({
                data: {
                    hash: hash
                },
                cache: false
              });
        });
        $('body').on('click', function (e) {
            $('.dropdown-animating').removeClass('show');
            $('.dropdown-menu').removeClass('show');
        });
        function searchInFiles(keyword) {
            if (keyword.length > 2) {
                $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=search_in_pages', {keyword: keyword}, function(data, textStatus, xhr) {
                    if (data.html != '') {
                        $('#search_for_bar').html(data.html)
                    }
                    else{
                        $('#search_for_bar').html('')
                    }
                });
            }
            else{
                $('#search_for_bar').html('')
            }
        }
        jQuery(document).ready(function($) {
            jQuery.fn.highlight = function (str, className) {
                if (str != '') {
                    var aTags = document.getElementsByTagName("h2");
                    var bTags = document.getElementsByTagName("label");
                    var cTags = document.getElementsByTagName("h3");
                    var dTags = document.getElementsByTagName("h6");
                    var searchText = str.toLowerCase();

                    if (aTags.length > 0) {
                        for (var i = 0; i < aTags.length; i++) {
                            var tag_text = aTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(aTags[i]).addClass(className)
                            }
                        }
                    }

                    if (bTags.length > 0) {
                        for (var i = 0; i < bTags.length; i++) {
                            var tag_text = bTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(bTags[i]).addClass(className)
                            }
                        }
                    }

                    if (cTags.length > 0) {
                        for (var i = 0; i < cTags.length; i++) {
                            var tag_text = cTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(cTags[i]).addClass(className)
                            }
                        }
                    }

                    if (dTags.length > 0) {
                        for (var i = 0; i < dTags.length; i++) {
                            var tag_text = dTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(dTags[i]).addClass(className)
                            }
                        }
                    }
                }
            };
            jQuery.fn.highlight("<?php echo (!empty($_GET['highlight']) ? $_GET['highlight'] : '') ?>",'highlight_text');
            $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'exchange'});
        });
        $(document).on('click', '#search_for_bar a', function(event) {
            event.preventDefault();
            location.href = $(this).attr('href');
        });
        function ReadNotify() {
            hash_id = $('#hash_id').val();
            $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'ReadNotify', hash_id: hash_id});
            location.reload();
        }
        function delay(callback, ms) {
          var timer = 0;
          return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
              callback.apply(context, args);
            }, ms || 0);
          };
        }
        let container_fluid_height = $('.container-fluid').height();
        
        setInterval(function () {
            if (container_fluid_height != $('.container-fluid').height()) {
                container_fluid_height = $('.container-fluid').height();
                $(".content").getNiceScroll().resize();
            }
        },500);
    </script>
    <style type="text/css">
        .loaderd_sitr {
  --speed_gold: 1000ms;
  position: relative;
  font-size: 2.5em;
}

.loaderd_sitr .tile_lo {
  width: 1em;
  height: 1em;
  animation: var(--speed_gold) ease infinite jumpgold;
  transform-origin: 0 100%;
  will-change: transform;
}

.loaderd_sitr .tile_lo::before {
  content: "";
  display: block;
  width: inherit;
  height: inherit;
  border-radius: 0.15em;
  background-color: currentColor;
  animation: var(--speed_gold) ease-out infinite spin_gold;
  will-change: transform;
}

.loaderd_sitr::after {
  content: "";
  display: block;
  width: 1.1em;
  height: 0.2em;
  background-color: #0132;
  border-radius: 60%;
  position: absolute;
  left: -0.05em;
  bottom: -0.1em;
  z-index: -1;
  animation: var(--speed_gold) ease-in-out infinite shadowgolde;
  filter: blur(0.02em);
  will-change: transform filter;
}

@keyframes jumpgold {
  0% {
    transform: scaleY(1) translateY(0);
  }
  16% {
    transform: scaleY(0.6) translateY(0);
  }
  22% {
    transform: scaleY(1.2) translateY(-5%);
  }
  24%,
  62% {
    transform: scaleY(1) translateY(-33%);
  }
  66% {
    transform: scaleY(1.2) translateY(0);
  }
  72% {
    transform: scaleY(0.8) translateY(0);
  }
  88% {
    transform: scaleY(1) translateY(0);
  }
}

@keyframes spin_gold {
  0%,
  18% {
    transform: rotateZ(0);
    border-radius: 0.15em;
  }
  38% {
    border-radius: 0.25em;
  }
  66%,
  100% {
    transform: rotateZ(1turn);
    border-radius: 0.15em;
  }
}

@keyframes shadowgolde {
  0% {
    transform: scale(1);
    filter: blur(0.02em);
  }
  25%,
  60% {
    transform: scale(0.8);
    filter: blur(0.06em);
  }
  70% {
    transform: scale(1.1);
    filter: blur(0.02em);
  }
  90% {
    transform: scale(1);
  }
}
    </style>
</body>
</html>