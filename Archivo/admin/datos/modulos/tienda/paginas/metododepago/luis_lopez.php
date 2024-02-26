<?php $metodopago = DatosAdmin::MostrarAdmin_metodo_pagos(); ?>
<?php $basepagina = Luis::basepage("base_page");
$base = Luis::basepage("base_page_admin");?>
<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>">Inicio</a></li>
    <li class="active">Metodo de pago</li>
  </ol>
</section>
<div class="contentlists_items">
  <h3 class="titulo_paginas">Metodos de pago</h3>
  <?php if (count($metodopago)>0): ?>
    <?php foreach ($metodopago as $m): ?>
      <div class="itemsviewslist">
        <div class="contensviewsitstr">
          <h4 class="nameshiff"><?=html_entity_decode($m->nombre);?></h4>
          <?php if($m->activado):?>
           <span id="<?=$m->id;?>" class="metododepagoopcion metododepagoopcion_list<?=$m->id;?>">Activado</span>
            <?php else:?>
            <span id="<?=$m->id;?>" class="metododepagoopcion metododepagoopcion_list<?=$m->id;?>">Desactivado</span>
            <?php endif;?>
        </div>

        <div class="opcionesblocklist opcionesblocklist1000boxlist">
          <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
            <span class="opcionesblocklistoption opcionesblocklistoption100">
              <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
            </span>
          </a>
          <div class="boxoptionslistlines">
            <div class="makposdind"></div>
            <?php if($m->id == 1): ?>
            <?php elseif($m->id == 2): ?>
              <a href="<?=$base."configurarcuentasbancarias";?>" id="<?=$m->id;?>" class="usuariospt <?=$m->id;?>">
                <div class="boxoptionslistitems">Configurar</div>
              </a>
            <?php elseif($m->id == 3): ?>
              <a href="<?=$base."configurarpasarelasdepago";?>" id="<?=$m->id;?>" class="usuariospt <?=$m->id;?>">
                <div class="boxoptionslistitems">Configurar</div>
              </a>
            <?php endif ?>
            <?php if($m->activado):?>
              <a id="<?=$m->id;?>" class="metododepagoopcion metododepagoopcion<?=$m->id;?>">
                <div class="boxoptionslistitems">Desactivar</div>
              </a>
            <?php else:?>
              <a id="<?=$m->id;?>" class="metododepagoopcion metododepagoopcion<?=$m->id;?>">
                <div class="boxoptionslistitems">Activar</div>
              </a>
            <?php endif;?>
          </div>
        </div>
        </div>
    <?php endforeach ?>
  <?php else: ?>
    <p>No hay metodos de pago</p>
  <?php endif ?>
</div>
<script type="text/javascript">
  $('.metododepagoopcion').click(function(){
  var id = $(this).attr('id');
  var dato_id = 'id='+id;
  $.ajax({
  type: "POST",
  url:list_urls()+list_action()+"metododepagoopcion",
  data: dato_id,
  dataType:"json",
  success: function(data) {
  $('.metododepagoopcion_list'+id).html(data.data_two);
  $('.metododepagoopcion'+id).html(data.data_one);
  alertexito('Los cambios se guardaron con exito');
  }
  });
  });
</script>