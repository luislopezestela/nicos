<?php if(isset($_SESSION['admin_id'])):
$moneda = DatosAdmin::Mostrar_las_monedas_admin();

$servicios = DatosAdmin::servicios_lista();
$base = Luis::basepage("base_page_admin");
$base_a = Luis::basepage("base_page");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
?> 
<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>"><?=Luis::lang("inicio");?></a></li>
    <?php if($urbp==="add"): ?>
    <li><a href="<?=$base."moneda";?>"><?=Luis::lang("divisas");?></a></li>
    <li class="active"><?=Luis::lang("agregar");?></li>
    <?php elseif($urbp==="update"): ?>
    <li><a href="<?=$base."moneda";?>"><?=Luis::lang("divisas");?></a></li>
    <li class="active"><?=Luis::lang("editar");?></li>
    <?php elseif($urbp==="administrar"): ?>
    <li><a href="<?=$base."moneda";?>"><?=Luis::lang("divisas");?></a></li>
    <li class="active"><?=Luis::lang("administrar");?></li>
    <li class="active"><?=DatosAdmin::Mostrar_las_monedas_por_id($urb[2])->moneda;?></li>
    <?php else: ?>
    <li class="active"><?=Luis::lang("divisas");?></li>
    <?php endif ?>
  </ol>
</section>

<?php if(count($urb)>3): ?>
	<?php header('location:'.$base.'moneda'); ?>
