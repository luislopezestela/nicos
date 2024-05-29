<?php
$page = 'dashboard';
$wo['all_pages'] = scandir('admin/paginas');
unset($wo['all_pages'][0]);
unset($wo['all_pages'][1]);
unset($wo['all_pages'][2]);
$pages = [
    'configuracion-general',
    'dashboard',
    'site-settings',
    'dashboard',
    'compras',
    'inventario',
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
];
$wo['mod_pages'] = ['dashboard', 'proveedores', 'compras', 'inventario', 'manage-products', 'manage-orders', 'manage-reports', 'bank-receipts', 'colores_productos'];
$wo['nopag_pages'] = ['proveedores', 'compras', 'inventario', 'colores_productos'];

if (!empty($_GET['page'])) {
    $page = lui_Secure($_GET['page'], 0);
}
$wo['decode_android_v'] = $wo['config']['footer_background'];
$wo['decode_android_value'] = base64_decode('I2FhYQ==');

$wo['decode_android_n_v'] = $wo['config']['footer_background_n'];
$wo['decode_android_n_value'] = base64_decode('I2FhYQ==');

$wo['decode_ios_v'] = $wo['config']['footer_background_2'];
$wo['decode_ios_value'] = base64_decode('I2FhYQ==');

$wo['decode_windwos_v'] = $wo['config']['footer_text_color'];
$wo['decode_windwos_value'] = base64_decode('I2RkZA==');
if ($is_moderoter && !empty($wo['user']['permission'])) {
    $wo['user']['permission'] = json_decode($wo['user']['permission'], true);
    if (!array_key_exists($page, $wo['user']['permission'])) {
        $wo['user']['permission'][$page] = 0;
        $permission = json_encode($wo['user']['permission']);
        $db->where('user_id', $wo['user']['user_id'])->update(T_USERS, ['permission' => $permission]);
        header("Location: " . lui_LoadAdminLinkSettings($page));
        exit();
    } else {
        if ($wo['user']['permission'][$page] == 0) {
            foreach ($wo['user']['permission'] as $key => $value) {
                if ($value == 1) {
                    header("Location: " . lui_LoadAdminLinkSettings($key));
                    exit();
                }
            }
        }
    }
} elseif ($is_moderoter && empty($wo['user']['permission'])) {
    $permission = [];
    if (!empty($wo['all_pages'])) {
        foreach ($wo['all_pages'] as $key => $value) {
            if (in_array($value, $wo['nopag_pages'])) {
                $permission[$value] = 0;
            } elseif (in_array($value, $wo['mod_pages'])) {
                $permission[$value] = 1;
            } else {
                $permission[$value] = 0;
            }
        }
    }
    $permission = json_encode($permission);
    $db->where('user_id', $wo['user']['user_id'])->update(T_USERS, ['permission' => $permission]);
    $wo['user'] = lui_UserData($wo['user']['user_id']);
}

if ($is_moderoter == true && $is_admin == false) {
    if (!in_array($page, $wo['mod_pages'])) {
        header("Location: " . lui_SeoLink('index.php?link1=admin-cp'));
        exit();
    }
}
if (in_array($page, $pages)) {
    $page_loaded = lui_LoadAdminPage($page . '/content');
}
if (empty($page_loaded)) {
    header("Location: " . lui_SeoLink('index.php?link1=admin-cp'));
    exit();
}

