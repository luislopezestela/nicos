<?php $colorContinuo='';
 if ($wo['id_ato_col']!=''): ?>
	<?php $colorContinuo='_'.$wo['id_ato_col'];?>
<?php endif ?>
<?php 
$sku_colors_product = $db->where('id_producto',$wo['id_ato'])->where('id_color',$wo['id_ato_col'])->getOne('lui_opcion_de_colores_productos');
if (!empty($sku_colors_product['precio_adicional'])) {
	$precio_subtotal_producto = $sku_colors_product['precio_adicional'];
}else{
	$precio_subtotal_producto = 0;
}

 ?>
<div class="lista_de_opciones_de_atributes_pos">
	<input class="seleccted_atributes_s seleccted_atributes_<?=$wo['id_ato'];?><?=$colorContinuo;?>" type="radio" name="opcion<?=$wo['atributos_b']['id'];?><?=$colorContinuo;?>" id="atr_opt_list<?=$wo['id_ato_col'];?><?=$wo['id_ato'];?><?=$colorContinuo;?>" <?=$wo['isChecked']; ?> value="<?=$precio_subtotal_producto; ?>" data-atributo="<?=$wo['atributos_b']['id'];?>" data-opcion="<?=$wo['id_ato_col'];?>">
	<label for="atr_opt_list<?=$wo['id_ato_col'];?><?=$wo['id_ato'];?><?=$colorContinuo;?>">Color</label>
</div>