<?php
$html = '';
$items_comprass = $db->objectbuilder()->where('estado','1')->where('id_comprobante', $wo['product']['comprap'])->get('imventario');
$variantes_atributos = [];
$atributos = $db->objectbuilder()->where('id_imventario', $wo['product']['id_imventarios'])->get('imventario_atributos');
foreach($atributos as $atributo){
	$variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
}
$identificador_unico = $wo['product']['comprap'] . '_' . $wo['product']['id'];
foreach($variantes_atributos as $atributo => $opciones){
	$identificador_unico .= '_' . implode('_', $opciones);
}
$productos_similares = [];
foreach ($items_comprass as $item){
	$producto_item = lui_GetProduct($item->producto);
	$producto_id_item = $producto_item['id'];
	$variantes_atributos_item = [];
	$atributos_item = $db->objectbuilder()->where('id_imventario', $item->id)->get('imventario_atributos');
	foreach ($atributos_item as $atributo) {
		$variantes_atributos_item[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
	}
	$identificador_unico_item = $wo['product']['comprap'] . '_' . $producto_id_item;
	foreach($variantes_atributos_item as $atributo => $opciones){
		$identificador_unico_item .= '_' . implode('_', $opciones);
	}
	if($identificador_unico_item === $identificador_unico){
		$productos_similares[] = $item;
	}
}
if (!empty($variantes_atributos)){
	$atributos_producto_principal = [];
	foreach ($variantes_atributos as $atributo => $opciones){
        $nombre_atributo = $db->where('id', $atributo)->getOne('atributos')['nombre'];
        $valores_opciones_atributo = [];
        foreach ($opciones as $opcion){
        	if($nombre_atributo=='Color'){
        		$buscar_nombre_de_color = $db->where('id', $opcion)->getOne('lui_products_colores')['lang_key'];
        		$nombre_opcion_atributo = $wo['lang'][$buscar_nombre_de_color];
        	}else{
        		$nombre_opcion_atributo = $db->where('id', $opcion)->getOne('atributos_opciones')['nombre'];
        	}
        	$valores_opciones_atributo[] = $nombre_opcion_atributo;
        }
        $atributos_producto_principal[$nombre_atributo] = $valores_opciones_atributo;
    }
}

$opciones_del_producto = lui_poner_en_lista_las_opciones($wo['product']['id']);
?>
<?php if ($opciones_del_producto): ?>
	<tr class="table-row table-row--chris menu_item_compras_la item_dats_invoice" data-producto="<?php echo $wo['product']['id_productos']?>" data-id="<?=$wo['product']['id']?>" style="cursor:pointer;user-select:none;" id="item_dats_invoice-<?php echo $wo['product']['id_productos']?>">
			<td class="table-row__td">
				<?php echo (empty($wo['product']['units']) && $wo['product']['units'] < 1 ? '<div class="table-row--overdue_green"></div>' : ($wo['product']['units'] < 5 ? '<div class="table-row--overdue_green"></div>' : '')) ?>
				<?php echo(empty($wo['product']['units']) && $wo['product']['units'] < 1 ? '' : '') ?>
				<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
				<div class="table-row__info">
					<p class="table-row__name"><?php echo $wo['product']['name']?></p>
					<?php $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['product']['inventario'])->get('imventario_atributos'); ?>
					<?php if (isset($atributos_inv)): ?>
						<?php if(!empty($variantes_atributos)): ?>
							<?php foreach($atributos_producto_principal as $atributo => $valores): ?>
								<span><?=$atributo.': '.implode(', ', $valores);?></span><br>
							<?php endforeach ?>
						<?php else: ?>
							<?php $color_producto_sin_atributos = $db->where('id', $wo['product']['color'])->getOne('lui_products_colores')->lang_key;?>
							<span>Color: <?=$wo['lang'][$color_producto_sin_atributos]; ?></span>
						<?php endif ?>
					<?php endif ?>
				</div>
			</td>
			<td data-column="MODELO" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['modelo']; ?></p>
		        </div>                
		    </td>
			<td data-column="BARCODE" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['sku']; ?></p>
		        </div>                
		    </td>
		    <td data-column="CANTIDAD" class="table-row__td">
		    	<div class="">
		    		<p class="table-row__policy" id="cantidad_de_pr_add_<?=$wo['product']['id'];?>"><?=$wo['product']['cantidad'] ?></p>
		    	</div>
		    </td>
		    <td data-column="PRECIO" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span  class="precio_compra_inputs"><?=$productos_similares[0]->precio;?></span>
		    	</div>
		    </td>
		    <td data-column="SUBTOTAL" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span class="precio_compra_inputs_totalsub_<?=$identificador_unico;?>" data-id="<?=$wo['product']['id'];?>"><?=$productos_similares[0]->precio*$wo['product']['cantidad'];?></span>
		    	</div>
		    </td>
		</tr>
<?php else: ?>
	<tr class="table-row table-row--chris menu_item_compras_la item_dats_invoice" data-producto="<?php echo $wo['product']['id_productos']?>" id="item_dats_invoice-<?php echo $wo['product']['id_productos']?>" data-id="<?=$wo['product']['id']?>" style="cursor:pointer;user-select:none;">
			<td class="table-row__td">
				<?php echo (empty($wo['product']['units']) && $wo['product']['units'] < 1 ? '<div class="table-row--overdue_green"></div>' : ($wo['product']['units'] < 5 ? '<div class="table-row--overdue_green"></div>' : '')) ?>
				<?php echo(empty($wo['product']['units']) && $wo['product']['units'] < 1 ? '' : '') ?>
				<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
				<div class="table-row__info">
					<p class="table-row__name"><?php echo $wo['product']['name']?> </p>
					<?php $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['product']['inventario'])->get('imventario_atributos'); ?>
					<?php if (isset($atributos_inv)): ?>
						<?php if(!empty($variantes_atributos)): ?>
							<?php foreach($atributos_producto_principal as $atributo => $valores): ?>
								<span><?=$atributo.': '.implode(', ', $valores);?></span><br>
							<?php endforeach ?>
						<?php else: ?>
						<?php endif ?>
					<?php endif ?>
				</div>
			</td>
			<td data-column="MODELO" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['modelo']; ?></p>
		        </div>                
		    </td>
			<td data-column="BARCODE" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['sku']; ?></p>
		        </div>                
		    </td>
		    <td data-column="CANTIDAD" class="table-row__td">
		    	<div class="">
		    		<p class="table-row__policy" id="cantidad_de_pr_add_<?=$identificador_unico;?>"><?=$wo['product']['cantidad'] ?></p>
		    	</div>
		    </td>
		    <td data-column="PRECIO" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span  class="precio_compra_inputs"><?=$productos_similares[0]->precio;?></span>
		    	</div>
		    </td>

		    <td data-column="SUBTOTAL" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span class="precio_compra_inputs_totalsub_<?=$identificador_unico;?>" data-id="<?=$wo['product']['id'];?>"><?=$productos_similares[0]->precio*$wo['product']['cantidad'];?></span>
		    	</div>
		    </td>
		</tr>
<?php endif ?>