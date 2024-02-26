<?php 
$diapositiva = DatosAdmin::diapositivas_lista();
$base = Luis::basepage("base_page_admin");
$base_a = Luis::basepage("base_page");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
?>
<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>">Inicio</a></li>
    <?php if($urbp==="add"): ?>
    <li><a href="<?=$base."diapositiva";?>"><?=Luis::lang("diapositiva");?></a></li>
    <li class="active">Add</li>
    <?php elseif($urbp==="update"): ?>
    <li><a href="<?=$base."diapositiva";?>"><?=Luis::lang("diapositiva");?></a></li>
    <li class="active">Update</li>
    <?php elseif($urbp==="diapositivaview"): ?>
    <li><a href="<?=$base."diapositiva";?>"><?=Luis::lang("diapositiva");?></a></li>
    <li class="active"><?=DatosAdmin::diapositiva_detalle($urb[2])->nombre;?></li>
    <?php else: ?>
    <li class="active"><?=Luis::lang("diapositiva");?></li>
    <?php endif ?>
  </ol>
</section>

<?php if(count($urb)>3): ?>
	<?php header('location:'.$base.'diapositiva'); ?>
<?php else: ?>
	<?php if(isset($urb[2])): ?>
		<?php if(isset($urb[1])): ?>
			<?php if($urb[1]==="update"): ?>
				<?php if(isset($urb[2])==$urb[2]): ?>
					<?php $slid = DatosAdmin::diapositiva_detalle($urbs);?>
					<div class="contentlists_items">
						<form id="update_slider_page" role="form" method="POST" enctype="multipart/form-data">
							<h4 class="titulo_paginas"><?=Luis::lang("editar");?></h4>
							<div class="message"></div>
							<hr>
							<div class="boxinputlists">
								<input id="tituloslider" class="input_slide" type="text" value="<?php if($slid->nombre){echo(html_entity_decode($slid->nombre));}else{};?>" required>
								<label class="label_input_slide"><?=Luis::lang("titulo");?></label>
							</div>
							<div class="boxinputlists">
								<textarea id="descripcion_slider" class="input_slide" cols="15" rows="6" required><?php if($slid->texto){echo(html_entity_decode($slid->texto));}else{};?></textarea>
								<label class="label_input_slide"><?=Luis::lang("descripcion");?></label>
							</div>

							<div class="boxinputlists">
								<input id="ulrslider" class="input_slide" type="text" value="<?php if($slid->url){echo(html_entity_decode($slid->url));}else{};?>" required>
								<label class="label_input_slide"><?=Luis::lang("ulr");?></label>
							</div>

							<div class="boxinputlists">
								<select id="buttonslider" class="input_slide" required>
									<option value=""></option>
									<option value="sin_boton" <?php if($slid->boton=="sin_boton"){echo("selected");}else{} ?>><?=Luis::lang("sin_boton");?></option>
									<option value="comprar_ahora" <?php if($slid->boton=="comprar_ahora"){echo("selected");}else{} ?>><?=Luis::lang("comprar_ahora");?></option>
									<option value="ver_productos" <?php if($slid->boton=="ver_productos"){echo("selected");}else{} ?>><?=Luis::lang("ver_productos");?></option>
									<option value="mas_categorias" <?php if($slid->boton=="mas_categorias"){echo("selected");}else{} ?>><?=Luis::lang("mas_categorias");?></option>
									<option value="detalles" <?php if($slid->boton=="detalles"){echo("selected");}else{} ?>><?=Luis::lang("detalles");?></option>
									<option value="informacion" <?php if($slid->boton=="informacion"){echo("selected");}else{} ?>><?=Luis::lang("informacion");?></option>
									<option value="ver_catalogo" <?php if($slid->boton=="ver_catalogo"){echo("selected");}else{} ?>><?=Luis::lang("ver_catalogo");?></option>
									<option value="descargar_catalogo"<?php if($slid->boton=="descargar_catalogo"){echo("selected");}else{} ?>><?=Luis::lang("descargar_catalogo");?></option>
									<option value="descargar" <?php if($slid->boton=="descargar"){echo("selected");}else{} ?>><?=Luis::lang("descargar");?></option>
									<option value="descargar_lista" <?php if($slid->boton=="descargar_lista"){echo("selected");}else{} ?>><?=Luis::lang("descargar_lista");?></option>
									<option value="descargar_archivo" <?php if($slid->boton=="descargar_archivo"){echo("selected");}else{} ?>><?=Luis::lang("descargar_archivo");?></option>
									<option value="contactar" <?php if($slid->boton=="contactar"){echo("selected");}else{} ?>><?=Luis::lang("contactar");?></option>
									<option value="consultar" <?php if($slid->boton=="consultar"){echo("selected");}else{} ?>><?=Luis::lang("consultar");?></option>
									<option value="registrar" <?php if($slid->boton=="registrar"){echo("selected");}else{} ?>><?=Luis::lang("registrar");?></option>
									<option value="ver_cupon" <?php if($slid->boton=="ver_cupon"){echo("selected");}else{} ?>><?=Luis::lang("ver_cupon");?></option>
									<option value="ver_ofertas" <?php if($slid->boton=="ver_ofertas"){echo("selected");}else{} ?>><?=Luis::lang("ver_ofertas");?></option>
								</select>
								<label class="label_input_slide"><?=Luis::lang("nombre_del_boton");?></label>
							</div>
							<hr>
							<h3><?=Luis::lang("escritorio");?></h3>
							<div>
								<span class="infmaximgs">Fotos <span id="coukbox200" class="coukbox">0</span>/1</span>
							</div>
							<span class="addnewimageluisboxusslide afyfdg5" role="button" tabindex="1">
								<div id="litimgecurrrent">
									<img class="addnewimageluisimf butto_slide adsaddslid slide_fuils_lui" src="<?=$base;?>datos/imagenes/icons/imge_add.png" alt="" height="16" width="16">
									<span class="contentaddimgs butto_slide adsaddslid"><?=Luis::lang("no_hay_imagen");?></span>
									<input class="addnewimage_slide adsgdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" multiple="multiple" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*" disabled>

									<?php
									$img_slide = DatosAdmin::diapositiva_image($slid->id);
				          ?>
									<span class="addnewimageluisboxud" id="gVO3Ue6Pc4">
										<span class="addnewimageluisboxudremove">
											<img src="https://localhost/admin/datos/imagenes/icons/csacdjkclos.png">
										</span>
										<img class="addnewimageluisboxudimage svv" src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/".$slid->id."/thumb_view_".$img_slide->imagen;?>" title="Foto">
									</span>
								</div>
							</span>
							<br>
							<input type="hidden" id="averagecolor" value="">
							<div class="aphlistbuttonnextopenbox" data="<?=$urbs;?>">
								<span class="aphlistbuttonnextopembox_slider_update butt_luis_lwos">Publicar</span>
								<input id="blocknullfom12_slider_update" hidden="hidden" type="submit">
							</div>
						</form>
					</div>
				<?php else: ?>
					<?php header('location:'.$base.'diapositiva');?>
				<?php endif ?>
			<?php else: ?>
				<?php header('location:'.$base.'diapositiva');?>
			<?php endif ?>
		<?php endif ?>
	<?php elseif(isset($urb[1])): ?>
		<?php if($urb[1]==="add"): ?>
			<div class="contentlists_items">
				<form id="new_slider_page" role="form" method="POST" enctype="multipart/form-data">
					<h4 class="titulo_paginas"><?=Luis::lang("agregar");?></h4>
					<div class="message"></div>
					<hr>
					<div class="boxinputlists">
						<input id="tituloslider" class="input_slide" type="text" required>
						<label class="label_input_slide"><?=Luis::lang("titulo");?></label>
					</div>
					<div class="boxinputlists">
						<textarea id="descripcion_slider" class="input_slide" cols="15" rows="6" required></textarea>
						<label class="label_input_slide"><?=Luis::lang("descripcion");?></label>
					</div>

					<div class="boxinputlists">
						<input id="ulrslider" class="input_slide" type="text" required>
						<label class="label_input_slide"><?=Luis::lang("ulr");?></label>
					</div>

					<div class="boxinputlists">
						<select id="buttonslider" class="input_slide" required>
							<option value=""></option>
							<option value="sin_boton"><?=Luis::lang("sin_boton");?></option>
							<option value="comprar_ahora"><?=Luis::lang("comprar_ahora");?></option>
							<option value="ver_productos"><?=Luis::lang("ver_productos");?></option>
							<option value="mas_categorias"><?=Luis::lang("mas_categorias");?></option>
							<option value="detalles"><?=Luis::lang("detalles");?></option>
							<option value="informacion"><?=Luis::lang("informacion");?></option>
							<option value="ver_catalogo"><?=Luis::lang("ver_catalogo");?></option>
							<option value="descargar_catalogo"><?=Luis::lang("descargar_catalogo");?></option>
							<option value="descargar"><?=Luis::lang("descargar");?></option>
							<option value="descargar_lista"><?=Luis::lang("descargar_lista");?></option>
							<option value="descargar_archivo"><?=Luis::lang("descargar_archivo");?></option>
							<option value="contactar"><?=Luis::lang("contactar");?></option>
							<option value="consultar"><?=Luis::lang("consultar");?></option>
							<option value="registrar"><?=Luis::lang("registrar");?></option>
							<option value="ver_cupon"><?=Luis::lang("ver_cupon");?></option>
							<option value="ver_ofertas"><?=Luis::lang("ver_ofertas");?></option>
						</select>
						<label class="label_input_slide"><?=Luis::lang("nombre_del_boton");?></label>
					</div>
					<hr>
					<h3><?=Luis::lang("escritorio");?></h3>
					<div>
						<span class="infmaximgs">Fotos <span id="coukbox200" class="coukbox">0</span>/1</span>
					</div>
					<span class="addnewimageluisboxusslide afsfdg5" role="button" tabindex="1">
						<div id="litimgecurrrent">
							<img class="addnewimageluisimf butto_slide slide_fuils_lui" src="<?=$base;?>datos/imagenes/icons/imge_add.png" alt="" height="16" width="16">
							<span class="contentaddimgs butto_slide"><?=Luis::lang("no_hay_imagen");?></span>
							<input class="addnewimage_slide adsfdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" multiple="multiple" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*">
						</div>
					</span>
					<br>
					<input type="hidden" id="averagecolor" value="">


					<div class="aphlistbuttonnextopenbox" data="v">
						<span class="aphlistbuttonnextopembox_slider butt_luis_lwos  ">Publicar</span>
						<input id="blocknullfom12_slider" type="submit">
					</div>
				</form>
			</div>
		<?php endif ?>
	<?php else: ?>
		<div class="contentlists_items">
			<h4 class="titulo_paginas"><?=Luis::lang("diapositiva");?></h4>
			<div class="message"></div>
			<a class="add_itembox" href="<?=$base."diapositiva/add"?>">
				<div class="butt_luis_one"><span><?=Luis::lang("agregar");?></span></div>
			</a>
			<hr>
			<?php if(count($diapositiva)>0): ?>
				<?php foreach ($diapositiva as $di): ?>
					<div id="<?="diapositiva_s".$di->id;?>" class="itemsviewslist">
						<div class="contensviewsitstr">
							<span class="nameshiffs"><?php if(!$di->nombre==null){echo($di->nombre);}else{echo('-');}?></span>
							<h4 class="nameshiff">
				               <?php if(!$di->texto==null){echo($di->texto);}else{echo('-');}?>
				            </h4>
				            <hr>
				            <div class="imagen_view">
				            	<?php //$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$s[1]/";
				            	$img_slide = DatosAdmin::diapositiva_image($di->id);
				            	$img_file="./../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/".$di->id."/".$img_slide->imagen;
				            	?>
				            	<?php if(is_file($img_file)): ?>
				            		<div class="imagen_view_list">
				            			<img src="<?="./../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/".$di->id."/thumb_view_".$img_slide->imagen;?>">
				            		</div>
				            	<?php elseif($di->imagen==null): ?>
				            		<div class="image_eliminado_bad">
				            			<span><?=Luis::lang("no_hay_imagen");?></span>
				            		</div>
				            	<?php else: ?>
				            		<div class="image_eliminado_bad">
				            			<span><?=Luis::lang("imagen_eliminado_o_con_error");?></span>
				            		</div>
				            	<?php endif ?>
				            </div>
				            
				            <div class="namesdeskp">
				            	<?=Functions::fechasluislopes($di->fecha);?>
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
					            <a href="<?=$base."diapositiva/update/".$di->id;?>"><div class="boxoptionslistitems"><?=Luis::lang("editar");?></div></a>
					            <?php if(isset($di->codigo)):?>
					            	<?php if($di->activado):?>
					            		<a id="<?=$di->id;?>" class="slidepageopt slidepageopt<?=$di->id; ?>"><div class="boxoptionslistitems"><?=Luis::lang("desactivar");?></div></a>
					              <?php else:?>
					                <a id="<?=$di->id;?>" class="slidepageopt slidepageopt<?=$di->id; ?>"><div class="boxoptionslistitems"><?=Luis::lang("activar");?></div></a>
					              <?php endif;?>
					            <?php endif;?>
					            <div class="boxoptionslistitems diapositivas_eliminar" data="<?=$di->id?>"><?=Luis::lang("eliminar");?></div>
				            </div>
				        </div>
					</div>
				<?php endforeach ?>
			<?php else: ?>
				<div class="noitemsnull">
					<p><?=Luis::lang("no_hay_publicaciones");?></p>
				</div>
			<?php endif ?>
		</div>
	<?php endif ?>
<?php endif ?>


