<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuraciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar funciones web</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
        <div class="alert alert-warning">Nota: Algunas funciones están deshabilitadas debido al modo de sitio web que utilizó.</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-7 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"> Caracteristicas del sitio web</h6>
                    <div class="site-settings-alert"></div>
                    <form class="site-settings" method="POST">
                        <div class="float-left">
                            <label for="afternoon_system" class="main-label">Sistema de saludo</label>
                            <br><small class="admin-info">Muestra mensajes de buenas tardes, mañanas y noches en la pagina de inicio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="afternoon_system" value="0" />
                            <input type="checkbox" name="afternoon_system" id="chck-afternoon_system" value="1" <?php echo ($wo['config']['afternoon_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('afternoon_system')) ?>>
                            <label for="chck-afternoon_system" class="check-trail <?php echo(EnableForMode('afternoon_system',true)) ?>" <?php echo(EnableForMode('afternoon_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="poke_system" class="main-label">Sistema de Toques</label>
                            <br><small class="admin-info">Activar para que los usuarios se den Toques entre si.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="poke_system" value="0" />
                            <input type="checkbox" name="poke_system" id="chck-poke_system" value="1" <?php echo ($wo['config']['poke_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('poke_system')) ?>>
                            <label for="chck-poke_system" class="check-trail <?php echo(EnableForMode('poke_system',true)) ?>" <?php echo(EnableForMode('poke_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        
                        <div class="float-left">
                            <label for="games" class="main-label">Sistema de juegos</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="game_request" id="game_request-admin" onchange="SelectProModel('can_use_games',this)" value="admin" <?php echo ($wo['config']['game_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="game_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="game_request" id="game_request-all" onchange="SelectProModel('can_use_games',this)" value="all" <?php echo ($wo['config']['game_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="game_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="game_request" id="game_request-verified" onchange="SelectProModel('can_use_games',this)" value="verified" <?php echo ($wo['config']['game_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="game_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="game_request" id="game_request-pro" onchange="SelectProModel('can_use_games',this)" value="pro" <?php echo ($wo['config']['game_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="game_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permita que los usuarios jueguen, puede agregar juegos desde <a href="<?php echo lui_LoadAdminLinkSettings('add-new-game'); ?>">Agregar nuevo juego</a>.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="games" value="0" />
                            <input type="checkbox" name="games" id="chck-games" value="1" <?php echo ($wo['config']['games'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('games')) ?>>
                            <label for="chck-games" class="check-trail <?php echo(EnableForMode('games',true)) ?>" <?php echo(EnableForMode('games',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        
                        <div class="float-left">
                            <label for="pages" class="main-label">Sistema de paginas</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="pages_request" id="pages_request-admin" onchange="SelectProModel('can_use_pages',this)" value="admin" <?php echo ($wo['config']['pages_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="pages_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="pages_request" id="pages_request-all" onchange="SelectProModel('can_use_pages',this)" value="all" <?php echo ($wo['config']['pages_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="pages_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="pages_request" id="pages_request-verified" onchange="SelectProModel('can_use_pages',this)" value="verified" <?php echo ($wo['config']['pages_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="pages_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="pages_request" id="pages_request-pro" onchange="SelectProModel('can_use_pages',this)" value="pro" <?php echo ($wo['config']['pages_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="pages_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir a los usuarios crear paginas de fans.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="pages" value="0" />
                            <input type="checkbox" name="pages" id="chck-pages" value="1" <?php echo ($wo['config']['pages'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('pages')) ?>>
                            <label for="chck-pages" class="check-trail <?php echo(EnableForMode('pages',true)) ?>" <?php echo(EnableForMode('pages',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>
                        <div class="float-left">
                            <label for="nearby_business_system" class="main-label">Empresas cercanas</label>
                            <br><small class="admin-info">Permitir a los usuarios encontrar negocios cercanos (paginas).</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="nearby_business_system" value="0" />
                            <input type="checkbox" name="nearby_business_system" id="chck-nearby_business_system" value="1" <?php echo ($wo['config']['nearby_business_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('nearby_business_system')) ?>>
                            <label for="chck-nearby_business_system" class="check-trail <?php echo(EnableForMode('nearby_business_system',true)) ?>" <?php echo(EnableForMode('nearby_business_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="groups" class="main-label">Sistema de Grupos</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quien puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="groups_request" id="groups_request-admin" onchange="SelectProModel('can_use_groups',this)" value="admin" <?php echo ($wo['config']['groups_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="groups_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="groups_request" id="groups_request-all" onchange="SelectProModel('can_use_groups',this)" value="all" <?php echo ($wo['config']['groups_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="groups_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="groups_request" id="groups_request-verified" onchange="SelectProModel('can_use_groups',this)" value="verified" <?php echo ($wo['config']['groups_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="groups_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="groups_request" id="groups_request-pro" onchange="SelectProModel('can_use_groups',this)" value="pro" <?php echo ($wo['config']['groups_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="groups_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir a los usuarios crear grupos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="groups" value="0" />
                            <input type="checkbox" name="groups" id="chck-groups" value="1" <?php echo ($wo['config']['groups'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('groups')) ?>>
                            <label for="chck-groups" class="check-trail <?php echo(EnableForMode('groups',true)) ?>" <?php echo(EnableForMode('groups',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="classified" class="main-label">Sistema Clasificado (MarketPlace)</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="market_request" id="market_request-admin" onchange="SelectProModel('can_use_market',this)" value="admin" <?php echo ($wo['config']['market_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="market_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="market_request" id="market_request-all" onchange="SelectProModel('can_use_market',this)" value="all" <?php echo ($wo['config']['market_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="market_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="market_request" id="market_request-verified" onchange="SelectProModel('can_use_market',this)" value="verified" <?php echo ($wo['config']['market_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="market_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="market_request" id="market_request-pro" onchange="SelectProModel('can_use_market',this)" value="pro" <?php echo ($wo['config']['market_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="market_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permita que los usuarios vendan y enumeren sus productos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="classified" value="0" />
                            <input type="checkbox" name="classified" id="chck-classified" value="1" <?php echo ($wo['config']['classified'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('classified')) ?>>
                            <label for="chck-classified" class="check-trail <?php echo(EnableForMode('classified',true)) ?>" <?php echo(EnableForMode('classified',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                         <div class="float-left">
                            <label for="offer_system" class="main-label">Sistema de oferta (MarketPlace)</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="offer_request" id="offer_request-admin" onchange="SelectProModel('can_use_offer',this)" value="admin" <?php echo ($wo['config']['offer_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="offer_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="offer_request" id="offer_request-all" onchange="SelectProModel('can_use_offer',this)" value="all" <?php echo ($wo['config']['offer_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="offer_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="offer_request" id="offer_request-verified" onchange="SelectProModel('can_use_offer',this)" value="verified" <?php echo ($wo['config']['offer_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="offer_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="offer_request" id="offer_request-pro" onchange="SelectProModel('can_use_offer',this)" value="pro" <?php echo ($wo['config']['offer_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="offer_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Permita que las paginas creen ofertas y descuentos para sus productos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="offer_system" value="0" />
                            <input type="checkbox" name="offer_system" id="chck-offer_system" value="1" <?php echo ($wo['config']['offer_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('offer_system')) ?>>
                            <label for="chck-offer_system" class="check-trail <?php echo(EnableForMode('offer_system',true)) ?>" <?php echo(EnableForMode('offer_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>
                        <div class="float-left">
                            <label for="nearby_shop_system" class="main-label">Tiendas Cercanas</label>
                            <br><small class="admin-info">Mostrar tiendas y productos cercanos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="nearby_shop_system" value="0" />
                            <input type="checkbox" name="nearby_shop_system" id="chck-nearby_shop_system" value="1" <?php echo ($wo['config']['nearby_shop_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('nearby_shop_system')) ?>>
                            <label for="chck-nearby_shop_system" class="check-trail <?php echo(EnableForMode('nearby_shop_system',true)) ?>" <?php echo(EnableForMode('nearby_shop_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                        <label for="product_visibility">Visibilidad del mercado</label>
                        <select class="form-control show-tick" id="product_visibility" name="product_visibility">
                          <option value="1" <?php echo ($wo['config']['product_visibility'] == '1')   ? ' selected' : '';?> >Solo usuarios registrados</option>
                          <option value="0" <?php echo ($wo['config']['product_visibility'] == '0')   ? ' selected' : '';?> >Todos los usuarios</option>
                        </select>
                        <small class="admin-info">¿Quien puede ver y acceder al mercado?</small>
                        <hr>

                        <div class="float-left">
                            <label for="blogs" class="main-label">Sistema de blogs</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="blog_request" id="blog_request-admin" onchange="SelectProModel('can_use_blog',this)" value="admin" <?php echo ($wo['config']['blog_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="blog_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="blog_request" id="blog_request-all" onchange="SelectProModel('can_use_blog',this)" value="all" <?php echo ($wo['config']['blog_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="blog_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="blog_request" id="blog_request-verified" onchange="SelectProModel('can_use_blog',this)" value="verified" <?php echo ($wo['config']['blog_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="blog_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="blog_request" id="blog_request-pro" onchange="SelectProModel('can_use_blog',this)" value="pro" <?php echo ($wo['config']['blog_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="blog_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir a los usuarios crear blogs.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="blogs" value="0" />
                            <input type="checkbox" name="blogs" id="chck-blogs" value="1" <?php echo ($wo['config']['blogs'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('blogs')) ?>>
                            <label for="chck-blogs" class="check-trail <?php echo(EnableForMode('blogs',true)) ?>" <?php echo(EnableForMode('blogs',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                        <div class="float-left">
                            <label for="blog_approval" class="main-label">Sistema de aprobación de blogs</label>
                            <br><small class="admin-info">Envie publicaciones de blog al administrador para que las revise antes de publicarlas.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="blog_approval" value="0" />
                            <input type="checkbox" name="blog_approval" id="chck-blog_approval" value="1" <?php echo ($wo['config']['blog_approval'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('blog_approval')) ?>>
                            <label for="chck-blog_approval" class="check-trail <?php echo(EnableForMode('blog_approval',true)) ?>" <?php echo(EnableForMode('blog_approval',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                        <!-- <label for="can_blogs">Who Can Post Blogs?</label>
                        <select class="form-control show-tick" id="can_blogs" name="can_blogs">
                            <option value="0" <?php echo ($wo['config']['can_blogs'] == '0')   ? ' selected' : '';?> >Admins Only</option>
                            <option value="1" <?php echo ($wo['config']['can_blogs'] == '1')   ? ' selected' : '';?> >Users Only</option>
                        </select>
                        <small class="admin-info">Who can create and post blog articles?</small>
                        <div class="clearfix"></div> -->
                        <hr>

                        <div class="float-left">
                            <label for="events" class="main-label">Sistema de Eventos</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="event_request" id="event_request-admin" onchange="SelectProModel('can_use_events',this)" value="admin" <?php echo ($wo['config']['event_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="event_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="event_request" id="event_request-all" onchange="SelectProModel('can_use_events',this)" value="all" <?php echo ($wo['config']['event_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="event_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="event_request" id="event_request-verified" onchange="SelectProModel('can_use_events',this)" value="verified" <?php echo ($wo['config']['event_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="event_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="event_request" id="event_request-pro" onchange="SelectProModel('can_use_events',this)" value="pro" <?php echo ($wo['config']['event_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="event_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir a los usuarios crear eventos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="events" value="0" />
                            <input type="checkbox" name="events" id="chck-events" value="1" <?php echo ($wo['config']['events'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('events')) ?>>
                            <label for="chck-events" class="check-trail <?php echo(EnableForMode('events',true)) ?>" <?php echo(EnableForMode('events',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                        <label for="events_visibility">Visibilidad de eventos</label>
                        <select class="form-control show-tick" id="events_visibility" name="events_visibility">
                          <option value="0" <?php echo ($wo['config']['events_visibility'] == '0')   ? ' selected' : '';?> >Solo usuarios registrados</option>
                          <option value="1" <?php echo ($wo['config']['events_visibility'] == '1')   ? ' selected' : '';?> >Todos los usuarios</option>
                        </select>
                        <small class="admin-info">¿Quién puede ver y acceder a los eventos?</small>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="forum" class="main-label">Sistema de foros</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quien puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="forum_request" id="forum_request-admin" onchange="SelectProModel('can_use_forum',this)" value="admin" <?php echo ($wo['config']['forum_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="forum_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="forum_request" id="forum_request-all" onchange="SelectProModel('can_use_forum',this)" value="all" <?php echo ($wo['config']['forum_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="forum_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="forum_request" id="forum_request-verified" onchange="SelectProModel('can_use_forum',this)" value="verified" <?php echo ($wo['config']['forum_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="forum_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="forum_request" id="forum_request-pro" onchange="SelectProModel('can_use_forum',this)" value="pro" <?php echo ($wo['config']['forum_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="forum_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir a los usuarios crear foros.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="forum" value="0" />
                            <input type="checkbox" name="forum" id="chck-forum" value="1" <?php echo ($wo['config']['forum'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('forum')) ?>>
                            <label for="chck-forum" class="check-trail <?php echo(EnableForMode('forum',true)) ?>" <?php echo(EnableForMode('forum',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                        <label for="forum_visibility">Visibilidad de los foros</label>
                        <select class="form-control show-tick" id="forum_visibility" name="forum_visibility">
                          <option value="1" <?php echo ($wo['config']['forum_visibility'] == '1')   ? ' selected' : '';?> >Solo usuarios registrados</option>
                          <option value="0" <?php echo ($wo['config']['forum_visibility'] == '0')   ? ' selected' : '';?> >Todos los usuarios</option>
                        </select>
                        <small class="admin-info">¿Quién puede ver y acceder a los foros?</small>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="movies" class="main-label">Sistema de peliculas</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="movies_request" id="movies_request-admin" onchange="SelectProModel('can_use_movies',this)" value="admin" <?php echo ($wo['config']['movies_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="movies_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="movies_request" id="movies_request-all" onchange="SelectProModel('can_use_movies',this)" value="all" <?php echo ($wo['config']['movies_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="movies_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="movies_request" id="movies_request-verified" onchange="SelectProModel('can_use_movies',this)" value="verified" <?php echo ($wo['config']['movies_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="movies_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="movies_request" id="movies_request-pro" onchange="SelectProModel('can_use_movies',this)" value="pro" <?php echo ($wo['config']['movies_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="movies_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permita que los usuarios vean peliculas, solo los administradores pueden agregar peliculas, puede administrar peliculas desde<a href="<?php echo lui_LoadAdminLinkSettings('add-new-movies'); ?>">Administrar peliculas</a>.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="movies" value="0" />
                            <input type="checkbox" name="movies" id="chck-movies" value="1" <?php echo ($wo['config']['movies'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('movies')) ?>>
                            <label for="chck-movies" class="check-trail <?php echo(EnableForMode('movies',true)) ?>" <?php echo(EnableForMode('movies',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="user_status" class="main-label">Sistema de historia/estado</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quien puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="story_request" id="story_request-admin" onchange="SelectProModel('can_use_story',this)" value="admin" <?php echo ($wo['config']['story_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="story_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="story_request" id="story_request-all" onchange="SelectProModel('can_use_story',this)" value="all" <?php echo ($wo['config']['story_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="story_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="story_request" id="story_request-verified" onchange="SelectProModel('can_use_story',this)" value="verified" <?php echo ($wo['config']['story_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="story_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="story_request" id="story_request-pro" onchange="SelectProModel('can_use_story',this)" value="pro" <?php echo ($wo['config']['story_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="story_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Permita que los usuarios creen historias y estados que vencen después de 24 horas.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="user_status" value="0" />
                            <input type="checkbox" name="user_status" id="chck-user_status" value="1" <?php echo ($wo['config']['user_status'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('user_status')) ?>>
                            <label for="chck-user_status" class="check-trail <?php echo(EnableForMode('user_status',true)) ?>" <?php echo(EnableForMode('user_status',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="stickers" class="main-label">Sistema GIF</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quien puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="gif_request" id="gif_request-admin" onchange="SelectProModel('can_use_gif',this)" value="admin" <?php echo ($wo['config']['gif_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gif_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="gif_request" id="gif_request-all" onchange="SelectProModel('can_use_gif',this)" value="all" <?php echo ($wo['config']['gif_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gif_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="gif_request" id="gif_request-verified" onchange="SelectProModel('can_use_gif',this)" value="verified" <?php echo ($wo['config']['gif_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gif_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="gif_request" id="gif_request-pro" onchange="SelectProModel('can_use_gif',this)" value="pro" <?php echo ($wo['config']['gif_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gif_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permita que los usuarios compartan imágenes gif en publicaciones, comentarios y chats.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="stickers" value="0" />
                            <input type="checkbox" name="stickers" id="chck-stickers" value="1" <?php echo ($wo['config']['stickers'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('stickers')) ?>>
                            <label for="chck-stickers" class="check-trail <?php echo(EnableForMode('stickers',true)) ?>" <?php echo(EnableForMode('stickers',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div><br>

                        <div class="float-left">
                            <label for="stickers_system" class="main-label">Sistema de pegatinas</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="stickers_request" id="stickers_request-admin" onchange="SelectProModel('can_use_stickers',this)" value="admin" <?php echo ($wo['config']['stickers_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="stickers_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="stickers_request" id="stickers_request-all" onchange="SelectProModel('can_use_stickers',this)" value="all" <?php echo ($wo['config']['stickers_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="stickers_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="stickers_request" id="stickers_request-verified" onchange="SelectProModel('can_use_stickers',this)" value="verified" <?php echo ($wo['config']['stickers_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="stickers_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="stickers_request" id="stickers_request-pro" onchange="SelectProModel('can_use_stickers',this)" value="pro" <?php echo ($wo['config']['stickers_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="stickers_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permita que los usuarios envíen y publiquen pegatinas. Puede administrar, editar y agregar pegatinas desde <a href="<?php echo lui_LoadAdminLinkSettings('add-new-sticker'); ?>">Agregar nueva etiqueta</a>. </small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="stickers_system" value="0" />
                            <input type="checkbox" name="stickers_system" id="chck-stickers_system" value="1" <?php echo ($wo['config']['stickers_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('stickers_system')) ?>>
                            <label for="chck-stickers_system" class="check-trail <?php echo(EnableForMode('stickers_system',true)) ?>" <?php echo(EnableForMode('stickers_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="find_friends" class="main-label">Sistema de amigos cercanos</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta funcion?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="nearby_request" id="nearby_request-admin" onchange="SelectProModel('can_use_nearby',this)" value="admin" <?php echo ($wo['config']['nearby_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="nearby_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="nearby_request" id="nearby_request-all" onchange="SelectProModel('can_use_nearby',this)" value="all" <?php echo ($wo['config']['nearby_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="nearby_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="nearby_request" id="nearby_request-verified" onchange="SelectProModel('can_use_nearby',this)" value="verified" <?php echo ($wo['config']['nearby_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="nearby_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="nearby_request" id="nearby_request-pro" onchange="SelectProModel('can_use_nearby',this)" value="pro" <?php echo ($wo['config']['nearby_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="nearby_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Permitir a los usuarios buscar usuarios cercanos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="find_friends" value="0" />
                            <input type="checkbox" name="find_friends" id="chck-find_friends" value="1" <?php echo ($wo['config']['find_friends'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('find_friends')) ?>>
                            <label for="chck-find_friends" class="check-trail <?php echo(EnableForMode('find_friends',true)) ?>" <?php echo(EnableForMode('find_friends',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="gift_system" class="main-label">Sistema de GIFT</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="gift_request" id="gift_request-admin" onchange="SelectProModel('can_use_gift',this)" value="admin" <?php echo ($wo['config']['gift_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gift_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="gift_request" id="gift_request-all" onchange="SelectProModel('can_use_gift',this)" value="all" <?php echo ($wo['config']['gift_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gift_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="gift_request" id="gift_request-verified" onchange="SelectProModel('can_use_gift',this)" value="verified" <?php echo ($wo['config']['gift_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gift_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="gift_request" id="gift_request-pro" onchange="SelectProModel('can_use_gift',this)" value="pro" <?php echo ($wo['config']['gift_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="gift_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
							
                            <br><small class="admin-info">Permitir que los usuarios envíen GIFT. Puede administrar, agregar y editar GIFT de <a href="<?php echo lui_LoadAdminLinkSettings('add-new-gift'); ?>">Agregar nuevo Sticker</a>.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="gift_system" value="0" />
                            <input type="checkbox" name="gift_system" id="chck-gift_system" value="1" <?php echo ($wo['config']['gift_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('gift_system')) ?>>
                            <label for="chck-gift_system" class="check-trail <?php echo(EnableForMode('gift_system',true)) ?>" <?php echo(EnableForMode('gift_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="job_system" class="main-label">Sistema de trabajos</label>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="job_request" id="job_request-admin" onchange="SelectProModel('can_use_jobs',this)" value="admin" <?php echo ($wo['config']['job_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="job_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="job_request" id="job_request-all" onchange="SelectProModel('can_use_jobs',this)" value="all" <?php echo ($wo['config']['job_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="job_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="job_request" id="job_request-verified" onchange="SelectProModel('can_use_jobs',this)" value="verified" <?php echo ($wo['config']['job_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="job_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="job_request" id="job_request-pro" onchange="SelectProModel('can_use_jobs',this)" value="pro" <?php echo ($wo['config']['job_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="job_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>

                            <br><small class="admin-info">Permita que las paginas creen trabajos, los usuarios pueden postularse y ser contratados.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="job_system" value="0" />
                            <input type="checkbox" name="job_system" id="chck-job_system" value="1" <?php echo ($wo['config']['job_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('job_system')) ?>>
                            <label for="chck-job_system" class="check-trail <?php echo(EnableForMode('job_system',true)) ?>" <?php echo(EnableForMode('job_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="common_things" class="main-label">Página de cosas comunes</label>
                            <br><small class="admin-info">Permita que los usuarios encuentren cosas comunes entre ellos.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="common_things" value="0" />
                            <input type="checkbox" name="common_things" id="chck-common_things" value="1" <?php echo ($wo['config']['common_things'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('common_things')) ?>>
                            <label for="chck-common_things" class="check-trail <?php echo(EnableForMode('common_things',true)) ?>" <?php echo(EnableForMode('common_things',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="weather_widget" class="main-label">Widget del tiempo</label>
                            <br><small class="admin-info"><a href="https://openweathermap.org/">Regístrese en este sitio y use la clave</a></small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="weather_widget" value="0" />
                            <input type="checkbox" name="weather_widget" id="chck-weather_widget" value="1" <?php echo ($wo['config']['weather_widget'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('weather_widget')) ?>>
                            <label for="chck-weather_widget" class="check-trail <?php echo(EnableForMode('weather_widget',true)) ?>" <?php echo(EnableForMode('weather_widget',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Weather APP ID</label>
                                <input type="text" name="weather_key" class="form-control" value="<?php echo $wo['config']['weather_key']?>">
                                <small class="admin-info">Usar APP ID de openweathermap.org</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <!-- <label for="weather_widget">Weather Widget</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="weather_widget" id="weather_widget-enabled" value="1" <?php echo ($wo['config']['weather_widget'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('poke_system')) ?>>
                                <label  class="form-check-label" for="weather_widget-enabled">Enabled</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="weather_widget" id="weather_widget-disabled" value="0" <?php echo ($wo['config']['weather_widget'] == 0) ? 'checked': '';?> <?php echo(EnableForMode('poke_system')) ?>>
                                <label  class="form-check-label" for="weather_widget-disabled" class="m-l-20">Disabled</label>
                            </div>
                        </div> -->
                        <!-- <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Openweathermap Weather App Id</label>
                                <input type="text" id="weather_key" name="weather_key" class="form-control" value="<?php echo $wo['config']['weather_key']?>">
                            </div>
                        </div> -->
                        <!-- 
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Yahoo Weather Consumer Key</label>
                                <input type="text" id="yahoo_consumer_key" name="yahoo_consumer_key" class="form-control" value="<?php echo $wo['config']['yahoo_consumer_key']?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Yahoo Weather Consumer Secret</label>
                                <input type="text" id="yahoo_consumer_secret" name="yahoo_consumer_secret" class="form-control" value="<?php echo $wo['config']['yahoo_consumer_secret']?>">
                            </div>
                        </div> -->
                        
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5 col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de punto y nivel</h6>
                    <form class="site-settings2" method="POST">
                        <div class="float-left">
                            <label for="point_level_system" class="main-label">Sistema de puntos y niveles</label>
                            <br><small class="admin-info">Da la posibilidad a los usuarios de ganar puntos de <br> Me gusta, compartir, comentar y publicar.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="point_level_system" value="0" />
                            <input type="checkbox" name="point_level_system" id="chck-point_level_system" value="1" <?php echo ($wo['config']['point_level_system'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('point_level_system')) ?>>
                            <label for="chck-point_level_system" class="check-trail <?php echo(EnableForMode('point_level_system',true)) ?>" <?php echo(EnableForMode('point_level_system',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="point_allow_withdrawal" class="main-label">Retiro de puntos ganados</label>
                            <br><small class="admin-info">Permitir a los usuarios transferir puntos ganados <br> en dinero y retiro.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="point_allow_withdrawal" value="0" />
                            <input type="checkbox" name="point_allow_withdrawal" id="chck-point_allow_withdrawal" value="1" <?php echo ($wo['config']['point_allow_withdrawal'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('point_allow_withdrawal')) ?>>
                            <label for="chck-point_allow_withdrawal" class="check-trail <?php echo(EnableForMode('point_allow_withdrawal',true)) ?>" <?php echo(EnableForMode('point_allow_withdrawal',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">S/1.00 = ? Punto</label>
                                <input type="text" name="dollar_to_point_cost" class="form-control" value="<?php echo $wo['config']['dollar_to_point_cost']?>">
                                <small class="admin-info">¿A cuánto equivale 1 SOL en puntos?</small>
                            </div>
                        </div>
                        <hr>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Limite diario de usuario gratuito</label>
                                <input type="text" name="free_day_limit" class="form-control" value="<?php echo $wo['config']['free_day_limit']?>">
                                <small class="admin-info">¿Cuántos puntos puede ganar un usuario gratuito en un día?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Límite diario de usuarios PRO</label>
                                <input type="text" name="pro_day_limit" class="form-control" value="<?php echo $wo['config']['pro_day_limit']?>">
                                <small class="admin-info">¿Cuántos puntos puede ganar un usuario PRO en un día?</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Comentarios</label>
                                <input type="text" name="comments_point" class="form-control" value="<?php echo $wo['config']['comments_point']?>">
                                <small class="admin-info">¿Cuántos puntos gana un usuario al crear comentarios?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Gustos</label>
                                <input type="text" name="likes_point" class="form-control" value="<?php echo $wo['config']['likes_point']?>">
                                 <small class="admin-info">¿Cuántos puntos gana un usuario al darle me gusta a las publicaciones?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">No me gusta</label>
                                <input type="text" name="dislikes_point" class="form-control" value="<?php echo $wo['config']['dislikes_point']?>">
                                <small class="admin-info">¿Cuántos puntos gana un usuario por no gustar de las publicaciones?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Maravillas</label>
                                <input type="text" name="wonders_point" class="form-control" value="<?php echo $wo['config']['wonders_point']?>">
                                <small class="admin-info">¿Cuántos puntos gana un usuario preguntando publicaciones?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Reaccion</label>
                                <input type="text" name="reaction_point" class="form-control" value="<?php echo $wo['config']['reaction_point']?>">
                                <small class="admin-info">¿Cuántos puntos gana un usuario al reaccionar a las publicaciones?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Crear nueva publicación</label>
                                <input type="text" name="createpost_point" class="form-control" value="<?php echo $wo['config']['createpost_point']?>">
                                <small class="admin-info">¿Cuántos puntos gana un usuario al crear nuevas publicaciones?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Crear un blog</label>
                                <input type="text" name="createblog_point" class="form-control" value="<?php echo $wo['config']['createblog_point']?>">
                                <small class="admin-info">¿Cuántos puntos gana un usuario al crear nuevos articulos?</small>
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
});

</script>