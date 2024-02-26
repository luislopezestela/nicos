<?php
$total=0;
$base = Luis::basepage("base_page_admin");
$namepage =  Luis::dato("luis_nombre")->valor;
$metodopago=DatosAdmin::MostrarMetododepago();
if(isset($_SESSION["admin_id"])){
    $documentos=DatosAdmin::mostrardocumentos();
    ?>
    <section class="vista_preb_page">
        <ol class="box_visw">
            <li><a href="<?=$base;?>">Inicio</a></li>
            <li><a>Tienda</a></li>
            <li class="active">Lotes</li>
        </ol>
    </section>
    <?php
    if(isset($_GET["paginas"])){
        $urb = explode("/", $_GET["paginas"]);
        if(count($urb)>2){
            header('location:'.$base.'lotes');
        }else{
            if(isset($urb[1])){
                if(isset($urb[1])==$urb[1]){
                    $visualizar_lotes = DatosAdmin::visualizar_lotes_pagina($urb[1]);
                    if($urb[1]===$visualizar_lotes->num_documento){
                        $datos_del_lote=DatosAdmin::lotes_lista_por_lotes($visualizar_lotes->num_documento);
                        $elitemporid=DatosAdmin::porID_producto($visualizar_lotes->id_producto);
                        ?>
                        <div class="contenido">
                            <h3 class="titulo_paginas">LOTE <?=$urb[1];?>.</h3>
                            <a class="butt_back" href="<?=$base."lotes";?>">❮ atras</a>
                            <div class="funciones_en_ventas_continuados">
                                <?php if($elitemporid->tipo==1): ?>
                                    <?php $nobats=DatosAdmin::lotes_lista_sin_bateria($urb[1])->c; ?>
                                    <?php $nocargabater=DatosAdmin::lotes_lista_no_carga_bateria($urb[1])->c; ?>
                                    <?php $errorteclado=DatosAdmin::lotes_lista_error_teclado($urb[1])->c; ?>
                                    <?php $ac_cargador=DatosAdmin::lotes_lista_ac_adaptador($urb[1])->c; ?>

                                    <div class="boxt_details_items_lotes">
                                        <span>CON ERROR DE BATERIA <p><?=$nocargabater;?></p></span>
                                        <span>SIN BATERIA  <p><?=$nobats;?></p></span>
                                        <span>TECLADO MALO  <p><?=$errorteclado;?></p></span>
                                        <span>SIN CARGADOR  <p><?=$ac_cargador;?></p></span>
                                    </div>
                                <?php endif ?>
                                <div class="panel_tabla">
                                    <table class="table table_data_info_pages">
                                        <thead class="header_table_items_lists">
                                            <?php if($elitemporid->tipo==1): ?>
                                                <tr>
                                                    <th>RESERVAR</th>
                                                    <th>BARCODE</th>
                                                    <th>MARCA</th>
                                                    <th>MODELO</th>
                                                    <th>SERIES</th>
                                                    <th>CPU</th>
                                                    <th>RAM</th>
                                                    <th>DISCO</th>
                                                    <th>BATERIA</th>
                                                    <th>PRUEBA_BATERIA</th>
                                                </tr>
                                            <?php elseif($elitemporid->tipo==2): ?>
                                                <tr>
                                                    <th>RESERVAR</th>
                                                    <th>BARCODE</th>
                                                    <th>MARCA</th>
                                                    <th>MODELO</th>
                                                    <th>SERIES</th>
                                                    <th>FORM_FACTOR</th>
                                                    <th>CPU</th>
                                                    <th>RAM</th>
                                                    <th>DISCO</th>
                                                </tr>
                                            <?php elseif($elitemporid->tipo==3): ?>
                                                <tr>
                                                    <th>RESERVAR</th>
                                                    <th>BARCODE</th>
                                                    <th>MARCA</th>
                                                    <th>MODELO</th>
                                                    <th>SERIES</th>
                                                    <th>CPU</th>
                                                    <th>RAM</th>
                                                    <th>DISCO</th>
                                                </tr>
                                            <?php elseif($elitemporid->tipo==4): ?>
                                                <tr>
                                                    <th>RESERVAR</th>
                                                    <th>SERIES</th>
                                                    <th>CPU</th>
                                                    <th>CPU_SPEED</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody class="panel-body">
                                            <?php foreach($datos_del_lote as $nbs): ?>
                                                <?php if($elitemporid->tipo==1): ?>
                                                    <?php if($nbs->reserva==0):
                                                        $data_reserv_class = false;
                                                        $data_reserv = "RESERVAR";
                                                        $disabled_reserv = "reservar_items_users";?>
                                                    <?php else:
                                                        if($nbs->reserva==$_SESSION['admin_id']){
                                                            $data_reserv_class = "reservs";
                                                            $disabled_reserv = "reservar_items_users";
                                                        }else{
                                                            $data_reserv_class = "reservado_not";
                                                            $disabled_reserv = false;
                                                        }
                                                        $data_reserv = "RESERVADO";
                                                    endif ?>

                                                    <tr>
                                                        <td><span class="ver_venta_en_lista_detalles_s <?=$disabled_reserv;?> <?="reservar_items_users".$nbs->id;?> <?=$data_reserv_class;?>" data="<?=$nbs->id;?>"><?=$data_reserv;?></span></td>
                                                        <td><?=$nbs->barcode;?></td>
                                                        <td><?=$nbs->make;?></td>
                                                        <td><?=$nbs->model;?></td>
                                                        <td><?=$nbs->series;?></td>
                                                        <td><?=$nbs->cpu;?></td>
                                                        <td><?=$nbs->ram;?></td>
                                                        <td><?=$nbs->hard_drive;?></td>
                                                        <td><?=$nbs->battery;?></td>
                                                        <td><?=$nbs->battery_test;?></td>
                                                    </tr>

                                                <?php elseif($elitemporid->tipo==2): ?>
                                                    <?php if($nbs->reserva==0):
                                                        $data_reserv_class = false;
                                                        $data_reserv = "RESERVAR";
                                                        $disabled_reserv = "reservar_items_users";?>
                                                    <?php else:
                                                        if($nbs->reserva==$_SESSION['admin_id']){
                                                            $data_reserv_class = "reservs";
                                                            $disabled_reserv = "reservar_items_users";
                                                        }else{
                                                            $data_reserv_class = "reservado_not";
                                                            $disabled_reserv = false;
                                                        }
                                                        $data_reserv = "RESERVADO";
                                                    endif ?>

                                                    <tr>
                                                        <td><span class="ver_venta_en_lista_detalles_s <?=$disabled_reserv;?> <?="reservar_items_users".$nbs->id;?> <?=$data_reserv_class;?>" data="<?=$nbs->id;?>"><?=$data_reserv;?></span></td>
                                                        <td><?=$nbs->barcode;?></td>
                                                        <td><?=$nbs->make;?></td>
                                                        <td><?=$nbs->model;?></td>
                                                        <td><?=$nbs->series;?></td>
                                                        <td><?=$nbs->form_factor;?></td>
                                                        <td><?=$nbs->cpu;?></td>
                                                        <td><?=$nbs->ram;?></td>
                                                        <td><?=$nbs->hard_drive;?></td>
                                                    </tr>
                                                <?php elseif($elitemporid->tipo==3): ?>
                                                    <?php if($nbs->reserva==0):
                                                        $data_reserv_class = false;
                                                        $data_reserv = "RESERVAR";
                                                        $disabled_reserv = "reservar_items_users";?>
                                                    <?php else:
                                                        if($nbs->reserva==$_SESSION['admin_id']){
                                                            $data_reserv_class = "reservs";
                                                            $disabled_reserv = "reservar_items_users";
                                                        }else{
                                                            $data_reserv_class = "reservado_not";
                                                            $disabled_reserv = false;
                                                        }
                                                        $data_reserv = "RESERVADO";
                                                    endif ?>

                                                    <tr>
                                                        <td><span class="ver_venta_en_lista_detalles_s <?=$disabled_reserv;?> <?="reservar_items_users".$nbs->id;?> <?=$data_reserv_class;?>" data="<?=$nbs->id;?>"><?=$data_reserv;?></span></td>
                                                        <td><?=$nbs->barcode;?></td>
                                                        <td><?=$nbs->make;?></td>
                                                        <td><?=$nbs->model;?></td>
                                                        <td><?=$nbs->series;?></td>
                                                        <td><?=$nbs->cpu;?></td>
                                                        <td><?=$nbs->ram;?></td>
                                                        <td><?=$nbs->hard_drive;?></td>
                                                    </tr>
                                                <?php elseif($elitemporid->tipo==4): ?>
                                                    <?php if($nbs->reserva==0):
                                                        $data_reserv_class = false;
                                                        $data_reserv = "RESERVAR";
                                                        $disabled_reserv = "reservar_items_users";?>
                                                    <?php else:
                                                        if($nbs->reserva==$_SESSION['admin_id']){
                                                            $data_reserv_class = "reservs";
                                                            $disabled_reserv = "reservar_items_users";
                                                        }else{
                                                            $data_reserv_class = "reservado_not";
                                                            $disabled_reserv = false;
                                                        }
                                                        
                                                        $data_reserv = "RESERVADO";
                                                    endif ?>

                                                    <tr>
                                                        <td><span class="ver_venta_en_lista_detalles_s <?=$disabled_reserv;?> <?="reservar_items_users".$nbs->id;?> <?=$data_reserv_class;?>" data="<?=$nbs->id;?>"><?=$data_reserv;?></span></td>
                                                        <td><?=$nbs->barcode;?></td>
                                                        <td><?=$nbs->cpu;?></td>
                                                        <td><?=$nbs->cpu_speed;?></td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    }else{
                        header('location:'.$base.'lotes');
                    }
                }else{
                    header('location:'.$base.'lotes');
                }
            }else{
                $ventas_finalizadas = DatosAdmin::Mostrar_ventas_finalizados($_SESSION['admin_id']);
                ?>
                <div class="contenido">
                    <h3 class="titulo_paginas">LOTES.</h3>
                    <?php $datalotes = DatosAdmin::lotes_lista();?>
                    <div class="funciones_en_ventas_continuados">
                        <div class="panel_tabla">
                            <table class="table table_data_info_pages">
                                <thead class="header_table_items_lists">
                                    <tr>
                                        <th></th>
                                        <th>ITEMS RESTANTES</th>
                                        <th>ITEMS TOTAL</th>
                                        <th>RESERVADOS</th>
                                        <th>VENDIDOS</th>
                                        <th>NUMERO LOTE</th>
                                        <th>FECHA</th>
                                        <th>PROVEEDOR</th>
                                    </tr>
                                </thead>
                                <tbody class="panel-body">
                                    <?php foreach($datalotes as $erd): ?>
                                        <?php $cantidad=DatosAdmin::lotes_lista_contar($erd->num_documento);?>
                                        <?php $cantidad_rest=DatosAdmin::lotes_lista_contar_rest($erd->num_documento);?>
                                        <?php $cantidad_reservado=DatosAdmin::cantidad_reservado($erd->num_documento);?>
                                        <?php $cantidad_vendidos=DatosAdmin::cantidad_vendidos_lote($erd->num_documento);?>
                                        <?php if($erd->num_documento==$erd->num_documento): ?>
                                            <?php $proveed=DatosAdmin::poridproveedor($erd->proveedor);?>
                                            <tr>
                                                <td><span class="ver_venta_en_lista_detalles_s ver_lotes_en_lista_detalles" data="<?=$erd->num_documento;?>">Visualizar</span></td>
                                                <td><?=$cantidad_rest->c; ?></td>
                                                <td><?=$cantidad->c; ?></td>
                                                <td><?=$cantidad_reservado->c; ?></td>
                                                <td><?=$cantidad_vendidos->c; ?></td>
                                                <td><?=$erd->num_documento; ?></td>
                                                <td><?=date("Y-m-d", strtotime($erd->fecha)); ?></td>
                                                <td><?=$proveed->nombre; ?></td>
                                            </tr>
                                        <?php else: ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php }
        }
    }else{
        header('location:'.$base);
    }
}else{
    header('location:'.$base.'acceder');
}
?>
