
<?php
$temas=Luis::listartemas();
$colores=Luis::listacolores();
$active=false;
$tema_view=false;
$active_colk=false;
$active_colk_page=false;
$selec_cold=false;
?>
<div class="contenido">
	<?php foreach($temas as $t):
		if($active==$t->estado){
		}else{
			$active_colk=$t->color_admin;
			$active_colk_page=$t->color_page;
			$tema_view=$t->id;
		}
	?>
	<?php endforeach ?>
</div>
<br>
 <span class="suptitles"><?="Colores";?></span>
 <br>
 <p class="center_color_title">Color de pagina administrador</p>
<div class="palet_colors" data="<?=$tema_view;?>">
	<?php foreach($colores as $c): ?>
		<?php if($c->id===$active_colk): ?>
			<?php $selec_cold='<span class="colorviewactive"></span>';?>
			<?php else: ?>
			<?php $selec_cold='';?>
		<?php endif ?>
		<?='<div class="color_view color_config" style="background:'.$c->color_primario.';border:4px solid '.$c->color_segundario.';" data="'.$c->id.'">'.$selec_cold.'</div>';?>
	<?php endforeach ?>
</div>
<script type="text/javascript">
	$(document).on("click", ".color_config", function(){
		var confi = $(this).attr("data");
		var page_view_color = $(".palet_colors").attr("data");
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"configcolors",
			data: {colorparent:confi,page_view_c:page_view_color},
			cache: false,
			success: function(data){
				location.reload()
			}
		});
	});
</script>