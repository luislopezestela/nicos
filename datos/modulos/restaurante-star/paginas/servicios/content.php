<?php $publicaciones_cs = lui_publicaciones_sdw(); ?>
<div class="header_servicios_page">
	<span class="head_cont_servicios_wrap">
		<span class="head_cont_servicios_bg" style="background-image: url(&quot;<?php echo $wo['config']['theme_url'];?>/img/present.<?php echo $wo['config']['portada_extension'];?>&quot;);"></span>
	</span>
	<div class="head_cont_servicios_row">
		<div class="head_cont_servicios_colum">
			<div class="contenido_text_col_head_ser">
				<div class="ser_ser_col_text">
					<h6>Servicios</h6>
					<h1>Aklla Servicios</h1>
				</div>
			</div>
		</div>
		<div class="head_cont_servicios_columb"></div>

	</div>
</div>

<section class="section_publicaction">
	<?php foreach ($publicaciones_cs as $cs_p): ?>
		<article class="publicacion_br">
			<div class="columna_imagen">
				<span>
					<img decoding="async" width="768" height="1024" src="<?=$urlimag  = $wo['config']['site_url'].'/'.$cs_p['url'].$cs_p['imagen']; ?>" alt="" title="hidromasajes" srcset="<?=$urlimag  = $wo['config']['site_url'].'/'.$cs_p['url'].$cs_p['imagen']; ?> 768w, <?=$urlimag  = $wo['config']['site_url'].'/'.$cs_p['url'].$cs_p['imagen']; ?> 480w" sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 768px, 100vw">
				</span>
			</div>
			<div class="columna_texto">
				<span>
					<h2><?=$cs_p['nombre'];?></h2>
					<p><?=$cs_p['descripcion'];?></p>
				</span>
			</div>
		</article>
	<?php endforeach ?>
</section>
