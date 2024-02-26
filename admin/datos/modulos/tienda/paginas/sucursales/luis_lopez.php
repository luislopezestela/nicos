<?php
$base = Luis::basepage("base_page_admin");
$direccion = DatosAdmin::Mostrar_sucursales();
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
?>
<section class="vista_preb_page">
     <ol class="box_visw" id="dir_homs" data_linm="<?=$base;?>">
        <li><a href="<?=$base;?>"><?=Luis::lang("inicio");?></a></li>
        <li><a href="<?=$base."tiendas";?>"><?=Luis::lang("tienda");?></a></li>
        <?php if($urbs): ?>
          <?php if($urbp=="update"): ?>
            <li class="active"><?=Luis::lang("editar");?></li>
          <?php elseif($urbp=="view"): ?>
            <li class="active"><?=Luis::lang("ver");?></li>
          <?php endif ?>
        <?php elseif($urbp): ?>
          <?php if($urbp=="add"): ?>
            <li class="active"><?=Luis::lang("agregar");?></li>
          <?php endif ?>
        <?php else: ?>
          <li class="active"><?=Luis::lang("sucursales");?></li>
        <?php endif ?>
     </ol>
</section>
<div class="message"></div>

<?php if ($urbs): ?>
  <?php if($urbp=="update"): ?>
    <h4 class="titulo_paginas"><?=Luis::lang("editar");?></h4>
  <?php elseif($urbp=="view"): ?>
    <h4 class="titulo_paginas"><?=Luis::lang("detalles");?></h4>
  <?php endif ?>
<?php elseif($urbp): ?>
  <?php if($urbp=="add"): ?>
    <h4 class="titulo_paginas"><?=Luis::lang("nuevo");?></h4>
  <?php endif ?>
<?php else: ?>
  <h4 class="titulo_paginas"><?=Luis::lang("sucursales");?></h4>
  <a class="add_itembox" href="<?=$base."sucursales/add"?>">
    <div class="butt_luis_one"><span><?=Luis::lang("nuevo");?></span></div>
  </a>
<?php endif ?>

