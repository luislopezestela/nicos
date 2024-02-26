
<?php
$lista_de_gastos = DatosAdmin::ver_todos_los_gastos_caja_actual();
$base = Luis::basepage("base_page_admin");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}

$usuario_iniciado = DatosUsuario::porId($_SESSION['admin_id']);
$caja_por_sucuarsal = DatosAdmin::Mostrar_las_cajas($usuario_iniciado->sucursal);
?>
<?php if(count($caja_por_sucuarsal)>0):?>
  <section class="vista_preb_page">
    <ol class="box_visw">
      <li><a href="<?=$base;?>">Inicio</a></li>
      <?php if($urbp==="view"): ?>
      <li><a href="<?=$base."gastos";?>">Gastos</a></li>
      <li class="active"><?=DatosAdmin::poridproveedor($urb[2])->nombre;?></li>
      <?php else: ?>
      <li class="active">Gastos</li>
      <?php endif ?>
    </ol>
  </section>

  <?php if(count($urb)>3): header('location:'.$base.'gastos');?>
  <?php else: ?>
    <?php if(isset($urb[1])): ?>
      <?php if($urb[1]==="view"): $user=DatosAdmin::poridproveedor($urb[2]);?>
        
      <?php else: header('location:'.$base.'gastos');?>
      <?php endif ?>
    <?php else: ?>
      <?php $cantidad_cajas = DatosAdmin::cantidad_de_cajas($usuario_iniciado->sucursal)->c;?>
      <div class="contiene_lineas_montos">
        <label class="titulo_paginas">CAJA #<?=$cantidad_cajas;?></label>
      </div>
      <div class="message"></div>
      <hr>
      <div class="contentlists_items">
        <?php if(count($lista_de_gastos)): ?>
          <?php foreach ($lista_de_gastos as $user): ?>
            <div id="<?="provedorsdels".$user->id;?>" class="itemsviewslist">
              <div class="contensviewsitstr">
                <h4 class="nameshiff">
                  <?php if(!$user->nombre==null){echo($user->nombre);}else{echo('-');}?>
                </h4>
                <span class="nameshiffs"><span>RUC: </span> <?=$user->ruc;?></span>
                <div class="namesdeskp"><span>Celular:  </span> <?=$user->celular;?></div>
                <div class="namesdeskp"><span>Direccion:  </span> <?=$user->direccion;?></div>
              </div>
              <div class="opcionesblocklist opcionesblocklist1000boxlist">
                <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                  <span class="opcionesblocklistoption opcionesblocklistoption100">
                    <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                  </span>
                </a>
                <div class="boxoptionslistlines">
                  <div class="makposdind"></div>
                  <a href="<?=$base."gastos/view/".$user->id;?>"><div class="boxoptionslistitems">Ver proveedor</div></a>
                  <a href="<?=$base."gastos/update/".$user->id;?>"><div class="boxoptionslistitems">Editar proveedor</div></a>
                  <?php if(isset($user->codigo)):?>
                    <?php if($user->esta_activado):?>
                      <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Desactivar</div></a>
                    <?php else:?>
                      <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Activar</div></a>
                    <?php endif;?>
                  <?php endif;?>
                  <div class="boxoptionslistitems proveedor_eliminar" id="<?=$user->id?>" data_rt="<?=$base;?>" data-config="<?=$user->id?>">Eliminar</div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        <?php else: ?>
          <div class="noitemsnull"><h3>No hay gastos</h3></div>
        <?php endif ?>
      </div>
    <?php endif ?>
  <?php endif ?>
<?php else: ?>
  <br>
  <h4 class="titulo_paginas">No tiene una caja disponible en estos momentos. <p>Crea una caja para continuar</p></h4>
  <div class="contiene_lineas_montos">
    <label class="titulo_paginas">Monto inicial</label>
    <div class="sub_lineas_montos">
      <?php $monedas = DatosAdmin::Mostrar_las_monedas(); ?>
      <select class="monto_init_select_sty monto_init_input_simbolo">
        <?php foreach($monedas as $m): ?>
          <option value="<?=$m->id;?>"><?=$m->nombre; ?></option>
        <?php endforeach ?>
      </select>
      <input class="monto_init_input_sty monto_init_input_monto" type="search" placeholder="Monto en caja." value="0">
    </div>
    
    
  </div>

    <div class="butt_luis_one acctions_new_box_order"><span>Crear caja</span></div>
<?php endif ?>

