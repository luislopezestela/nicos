<?php
$base = Luis::basepage("base_page_admin");
$base_bs = Luis::basepage("base_page");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
if($urbp){
 // $nbs = DatosCategoria::lacategoria($urbp);
$nbs = DatosAdmin::categorias($urbp);
if($nbs){
$cats_tit=html_entity_decode($nbs->nombre);
$catboxing=DatosAdmin::poner_guion(strip_tags(html_entity_decode($nbs->nombre)));
$logo_disp=$nbs->logo;
$categorias = DatosAdmin::mostrar_sub_categorias($nbs->id);
$cantidadventas= DatosAdmin::contar_id_sub_categorias($nbs->id);
$crb=DatosAdmin::sub_categorias_porNombreuk($urbs);
$plds=$nbs->id;
$sucurs=$nbs->sucursal;
}else{
$sucurs=false;
$categorias = null;
$cats_tit=false;
$logo_disp=false;
$plds=false;
}
}else{
if(isset($urb[1])==null){
$categorias = DatosAdmin::mostrar_categoria_admin();
$cantidadventas= DatosAdmin::contar_id_categorias();
}else{
header('location:'.$base.'categorias');
}
}
?>
 <section class="vista_preb_page">
     <ol class="box_visw">
        <li><a href="<?=$base;?>">Inicio</a></li>
        <li><a href="<?=$base."tiendas";?>">Tiendas</a></li>
        <?php if(isset($urb[1])): ?>
          <?php if (isset($urb[2])): ?>
            <?php if ($urb[2]==="update"): ?>
        <li><a href="<?=$base."categorias";?>">Categorias</a></li>
        <li class="active">Update</li>
        <?php else:?>
          <?php if (isset($urb[3])): ?>
                <?php if ($urb[3]==="update"): ?>
                  <li><a href="<?=$base."categorias";?>">Categorias</a></li>
                  <li><a href="<?=$base."categorias/".$catboxing;?>">Sub</a></li>
                  <li class="active">Update</li>
                  <?php else:  header('location:'.$base.'categorias');?>
                <?php endif ?>
              <?php endif ?>
        <?php endif ?>
        <?php else: ?>
        <li><a href="<?=$base."categorias";?>">Categorias</a></li>
        <li class="active">Sub</li>
        <?php endif ?>
          <?php else: ?>
        <li class="active">Categorias</li>
        <?php endif ?>
     </ol>
</section>
<?php if (isset($categorias)==false): ?>
  <div class="notpage"><h1 class="iconbarnot">&#x2639;&#xfe0f;</h1>Pagina no encontrado</div>
<?php else: ?>
<?php if ($urb3==="update"): ?>
<div class="contentlists_items">
<h3 class="titulo_paginas">Editar categoria</h3>
 <?php if (isset($_SESSION["failexep"])):?>
    La categoria <?=$_SESSION["failexep"];?> ya existe
  <?php unset($_SESSION["failexep"]); endif ?>
  <a class="butt_back" href="<?=$base."categorias/".$catboxing;?>">❮ atras</a>
  <form method="POST" action="<?=$base."index.php?accion=editarsubcategoria";?>" role="form" enctype="multipart/form-data">
    <div class="boxinputlists">
      <input class="inptexboslistspublic" type="text" name="nombre" value="<?=html_entity_decode($crb->nombre);?>" required="required" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
    </div>
    <input hidden="hidden" type="text" name="id" value="<?=$crb->id;?>">
    <input class="butt_luis_lwos" type="submit" name="boton_guardarcambios" value="Guardar cambios">
  </form>
</div>
<?php elseif ($urbs==="update"):?>
<div class="contentlists_items">
  <h3 class="titulo_paginas">Editar categoria</h3>
  <?php if (isset($_SESSION["failexep"])):?>
    La categoria <?=$_SESSION["failexep"];?> ya existe
  <?php unset($_SESSION["failexep"]); endif ?>
  <a class="butt_back" href="<?=$base."categorias";?>">❮ Categorias</a>
  <form method="POST" action="<?=$base."index.php?accion=editarcategoria";?>" role="form" enctype="multipart/form-data">
    <div class="boxinputlists">
      <input class="inptexboslistspublic" type="text" name="nombre" value="<?=$cats_tit;?>" required="required" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
    </div>
    <div class="imagenes">
      <input hidden="hidden" type="text" name="laimagen" value="<?=$logo_disp;?>">
        <span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1">
          <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png";?>" alt="" height="16" width="16">
          <span class="contentaddimgs"> Editar foto</span>
          <input type="file" id="imagen" name="logo" title="Selecciona imagen" class="addnewimageluisbotsccc adsfdg5" accept="image/*">
        </span>
      </div>
<div class="imagen_pre">
    <input type="button" id="eliminaimagen_uno" value="x" class="botoneliminar1" data-ird="<?=$base;?>" data-fl="<?=$logo_disp;?>">
    <img id="vista_previa_imagen" src="<?=$base."../datos/modulos/".Luis::temass()."/source/imagenes/categorias/thumb/".$logo_disp;?>" class="vista_previa_uno vista_previa_une">
