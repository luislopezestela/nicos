<?php
$html = '';
$items_comprass = $db->objectbuilder()->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante', $wo['product']['comprap'])->get('imventario');
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
				<div class="placeholder_atri" style="display:none;"></div>
				<div class="cont_atributes_listas_compras submenu_add_irtd_docmt" style="display:none;">
					<div class="main_closed_view_more_items_orrder">
						<span class="closed_view_more_items_orrder btn-mat"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg></span>
					</div>
					<div class="header_title_viewas_more_items">
						<span style="font-size:18px;">Cantidad: <?=$wo['product']['cantidad'] ?></span>
						<span class="layshane-btn_cr btn_layshane-1" onclick="RemoveProduct_compra_imv_all_atr('<?php echo $wo['product']['id_productos'];?>','hide')">Eliminar</span>
					</div>
					<?php $items_compra = $db->objectbuilder()->where('estado','0')->where('producto',$wo['product']['id'])->where('color',$wo['product']['color'])->where('id_sucursal',$wo['user']['sucursal'])->get('imventario'); ?>
					
				    <table class="table" style="background-color:#F8F8F8;">
				    	<thead class="table__thead">
				    		<tr>
				    			<th class="table__th">Producto</th>
				    			<th class="table__th">Modelo</th>
				    			<th class="table__th">Barcode</th>
				    			<th class="table__th"></th>
				    		</tr>
				    	</thead>
				    	<tbody class="table__tbody">
				    		<?php
							    if (!empty($productos_similares)) {
							        foreach ($productos_similares as $producto_similar) {
							        	$wo['all_products_atr']['id'] = $producto_similar->id;
								        $wo['all_products_atr']['producto_id'] = $identificador_unico;
								        $wo['all_products_atr']['imagen'] = $wo['product']['images'][0]['image_org'];
								        $wo['all_products_atr']['nombre'] = $wo['product']['name'];
								        $wo['all_products_atr']['barcode'] = $producto_similar->barcode;
								        $wo['all_products_atr']['modelo'] = $wo['product']['modelo'];
							            $html .= lui_LoadPage('compras/lista_compra_all');
							        }
							    }
							    echo $html;
							?>
				    	</tbody>
				    </table>
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
		    		<?php if(!empty($variantes_atributos)){$class_price_color='precio_compra_inputs_b';}else{$class_price_color='precio_compra_inputs_a';}?>
		    		<input class="precio_compra_inputs <?=$class_price_color;?> precio_compra_inputs<?=$wo['product']['id'];?>" type="number" data-id="<?=$wo['product']['id'];?>" data-atributos='<?php echo json_encode($variantes_atributos); ?>' data-ct="<?=$wo['product']['cantidad'] ?>" autocomplete="off" pattern="\d*" name="precio_compra" value="<?=$productos_similares[0]->precio;?>">
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
				<div class="placeholder_atri" style="display:none;"></div>
				<div class="cont_atributes_listas_compras submenu_add_irtd_docmt" style="display:none;">
					<div class="main_closed_view_more_items_orrder">
						<span class="closed_view_more_items_orrder btn-mat"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg></span>
					</div>
					<div class="header_title_viewas_more_items">
						<span style="font-size:18px;">Cantidad: <?=$wo['product']['cantidad'] ?></span>
						<?php if(isset($atributos_inv)): ?>
							<?php if(!empty($variantes_atributos)): ?>
								<span class="layshane-btn_cr btn_layshane-1" onclick="RemoveProduct_compra_imv_all_atr('<?php echo $wo['product']['id_productos'];?>','hide')">Eliminar</span>
							<?php else: ?>
								<span class="layshane-btn_cr btn_layshane-1" onclick="RemoveProduct_compra_imv_all('<?=$wo['product']['id_productos'];?>','hide')">Eliminar</span>
							<?php endif ?>
						<?php endif ?>
						
					</div>
					<?php $items_compra = $db->objectbuilder()->where('estado','0')->where('producto',$wo['product']['id'])->where('id_sucursal',$wo['user']['sucursal'])->get('imventario'); ?>
				    <table class="table" style="background-color:#F8F8F8;">
				    	<thead class="table__thead">
				    		<tr>
				    			<th class="table__th">Producto</th>
				    			<th class="table__th">Modelo</th>
				    			<th class="table__th">Barcode</th>
				    			<th class="table__th"></th>
				    		</tr>
				    	</thead>
				    	<tbody class="table__tbody">
				    		<?php
							    if (!empty($productos_similares)) {
							        foreach ($productos_similares as $producto_similar) {
							        	$wo['all_products_atr']['id'] = $producto_similar->id;
								        $wo['all_products_atr']['producto_id'] = $identificador_unico;
								        $wo['all_products_atr']['imagen'] = $wo['product']['images'][0]['image_org'];
								        $wo['all_products_atr']['nombre'] = $wo['product']['name'];
								        $wo['all_products_atr']['barcode'] = $producto_similar->barcode;
								        $wo['all_products_atr']['modelo'] = $wo['product']['modelo'];
							            $html .= lui_LoadPage('compras/lista_compra_all');
							        }
							    }
							    echo $html;
							?>
				    	</tbody>
				    </table>
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
		    		<?php if(!empty($variantes_atributos)){$class_price_color='precio_compra_inputs_b';}else{$class_price_color='precio_compra_inputs_a';}?>
		    		<input class="precio_compra_inputs <?=$class_price_color;?> precio_compra_inputs<?=$identificador_unico;?>" type="number" data-id="<?=$wo['product']['id'];?>" data-atributos='<?php echo json_encode($variantes_atributos); ?>' data-ct="<?=$wo['product']['cantidad'] ?>" autocomplete="off" pattern="\d*" name="precio_compra" value="<?=$productos_similares[0]->precio;?>" data-ident='<?=$identificador_unico;?>'>
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