<?php else: ?>
	<?php if(isset($urb[2])): ?>
		<?php if(isset($urb[1])): ?>
			<?php if($urb[1]==="update"): ?>
				<?php if(isset($urb[2])==$urb[2]): ?>
					<?php $moneda_v = DatosAdmin::Mostrar_las_monedas_por_id($urbs);?>
					<?php if(isset($moneda_v->nombre)): ?>
						<div class="contentlists_items">
							<form class="but_moneda_up" data="<?=$moneda_v->id;?>">
								<h4 class="titulo_paginas"><?=Luis::lang("agregar");?></h4>
								<div class="boxinputlists">
									<input class="input_slide name_mon" type="text" value="<?=html_entity_decode($moneda_v->nombre);?>">
									<label class="label_input_slide"><?=Luis::lang("nombre");?></label>
								</div>
								<div class="boxinputlists">
									<input class="input_slide moned_mon" type="text" value="<?=$moneda_v->moneda;?>">
									<label class="label_input_slide"><?=Luis::lang("moneda");?></label>
								</div>
								<div class="boxinputlists">
									<input class="input_slide simb_mon" type="text" value="<?=$moneda_v->simbolo;?>">
									<label class="label_input_slide"><?=Luis::lang("simbolo");?></label>
								</div>
								<span class="addnewimageluisboxusservicios" role="button">
									<div id="litimgecurrrent_ser">
										<input class="addnewimage_servicios icon_mon" type="file" id="imagen" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*">
										<span class="addnewimageluisboxud">
											
											<?php if($moneda_v->icon): ?>
												<span id="eliminaimagen_dos" class="botoneliminar1" data-ird="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$moneda_v->icon;?>" data-x="0">
													<img src="<?=$base;?>datos/imagenes/icons/csacdjkclos.png">
												</span>
												<img id="vista_previa_imagen" class="vista_previa_mons addnewimageluisboxudimage" src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$moneda_v->icon;?>">
											<?php else: ?>
												<span id="eliminaimagen_dos" class="botoneliminar1" data-ird="<?=$base."datos/imagenes/icons/imge_add.png";?>" data-x="1">
													<img src="<?=$base;?>datos/imagenes/icons/csacdjkclos.png">
												</span>
												<img id="vista_previa_imagen" class="vista_previa_mons addnewimageluisboxudimage" src="<?=$base;?>datos/imagenes/icons/imge_add.png" height="16" width="16">
											<?php endif ?>
										</span>
									</div>
								</span>
								<div class="aphlistbuttonnextopenbox">
									<input type="submit" name="" class="but_moneda_ad_b butt_luis_lwos" value="<?=Luis::lang("guardar");?>">
								</div>
							</form>
						</div>
						<?php else: ?>
							<?php header('location:'.$base.'moneda');?>
						<?php endif ?>
				<?php else: ?>
					<?php header('location:'.$base.'moneda');?>
				<?php endif ?>
			<?php else: ?>
				<?php header('location:'.$base.'moneda');?>
			<?php endif ?>
		<?php endif ?>
	<?php elseif(isset($urb[1])): ?>
		<?php if($urb[1]==="add"): ?>
			<div class="contentlists_items">
				<form class="but_moneda_ad">
					<h4 class="titulo_paginas"><?=Luis::lang("agregar");?></h4>
					<div class="boxinputlists">
						<input class="input_slide name_mon" type="text">
						<label class="label_input_slide"><?=Luis::lang("nombre");?></label>
					</div>
					<div class="boxinputlists">
						<input class="input_slide moned_mon" type="text">
						<label class="label_input_slide"><?=Luis::lang("moneda");?></label>
					</div>
					<div class="boxinputlists">
						<input class="input_slide simb_mon" type="text">
						<label class="label_input_slide"><?=Luis::lang("simbolo");?></label>
					</div>
					<span class="addnewimageluisboxusservicios" role="button">
						<div id="litimgecurrrent_ser">
							<input class="addnewimage_servicios icon_mon" type="file" id="imagen" title="<?=Luis::lang("agregar_una_imagen");?>" accept="image/*">
							<span class="addnewimageluisboxud">
								<span id="eliminaimagen_uno" class="botoneliminar1" data-ird="<?=$base;?>">
									<img src="<?=$base;?>datos/imagenes/icons/csacdjkclos.png">
								</span>
								<img id="vista_previa_imagen" class="vista_previa_mons addnewimageluisboxudimage" src="<?=$base;?>datos/imagenes/icons/imge_add.png" height="16" width="16">
							</span>
						</div>
					</span>
					<div class="aphlistbuttonnextopenbox">
						<input type="submit" name="" class="but_moneda_ad_b butt_luis_lwos" value="<?=Luis::lang("publicar");?>">
					</div>
				</form>
			</div>
		<?php endif ?>
	<?php else: ?>
		<div class="contentlists_items">
			<h4 class="titulo_paginas"><?=Luis::lang("divisas");?></h4>
			<div class="message"></div>
		  <a class="add_itembox" href="<?=$base."moneda/add";?>">
				<div class="butt_luis_one"><span><?=Luis::lang("agregar");?></span></div>
			</a>
			<hr> 
			
			<div class="conten_services">
				<?php if(count($moneda)>0): ?>
					<?php foreach ($moneda as $ser): ?>
						<?php $moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
						?>
						<?php if($ser->principal==1){$mon_ac="le_en_listr";}elseif($ser->estado==1){$mon_ac="le_en_activ";}else{$mon_ac="le_en_listrds";}?>
						<div class="itemsviewslist moned_en_listr <?="moned_en_".$ser->id;?> <?=$mon_ac;?>">
							<div class="contensviewsitstr">
								<span class="nameshiffs"><?php if(!$ser->moneda==null){echo($ser->moneda);}else{echo('-');}?></span>
					            <div class="imagen_view">
					            	<?php
					            	$img_file="./../datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$ser->icon;
					            	?>
					            	<?php if(is_file($img_file)): ?>
					            		<div class="imagen_view_list">
					            			<img src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$ser->icon;?>">
					            		</div>
					            	<?php elseif($ser->icon==null): ?>
					            		<div class="image_eliminado_bad">
					            			<span><?=Luis::lang("no_hay_imagen");?></span>
					            		</div>
					            	<?php else: ?>
					            		<div class="image_eliminado_bad">
					            			<span><?=Luis::lang("imagen_eliminado_o_con_error");?></span>
					            		</div>
					            	<?php endif ?>
					            </div>
					            <span class="nameshiffs"><?php if(!$ser->nombre==null){echo($ser->nombre);}else{echo('-');}?></span>
					            <?php $cambio_tipo = 0; ?>
					            <?php if($ser->principal==1): ?>
					            	<div class="nameshiffs"><?=Luis::lang("principal") ?></div>
					            <?php else: ?>
					            <?php endif ?>
					            
					        </div>
					        <div class="opcionesblocklist opcionesblocklist1000boxlist">
					        	<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
					              <span class="opcionesblocklistoption opcionesblocklistoption100">
					                <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
					              </span>
					            </a>
					            <div class="boxoptionslistlines">
					            	<div class="makposdind"></div>
						            <div class="boxoptionslistitems moned_en_listr_bl" data="<?=$ser->id;?>"><?=Luis::lang("principal");?></div>
						            <a href="<?=$base."moneda/update/".$ser->id;?>"><div class="boxoptionslistitems"><?=Luis::lang("editar");?></div></a>
						            <?php if($ser->estado):?>
						            	<a data="<?=$ser->id;?>" class="moned_en_listr_fun <?="moned_en_b".$ser->id; ?>"><div class="boxoptionslistitems"><?=Luis::lang("desactivar");?></div></a>
						            <?php else:?>
						            	<a data="<?=$ser->id;?>" class="moned_en_listr_fun <?="moned_en_b".$ser->id; ?>"><div class="boxoptionslistitems"><?=Luis::lang("activar");?></div></a>
						            <?php endif;?>
						            <div class="boxoptionslistitems moneds_ss_eliminar" data="<?=$ser->id?>"><?=Luis::lang("eliminar");?></div>
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
	
