<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a><?=$wo['langadmin']['configurar']; ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?=$wo['langadmin']['configuracion-general']; ?></li>
            </ol>
        </nav>
    </div>
    <?php $getStatus = getStatus(); if (!empty($getStatus) && !empty(checkIfThereIsError($getStatus))) {?><div class="alert alert-danger"><strong>Importante!</strong> Se han encontrado algunos errores en su sistema, por favor revise <a href="<?php echo lui_LoadAdminLinkSettings('system_status'); ?>" data-ajax="?path=system_status">Estado del sistema</a>.</div><?php }?>
    <!-- Vertical Layout -->
    <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
        <div class="alert alert-warning">Nota: Algunas funciones están deshabilitadas debido al modo de sitio web que utilizó.</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 float-left">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"><?=$wo['langadmin']['configuracion-general']; ?></h6>
                    <form class="general-settings" method="POST">
                        <div class="float-left">
                            <label for="developer_mode" class="main-label">Modo desarrollador</label>
                            <br><small class="admin-info">Al habilitar el modo de desarrollador, se habilitará el informe de errores, <br>no se recomienda habilitar este modo sin la ayuda de un desarrollador,<br> esto puede ocasionar algunos problemas en su sitio web.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="developer_mode" value="0" />
                            <input type="checkbox" name="developer_mode" id="chck-developer_mode" value="1" <?php echo ($wo['config']['developer_mode'] == 1) ? 'checked': '';?>>
                            <label for="chck-developer_mode" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="maintenance_mode" class="main-label">Modo de mantenimiento</label>
                            <br><small class="admin-info">Convierta todo el sitio en Mantenimiento. <br> Puede recuperar el sitio visitando /admincp o /admin-cp</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="maintenance_mode" value="0" />
                            <input type="checkbox" name="maintenance_mode" id="chck-maintenance_mode" value="1" <?php echo ($wo['config']['maintenance_mode'] == 1) ? 'checked': '';?>>
                            <label for="chck-maintenance_mode" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="useSeoFrindly" class="main-label">URL compatible con SEO</label>
                            <br><small class="admin-info">Habilite la carga fluida para ahorrar ancho de banda.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="useSeoFrindly" value="0" />
                            <input type="checkbox" name="useSeoFrindly" id="chck-useSeoFrindly" value="1" <?php echo ($wo['config']['useSeoFrindly'] == 1) ? 'checked': '';?>>
                            <label for="chck-useSeoFrindly" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="developers_page" class="main-label">Desarrolladores (Sistema API)</label>
                            <br><small class="admin-info">Mostrar la página de /desarrolladores a todos los usuarios para solicitudes de API.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="developers_page" value="0" />
                            <input type="checkbox" name="developers_page" id="chck-developers_page" value="1" <?php echo ($wo['config']['developers_page'] == 1) ? 'checked': '';?>>
                            <label for="chck-developers_page" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="profile_privacy" class="main-label">Usuarios de la página de bienvenida</label>
                            <br><small class="admin-info">Permita que los usuarios no registrados vean los perfiles de usuario en la página de bienvenida.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="profile_privacy" value="0" />
                            <input type="checkbox" name="profile_privacy" id="chck-profile_privacy" value="1" <?php echo ($wo['config']['profile_privacy'] == 1) ? 'checked': '';?>>
                            <label for="chck-profile_privacy" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="defualtLang" class="main-label">Idioma predeterminado</label>
                        <br><small class="admin-info">Establezca el idioma predeterminado de su sitio.</small>
                        <div class="form-group">
                            <select class="form-control show-tick" id="defualtLang" name="defualtLang">
                                <?php
                                 foreach (lui_LangsNamesFromDB() as $lang) {
                                    
                                   $languages = $lang;
                                    
                                   $languages_name = ucfirst(strtolower($languages));
                                    
                                   $selected_lang = ($languages == $wo['config']['defualtLang']) ? ' selected' : '';
                                    
                                 ?>
                              <option value="<?php echo $languages;?>"<?php echo $selected_lang;?> ><?php echo $languages_name;?></option>
                              <?php } ?>
                            </select>
                        </div>
                        <hr>
                        <label for="date_style" class="main-label">Formato de fecha</label>
                        <br><small class="admin-info">Establezca el formato de fecha predeterminado de su sitio.</small>
                        <select class="form-control show-tick" id="date_style" name="date_style">
                          <option value="m-d-y" <?php if($wo['config']['date_style'] == 'm-d-y'){echo 'selected';};?> >mm-dd-yy</option>
                          <option value="d-m-y" <?php if($wo['config']['date_style'] == 'd-m-y'){echo 'selected';};?> >dd-mm-yy</option>
                          <option value="y-m-d" <?php if($wo['config']['date_style'] == 'y-m-d'){echo 'selected';};?> >yy-mm-dd</option>
                          <option value="M-d-y" <?php if($wo['config']['date_style'] == 'M-d-y'){echo 'selected';};?> >mmm-dd-yy</option>      
                          <option value="d-F-y" <?php if($wo['config']['date_style'] == 'd-F-y'){echo 'selected';};?> >dd-mmmm-yy</option>
                          <option value="Y-m-d" <?php if($wo['config']['date_style'] == 'Y-m-d'){echo 'selected';};?> >yyyy-mm-dd</option> 
                          <option value="d-M-Y" <?php if($wo['config']['date_style'] == 'd-M-Y'){echo 'selected';};?> >dd-mmm-yyyy</option>
                          <option value="d-F-Y" <?php if($wo['config']['date_style'] == 'd-F-Y'){echo 'selected';};?> >dd-mmmm-yyyy</option>
                        </select>
                        <br>
                        <!-- <div class="general-settings-alert"></div> -->
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                    </form>
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de usuario</h6>
                    <form class="user2-settings" method="POST">
                        <div class="float-left">
                            <label for="online_sidebar" class="main-label">Usuarios en línea</label>
                        <br><small class="admin-info">Mostrar usuarios activos actuales en la página de inicio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="online_sidebar" value="0" />
                            <input type="checkbox" name="online_sidebar" id="chck-online_sidebar" value="1" <?php echo ($wo['config']['online_sidebar'] == 1) ? 'checked': '';?>>
                            <label for="chck-online_sidebar" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="user_lastseen" class="main-label">Estado visto por última vez por el usuario</label>
                           <br><small class="admin-info">Permita que los usuarios establezcan su estado, en línea y último activo.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="user_lastseen" value="0" />
                            <input type="checkbox" name="user_lastseen" id="chck-user_lastseen" value="1" <?php echo ($wo['config']['user_lastseen'] == 1) ? 'checked': '';?>>
                            <label for="chck-user_lastseen" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="deleteAccount" class="main-label">Eliminación de cuenta de usuario</label>
                            <br><small class="admin-info">Permitir a los usuarios eliminar sus cuentas.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="deleteAccount" value="0" />
                            <input type="checkbox" name="deleteAccount" id="chck-deleteAccount" value="1" <?php echo ($wo['config']['deleteAccount'] == 1) ? 'checked': '';?>>
                            <label for="chck-deleteAccount" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="profile_back" class="main-label">Cambio de fondo de perfil </label>
                            <select class="form-control show-tick" id="profile_background_request" name="profile_background_request" onchange="SelectProModel('can_use_background',this)">
                              <option value="admin" <?php echo ($wo['config']['profile_background_request'] == 'admin')   ? ' selected' : '';?> ><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path> <circle cx="12" cy="7" r="4"></circle> </svg>Administrador</option>
                              <option value="all" <?php echo ($wo['config']['profile_background_request'] == 'all')   ? ' selected' : '';?> ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"> <circle cx="12" cy="12" r="10"></circle> <line x1="2" y1="12" x2="22" y2="12"></line> <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path> </svg> Todos los usuarios</option>
                              <option value="verified" <?php echo ($wo['config']['profile_background_request'] == 'verified')   ? ' selected' : '';?> ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="" data-toggle="tooltip" data-original-title="Verified User"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg>Solo usuarios verificados</option>
                              <option value="pro" <?php echo ($wo['config']['profile_background_request'] == 'pro')   ? ' selected' : '';?> ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z"></path></svg>Solo usuarios profesionales</option>
                            </select>
                            <br><small class="admin-info">Permita que los usuarios cambien los fondos de su perfil cargando una imagen.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="profile_back" value="0" />
                            <input type="checkbox" name="profile_back" id="chck-profile_back" value="1" <?php echo ($wo['config']['profile_back'] == 1) ? 'checked': '';?>>
                            <label for="chck-profile_back" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                         <div class="float-left">
                            <label for="connectivitySystem" class="main-label">Sistema de amigos</label>
                        <br><small class="admin-info">Elija entre el sistema Seguir y amigo. <br> <span style="color: #c48a36">Si cambia el sistema a otro, se eliminarán todos los seguidores, seguidores y amigos existentes.</span></small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="connectivitySystem" value="0" />
                            <input type="checkbox" name="connectivitySystem" id="chck-connectivitySystem" value="1" <?php echo ($wo['config']['connectivitySystem'] == 1) ? 'checked': '';?>>
                            <label for="chck-connectivitySystem" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label" class="main-label">Límite del sistema de conectividad</label>
                                <input type="text" name="connectivitySystemLimit" class="form-control" value="<?php echo $wo['config']['connectivitySystemLimit']?>"><small class="admin-info">¿Cuántos amigos puede tener cada usuario?</small>
                            </div>
                        </div>
                        <hr>
                        
                         <div class="float-left">
                            <label for="invite_links_system" class="main-label">Sistema de invitación de usuario</label>
                            <br><small class="admin-info">Permita que los usuarios inviten a otros usuarios a su sitio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="invite_links_system" value="0" />
                            <input type="checkbox" name="invite_links_system" id="chck-invite_links_system" value="1" <?php echo ($wo['config']['invite_links_system'] == 1) ? 'checked': '';?>>
                            <label for="chck-invite_links_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <label class="form-label" class="main-label">¿Cuántos enlaces puede generar un usuario?</label>
                            <div class="form-line">
                                <input type="text" id="user_links_limit" name="user_links_limit" class="form-control" value="<?php echo $wo['config']['user_links_limit']?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label" class="main-label">¿El usuario puede generar enlaces X dentro?</label>
                            <div class="form-line">
                                <select class="form-control show-tick" id="expire_user_links" name="expire_user_links">
                                      <option value="hour" <?php echo ($wo['config']['expire_user_links'] == 'hour')   ? ' selected': '';?>>1 hora</option>
                                      <option value="day" <?php echo ($wo['config']['expire_user_links'] == 'day')   ? ' selected': '';?>>1 dia</option>
                                      <option value="week" <?php echo ($wo['config']['expire_user_links'] == 'week')   ? ' selected': '';?>>1 semana</option>
                                      <option value="month" <?php echo ($wo['config']['expire_user_links'] == 'month')   ? ' selected': '';?>>1 mes</option>
                                      <option value="year" <?php echo ($wo['config']['expire_user_links'] == 'year')   ? ' selected': '';?>>1 año</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="user2-settings-alert"></div> -->
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Otros ajustes</h6>
                    <div class="other-settings-alert"></div>
                    <form class="other-settings" method="POST">
                        <div class="form-group form-float">
                            <label class="form-label">Palabras censuradas</label>
                            <div class="form-line">
                                <input type="text" id="censored_words" name="censored_words" class="form-control" value="<?php echo $wo['config']['censored_words']?>">
                                <small class="admin-info">Palabras para censurar y reemplazar con *** en mensajes, publicaciones, comentarios, etc., separados por una coma.</small>
                            </div>
                        </div>
                        <label for="cache_sidebar" >Almacenamiento en caché de la página de inicio</label>
                        <select class="form-control show-tick" id="cache_sidebar" name="cache_sidebar">
                          <option value="1" <?php echo ($wo['config']['cache_sidebar'] == 1)   ? ' selected' : '';?> >Actualice los datos de la barra lateral de la página de inicio cada 2 minutos (carga más rápida)</option>
                          <option value="0" <?php echo ($wo['config']['cache_sidebar'] == 0)   ? ' selected' : '';?> >Nunca almacenar en caché, siempre obtener datos nuevos</option>
                        </select>
                        <small class="admin-info">Habilite esta función para ahorrar el uso de MySQL y aumentar la velocidad de la página de inicio. </small>
                        <div class="clearfix"></div>
                        <label for="update_user_profile" >Almacenamiento en caché de la página de perfil</label>
                        <div class="form-group">
                            <select class="form-control show-tick" id="update_user_profile" name="update_user_profile">
                              <option value="30" <?php echo ($wo['config']['update_user_profile'] == 30)   ? ' selected' : '';?> >Cada 30 segundos</option>
                              <option value="120" <?php echo ($wo['config']['update_user_profile'] == 120)   ? ' selected' : '';?> >Cada 2 minutos</option>
                              <option value="3600" <?php echo ($wo['config']['update_user_profile'] == 3600)   ? ' selected' : '';?> >Cada 1 hora</option>
                              <option value="7200" <?php echo ($wo['config']['update_user_profile'] == 7200)   ? ' selected' : '';?> >Cada 2 horas</option>
                              <option value="43200" <?php echo ($wo['config']['update_user_profile'] == 43200)   ? ' selected' : '';?> >Cada 12 horas</option>
                              <option value="86400" <?php echo ($wo['config']['update_user_profile'] == 86400)   ? ' selected' : '';?> >Cada 24 horas</option>
                            </select>
                            <small class="admin-info margin-top-5">Actualice los datos de la barra lateral cada X, esto está relacionado con el sistema de caché para ahorrar el uso de MySQL.</small>
                        </div>
                        <hr>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="col-lg-6 col-md-6 float-right">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Inicio de sesión y registro</h6>
                    <form class="user-settings" method="POST">
                        <div class="float-left">
                            <label for="user_registration" class="main-label">registro de usuario</label>
                            <br><small class="admin-info">Permita que los usuarios creen cuentas en su sitio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="user_registration" value="0" />
                            <input type="checkbox" name="user_registration" id="chck-user_registration" value="1" <?php echo ($wo['config']['user_registration'] == 1) ? 'checked': '';?>>
                            <label for="chck-user_registration" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="auto_username" class="main-label">Nombre de usuario automático al registrarse</label>
                            <br><small class="admin-info">Genere un nombre de usuario automático al registrarse. <br> El formulario de registro le pedirá el nombre y apellido del usuario.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="auto_username" value="0" />
                            <input type="checkbox" name="auto_username" id="chck-auto_username" value="1" <?php echo ($wo['config']['auto_username'] == 1) ? 'checked': '';?>>
                            <label for="chck-auto_username" class="check-trail"><span class="check-handler"></span></label>
                        </div> 
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="password_complexity_system" class="main-label">Sistema de complejidad de contraseñas</label>
                            <br><small class="admin-info">El sistema requerirá una contraseña poderosa al registrarse, <br>incluyendo letras, números y caracteres especiales.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="password_complexity_system" value="0" />
                            <input type="checkbox" name="password_complexity_system" id="chck-password_complexity_system" value="1" <?php echo ($wo['config']['password_complexity_system'] == 1) ? 'checked': '';?>>
                            <label for="chck-password_complexity_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="login_auth" class="main-label">Inicio de sesión inusual</label>
                            <br><small class="admin-info">Envíe un enlace de confirmación cuando el usuario inicie sesión desde una nueva ubicación.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="login_auth" value="0" />
                            <input type="checkbox" name="login_auth" id="chck-login_auth" value="1" <?php echo ($wo['config']['login_auth'] == 1) ? 'checked': '';?>>
                            <label for="chck-login_auth" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="remember_device" class="main-label">Recuerda este dispositivo</label>
                            <br><small class="admin-info">Recuerde este dispositivo en la página de bienvenida.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="remember_device" value="0" />
                            <input type="checkbox" name="remember_device" id="chck-remember_device" value="1" <?php echo ($wo['config']['remember_device'] == 1) ? 'checked': '';?>>
                            <label for="chck-remember_device" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="login_auth" class="main-label">Autenticación de dos factores</label>
                            <br><small class="admin-info">Envíe el código de confirmación por correo electrónico o SMS cuando el usuario inicie sesión.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="two_factor" value="0" />
                            <input type="checkbox" name="two_factor" id="chck-two_factor" value="1" <?php echo ($wo['config']['two_factor'] == 1) ? 'checked': '';?>>
                            <label for="chck-two_factor" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <label for="defualtLang">Método de autenticación de dos factores</label>
                        <br><small class="admin-info">Seleccione el sistema que debe usar el 2FA.</small>
                        <div class="form-group">
                            <select class="form-control show-tick" id="two_factor_type" name="two_factor_type">
                              <option value="email" <?php echo ($wo['config']['two_factor_type'] == 'email') ? 'selected': '';?>>Dirección de correo electrónico</option>
                              <option value="phone" <?php echo ($wo['config']['two_factor_type'] == 'phone') ? 'selected': '';?>>SMS / Número de teléfono</option>
                              <option value="both" <?php echo ($wo['config']['two_factor_type'] == 'both') ? 'selected': '';?>>Ambos juntos</option>
                            </select>
                        </div>
                        <hr>
                        <div class="float-left">
                            <label for="emailValidation" class="main-label">Validación de cuenta</label>
                            <br><small class="admin-info">Envíe un enlace de activación después del registro.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="emailValidation" value="0" />
                            <input type="checkbox" name="emailValidation" id="chck-emailValidation" value="1" <?php echo ($wo['config']['emailValidation'] == 1) ? 'checked': '';?>>
                            <label for="chck-emailValidation" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <label for="defualtLang" >Método de validación de cuenta</label>
                        <br><small class="admin-info">Elige el tipo de validación, por SMS o E-mail, si eliges SMS, <br> asegúrese de haber configurado SMS.</small>
                        <div class="form-group">
                            <select class="form-control show-tick" id="sms_or_email" name="sms_or_email">
                                <option value="mail" <?php echo ($wo['config']['sms_or_email'] == 'mail') ? 'selected': '';?>>Dirección de correo electrónico</option>
                                <option value="sms" <?php echo ($wo['config']['sms_or_email'] == 'sms') ? 'selected': '';?>>SMS / Número de teléfono</option>
                            </select>
                        </div>
                        <hr>
                        <div class="float-left">
                            <label for="reCaptcha" class="main-label">reCaptcha</label>
                            <br><small class="admin-info">Habilite reCaptcha para evitar el spam.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="reCaptcha" value="0" />
                            <input type="checkbox" name="reCaptcha" id="chck-reCaptcha" value="1" <?php echo ($wo['config']['reCaptcha'] == 1) ? 'checked': '';?>>
                            <label for="chck-reCaptcha" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave de recaptcha</label>
                                <input type="text" id="reCaptchaKey" name="reCaptchaKey" class="form-control" value="<?php echo $wo['config']['reCaptchaKey']?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave secreta de Recaptcha</label>
                                <input type="text" id="recaptcha_secret_key" name="recaptcha_secret_key" class="form-control" value="<?php echo $wo['config']['recaptcha_secret_key']?>">
                            </div>
                        </div>
                        <hr>
                        <div class="float-left">
                            <label for="reCaptcha" class="main-label">Evitar intentos de inicio de sesión incorrectos</label>
                            <br><small class="admin-info">Habilite esta función para rastrear y detener los ataques de fuerza bruta.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="prevent_system" value="0" />
                            <input type="checkbox" name="prevent_system" id="chck-prevent_system" value="1" <?php echo ($wo['config']['prevent_system'] == 1) ? 'checked': '';?>>
                            <label for="chck-prevent_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Límite de inicio de sesión</label>
                                <input type="text" id="bad_login_limit" name="bad_login_limit" class="form-control" value="<?php echo $wo['config']['bad_login_limit']?>">
                                <small class="admin-info">¿Cuántas veces un usuario puede intentar iniciar sesión antes de un bloqueo?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Tiempo de bloqueo (en minutos)</label>
                                <input type="text" id="lock_time" name="lock_time" class="form-control" value="<?php echo $wo['config']['lock_time']?>">
                                <small class="admin-info">¿Cuánto tiempo debe permanecer bloqueado el usuario?</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <label for="user_limit" class="main-label">Límites de registro</label>
                            <small class="admin-info">Cuántas veces un usuario puede crear cuentas por hora.</small>
                            <div class="form-line">
                                <input type="text" id="user_limit" name="user_limit" class="form-control" value="<?php echo $wo['config']['user_limit']?>">
                                
                            </div>
                        </div>

                        <!-- <div class="user-settings-alert"></div> -->
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de notificaciones</h6>
                    <form class="notifications-settings" method="POST">
                        <div class="float-left">
                            <label for="emailNotification" class="main-label">Notificaciónes de Correo Electrónico </label>
                            <br><small class="admin-info">Envíe notificaciones por correo electrónico a los usuarios después de recibir notificaciones del sitio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="emailNotification" value="0" />
                            <input type="checkbox" name="emailNotification" id="chck-emailNotification" value="1" <?php echo ($wo['config']['emailNotification'] == 1) ? 'checked': '';?>>
                            <label for="chck-emailNotification" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="profileVisit" class="main-label">Notificaciones de visitas al perfil</label>
                            <br><small class="admin-info">Envía una notificación a un usuario cuando alguien visita su perfil. <br>Tenga en cuenta que esta función requerirá que el usuario se convierta en miembro Pro si habilita Pro System.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="profileVisit" value="0" />
                            <input type="checkbox" name="profileVisit" id="chck-profileVisit" value="1" <?php echo ($wo['config']['profileVisit'] == 1) ? 'checked': '';?>>
                            <label for="chck-profileVisit" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="notify_new_post" class="main-label">Notificación en nueva publicación</label>
                            <br><small class="admin-info">Envíe una notificación a los seguidores cuando un usuario cree una nueva publicación.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="notify_new_post" value="0" />
                            <input type="checkbox" name="notify_new_post" id="chck-notify_new_post" value="1" <?php echo ($wo['config']['notify_new_post'] == 1) ? 'checked': '';?>>
                            <label for="chck-notify_new_post" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>

                        <!--  <div class="notifications-settings-alert"></div> -->
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>"><!-- 
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button> -->
                    </form>
                </div>
            </div>
            
            
        </div> 
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

$(function() {
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
    $('input[type=text], input[type=number]').on('input', delay(function() {
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
});

</script>