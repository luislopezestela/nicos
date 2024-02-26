
<?php
$usuarios = DatosUsuario::Mostrar();
$base = Luis::basepage("base_page_admin");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
?>

<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>">Inicio</a></li>
    <?php if($urbp==="add"): ?>
    <li><a href="<?=$base."usuarios";?>">Tiendas</a></li>
    <li class="active">Add</li>
    <?php elseif($urbp==="update"): ?>
    <li><a href="<?=$base."usuarios";?>">Usuarios</a></li>
    <li class="active">Update</li>
    <?php elseif($urbp==="userview"): ?>
    <li><a href="<?=$base."usuarios";?>">Usuarios</a></li>
    <li class="active"><?=DatosUsuario::poriUsuario($urb[2])->nombre;?></li>
    <?php else: ?>
    <li class="active">Usuarios</li>
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
<?php if(count($urb)>3): header('location:'.$base.'usuarios');?>
  <?php else: ?>
<?php if(isset($urb[1])): ?>

<?php if($urb[1]==="add"): ?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas">Nuevo Usuario</h4>
    <div class="message"></div>
    <a class="butt_back" href="<?=$base."usuarios/";?>">❮ atras</a>

    <div class="selectboxs">
      <div class="selectlist">
        <label for="selecteditem1" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem1" value="1">
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/admins.png";?>" alt="">
            <h4>Administrador.</h4>
          </div>
        </label>
      </div>

      <div class="selectlist">
        <label for="selecteditem2" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem2" value="2">
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/vendedor.png";?>" alt="">
            <h4>Vendedor.</h4>
          </div>
        </label>
      </div>
    </div>
    <div class="sucursal_types sucursal_type_users none_sucursales">
      <select class="input_luis_two" id="sucursal_selected_users" name="sucursal">
      <?php $sucursales=DatosAdmin::Mostrar_sucursales(); ?>
      <option id="sucursal_selected_users_option" value="selected">Seleccionar sucursal</option>
      <?php foreach ($sucursales as $k): ?>
        <option value="<?=$k->id;?>"><?=html_entity_decode($k->nombre);?></option>
      <?php endforeach ?>
    </select>
    </div>
    <input id="dni" class="input_luis_two" type="text" placeholder="DNI" autocomplete="off">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombre" autocomplete="off">
    <input id="apellido" class="input_luis_two" type="text" placeholder="Apellido" autocomplete="off">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off">
    <input id="correo" class="input_luis_two" type="text" placeholder="Correo" autocomplete="off">
    <input id="pass" class="input_luis_two" type="password" placeholder="Contrase&ntilde;a">
    <hr>
    <div class="butt_luis_one nuevousuarios"><span class="add_modal" id="btn-modal">Agregar</span></div>
  </div>
<?php elseif($urb[1]==="update"):
  $user=DatosUsuario::poriUsuario($urb[2]);
  $act1=false;
  $act2=false;
  $act3=false;
  if($user->funcion==1){
    $act1='checked';
  }elseif($user->funcion==2){
    $act2='checked';
  }elseif($user->funcion==3){
    $act3='checked';
  }
