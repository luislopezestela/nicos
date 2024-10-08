<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Publicaciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configuarar publicaciones</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
        <div class="alert alert-warning">Nota: Algunas funciones están deshabilitadas debido al modo de sitio web que utilizó.</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Enlaces para compartir en redes sociales</h6>
                    <div class="site-settings-alert"></div>
                    <form class="site-settings" method="POST">
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Twitter</span>
                            <br><small class="admin-info">Comparte publicaciones en Twitter.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="social_share_twitter" value="0" />
                            <input type="checkbox" name="social_share_twitter" id="chck-social_share_twitter" value="1" <?php echo ($wo['config']['social_share_twitter'] == 1) ? 'checked': '';?>>
                            <label for="chck-social_share_twitter" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Facebook</span>
                            <br><small class="admin-info">Comparte publicaciones en Facebook.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="social_share_facebook" value="0" />
                            <input type="checkbox" name="social_share_facebook" id="chck-social_share_facebook" value="1" <?php echo ($wo['config']['social_share_facebook'] == 1) ? 'checked': '';?>>
                            <label for="chck-social_share_facebook" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Whatsapp</span>
                            <br><small class="admin-info">Comparte publicaciones en Whatsapp.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="social_share_whatsup" value="0" />
                            <input type="checkbox" name="social_share_whatsup" id="chck-social_share_whatsup" value="1" <?php echo ($wo['config']['social_share_whatsup'] == 1) ? 'checked': '';?>>
                            <label for="chck-social_share_whatsup" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Pinterest</span>
                            <br><small class="admin-info">Comparte publicaciones en Pinterest.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="social_share_pinterest" value="0" />
                            <input type="checkbox" name="social_share_pinterest" id="chck-social_share_pinterest" value="1" <?php echo ($wo['config']['social_share_pinterest'] == 1) ? 'checked': '';?>>
                            <label for="chck-social_share_pinterest" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Linkedin</span>
                            <br><small class="admin-info">Comparte publicaciones en Linkedin.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="social_share_linkedin" value="0" />
                            <input type="checkbox" name="social_share_linkedin" id="chck-social_share_linkedin" value="1" <?php echo ($wo['config']['social_share_linkedin'] == 1) ? 'checked': '';?>>
                            <label for="chck-social_share_linkedin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Telegram</span>
                            <br><small class="admin-info">Comparte publicaciones en Telegram.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="social_share_telegram" value="0" />
                            <input type="checkbox" name="social_share_telegram" id="chck-social_share_telegram" value="1" <?php echo ($wo['config']['social_share_telegram'] == 1) ? 'checked': '';?>>
                            <label for="chck-social_share_telegram" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de imagenes para adultos</h6>
                    <form class="adult-settings small-p" method="POST">
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Filtracion de imagenes para adultos</span>
                            <br><small class="admin-info">Habilite esta función para difuminar o eliminar publicaciones que contengan contenido para adultos usando Google AI.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="adult_images" value="0" />
                            <input type="checkbox" name="adult_images" id="chck-adult_images" value="1" <?php echo ($wo['config']['adult_images'] == 1) ? 'checked': '';?>>
                            <label for="chck-adult_images" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <label for="adult_images_action">Accion para imagenes para adultos</label>
                        <select class="form-control show-tick" id="adult_images_action" name="adult_images_action">
                          <option value="0" <?php echo ($wo['config']['adult_images_action'] == '0')  ? ' selected': '';?>>Eliminar la imagen</option>
                          <option value="1" <?php echo ($wo['config']['adult_images_action'] == '1')  ? ' selected': '';?>>Desenfocar la imagen</option>
                        </select>
                        <small class="admin-info">Elija la acción a realizar una vez que se encuentre una imagen para adultos.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="vision_api_key">Clave de API de vision</label>
                                <input type="text" id="vision_api_key" name="vision_api_key" class="form-control" value="<?php echo $wo['config']['vision_api_key']?>">
                                <small class="admin-info">Tu clave API de Google Vision.</small>
                            </div>
                        </div>
                        <hr>
                        <p>Siga los pasos a continuación para activar el sistema:</p> <hr>
                        <p class="main-label">1. Seleccione o cree un proyecto de GCP desde <a href="https://console.cloud.google.com/projectcreate?previousPage=%2Fcloud-resource-manager%3F_ga%3D2.239227332.-679302599.1549629461&defaultProjectName=&project=robotic-subject-231114&folder=&organizationId=">Aqui</a></p>
                        <p class="main-label">2. Asegúrate de que la facturación este habilitada para tu proyecto <a href="https://cloud.google.com/billing/docs/how-to/modify-project">De aqui</a> Or <a href="https://console.cloud.google.com/freetrial/signup/tos">Crear una nueva cuenta de facturación</a></p>
                        <p class="main-label">3. Habilite la API de Cloud Vision. <a href="https://console.cloud.google.com/flows/enableapi?apiid=vision-json.googleapis.com&_ga=2.132996809.-679302599.1549629461">From Here</a></p>
                        <p class="main-label">4. Cree una clave de API:</p>
                        <p >     - Navegar a la <a href="https://console.cloud.google.com/apis/credentials?_ga=2.194723562.-679302599.1549629461">API y servicios → Credenciales </a> panel en GCP Console.</p>
                        <p>: seleccione Crear credenciales y, a continuación, seleccione la clave API en el menú desplegable.</p>
                        <p> - Haga clic en el botón Crear. El cuadro de diálogo de la clave API creada muestra la clave recién creada.</p>
                        
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="adult-settings-test-alert"></div>
                        <div class="btn btn-info m-t-15 waves-effect" id="test_btn" onclick="Wo_TestVisionApi();">Test API</div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración general de publicaciones y comentarios</h6>
                    <div class="store-settings-alert"></div>
                    <form class="site-settings2" method="POST">
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Sistema de Memorias</span>
                            <br><small class="admin-info">Mostrar memorias de publicaciones para los usuarios, anualmente.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="memories_system" value="0" />
                            <input type="checkbox" name="memories_system" id="chck-memories_system" value="1" <?php echo ($wo['config']['memories_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('memories_system')) ?>>
                            <label for="chck-memories_system" class="check-trail <?php echo(EnableForMode('memories_system',true)) ?>" <?php echo(EnableForMode('memories_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Superposicion de marca de agua</span>
                            <br><small class="admin-info">Esta caracteristica creara una marca de agua superpuesta sobre imagenes y videos. <br> La ruta del icono utilizado es: <?php echo "./datos/modulos/{$wo['config']['theme']}/img/icon.png";?></small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="watermark" value="0" />
                            <input type="checkbox" name="watermark" id="chck-watermark" value="1" <?php echo ($wo['config']['watermark'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('watermark')) ?>>
                            <label for="chck-watermark" class="check-trail <?php echo(EnableForMode('watermark',true)) ?>" <?php echo(EnableForMode('watermark',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Sistema de caja de gritos</span>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="shout_box_request" id="shout_box_request-admin" onchange="SelectProModel('can_use_shout_box',this)" value="admin" <?php echo ($wo['config']['shout_box_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="shout_box_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="shout_box_request" id="shout_box_request-all" onchange="SelectProModel('can_use_shout_box',this)" value="all" <?php echo ($wo['config']['shout_box_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="shout_box_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="shout_box_request" id="shout_box_request-verified" onchange="SelectProModel('can_use_shout_box',this)" value="verified" <?php echo ($wo['config']['shout_box_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="shout_box_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="shout_box_request" id="shout_box_request-pro" onchange="SelectProModel('can_use_shout_box',this)" value="pro" <?php echo ($wo['config']['shout_box_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="shout_box_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Permitir a los usuarios crear publicaciones de forma anonima.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="shout_box_system" value="0" />
                            <input type="checkbox" name="shout_box_system" id="chck-shout_box_system" value="1" <?php echo ($wo['config']['shout_box_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('shout_box_system')) ?>>
                            <label for="chck-shout_box_system" class="check-trail <?php echo(EnableForMode('shout_box_system',true)) ?>" <?php echo(EnableForMode('shout_box_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Publicaciones de colores</span>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="colored_posts_request" id="colored_posts_request-admin" onchange="SelectProModel('can_use_colored_posts',this)" value="admin" <?php echo ($wo['config']['colored_posts_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="colored_posts_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="colored_posts_request" id="colored_posts_request-all" onchange="SelectProModel('can_use_colored_posts',this)" value="all" <?php echo ($wo['config']['colored_posts_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="colored_posts_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="colored_posts_request" id="colored_posts_request-verified" onchange="SelectProModel('can_use_colored_posts',this)" value="verified" <?php echo ($wo['config']['colored_posts_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="colored_posts_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="colored_posts_request" id="colored_posts_request-pro" onchange="SelectProModel('can_use_colored_posts',this)" value="pro" <?php echo ($wo['config']['colored_posts_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="colored_posts_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Los usuarios pueden crear publicaciones de colores. <br> Puede administrar la versión en color desde <a href="<?php echo lui_LoadAdminLinkSettings('manage-colored-posts'); ?>">Administrar publicaciones en color</a></small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="colored_posts_system" value="0" />
                            <input type="checkbox" name="colored_posts_system" id="chck-colored_posts_system" value="1" <?php echo ($wo['config']['colored_posts_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('colored_posts_system')) ?>>
                            <label for="chck-colored_posts_system" class="check-trail <?php echo(EnableForMode('colored_posts_system',true)) ?>" <?php echo(EnableForMode('colored_posts_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Aprobacion de publicacion</span>
                            <br><small class="admin-info">La publicacion se enviara a los administradores y moderadores para su aprobación antes de publicarla.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="post_approval" value="0" />
                            <input type="checkbox" name="post_approval" id="chck-post_approval" value="1" <?php echo ($wo['config']['post_approval'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('post_approval')) ?>>
                            <label for="chck-post_approval" class="check-trail <?php echo(EnableForMode('post_approval',true)) ?>" <?php echo(EnableForMode('post_approval',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Publicaciones y comentarios populares</span>
                            <br><small class="admin-info">Mostrar publicaciones y comentarios populares esta semana. <br>Cuando esta habilitado, puede ver el enlace en la barra lateral izquierda de la pagina de inicio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="popular_posts" value="0" />
                            <input type="checkbox" name="popular_posts" id="chck-popular_posts" value="1" <?php echo ($wo['config']['popular_posts'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('popular_posts')) ?>>
                            <label for="chck-popular_posts" class="check-trail <?php echo(EnableForMode('popular_posts',true)) ?>" <?php echo(EnableForMode('popular_posts',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Informes de comentarios</span>
                            <br><small class="admin-info">Permitir a los usuarios reportar comentarios.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="comment_reports" value="0" />
                            <input type="checkbox" name="comment_reports" id="chck-comment_reports" value="1" <?php echo ($wo['config']['comment_reports'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('comment_reports')) ?>>
                            <label for="chck-comment_reports" class="check-trail <?php echo(EnableForMode('comment_reports',true)) ?>" <?php echo(EnableForMode('comment_reports',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Ubicacion</span>
                            <br><small class="admin-info">Permitir a los usuarios publicar ubicacion.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="post_location" value="0" />
                            <input type="checkbox" name="post_location" id="chck-post_location" value="1" <?php echo ($wo['config']['post_location'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('post_location')) ?>>
                            <label for="chck-post_location" class="check-trail <?php echo(EnableForMode('post_location',true)) ?>" <?php echo(EnableForMode('post_location',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Sentimientos</span>
                            <br><small class="admin-info">Permitir a los usuarios publicar sentimientos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="post_feelings" value="0" />
                            <input type="checkbox" name="post_feelings" id="chck-post_feelings" value="1" <?php echo ($wo['config']['post_feelings'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('post_feelings')) ?>>
                            <label for="chck-post_feelings" class="check-trail <?php echo(EnableForMode('post_feelings',true)) ?>" <?php echo(EnableForMode('post_feelings',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Encuesta</span>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="poll_request" id="poll_request-admin" onchange="SelectProModel('can_use_poll',this)" value="admin" <?php echo ($wo['config']['poll_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="poll_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="poll_request" id="poll_request-all" onchange="SelectProModel('can_use_poll',this)" value="all" <?php echo ($wo['config']['poll_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="poll_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="poll_request" id="poll_request-verified" onchange="SelectProModel('can_use_poll',this)" value="verified" <?php echo ($wo['config']['poll_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="poll_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="poll_request" id="poll_request-pro" onchange="SelectProModel('can_use_poll',this)" value="pro" <?php echo ($wo['config']['poll_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="poll_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir a los usuarios publicar encuestas.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="post_poll" value="0" />
                            <input type="checkbox" name="post_poll" id="chck-post_poll" value="1" <?php echo ($wo['config']['post_poll'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('post_poll')) ?>>
                            <label for="chck-post_poll" class="check-trail <?php echo(EnableForMode('post_poll',true)) ?>" <?php echo(EnableForMode('post_poll',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        
                        <label for="maxCharacters">Longitud maxima de caracteres permitida</label>
                        <select class="form-control show-tick" id="maxCharacters" name="maxCharacters">
                          <option value="80"   <?php echo ($wo['config']['maxCharacters'] == 80) ? ' selected': '';?>>80 Caracteres</option>
                          <option value="160"  <?php echo ($wo['config']['maxCharacters'] == 160) ? ' selected': '';?>>160 Caracteres</option>
                          <option value="320"  <?php echo ($wo['config']['maxCharacters'] == 320) ? ' selected': '';?>>320 Caracteres</option>
                          <option value="640"  <?php echo ($wo['config']['maxCharacters'] == 640) ? ' selected': '';?>>640 Caracteres</option>
                          <option value="1280" <?php echo ($wo['config']['maxCharacters'] == 1280) ? ' selected': '';?>>1280 Caracteres</option>
                          <option value="5000" <?php echo ($wo['config']['maxCharacters'] == 5000) ? ' selected': '';?>>5000 Caracteres</option>
                          <option value="10000" <?php echo ($wo['config']['maxCharacters'] == 10000) ? ' selected': '';?>>Ilimitado</option>
                        </select>
                        <small class="admin-info">Establezca el maximo de caracteres permitidos para publicaciones, comentarios, respuestas y mensajes.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <label class="form-check-label" for="order_posts_by">Publicaciones de noticias</label>
                        <select class="form-control show-tick" id="order_posts_by" name="order_posts_by">
                            <option value="1" <?php echo ($wo['config']['order_posts_by'] == 1)   ? ' selected' : '';?> >Predeterminado (Mostrar qué usuario está siguiendo)</option>
                            <option value="0" <?php echo ($wo['config']['order_posts_by'] == 0)   ? ' selected' : '';?> >Mostrar todas las publicaciones</option>
                        </select>
                        <small class="admin-info">Establezca como apareceran las publicaciones de noticias para los usuarios.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <label class="form-check-label" for="second_post_button">Segundo boton de publicacion</label>
                        <select class="form-control show-tick" id="second_post_button" name="second_post_button" <?php echo(EnableForMode('second_post_button')) ?> <?php echo(EnableForMode('second_post_button',false,true)) ?>>
                          <option value="wonder" <?php echo ($wo['config']['second_post_button'] == 'wonder')   ? ' selected' : '';?> >Preguntarse</option>
                          <option value="dislike" <?php echo ($wo['config']['second_post_button'] == 'dislike')   ? ' selected' : '';?> >Disgusto</option>
                          <option value="reaction" <?php echo ($wo['config']['second_post_button'] == 'reaction')   ? ' selected' : '';?> >Sistema de reaccion</option>
                          <option value="disabled" <?php echo ($wo['config']['second_post_button'] == 'disabled')   ? ' selected' : '';?> >Boton Deshabilitar (solo Me gusta)</option>
                        </select>
                        <small class="admin-info">Elija qué tipo de reacción desea usar junto al boton Me gusta. Puedes gestionar las reacciones.<a href="<?php echo lui_LoadAdminLinkSettings('administrar-reacciones'); ?>">Here</a></small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="post_limit">Recuento de limite de publicación</label>
                                <input type="text" id="post_limit" name="post_limit" class="form-control" value="<?php echo $wo['config']['post_limit']?>">
                                <small class="admin-info">¿Cuántas publicaciones puede crear un usuario en una hora?</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>


    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

function Wo_TestVisionApi() {
    $('#test_btn').text('Please wait..');
    $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=test_vision_api', function(data, textStatus, xhr) {
        if (data.status == 400) {
            $(".adult-settings-test-alert").html('<div class="alert alert-danger">' + data.message + '</div>');
            setTimeout(function (argument) {
                $(".adult-settings-test-alert").html('');
            },2000);
        }
        else{
            $(".adult-settings-test-alert").html('<div class="alert alert-success">' + data.message + '</div>');
            setTimeout(function (argument) {
                $(".adult-settings-test-alert").html('');
            },2000);
        }
        $('#test_btn').text('Test API');
    });
}
$(function() {
    $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            setToTrue = 1;
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        if (configName == 'redis') { 
            setToTrue = 'N';
            if ($(this).is(":checked") === true) {
              setToTrue = 'Y';
            }
        }
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