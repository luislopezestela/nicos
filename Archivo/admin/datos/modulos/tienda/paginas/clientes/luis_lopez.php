
<?php
$clientes_list = DatosAdmin::MostrarClientes($_SESSION['admin_id']);
$base = Luis::basepage("base_page_admin");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
?>

<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>">Inicio</a></li>
    <?php if($urbp==="add"): ?>
    <li><a>Tiendas</a></li>
    <li class="active">Add</li>
    <?php elseif($urbp==="update"): ?>
    <li><a>Tiendas</a></li>
    <li><a href="<?=$base."clientes";?>">Clientes</a></li>
    <li class="active">Update</li>
    <?php elseif($urbp==="userview"): ?>
    <li><a>Tiendas</a></li>
    <li><a href="<?=$base."clientes";?>">Clientes</a></li>
    <li class="active"><?=DatosAdmin::por_el_id_cliente($urb[2])->nombre;?></li>
    <?php else: ?>
    <li><a>Tiendas</a></li>
    <li class="active">Clientes</li>
    <?php endif ?>
  </ol>
</section>
<style type="text/css">
.selectboxs{display:block;}
.selectlist{display:inline-block;width:100%;max-width:150px;cursor:pointer;}
.selectlistcontent{cursor:pointer;text-align:center;border-radius:3px;box-shadow:0 2px 4px 0 rgba(219, 215, 215, 0);border:solid 2px transparent;background:#fff;max-width:150px;height:150px;padding:15px;display:grid;grid-gap:15px;place-content:center;transition:.3s ease-in-out all;}
.selectlistcontent img{width:100px;margin:0 auto;cursor:pointer;}
.selectlistcontent h4{font-size:16px;letter-spacing:-0.24px;text-align:center;color:#1f2949;}
.selectlistcontent h5{font-size:14px;line-height:1.4;text-align:center;color:#686d73;}
.selected-label{position:relative;}
.selected-label input{display:none;}
.selected-label .icon{width:20px;height:20px;border:solid 2px #e3e3e3;border-radius:50%;position:absolute;top:15px;left:15px;transition:.3s ease-in-out all;transform:scale(1);z-index:1;}
.selected-label input:checked + .icon{background:#3057d5;border-color:#3057d5;transform:scale(1.2);}
.selected-label input:checked ~ .selectlistcontent{box-shadow:0 2px 4px 0 rgba(219,215,215,0.5);border:solid 2px #3057d5;}
.none_sucursales{display:none;visibility:hidden;}
.view_sucursales{display:block;visibility:visible;}
</style>
<?php if(count($urb)>3): header('location:'.$base.'clientes');?>
  <?php else: ?>
<?php if(isset($urb[1])): ?>

<?php if($urb[1]==="add"): ?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas">Nuevo cliente</h4>
    <div class="message"></div>
    <a class="butt_back" href="<?=$base."clientes/";?>">❮ atras</a>

    <div class="selectboxs">
      <?php $tiposdecliente=DatosAdmin::tiposdeclientes();?>
      <?php foreach ($tiposdecliente as $tcs): ?>
        <div class="selectlist">
        <label for="selecteditem<?=$tcs->id;?>" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem<?=$tcs->id;?>" value="<?=$tcs->id;?>">
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/".$tcs->icono;?>" alt="">
            <h4><?=$tcs->nombre;?></h4>
          </div>
        </label>
      </div>
      <?php endforeach ?>
      
    </div>
 
    <input id="dni" class="input_luis_two" type="text" placeholder="DNI" autocomplete="off">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombre" autocomplete="off">
    <input id="apellido_p" class="input_luis_two" type="text" placeholder="Apellido paterno" autocomplete="off">
    <input id="apellido_m" class="input_luis_two" type="text" placeholder="Apellido materno" autocomplete="off">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off">
    <input id="correo" class="input_luis_two" type="text" placeholder="Correo" autocomplete="off">
    <input id="pass" class="input_luis_two" type="password" placeholder="Contrase&ntilde;a">
    <hr>
    <div class="butt_luis_one new_client_in_page"><span class="add_modal">Agregar</span></div>
  </div>
<?php elseif($urb[1]==="update"):
  $user=DatosAdmin::por_el_id_cliente($urb[2]);
?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas">Actualizar Usuario</h4>
    <div class="message"></div>
    <a class="butt_back" href="<?=$base."clientes/";?>">❮ atras</a>
    <div class="selectboxs">
      <?php $tiposdecliente=DatosAdmin::tiposdeclientes();?>
      <?php foreach ($tiposdecliente as $tcs): ?>
        <?php if($user->tipo==$tcs->id){$active_user_type="checked";}else{$active_user_type=false;} ?>
        <div class="selectlist">
        <label for="selecteditem<?=$tcs->id;?>" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem<?=$tcs->id;?>" value="<?=$tcs->id;?>" <?=$active_user_type;?>>
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/".$tcs->icono;?>" alt="">
            <h4><?=$tcs->nombre;?></h4>
          </div>
        </label>
      </div>
      <?php endforeach ?>
    </div>
    
    <input id="dni" class="input_luis_two" type="text" placeholder="DNI" autocomplete="off" value="<?=$user->dni;?>">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombre" autocomplete="off" value="<?=html_entity_decode($user->nombre);?>">
    <input id="apellido_p" class="input_luis_two" type="text" placeholder="Apellido paterno" autocomplete="off" value="<?=html_entity_decode($user->apellido_paterno);?>">
    <input id="apellido_m" class="input_luis_two" type="text" placeholder="Apellido materno" autocomplete="off" value="<?=html_entity_decode($user->apellido_materno);?>">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off" value="<?=$user->celular;?>">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off" value="<?=html_entity_decode($user->direccion);?>">
    <input id="correo" class="input_luis_two" type="text" placeholder="Correo" autocomplete="off" value="<?=$user->correo;?>">
    <input id="pass" class="input_luis_two" type="password" placeholder="Contrase&ntilde;a">
    <p class="text-advertencia">Al dejar este campo en blanco no se modificara la contraseña actual.</p>
    <hr>
    <div class="butt_luis_one update_client_in_pages" data_conf="<?=$user->id?>"><span>Actualizar cliente</span></div>
  </div>
  <?php elseif($urb[1]==="userview"): $user=DatosAdmin::por_el_id_cliente($urb[2]);?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas"><?=html_entity_decode($user->nombreCompleto());?></h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."clientes/";?>">❮ atras</a>
    
    <div class="selectboxs">
      <?php $tcs=DatosAdmin::tiposdeclientes_por_id($user->tipo);?>
        <div class="selectlist">
        <label for="selecteditem<?=$tcs->id;?>" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem<?=$tcs->id;?>" value="<?=$tcs->id;?>" checked>
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/".$tcs->icono;?>" alt="">
            <h4><?=$tcs->nombre;?></h4>
          </div>
        </label>
      </div>
    </div>
    <div class="viewuserlist">
      <div class="itemlist"><label>DNI:</label><?=$user->dni;?></div>
      <div class="itemlist"><label>NOMBRES:</label><?=html_entity_decode($user->nombreCompleto());?></div>
      <div class="itemlist"><label>CONTACTO:</label><?=$user->celular;?></div>
      <div class="itemlist"><label>DIRECCION:</label><?=html_entity_decode($user->direccion);?></div>
      <div class="itemlist"><label>CORREO:</label><?=$user->correo;?></div>
    </div>
    <hr>
    <div class="butt_luis_one"><a href="<?=$base."clientes/update/".$user->id;?>"><span>Actualizar datos</span></a></div>
  </div>

  <style type="text/css">
    .viewuserlist{padding:4px;border:2px solid #888;margin:10px 0;box-sizing:border-box;display:block;}
    .itemlist{padding:5px;border-bottom:2px solid #ddd;display:block;box-sizing:border-box;}
    .itemlist label{width:120px;display:inline-block;background:#ddd;padding:5px;margin-right:10px;box-sizing:border-box;}
    @media screen and (max-width: 200px){
      .viewuserlist{width:100%;}
      .itemlist{display:block;margin:auto;width:100%;padding:5px 0;word-wrap:break-word;}
    }
  </style>
  <?php else: header('location:'.$base.'clientes');?>
 <?php endif ?>
<?php else: ?>
  <h4 class="titulo_paginas">Clientes</h4>
  <div class="message"></div>
  <a class="add_itembox" href="<?=$base."clientes/add"?>">
    <div class="butt_luis_one"><span>Agregar</span></div>
  </a>
  <hr>
  <div class="contentlists_items">
    
    <?php if(count($clientes_list)): ?>
      <?php foreach ($clientes_list as $user): ?>
        <div id="<?="userdels".$user->id;?>" class="itemsviewslist <?="removed_indrics".$user->id;?>">
          <div class="viewimgl minwiimgstwo width50 height50">
            <?php if($user->foto): ?>
              <img src="<?=$base."datos/imagenes/clientes/".$user->id."/".$user->foto;?>">
            <?php else: ?>
              <img src="<?=$base."datos/imagenes/icons/users.png";?>">
            <?php endif ?>
          </div>
          <div class="contensviewsitstr">
            <h4 class="nameshiff">
            <?php if($user->dni): ?>
               <?=$user->dni;?>
             <?php elseif($user->ruc): ?>
               <?=$user->ruc; ?>
             <?php endif ?> 
            </h4>
            <span class="nameshiffs"><?php if(!$user->nombre==null){echo($user->nombreCompleto());}else{echo('-');}?></span>
            <div class="namesdeskp"><?php if(!$user->correo==null){ echo(html_entity_decode($user->correo)); }else{ echo '-';}?></div>
          </div>
          <div class="opcionesblocklist opcionesblocklist1000boxlist">
            <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
              <span class="opcionesblocklistoption opcionesblocklistoption100">
                <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
              </span>
            </a>
            <div class="boxoptionslistlines">
              <div class="makposdind"></div>
              <a href="<?=$base."clientes/userview/".$user->id;?>"><div class="boxoptionslistitems">Ver usuario</div></a>
              <a href="<?=$base."clientes/update/".$user->id;?>"><div class="boxoptionslistitems">Editar usuario</div></a>
              <?php if(isset($user->codigo)):?>
                <?php if($user->esta_activado):?>
                  <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Desactivar</div></a>
                <?php else:?>
                  <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Activar</div></a>
                <?php endif;?>
              <?php endif;?>
              <div class="boxoptionslistitems delete_client_in_pages" data-config="<?=$user->id?>">Eliminar</div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else: ?>
      <div class="noitemsnull"><h3>No hay clientes</h3></div>
    <?php endif ?>
  </div>
<?php endif ?>
<?php endif ?>