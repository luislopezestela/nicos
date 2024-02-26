<?php if(isset($_SESSION['admin_id'])):?>
	<style type="text/css">
		.titulo_de_idiomas{
			display:block;
			text-align:center;
			color:#7777;
			margin:15px auto;
			text-transform:uppercase;
		}
		.continelista_de_idiomas{
			display:block;
			width:100%;
			max-width:800px;
			margin:10px auto;
		}
		.lenguages_en_listr{
			background-color:#FFF;
			border-radius:5px;
			padding:10px;
			margin:15px auto;
			cursor:pointer;
			user-select:none;
		}
		.le_en_listrds{
			border:1px solid #ddd;
		}
		.le_en_listr{
			border:1px solid var(--color_primario);
		}
	</style>
	<br>
	<?php 
	$base = BASE_URL_B;
	$languages_data_files = DatosLang::luis_lang_bd_names();
	?>
	<h2 class="titulo_de_idiomas"><?="Idiomas";?></h2>
<?php $lg_lang1 = Functions::lang_data("admin");
		require 'datos/language/'.$lg_lang1.'.php';  
echo $titulo_error;

		?>


	<div class="continelista_de_idiomas">
		<?php $user = DatosUsuario::porId($_SESSION['admin_id']);?>
		<?php if(count($languages_data_files)>0):?>
			<?php foreach ($languages_data_files as $d):?>
				<?php if($user->idioma):
						$idiomapages=$user->idioma;
					?>
				<?php else: ?>
					<?php if(Luis::lenguagedeUsuario()=="es"){
						$idiomapages = "es_spanish";
					}elseif(Luis::lenguagedeUsuario()=="en"){
					    $idiomapages = "en_ingles";
					}else{
						$idiomapages = "es_spanish";
					} ?>
				<?php endif ?>
				<?php if($d==$idiomapages){
						$active_lang="le_en_listr";
					}else{
						$active_lang="le_en_listrds";
					} ?>
				<div class="lenguages_en_listr <?=$active_lang;?>" data="<?=$d;?>">
					<?php $lg_langxz = substr($d, strrpos($d, '_')+1); ?>
					<p><?=ucwords($lg_langxz);?></p>
				</div>
			<?php endforeach ?>
			<script type="text/javascript">
				$(document).on("click", ".lenguages_en_listr", function(){
					var confi = $(this).attr("data");
					$.ajax({
						type:"POST",
						url: list_urls()+list_action()+"config_idioma_user",
						data: {idioma:confi},
						cache: false,
						success: function(data){
							location.reload()
						}
					});
				});
			</script>
		<?php else: ?>
		<?php endif ?>
	</div>
<?php else: ?>
<?php endif ?>
