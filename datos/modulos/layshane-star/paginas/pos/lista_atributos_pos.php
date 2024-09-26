<?php $colorContinuo='';
 if ($wo['id_ato_col']!=''): ?>
	<?php $colorContinuo='_'.$wo['id_ato_col'];?>
<?php endif ?>
<div class="lista_de_opciones_de_atributes_pos">
	<input class="seleccted_atributes_s seleccted_atributes_<?=$wo['id_ato'];?><?=$colorContinuo;?>" type="radio" name="opcion<?=$wo['atributos_b']['id'];?><?=$colorContinuo;?>" id="atr_opt_list<?=$wo['opt_atributos']['id'];?><?=$wo['id_ato'];?><?=$colorContinuo;?>" <?=$wo['isChecked']; ?> value="<?=$wo['opt_atributos']['precio_adicional']; ?>" data-atributo="<?=$wo['atributos_b']['id'];?>" data-opcion="<?=$wo['opt_atributos']['id'];?>" onchange="Seleccionados_atributosc('<?=$wo['id_ato_orde'];?>','<?=$wo['id_ato_col'];?>','<?=$wo['id_ato'];?>')">
	<label for="atr_opt_list<?=$wo['opt_atributos']['id'];?><?=$wo['id_ato'];?><?=$colorContinuo;?>"><?=$wo['opt_atributos']['nombre'];?></label>
</div>