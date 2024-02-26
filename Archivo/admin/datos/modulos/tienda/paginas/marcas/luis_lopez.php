<?php 
$base = Luis::basepage("base_page_admin");
$marcas = DatosAdmin::mostrar_marcas();
?>
<style type="text/css">
  .input_text_foot {
    display: block;
    margin: 17px auto;
    margin-bottom:0;
    box-sizing: border-box;
    padding: 7px 9px;
    width: 100%;
    max-width: 300px;
    border: 2px solid #999;
    outline: none;
    transition: all .5s;
}
</style>
<section class="vista_preb_page">
     <ol class="box_visw">
        <li><a href="<?=$base;?>">Inicio</a></li>
        <li><a href="<?=$base."tiendas";?>">Tiendas</a></li>
        <li class="active">Marcas</li>
     </ol>
</section>
<div class="contentlists_items">
  <h4 class="titulo_paginas">Marcas</h4>
  <div class="message"></div>

  <div class="nuevacategoriacaja">
    <form role="form" method="post" action="index.php?accion=nueva_marca">
      <input type="text" class="input_text_foot" autocomplete="off" name="nombre" placeholder="Nombre de marca" required="required">
      <input class="publicardiapositiva butt_luis_lwos" type="submit" name="boton_guardarcambios" value="Agregar">
    </form>
  </div>
  <?php if(count($marcas)>0):?>
    <div class="contiene_categoria">
      <?php foreach ($marcas as $m): ?>
        <div id="<?=$m->id;?>" class="itemsviewslist">
          <div class="viewimgl minwiimgstwo width50 height50">
            <img src="<?=$base."datos/imagenes/icons/foto.png";?>">
          </div>
          <div class="contensviewsitstr">
            <h4 class="nameshiff"><?=$m->nombre;?></h4>
            <div class="namesdeskp">
              
            </div>
          </div>

          <div class="opcionesblocklist opcionesblocklist1000boxlist">
            <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
              <span class="opcionesblocklistoption opcionesblocklistoption100">
                <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
              </span>
            </a>
            <div class="boxoptionslistlines">
              <div class="makposdind"></div>
              <a class="iconbuttondeletemarc" id="<?=$m->id; ?>"><div class="boxoptionslistitems">Eliminar</div></a>
              <a class="iconbuttonupdatemarc" data-modal-trigger="editar_marca_opcion<?=$m->id?>"><div class="boxoptionslistitems">Editar</div></a>
            </div>
          </div>
        </div>

        <div class="modal" data-modal-name="editar_marca_opcion<?=$m->id?>" data-modal-dismiss>
          <div class="modal__dialog">
            <header class="modal__header">
              <h3 class="modal__title">Editar</h3>
              <i class="modal__close" data-modal-dismiss>X</i>
            </header>
            <div class="modal__content" id="<?=$m->id?>">
              <form method="POST" action="index.php?accion=editar_marca">
                <input hidden="hidden" style="display:none;opacity:0;" type="text" name="id" value="<?=$m->id; ?>">
                <input type="text" placeholder="Nombre" name="nombre" value="<?=html_entity_decode($m->nombre);?>" autocomplete="off">
                <input type="submit" class="butt_luis_two" value="Guardar cambios">
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>