<div class="contentlists_items">
  <?php if($urbs): ?>
    <?php if($urbp=="update"): $sucursal = DatosAdmin::poridSucursal($urbs); ?>
      <a class="butt_back" href="<?=$base."sucursales";?>">❮ <?=Luis::lang("sucursales");?></a>
      <form method="post" action="<?=$base."index.php?accion=editar_sucursal";?>">
        <input type="hidden" name="id" value="<?=$sucursal->id?>">
        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="nombre" value="<?=$sucursal->nombre?>" autocomplete="off">
          <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
        </div>

        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="pais" onmousedown="return false;" value="PERU" autocomplete="off">
          <label class="labelboxinptext"><?=Luis::lang("pais");?></label>
        </div>

        <div class="boxinputlists">
          <select required="required" name="departamento" class="input_luis_two inptexboslistspublic" id="departamento">
            <?php $departamentos = DatosAdmin::Mostrar_departamentos();
            if(count($departamentos)>0):?>
              <option value=""><?=Luis::lang("departamento");?></option>
              <?php foreach($departamentos as $dep):?>
                <option value="<?=$dep->id; ?>" <?php if($sucursal->departamento==$dep->id){echo("selected");}?>><?=$dep->nombre;?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
          <label class="labelboxinptext"><?=Luis::lang("departamento");?></label>
        </div>

       
        
        <div class="boxinputlists">
          <select required="required" name="provincia" id="provincia" class="input_luis_two inptexboslistspublic">
            <option>Provincia</option>
            <?php if($sucursal->departamento): ?>
              <?php $provincia=DatosAdmin::poridDeDepartamento($sucursal->departamento);
              if(count($provincia)>0):?>
                <?php foreach($provincia as $pro):?>
                  <option value="<?=$pro->id; ?>" <?php if($sucursal->provincia==$pro->id){echo "selected";} ?>><?=$pro->nombre; ?></option>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endif ?>
          </select>
          <label class="labelboxinptext"><?=Luis::lang("provincia");?></label>
        </div>

        <div class="boxinputlists">
          <select required="required" name="distrito" id="distrito" class="input_luis_two inptexboslistspublic">
            <option>Distrito</option>
            <?php if($sucursal->provincia): ?>
              <?php $distrito = DatosAdmin::poridDeProvincia($sucursal->provincia);
              if(count($distrito)>0):?>
                <?php foreach($distrito as $dis):?>
                  <option value="<?=$dis->id; ?>" <?php if($sucursal->distrito==$dis->id){echo "selected";} ?>><?=$dis->nombre; ?></option>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endif ?>
          </select>
          <label class="labelboxinptext"><?=Luis::lang("distrito");?></label>
        </div>

        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="direccion" value="<?=$sucursal->direccion?>">
          <label class="labelboxinptext"><?=Luis::lang("direccion");?></label>
        </div>

        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="referencia" value="<?=$sucursal->referencia?>">
          <label class="labelboxinptext"><?=Luis::lang("referencia");?></label>
        </div>

        <label>Mapa</label>
        <fieldset class="gllpLatlonPicker">
          <div class="gllpMap" style="height: 450px; width: 100%; "></div>
          <input type="hidden" name="latitud" class="gllpLatitude" value="<?=$sucursal->latitud?>"/>
          <input type="hidden" name="longitud" class="gllpLongitude" value="<?=$sucursal->longitud?>"/>
          <input type="hidden" name="zoom" class="gllpZoom" value="<?=$sucursal->zoom?>"/>
        </fieldset>
        <input class="butt_luis_lwos" type="submit" value="Guardar Cambios">
      </form>
    <?php elseif($urbp=="view"): $sucursal=DatosAdmin::poridSucursal($urbs);?>
      <a class="butt_back" href="<?=$base."sucursales";?>">❮ Sucursales</a>
      <label>Nombre</label>
      <span class="input_luis_two"><?=$sucursal->nombre?></span>
      <label>Pais</label>
      <span class="input_luis_two">Peru</span>
      <label>Departamento</label>
      <?php $departamentos = DatosAdmin::Mostrar_departamentos();
      if(count($departamentos)>0): $deps_do=false;?>
        <?php foreach($departamentos as $dep):?>
          <?php  if($sucursal->departamento==$dep->id){$deps_do=$dep->nombre;}?>
        <?php endforeach; ?>
      <?php endif; ?>
      <span class="input_luis_two"><?=$deps_do;?></span>
      <label>Provincia</label>
      <?php $provincia=DatosAdmin::poridDeDepartamento($sucursal->departamento);
      if(count($provincia)>0): $probs_do=false;?>
        <?php foreach($provincia as $pro):?>
          <?php  if($sucursal->provincia==$pro->id){$probs_do=$pro->nombre;}?>
        <?php endforeach; ?>
      <?php endif; ?>
      <span class="input_luis_two"><?=$probs_do;?></span>
      <label>Distrito</label>
      <?php $distrito = DatosAdmin::poridDeProvincia($sucursal->provincia);
      if(count($distrito)>0): $distrs_do=false;?>
        <?php foreach($distrito as $dis):?>
          <?php if($sucursal->distrito==$dis->id){$distrs_do=($dis->nombre);}?>
        <?php endforeach; ?>
      <?php endif; ?>
      <span class="input_luis_two"><?=$distrs_do;?></span>
      <label>Direccion</label>
      <span class="input_luis_two"><?=$sucursal->direccion?></span>
      <label>Referencia</label>
      <span class="input_luis_two"><?=$sucursal->referencia?></span>
      <label>Mapa</label>
      <fieldset class="gllpLatlonPicker">
        <div class="gllpMap" style="height: 450px; width: 100%; "></div>
        <input type="hidden" name="latitud" class="gllpLatitude" value="<?=$sucursal->latitud?>"/>
        <input type="hidden" name="longitud" class="gllpLongitude" value="<?=$sucursal->longitud?>"/>
        <input type="hidden" name="zoom" class="gllpZoom" value="<?=$sucursal->zoom?>"/>
      </fieldset>
      <a href="<?=$base."sucursales/update/".$sucursal->id;?>" class="butt_luis_lwos">Editar sucursal</a>
    <?php endif ?>
  <?php elseif($urbp): ?>
    <?php if($urbp=="add"): ?>
      <a class="butt_back" href="<?=$base."sucursales";?>">❮ Sucursales</a>
      <form method="post" action="<?=$base."index.php?accion=nuevosucursal";?>">
        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="nombre">
          <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
        </div>

        <div class="boxinputlists">
          <input type="text" class="input_luis_two inptexboslistspublic" name="pais" onmousedown="return false;" value="PERU">
          <label class="labelboxinptext"><?=Luis::lang("pais");?></label>
        </div>

        <div class="boxinputlists">
          <select required name="departamento" class="input_luis_two inptexboslistspublic"  id="departamento">
            <?php $departamentos=DatosAdmin::Mostrar_departamentos();
            if(count($departamentos)>0):?>
              <option value=""><?=Luis::lang("departamento");?></option>
              <?php foreach($departamentos as $dep):?>
                <option value="<?=$dep->id;?>"><?=$dep->nombre;?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
          <label class="labelboxinptext"><?=Luis::lang("departamento");?></label>
        </div>

        <div class="boxinputlists">
          <select required="required" name="provincia" id="provincia" class="input_luis_two inptexboslistspublic">
            <option><?=Luis::lang("provincia");?></option>
          </select>
          <label class="labelboxinptext"><?=Luis::lang("provincia");?></label>
        </div>

        <div class="boxinputlists">
          <select required="required" name="distrito" id="distrito" class="input_luis_two inptexboslistspublic">
            <option>Distrito</option>
          </select>
          <label class="labelboxinptext"><?=Luis::lang("distrito");?></label>
        </div>

        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="direccion">
          <label class="labelboxinptext"><?=Luis::lang("direccion");?></label>
        </div>

        <div class="boxinputlists">
          <input required="required" class="input_luis_two inptexboslistspublic" type="text" name="referencia">
          <label class="labelboxinptext"><?=Luis::lang("referencia");?></label>
        </div>
        <label>Mapa</label>
        <fieldset class="gllpLatlonPicker">
          <div class="gllpMap" style="height:450px;width:100%;"></div>
          <input type="hidden" name="latitud" class="gllpLatitude" value="-12.043819101308925"/>
          <input type="hidden" name="longitud" class="gllpLongitude" value="-77.02026367187506"/>
          <input type="hidden" name="zoom" class="gllpZoom" value="5"/>
        </fieldset>
        <input class="butt_luis_lwos" type="submit" value="Guardar Sucursal">
      </form>
    <?php endif ?>
  <?php else: ?>
    <?php if(count($direccion)>0): ?>
      <?php foreach ($direccion as $d): ?>
        <div class="itemsviewslist" id="<?="sucursales".$d->id;?>">
          <div class="contensviewsitstr">
            <h3 class="nameshiff"><?=html_entity_decode($d->nombre);?></h3>
            <span class="nameshiffs"><?=$d->direccion;?></span>
            <?php if($d->principal):?>
              <div class="divprincipalhomsucursals">Principal</div>
            <?php else:?>
              <a href="<?=$base;?>index.php?accion=hacerprincipalsucursal&id=<?=$d->id;?>">
                <div class="divprincipalhomsucursals activesuct">Hacer Principal</div>
              </a>
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
              <div class="tipbox" tipbox="<?=$base;?>"></div>
              <a href="<?=$base."sucursales/view/".$d->id;?>"><div class="boxoptionslistitems">Ver sucursal</div></a>
              <a href="<?=$base."sucursales/update/".$d->id;?>"><div class="boxoptionslistitems">Editar sucursal</div></a>
              <?php if($d->estado):?>
                <div class="boxoptionslistitems sucursales_ac sucursales_ac<?=$d->id;?>" id="<?=$d->id?>" data_bass="<?=$base;?>">Desactivar</div>
              <?php else:?>
                <div class="boxoptionslistitems sucursales_ac sucursales_ac<?=$d->id;?>" id="<?=$d->id?>" data_bass="<?=$base;?>">Activar</div>
              <?php endif;?>
              <div class="boxoptionslistitems sucursal_eliminar" id="<?=$d->id?>">Eliminar</div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else: ?>
    <?php endif ?>
  <?php endif ?>