<?php else: ?>
<?php endif ?>

<script type="text/javascript">
	$(document).on("click", ".moned_en_listr_bl", function(){
		var confi = $(this).attr("data");
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"config_moneda_pages",
			data: {moneda:confi},
			cache: false,
			success: function(data){
				window.location.reload();
			}
		});
	});

if ($(".moneds_ss_eliminar").length){
	$(document).on("click", ".moneds_ss_eliminar", function(){
		var confi = $(this).attr("data");
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"del_moneda_s",
			data: {moneda:confi},
			cache: false,
			dataType:"json",
			success: function(data){
				$(".moned_en_"+confi).slideUp();
			}
		});
	});
}
	$(document).on("click", ".moned_en_listr_fun", function(){
		var confi = $(this).attr("data");
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"config_moneda_s",
			data: {moneda:confi},
			cache: false,
			dataType:"json",
			success: function(data){
				$(".moned_en_b"+confi).html(data.cl);
				if(data.tipo===1){
					$(".moned_en_"+confi).removeClass(data.cla);
				}else{
					$(".moned_en_"+confi).addClass(data.cla);
				}
				
			}
		});
	});

if($("#imagen").length){
var formData = new FormData();
formData.append('name',$(".name_mon").val());
formData.append('moneda',$(".moned_mon").val());
formData.append('simbolo',$(".simb_mon").val());
formData.append('icon',$(".icon_mon")[0].files[0]);

	$(document).on("submit", ".but_moneda_ad", function(e){
		e.preventDefault();
		formData.set('name',$(".name_mon").val());
		formData.set('moneda',$(".moned_mon").val());
		formData.set('simbolo',$(".simb_mon").val());
		formData.set('icon',$(".icon_mon")[0].files[0]);
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"add_moneda_divi",
			data:formData,
			contentType: false,
			processData: false,
			cache: false,
			dataType:"json",
			success: function(data){
				if(data.tipo===1){
					alertexito(data.mensaje);
					$('.but_moneda_ad')[0].reset();
					$("#eliminaimagen_uno").click()
				}else{
					alertadvertencia(data.mensaje);
				}
				if(data.cl){
					$("."+data.cl).focus();
				}
				
			}
		});
	});

	$(document).on("submit", ".but_moneda_up", function(e){
		e.preventDefault();
		formData.set('name',$(".name_mon").val());
		formData.set('moneda',$(".moned_mon").val());
		formData.set('simbolo',$(".simb_mon").val());
		formData.set('icon',$(".icon_mon")[0].files[0]);
		formData.append('mos', $(this).attr("data"));
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"up_moneda_divi",
			data:formData,
			contentType: false,
			processData: false,
			cache: false,
			dataType:"json",
			success: function(data){
				console.log(data)
				if(data.tipo===1){
					alertexito(data.mensaje);
					$("#eliminaimagen_dos").click()
					$("#vista_previa_imagen").attr('src', data.img);
				}else{
					alertadvertencia(data.mensaje);
				}
				if(data.cl){
					$("."+data.cl).focus();
				}
				
			}
		});
	});

function readURL(input, imgControlName) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      $(imgControlName).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}


$("#imagen").change(function(e) {
	$("#vista_previa_imagen").removeAttr("height");
	$("#vista_previa_imagen").removeAttr("width");
	var nombreimagen = e.target.files[0].name;
	var imgControlName = "#vista_previa_imagen";
	readURL(this, imgControlName);
	$('#imagen').attr('title', nombreimagen);
	$('.botoneliminar1').addClass('elimina_activo');
});

$("#eliminaimagen_uno").click(function(e) {
	e.preventDefault();
	let ibas = $(this).attr("data-ird");
	$("#imagen").val("");
	$("#vista_previa_imagen").attr("src", ibas+"datos/imagenes/icons/imge_add.png");
	$("#vista_previa_imagen").attr("height", '16');
	$("#vista_previa_imagen").attr("width", '16');
	$('#imagen').attr('title','Selecciona imagen');
	$('.botoneliminar1').removeClass('elimina_activo');
});

$("#eliminaimagen_dos").click(function(e) {
	e.preventDefault();
	let ibas = $(this).attr("data-ird");
	let ibasx = $(this).attr("data-x");
	$("#imagen").val("");
	$("#vista_previa_imagen").attr("src", ibas);
	if(ibasx===1){
		$("#vista_previa_imagen").attr("height", '16');
		$("#vista_previa_imagen").attr("width", '16');
		$('#imagen').attr('title','Selecciona imagen');
	}
	
	$('.botoneliminar1').removeClass('elimina_activo');
});
}
</script>