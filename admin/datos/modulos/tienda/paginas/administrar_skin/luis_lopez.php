<style type="text/css">
	.box_colors_page{
		background:#ddd;
		padding:10px;
	}
.suptitles{font-weight:600;font-size:22px;display:block;border-bottom:1px solid rgba(0,0,0,0.13);}
.boxtemas{border:1px solid #ccc;cursor:pointer;transition:all 0.5s;display:inline-block;margin:5px 7px;width:calc(50% - 16.5px);background-color:#fff;border-radius:3px;padding:17px;}
.activetema{border:1px solid #3498db;}
.boxtemas:hover{border-radius:12px;}
.palet_colors{display:flex;overflow-x:scroll;overflow-y:hidden;width:calc(100% - 15px);margin:17px auto;}
.colorviewactive{display:flex;flex-wrap:wrap;
flex-direction:column;align-items:center;align-self:center;justify-content:center;height:100%;}
.colorviewactive::before{
	display:flex;
	flex-direction:column;
	align-items:center;
	align-self:center;
	content:"✓";
	height:100%;
	max-height:100%;
	color:var(--color_a);
	justify-content:center;
}
.color_view{display:inline-block;flex-direction:row;border-radius:5px;height:50px;width:54px;min-width:54px; cursor:pointer;margin:2px}
.palet_colors::-webkit-scrollbar{width:5px;height:5px;}

	.contiene_config_temas{
		display:block;
		width:100%;
		max-width:1280px;
		margin:10px auto;
	}

</style>
<?php
$temas=Luis::listartemas();
$colores=Luis::listacolores();
$active=false;
$tema_view=false;
$active_colk=false;
$active_colk_page=false;
$selec_cold=false;
foreach($temas as $t){
	if($active==$t->estado){
	}else{
		$active_colk_page=$t->color_page;
		$tema_view=$t->id;
	}
}

$base = Luis::basepage("base_page_admin");
if($_SESSION['admin_id']):
	$urb=explode("/", $_GET["paginas"]);
	if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
	?>
	<?php if($urbp): ?>
		<?php $skin_view = Luis::administrar_el_tema($urbp);?>
		<?php if($skin_view):
			$logopagina = Luis::dato("luis_logo")->valor;
			$head=Functions::header_disp();
			$footer=Functions::footer_disp(); 
			?>
			<div class="box_colors_page">
				<?=Luis::lang('color')?>
				<div class="palet_colors" data="<?=$tema_view;?>">
					<?php foreach($colores as $c): ?>
						<?php if($c->id===$active_colk_page): ?>
							<?php $selec_cold='<span class="colorviewactive"></span>';?>
							<?php else: ?>
							<?php $selec_cold='';?>
						<?php endif ?>
						<?='<div class="color_view color_config_pages" style="background:'.$c->color_primario.';border:4px solid '.$c->color_segundario.';" data="'.$c->id.'">'.$selec_cold.'</div>';?>
					<?php endforeach ?>
				</div>
			</div>
			<div class="contiene_config_temas">




			</div>

			<script type="text/javascript">
				$(document).on("click", ".color_config_pages", function(){
					var confi = $(this).attr("data");
					var page_view_color = $(".palet_colors").attr("data");
					$.ajax({
						type:"POST",
						url:list_urls()+list_action()+"configcolors_page",
						data: {colorparent:confi,page_view_c:page_view_color},
						cache: false,
						success: function(data){
							location.reload()
						}
					});
				});
			</script>
		<?php else: //////////////////////////////////////////?>
			<?php header('location:'.$base."tema_select_page");?>
		<?php endif ?>
	<?php else: ?>
		<?php header('location:'.$base."tema_select_page");?>
	<?php endif ?>

<?php else: ?>
<?php endif ?>