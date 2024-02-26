<?php
$temas=Luis::listartemas();
$colores=Luis::listacolores();
$base = Luis::basepage("base_page_admin");
$logopaginaweb = Luis::dato("luis_logo")->valor;
?>
<style type="text/css">
	.contenedo_configuration1{display:block;position:relative;width:100%;margin:10px auto;}
	.titulo_config_1{padding:6px;display:block;color:#888;border-bottom:3px solid #ccc;}
	.contiene_logoandicon{position:relative;display:block;background:#fff;border-radius:5px;margin:15px auto;padding:10px;}
</style>

<div class="contenedo_configuration1">
	<p class="titulo_config_1"><?=Luis::lang("configuracion");?></p>

	<div class="contiene_logoandicon">
		<form method="POST" role="form" enctype="multipart/form-data" class="style_box_logo_one" data="l1">
		    <div class="imagenes">
		    	<input hidden="hidden" type="text" name="laimagen" value="<?=$logopaginaweb;?>">
		    	<span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1">
		          <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png";?>" alt="" height="16" width="16">
		          <span class="contentaddimgs"><?=Luis::lang("editar_logo");?></span>
		          <input type="file" id="imagen" name="logo" title="Selecciona imagen" class="addnewimageluisbotsccc adsfdg5" accept="image/*">
		        </span>
		    </div>
			<div class="imagen_pre">
			    <input type="button" id="eliminaimagen_uno" value="x" class="botoneliminar1" data-fl="<?=$logopaginaweb;?>">
			    <img id="vista_previa_imagen" src="<?=$base."datos/imagenes/pagina/".$logopaginaweb;?>" class="vista_previa_uno vista_previa_une">
			</div>
			<input class="butt_luis_lwos" type="submit" name="boton_guardarcambios_logotipo" value="<?=Luis::lang("guardar");?>">
		</form>
	</div>
</div>
<script type="text/javascript">
	function readURL(input, imgControlName) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e){
	      $(imgControlName).attr('src', e.target.result);
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}
	$(document).on("submit", ".style_box_logo_one", function(e){
		e.preventDefault()
		let ls1 = $(this).attr("data-config");
		var fd = new FormData();
		fd.append('l_image', $('#imagen')[0].files[0]);
		fd.append('box', ls1);
		$.ajax({
			type: "POST",
			url: list_urls()+list_action()+"add_logo",
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
              console.log(data)
            }
        });
	})
	
	
$("#imagen").change(function(e) {
  var nombreimagen = e.target.files[0].name;
  var imgControlName = "#vista_previa_imagen";
  readURL(this, imgControlName);
  $('.vista_previa_uno').addClass('luis');
  $('#imagen').attr('title', nombreimagen);
  $('.botoneliminar1').addClass('elimina_activo');
});

$("#eliminaimagen_uno").click(function(e) {
  e.preventDefault();
  $("#imagen").val("");
  $("#vista_previa_imagen").attr('src',list_urls()+"datos/imagenes/pagina/"+$(this).attr("data-fl"));
  $('#imagen').attr('title','Selecciona logo');
  $('.vista_previa_uno').removeClass('luis');
  $('.botoneliminar1').removeClass('elimina_activo');
});
</script>