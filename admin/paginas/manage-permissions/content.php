<?php
if (empty($_GET['user_id'])) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
$user_data = lui_UserData($_GET['user_id']);
if (empty($user_data)) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}

$per_array = array();
if (!empty($wo['all_pages'])) {
    foreach ($wo['all_pages']  as $key => $value) {
       if(in_array($value,$wo['nopag_pages'])){
            $per_array[$value] = 0;
        }elseif (in_array($value,$wo['mod_pages'])) {
            $per_array[$value] = 1;
        }else{
            $per_array[$value] = 0;
        } 
    }
}
if (empty($user_data['permission'])) {
    $permission = json_encode($per_array);
    $db->where('user_id',$user_data['user_id'])->update(T_USERS,array('permission' => $permission));
    $user_data = lui_UserData($user_data['user_id']);
    $user_data['permission'] = json_decode($user_data['permission'],true);
}
else{
    $user_data['permission'] = json_decode($user_data['permission'],true);
    foreach ($per_array as $key => $value) {
        if (!in_array($key, array_keys($user_data['permission']))) {
            $user_data['permission'][$key] = 0;
        }
    }
    $permission = json_encode($user_data['permission']);
    $db->where('user_id',$user_data['user_id'])->update(T_USERS,array('permission' => $permission));
    $user_data = lui_UserData($user_data['user_id']);
    $user_data['permission'] = json_decode($user_data['permission'],true);
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
                <li class="breadcrumb-item active" aria-current="page">Administrar permisos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Permisos de usuario</h6>
                    <div class="float-left">
                        <label for="dashboard" class="main-label"></label>
                    </div>
					<div class="text-center">
						<button type="button" name="permission_type" value="normal" id="btn_permission_normal" class="btn select_user_perm <?php echo($user_data['admin'] == 0 ? 'btn-info' : 'active_permissions') ?>" <?php if($user_data['admin'] != 0){ ?>onclick="Wo_Permission(<?php echo $user_data['user_id']?>,'hide','normal');" <?php } ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg> Normal
						</button>
						<button type="button" name="permission_type" value="moderator" id="btn_permission_moderator" class="btn select_user_perm <?php echo($user_data['admin'] == 2 ? 'btn-info' : 'active_permissions') ?>" <?php if($user_data['admin'] != 2){ ?>onclick="Wo_Permission(<?php echo $user_data['user_id']?>,'hide','moderator');" <?php } ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3C14.21 3 16 4.79 16 7S14.21 11 12 11 8 9.21 8 7 9.79 3 12 3M16 13.54C16 14.6 15.72 17.07 13.81 19.83L13 15L13.94 13.12C13.32 13.05 12.67 13 12 13S10.68 13.05 10.06 13.12L11 15L10.19 19.83C8.28 17.07 8 14.6 8 13.54C5.61 14.24 4 15.5 4 17V21H20V17C20 15.5 18.4 14.24 16 13.54Z" /></svg> Vendedor
						</button>
						<button type="button" name="permission_type" value="admin" id="btn_permission_admin" class="btn select_user_perm <?php echo($user_data['admin'] == 1 ? 'btn-info' : 'active_permissions') ?>" <?php if($user_data['admin'] != 1){ ?> onclick="Wo_Permission(<?php echo $user_data['user_id']?>,'hide','admin');" <?php } ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z" /></svg> Administrador
						</button>
					</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div>
        </div>
        </div>
        <br>
        <div class="clearfix"></div>
        <?php if ($user_data['admin'] == 2) { ?>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Panel</h6>
                    <div class="float-left">
                        <label for="dashboard" class="main-label">Panel</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="dashboard" value="0" />
                        <input type="checkbox" name="dashboard" id="chck-dashboard" value="1" <?php if(isset($user_data['permission']['dashboard']) == 1){echo($user_data['permission']['dashboard'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-dashboard" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajustes</h6>
                    <div class="float-left">
                        <label for="general-settings" class="main-label">Configuracion general</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="general-settings" value="0" />
                        <input type="checkbox" name="general-settings" id="chck-general-settings" value="1" <?php if(isset($user_data['permission']['general-settings']) == 1){echo($user_data['permission']['general-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-general-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="site-settings" class="main-label">Informacion del sitio web</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="site-settings" value="0" />
                        <input type="checkbox" name="site-settings" id="chck-site-settings" value="1" <?php if(isset($user_data['permission']['site-settings']) == 1){echo($user_data['permission']['site-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-site-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="amazon-settings" class="main-label">Configuracion de carga de archivos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="amazon-settings" value="0" />
                        <input type="checkbox" name="amazon-settings" id="chck-amazon-settings" value="1" <?php if(isset($user_data['permission']['amazon-settings']) == 1){echo($user_data['permission']['amazon-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-amazon-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="email-settings" class="main-label">Configuracion de Correo & SMS</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="email-settings" value="0" />
                        <input type="checkbox" name="email-settings" id="chck-email-settings" value="1" <?php if(isset($user_data['permission']['email-settings']) == 1){echo($user_data['permission']['email-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-email-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="video-settings" class="main-label">Chat & Video/Audio</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="video-settings" value="0" />
                        <input type="checkbox" name="video-settings" id="chck-video-settings" value="1" <?php if(isset($user_data['permission']['video-settings']) == 1){echo($user_data['permission']['video-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-video-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="social-login" class="main-label">Configuracion de inicio de sesion con red social</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="social-login" value="0" />
                        <input type="checkbox" name="social-login" id="chck-social-login" value="1" <?php if(isset($user_data['permission']['social-login']) == 1){echo($user_data['permission']['social-login'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-social-login" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="node" class="main-label">Configurar NodeJS</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="node" value="0" />
                        <input type="checkbox" name="node" id="chck-node" value="1" <?php if(isset($user_data['permission']['node']) == 1){echo($user_data['permission']['node'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-node" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Diseño</h6>
                    <div class="float-left">
                        <label for="manage-themes" class="main-label">Temas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-themes" value="0" />
                        <input type="checkbox" name="manage-themes" id="chck-manage-themes" value="1" <?php if(isset($user_data['permission']['manage-themes']) == 1){echo($user_data['permission']['manage-themes'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-themes" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-site-design" class="main-label">Cambiar el diseño del sitio</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-site-design" value="0" />
                        <input type="checkbox" name="manage-site-design" id="chck-manage-site-design" value="1" <?php if(isset($user_data['permission']['manage-site-design']) == 1){echo($user_data['permission']['manage-site-design'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-site-design" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="custom-code" class="main-label">Personalizar JS / CSS</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="custom-code" value="0" />
                        <input type="checkbox" name="custom-code" id="chck-custom-code" value="1" <?php if(isset($user_data['permission']['custom-code']) == 1){echo($user_data['permission']['custom-code'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-custom-code" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Herramientas</h6>
                    <div class="float-left">
                        <label for="manage_emails" class="main-label">Administrar correos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage_emails" value="0" />
                        <input type="checkbox" name="manage_emails" id="chck-manage_emails" value="1" <?php if(isset($user_data['permission']['manage_emails']) == 1){echo($user_data['permission']['manage_emails'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage_emails" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-invitation" class="main-label">Invitacion de usuarios</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-invitation" value="0" />
                        <input type="checkbox" name="manage-invitation" id="chck-manage-invitation" value="1" <?php if(isset($user_data['permission']['manage-invitation']) == 1){echo($user_data['permission']['manage-invitation'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-invitation" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="send_email" class="main-label">Enviar correo</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="send_email" value="0" />
                        <input type="checkbox" name="send_email" id="chck-send_email" value="1" <?php if(isset($user_data['permission']['send_email']) == 1){echo($user_data['permission']['send_email'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-send_email" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-announcements" class="main-label">Anuncios</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-announcements" value="0" />
                        <input type="checkbox" name="manage-announcements" id="chck-manage-announcements" value="1" <?php if(isset($user_data['permission']['manage-announcements']) == 1){echo($user_data['permission']['manage-announcements'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-announcements" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="auto-delete" class="main-label">Eliminar datos automáticamente</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="auto-delete" value="0" />
                        <input type="checkbox" name="auto-delete" id="chck-auto-delete" value="1" <?php if(isset($user_data['permission']['auto-delete']) == 1){echo($user_data['permission']['auto-delete'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-auto-delete" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="auto-friend" class="main-label">Amigo automático</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="auto-friend" value="0" />
                        <input type="checkbox" name="auto-friend" id="chck-auto-friend" value="1" <?php if(isset($user_data['permission']['auto-friend']) == 1){echo($user_data['permission']['auto-friend'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-auto-friend" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="fake-users" class="main-label">Generador de usuario falso</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="fake-users" value="0" />
                        <input type="checkbox" name="fake-users" id="chck-fake-users" value="1" <?php if(isset($user_data['permission']['fake-users']) == 1){echo($user_data['permission']['fake-users'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-fake-users" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="mailing-list" class="main-label">Lista de correo</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="mailing-list" value="0" />
                        <input type="checkbox" name="mailing-list" id="chck-mailing-list" value="1" <?php if(isset($user_data['permission']['mailing-list']) == 1){echo($user_data['permission']['mailing-list'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-mailing-list" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="mass-notifications" class="main-label">Notificaciones Masivas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="mass-notifications" value="0" />
                        <input type="checkbox" name="mass-notifications" id="chck-mass-notifications" value="1" <?php if(isset($user_data['permission']['mass-notifications']) == 1){echo($user_data['permission']['mass-notifications'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-mass-notifications" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="ban-users" class="main-label">Lista negra</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="ban-users" value="0" />
                        <input type="checkbox" name="ban-users" id="chck-ban-users" value="1" <?php if(isset($user_data['permission']['ban-users']) == 1){echo($user_data['permission']['ban-users'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-ban-users" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="generate-sitemap" class="main-label">Generar SiteMap</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="generate-sitemap" value="0" />
                        <input type="checkbox" name="generate-sitemap" id="chck-generate-sitemap" value="1" <?php if(isset($user_data['permission']['generate-sitemap']) == 1){echo($user_data['permission']['generate-sitemap'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-generate-sitemap" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-invitation-keys" class="main-label">Codigo de invitacion</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-invitation-keys" value="0" />
                        <input type="checkbox" name="manage-invitation-keys" id="chck-manage-invitation-keys" value="1" <?php if(isset($user_data['permission']['manage-invitation-keys']) == 1){echo($user_data['permission']['manage-invitation-keys'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-invitation-keys" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="backups" class="main-label">Copia de seguridad de SQL y archivos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="backups" value="0" />
                        <input type="checkbox" name="backups" id="chck-backups" value="1" <?php if(isset($user_data['permission']['backups']) == 1){echo($user_data['permission']['backups'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-backups" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de publicaciones</h6>
                    <div class="float-left">
                        <label for="post-settings" class="main-label">Configuración de publicaciones</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="post-settings" value="0" />
                        <input type="checkbox" name="post-settings" id="chck-post-settings" value="1" <?php if(isset($user_data['permission']['post-settings']) == 1){echo($user_data['permission']['post-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-post-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-colored-posts" class="main-label">Administrar publicaciones en color</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-colored-posts" value="0" />
                        <input type="checkbox" name="manage-colored-posts" id="chck-manage-colored-posts" value="1" <?php if(isset($user_data['permission']['manage-colored-posts']) == 1){echo($user_data['permission']['manage-colored-posts'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-colored-posts" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-reactions" class="main-label">Publicar reacciones</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-reactions" value="0" />
                        <input type="checkbox" name="manage-reactions" id="chck-manage-reactions" value="1" <?php if(isset($user_data['permission']['manage-reactions']) == 1){echo($user_data['permission']['manage-reactions'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-reactions" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="live" class="main-label">Configurar transmision en vivo</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="live" value="0" />
                        <input type="checkbox" name="live" id="chck-live" value="1" <?php if(isset($user_data['permission']['live']) == 1){echo($user_data['permission']['live'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-live" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Videos</h6>
                    <div class="float-left">
                        <label for="manage-movies" class="main-label">Administrar videos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-movies" value="0" />
                        <input type="checkbox" name="manage-movies" id="chck-manage-movies" value="1" <?php if(isset($user_data['permission']['manage-movies']) == 1){echo($user_data['permission']['manage-movies'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-movies" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="add-new-movies" class="main-label">Agregar nuevo video</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="add-new-movies" value="0" />
                        <input type="checkbox" name="add-new-movies" id="chck-add-new-movies" value="1" <?php if(isset($user_data['permission']['add-new-movies']) == 1){echo($user_data['permission']['add-new-movies'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-add-new-movies" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
    
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Categorias</h6>
                    <div class="float-left">
                        <label for="blogs-categories" class="main-label">Categorias de blogs</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="blogs-categories" value="0" />
                        <input type="checkbox" name="blogs-categories" id="chck-blogs-categories" value="1" <?php if(isset($user_data['permission']['blogs-categories']) == 1){echo($user_data['permission']['blogs-categories'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-blogs-categories" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="products-categories" class="main-label">Categorias de productos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="products-categories" value="0" />
                        <input type="checkbox" name="products-categories" id="chck-products-categories" value="1" <?php if(isset($user_data['permission']['products-categories']) == 1){echo($user_data['permission']['products-categories'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-products-categories" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="products-sub-categories" class="main-label">Sub categorias de productos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="products-sub-categories" value="0" />
                        <input type="checkbox" name="products-sub-categories" id="chck-products-sub-categories" value="1" <?php if(isset($user_data['permission']['products-sub-categories']) == 1){echo($user_data['permission']['products-sub-categories'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-products-sub-categories" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="colores_productos" class="main-label">Colores de productos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="colores_productos" value="0" />
                        <input type="checkbox" name="colores_productos" id="chck-colores_productos" value="1" <?php if(isset($user_data['permission']['colores_productos']) == 1){echo($user_data['permission']['colores_productos'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-colores_productos" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Paginas</h6>
                    <div class="float-left">
                        <label for="manage-custom-pages" class="main-label">Administrar paginas personalizadas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-custom-pages" value="0" />
                        <input type="checkbox" name="manage-custom-pages" id="chck-manage-custom-pages" value="1" <?php if(isset($user_data['permission']['manage-custom-pages']) == 1){echo($user_data['permission']['manage-custom-pages'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-custom-pages" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="add-new-custom-page" class="main-label">Agregar nueva pagina personalizada</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="add-new-custom-page" value="0" />
                        <input type="checkbox" name="add-new-custom-page" id="chck-add-new-custom-page" value="1" <?php if(isset($user_data['permission']['add-new-custom-page']) == 1){echo($user_data['permission']['add-new-custom-page'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-add-new-custom-page" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="edit-custom-page" class="main-label">Editar pagina personalizada</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="edit-custom-page" value="0" />
                        <input type="checkbox" name="edit-custom-page" id="chck-edit-custom-page" value="1" <?php if(isset($user_data['permission']['edit-custom-page']) == 1){echo($user_data['permission']['edit-custom-page'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-edit-custom-page" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="edit-terms-pages" class="main-label">Editar termmminos de pagina</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="edit-terms-pages" value="0" />
                        <input type="checkbox" name="edit-terms-pages" id="chck-edit-terms-pages" value="1" <?php if(isset($user_data['permission']['edit-terms-pages']) == 1){echo($user_data['permission']['edit-terms-pages'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-edit-terms-pages" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage_terms_pages" class="main-label">Administrar terminos de pagina</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage_terms_pages" value="0" />
                        <input type="checkbox" name="manage_terms_pages" id="chck-manage_terms_pages" value="1" <?php if(isset($user_data['permission']['manage_terms_pages']) == 1){echo($user_data['permission']['manage_terms_pages'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage_terms_pages" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Reportes</h6>
                    <div class="float-left">
                        <label for="manage-reports" class="main-label">Administrar reportes</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-reports" value="0" />
                        <input type="checkbox" name="manage-reports" id="chck-manage-reports" value="1" <?php if(isset($user_data['permission']['manage-reports']) == 1){echo($user_data['permission']['manage-reports'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-reports" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tienda</h6>
                    <div class="float-left">
                        <label for="manage-orders" class="main-label">Ventas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-orders" value="0" />
                        <input type="checkbox" name="manage-orders" id="chck-manage-orders" value="1" <?php if(isset($user_data['permission']['manage-orders']) == 1){echo($user_data['permission']['manage-orders'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-orders" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="float-left">
                        <label for="compras" class="main-label">Compras</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="compras" value="0" />
                        <input type="checkbox" name="compras" id="chck-compras" value="1" <?php if(isset($user_data['permission']['compras']) == 1){echo($user_data['permission']['compras'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-compras" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="float-left">
                        <label for="manage-products" class="main-label">Productos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-products" value="0" />
                        <input type="checkbox" name="manage-products" id="chck-manage-products" value="1" <?php if(isset($user_data['permission']['manage-products']) == 1){echo($user_data['permission']['manage-products'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-products" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="float-left">
                        <label for="imventario" class="main-label">Imventario</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="imventario" value="0" />
                        <input type="checkbox" name="imventario" id="chck-imventario" value="1" <?php if(isset($user_data['permission']['imventario']) == 1){echo($user_data['permission']['imventario'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-imventario" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="float-left">
                        <label for="proveedores" class="main-label">Proveedores</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="proveedores" value="0" />
                        <input type="checkbox" name="proveedores" id="chck-proveedores" value="1" <?php if(isset($user_data['permission']['proveedores']) == 1){echo($user_data['permission']['proveedores'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-proveedores" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="float-left">
                        <label for="manage-reviews" class="main-label">Administrar calificaciones</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-reviews" value="0" />
                        <input type="checkbox" name="manage-reviews" id="chck-manage-reviews" value="1" <?php if(isset($user_data['permission']['manage-reviews']) == 1){echo($user_data['permission']['manage-reviews'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-reviews" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="float-left">
                        <label for="store-settings" class="main-label">Configurar tienda</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="store-settings" value="0" />
                        <input type="checkbox" name="store-settings" id="chck-store-settings" value="1" <?php if(isset($user_data['permission']['store-settings']) == 1){echo($user_data['permission']['store-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-store-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>


                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Administrar caracteristicas</h6>
                    <div class="float-left">
                        <label for="site-features" class="main-label">Activar / Desactivar caracteristicas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="site-features" value="0" />
                        <input type="checkbox" name="site-features" id="chck-site-features" value="1" <?php if(isset($user_data['permission']['site-features']) == 1){echo($user_data['permission']['site-features'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-site-features" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-apps" class="main-label">Aplicaciones</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-apps" value="0" />
                        <input type="checkbox" name="manage-apps" id="chck-manage-apps" value="1" <?php if(isset($user_data['permission']['manage-apps']) == 1){echo($user_data['permission']['manage-apps'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-apps" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-pages" class="main-label">Paginas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-pages" value="0" />
                        <input type="checkbox" name="manage-pages" id="chck-manage-pages" value="1" <?php if(isset($user_data['permission']['manage-pages']) == 1){echo($user_data['permission']['manage-pages'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-pages" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-groups" class="main-label">Grupos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-groups" value="0" />
                        <input type="checkbox" name="manage-groups" id="chck-manage-groups" value="1" <?php if(isset($user_data['permission']['manage-groups']) == 1){echo($user_data['permission']['manage-groups'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-groups" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-posts" class="main-label">Publicaciones</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-posts" value="0" />
                        <input type="checkbox" name="manage-posts" id="chck-manage-posts" value="1" <?php if(isset($user_data['permission']['manage-posts']) == 1){echo($user_data['permission']['manage-posts'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-posts" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-fund" class="main-label">Fondos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-fund" value="0" />
                        <input type="checkbox" name="manage-fund" id="chck-manage-fund" value="1" <?php if(isset($user_data['permission']['manage-fund']) == 1){echo($user_data['permission']['manage-fund'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-fund" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-jobs" class="main-label">Trabajos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-jobs" value="0" />
                        <input type="checkbox" name="manage-jobs" id="chck-manage-jobs" value="1" <?php if(isset($user_data['permission']['manage-jobs']) == 1){echo($user_data['permission']['manage-jobs'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-jobs" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-offers" class="main-label">Ofertas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-offers" value="0" />
                        <input type="checkbox" name="manage-offers" id="chck-manage-offers" value="1" <?php if(isset($user_data['permission']['manage-offers']) == 1){echo($user_data['permission']['manage-offers'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-offers" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-articles" class="main-label">Articulos (Blog)</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-articles" value="0" />
                        <input type="checkbox" name="manage-articles" id="chck-manage-articles" value="1" <?php if(isset($user_data['permission']['manage-articles']) == 1){echo($user_data['permission']['manage-articles'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-articles" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-events" class="main-label">Eventos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-events" value="0" />
                        <input type="checkbox" name="manage-events" id="chck-manage-events" value="1" <?php if(isset($user_data['permission']['manage-events']) == 1){echo($user_data['permission']['manage-events'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-events" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Gifts</h6>
                    <div class="float-left">
                        <label for="manage-gifts" class="main-label">Administrar Gifts</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-gifts" value="0" />
                        <input type="checkbox" name="manage-gifts" id="chck-manage-gifts" value="1" <?php if(isset($user_data['permission']['manage-gifts']) == 1){echo($user_data['permission']['manage-gifts'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-gifts" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="add-new-gift" class="main-label">Agregar nuevo Gift</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="add-new-gift" value="0" />
                        <input type="checkbox" name="add-new-gift" id="chck-add-new-gift" value="1" <?php if(isset($user_data['permission']['add-new-gift']) == 1){echo($user_data['permission']['add-new-gift'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-add-new-gift" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Stickers</h6>
                    <div class="float-left">
                        <label for="manage-stickers" class="main-label">Administrar Stickers</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-stickers" value="0" />
                        <input type="checkbox" name="manage-stickers" id="chck-manage-stickers" value="1" <?php if(isset($user_data['permission']['manage-stickers']) == 1){echo($user_data['permission']['manage-stickers'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-stickers" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="add-new-sticker" class="main-label">Agregar nuevo sticker</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="add-new-sticker" value="0" />
                        <input type="checkbox" name="add-new-sticker" id="chck-add-new-sticker" value="1" <?php if(isset($user_data['permission']['add-new-sticker']) == 1){echo($user_data['permission']['add-new-sticker'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-add-new-sticker" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Campos Personalizados</h6>
                    <div class="float-left">
                        <label for="manage-profile-fields" class="main-label">Campos de usuarios personalizados</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-profile-fields" value="0" />
                        <input type="checkbox" name="manage-profile-fields" id="chck-manage-profile-fields" value="1" <?php if(isset($user_data['permission']['manage-profile-fields']) == 1){echo($user_data['permission']['manage-profile-fields'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-profile-fields" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="pages-fields" class="main-label">Campos de paginas personalizadas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="pages-fields" value="0" />
                        <input type="checkbox" name="pages-fields" id="chck-pages-fields" value="1" <?php if(isset($user_data['permission']['pages-fields']) == 1){echo($user_data['permission']['pages-fields'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-pages-fields" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="groups-fields" class="main-label">Campos de grupos personalizados</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="groups-fields" value="0" />
                        <input type="checkbox" name="groups-fields" id="chck-groups-fields" value="1" <?php if(isset($user_data['permission']['groups-fields']) == 1){echo($user_data['permission']['groups-fields'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-groups-fields" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="products-fields" class="main-label">Campos de productos personalizados</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="products-fields" value="0" />
                        <input type="checkbox" name="products-fields" id="chck-products-fields" value="1" <?php if(isset($user_data['permission']['products-fields']) == 1){echo($user_data['permission']['products-fields'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-products-fields" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="add-new-profile-field" class="main-label">Agregar nuevo campo de perfil</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="add-new-profile-field" value="0" />
                        <input type="checkbox" name="add-new-profile-field" id="chck-add-new-profile-field" value="1" <?php if(isset($user_data['permission']['add-new-profile-field']) == 1){echo($user_data['permission']['add-new-profile-field'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-add-new-profile-field" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de API</h6>
                    <div class="float-left">
                        <label for="manage-api-access-keys" class="main-label">Administrar API Server Key</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-api-access-keys" value="0" />
                        <input type="checkbox" name="manage-api-access-keys" id="chck-manage-api-access-keys" value="1" <?php if(isset($user_data['permission']['manage-api-access-keys']) == 1){echo($user_data['permission']['manage-api-access-keys'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-api-access-keys" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="push-notifications-system" class="main-label">Configuracion de notificaciones automaticas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="push-notifications-system" value="0" />
                        <input type="checkbox" name="push-notifications-system" id="chck-push-notifications-system" value="1" <?php if(isset($user_data['permission']['push-notifications-system']) == 1){echo($user_data['permission']['push-notifications-system'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-push-notifications-system" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="verfiy-applications" class="main-label">Verificar aplicaciones</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="verfiy-applications" value="0" />
                        <input type="checkbox" name="verfiy-applications" id="chck-verfiy-applications" value="1" <?php if(isset($user_data['permission']['verfiy-applications']) == 1){echo($user_data['permission']['verfiy-applications'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-verfiy-applications" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-third-psites" class="main-label">Scripts de terceros</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-third-psites" value="0" />
                        <input type="checkbox" name="manage-third-psites" id="chck-manage-third-psites" value="1" <?php if(isset($user_data['permission']['manage-third-psites']) == 1){echo($user_data['permission']['manage-third-psites'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-third-psites" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Idiomas</h6>
                    <div class="float-left">
                        <label for="add-language" class="main-label">Agregar nuevo idioma y claves</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="add-language" value="0" />
                        <input type="checkbox" name="add-language" id="chck-add-language" value="1" <?php if(isset($user_data['permission']['add-language']) == 1){echo($user_data['permission']['add-language'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-add-language" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-languages" class="main-label">Administrar idiomas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-languages" value="0" />
                        <input type="checkbox" name="manage-languages" id="chck-manage-languages" value="1" <?php if(isset($user_data['permission']['manage-languages']) == 1){echo($user_data['permission']['manage-languages'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-languages" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="edit-lang" class="main-label">Editar idiomas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="edit-lang" value="0" />
                        <input type="checkbox" name="edit-lang" id="chck-edit-lang" value="1" <?php if(isset($user_data['permission']['edit-lang']) == 1){echo($user_data['permission']['edit-lang'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-edit-lang" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Usuarios</h6>
                    <div class="float-left">
                        <label for="manage-users" class="main-label">Administrar usuarios</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-users" value="0" />
                        <input type="checkbox" name="manage-users" id="chck-manage-users" value="1" <?php if(isset($user_data['permission']['manage-users']) == 1){echo($user_data['permission']['manage-users'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-users" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="online-users" class="main-label">Usuarios en linea</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="online-users" value="0" />
                        <input type="checkbox" name="online-users" id="chck-online-users" value="1" <?php if(isset($user_data['permission']['online-users']) == 1){echo($user_data['permission']['online-users'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-online-users" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-stories" class="main-label">Administrar historias de usuarios / Estados</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-stories" value="0" />
                        <input type="checkbox" name="manage-stories" id="chck-manage-stories" value="1" <?php if(isset($user_data['permission']['manage-stories']) == 1){echo($user_data['permission']['manage-stories'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-stories" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-verification-reqeusts" class="main-label">Administrar solicitudes de verificacion</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-verification-reqeusts" value="0" />
                        <input type="checkbox" name="manage-verification-reqeusts" id="chck-manage-verification-reqeusts" value="1" <?php if(isset($user_data['permission']['manage-verification-reqeusts']) == 1){echo($user_data['permission']['manage-verification-reqeusts'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-verification-reqeusts" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-genders" class="main-label">Administrar generos</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-genders" value="0" />
                        <input type="checkbox" name="manage-genders" id="chck-manage-genders" value="1" <?php if(isset($user_data['permission']['manage-genders']) == 1){echo($user_data['permission']['manage-genders'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-genders" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sistema de Afiliados</h6>
                    <div class="float-left">
                        <label for="affiliates-settings" class="main-label">Configuracion de afiliados</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="affiliates-settings" value="0" />
                        <input type="checkbox" name="affiliates-settings" id="chck-affiliates-settings" value="1" <?php if(isset($user_data['permission']['affiliates-settings']) == 1){echo($user_data['permission']['affiliates-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-affiliates-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="referrals-list" class="main-label">Lista de referencias</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="referrals-list" value="0" />
                        <input type="checkbox" name="referrals-list" id="chck-referrals-list" value="1" <?php if(isset($user_data['permission']['referrals-list']) == 1){echo($user_data['permission']['referrals-list'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-referrals-list" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="payment-reqeuests" class="main-label">Solicitudes de pago</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="payment-reqeuests" value="0" />
                        <input type="checkbox" name="payment-reqeuests" id="chck-payment-reqeuests" value="1" <?php if(isset($user_data['permission']['payment-reqeuests']) == 1){echo($user_data['permission']['payment-reqeuests'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-payment-reqeuests" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Pagos y anuncios</h6>
                    <div class="float-left">
                        <label for="payment-settings" class="main-label">Configuracion de pago</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="payment-settings" value="0" />
                        <input type="checkbox" name="payment-settings" id="chck-payment-settings" value="1" <?php if(isset($user_data['permission']['payment-settings']) == 1){echo($user_data['permission']['payment-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-payment-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="ads-settings" class="main-label">Configuracion de anuncios</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="ads-settings" value="0" />
                        <input type="checkbox" name="ads-settings" id="chck-ads-settings" value="1" <?php if(isset($user_data['permission']['ads-settings']) == 1){echo($user_data['permission']['ads-settings'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-ads-settings" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-currencies" class="main-label">Administrar monedas</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-currencies" value="0" />
                        <input type="checkbox" name="manage-currencies" id="chck-manage-currencies" value="1" <?php if(isset($user_data['permission']['manage-currencies']) == 1){echo($user_data['permission']['manage-currencies'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-currencies" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-site-ads" class="main-label">Administrar anuncios del sitio</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-site-ads" value="0" />
                        <input type="checkbox" name="manage-site-ads" id="chck-manage-site-ads" value="1" <?php if(isset($user_data['permission']['manage-site-ads']) == 1){echo($user_data['permission']['manage-site-ads'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-site-ads" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="manage-user-ads" class="main-label">Administrar anuncios de usuario</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-user-ads" value="0" />
                        <input type="checkbox" name="manage-user-ads" id="chck-manage-user-ads" value="1" <?php if(isset($user_data['permission']['manage-user-ads']) == 1){echo($user_data['permission']['manage-user-ads'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-user-ads" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="bank-receipts" class="main-label">Administrar recibos bancarios</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="bank-receipts" value="0" />
                        <input type="checkbox" name="bank-receipts" id="chck-bank-receipts" value="1" <?php if(isset($user_data['permission']['bank-receipts']) == 1){echo($user_data['permission']['bank-receipts'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-bank-receipts" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Actualizaciones</h6>
                    <div class="float-left">
                        <label for="manage-updates" class="main-label">Actualizaciones y correcciones de errores</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="manage-updates" value="0" />
                        <input type="checkbox" name="manage-updates" id="chck-manage-updates" value="1" <?php if(isset($user_data['permission']['manage-updates']) == 1){echo($user_data['permission']['manage-updates'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-manage-updates" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="float-left">
                        <label for="changelog" class="main-label">Registros de cambios</label>
                    </div>
                    <div class="form-group float-right switcher">
                        <input type="hidden" name="changelog" value="0" />
                        <input type="checkbox" name="changelog" id="chck-changelog" value="1" <?php if(isset($user_data['permission']['changelog']) == 1){echo($user_data['permission']['changelog'] == 1) ? 'checked': '';} ?>>
                        <label for="chck-changelog" class="check-trail"><span class="check-handler"></span></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php }elseif($user_data['admin'] == 1){ ?>
            <div class="col-lg-12 col-md-12">
                <div class="alert alert-warning">El administrador puede administrar todo</div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="modal fade" id="PermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Agregar como moderador?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ModeratorModalAlert"></div>
                <p class="permission_text">¿Esta seguro de que desea agregar como moderador?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-secondary">Agregar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.switcher input[type=checkbox]').click(function () {
            setToTrue = 0;
            if ($(this).is(":checked") === true) {
                setToTrue = 1;
            }
            var permission = $(this).attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData['permission'] = permission;
            objData['permission_val'] = setToTrue;
            var user_id = '<?php echo (int)$user_data['id'];?>';
            objData['user_id'] = user_id;
            objData['hash_id'] = hash_id;
            $.get( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_moderator_permission', objData);
        });
    });

    function Wo_Permission(user_id,type = 'show',type2) {
        if (type == 'hide') {
            $('#PermissionModal').find('.btn-secondary').attr('onclick', "Wo_Permission('"+user_id+"','show','"+type2+"')");
            text = '¿Añadir como usuario normal?';
            text2 = '¿Esta seguro de que desea agregar como un usuario normal?';
            if (type2 == 'moderator') {
                text = 'Agregar como moderador?';
                text2 = '¿Seguro que quieres añadir como moderador?';
            }
            if (type2 == 'admin') {
                text = 'Agregar como administrador?';
                text2 = '¿Esta seguro de que desea agregar como administrador?';
            }
            $('#PermissionModal').find('.modal-title').html(text);
            $('#PermissionModal').find('.permission_text').html(text2);
            $('#PermissionModal').modal('show');
            return false;
        }
        hash_id = $('#hash_id').val();
        $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'permission', user_id: user_id, hash_id: hash_id,type: type2},function(data) {
            location.reload();
        });
    }
</script>