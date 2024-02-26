<?php 
$servicios = DatosAdmin::servicios_lista();
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
    <li><a href="<?=$base."servicios";?>"><?=Luis::lang("servicios");?></a></li>
    <li class="active">Add</li>
    <?php elseif($urbp==="update"): ?>
    <li><a href="<?=$base."servicios";?>"><?=Luis::lang("servicios");?></a></li>
    <li class="active">Update</li>
    <?php elseif($urbp==="administrar"): ?>
    <li><a href="<?=$base."servicios";?>"><?=Luis::lang("servicios");?></a></li>
    <li class="active">administrar</li>
    <li class="active"><?=DatosAdmin::serv_view($urb[2])->nombre;?></li>
    <?php else: ?>
    <li class="active"><?=Luis::lang("servicios");?></li>
    <?php endif ?>
  </ol>
</section>

<?php if(count($urb)>3): ?>
	<?php header('location:'.$base.'servicios'); ?>
<?php else: ?>
	<?php if(isset($urb[2])): ?>
		<?php if(isset($urb[1])): ?>
			<?php if($urb[1]==="update"): ?>
				<?php if(isset($urb[2])==$urb[2]): ?>
					<?php $service = DatosAdmin::serv_view($urbs);?>
					<?php if(isset($service->nombre)): ?>
						<div class="contentlists_items">
							<form id="update_slider_page" role="form" method="POST" enctype="multipart/form-data">
								<h4 class="titulo_paginas"><?=Luis::lang("editar");?></h4>
								<div class="message"></div>
								<hr>
								<div class="boxinputlists">
									<input id="tituloslider" class="input_slide" type="text" value="<?php if($service->nombre){echo(html_entity_decode($service->nombre));}else{};?>" required>
									<label class="label_input_slide"><?=Luis::lang("nombre");?></label>
								</div>
								<hr>
								<div>
									<span class="infmaximgs"><?=Luis::lang("icono");?> <span id="coukbox200" class="coukbox">1</span>/1</span>
								</div>
								<span class="addnewimageluisboxusservicios afyfdg5" role="button" tabindex="1">
									<div id="litimgecurrrent_ser">
										<img class="addnewimageluisimf butto_servicios adsaddslid slide_fuils_lui" src="<?=$base;?>datos/imagenes/icons/imge_add.png" alt="" height="16" width="16">
										<span class="contentaddimgs butto_servicios adsaddslid"><?=Luis::lang("no_hay_imagen");?></span>
										<input class="addnewimage_servicios adsgdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" multiple="multiple" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*" disabled>

										<span class="addnewimageluisboxud" id="gVO3Ue6Pc4">
											<span class="addnewimageluisboxudremove">
												<img src="<?=$base;?>datos/imagenes/icons/csacdjkclos.png">
											</span>
											<img class="addnewimageluisboxudimage svv" src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_ad_".$service->icono;?>" title="Icono">
										</span>
									</div>
								</span>
								<br>
								<div class="aphlistbuttonnextopenbox" data="<?=$service->id;?>">
									<span class="aphlistbuttonnextopembox_servicios_update butt_luis_lwos">Publicar</span>
									<input id="blocknullfom12_slider_update" hidden="hidden" type="submit">
								</div>
							</form>
						</div>
						<?php else: ?>
							<?php header('location:'.$base.'servicios');?>
						<?php endif ?>
				<?php else: ?>
					<?php header('location:'.$base.'servicios');?>
				<?php endif ?>
			<?php elseif($urb[1]==="administrar"): ?>
				<?php if(isset($urb[2])==$urb[2]): ?>
					<?php $service = DatosAdmin::serv_view($urbs);?>
					<?php if(isset($service->nombre)): ?>
						<div class="contentlists_items">
								<h4 class="titulo_paginas"><?=Luis::lang('administrar');?></h4>
								<div class="administrar_pages_services">
									<span class="nombre_administ_service"><?php if($service->nombre){echo(html_entity_decode($service->nombre));}else{};?></span>
									<?php $img_file="./../datos/modulos/".Luis::temass()."/source/imagenes/servicios/".$service->icono; ?>
									<?php if(is_file($img_file)): ?>
										<div class="imagen_view_list_service">
											<img src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_".$service->icono;?>">
										</div>
									<?php elseif($service->icono==null): ?>
										<div class="image_eliminado_bad">
											<span><?=Luis::lang("no_hay_imagen");?></span>
										</div>
									<?php else: ?>
										<div class="image_eliminado_bad">
											<span><?=Luis::lang("imagen_eliminado_o_con_error");?></span>
										</div>
									<?php endif ?>
								</div>
								
								<div class="message"></div>
								
								<hr>
								<form id="new_service_page_ads_datas" role="form" method="POST" enctype="multipart/form-data">
									<div class="nueva_publicacion_data">
										<div class="boxinputlists">
											<textarea id="textpublix_data" class="input_slide" required></textarea>
											<label class="label_input_slide label_input_service"><?=Luis::lang("nombre");?></label>
										</div>
										<span id="coukbox200" class="coukbox coukboxnon_service">0</span>
										<span class="addnewimageluisboxusservicios_ads afsfdg5" role="button" tabindex="1">
											<div id="litimgecurrrent_ser_ads">
												<img class="addnewimageluisimf butto_servicios slide_fuils_lui" src="<?=$base;?>datos/imagenes/icons/imge_add.png" alt="" height="16" width="16">
												<input class="addnewimage_servicios_ads adsfdg5" data-got="<?=$base;?>" type="file" id="files_services" name="files[]" multiple="multiple" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*">
											</div>
										</span>
										<input type="hidden" id="averagecolor" value="">
										<div class="aphlistbuttonnextopenbox" data="<?=$service->id;?>">
											<span class="aphlistbuttonnextopembox_servicios_ads butt_luis_lwos">Publicar</span>
											<input id="new_service_page_ads" type="submit">
										</div>
										<br>

									</div>
								</form>

								<div class="publicaciones_de_servicios_contenido">
									<?php $publicaciones_lists = DatosAdmin::vista_previa_lp($service->id); ?>
									<?php if(count($publicaciones_lists)>0): ?>
										<?php foreach ($publicaciones_lists as $ps): ?>
											<div id="<?="service_s_ads".$ps->id;?>" class="itemsviewslist_ads">
												<div class="contensviewsitstr">
													<span class="nameshiffs"><?php if(!$ps->texto==null){echo(html_entity_decode($ps->texto));}else{echo('-');}?></span>
										            <hr>
										            <div class="imagen_view">
										            	<?php
										            	$img_file="./../datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$service->id."/".$ps->imagen;
										            	?>
										            	<?php if(is_file($img_file)): ?>
										            		<div class="imagen_view_list_public">
										            			<img src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$service->id."/".$ps->imagen;?>" data-modal-trigger="ver_public_post_opcion<?=$ps->id;?>">
										            		</div>
										            		<div class="modal" data-modal-name="ver_public_post_opcion<?=$ps->id;?>" data-modal-dismiss>
										            			<div class="modal__dialog">
										            				<div class="modal__header">
										            					<p class="modal__title"><?php if(!$ps->texto==null){echo(html_entity_decode($ps->texto));}else{echo('-');}?></p>
										            					<i class="modal__close" data-modal-dismiss="">X</i>
										            				</div>
										            				<div class="modal__content">
										            					<img src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$service->id."/".$ps->imagen;?>" data-modal-trigger="ver_public_post_opcion<?=$ps->id;?>">
										            					<div class="namesdeskp">
										            						<p><?=Functions::fechasluislopes($ps->fecha);?></p>
										            					</div>
										            				</div>
										            			</div>
										            		</div>
										            	<?php elseif($ps->imagen==null): ?>
										            	<?php else: ?>
										            		<div class="image_eliminado_bad">
										            			<span><?=Luis::lang("imagen_eliminado_o_con_error");?></span>
										            		</div>
										            	<?php endif ?>
										            </div>
										            
										            <div class="namesdeskp">
										            	<?=Functions::fechasluislopes($ps->fecha);?>
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
											            <div class="boxoptionslistitems servicios_ads_public_eliminar" data="<?=$ps->id?>"><?=Luis::lang("eliminar");?></div>
										            </div>
										        </div>
											</div>
										<?php endforeach ?>
									<?php else: ?>
										<div class="image_eliminado_bad">
											<span><?=Luis::lang("no_hay_publicaciones");?></span>
										</div>
									<?php endif ?>
								</div>
						</div>
						<?php else: ?>
							<?php header('location:'.$base.'servicios');?>
						<?php endif ?>
				<?php else: ?>
					<?php header('location:'.$base.'servicios');?>
				<?php endif ?>
			<?php else: ?>
				<?php header('location:'.$base.'servicios');?>
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
						<label class="label_input_slide"><?=Luis::lang("nombre");?></label>
					</div>
					<hr>
					<div>
						<span class="infmaximgs"><?=Luis::lang("icono");?> <span id="coukbox200" class="coukbox">0</span>/1</span>
					</div>
					<span class="addnewimageluisboxusservicios afsfdg5" role="button" tabindex="1">
						<div id="litimgecurrrent_ser">
							<img class="addnewimageluisimf butto_servicios slide_fuils_lui" src="<?=$base;?>datos/imagenes/icons/imge_add.png" alt="" height="16" width="16">
							<span class="contentaddimgs butto_servicios"><?=Luis::lang("no_hay_imagen");?></span>
							<input class="addnewimage_servicios adsfdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" multiple="multiple" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*">
						</div>
					</span>
					<br>
					<input type="hidden" id="averagecolor" value="">


					<div class="aphlistbuttonnextopenbox" data="v">
						<span class="aphlistbuttonnextopembox_servicios butt_luis_lwos  ">Publicar</span>
						<input id="blocknullfom12_slider" type="submit">
					</div>
				</form>
			</div>
		<?php endif ?>
	<?php else: ?>
		<div class="contentlists_items">
			<h4 class="titulo_paginas"><?=Luis::lang("servicios");?></h4>
			<div class="message"></div>
			<a class="add_itembox" href="<?=$base."servicios/add"?>">
				<div class="butt_luis_one"><span><?=Luis::lang("agregar");?></span></div>
			</a>
			<hr>
			<div class="conten_services">
				<?php if(count($servicios)>0): ?>
					<?php foreach ($servicios as $ser): ?>
						<div id="<?="servicios_lisps".$ser->id;?>" class="itemsviewslist">
							<div class="contensviewsitstr">
								<span class="nameshiffs"><?php if(!$ser->nombre==null){echo($ser->nombre);}else{echo('-');}?></span>
					            <hr>
					            <div class="imagen_view">
					            	<?php
					            	$img_file="./../datos/modulos/".Luis::temass()."/source/imagenes/servicios/".$ser->icono;
					            	?>
					            	<?php if(is_file($img_file)): ?>
					            		<div class="imagen_view_list">
					            			<img src="<?="./../datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_ad_".$ser->icono;?>">
					            		</div>
					            	<?php elseif($ser->icono==null): ?>
					            		<div class="image_eliminado_bad">
					            			<span><?=Luis::lang("no_hay_imagen");?></span>
					            		</div>
					            	<?php else: ?>
					            		<div class="image_eliminado_bad">
					            			<span><?=Luis::lang("imagen_eliminado_o_con_error");?></span>
					            		</div>
					            	<?php endif ?>
					            </div>
					            <?php $publics_data_posts = DatosAdmin::vista_previa_lp($ser->id); ?>
					            <?php $countlist_posts = count($publics_data_posts); ?>
					            <div class="count_publics_data_view_in_page"><p><span><?=$countlist_posts; ?></span> <?=Luis::lang("publicaciones");?></p></div>
					            <div class="namesdeskp">
					            	<?=Functions::fechasluislopes($ser->fecha);?>
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
						            <a href="<?=$base."servicios/administrar/".$ser->url;?>"><div class="boxoptionslistitems"><?=Luis::lang("administrar");?></div></a>
						            <a href="<?=$base."servicios/update/".$ser->url;?>"><div class="boxoptionslistitems"><?=Luis::lang("editar");?></div></a>
						            <?php if(isset($ser->codigo)):?>
						            	<?php if($ser->activado):?>
						            		<a id="<?=$ser->id;?>" class="public_post_data_opt public_post_data_opt<?=$ser->id; ?>"><div class="boxoptionslistitems"><?=Luis::lang("desactivar");?></div></a>
						              <?php else:?>
						                <a id="<?=$ser->id;?>" class="public_post_data_opt public_post_data_opt<?=$ser->id; ?>"><div class="boxoptionslistitems"><?=Luis::lang("activar");?></div></a>
						              <?php endif;?>
						            <?php endif;?>
						            <div class="boxoptionslistitems servicios_eliminar" data="<?=$ser->id?>"><?=Luis::lang("eliminar");?></div>
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
		</div>
	<?php endif ?>
<?php endif ?>


