<div class="container-fluid">
    <div>
        <h3>Hola, <?php echo $wo['user']['name'];?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a><?=$wo['lang']['home'];?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?=$wo['lang']['dashboard'];?></li>
            </ol>
        </nav>
    </div>
    <!-- Accesorios -->
    <?php $getStatus = getStatus(); if (!empty($getStatus) && !empty(checkIfThereIsError($getStatus))) {?><div class="alert alert-danger"><strong><?=$wo['lang']['important'];?></strong> Se han encontrado algunos errores en su sistema, por favor revise <a href="<?php echo lui_LoadAdminLinkSettings('system_status'); ?>" data-ajax="?path=system_status">Estado del sistema</a>.</div><?php }?>
    <div class="contenedor_de_acciones">
        
    </div>

  <!--  <div class="row clearfix">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Usuarios</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                    <i class="material-icons">person</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('user')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Publicaciones</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-info-bright text-info rounded-pill">
                                    <i class="material-icons">border_color</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('posts')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Compras</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                    <i class="material-icons">receipt</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('page')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ventas</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-secondary-bright text-secondary rounded-pill">
                                    <i class="material-icons">barcode_reader</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('group')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">En linea</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-success-bright text-success rounded-pill">
                                    <i class="material-icons">person</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountOnlineData()); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Comentarios</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                    <i class="material-icons">messenger</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('comments')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Deuda</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-info-bright text-info rounded-pill">
                                    <i class="material-icons">videogame_asset</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('games')); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Mensajes</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                    <i class="material-icons">messenger</i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo number_format(lui_CountAllData('messages')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</div>