</div>

 <script type="text/javascript">
  $(document).ready(function () {
  $('.sucursales_ac').click(function(){
    var databop=$(this).attr("data_bass");
  var id = $(this).attr('id');
  var dato_id = 'id='+id;
  $.ajax({
  type: "POST",
  url: list_urls()+list_action()+"sucursalopt",
  data: dato_id,
  success: function(data) {
  $('.sucursales_ac'+id).html(data);
  console.log('Los cambios se guardaron con exito');
  }
  });
  });

  $('.sucursal_eliminar').click(function(){
  var id = $(this).attr('id');
  var dato_id = 'id='+id;
  $.ajax({
  type: "POST",
  url: list_urls()+list_action()+"eliminar_sucursal",
  data: dato_id,
  success: function(data) {
  $('#sucursales'+id).addClass("eliminando");
  $('#sucursales'+id).slideUp(600);
    }
  });
  });


   $("#departamento").change(function(){
    var departamento = $(this).val();
    var derp = $("#dir_homs").attr("data_linm");
    console.log(departamento)
    $.ajax({
      type:"post",
        url: list_urls()+list_action()+"funciondepartamento",
        data: {departamento:departamento},
        cache: false,
        success: function(msg){
          console.log(msg)
            $("#provincia").html(msg);
        }
    });
   });

   $("#provincia").change(function(){
    var derp = $("#dir_homs").attr("data_linm");
    var provincia = $("#provincia").val();
    $.ajax({
      type:"POST",
        url: list_urls()+list_action()+"funcionprovincia",
        data: {provincia:provincia},
        cache: false,
        success: function(msg){
            $("#distrito").html(msg);
        }
    });
   });


});
</script>