</div>
<input hidden="hidden" type="text" name="id" value="<?=$plds;?>">
<input class="butt_luis_lwos" type="submit" name="boton_guardarcambios" value="Guardar cambios">
</form>
</div>
<?php else: ?>
<?php if (isset($urb[1])): ?>
<h3 class="titulo_paginas">Categoria <?=$cats_tit;?></h3>
<div class="butt_luis_one"><span class="add_modal" id="btn-modal">Agregar</span></div>
<div class="overlay_luis" id="overlay_luis"></div>
<div class="modal_luis_one" id="modal_luis_one">
  <p class="cerrar_modal" id="cerrar_modal">X</p>
  <h2 class="title_slide_luis">Agregar sub categoria</h2>
  <form class="formulariodiapositiva" method="POST" action="<?=$base."index.php?accion=nuevasubcategoria";?>" role="form" enctype="multipart/form-data">
    <div class="boxinputlists">
      <input name="nombre" required="required" class="inptexboslistspublic" type="text" autocomplete="off">
      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
    </div>
  <input hidden="hidden" type="text" name="id_categoria" value="<?=$nbs->id;?>">
  <input hidden="hidden" type="checkbox" checked="checked" name="es_activo">
  <input type="submit" class="butt_luis_two" value="Agregar">
</form>
</div> 
  <?php else: ?>
<h3 class="titulo_paginas">Categorias</h3>
<div class="butt_luis_one"><span class="add_modal" id="btn-modal">Agregar</span></div>
<div class="overlay_luis" id="overlay_luis"></div>
<div class="modal_luis_one" id="modal_luis_one">
  <p class="cerrar_modal" id="cerrar_modal">X</p>
  <h2 class="title_slide_luis">Agregar categoria</h2>
  <form class="formulariodiapositiva" method="POST" action="<?=$base."index.php?accion=nuevacategoria";?>" role="form" enctype="multipart/form-data">
    <div class="boxinputlists">
      <input class="inptexboslistspublic" type="text" name="nombre" autocomplete="off" required="required">
      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
    </div>
  <div class="imagenes">
    <input hidden="hidden" type="text" name="laimagen_logo" value="">
    <span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1"> 
      <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png";?>" alt="" height="16" width="16">
      <span class="contentaddimgs">Agrega una foto</span>
      <input type="file" required="required" id="imagen" name="logo" title="Selecciona imagen" class="addnewimageluisbotsccc adsfdg5" accept="image/*"/>
    </span>
  </div>
<div class="imagen_pre">
    <input type="button" id="eliminaimagen_uno" value="x" class="botoneliminar1" />
    <img id="vista_previa_imagen" class="vista_previa_uno">
  </div>
  <input type="submit" class="butt_luis_two" value="Agregar">
</form>
</div>
<?php endif ?>

 <hr>
<div class="contentlists_items">
  <?php if (isset($_SESSION["failexep"])):?>
    La categoria <?=$_SESSION["failexep"];?> ya existe
  <?php unset($_SESSION["failexep"]); endif ?>

<?php if (isset($urb[1])): ?>
<a class="butt_back" href="<?=$base."categorias";?>">❮ Categorias </a>
<?php endif ?>
<?php
if(count($categorias)>0):?> 
<?php foreach($categorias as $cat):
$cats=DatosAdmin::poner_guion(strip_tags(html_entity_decode($cat->nombre)));
if(!$urbp){
$subcat="<a href=".$base."categorias/".$cats."><div class=\"boxoptionslistitems\">Sub categorias</div></a>";
$btupdate="<a href=\"".$base."categorias/".$cats."/update\"><div class=\"boxoptionslistitems\">Editar publicacion</div></a>";
$eok="clend_cats";
if(isset($cat->logo)){
$imagebls='<div class="viewimgl width50 height50"><img class="borde_white" width="100%" height="50" src="'.$base.'../datos/modulos/'.Luis::temass().'/source/imagenes/categorias/thumb/'.$cat->logo.'"></div>';
}else{
$imagebls='<div class="viewimgl minwiimgstwo fondo_we width50 height50"><img class="borde_white" width="100%" height="50" src="'.$base.'datos/imagenes/icons/mou.png"></div>';
}
}else{
$subcat=false;
$btupdate="<a href=\"".$base."categorias/".$catboxing."/".$cats."/update\"><div class=\"boxoptionslistitems\">Editar publicacion</div></a>";
$eok="clend_catsub";
$imagebls=null;
}?>
  <div class="itemsviewslist" id="<?="btd".$cat->id?>"><?=$imagebls;?>
    <div class="contensviewsits contensslidests">
      <?php if(!$cat->nombre==null){ echo $cat->nombre; }else{ echo '-';}?>
    </div>
    <div class="opcionesblocklist opcionesblocklist1000boxlist">
        <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
          <span class="opcionesblocklistoption opcionesblocklistoption100">
            <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
          </span>
          </a>
         <div class="boxoptionslistlines">
          <div class="makposdind"></div>
          <a href="<?=$base_bs."productos/".$cats;?>" target="_BLANK"><div class="boxoptionslistitems">Ver categoria</div></a>
          <?=$subcat;?>
          <?=$btupdate;?>
           <div class="boxoptionslistitems <?=$eok;?>" data-config="<?=$cat->id?>">Eliminar</div>
         </div>
    </div>     
  </div>

<?php endforeach; ?>
<?php else: ?>
 <?php endif; ?>
</div>
<?php endif ?>
<?php endif ?>