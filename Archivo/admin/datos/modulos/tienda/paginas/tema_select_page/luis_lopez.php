<?php
$base = Luis::basepage("base_page_admin");
$temas=Luis::listartemas();
$active=false;
$tema_view=false;
$active_colk=false;
$active_colk_page=false;
$selec_cold=false;
 ?>

<style type="text/css">
	.suptitles_skin{
		display:block;
		text-align:center;
		color:#7777;
		margin:15px auto;
		text-transform:uppercase;
	}
	.boxtemas {
	    border: 2px solid #ccc;
	    cursor: pointer;
	    transition: all 0.5s;
	    display:block;
	    margin: 15px 7px;
	    width: calc(100% - 16.5px);
	    background-color: #fff;
	    border-radius: 3px;
	    padding: 17px;
	}
	.activetema{
		border:2px solid var(--color_primario);
	}
	.boxtemas p{padding:10px;color:#777;}
	.temneas_skins_cont{display:block;
		width:100%;border-top:1px solid #9999;margin:5px auto;}
	.button_select_skins{padding:5px 7px;background:var(--color_primario);color:var(--color_a);border:5px;display:inline-block;}
	.button_select_skins a{color:var(--color_a);}
</style>
 <div class="contenido">
	<h2 class="suptitles_skin"><?=Luis::lang("temas");?></h2>
	<?php foreach($temas as $t):
		if($active==$t->estado){
			$typeactive="activartema";
			$typeactives="activartemas";
			$tselect=Luis::lang("seleccionar");
			$admin_skin=false;
		}else{
			$tselect=Luis::lang("seleccionado");
			$typeactive="activetema";
			$typeactives="activetemas";
			$admin_skin=true;
		}
	?>
		<div class="boxtemas <?=$typeactive;?>" data="<?=$t->id;?>">
			<?=html_entity_decode(Luis::lang($t->nombre_label));?>
			<p><?=$t->nombre_skin;?></p>
			<span>V: <?=$t->version;?></span>
			<div class="temneas_skins_cont">
				<span class="button_select_skins <?=$typeactives;?>" data="<?=$t->id;?>"><?=$tselect;?></span>
				<?php if ($admin_skin): ?>
					<span class="button_select_skins"><a href="<?=$base."administrar_skin/".$t->nombre;?>"><?=Luis::lang("personalizar");?></a></span>
				<?php endif ?>
			</div>
		</div>
	<?php endforeach ?>
</div>

<script type="text/javascript">
	$(document).on("click", ".activartemas", function(){
		var confi = $(this).attr("data");
		var urline=$("#ur_timeline").attr("data");
		$.ajax({
			type:"POST",
			url: list_urls()+list_action()+"configpages",
			data: {confiparent:confi},
			cache: false,
			success: function(data){
				location.reload()
			}
		});
	});
</script>