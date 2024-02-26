
<?php
$usuarios = DatosAdmin::mostar_proveedores();
$base = Luis::basepage("base_page_admin");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
?>

<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>"><?=Luis::lang("inicio");?></a></li>
    <?php if($urbp==="add"): ?>
    <li><a href="<?=$base."proveedores";?>"><?=Luis::lang("tienda");?></a></li>
    <li class="active"><?=Luis::lang("agregar");?></li>
    <?php elseif($urbp==="update"): ?>
    <li><a href="<?=$base."proveedores";?>"><?=Luis::lang("proveedores");?></a></li>
    <li class="active"><?=Luis::lang("editar");?></li>
    <?php elseif($urbp==="userview"): ?>
    <li><a href="<?=$base."proveedores";?>"><?=Luis::lang("proveedores");?></a></li>
    <li class="active"><?=DatosAdmin::poridproveedor($urb[2])->nombre;?></li>
    <?php else: ?>
    <li class="active"><?=Luis::lang("proveedores");?></li>
    <?php endif ?>
  </ol>
</section>
<?php if(count($urb)>3): header('location:'.$base.'usuarios');?>
  <?php else: ?>
<?php if(isset($urb[1])): ?>

<?php if($urb[1]==="add"): ?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas"><?=Luis::lang("nuevo");?></h4>
    <div class="message"></div>
    <a class="butt_back" href="<?=$base."proveedores/";?>">❮ <?=Luis::lang("atras");?></a>
    <div class="boxinputlists">
      <input id="ruc" required="required" class="inptexboslistspublic" type="text" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("ruc");?></label>
    </div>
    <div class="direcdatlabel"></div>
 
    <div class="boxinputlists direcdat direcnone">
      <input id="nombre" required="required" class="inptexboslistspublic" type="text" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
    </div>
    

    <div class="boxinputlists direcdat direcnone">
      <input id="celular" required="required" class="inptexboslistspublic" type="text" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("contacto");?></label>
    </div>

    <div class="boxinputlists direcdat direcnone">
      <input id="direccion" required="required" class="inptexboslistspublic" type="text" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("direccion");?></label>
    </div>
    <hr>
    <div class="butt_luis_one agregarproveedor"><span class="add_modal" id="btn-modal"><?=Luis::lang("agregar");?></span></div>
  </div>
<?php elseif($urb[1]==="update"):
  $proveedors=DatosAdmin::poridproveedor($urb[2]);
?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas"><?=Luis::lang("actualizar");?></h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."proveedores/";?>">❮ <?=Luis::lang("atras");?></a>
    <input id="ruc" class="input_luis_two" type="text" placeholder="RUC" autocomplete="off" value="<?=$proveedors->ruc;?>">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombre" autocomplete="off" value="<?=html_entity_decode($proveedors->nombre);?>">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off" value="<?=$proveedors->celular;?>">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off" value="<?=html_entity_decode($proveedors->direccion);?>">
    <hr>
    <input id="id" type="hidden" name="id" value="<?=$proveedors->id?>">
    <div class="butt_luis_one acctualizarproveedor"><span><?=Luis::lang("actualizar");?></span></div>
  </div>
  <?php elseif($urb[1]==="userview"): $user=DatosAdmin::poridproveedor($urb[2]);?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas"><?=html_entity_decode($user->nombre);?></h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."proveedores/";?>">❮ <?=Luis::lang("atras");?></a>
    <div class="viewuserlist">
      <div class="itemlist"><label>RUC:</label><?=$user->ruc;?></div>
      <div class="itemlist"><label>NOMBRES:</label><?=html_entity_decode($user->nombre);?></div>
      <div class="itemlist"><label>CONTACTO:</label><?=$user->celular;?></div>
      <div class="itemlist"><label>DIRECCION:</label><?=html_entity_decode($user->direccion);?></div>
    </div>
    <hr>
    <div class="butt_luis_one"><a href="<?=$base."proveedores/update/".$user->id;?>"><span>Actualizar datos</span></a></div>
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
  <?php else: header('location:'.$base.'proveedores');?>
 <?php endif ?>
 <script type="text/javascript">
$(document).on('keyup', "#ruc", function(){
  let dat = $(this).val();
  $.ajax({
        type:"POST",
        data:{data:dat},
        dataType:"json",
        url:list_urls()+list_action()+"search_sunat",
        beforeSend: function(){
          $(".direcdatlabel").html("°°°");
        },
        success: function(datos){
          if(datos.tipo===0){
            $(".direcdat").addClass("direcnone");
            $("#nombre").val("");
            $("#direccion").val("");
            $(".direcdatlabel").html("");
            alertadvertencia(datos.mensaje);
          }else{
            $(".direcdat").removeClass("direcnone");
            $("#nombre").val(datos.result.razon_social);
            $("#direccion").val(datos.result.direccion);
            $(".direcdatlabel").html(datos.result.estado);
          } 
        }
    });
})
</script>
<?php else: ?>
  <h4 class="titulo_paginas">Proveedores</h4>
  <div class="message"></div>
  <a class="add_itembox" href="<?=$base."proveedores/add"?>">
    <div class="butt_luis_one"><span><?=Luis::lang("agregar");?></span></div>
  </a>
  <hr>
  <div class="contentlists_items">
    <?php if(count($usuarios)): ?>
      <?php foreach ($usuarios as $user): ?>
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
              <a href="<?=$base."proveedores/userview/".$user->id;?>"><div class="boxoptionslistitems">Ver proveedor</div></a>
              <a href="<?=$base."proveedores/update/".$user->id;?>"><div class="boxoptionslistitems">Editar proveedor</div></a>
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
      <div class="noitemsnull"><h3><?=Luis::lang("sin_datos");?></h3></div>
    <?php endif ?>
  </div>
<?php endif ?>
<?php endif ?>