?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas">Actualizar Usuario</h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."usuarios/";?>">❮ atras</a>
    <div class="selectboxs">
      <div class="selectlist">
        <label for="selecteditem1" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem1" value="1" <?=$act1;?>>
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/admins.png";?>" alt="">
            <h4>Administrador.</h4>
          </div>
        </label>
      </div>

      <div class="selectlist">
        <label for="selecteditem2" class="selected-label">
          <input type="radio" name="optionlog" id="selecteditem2" value="2" <?=$act2;?>>
          <span class="icon"></span>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/vendedor.png";?>" alt="">
            <h4>Vendedor.</h4>
          </div>
        </label>
      </div>
    </div>
    <?php if($user->funcion==2){$activeusersliv="view_sucursales";}else{$activeusersliv="none_sucursales";} ?>
    <div class="sucursal_types sucursal_type_users <?=$activeusersliv;?>">
      <select class="input_luis_two" id="sucursal_selected_users" name="sucursal">
      <?php $sucursales=DatosAdmin::Mostrar_sucursales(); ?>
      <option id="sucursal_selected_users_option" value="selected">Seleccionar sucursal</option>
      <?php foreach ($sucursales as $k): ?>
        <?php if($k->id==$user->sucursal){$sucursalactive="selected";}else{$sucursalactive=false;} ?>
        <option <?=$sucursalactive;?> value="<?=$k->id;?>"><?=html_entity_decode($k->nombre);?></option>
      <?php endforeach ?>
    </select>
    </div>

    <input id="dni" class="input_luis_two" type="text" placeholder="DNI" autocomplete="off" value="<?=$user->dni;?>">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombre" autocomplete="off" value="<?=html_entity_decode($user->nombre);?>">
    <input id="apellido" class="input_luis_two" type="text" placeholder="Apellido" autocomplete="off" value="<?=html_entity_decode($user->apellido);?>">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off" value="<?=$user->celular;?>">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off" value="<?=html_entity_decode($user->direccion);?>">
    <input id="correo" class="input_luis_two" type="text" placeholder="Correo" autocomplete="off" value="<?=$user->correo;?>">
    <input id="pass" class="input_luis_two" type="password" placeholder="Contrase&ntilde;a">
    <p class="text-advertencia">Al dejar este campo en blanco no se modificara la contraseña actual.</p>
    <hr>
    <input id="id" type="hidden" name="id" value="<?=$user->id?>">
    <div class="butt_luis_one acctualizarusuario"><span>Actualizar usuario</span></div>
  </div>
  <?php elseif($urb[1]==="userview"): $user=DatosUsuario::poriUsuario($urb[2]);?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas"><?=html_entity_decode($user->nombreCompleto());?></h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."usuarios/";?>">❮ atras</a>
    
    <div class="selectboxs">
      <?php if($user->funcion==="1"): ?>
      <div class="selectlist">
        <label class="selected-label">
          <input type="radio" checked>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/admins.png";?>" alt="">
            <h4>Administrador.</h4>
          </div>
        </label>
      </div>
      <?php elseif($user->funcion==="2"): ?>
      <div class="selectlist">
        <label class="selected-label">
          <input type="radio" checked>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/vendedor.png";?>" alt="">
            <h4>Vendedor.</h4>
          </div>
        </label>
      </div>
    <?php elseif($user->funcion==="3"): ?>
      <div class="selectlist">
        <label class="selected-label">
          <input type="radio" checked>
          <div class="selectlistcontent">
            <img src="<?=$base."datos/imagenes/icons/entrega.png";?>" alt="">
            <h4>Repartidor.</h4>
          </div>
        </label>
      </div>
    <?php endif ?>
    </div>
    <div class="viewuserlist">
      <div class="itemlist"><label>DNI:</label><?=$user->dni;?></div>
      <div class="itemlist"><label>NOMBRES:</label><?=html_entity_decode($user->nombreCompleto());?></div>
      <div class="itemlist"><label>CONTACTO:</label><?=$user->celular;?></div>
      <div class="itemlist"><label>DIRECCION:</label><?=html_entity_decode($user->direccion);?></div>
      <div class="itemlist"><label>CORREO:</label><?=$user->correo;?></div>
    </div>
    <hr>
    <div class="butt_luis_one"><a href="<?=$base."usuarios/update/".$user->id;?>"><span>Actualizar datos</span></a></div>
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
  <?php else: header('location:'.$base.'usuarios');?>
 <?php endif ?>
<?php else: ?>
  <h4 class="titulo_paginas">Usuarios</h4>
  <div class="message"></div>
  <a class="add_itembox" href="<?=$base."usuarios/add"?>">
    <div class="butt_luis_one"><span>Agregar</span></div>
  </a>
  <hr>
  <div class="contentlists_items">
    <?php if(count($usuarios)): ?>
      <?php foreach ($usuarios as $user): ?>
        <div id="<?="userdels".$user->id;?>" class="itemsviewslist">
          <div class="viewimgl minwiimgstwo width50 height50">
            <?php if($user->foto_perfil): ?>
              <img src="<?=$base."datos/imagenes/usuarios/".$user->id."/".$user->foto_perfil;?>">
            <?php else: ?>
              <img src="<?=$base."datos/imagenes/icons/users.png";?>">
            <?php endif ?>
          </div>
          <div class="contensviewsitstr">
            <h4 class="nameshiff">
              <?php
              if($user->funcion==1){
                echo("Administrador");
              }elseif($user->funcion==2){
                echo('Vendedor');
              }elseif($user->funcion==3){
                echo("Repartidor");
              }?>  
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
              <a href="<?=$base."usuarios/userview/".$user->id;?>"><div class="boxoptionslistitems">Ver usuario</div></a>
              <a href="<?=$base."usuarios/update/".$user->id;?>"><div class="boxoptionslistitems">Editar usuario</div></a>
              <?php if(isset($user->codigo)):?>
                <?php if($user->esta_activado):?>
                  <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Desactivar</div></a>
                <?php else:?>
                  <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Activar</div></a>
                <?php endif;?>
              <?php endif;?>
              <div class="boxoptionslistitems usuario_eliminar" id="<?=$user->id?>" data_rt="<?=$base;?>" data-config="<?=$user->id?>">Eliminar</div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else: ?>
      <div class="noitemsnull"><h3>No hay usuarios</h3></div>
    <?php endif ?>
  </div>
<?php endif ?>
<?php endif ?>