$notify_count = $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0)->getValue(T_NOTIFICATION, 'COUNT(*)');
$notifications = $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0)->orderBy('id', 'DESC')->get(T_NOTIFICATION);
$old_notifications = $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0, '!=')->orderBy('id', 'DESC')->get(T_NOTIFICATION, 5);
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
    <!-- DataTablesss -->
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M2.5 9H21.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    <path d="M6.99981 6H7.00879" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.9998 6H11.0088" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17 17C17 14.2386 14.7614 12 12 12C9.23858 12 7 14.2386 7 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M12.707 15.293L11.2928 16.7072" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span><?=$wo['lang']['dashboard'];?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['configurar-publicaciones'] == 1 || $wo['user']['permission']['administrar-colores-para-publicaciones'] == 1 || $wo['user']['permission']['administrar-reacciones'] == 1 || $wo['user']['permission']['live'] == 1 || $wo['user']['permission']['configuracion-general'] == 1 || $wo['user']['permission']['site-settings'] == 1 || $wo['user']['permission']['configurar-subidas-de-archivos'] == 1 || $wo['user']['permission']['configurar-correo'] == 1 || $wo['user']['permission']['configurar-chat'] == 1 || $wo['user']['permission']['social-login'] == 1 || $wo['user']['permission']['node'] == 1 || $wo['user']['permission']['cronjob_settings'] == 1))) { ?>
                    <li <?php echo ($page == 'configuracion-general' || $page == 'configurar-publicaciones' || $page == 'site-settings' || $page == 'configurar-correo' || $page == 'social-login' || $page == 'administrar-caracteristicas' || $page == 'configurar-subidas-de-archivos' ||  $page == 'configurar-chat' || $page == 'manage-currencies' || $page == 'administrar-colores-para-publicaciones' || $page == 'live' || $page == 'node' || $page == 'administrar-reacciones' || $page == 'ffmpeg' || $page == 'cronjob_settings') ? 'class="open"' : ''; ?>>
                        <a href="#">
                            <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M15.5 12C15.5 13.933 13.933 15.5 12 15.5C10.067 15.5 8.5 13.933 8.5 12C8.5 10.067 10.067 8.5 12 8.5C13.933 8.5 15.5 10.067 15.5 12Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M21.011 14.0965C21.5329 13.9558 21.7939 13.8854 21.8969 13.7508C22 13.6163 22 13.3998 22 12.9669V11.0332C22 10.6003 22 10.3838 21.8969 10.2493C21.7938 10.1147 21.5329 10.0443 21.011 9.90358C19.0606 9.37759 17.8399 7.33851 18.3433 5.40087C18.4817 4.86799 18.5509 4.60156 18.4848 4.44529C18.4187 4.28902 18.2291 4.18134 17.8497 3.96596L16.125 2.98673C15.7528 2.77539 15.5667 2.66972 15.3997 2.69222C15.2326 2.71472 15.0442 2.90273 14.6672 3.27873C13.208 4.73448 10.7936 4.73442 9.33434 3.27864C8.95743 2.90263 8.76898 2.71463 8.60193 2.69212C8.43489 2.66962 8.24877 2.77529 7.87653 2.98663L6.15184 3.96587C5.77253 4.18123 5.58287 4.28891 5.51678 4.44515C5.45068 4.6014 5.51987 4.86787 5.65825 5.4008C6.16137 7.3385 4.93972 9.37763 2.98902 9.9036C2.46712 10.0443 2.20617 10.1147 2.10308 10.2492C2 10.3838 2 10.6003 2 11.0332V12.9669C2 13.3998 2 13.6163 2.10308 13.7508C2.20615 13.8854 2.46711 13.9558 2.98902 14.0965C4.9394 14.6225 6.16008 16.6616 5.65672 18.5992C5.51829 19.1321 5.44907 19.3985 5.51516 19.5548C5.58126 19.7111 5.77092 19.8188 6.15025 20.0341L7.87495 21.0134C8.24721 21.2247 8.43334 21.3304 8.6004 21.3079C8.76746 21.2854 8.95588 21.0973 9.33271 20.7213C10.7927 19.2644 13.2088 19.2643 14.6689 20.7212C15.0457 21.0973 15.2341 21.2853 15.4012 21.3078C15.5682 21.3303 15.7544 21.2246 16.1266 21.0133L17.8513 20.034C18.2307 19.8187 18.4204 19.711 18.4864 19.5547C18.5525 19.3984 18.4833 19.132 18.3448 18.5991C17.8412 16.6616 19.0609 14.6226 21.011 14.0965Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                            <span><?=$wo['lang']['setting']; ?></span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['configuracion-general'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'configuracion-general') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('configuracion-general'); ?>" data-ajax="?path=configuracion-general"><?=$wo['lang']['general_setting'];?></a>
                            </li>
                            <?php } ?>
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['site-settings'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'site-settings') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('site-settings'); ?>" data-ajax="?path=site-settings"><?=$wo['lang']['site_setting']; ?></a>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M18 9.35714V10.5M18 9.35714C16.9878 9.35714 16.0961 8.85207 15.573 8.08517M18 9.35714C19.0122 9.35714 19.9039 8.85207 20.427 8.08517M18 3.64286C19.0123 3.64286 19.9041 4.148 20.4271 4.915M18 3.64286C16.9877 3.64286 16.0959 4.148 15.5729 4.915M18 3.64286V2.5M21.5 4.21429L20.4271 4.915M14.5004 8.78571L15.573 8.08517M14.5 4.21429L15.5729 4.915M21.4996 8.78571L20.427 8.08517M20.4271 4.915C20.7364 5.36854 20.9167 5.91364 20.9167 6.5C20.9167 7.08643 20.7363 7.63159 20.427 8.08517M15.5729 4.915C15.2636 5.36854 15.0833 5.91364 15.0833 6.5C15.0833 7.08643 15.2637 7.63159 15.573 8.08517" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M2 6C2 4.59987 2 3.8998 2.27248 3.36502C2.51217 2.89462 2.89462 2.51217 3.36502 2.27248C3.8998 2 4.59987 2 6 2C7.40013 2 8.1002 2 8.63498 2.27248C9.10538 2.51217 9.48783 2.89462 9.72752 3.36502C10 3.8998 10 4.59987 10 6C10 7.40013 10 8.1002 9.72752 8.63498C9.48783 9.10538 9.10538 9.48783 8.63498 9.72752C8.1002 10 7.40013 10 6 10C4.59987 10 3.8998 10 3.36502 9.72752C2.89462 9.48783 2.51217 9.10538 2.27248 8.63498C2 8.1002 2 7.40013 2 6Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M2 18C2 16.5999 2 15.8998 2.27248 15.365C2.51217 14.8946 2.89462 14.5122 3.36502 14.2725C3.8998 14 4.59987 14 6 14C7.40013 14 8.1002 14 8.63498 14.2725C9.10538 14.5122 9.48783 14.8946 9.72752 15.365C10 15.8998 10 16.5999 10 18C10 19.4001 10 20.1002 9.72752 20.635C9.48783 21.1054 9.10538 21.4878 8.63498 21.7275C8.1002 22 7.40013 22 6 22C4.59987 22 3.8998 22 3.36502 21.7275C2.89462 21.4878 2.51217 21.1054 2.27248 20.635C2 20.1002 2 19.4001 2 18Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M14 18C14 16.5999 14 15.8998 14.2725 15.365C14.5122 14.8946 14.8946 14.5122 15.365 14.2725C15.8998 14 16.5999 14 18 14C19.4001 14 20.1002 14 20.635 14.2725C21.1054 14.5122 21.4878 14.8946 21.7275 15.365C22 15.8998 22 16.5999 22 18C22 19.4001 22 20.1002 21.7275 20.635C21.4878 21.1054 21.1054 21.4878 20.635 21.7275C20.1002 22 19.4001 22 18 22C16.5999 22 15.8998 22 15.365 21.7275C14.8946 21.4878 14.5122 21.1054 14.2725 20.635C14 20.1002 14 19.4001 14 18Z" stroke="currentColor" stroke-width="1.5" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M2 12C2 13.0519 2.18046 14.0617 2.51212 15M13.0137 9H21.5015M11 15H2.51212M21.5015 9C20.266 5.50442 16.9323 3 13.0137 3C14.6146 3 15.9226 6.76201 16.0091 11.5M21.5015 9C21.7803 9.78867 21.9522 10.6278 22 11.5M2.51212 15C3.74763 18.4956 7.08134 21 11 21C9.45582 21 8.18412 17.5 8.01831 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 5.29734C2 4.19897 2 3.64979 2.18738 3.22389C2.3861 2.77223 2.72861 2.40921 3.15476 2.1986C3.55661 2 4.07478 2 5.11111 2H6C7.88562 2 8.82843 2 9.41421 2.62085C10 3.2417 10 4.24095 10 6.23944V8.49851C10 9.37026 10 9.80613 9.73593 9.95592C9.47186 10.1057 9.12967 9.86392 8.4453 9.38036L8.34103 9.30669C7.84086 8.95329 7.59078 8.77658 7.30735 8.68563C7.02392 8.59468 6.72336 8.59468 6.12223 8.59468H5.11111C4.07478 8.59468 3.55661 8.59468 3.15476 8.39608C2.72861 8.18547 2.3861 7.82245 2.18738 7.37079C2 6.94489 2 6.39571 2 5.29734Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M22 17.2973C22 16.199 22 15.6498 21.8126 15.2239C21.6139 14.7722 21.2714 14.4092 20.8452 14.1986C20.4434 14 19.9252 14 18.8889 14H18C16.1144 14 15.1716 14 14.5858 14.6209C14 15.2417 14 16.2409 14 18.2394V20.4985C14 21.3703 14 21.8061 14.2641 21.9559C14.5281 22.1057 14.8703 21.8639 15.5547 21.3804L15.659 21.3067C16.1591 20.9533 16.4092 20.7766 16.6926 20.6856C16.9761 20.5947 17.2766 20.5947 17.8778 20.5947H18.8889C19.9252 20.5947 20.4434 20.5947 20.8452 20.3961C21.2714 20.1855 21.6139 19.8225 21.8126 19.3708C22 18.9449 22 18.3957 22 17.2973Z" stroke="currentColor" stroke-width="1.5" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M20.9427 16.8354C20.2864 12.8866 18.2432 9.94613 16.467 8.219C15.9501 7.71642 15.6917 7.46513 15.1208 7.23257C14.5499 7 14.0592 7 13.0778 7H10.9222C9.94081 7 9.4501 7 8.87922 7.23257C8.30834 7.46513 8.04991 7.71642 7.53304 8.219C5.75682 9.94613 3.71361 12.8866 3.05727 16.8354C2.56893 19.7734 5.27927 22 8.30832 22H15.6917C18.7207 22 21.4311 19.7734 20.9427 16.8354Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.25662 4.44287C7.05031 4.14258 6.75128 3.73499 7.36899 3.64205C8.00392 3.54651 8.66321 3.98114 9.30855 3.97221C9.89237 3.96413 10.1898 3.70519 10.5089 3.33548C10.8449 2.94617 11.3652 2 12 2C12.6348 2 13.1551 2.94617 13.4911 3.33548C13.8102 3.70519 14.1076 3.96413 14.6914 3.97221C15.3368 3.98114 15.9961 3.54651 16.631 3.64205C17.2487 3.73499 16.9497 4.14258 16.7434 4.44287L15.8105 5.80064C15.4115 6.38146 15.212 6.67187 14.7944 6.83594C14.3769 7 13.8373 7 12.7582 7H11.2418C10.1627 7 9.6231 7 9.20556 6.83594C8.78802 6.67187 8.5885 6.38146 8.18945 5.80064L7.25662 4.44287Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    <path d="M13.6267 12.9186C13.4105 12.1205 12.3101 11.4003 10.9892 11.9391C9.66829 12.4778 9.45847 14.2113 11.4565 14.3955C12.3595 14.4787 12.9483 14.2989 13.4873 14.8076C14.0264 15.3162 14.1265 16.7308 12.7485 17.112C11.3705 17.4932 10.006 16.8976 9.85742 16.0517M11.8417 10.9927V11.7531M11.8417 17.2293V17.9927" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                        <path d="M13.7276 3.44418L15.4874 6.99288C15.7274 7.48687 16.3673 7.9607 16.9073 8.05143L20.0969 8.58575C22.1367 8.92853 22.6167 10.4206 21.1468 11.8925L18.6671 14.3927C18.2471 14.8161 18.0172 15.6327 18.1471 16.2175L18.8571 19.3125C19.417 21.7623 18.1271 22.71 15.9774 21.4296L12.9877 19.6452C12.4478 19.3226 11.5579 19.3226 11.0079 19.6452L8.01827 21.4296C5.8785 22.71 4.57865 21.7522 5.13859 19.3125L5.84851 16.2175C5.97849 15.6327 5.74852 14.8161 5.32856 14.3927L2.84884 11.8925C1.389 10.4206 1.85895 8.92853 3.89872 8.58575L7.08837 8.05143C7.61831 7.9607 8.25824 7.48687 8.49821 6.99288L10.258 3.44418C11.2179 1.51861 12.7777 1.51861 13.7276 3.44418Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C12.8417 22 14 22.1163 14 21C14 20.391 13.6832 19.9212 13.3686 19.4544C12.9082 18.7715 12.4523 18.0953 13 17C13.6667 15.6667 14.7778 15.6667 16.4815 15.6667C17.3334 15.6667 18.3334 15.6667 19.5 15.5C21.601 15.1999 22 13.9084 22 12Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M7 15.0024L7.00868 15.0001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="9.5" cy="8.5" r="1.5" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="16.5" cy="9.5" r="1.5" stroke="currentColor" stroke-width="1.5" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M20.3584 13.3567C19.1689 14.546 16.9308 14.4998 13.4992 14.4998C11.2914 14.4998 9.50138 12.7071 9.50024 10.4993C9.50024 7.07001 9.454 4.83065 10.6435 3.64138C11.8329 2.45212 12.3583 2.50027 17.6274 2.50027C18.1366 2.49809 18.3929 3.11389 18.0329 3.47394L15.3199 6.18714C14.6313 6.87582 14.6294 7.99233 15.3181 8.68092C16.0068 9.36952 17.1234 9.36959 17.8122 8.68109L20.5259 5.96855C20.886 5.60859 21.5019 5.86483 21.4997 6.37395C21.4997 11.6422 21.5479 12.1675 20.3584 13.3567Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M13.5 14.5L7.32842 20.6716C6.22386 21.7761 4.433 21.7761 3.32843 20.6716C2.22386 19.567 2.22386 17.7761 3.32843 16.6716L9.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M5.50896 18.5H5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M16 17L9 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16 13L13 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M20.5 14C20.5 17.7712 20.5 19.6569 19.2552 20.8284C18.0104 22 16.0069 22 12 22H11.2273C7.96607 22 6.33546 22 5.20307 21.2022C4.87862 20.9736 4.59058 20.7025 4.3477 20.3971C3.5 19.3313 3.5 17.7966 3.5 14.7273V12.1818C3.5 9.21865 3.5 7.73706 3.96894 6.55375C4.72281 4.65142 6.31714 3.15088 8.33836 2.44135C9.59563 2 11.1698 2 14.3182 2C16.1173 2 17.0168 2 17.7352 2.2522C18.8902 2.65765 19.8012 3.5151 20.232 4.60214C20.5 5.27832 20.5 6.12494 20.5 7.81818V14Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    <path d="M3.5 12C3.5 10.1591 4.99238 8.66667 6.83333 8.66667C7.49912 8.66667 8.28404 8.78333 8.93137 8.60988C9.50652 8.45576 9.95576 8.00652 10.1099 7.43136C10.2833 6.78404 10.1667 5.99912 10.1667 5.33333C10.1667 3.49238 11.6591 2 13.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M5.32171 9.6829C7.73539 5.41196 8.94222 3.27648 10.5983 2.72678C11.5093 2.42437 12.4907 2.42437 13.4017 2.72678C15.0578 3.27648 16.2646 5.41196 18.6783 9.6829C21.092 13.9538 22.2988 16.0893 21.9368 17.8293C21.7376 18.7866 21.2469 19.6548 20.535 20.3097C19.241 21.5 16.8274 21.5 12 21.5C7.17265 21.5 4.75897 21.5 3.46496 20.3097C2.75308 19.6548 2.26239 18.7866 2.06322 17.8293C1.70119 16.0893 2.90803 13.9538 5.32171 9.6829Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M11.992 16H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 13L12 8.99997" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M19 9H6.65856C5.65277 9 5.14987 9 5.02472 8.69134C4.89957 8.38268 5.25517 8.01942 5.96637 7.29289L8.21091 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5 15H17.3414C18.3472 15 18.8501 15 18.9753 15.3087C19.1004 15.6173 18.7448 15.9806 18.0336 16.7071L15.7891 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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
                     <li <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?>>
                        <a href="#">
                            <svg class='nav-link-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"  fill="none">
                                <path d="M17.4776 9.01106C17.485 9.01102 17.4925 9.01101 17.5 9.01101C19.9853 9.01101 22 11.0294 22 13.5193C22 15.8398 20.25 17.7508 18 18M17.4776 9.01106C17.4924 8.84606 17.5 8.67896 17.5 8.51009C17.5 5.46695 15.0376 3 12 3C9.12324 3 6.76233 5.21267 6.52042 8.03192M17.4776 9.01106C17.3753 10.1476 16.9286 11.1846 16.2428 12.0165M6.52042 8.03192C3.98398 8.27373 2 10.4139 2 13.0183C2 15.4417 3.71776 17.4632 6 17.9273M6.52042 8.03192C6.67826 8.01687 6.83823 8.00917 7 8.00917C8.12582 8.00917 9.16474 8.38194 10.0005 9.01101" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 21L12 13M12 21C11.2998 21 9.99153 19.0057 9.5 18.5M12 21C12.7002 21 14.0085 19.0057 14.5 18.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> 
                            <span>Actualizaciones</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin || ($is_moderoter && $wo['user']['permission']['manage-updates'] == 1)) { ?>
                            <li>
                                <a <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('manage-updates'); ?>" data-ajax="?path=manage-updates">Actualizaciones y corrección de errores</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li> 
                    <?php } ?>

                    <?php if ($is_admin) { ?>
                    <li>
                        <a <?php echo ($page == 'system_status') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('system_status'); ?>" data-ajax="?path=system_status">
                            <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M12.2422 17V12C12.2422 11.5286 12.2422 11.2929 12.0957 11.1464C11.9493 11 11.7136 11 11.2422 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.992 8H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span><?=$wo['lang']['status'];?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ($is_admin || ($is_moderoter && ($wo['user']['permission']['changelog'] == 1))) { ?>
                    <li>
                        <a <?php echo ($page == 'changelog') ? 'class="active"' : ''; ?> href="<?php echo lui_LoadAdminLinkSettings('changelog'); ?>" data-ajax="?path=changelog">
                            <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                    <path d="M16.9767 19.5C19.4017 17.8876 21 15.1305 21 12C21 7.02944 16.9706 3 12 3C11.3126 3 10.6432 3.07706 10 3.22302M16.9767 19.5V16M16.9767 19.5H20.5M7 4.51555C4.58803 6.13007 3 8.87958 3 12C3 16.9706 7.02944 21 12 21C12.6874 21 13.3568 20.9229 14 20.777M7 4.51555V8M7 4.51555H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span>Registros de cambios</span>
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