<div class="luis_header_content">
	<div class="luis_header_seccion_b luis_header_seccion et_pb_with_background et_section_regular">
		<span class="luis_header_present_wrap">
			<span class="luis_header_present" id="luis_presentations" style="background-image: url(&quot;<?php echo $wo['config']['theme_url'];?>/img/present.<?php echo $wo['config']['portada_extension'];?>&quot;);"></span>
		</span>
		<div class="luis_content_rows">
			<div class="luis_content_column luis_column_child">
				<div class="animation_zoom_one luis_col_child_text luis_text_lay">
					<span><?=$wo['config']['slogan'];?></span>
					<h1><?=$wo['config']['titulo_b'];?></h1>
				</div>
			</div>
		</div>
		<div class="luis_content_rows contenido_sevicios">
			<?php $caracteristicas = lui_caracteristicasw();?>
			<?php foreach ($caracteristicas as $car): ?>
				<div class="sevicios_columnas">
					<span><?=$car['nombre'];?></span>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<?php $beneficios = lui_beneficiosw(); ?>
<section class="luis_secctions_page">
	<div class="luis_section_b">
		<?php foreach ($beneficios as $ben): ?>
			<div class="beneficio_s">
				<div class="beneficio_st">
					<div class="beneficio_st_img">
						<span>
							<img width="100%" height="100%" alt="<?=$ben['nombre'];?>" title="<?=$ben['nombre'];?>" src="<?php echo $wo['config']['theme_url'].'/img/beneficios/'.$ben['imagen'];?>">
						</span>
					</div>
					<div class="beneficio_st_content">
						<span><?=$ben['nombre'];?></span>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="luis_section_c">
		<div class="luis_section_c_a">
			<div class="luis_section_c_as">
				<span><?=$wo['config']['texto_uno_presentacion'];?></span>
				<h2><?=$wo['config']['texto_dos_presentacion'];?></h2>
				<p><?=$wo['config']['texto_descripcion_presentacion'];?></p>
			</div>
		</div>
		<div class="luis_section_c_b">
			<div class="luis_section_c_bj">
				<span class="luis_section_c_bj_img">
					<img decoding="async" fetchpriority="high" width="1640" height="924" src="<?php echo $wo['config']['theme_url'].'/img/presentacionuno.'.$wo['config']['imagenpresentacion'];?>" alt="<?=$wo['config']['texto_dos_presentacion'];?>" title="<?=$wo['config']['texto_dos_presentacion'];?>" srcset="<?php echo $wo['config']['theme_url'].'/img/presentacionuno.'.$wo['config']['imagenpresentacion'];?> 1640w, <?php echo $wo['config']['theme_url'].'/img/presentacionuno.'.$wo['config']['imagenpresentacion'];?> 1280w,<?php echo $wo['config']['theme_url'].'/img/presentacionuno.'.$wo['config']['imagenpresentacion'];?> 980w, <?php echo $wo['config']['theme_url'].'/img/presentacionuno.'.$wo['config']['imagenpresentacion'];?> 480w" sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1640px, 100vw">
				</span>
			</div>
		</div>
	</div>
</section>
<?php $publicaciones_cs = lui_publicaciones_sdw(); ?>
<section class="section_publicaction">
	<?php foreach ($publicaciones_cs as $cs_p): ?>
		<article class="publicacion_br">
			<div class="columna_imagen">
				<span>
					<img decoding="async" width="768" height="1024" src="<?=$urlimag  = $wo['config']['site_url'].'/'.$cs_p['url'].$cs_p['imagen']; ?>" alt="<?=$cs_p['nombre'];?>" title="<?=$cs_p['nombre'];?>" srcset="<?=$urlimag  = $wo['config']['site_url'].'/'.$cs_p['url'].$cs_p['imagen']; ?> 768w, <?=$urlimag  = $wo['config']['site_url'].'/'.$cs_p['url'].$cs_p['imagen']; ?> 480w" sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 768px, 100vw">
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
<div class="section_portada_two">
	<span class="cpl_contenido_wrap">
		<span class="cpl_contenido_bg" style="background-image:url(&quot;<?php echo $wo['config']['theme_url'];?>/img/present.<?php echo $wo['config']['portada_extension'];?>&quot;);"></span>
	</span>
	<div class="col_data_hp text_contentdata_presetwo">
		<div class="col_data_hp columnna_p_er_prestwo">
			<div class="columnna_p_er_prestwo_a">
				<div class="columnna_p_er_prestwo_a_do"></div>
			</div>
		</div>
		<div class="col_data_hp columnna_p_et_prestwo">
			<div class="columnna_p_et_prestwo_one">
				<div class="columnna_p_et_prestwo_one_1">
					<div class="columnna_p_et_prestwo_one_1_a">
						<span>VIVE UN POCO</span>
						<h1>Date un capricho</h1>
						<p>El beneficio al darse un capricho de vez en cuando y conseguir de manera sencilla la felicidad cediendo un poco y disfrutar de la paz que le aporta a nuestra mente.</p>
					</div>
				</div>
			</div>
			<div class="columnna_p_et_prestwo_two">
				<div class="butt_conten_col butt_conten_col_a">
					<a href="#">RESERVA UNA CITA</a>
				</div>
				<div class="butt_conten_col butt_conten_col_b">
					<a data="servicios" href="<?=lui_SeoLink('index.php?link1=servicios');?>" data-ajax="?link1=servicios">VER SERVICIOS</a>
				</div>
			</div>
		</div>
	</div>
</div>
